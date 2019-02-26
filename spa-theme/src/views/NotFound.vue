<template>
  <div class="page-container">
    <div class="page-content home">
      <h1>404</h1>
      <h3>Page Not Found</h3>
      <router-link :to="'/'"><button class="btn-btn-primary">Go Home</button></router-link>
    </div>
  </div>
</template>

<script>

export default {
  name: "notfound"
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
