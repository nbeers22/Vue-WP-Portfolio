<template>
  <div class="page-content home">
    <PageTitle page-slug="home" />
    <NavBar />
  </div>
</template>

<script>
// @ is an alias to /src
import NavBar from "@/components/Navbar.vue";
import PageTitle from "@/components/PageTitle.vue";

export default {
  name: "home",
  components: {
    NavBar,
    PageTitle
  },
  data(){
    return{
      
    }
  },
  created(){
    
  },
};
</script>

<style lang="scss">
  .page-content.home{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);

    nav.navbar, .navbar-brand{
      display: none;
    }

    nav.navbar{
      display: block;

      li:first-child{
        display: none;
      }
    }
  }
</style>
