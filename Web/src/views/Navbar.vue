<script>
import { ref } from "vue";
import FooterView from "./FooterView.vue";
import Auth from "./Auth.vue";

export default {
  components: { FooterView, Auth },
  data() {
    return {
      isLogin: false,
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
  methods: {},
};
</script>



<template>
  <header class="shadow-lg bg-white w-full sticky top-0">
    <nav
      v-show="simpleShow"
      class="flex w-[80%] text-[1.3rem] tracking-widest pt-4 mx-auto justify-between"
    >
      <!-- left side -->
      <div class="md:flex md:w-4/5 lg:w-[70%]">
        <div class="flex gap-4 items-center">
          <!-- menu -->
          <button
            class="md:hidden flex items-center justify-end h-[4rem]"
            @click="open"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-8 h-8"
            >
              <path
                fill-rule="evenodd"
                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
          <!-- logo -->
          <div
            class="flex items-center self-center justify-between md:w-1/6 h-[4rem]"
          >
            <h1 class="text-[2rem] tracking-wider text-[#102A42]">D2K</h1>
          </div>
        </div>

        <div
          :class="isOpen ? '' : 'hidden'"
          class="py-4 md:py-0 md:flex md:w-5/6 justify-evenly items-center MenuList"
        >
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/" @click="open">Home</RouterLink>
          </div>
          <div class="hover:text-[#FF0000] hover:underline">
            <RouterLink to="/shop" @click="open">Shop</RouterLink>
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
      <div
        class="flex items-center gap-4 md:gap-10 w-1/3 md:w-1/5 justify-end h-[4rem] lg:w-[30%]"
      >
        <button>
          <RouterLink to="/checkout" @click="open">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-8 h-8"
            >
              <path
                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
              /></svg
          ></RouterLink>
        </button>

        <button>
          <!-- <RouterLink to="/login">Login</RouterLink> -->
          <button @click="isLogin = true">Login</button>
        </button>
      </div>
    </nav>
  </header>

  <!-- for displaying main UI in any page -->
  <RouterView />
  <Auth v-show="isLogin" @cancel="isLogin = false"></Auth>
</template>