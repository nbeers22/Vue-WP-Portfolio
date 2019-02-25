<template>
  <div>
    <h1 class="page-title">{{ pageTitle }}</h1>
    <h4 class="page-subhead" v-if="pageSubhead">{{ pageSubhead }}</h4>
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
          console.log(response.data)
          $this.pageTitle = response.data[0].acf.page_title;
          $this.pageSubhead = response.data[0].acf.page_subhead;
        })
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  
</style>
