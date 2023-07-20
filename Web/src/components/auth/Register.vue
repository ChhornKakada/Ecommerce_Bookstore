<script>
import { stringify } from 'postcss';
import auth from "@/libs/apis/auth";
import { useAttrs } from 'vue';
import axios from 'axios';


export default {
  data() {
    return {
      user: {
        email: '',
        name: '',
        password: '',
        password_confirmation: ''
      }

    }
  },

  methods: {
    async register(e) {
      e.preventDefault();
      var url = `${process.env.API_HOST}:${process.env.API_PORT}/api/register`;

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
            alert(data.message)
          } else {
            alert('success')
            this.$router.push(this.$route.fullPath);
          }
        }
      )

    }
  }

}

// }

</script>

<template>
  <!-- form -->
  <form action="/" @submit="register" method="POST" class="px-12">
    <h1 class="text-[1.7rem] font-bold text-center">Sign up your account</h1>
    <div class="mt-6">
      <label for="fullname">Fullname</label><br />
      <input class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2" id="fullname" type="text" name="name"
        placeholder="Chhorn Kakada" v-model="user.name" />
    </div>
    <div class="mt-6">
      <label for="email">Email</label><br />
      <input class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2" id="email" type="email" name="email"
        placeholder="name@gmail.com" v-model="user.email" />
    </div> 
    <div class="mt-6">
      <label for="email-input">Password</label><br />
      <input class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2" id="email-input" type="password"
        name="email-inputted" placeholder="******" v-model="user.password" />
    </div>
    <div class="mt-6">
      <label for="cf-passwd">Confirm Password</label><br />
      <input class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2" id="cf-passwd" type="password"
        name="cf-passwd" placeholder="******" v-model="user.password_confirmation" />
    </div>
    <div class="mt-6">
      <button type="submit"
        class="w-full p-2 text-white bg-[#225CFF] hover:bg-[#1D4ED8] tracking-wider rounded-lg font-medium">
        Sign Up
      </button>
    </div>
  </form>
  <!-- end login form -->

  <!-- go to login -->
  <div class="flex justify-center gap-2 mb-10 mt-6 text-center">
    Already have an account?
    <button @click="$emit('login')" class="text-[#1D4ED8] font-medium hover:underline">
      Sign In
    </button>
  </div>
  <!-- end for login -->
</template>