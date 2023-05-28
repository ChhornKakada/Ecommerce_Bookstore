<script setup>
import cateImg from '../components/homePage/categoryImg.vue'
import headerBox from '../components/homePage/HeaderBox.vue'
import latestBook from '../components/homePage/LatestArrivalBook.vue'
import book from '../components/homePage/BookWithTitle.vue'

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
  },
  imgPath1: {
    type: String,
    required: true
  },
  title1: {
    
  }
})

</script>

<template>
  <div class="mt-10">
      <headerBox headTitle="Category"
        para="A medium for recording information in the form of writing or images, typically composed of many pages (madeof papyrus, parchment, vellum, or paper) bound together and protected by a cover."
        btnText="See more"></headerBox>
      
      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div>
          <cateImg imgPath="/src/assets/images/novel.png" title="Novel"></cateImg>
        </div>
        <div>
          <cateImg imgPath="/src/assets/images/science.png" title="Science"></cateImg>
        </div>
        <div>
          <cateImg imgPath="/src/assets/images/technology.png" title="Technology"></cateImg>
        </div>
      </div>
    </div>
</template>