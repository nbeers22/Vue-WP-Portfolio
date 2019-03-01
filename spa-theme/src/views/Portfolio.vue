<template>
  <div class="page-content">
    <PageTitle page-slug="portfolio" />

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-sm-12">
          <ul id="categories" class="categories">
            <li>Filter:</li>
            <li><button class="btn-primary activeCat" @click="changeActiveCategory">All</button></li>
            <li v-for="cat in categories"><button class="btn-primary" @click="changeActiveCategory">{{ cat.name }}</button></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="projects container">
      <div id="grid" class="row">
        <div class="col-lg-4 col-md-6 project-container grid__brick" v-for="project in projectsFiltered"
        :data-categories="project.categories" :key="project.id">
          <div class="project" v-bind:style="{backgroundImage: 'url(' + project._embedded['wp:featuredmedia'][0].source_url + ')'}">
            <div class="overlay"></div>
            <aside class="project-meta">
              <h2 class="project-title">{{ project.title.rendered }}</h2>
              <div class="project-btn">
                <router-link :to="'projects/' + project.slug"><button class="btn btn-primary">View Project</button></router-link>
              </div>
            </aside>
          </div>
        </div>
        <div class="col-1 my-sizer-element"></div>
      </div>
    </div>
  </div>
</template>

<script>
  import PageTitle from "@/components/PageTitle.vue";
  import axios from 'axios';
  // import Shuffle from 'shufflejs';

  export default {

    name: "portfolio",
    components: {
      PageTitle
    },
    data(){
      return{
        projects: [],
        projectsFiltered: [],
        categories: [],
        activeCat: ''
      }
    },
    created(){
      this.getProjects();
      this.getCategories();
    },
    filters: {
      
    },
    methods:{
      getProjects: function(){
        let $this = this;

        axios.get('/wp-json/wp/v2/projects?_embed=1&orderby=menu_order&order=asc')
          .then(function (response) {
            $this.projects = response.data;
            $this.projectsFiltered = response.data;
            // console.log(response.data)
          })
      },
      getCategories: function(){
        let $this = this;

        axios.get('/wp-json/wp/v2/categories?hide_empty=true')
          .then(function (response) {
            $this.categories = response.data;
            // console.log($this.categories)
          });
      },
      changeActiveCategory(event){
        let clickedBtn = event.target;
        let cats = document.getElementById('categories').querySelectorAll('.btn-primary');
        cats.forEach(function(element){
          element.classList.remove('activeCat');
        });
        clickedBtn.classList.add('activeCat');
        this.filterProjects(clickedBtn.innerHTML);
      },
      showAllProjects: function(){
        this.projectsFiltered = this.projects;
      },
      filterProjects: function(category){
        let catNames = [];

        if (category === "All") {
          this.showAllProjects();
          return false;
        }

        this.projects.forEach(function(project){
          project._embedded['wp:term'][0].forEach(function(term){
            if (term.name === category) {
              catNames.push(project);
            }
          });
        });

        this.projectsFiltered = catNames;
      }
    }
  };
</script>

<style lang="scss">

  .project-container{
    padding: 15px;
  }

  #categories{
    list-style-type: none;
    display: flex;
    padding-left: 0;
    justify-content: center;

    li:first-of-type{
      color: #FFF;
      text-transform: uppercase;
      font-size: 18px;
    }

    li{
      margin-right: 10px;
      display: flex;
      align-items: center;
    }

    .btn-primary{
      padding: 5px 15px;
      border-radius: 5px;
      box-shadow: none;
      outline: none;

      &.activeCat{
        background-color: #FFF;
        border: 2px solid #42b983;
        color: #42b983;
      }
    }
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
        border-color: #42b983;
      }

      .project-title{
        opacity: 1;
        top: 38%;
        transform: translateY(-50%);
      }

      .project-btn{
        opacity: 1;
        bottom: 28%;
        transform: translateY(-50%);
      }
    }

    .overlay{
      position: absolute;
      height: 100%;
      width: 100%;
      background-color: transparent;
      border: 2px solid transparent;
      transition: all 0.25s ease-in-out;
    }

    .project-title{
      position: absolute;
      top: 0;
      opacity: 0;
      width: 100%;
      transform: translateY(0);
      transition: all 0.25s ease-in-out;
    }

    .project-btn{
      bottom: 0;
      width: 100%;
      position: absolute;
      transform: translateY(0);
      transition: all 0.25s ease-in-out;
      opacity: 0;
    }

    .project-meta{
      width: 100%;
      text-align: center;

      h2{
        color: #FFF;
        font-size: 36px;
      }

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
    }

  }
</style>
