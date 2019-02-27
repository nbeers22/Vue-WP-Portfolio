<template>
  <div class="page-container">
    <div class="page-content home">
      <PageTitle page-slug="home" />
      <SocialLinks v-on:loaded="socialLoaded = true" />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import SocialLinks from "@/components/SocialLinks.vue";
import PageTitle from "@/components/PageTitle.vue";
import NavBar from "@/components/Navbar.vue";

export default {
  name: "home",
  components: {
    SocialLinks,
    PageTitle,
    NavBar,
  },
  data(){
    return{
      socialLoaded: false
    }
  },
};
</script>

<style lang="scss">
  .page-container{
    height: 100vh;
    position: relative;
  }

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
