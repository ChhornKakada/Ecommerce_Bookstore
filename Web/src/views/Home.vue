<script setup>
// import cateImg from '../components/homePage/categoryImg.vue'
import headerBox from "../components/homePage/HeaderBox.vue";
// import latestBook from '../components/homePage/LatestArrivalBook.vue'
import book from "../components/homePage/BookWithTitle.vue";
import axios from "axios";
import { onMounted, ref } from "vue";

const books = ref([]);
const latestBooks = ref([]);
const genres = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get("http://localhost:3000/book/latest/3");
    // give the value of the books equals to the data that fetched from API
    latestBooks.value = response.data;
  } catch (err) {
    console.error(err);
  }
});

onMounted(async () => {
  try {
    const response = await axios.get("http://localhost:3000/book/list/3");
    books.value = response.data;
  } catch (err) {
    console.log(err);
  }
});


onMounted(async () => {
  try {
    const response = await axios.get("http://localhost:3000/genre/list/3");
    genres.value = response.data;
  } catch (err) {
    console.log(err);
  }
});


</script>


<template>
  <main>
    <div>
      <img
        src="../assets/images/cover.png"
        alt=""
        class="w-full aspect-[9/3.5] object-cover shadow-2xl"
      />
    </div>
    <!-- category -->
    <div class="mt-10">
      <headerBox
        headTitle="Category"
        para="A medium for recording information in the form of writing or images, typically composed of many pages (madeof papyrus, parchment, vellum, or paper) bound together and protected by a cover."
        btnText="See more"
      >
      </headerBox>

      <div
        class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full"
      >
        <div v-for:="item in genres">
          <book
            :imgPath="item.pictureUrl"
            :title="item.name"
            ratioSize="aspect-square"
          ></book>
        </div>
      </div>
    </div>
    <div></div>

    <!-- latest -->
    <div class="mt-10">
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
        <div v-for:="item in latestBooks">
          <book
            :imgPath="item.pictureUrl"
            ratioSize="aspect-[1/1.41]"
            :title="item.title"
          >
          </book>
        </div>
      </div>
    </div>

    <!-- our product (books) -->
    <div class="pb-20 mt-10">
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
        <div v-for:="item in books">
          <book
            :imgPath="item.pictureUrl"
            :title="item.title"
            ratioSize="aspect-[1/1.51]"
          ></book>
        </div>
      </div>
    </div>
  </main>
</template>
