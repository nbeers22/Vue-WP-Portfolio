<template>
  <div class="page-content">
    <div class="loading" v-if="!pageTitleLoaded">
      <img src="/wp-content/themes/vue-spa/images/loading.gif" alt="Loading Projects">
    </div>
    <PageTitle page-slug="about" v-on:content-loaded="pageTitleLoaded = $event" />
  </div>
</template>

<script>
  // @ is an alias to /src
  import NavBar from "@/components/Navbar.vue";
  import PageTitle from "@/components/PageTitle.vue";

  export default {
    name: "about",
    components: {
      NavBar,
      PageTitle
    },
    data() {
      return{
        pageTitleLoaded: false,
      }
    }
  };
</script>

<style lang="scss">
  .quote{
    margin-top: 1rem;
    font-style: italic;
    font-size: 1rem;
    font-weight: bold;
  }
</style>
