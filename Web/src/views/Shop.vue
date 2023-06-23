<script setup>
import { onMounted, ref } from "vue";
import book from "../components/homePage/BookWithTitle.vue";
const genres = ref([
  "Mystery",
  "Science Fiction",
  "Fantasy",
  "Romance",
  "Thriller",
  "Historical Fiction",
  "Horror",
  "Biography",
  "Self-help",
  "Young Adult",
]);

const books = ref([
  {
    title: "One Of Us Is Dead",
    imgUrl:
      "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1636378079l/58482479.jpg",
    price: "12.99",
  },
  {
    title: "To Kill a Mockingbird",
    imgUrl:
      "https://m.media-amazon.com/images/I/81gepf1eMqL._AC_UF894,1000_QL80_.jpg",
    price: "10.75",
  },
  {
    title: "I Have Lost My Way",
    imgUrl:
      "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1518241340l/38474445.jpg",
    price: "9.50",
  },
  {
    title: "The Roughest Draft",
    imgUrl:
      "https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1656013307-a1txlqssuol-1656013278.jpg?crop=1xw:1xh;center,top&resize=980:*",
    price: "15",
  },
  {
    title: "She Who Became The Sun",
    imgUrl:
      "https://m.media-amazon.com/images/I/81PL8rNrikL._AC_UF894,1000_QL80_.jpg",
    price: "8.99",
  },
  {
    title: "The Third Wave",
    imgUrl: "https://m.media-amazon.com/images/I/51jGx7mADCL.jpg",
    price: "12.99",
  },
  {
    title: "Good Vibes Good Life",
    imgUrl:
      "https://m.media-amazon.com/images/I/51-noH62XpL._AC_UF1000,1000_QL80_.jpg",
    price: "9.99",
  },
  {
    title: "Meet Me In Another Life",
    imgUrl:
      "https://cdn.waterstones.com/bookjackets/large/9780/0083/9780008399818.jpg",
    price: "10.99",
  },
  {
    title: "Hello Beautiful",
    imgUrl: "https://m.media-amazon.com/images/I/51YGx8qVVXL.jpg",
    price: "12.75",
  },
  {
    title: "The Great Gatsby",
    imgUrl:
      "https://m.media-amazon.com/images/I/71FTb9X6wsL._AC_UF1000,1000_QL80_.jpg",
    price: "11",
  },
]);
</script>


<template>
  <main class="w-[80%] mx-auto">
    <!-- header -->
    <div class="flex">
      <div
        class="w-full sm:w-[90%] md:w-[80%] lg:w-[70%] xl:w-[60%] 2xl:w-[50%]"
      >
        <h1
          class="text-[1.5rem] font-medium md:text-[2.5rem] tracking-wider py-6"
        >
          Shop
        </h1>
        <p>
          Discover a diverse collection of books that cater to all interests and
          tastes. From bestsellers to hidden gems, find captivating reads that
          are currently trending and captivating readers worldwide.
        </p>
      </div>
      <div></div>
    </div>

    <!-- filter and booklist-->
    <div class="py-8 lg:flex">
      <!-- filters -->
      <div class="w-full lg:w-[30%] 2xl:w-[20%]">
        <h1 class="text-[1.5rem] font-medium md:text-[1.5rem] tracking-wider">
          Filters
        </h1>
        <h2
          class="text-[1.2rem] font-medium md:text-[1.2rem] tracking-wider mb-4 pt-4"
        >
          Categories
        </h2>
        <form
          action="/"
          class="grid grid-rows-2 grid-flow-col overflow-auto gap-[20px] gap-y-0 lg:grid-flow-dense"
        >
          <!-- test ctg -->
          <!-- test 10 time -->
          <div v-for="genre in genres" :key="genre" class="lg:py-1">
            <div class="flex items-center tracking-wide mb-2">
              <input
                type="radio"
                :id="genre"
                name="vehicle1"
                class="mr-4 w-[20px] aspect-square"
              />
              <label :for="genre" class="whitespace-nowrap">{{ genre }}</label
              ><br />
            </div>
          </div>
        </form>
      </div>
      <!-- end ctg -->

      <!-- book section -->
      <div class="w-full lg:w-[70%] 2xl:w-[80%]">
        <!-- sort -->
        <div class="mt-8 pb-4 lg:mt-0">
          <div class="w-full flex justify-end">
            <div class="flex gap-2 border border-black p-2 justify-center">
              <p>Sort By</p>
              <form action="/" class="">
                <select
                  name="cars"
                  id="cars"
                  class="bg-[#F1F5F8] bg-opacity-0 font-bold selection:border-none"
                >
                  <option value="volvo">Popular</option>
                  <option value="saab">Trending</option>
                  <option value="mercedes">New Arrival</option>
                  <option value="audi">Audi</option>
                </select>
              </form>
            </div>
          </div>
          <div class="flex justify-end">
            <p class="font-semibold py-2">Showing 1003 Books</p>
          </div>
        </div>

        <!-- end sort -->

        <!-- books list -->
        <div class="border-black">
          <div
            class="grid grid-rows-2 grid-flow-col overflow-auto gap-[20px] w-full border-red-500"
          >
            <div
              v-for="book in books"
              :key="book"
              class="w-[180px] xl:w-[200px] 2xl:w-[220px] mb-8 border-green-500"
            >
              <!-- a book -->
              <!-- <div class="w-full mb-8   border-green-500"> -->

              <img
                :src="book.imgUrl"
                alt="Popular Machinic"
                class="rounded-lg shadow-xl w-full aspect-[3/4.5] object-cover"
              />
              <p class="font-semibold pt-2">{{ book.title }}</p>
              <p class="py">${{ book.price }}</p>

              <!-- </div> -->
              <!-- end a book -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>