<template>
  <div v-if="ready">
    <form id="contact-form" v-on:submit.prevent="submitForm">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <div class="row form-container">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="first-name" name="first_name" class="form-control form-control-lg" @keyup="validateInput" required v-model="firstName">
                  <label for="first-name">First Name *</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="last_name" id="last-name" class="form-control form-control-lg" @keyup="validateInput" required v-model="lastName">
                  <label for="last-name">Last Name *</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="email" required @keyup="validateInput" v-model="email">
                  <label for="email">Email *</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="company" class="form-control form-control-lg" id="company" @keyup="validateInput" v-model="company">
                  <label for="company">Company</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group textarea">
                  <textarea class="form-control" id="messaage" name="message" rows="6" @keyup="validateInput" required v-model="message"></textarea>
                  <label for="message">Message *</label>
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
      autoFilled: 'is-autofilled'
    }
  },
  mounted(){
    this.showForm();
    this.autoCompleteListener();
  },
  methods:{
    showForm: function(){
      this.ready = true;

    },
    autoCompleteListener: function(){
      let $this = this;
      setTimeout(function(){
        const AUTOFILLED = 'is-autofilled'
        const onAutoFillStart = (el) => el.classList.add(AUTOFILLED)
        const onAutoFillCancel = (el) => el.classList.remove(AUTOFILLED)
        const onAnimationStart = ({ target, animationName }) => {
          if (/onAutoFillStart/.test(animationName)) {
            return onAutoFillStart(target)
          }else if(/onAutoFillCancel/.test(animationName)){
            return onAutoFillCancel(target)
          }
        }
        document.querySelectorAll('input,textarea').forEach( element => {
          element.addEventListener('animationstart', onAnimationStart)
        });
      },1000)
    },
    validateInput: function(event){
      let element = event.target;

      element.addEventListener("keyup", function (event) {
        this.value !== '' ? this.classList.add('filled') :  this.classList.remove('filled');

        if (this.validity.valid) {
          this.classList.add('valid')
          this.classList.remove('invalid');
        } else {
          this.classList.add('invalid');
          this.classList.remove('valid')
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
          alert(error);
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

  .form-group{
    background-color: #FFF;
    border-radius: 5px;

    label{
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      margin-bottom: 0;
      transition: all 0.2s ease-out;
    }

    &.textarea label{
      top: 15%;
    }

    input{
      background-repeat: no-repeat;
      background-position: right 10px center;
      font-size: 1rem;
      padding: 1.375rem 2rem 0.5rem 0.75rem;
      height: 3.125rem;
    }

    input.valid,textarea.valid,input.is-autofilled,textarea.is-autofilled{
      background-image: url(/wp-content/themes/vue-spa/images/check-circle-solid.png) !important;
      border: 2px solid #42b983;

      & + label{
        color: #42b983;
        font-weight: bold;
      }
    }

    input.invalid + label, textarea.invalid + label{
      color: #FF0000;
      font-weight: bold;
    }

    textarea{
      background-position: right 10px top 10px;
      background-repeat: no-repeat;
      padding: 2rem 2.5rem 1rem 0.75rem;
    }

    input.invalid, textarea.invalid{
      background-image: url(/wp-content/themes/vue-spa/images/times-circle-solid.png) !important;
      border: 2px solid #ff0000;
    }

    input:focus + label, input.filled + label, input.is-autofilled + label{
      font-size: 10px;
      text-transform: uppercase;
      top: 27%;
    }

    textarea:focus + label, textarea.filled + label, textarea.is-autofilled + label{
      font-size: 10px;
      text-transform: uppercase;
      top: 10%;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover
    textarea:-webkit-autofill:focus, {
      border: 1px solid #42b983;
      -webkit-text-fill-color: #333;
      background-color: #FFF;
    }

    @keyframes onAutoFillStart {  from {/**/}  to {/**/}}
    @keyframes onAutoFillCancel {  from {/**/}  to {/**/}}
    input:-webkit-autofill {
        // Expose a hook for JavaScript when autofill is shown
        // JavaScript can capture 'animationstart' events
        animation-name: onAutoFillStart;
        
        // Make the background color become yellow really slowly
        transition: background-color 50000s ease-in-out 0s;
    }
    input:not(:-webkit-autofill) {
        // Expose a hook for JS onAutoFillCancel
        // JavaScript can capture 'animationstart' events
        animation-name: onAutoFillCancel;
    }
  }

  #form-confirmation{
    background-color: #000;
    border-radius: 5px;
    border: 2px solid #42b983;
    padding: 30px;
    text-align: center;
    width: 90%;
    max-width: 400px;
    position: absolute;
    top: 35%;
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
