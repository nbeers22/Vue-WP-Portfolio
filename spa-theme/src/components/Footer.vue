<template>
  <footer role="contentinfo" id="colophon" class="site-footer" :class="[ ['home'].includes($route.name) ? 'footer-home' : '' ]">
    <p>Built with love by Nathan Beers using <a href="https://vuejs.org">Vue.js</a> and the <a href="https://developer.wordpress.org/rest-api/">WordPress REST API</a></p>
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

    a{
      color: #42b983;;
      border-bottom: 1px solid #42b983;
      transition: font-weight 0.25s ease-in-out;

      &:hover{
        text-decoration: none;
        font-weight: 900;
      }
    }
  }
</style>
