<template>
  <div class="page-content">
    <PageTitle page-slug="portfolio" />

    <div class="projects container">
      <div class="row">
        <div class="col-lg-4 col-md-6 project-container" v-for="project in projects">
          <div class="project" v-bind:style="{backgroundImage: 'url(' + project._embedded['wp:featuredmedia'][0].source_url + ')'}">
            <div class="overlay"></div>
            <aside class="project-meta">
              <h2 class="project-title">{{ project.title.rendered }}</h2>
              <a href="#!"><button class="btn btn-primary">View Project</button></a>
            </aside>
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

    name: "portfolio",
    components: {
      NavBar,
      PageTitle
    },
    data(){
      return{
        projects: []
      }
    },
    created(){
      this.getProjects();
    },
    filters: {
      
    },
    methods:{
      getProjects: function(){
        let $this = this;

        axios.get('/wp-json/wp/v2/projects?_embed')
          .then(function (response) {
            $this.projects = response.data;
            console.log(response.data)
          })
      }
    }
  };
</script>

<style lang="scss">

  .project-container{
    padding: 15px;
  }

  .project{
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    height: 300px;
    position: relative;
    transition: all 0.25s ease-in-out;

    &:hover{
     
      .overlay{
        background-color: rgba(0,0,0,0.8);
      }

      .project-meta{
        opacity: 1;
        top: 50%;
        transform: translateY(-50%);
      }
    }

    .overlay{
      position: absolute;
      height: 100%;
      width: 100%;
      background-color: transparent;
    }

    .project-meta{
      width: 100%;
      position: absolute;
      top: 0;
      transform: translateY(0);
      text-align: center;
      opacity: 0;
      transition: all 0.25s ease-in-out;

      h2{
        color: #FFF;
        font-size: 36px;
      }

      .btn-primary{
        background-color: #42b983;
        font-weight: bold;
        text-transform: uppercase;
        border: 0;
        border-radius: 25px;
        padding: 10px 30px;
        letter-spacing: 1px;
      }
    }

  }
</style>
