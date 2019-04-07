<template>
  <footer role="contentinfo" id="colophon" class="site-footer" :class="[ ['home'].includes($route.name) ? 'footer-home' : '' ]">
    <p>Built with love by Nathan Beers using <br><a href="https://vuejs.org" target="_blank">Vue.js</a> and the <a href="https://developer.wordpress.org/rest-api/" target="_blank">WordPress REST API</a><br></p>
    <p>&copy; {{ currentYear }} All rights reserved.</p>
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
      border-bottom: 1px solid #FFF;
      color: #FFF;
      transition: all 0.25s ease-in-out;

      &:hover{
        text-decoration: none;
        color: #42b983;
        border-color: #42b983;
      }
    }
  }
</style>
