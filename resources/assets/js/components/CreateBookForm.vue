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
                    placeholder="Description"
                    v-model="description"
                    id="book-desc">
            </el-input>
        </div>

        <div class="col-md-12">
            <el-button @click="submit" class="pull-right">Sell now</el-button>
        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="col-md-8">
                <input type="file" @change="fileChange" accept="image/*" class="form-control">
            </div>
        </div>

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
                email:'',
                images:null
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
            fileChange(e){
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
               // this.createImage(files[0]);
               this.images = files[0];
            },
            createImage(file){
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.images = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            submit(){
                let data = new FormData();
                // for single file
                data.append('images', this.images);
                data.append('university_id',this.university_id);
                data.append('name',this.book);
                data.append('price',this.price);
                data.append('description',this.description);
                data.append('phone',this.phone);
                data.append('email',this.email);
                axios.post('/api/books/store',data).then(response => {
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