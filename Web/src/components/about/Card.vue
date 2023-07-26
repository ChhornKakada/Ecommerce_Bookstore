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
  <div class=" bg-white rounded-lg shadow-xl py-12">
    <center class="px-8">
      <div class="rounded-full w-[120px] aspect-square">
        <img :src="imgPath" alt="..." class="w-[110px]">
      </div>
      <h3 class="font-semibold tracking-wider text-[1.3rem] py-4">{{ title }}</h3>
      <p class="text-gray-500"> {{ text }} </p>
    </center>
  </div>
</template>