<template>
  <div id="app">
    <navbar v-if="!['home'].includes($route.name)" />
    <router-view />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";

export default {
  components:{
    Navbar
  },
  // data(){
  //   return{

  //   }
  // },
  // methods:{

  // }
};
</script>

<style lang="scss">
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.page-content h1,.page-content h4{
  color: #FFF;
}

.page-content:not(.home){
  padding: 50px 0;
}
</style>
