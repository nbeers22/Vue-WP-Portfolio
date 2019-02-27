<template>
  <div class="page-content">
    <PageTitle page-slug="contact" />
    <ContactForm />
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
    }
	};
</script>

<style lang="scss">
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
