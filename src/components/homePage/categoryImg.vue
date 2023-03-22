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
  <div>
    <img :src="imgPath " alt="" class="rounded-md w-[220px] sm:w-[150px] md:w-[180px] lg:w-[220px] xl:w-[280px] 2xl:w-[320px] aspect-square object-cover shadow-2xl">
    <center>
      <h2 class="my-2 tracking-wider text-[1.2rem]">{{ title }}</h2>
    </center>
  </div>
</template>