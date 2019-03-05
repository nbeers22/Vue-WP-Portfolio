<template>
  <div class="page-content">
    <div class="loading" v-if="!pageTitleLoaded">
      <img src="/wp-content/themes/vue-spa/images/loading.gif" alt="Loading Projects">
    </div>
    <PageTitle v-once page-slug="contact" v-on:content-loaded="pageTitleLoaded = $event" />
    <ContactForm v-if="pageTitleLoaded" v-cloak />
  </div>
</template>

<script>
  import PageTitle   from "@/components/PageTitle.vue";
  import ContactForm from "@/components/ContactForm.vue";

	export default {
	  name: "contact",
    components: {
      PageTitle,
      ContactForm
    },
    data() {
      return{
        pageTitleLoaded: false,
      }
    },
	};
</script>

<style lang="scss">
  [v-cloak]{
    display: none;
  }

  .form-container{
    margin-top: 30px;

    .form-control:focus{
      box-shadow: none;
    }

    .col-md-6, .col-md-12{
      padding-top: 15px;
      padding-bottom: 15px;
    }

    .form-group{
      position: relative;

      img{
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 20px;
        display: none;

        &.valid,&.invalid{
          display: block;
        }
      }
    }

    textarea{
      resize: none;
    }
  }
</style>
