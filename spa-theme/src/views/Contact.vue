<template>
  <div class="page-content">
    <PageTitle page-slug="contact" />
    <form action="#">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="row form-container">
            <div class="col-md-6">
              <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First Name">
            </div>
            <div class="col-md-6">
              <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Last Name">
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
            </div>
            <div class="col-md-6">
              <input type="text" name="company" class="form-control form-control-lg" placeholder="Company (optional)">
            </div>
            <div class="col-md-12">
              <textarea class="form-control" id="messaage" name="message" rows="6"></textarea>
            </div>
            <div class="col-md-12 text-center">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  // @ is an alias to /src
  import NavBar from "@/components/Navbar.vue";
  import PageTitle from "@/components/PageTitle.vue";

	export default {
	  name: "contact",
    components: {
      NavBar,
      PageTitle
    },
	};
</script>

<style lang="scss">
  .form-container{
    margin-top: 30px;

    .col-md-6, .col-md-12{
      padding-top: 15px;
      padding-bottom: 15px;
    }

    textarea{
      resize: none;
    }
  }
</style>
