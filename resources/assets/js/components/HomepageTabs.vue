<template>
    <div class="row">
        <div class="col-md-12">
            <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="For you" name="recommendations">
                    <el-carousel :interval="4000" type="card" height="300px">
                        <el-carousel-item v-for="item in 3" :key="item">
                            <h3>{{ item }}</h3>
                        </el-carousel-item>
                    </el-carousel>
                </el-tab-pane>
                <el-tab-pane label="Books" name="books">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Latest 10 books</p>
                        </div>
                        <div class="col-md-4">
                            <el-button type="text" class="pull-right"><a href="book/">See all</a></el-button>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item clearfix" v-for="book in books">
                            <img class="img-responsive img-rounded" :src="JSON.parse(book.images).url" alt=""/>
                            <h3 class="list-group-item-heading">
                                {{ book.name }}
                                <!--<span class="label label-danger pull-right">NEW !</span>-->
                            </h3>
                            <p class="list-group-item-text lead">
                                {{ book.description }}
                                <br />

                            </p>
                            <div class="btn-toolbar pull-right" role="toolbar" aria-label="">
                                <a :href="'/book/' + book.id" class="btn btn-default">Deatils</a>
                                <button class="btn btn-primary">${{book.price}}</button>
                            </div>
                        </li>
                    </ul>
                </el-tab-pane>
                <el-tab-pane label="Services" name="services">
                    <h1>Coming soon~</h1>
                </el-tab-pane>
            </el-tabs>
        </div>
    </div>

</template>
<script>
    export default {
        created(){
            this.getBooks();
        },
        data() {
            return {
                activeName: 'recommendations',
                books:[]
            };
        },
        methods: {
            handleClick(tab, event) {
                switch(tab.name)
                {
                    case 'recommendations':
                        break;
                    case 'books':
                        break;
                    case 'services':
                        break;
                }
            },
            getBooks(){
                axios.get('/api/books/10').then(response => {
                    this.books = response.data;
                    console.log(this.books);
                });
            }
        }
    };
</script>
<style scoped>
    .el-carousel__item h3 {
        color: #475669;
        font-size: 14px;
        opacity: 0.75;

        margin: 0;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
    }

    .el-carousel__item:nth-child(2n+1) {
        background-color: #d3dce6;
    }



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