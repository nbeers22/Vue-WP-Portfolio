<template>
  <div>
    <h1 class="page-title">{{ pageTitle }}</h1>
    <aside class="green-underline" v-if="pageTitle !== ''"></aside>
    <h4 class="page-subhead" v-html="pageSubhead" v-if="pageSubhead"></h4>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "PageTitle",
  props: ['pageSlug'],
  data(){
    return{
      pageTitle: '',
      pageSubhead: ''
    }
  },
  created(){
    this.getPageTitle();
  },
  methods:{
    getPageTitle: function(){
      let $this = this;

      axios.get(`/wp-json/wp/v2/pages?slug=${this.pageSlug}`)
        .then(function (response) {
          $this.pageTitle = response.data[0].acf.page_title;
          $this.pageSubhead = response.data[0].acf.page_subhead;
        })
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  .green-underline{
      width: 120px;
      border-bottom: 3px solid #42b983;
      margin: 20px auto 30px;
  }
  
</style>
