<template>
  <nav class="navbar navbar-expand-lg navbar-light">
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
      navMenu: []
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
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  .navbar-light .navbar-nav .nav-link{
    font-weight: bold;
    color: #FFF;
    border: 2px solid transparent;
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
</style>
