<template>
  <div class="page-content">
    <!-- <PageTitle page-slug="portfolio" /> -->

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <img :src="post._embedded['wp:featuredmedia'][0].source_url" :alt="post.title">
          <h1>{{ post.title.rendered }}</h1>
          <div class="post-content" v-html="post.content.rendered"></div>
          <router-link :to="'/portfolio'"><button class="btn btn-primary">Back to Portfolio</button></router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  // @ is an alias to /src
  import NavBar from "@/components/Navbar.vue";
  import PageTitle from "@/components/PageTitle.vue";
  import axios from 'axios';

  export default {

    name: "post",
    components: {
      NavBar,
      PageTitle
    },
    data(){
      return{
        post: false
      }
    },
    beforeMount(){
      this.getPost();
    },
    filters: {
      
    },
    methods:{
      getPost: function() {
        axios
          .get(
            "/wp-json/wp/v2/projects?_embed&slug=" + this.$route.params.postSlug
          )
          .then(response => {
            this.post = response.data[0];
          })
      }
    }
  }
</script>

<style lang="scss">
  .btn-primary{
    background-color: #42b983;
    font-weight: bold;
    text-transform: uppercase;
    border: 2px solid transparent;
    border-radius: 25px;
    padding: 10px 30px;
    letter-spacing: 1px;
    transition: all 0.25s ease-in-out;

    &:hover{
      border-color: #42b983;
      background-color: #FFF;
      color: #42b983;
    }
  }
</style>
