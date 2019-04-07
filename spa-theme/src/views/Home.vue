<template>
  <div class="page-container">
    <div class="page-content home">
      <div class="loading" v-if="!pageTitleLoaded">
        <img src="/wp-content/themes/vue-spa/images/loading.gif" alt="Loading Projects">
      </div>
      <PageTitle v-once page-slug="home" v-on:content-loaded="pageTitleLoaded = $event" />
    </div>
  </div>
</template>

<script>
import PageTitle from "@/components/PageTitle.vue";

export default {
  name: "home",
  components: {
    PageTitle,
  },
  data() {
    return{
      pageTitleLoaded: false,
    }
  }
};
</script>

<style lang="scss">

  .page-content.home{
    width: 85%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);

    .page-subhead{
      margin-bottom: 15px;
    }
  }
</style>
