<template>
  <div class="page-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <img :src="post._embedded['wp:featuredmedia'][0].source_url" :alt="post.title" class="featured-img">
          <h1 style="margin-bottom:20px">{{ post.title.rendered }}</h1>
          <div class="project-link">
            <a :href="post.acf.project_link" target="_blank">{{ post.acf.project_button_text }}</a>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="post-content" v-html="post.content.rendered"></div>
              <router-link :to="'/portfolio'"><button class="btn btn-primary"><font-awesome-icon icon="arrow-left" /> &nbsp;Back</button></router-link>
            </div>
          </div>
          
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
  .page-content .btn-primary{
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

  .featured-img{
    margin-bottom:50px;
    max-width: 100%;

    @media(max-width: 991px){
      margin-bottom: 30px;
    }
  }

  .post-content{
    margin: 30px 0;

    p,span,div,li,a{
      color: #FFF;
    }
  }

  .project-link a, .post-content a{
    text-decoration: none;
    border-bottom: 1px solid #FFF;
    transition: all 0.25s ease-in-out;
    color: #FFF;

    &:hover{
      color: #42b983;
      border-color: #42b983;
      text-decoration: none;
    }
  }

  .project-link a{
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    font-size: 1.125rem;
  }
</style>
