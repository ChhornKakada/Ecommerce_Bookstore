<script>
import { useAuthStore } from '../../stores/AuthStore';
import local from '../../libs/apis/local';
import { useCheckoutStore } from '../../stores/CheckoutStore';

export default {

  data() {
    return {
      user: {
        email: '',
        password: ''
      },
      authStore: useAuthStore(),
      checkoutStore: useCheckoutStore(),
      errorLogin: null
    }
  },

  methods: {
    async login(e) {
      e.preventDefault();
      var url = `${process.env.API_HOST}:${process.env.API_PORT}/api/login`;

      fetch(url, {
        method: "POST",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.user)
      }).then(
        async res => {
          console.log(res.status)
          if (res.status >= 300 || res.status < 200) {
            const data = await res.json();
            // alert(data.message)
            this.errorLogin = data.message
          } else {
            const data = await res.json();
            local.set('authToken', data.token);
            local.set('currectUser', data.user);
            this.authStore.alreadyLogin()
            if (this.authStore.isCheckout === true) {
              this.checkoutStore.goToCheckout();
            }
          }
        }
      )

    }
  }
}
</script>

<template>
  <!-- form -->
  <form action="#" class="px-12">
    <h1 class="text-[1.7rem] font-bold text-center">Sign in to your account</h1>
    <div class="mt-6">
      <label for="email-input">Email</label><br />
      <input class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2" id="email-input" type="email"
        name="email-inputted" placeholder="name@gmail.com" v-model="user.email" />
    </div>
    <div class="mt-6">
      <label for="email-input">Password</label><br />
      <input class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2" id="email-input" type="password"
        name="email-inputted" placeholder="******" v-model="user.password" />
    </div>
    <div v-if="errorLogin" class="text-red-500">{{ errorLogin }}</div>
    <div class="flex justify-between mt-6">
      <div class="flex items-center">
        <input class="mr-3 w-[20px] h-[20px] border-2" type="checkbox" name="sameadr" id="rememberMe" />
        <label for="rememberMe">Remember Me</label>
      </div>

      <a href="#" class="text-[#1D4ED8] font-medium hover:underline">
        Forget Password?
      </a>
    </div>
    <div class="mt-6">
      <button @click="login"
        class="w-full p-2 text-white bg-[#225CFF] hover:bg-[#1D4ED8] tracking-wider rounded-lg font-medium">
        Sign In
      </button>
    </div>
  </form>
  <!-- end login form -->

  <div class="mt-6 flex justify-center gap-2 mb-10">
    Don't have an account?
    <button @click="$emit('signup')" class="text-[#1D4ED8] font-medium hover:underline">
      Sign Up
    </button>
  </div>
  <!-- end for login -->
</template>