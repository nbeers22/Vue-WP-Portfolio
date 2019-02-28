<template>
  <div v-if="ready">
    <form id="contact-form" v-on:submit.prevent="submitForm">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <div class="row form-container">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First Name *" @keyup="validateInput" required v-model="firstName">
                  <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
                  <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Last Name *" @keyup="validateInput" required v-model="lastName">
                  <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
                  <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Email *" required @keyup="validateInput" v-model="email">
                  <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
                  <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="company" class="form-control form-control-lg" placeholder="Company (optional)" @keyup="validateInput" v-model="company">
                  <img id="valid" src="/wp-content/themes/vue-spa/images/check-circle-solid.png" alt="Valid">
                  <img id="invalid" src="/wp-content/themes/vue-spa/images/times-circle-solid.png" alt="Not Valid">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control" id="messaage" name="message" rows="6" placeholder="Message *" @keyup="validateInput" required v-model="message"></textarea>
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
      </div>
      <div id="form-confirmation">
        <h4>{{ confirmationMessage }}</h4>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "contactForm",
  data(){
    return{
      ready: false,
      firstName: '',
      lastName: '',
      email: '',
      company: '',
      message: '',
      confirmationMessage: 'Thank you. Your message has been received and you will be contacted shortly.',
    }
  },
  mounted(){
    this.showForm();
  },
  methods:{
    showForm: function(){
      this.ready = true;
    },
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
    },
    submitForm: function(){
      let $this = this;

      // Check validity of form before submission
      let form      = document.getElementById('contact-form');
      let allFields = form.querySelectorAll('input,textarea');

      allFields.forEach(function(element){
        if (!element.validity.valid) {
          element.classList.add('invalid');
          return false;
        }
      });

      // Send form data to PHP file
      axios.post('/wp-content/themes/vue-spa/contact.php', {
          firstName : this.firstName,
          lastName  : this.lastName,
          email     : this.email,
          company   : this.company,
          message   : this.message,
        })
        .then(function (response) {
          console.log(response)
          let timer = 0;

          document.getElementById('form-confirmation').classList.add('show');
          setInterval(function(){
            timer++;
            if (timer === 3) {
              document.getElementById('form-confirmation').classList.remove('show');
            }
          }, 1000);
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  }
    
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  form{
    position: relative;
  }

  #form-confirmation{
    background-color: #000;
    border-radius: 5px;
    border: 2px solid #42b983;
    padding: 30px;
    text-align: center;
    width: 90%;
    max-width: 400px;
    height: 0;
    position: absolute;
    top: 40%;
    left: 50%;
    opacity: 0;
    max-height: 0;
    overflow-y: hidden;
    transform: translate(-50%,-50%);
    transition: all 0.35s linear;

    &.show{
      max-height: 300px;
      opacity: 1;
    }

    h4{
      color: #42b983;
    }
  }
</style>
