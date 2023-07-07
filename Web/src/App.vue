<script>
// import Index from "./views/Index.vue";
import Navbar from "./views/Navbar.vue";
import FooterView from "./views/FooterView.vue";

export default {
  data() {
    return {
      isCheckingOut: false,
      isLogin: false,
    };
  },
  components: {
    FooterView, Navbar
  },

  // automaticlly check
  computed: {},
  methods: {}
};
</script>

<template>

  <header>
    <div class="">
      <Navbar/>
    </div>
  </header>

  <footer>
    <FooterView/>
  </footer>
</template>

