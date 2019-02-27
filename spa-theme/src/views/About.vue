<template>
  <div class="page-content">
    <PageTitle page-slug="about" />
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
