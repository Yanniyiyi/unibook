<template>
    <div>
    <div class="col-md-6">
        <div class="col-md-12">
            <h3>Which univeristies' book you have?</h3>
        </div>
        <div class="col-md-4">
            <el-select v-model="state" placeholder="Select state" @change="getUniversities">
                <el-option
                        v-for="state in states"
                        :key="state.value"
                        :label="state.label"
                        :value="state.value">
                </el-option>
            </el-select>
        </div>
        <div class="col-md-8">
            <el-select v-model="university_id" placeholder="Select university">
                <el-option
                        v-for="university in universities"
                        :key="university.id"
                        :label="university.name"
                        :value="university.id">
                </el-option>
            </el-select>
        </div>

        <div class="col-md-12">
            <el-input v-model="book" placeholder="Book name"></el-input>
        </div>
        <div class="col-md-12">
            <h3>Sold for how much?</h3>
        </div>
        <div class="col-md-6">
            <el-input v-model="price" placeholder="Buy you a coffee?" :disabled="free">
                <template slot="prepend">$</template>
            </el-input>

        </div>
        <div class="col-md-6">
            <el-checkbox v-model="free" @change="changePrice">Sold for free</el-checkbox>
        </div>
        <div class="col-md-12">
            <h3>How to reach you?</h3>
        </div>
        <div class="col-md-6">
            <el-input v-model="phone" placeholder="Better than email" >
                <template slot="prepend">Phone</template>
            </el-input>
        </div>

        <div class="col-md-6">
            <el-input v-model="email" placeholder="Are you sure, Email?">
                <template slot="prepend">Email</template>
            </el-input>
        </div>
        <div class="col-md-12">
            <h3>Give a short description to you book?</h3>
            <el-input
                    type="textarea"
                    :autosize="{ minRows: 4, maxRows: 8}"
                    placeholder="请输入内容"
                    v-model="description"
                    id="book-desc">
            </el-input>
        </div>

        <div class="col-md-12">
            <el-button @click="submit" class="pull-right">Sell now</el-button>
        </div>

    </div>
    <div class="col-md-6">
        
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                states: [{
                    value: 'ACT',
                    label: 'ACT'
                }, {
                    value: 'NSW',
                    label: 'NSW'
                }, {
                    value: 'NT',
                    label: 'NT'
                }, {
                    value: 'QLD',
                    label: 'QLD'
                }, {
                    value: 'SA',
                    label: 'SA'
                },{
                    value: 'TAS',
                    label: 'TAS'
                },{
                    value: 'VIC',
                    label: 'VIC'
                },
                    {
                        value: 'WA',
                        label: 'WA'
                    }],
                state: '',
                universities:[],
                university_id:null,
                book:'',
                price:'',
                description:'',
                free:false,
                phone:'',
                email:''
            }
        },
        methods:{
            getUniversities(){
                this.university_id = null;
                axios.post('/api/universities/search',{'state':this.state}).then(response => {
                    this.universities = response.data;

                });
            },
            toggleInput(){

            },
            changePrice()
            {
                if(this.free)
                {
                    this.price = "";
                }
            },
            submit(){
                axios.post('/api/books/store',{'university_id':this.university_id,'name':this.book,
                'price':this.price,'description':this.description,'images':[]}).then(response => {
                        window.location = response.data.url;
                });
            }
        }
    }
</script>

<style scoped>
    .el-select{
        width:100%;
        margin-bottom:11px;
    }
    #book-desc{
        margin-bottom:11px;
    }
</style>