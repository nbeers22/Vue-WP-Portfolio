<template>
  <footer id="colophon" class="site-footer" :class="[ ['home'].includes($route.name) ? 'footer-home' : '' ]">
    Built with love by Nathan Beers <br>&copy;{{ currentYear }}
  </footer>
</template>

<script>

export default {
  name: "Footer",
  data(){
    return{
      currentYear: false,
    }
  },
  created(){
    this.currentYear = new Date().getFullYear();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  #colophon{
    background-color: #333;
    padding: 50px 0;
    text-align: center;
    color: #FFF;
    font-size: 14px;
    clear: both;
    background-color: transparent;

    &.footer-home{
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  }
</style>
