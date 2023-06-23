<script setup>
// import cateImg from '../components/homePage/categoryImg.vue'
import headerBox from "../components/homePage/HeaderBox.vue";
// import latestBook from '../components/homePage/LatestArrivalBook.vue'
import book from "../components/homePage/BookWithTitle.vue";
import axios from "axios";
import { onMounted, ref } from "vue";

// to using pror u need to use reactive v-bind

const books = ref([]);
const latestBooks = ref([]);
const genres = ref([]);

// onMounted(async () => {
//   try {
//     const response = await axios.get("http://localhost:3000/book/latest/3");
//     // give the value of the books equals to the data that fetched from API
//     latestBooks.value = response.data;
//   } catch (err) {
//     console.error(err);
//   }
// });

// onMounted(async () => {
//   try {
//     const response = await axios.get("http://localhost:3000/book/list/3");
//     books.value = response.data;
//   } catch (err) {
//     console.log(err);
//   }
// });

// onMounted(async () => {
//   try {
//     const response = await axios.get("http://localhost:3000/genre/list/3");
//     genres.value = response.data;
//   } catch (err) {
//     console.log(err);
//   }
// });
</script>


<template>
  <main class="">
    <!-- cover -->
    <div class="relative">
      <img
        src="../assets/images/cover.png"
        class="w-full sm:aspect-[9/3.5] object-cover shadow-2xl h-[246px] sm:h-auto"
      />
      <h1
        class="hover:bg-opacity-90 absolute sm:text-xl md:text-2xl lg:text-3xl px-6 py-1 bg-opacity-60 
        bg-white text-center rounded-lg text-gray-600 top-1/2 left-1/2 
        -translate-x-1/2 -translate-y-1/2 "
      >
        Explore, Escape, Engage - Your Literary Journey Starts Here!
      </h1>
    </div>
    <!-- category -->
    <div class="sm:mt-10">
      <headerBox
        headTitle="Category"
        para="A medium for recording information in the form of writing or images, typically composed of many pages (madeof papyrus, parchment, vellum, or paper) bound together and protected by a cover."
        btnText="See more"
      >
      </headerBox>

      <div
        class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full"
      >
        <!-- <div v-for:="item in genres">
          <book
            :imgPath="item.pictureUrl"
            :title="item.name"
            ratioSize="aspect-square"
          ></book>
        </div> -->

        <book
          imgPath="https://i.pinimg.com/736x/90/09/ff/9009ff18b3e274ff3a400b7fb0d18821.jpg"
          title="Fantasy"
          ratioSize="aspect-square"
        ></book>

        <book
          imgPath="https://i.pinimg.com/564x/79/b8/77/79b87720b2cdcbdc285f6a4aee308373.jpg"
          title="Science Fiction"
          ratioSize="aspect-square"
        ></book>

        <book
          imgPath="https://i.pinimg.com/564x/b9/03/63/b903634269152fe6948b3869b2ad87c6.jpg"
          title="Mystery"
          ratioSize="aspect-square"
        ></book>
      </div>
    </div>
    <div></div>

    <!-- latest -->
    <div class="sm:mt-10">
      <div>
        <headerBox
          headTitle="Our latest arrivals"
          para="Here are the latest arrival books. Many more are store in this page. Find your favorite one by clicking the below button."
          btnText="See more"
        ></headerBox>
      </div>
      <div
        class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full"
      >
        <!-- <div v-for:="(item, index) in latestBooks" :key="index" 
        :class="index !== 1 ? 'mt-[80px]' : ''">
          <book 
            :imgPath="item.pictureUrl"
            ratioSize="aspect-[1/1.41]"
            :title="item.title"
          >
          </book>
        </div> -->

        <book
          class="mt-[80px]"
          imgPath="https://m.media-amazon.com/images/I/81xqWPg80+L._AC_UF1000,1000_QL80_.jpg"
          ratioSize="aspect-[1/1.41]"
          title="The Awe of God"
        >
        </book>
        <book
          imgPath="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1663869260l/61294937.jpg"
          ratioSize="aspect-[1/1.41]"
          title="The Adventures of Amina Al-Sirafi"
        >
        </book>
        <book
          class=" sm:mt-[80px]"
          imgPath="https://m.media-amazon.com/images/I/71KGi4O+u7L._AC_UF894,1000_QL80_.jpg"
          ratioSize="aspect-[1/1.41]"
          title="Next in Line"
        >
        </book>
      </div>
    </div>

    <!-- our product (books) -->
    <div class="pb-20 sm:mt-10">
      <div>
        <headerBox
          headTitle="Our Books"
          para="Many titles are sell in this website you serve the need of the customers. Our website give the customers with good product and services."
          btnText="See more"
        ></headerBox>
      </div>
      <div
        class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full"
      >
        <!-- <div v-for:="item in books">
          <book
            :imgPath="item.pictureUrl"
            :title="item.title"
            ratioSize="aspect-[1/1.51]"
          ></book>
        </div> -->
        <book
          imgPath="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3dO9dMvYMRms3LCS672Z6e6lilnIFrklwkbRG_WLDUBEf6GLW"
          title="I have lost my way"
          ratioSize="aspect-[1/1.51]"
        >
        </book>
        <book
          imgPath="https://m.media-amazon.com/images/I/612BYerla-L._AC_UF894,1000_QL80_.jpg"
          title="Fairy Tale"
          ratioSize="aspect-[1/1.51]"
        >
        </book>
        <book
          imgPath="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSPxMPUzwH-0cUd154h-lKCz0iTWlATwk9xPGfd6pBBK6FeXGCi"
          title="Who Moved My Cheese?"
          ratioSize="aspect-[1/1.51]"
        >
        </book>
      </div>
    </div>
  </main>
</template>
