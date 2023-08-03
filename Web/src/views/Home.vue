<script>
// import cateImg from '../components/homePage/categoryImg.vue'
import headerBox from "../components/homePage/HeaderBox.vue";
// import latestBook from '../components/homePage/LatestArrivalBook.vue'
import book from "../components/homePage/BookWithTitle.vue";
import axios from "axios";
import { onMounted, ref } from "vue";
import genreApi from '@/libs/apis/genre';
import bookApi from '@/libs/apis/book';

// to using pror u need to use reactive v-bind
export default {
  components: {
    headerBox,
    book,
  },

  data() {
    return {
      genres: [],
      books: [],
      latestBooks: []
    }
  },

  methods: {
    openCheckoutPopup() {
      document.getElementById("checkoutPopup").style.display = "block";
    },
    closeCheckoutPopup() {
      document.getElementById("checkoutPopup").style.display = "none";
    },
    goToBookDetail(bookId) {
      this.$router.push(`/book/${bookId}`);
    },
    goToGenre(genreId) {
      this.$router.push(`/shop/genre/${genreId}?page=1`);
    },

    goTo(genreId, sortBy, page) {
      this.$router.push(`/shop/genre/${genreId}?&sortBy=${sortBy}&page=${page}`);
    },
  },

  // mounted
  async mounted() {
    this.genres = await genreApi.all(3);
    this.books = await bookApi.all(3);
    this.latestBooks = await bookApi.all(3, "Latest");
  },
};  

</script>


<template>
  <main class="">
    <!-- cover -->
    <div class="relative z-15">
      <img src="../assets/images/cover.png"
        class="w-full sm:aspect-[9/3.5] object-cover shadow-2xl h-[246px] sm:h-auto " />
      <h1
        class="hover:bg-opacity-90 absolute sm:text-xl md:text-2xl lg:text-3xl px-6 py-1 bg-opacity-60 bg-white text-center rounded-lg text-gray-600 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        Explore, Escape, Engage - Your Literary Journey Starts Here!
      </h1>
    </div>
    <!-- category -->
    <div class="sm:mt-10">
      <headerBox headTitle="Genres"
        para="A medium for recording information in the form of writing or images, typically composed of many pages (madeof papyrus, parchment, vellum, or paper) bound together and protected by a cover."
        btnText="See more" @goTo="goTo(0, 'All', 1)">
      </headerBox>

      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div v-for:="item in genres.data">
          <book :imgPath="item.imgUrl" :title="item.type" ratioSize="aspect-square"
          @click="goToGenre(item.id)"></book>
        </div>
      </div>
    </div>
    <div></div>

    <!-- latest -->
    <div class="sm:mt-10">
      <div>
        <headerBox headTitle="Our latest arrivals"
          para="Here are the latest arrival books. Many more are store in this page. Find your favorite one by clicking the below button."
          btnText="See more"
          @goTo="goTo(0, 'New Arrival', 1)"></headerBox>
      </div>
      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div v-for:="(item, index) in latestBooks.data" :key="index" :class="index !== 1 ? 'mt-[80px]' : ''">
          <book :imgPath="item.imgs.front" ratioSize="aspect-[1/1.41]" :title="item.title" @click="goToBookDetail(item.id)">
          </book>
        </div>
      </div>
    </div>

    <!-- our product (books) -->
    <div class="pb-20 sm:mt-10">
      <div>
        <headerBox headTitle="Our Books"
          para="Many titles are sell in this website you serve the need of the customers. Our website give the customers with good product and services."
          btnText="See more"
          @goTo="goTo(0, 'All', 1)"></headerBox>
      </div>
      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div v-for:="item in books.data">
          <book :imgPath="item.imgs.front" :title="item.title" ratioSize="aspect-[1/1.51]"
          @click="goToBookDetail(item.id)"></book>
        </div>
      </div>
    </div>
  </main>
</template>
