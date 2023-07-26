<script>
import { ref } from "vue";
import FooterView from "./FooterView.vue";
import Auth from "./Auth.vue";
import { useAuthStore } from "../stores/AuthStore";
import local from "../libs/apis/local";
import { useCheckoutStore } from "../stores/CheckoutStore";

export default {
  components: { FooterView, Auth },
  data() {
    return {
      isLogin: false,
      genreId: 0,
      pageNumber: 1,
      authStore: useAuthStore(),
      useCheckoutStore: useCheckoutStore()
    };
  },
  setup() {
    const isOpen = ref(false);

    const open = () => {
      isOpen.value = !isOpen.value;
    };

    return {
      isOpen,
      open,
    };
  },
  computed: {
    simpleShow() {
      if (this.$route.path === "/checkout") {
        return false;
      } else {
        return true;
      }
    },
  },
  methods: {
    logout() {
      if (confirm("Do you really wish to logout?") == true) {
        local.remove('authToken');
        local.remove('currectUser');
        this.authStore.notYetLogin();
        this.authStore.toggleIsAuth(false)
        this.useCheckoutStore.goToDiscount()
      }
    },
    handleCancel() {
      this.authStore.toggleIsAuth(false);
      this.useCheckoutStore.goToDiscount();
    }
  },
};
</script>



<template>
  <header class="shadow-lg bg-white w-full sticky top-0">
    <nav v-show="simpleShow" class="flex w-[80%] text-[1.3rem] tracking-widest pt-4 mx-auto justify-between">
      <!-- left side -->
      <div class="md:flex md:w-4/5 lg:w-[70%]">
        <div class="flex gap-4 items-center">
          <!-- menu -->
          <button class="animate-bounce md:hidden flex items-center justify-end h-[4rem]" @click="open">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path fill-rule="evenodd"
                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                clip-rule="evenodd" />
            </svg>
          </button>
          <!-- logo -->
          <div class="flex items-center self-center justify-between md:w-1/6 h-[4rem]">
            <h1 class="text-[2rem] tracking-wider text-[#102A42]">D2K</h1>
          </div>
        </div>

        <div :class="isOpen ? '' : 'hidden'" class="py-4 md:py-0 md:flex md:w-5/6 justify-evenly items-center MenuList">
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/" @click="open">Home</RouterLink>
          </div>
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/shop/genre/0?page=1" @click="open">Shop</RouterLink>
          </div>
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/about" @click="open">About</RouterLink>
          </div>
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/event" @click="open">Event</RouterLink>
          </div>
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/contact" @click="open">Contact</RouterLink>
          </div>
        </div>
      </div>

      <!-- checkout -->
      <div class="flex items-center gap-4 md:gap-10 w-1/3 md:w-1/5 justify-end h-[4rem] lg:w-[30%]">
        <button>
          <RouterLink to="/checkout" @click="open">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path
                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
            </svg>
          </RouterLink>
        </button>

        <div>
          <!-- <RouterLink to="/login">Login</RouterLink> -->
          <!-- <button></button> -->
          <button v-if="authStore.isLogin" @click="logout"
            class="flex gap-2 items-center hover:text-[#FF0000]  px-4 py-1 rounded-lg ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd"
                d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z"
                clip-rule="evenodd" />
            </svg>
            <div>Logout</div>
          </button>
          <button v-else @click="authStore.toggleIsAuth(true)"
            class="flex gap-2 items-center hover:text-[#FF0000]  px-4 py-1 rounded-lg ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd"
                d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z"
                clip-rule="evenodd" />
            </svg>
            <div>Login</div>
          </button>
        </div>
      </div>
    </nav>
  </header>

  <!-- for displaying main UI in any page -->
  <RouterView />
  <Auth v-show="authStore.isAuth && !authStore.isLogin" @cancel="handleCancel"></Auth></template>