<template>
  <div id="app">
    <navbar />
    <transition name="fade">
      <router-view />
    </transition>
    <Footer />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

export default {
  components:{
    Navbar,
    Footer
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
  min-height: 100vh;
  position: relative;

  @media(max-height: 520px){
    min-height: 500px;
  }
}

body{
  min-height: 100vh;
  @media(max-width: 991px){
    background: #000 !important;
    background-attachment: unset !important;
  }
}

.page-content h1,.page-content h4{
  color: #FFF;
}

.page-content:not(.home){
  padding: 50px 0;

  @media(max-width: 991px){
    padding: 100px 0 50px;
  }
}

// Router transition
// .slide-fade-enter-active {
//   transition: all .8s ease;
// }

// .slide-fade-leave-active {
//   transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
// }

// .slide-fade-enter, .slide-fade-leave-to{
//   transform: translateX(40px);
//   opacity: 0;
// }
</style>
