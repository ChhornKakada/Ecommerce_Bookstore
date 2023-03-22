<script setup>
defineProps({
  imgPath: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div>
    <img :src="imgPath " alt="" class="rounded-md w-[220px] sm:w-[150px] md:w-[180px] lg:w-[220px] xl:w-[280px] 2xl:w-[320px] aspect-[1/1.41] object-cover shadow-xl">
  </div>
</template>