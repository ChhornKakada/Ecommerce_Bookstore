<script setup>
defineProps({
  headTitle: {
    type: String,
    required: true
  },
  para: {
    type: String,
    required: true
  },
  btnText: {
    type: String,
    required: true
  }
})
</script>

<template>
  <center>
    <div class="w-[80%] md:w-[60%] lg:w-[50%] py-12">
      <h1 class="text-[2rem] font-medium md:text-[2.5rem] tracking-wider">{{ headTitle }}</h1>
      <p class="my-6">{{ para }}</p>
      <button class="py-2 shadow-sm px-10 rounded-md hover:shadow-[#1B1E2B] border-2 bg-[#1B1E2B] text-[#F1F5F8]">{{ btnText }}</button>
    </div>
  </center>
</template>

