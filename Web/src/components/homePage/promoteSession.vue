
<script>
import { defineProps } from 'vue';
import CateImg from '../components/homePage/CategoryImg.vue';
import HeaderBox from '../components/homePage/HeaderBox.vue';
import LatestBook from '../components/homePage/LatestArrivalBook.vue';
import Book from '../components/homePage/BookWithTitle.vue';

export default {
  components: {
    CateImg,
    HeaderBox,
    LatestBook,
    Book,
  },

  props: {
    headTitle: {
      type: String,
      required: true,
    },
    para: {
      type: String,
      required: true,
    },
    btnText: {
      type: String,
      required: true,
    },
    imgPath1: {
      type: String,
      required: true,
    },
    title1: {
      type: String,
      required: true,
    },
  },

  setup(props) {
    defineProps(props);
  },
};
</script>

<template>
  <div @click="emit('goTo')" class="mt-10">
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