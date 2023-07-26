<script>
import HeaderBox from '../homePage/HeaderBox.vue'
export default {
  components: { HeaderBox }
}
</script>

<template>
  <div class="w-full">
    <center>
    <div class="w-[80%] md:w-[60%] lg:w-[50%] py-8">
      <img src="../../assets/images/Knowledge-amico.svg" alt="empty cart">
      <h1 class="text-[1.5rem] font-medium md:text-[1.5rem] tracking-wider "> Your cart list is empty.</h1>
      <p class="pb-4 text-gray-600">Search books on our shop...</p>
      <RouterLink to="/shop/genre/0?page=1" ><button @click="$emit('goTo')" class="py-2 shadow-sm px-10 rounded-md hover:shadow-[#4C87A6] border-2 bg-[#4C87A6] text-[#F1F5F8]">
        Shop Now
      </button></RouterLink>
      
    </div>
  </center>
  </div>
</template>