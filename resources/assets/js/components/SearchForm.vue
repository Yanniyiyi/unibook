<template>
    <div>
        <div class="col-md-3">
            <div>
                <span>where</span>
            </div>
            <el-select v-model="state" placeholder="Select state" @change="getUniversities">
                <el-option
                        v-for="state in states"
                        :key="state.value"
                        :label="state.label"
                        :value="state.value">
                </el-option>
            </el-select>
        </div>
        <div class="col-md-3">
            <div>
                <span>Which</span>
            </div>
            <el-select v-model="university" placeholder="Select university">
                <el-option
                        v-for="university in universities"
                        :key="university.id"
                        :label="university.name"
                        :value="university.id">
                </el-option>
            </el-select>
        </div>
        <div class="col-md-3">
            <div>
                <span>what</span>
            </div>
            <el-input v-model="book" placeholder="Book name"></el-input>
        </div>
        <div class="col-md-3">
            <el-button @click="searchBook">Search</el-button>
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
                university:null,
                book:''
            }
        },
        methods:{
            getUniversities(){
                this.university = null;
                axios.post('/api/universities/search',{'state':this.state}).then(response => {
                    this.universities = response.data;

                });
            },
            searchBook(){
                axios.post('/api/books/search',{'state':this.state,'university':this.university,'name':this.book}).then(response => {

                });
            }
        }
    }
</script>