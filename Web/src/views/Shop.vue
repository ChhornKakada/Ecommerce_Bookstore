<script>
import { onMounted, ref } from "vue";
import book from "../components/homePage/BookWithTitle.vue";
import genreApi from "@/libs/apis/genre";
import bookApi from "@/libs/apis/book";

export default {
  data() {
    return {
      genres: [],
      books: [],
      row: 3,
      col: 5,
      sorts: ["All", "Popular", "Trending", "New Arrival"],
      sortBy: this.$route.query.sortBy || 'All',
      selectedGenre: this.$route.params.id,
      currentPage: parseInt(this.$route.query.page),
      isLoading: false
    };
  },
  methods: {
    async nextPage() {
      // alert(`next: ${this.currentPage + 1}, last: ${this.books.meta.last_page}, genreId: ${this.selectedGenre}`)
      if (this.currentPage + 1 <= parseInt(this.books.last_page)) {
        this.currentPage += 1;
        this.$router.push(
          `/shop/genre/${this.selectedGenre}?page=${this.currentPage}`
        );
        await this.fetchGenresAndBooks();
      }
    },
    async prevPage() {
      if (this.currentPage - 1 >= 1) {
        this.currentPage -= 1;
        this.$router.push(
          `/shop/genre/${this.selectedGenre}?page=${this.currentPage}`
        );
        await this.fetchGenresAndBooks();
      }
    },

    async searchBook() {
      this.currentPage = 1;
      this.$router.push(`/shop/genre/${this.selectedGenre}?sortBy=${this.sortBy}`);
      await this.fetchGenresAndBooks();
    },

    goToBookDetail(bookId) {
      this.$router.push(`/book/${bookId}`);
    },

    async fetchGenresAndBooks() {
      this.genres = await genreApi.all();
      this.books = await bookApi.byGenre(
        this.selectedGenre,
        this.currentPage || 1,
        this.sortBy
      );
    },
  },

  created() {
    this.isLoading = true
    this.fetchGenresAndBooks();
    this.isLoading = false
  },
};
</script>

<template>
  <main class="w-[80%] mx-auto">
    <div v-if="isLoading == true">
      <span class="loader"></span>
    </div>
    <!-- header -->
    <div class="flex">
      <div class="w-full sm:w-[90%] md:w-[80%] lg:w-[70%] xl:w-[60%] 2xl:w-[50%]">
        <h1 class="text-[1.5rem] font-medium md:text-[2.5rem] tracking-wider py-6">
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
        <h2 class="text-[1.2rem] font-medium md:text-[1.2rem] tracking-wider mb-4 pt-4">
          Genres
        </h2>
        <form action="/" class="grid grid-rows-2 grid-flow-col overflow-auto gap-[20px] gap-y-0 lg:grid-flow-dense">
          <!-- test ctg -->
          <!-- test 10 time -->

          <div class="lg:py-1">
            <div class="flex items-center tracking-wide mb-2">
              <div v-if="selectedGenre === 0">
                <input type="radio" id="all" name="genre" class="mr-4 w-[20px] aspect-square" value="0"
                  v-model="selectedGenre" @change="searchBook" checked />
              </div>
              <div v-else>
                <input type="radio" id="all" name="genre" class="mr-4 w-[20px] aspect-square" value="0"
                  v-model="selectedGenre" @change="searchBook" />
              </div>
              <label for="all" class="whitespace-nowrap">
                All
              </label><br />
            </div>
          </div>

          <div v-for="genre in genres.data" :key="genre" class="lg:py-1">
            <div class="flex items-center tracking-wide mb-2">
              <div v-if="genre.id === selectedGenre">
                <input type="radio" :id="genre.id" :name="genre.id" class="mr-4 w-[20px] aspect-square" :value="genre.id"
                  v-model="selectedGenre" @change="searchBook" checked />
              </div>
              <div v-else>
                <input type="radio" :id="genre.id" :name="genre.id" class="mr-4 w-[20px] aspect-square" :value="genre.id"
                  v-model="selectedGenre" @change="searchBook" />
              </div>
              <label :for="genre.id" class="whitespace-nowrap">{{
                genre.type
              }}</label><br />
            </div>
          </div>
          <!-- <p>Selected Genre: {{ selectedGenre }}</p> -->
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
                <select @change="searchBook" name="sortBy" id="sortBy" v-model="sortBy" class="bg-[#F1F5F8] bg-opacity-0 font-bold selection:border-none">
                  <option v-for="sort in sorts" :key="sort" :value="sort">
                    {{ sort }}
                  </option>
                </select>
              </form>
            </div>
          </div>
          <div class="flex justify-end">
            <p class="font-semibold py-2">
              Showing {{ books.total }} Books
            </p>
          </div>
        </div>

        <!-- books list -->
        <div class="border-black">
          <div v-for="i in row" :key="i">
            <div
              class="grid grid-rows grid-flow-col rounded-lg p-2 shadow-md overflow-auto gap-[20px] mb-10 border-red-500">
              <div v-for="j in col" :key="j"
                class="w-[180px] xl:w-[200px] 2xl:w-[220px] mb-2 border-green-500 hover:text-blue-700">
                <div v-if="(i - 1) * col + (j - 1) < books.data.length" @click="
                  goToBookDetail(books.data[(i - 1) * col + (j - 1)].id)
                  ">
                  <img :src="books.data[(i - 1) * col + (j - 1)].imgs.front" :alt="books.data[(i - 1) * col + (j - 1)].title"
                    class="rounded-lg shadow-xl w-full aspect-[3/4.5] object-cover hover:shadow-xl hover:border-black hover:border-2" />
                  <p class="font-semibold pt-2">
                    {{ books.data[(i - 1) * col + (j - 1)].title }}
                  </p>
                  <p class="py">
                    ${{ books.data[(i - 1) * col + (j - 1)].price }}
                  </p>
                  <p class="py">
                    id: {{ books.data[(i - 1) * col + (j - 1)].id }}
                  </p>
                </div>
              </div>

              <!-- end a book -->
            </div>
          </div>

          <!-- more books -->
          <div class="flex justify-center gap-8">
            <button @click="prevPage" class="hover:text-blue-700 hover:font-bold">
              Prev
            </button>
            <p>{{ books.current_page }} / {{ books.last_page }}</p>
            <button @click="nextPage" class="hover:text-blue-700 hover:font-bold">
              Next
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>


<style>
.loader {
  width: 60px;
  height: 40px;
  position: relative;
  display: inline-block;
  --base-color: black; /*use your base color*/
}
.loader::before {
  content: '';  
  left: 0;
  top: 0;
  position: absolute;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background-color: black;
  background-image: radial-gradient(circle 8px at 18px 18px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 18px 0px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 0px 18px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 36px 18px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 18px 36px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 30px 5px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 30px 5px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 30px 30px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 5px 30px, var(--base-color) 100%, transparent 0), radial-gradient(circle 4px at 5px 5px, var(--base-color) 100%, transparent 0);
  background-repeat: no-repeat;
  box-sizing: border-box;
  animation: rotationBack 3s linear infinite;
}
.loader::after {
  content: '';  
  left: 35px;
  top: 15px;
  position: absolute;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: black;
  background-image: radial-gradient(circle 5px at 12px 12px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 12px 0px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 0px 12px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 24px 12px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 12px 24px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 20px 3px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 20px 3px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 20px 20px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 3px 20px, var(--base-color) 100%, transparent 0), radial-gradient(circle 2.5px at 3px 3px, var(--base-color) 100%, transparent 0);
  background-repeat: no-repeat;
  box-sizing: border-box;
  animation: rotationBack 4s linear infinite reverse;
}
@keyframes rotationBack {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }
}  
</style>