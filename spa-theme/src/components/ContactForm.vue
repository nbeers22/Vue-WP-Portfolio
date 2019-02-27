<template>
  <form action="#">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="row form-container">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First Name *" @keyup="validateInput" required>
              <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
              <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Last Name *" @keyup="validateInput" required>
              <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
              <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Email *" required @keyup="validateInput">
              <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
              <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="company" class="form-control form-control-lg" placeholder="Company (optional)" @keyup="validateInput">
              <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
              <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea class="form-control" id="messaage" name="message" rows="6" placeholder="Message *" @keyup="validateInput" required></textarea>
              <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
              <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
            </div>
          </div>
          <div class="col-md-12 text-center">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  name: "contactForm",
  methods:{
    validateInput: function(event){
      let element = event.target;

      element.addEventListener("keyup", function (event) {
        if (element.validity.valid) {
          this.parentElement.querySelector('#invalid').classList.remove('invalid');
          this.parentElement.querySelector('#valid').classList.add('valid');
          this.style.border = '2px solid #42b983';
        } else {
          this.parentElement.querySelector('#valid').classList.remove('valid');
          this.parentElement.querySelector('#invalid').classList.add('invalid');
          this.style.border = '2px solid #ff0000';
        }
      });
    }
  }
    
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  
</style>
