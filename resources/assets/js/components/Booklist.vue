<template>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item clearfix" v-for="(book,index) in pagination.data">
                <img class="img-responsive img-rounded" :src="book ? '' : JSON.parse(book.images).url" alt=""/>
                <h3 class="list-group-item-heading">
                    {{ book.name }} <span><el-tag v-if="book.deleted_at != null">Deleted</el-tag></span>
                    <!--<span class="label label-danger pull-right">NEW !</span>-->
                </h3>
                <p class="list-group-item-text lead">
                    {{ book.description }}
                    <br />
                </p>
                <div class="btn-toolbar pull-right" role="toolbar" aria-label="">
                    
                    <a :href="'/book/' + book.id" class="btn btn-default">Deatils</a>
                    <button class="btn btn-primary">${{book.price}}</button>

                    <button v-if=" type == 'actived' || (type == 'all' && book.deleted_at == null)" class="btn btn-primary"  @click="deleteBook(book,index)">Delete</button>
                </div>
            </li>
        </ul>
        <el-pagination
          @current-change="handleCurrentChange"
          :current-page="currentPage"
          layout="total, prev, pager, next"
          :page-size="8"
          :total="totalPages">
        </el-pagination>
    </div>
</template>

<script>
    export default {
       props:['useronly','type'],
       mounted(){
            this.getBooks(this.currentPage);
       },
       data(){
        return {
            pagination: {},
            currentPage: 1
        }
       },
       computed:{
        totalPages(){
            return this.pagination.total;
        },
        url(){
            let url  = '/api'
            if(this.useronly)
            {
                if(this.type == 'all')
                {
                    url +=  '/user/all/books'
                }

                if(this.type == 'actived')
                {
                    url +=  '/user/actived/books'
                }

                if(this.type == 'deleted')
                {
                    url +=  '/user/deleted/books'
                }

                return url += '?page=';
            }

            return '/api/books?page=';
        }
       },
       methods:{
        handleCurrentChange(page){
            this.currentPage = page;
            this.getBooks(this.currentPage);
        },
        getBooks(page){
            axios.get(this.url+page).then(response => {
                this.pagination = response.data;
            });
        },
        deleteBook(book,index){
            axios.delete('/api/delete/' + book.id).then(response => {
                 if(this.type == 'actived')
                 {
                    this.pagination.data.splice(index,1);

                 }
                 if(this.type == 'all')
                 {
                    book.deleted_at = 'deleted';
                 }
                 
            });
        }
       }
    }
</script>

<style scoped>
    .list-group-item {
        background-color: rgba(255,255,255,0.7);
        border:0;
        margin-bottom: 10px;
    }

    .btn-toolbar {margin-top:10px;}

    img {
        float:left;
        margin-right:15px;
        height: 200px;
        width: 200px;
    }
</style>
