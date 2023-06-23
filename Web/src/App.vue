<script>
import { RouterLink, RouterView } from 'vue-router';
import Index from './views/index.vue';
import Checkout from './views/Checkout.vue';
import FooterView from './views/FooterView.vue'
import LoginPage from './views/LoginPage.vue';
export default {
  data() {
    return {
      isCheckingOut: false,
      isLogin: false,
    };
  },
  components: {
    Index,
    Checkout,
    FooterView,
    LoginPage
  },
};
</script>

<template>
  <header>
    <div>
      <Checkout @cancel="isCheckingOut = false" v-if="isCheckingOut" />
      <!-- <LoginPage v-else-if="isLogin" @cancel="isLogin = false"></LoginPage> -->
      <Index v-else @checkout="isCheckingOut = true" @login="isLogin = true"/>
      <!-- <Index v-else @checkout="isCheckingOut = true" /> -->
      
    </div>
  </header>
  <footer>
    <FooterView/>
  </footer>
</template>

