import Vue     from "vue";
import App     from "./App.vue";
import router  from "./router";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import { library } from '@fortawesome/fontawesome-svg-core';
import { faArrowLeft,faEnvelope } from '@fortawesome/free-solid-svg-icons'
import { faTwitter,faLinkedin,faGithub } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faTwitter,faLinkedin,faGithub,faArrowLeft,faEnvelope)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
