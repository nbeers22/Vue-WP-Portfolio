<template>
  <div class="page-container">
    <div class="page-content home">
      <PageTitle page-slug="home" />
    </div>
  </div>
</template>

<script>
import PageTitle   from "@/components/PageTitle.vue";

export default {
  name: "home",
  components: {
    PageTitle,
  }
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

    .page-subhead{
      margin-bottom: 15px;
    }
  }
</style>
