<template>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="/"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" v-for="(menuItem, index) in navMenu">
          <router-link :to="$options.filters.changeNavLinks(menuItem.title)" class="nav-link">{{ menuItem.title }}</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import axios from 'axios';

export default {
  name: "Navbar",
  data(){
    return{
      navMenu: [],
    }
  },
  created(){
    this.getNavMenu();
  },
  filters: {
    changeNavLinks: function(value){
      // Make link all lowercase
      let valueLower = '/' + value.toLowerCase();
      // check if value includes home
      if(valueLower.includes('home')){
        valueLower = valueLower.charAt(0);
      }
      return valueLower;
    }
  },
  methods:{
    getNavMenu: function(){
      let $this = this;
      axios.get('/wp-json/nav/v1/menus/header-nav')
        .then(function (response) {
          $this.navMenu = response.data;
        })
    }
  },
  watch:{
    $route (to, from){
      let navToggle = document.querySelector('.navbar-toggler');
      let navContent = document.getElementById('navbarSupportedContent');

      if (navContent.classList.contains('show')) {
        navContent.classList.remove('show');
        navToggle.classList.add('collapsed');
      }
    }
  } 
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  .navbar{

    @media(max-width: 991px){
      justify-content: center;
      position: fixed;
      width: 100%;
      background-color: #000;
      z-index: 1;

      .navbar-brand{
        display: none;
      }
    }
  }

  .navbar-dark .navbar-toggler{
    border: 0;

    &:focus{
      outline: 0;
    }
  }

  .navbar-dark .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(66, 185, 131, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
  }

  
  .navbar-dark .navbar-nav .nav-link{
    font-weight: bold;
    color: #FFF;
    border: 2px solid transparent;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 1px;
    transition: all 0.2s ease-in-out;

    &.router-link-exact-active {
      color: #42b983;
      border-color: #42b983;
    }

    &:hover{
      color: #42b983;
      border-color: #42b983;
    }
  }

  .navbar-dark .navbar-nav .nav-link{
    @media(max-width: 991px){
      font-size: 1rem;

      &.router-link-exact-active {
        color: #42b983;
        border-color: transparent;
      }
    }
  }
</style>
