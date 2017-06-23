<template>
    <div class="container">
        <div class="row">
            <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="All books" name="all">
                    <booklist :useronly="true" :type="all" ></booklist>
                </el-tab-pane>
                <el-tab-pane label="Selling books" name="actived">
                     <booklist :useronly="true" :type="actived"></booklist>
                </el-tab-pane>
                <el-tab-pane label="Deleted books" name="deleted">
                     <booklist :useronly="true" :type="deleted"></booklist>
            </el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>

<script>
     export default {
    data() {
      return {
        activeName: 'all',
        all:'all',
        actived: 'actived',
        deleted: 'deleted' 
      };
    },
    methods: {
      handleClick(tab, event) {
       
      }
    }
  };
</script>
