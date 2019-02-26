<template>
  <div id="app">
    <navbar v-if="!['home'].includes($route.name)" />
    <transition name="slide-fade">
      <router-view />
    </transition>
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";

export default {
  components:{
    Navbar
  },
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
// Router transition
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(40px);
  opacity: 0;
}
</style>
