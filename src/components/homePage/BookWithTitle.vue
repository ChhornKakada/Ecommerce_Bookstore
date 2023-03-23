<script setup>
defineProps({
  imgPath: {
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div class="w-[220px] sm:w-[150px] md:w-[180px] lg:w-[220px] xl:w-[280px] 2xl:w-[320px]">
    <img :src="imgPath " alt="" class="shadow-xl rounded-md  aspect-[1/1.41] object-cover">
    <center>
      <h2 class="my-2 text-[1.2rem] tracking-wider">{{ title }}</h2>
    </center>
  </div>
</template>