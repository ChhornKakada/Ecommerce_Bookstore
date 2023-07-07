<template>
  <!-- form -->
  <form action="#" class="px-12">
    <h1 class="text-[1.7rem] font-bold text-center">Sign in to your account</h1>
    <div class="mt-6">
      <label for="email-input">Email</label><br />
      <input
        class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2"
        id="email-input"
        type="email"
        name="email-inputted"
        placeholder="name@gmail.com"
      />
    </div>
    <div class="mt-6">
      <label for="email-input">Password</label><br />
      <input
        class="border-2 rounded-md w-full py-2 pl-2 focus:border-blue-500 mt-2"
        id="email-input"
        type="password"
        name="email-inputted"
        placeholder="******"
      />
    </div>
    <div class="flex justify-between mt-6">
      <div class="flex items-center">
        <input
          class="mr-3 w-[20px] h-[20px] border-2"
          type="checkbox"
          name="sameadr"
          id="rememberMe"
        />
        <label for="rememberMe">Remember Me</label>
      </div>

      <a href="#" class="text-[#1D4ED8] font-medium hover:underline">
        Forget Password?
      </a>
    </div>
    <div class="mt-6">
      <button
        class="w-full p-2 text-white bg-[#225CFF] hover:bg-[#1D4ED8] tracking-wider rounded-lg font-medium"
      >
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