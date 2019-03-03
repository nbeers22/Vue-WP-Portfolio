<template>
  <div class="page-container">
    <div class="page-content home not-found">
      <h1>404</h1>
      <h3>Page Not Found</h3>
      <router-link :to="'/'"><button class="btn-btn-primary"><font-awesome-icon icon="arrow-left" /> &nbsp;Go Home</button></router-link>
    </div>
  </div>
</template>

<script>

export default {
  name: "notfound"
};
</script>

<style lang="scss">

  .not-found{
    h1,h3{
      color: #FFF;
    }
  }
</style>
