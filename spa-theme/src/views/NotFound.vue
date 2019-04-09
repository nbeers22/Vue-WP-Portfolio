<template>
  <div class="page-container">
    <div class="page-content home not-found">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-10">
            <h1 class="page-title">This is not the page you are looking for</h1>
            <aside class="green-underline"></aside>
            <p class="text-center" style="margin-bottom:20px;"><img src="/wp-content/themes/vue-spa/images/yoda.png" alt="404 yoda" style="max-width:100%"></p>
            <a href="'/'"><button class="btn btn-primary"><font-awesome-icon icon="arrow-left" /> &nbsp;Go Home</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "notfound"
};
</script>

<style lang="scss">
  .error404 footer{
    display: none;
  }

  .not-found{
    h1,h3{
      color: #FFF;
    }
  }
</style>
