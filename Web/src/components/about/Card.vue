<script>
export default {
  props: {
    imgPath: String,
    title: String,
    text: String
  }
}
</script>

<template>
  <div class=" bg-white rounded-lg shadow-xl pb-12 p-1">
    <center class="">
      <div class="rounded-full w-full">
        <img :src="imgPath" alt="..." class="w-full aspect-[5/2] object-cover rounded shadow-lg">
      </div>
      <div class="px-8">
        <h3 class="font-semibold tracking-wider text-[1.3rem] py-4">{{ title }}</h3>
      <p class="text-gray-500"> {{ text }} </p>
      </div>
      
    </center>
  </div>
</template>