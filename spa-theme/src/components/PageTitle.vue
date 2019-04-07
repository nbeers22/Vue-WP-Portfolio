<template>
  <div class="container">
    <div class="row justify-content-center" v-if="pageData.acf">
      <div class="col-sm-10" :class="[ !['home'].includes($route.name) ? 'col-md-10 col-lg-8' : '' ]">
        <h1 class="page-title">{{ pageTitle }}</h1>
        <aside class="green-underline" v-if="pageTitle !== ''"></aside>
        <h4 class="page-subhead" v-html="pageSubhead" v-if="pageSubhead"></h4>
        <div class="main-content" v-html="pageData.content.rendered" v-if="pageData.content.rendered">
          
        </div>
      </div>
    </div>
    <!-- Only show on home page -->
    <ul class="icons" v-if="['home'].includes($route.name)">
      <li class="icon" v-for="(value, key, index) in pageData.acf" :key="index" v-if="index >= 2">
        <a :href="value">
          <font-awesome-icon :icon="[ 'fab', key ]" v-if="key !== 'envelope'" />
          <font-awesome-icon :icon="[ 'fa', key ]" v-else />
        </a>
      </li>
    </ul>
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
      pageSubhead: '',
      pageData: false
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
          $this.pageData    = response.data[0];
          $this.pageTitle   = $this.pageData.acf.page_title;
          $this.pageSubhead = $this.pageData.acf.page_subhead;
          $this.$emit('content-loaded',true);
        })
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  .green-underline{
    width: 120px;
    border-bottom: 2px solid #42b983;
    margin: 20px auto 30px;
  }

  .icons{
    list-style-type: none;
    padding-left: 0;

    .icon{
      display: inline-block;
      margin: 0 10px;
    }

    .svg-inline--fa{
      width: 2rem;
      height: 1.75rem;
      color: #FFF;
      transition: color 0.25s ease-in-out;

      &:hover{
        color: #42b983;
      }
    }
  }

  .main-content{
    margin-top: 50px;
    color: #FFF;

    a,div,p,li,span{
      color: #FFF;
    }

    a{
      border-bottom: 1px solid #FFF;
      transition: all 0.25s ease-in-out;

      &:hover{
        color: #42b983;
        border-bottom: 1px solid #42b983;
      }
    }
  }
  
</style>
