<script>
import { onMounted } from "vue";
import bookApi from "@/libs/apis/book";
export default {
  data() {
    return {
      bookId: this.$route.params.id,
      book: {},
      qty: 1,
      pics: 4
    };
  },

  methods: {
    increase() {
      this.qty += 1
    },
    descrease() {
      if (this.qty !== 1) {
        this.qty -= 1
      }
    },

    cancel() {
      history.back();
    },
  },

  // beforeCreate || beforeMount
  async created() {
    this.book = await bookApi.detail(this.$route.params.id);
  },
};
</script>


<template>
  <!-- cancel -->
  <div class="flex justify-end mr-4 mt-4">
      <button @click="cancel" class="py-1 flex items-center gap-2 px-4 text-red-500 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-12 h-12">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <!-- end cancel -->

  <div class="w-[80%] lg:flex mb-8 mx-auto">
    <!-- left -->
    <div class="lg:w-1/2   hidden lg:block">
      <div class="grid grid-rows-2 pr-[20%] grid-flow-col rounded-lg overflow-auto gap-[20px] mb-10 border-red-500">
        <div v-for="i in pics" :key="i">
          <img :src="book.data.imgUrl" alt="" class="w-full  aspect-square rounded-lg object-cover">
        </div>
      </div>
    </div>

    <!-- right -->
    <div class="w-full lg:w-1/2">
      <div class="2xl:pr-[20%] w-full">
        <!-- title -->
        <div class="flex justify-between items-start  gap-4">
          <div class="">
            <h1 class="font-semibold  text-[1.5rem] xl:text-[1.6rem] 2xl:text-[1.7rem]">{{ book.data.title }}</h1>
            <div class="hidden lg:block text-[1.2rem]  justify-end font-medium">
              <p class="text-[1.5rem]">${{ book.data.price }}</p>
            </div>
          </div>
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
          </div>
        </div>
        <!-- end title -->

        <!-- img -->
        <div class="w-full mx-auto my-4 sm:hidden">
          <img :src="book.data.imgUrl" alt="" class="w-full aspect-[3/4] object-cover">
          <!-- price -->
          <div class="text-[1.3rem] flex justify-end font-medium">
            <p>${{ book.data.price }}</p>
          </div>
          <!-- end price -->
        </div>

        <!-- 4 pics -->
        <div class="hidden sm:block w-full  lg:hidden mt-6">
          <div class="grid grid-rows-2 grid-flow-col rounded-lg overflow-auto gap-[20px]  border-red-500">
            <div v-for="i in pics" :key="i">
              <img :src="book.data.imgUrl" alt="" class="w-full  border-black aspect-square rounded-lg object-cover">
            </div>
          </div>
          <div class="text-[1.5rem] py-4 flex justify-end font-medium">
            <p>${{ book.data.price }}</p>
          </div>
        </div>
        <!-- end img -->

        <!-- desc -->
        <div class="mt-4 pb-2 border-b-2">
          <p>{{ book.data.desc }}</p>
        </div>
        <!-- end desc -->

        <!-- author -->
        <div class="mt-4">
          <p>
            By <span class="font-semibold">{{ book.data.author.fullname }}</span>
          </p>
          <p>
            Genre: <span class="font-semibold">{{ book.data.genre.type }}</span>
          </p>
          <p>
            ISBN: <span class="font-semibold">{{ book.data.isbn }}</span>
          </p>
          <p>
            Published date: <span class="font-semibold">{{ book.data.publishedDate }}</span>
          </p>
        </div>
        <!-- end author -->



        <!-- button -->
        <div class="flex justify-between lg:pt-4 xl:pt-10 2xl-pt-14 3xl:pt-16  items-end w-full">
          <!-- left -->
          <div class="w-[70%]">
            <div>
              <button class="bg-[#0D0D0D] text-white w-full py-2">
                Add to Card -${{ book.data.price * qty }}
              </button>
            </div>
          </div>

          <!-- right -->
          <div class="w-[25%]">
            <div class="mb-2">
              <p class="text-gray-600">Quantity</p>
            </div>
            <div class="w-full py-1 border-2 border-[#0D0D0D] flex justify-evenly items-center">
              <button class="text-gray-600" @click="descrease">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>
              </button>
              <p class="text-[1.2rem]"> {{ qty }}</p>
              <button class="text-gray-600" @click="increase">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</template>


