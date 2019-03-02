<template>
  <footer id="colophon" class="site-footer">
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
  
</style>
