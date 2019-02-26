<template>
  <ul class="icons" v-if="page">
    <li class="icon" v-for="(value, key, index) in page[0].acf" :key="index" v-if="index >= 2">
      <a :href="value"><font-awesome-icon :icon="[ 'fab', key ]" /></a>
    </li>
  </ul>
</template>

<script>
import axios from 'axios';

export default {
  name: "SocialLinks",
  data(){
    return{
      page: false
    }
  },
  created(){
    this.getPage();
  },
  mounted(){
    this.$emit('loaded');
  },
  methods:{
    getPage: function(){
      let $this = this;

      axios.get(`/wp-json/wp/v2/pages?slug=home`)
        .then(function (response) {
          $this.page = response.data;
        })
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .icons{
    list-style-type: none;
    padding-left: 0;

    .icon{
      display: inline-block;
      margin: 0 10px;
    }

    .svg-inline--fa{
      width: 2rem;
      height: 1.75rem;
      color: #FFF;
      transition: color 0.25s ease-in-out;

      &:hover{
        color: #42b983;
      }
    }
  }
</style>
