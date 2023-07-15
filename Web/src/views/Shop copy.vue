<script>
import { onMounted, ref } from "vue";
import book from "../components/homePage/BookWithTitle.vue";
import genreApi from "@/libs/apis/genre";
import bookApi from "@/libs/apis/book";

export default {
  data() {
    return {
      // books: [
      //   {
      //     title: "One Of Us Is Dead",
      //     imgUrl:
      //       "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1636378079l/58482479.jpg",
      //     price: "12.99",
      //   },
      //   {
      //     title: "To Kill a Mockingbird",
      //     imgUrl:
      //       "https://m.media-amazon.com/images/I/81gepf1eMqL._AC_UF894,1000_QL80_.jpg",
      //     price: "10.75",
      //   },
      //   {
      //     title: "I Have Lost My Way",
      //     imgUrl:
      //       "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1518241340l/38474445.jpg",
      //     price: "9.50",
      //   },
      //   {
      //     title: "The Roughest Draft",
      //     imgUrl:
      //       "https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1656013307-a1txlqssuol-1656013278.jpg?crop=1xw:1xh;center,top&resize=980:*",
      //     price: "15",
      //   },
      //   {
      //     title: "She Who Became The Sun",
      //     imgUrl:
      //       "https://m.media-amazon.com/images/I/81PL8rNrikL._AC_UF894,1000_QL80_.jpg",
      //     price: "8.99",
      //   },
      //   {
      //     title: "The Third Wave",
      //     imgUrl: "https://m.media-amazon.com/images/I/51jGx7mADCL.jpg",
      //     price: "12.99",
      //   },
      //   {
      //     title: "Good Vibes Good Life",
      //     imgUrl:
      //       "https://m.media-amazon.com/images/I/51-noH62XpL._AC_UF1000,1000_QL80_.jpg",
      //     price: "9.99",
      //   },
      //   {
      //     title: "Meet Me In Another Life",
      //     imgUrl:
      //       "https://cdn.waterstones.com/bookjackets/large/9780/0083/9780008399818.jpg",
      //     price: "10.99",
      //   },
      //   {
      //     title: "Hello Beautiful",
      //     imgUrl: "https://m.media-amazon.com/images/I/51YGx8qVVXL.jpg",
      //     price: "12.75",
      //   },
      //   {
      //     title: "The Great Gatsby",
      //     imgUrl:
      //       "https://m.media-amazon.com/images/I/71FTb9X6wsL._AC_UF1000,1000_QL80_.jpg",
      //     price: "11",
      //   },
      // ],
      genres: [],
      books: [],
      row: 3,
      col: 5,
      sorts: ["Popular", "Trending", "New Arrival"],
      selectedGenre: this.$route.params.id,
      pageNumber: this.$route.query.page,
    };
  },
  methods: {
    async nextPage() {
      const nextPageNumber = this.books.meta.current_page + 1;
      if (nextPageNumber <= this.books.meta.last_page) {
        this.$router.push(
          `/shop/genre/${selectedGenre}?page=${nextPageNumber}`
        );
        await this.fetchGenresAndBooks();
      }
    },
    async prevPage() {
      const prevPageNumber = this.books.meta.current_page - 1;
      if (prevPageNumber >= 1) {
        this.$router.push(
          `/shop/genre/${this.selectedGenre}?page=${prevPageNumber}`
        );
        await this.fetchGenresAndBooks();
      }
    },

    async searchBookByGenre(genreId) {
      this.$router.push(`/shop/genre/${genreId}?page=1`);
      await this.fetchGenresAndBooks();
    },

    goToBookDetail(bookId) {
      this.$router.push(`/book/${bookId}`);
    },

    async fetchGenresAndBooks() {
      alert(`genreId = ${this.selectedGenre}, page = ${this.pageNumber}`);

      this.genres = await genreApi.all();
      this.books = await bookApi.byGenre(this.selectedGenre, this.pageNumber);
    },
  },

  computed() {
    (this.selectedGenre = this.$route.params.id),
    (this.pageNumber = this.$route.query.page);
  },

  created() {
    this.fetchGenresAndBooks();
  },
};
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
          <div v-for="genre in genres.data" :key="genre" class="lg:py-1">
            <div class="flex items-center tracking-wide mb-2">
              <div v-if="genre.id === selectedGenre">
                <input
                  type="radio"
                  :id="genre.id"
                  name="vehicle1"
                  class="mr-4 w-[20px] aspect-square"
                  :value="genre.id"
                  v-model="selectedGenre"
                  @change="searchBookByGenre(genre.id)"
                  checked
                />
              </div>
              <div v-else>
                <input
                  type="radio"
                  :id="genre.id"
                  name="vehicle1"
                  class="mr-4 w-[20px] aspect-square"
                  v-model="selectedGenre"
                  :value="genre.id"
                  @click="searchBookByGenre(genre.id)"
                />
              </div>
              <label :for="genre.id" class="whitespace-nowrap">{{
                genre.type
              }}</label
              ><br />
            </div>
          </div>
          <p>Selected Genre: {{ selectedGenre }}</p>
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
                  name="sortBy"
                  id="sortBy"
                  class="bg-[#F1F5F8] bg-opacity-0 font-bold selection:border-none"
                >
                  <option v-for="sort in sorts" :key="sort" :value="sort">
                    {{ sort }}
                  </option>
                </select>
              </form>
            </div>
          </div>
          <div class="flex justify-end">
            <p class="font-semibold py-2">
              Showing {{ books.meta.total }} Books
            </p>
          </div>
        </div>

        <!-- books list -->
        <div class="border-black">
          <div v-for="i in row" :key="i">
            <div
              class="grid grid-rows grid-flow-col rounded-lg p-2 overflow-auto gap-[20px] mb-10 border-red-500"
            >
              <div
                v-for="j in col"
                :key="j"
                class="w-[180px] xl:w-[200px] 2xl:w-[220px] mb-2 border-green-500 hover:text-blue-700"
              >
                <!-- <router-link
                  :to="`/book/${books.data[(i - 1) * col + (j - 1)].id}`"
                > -->
                <div
                  v-if="(i - 1) * col + (j - 1) < books.data.length"
                  @click="
                    goToBookDetail(books.data[(i - 1) * col + (j - 1)].id)
                  "
                >
                  <img
                    :src="books.data[(i - 1) * col + (j - 1)].imgUrl"
                    :alt="books.data[(i - 1) * col + (j - 1)].title"
                    class="rounded-lg shadow-xl w-full aspect-[3/4.5] object-cover hover:shadow-xl hover:border-black hover:border-2"
                  />
                  <p class="font-semibold pt-2">
                    {{ books.data[(i - 1) * col + (j - 1)].title }}
                  </p>
                  <p class="py">
                    ${{ books.data[(i - 1) * col + (j - 1)].price }}
                  </p>
                </div>
                <!-- </router-link> -->
              </div>

              <!-- end a book -->
            </div>
          </div>

          <!-- more books -->
          <div class="flex justify-center gap-8">
            <button @click="prevPage()">Prev</button>
            <p>{{ books.meta.current_page }} / {{ books.meta.last_page }}</p>
            <button
              @click="nextPage()"
              class="hover:text-blue-700 hover:font-bold"
            >
              Next
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>