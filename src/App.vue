<script>
import { RouterLink, RouterView } from 'vue-router';
import Index from './views/index.vue';
import Checkout from './views/Checkout.vue';
import Login from './views/LoginPage.vue'
import FooterView from './views/FooterView.vue'
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
    FooterView
  },
};
</script>

<template>
  <header>
    <div>
      <Checkout @cancel="isCheckingOut = false" v-if="isCheckingOut" />
      <Index v-else @checkout="isCheckingOut = true" />
    </div>
  </header>
  <footer>
    <FooterView />
  </footer>
</template>

