<script>
import { onMounted } from "vue";
import bookApi from "@/libs/apis/book";
export default {
  data() {
    return {
      bookId: this.$route.params.id,
      book: {},
    };
  },

  methods: {},

  async beforeCreate() {
    this.book = await bookApi.detail(this.$route.params.id);
  },
};
</script>


<template>
  <div class="w-[80%] border-2 mx-auto">
    <div></div>

    <!-- right -->
    <div class="w-full">
      <!-- title -->
      <div class="flex justify-between items-start border-2 text-[2rem] gap-4">
        <div class="border-2">
          <h1 class="font-semibold">{{ book.data.title }}</h1>
        </div>
        <div class="border-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
          </svg>
        </div>
      </div>
      <!-- end title -->

      <!-- price -->
      <div class="text-[1.2rem]">
        <p>${{ book.data.price }}</p>
      </div>
      <!-- end price -->

      <!-- desc -->
      <div class="mt-4">
        <p>{{ book.data.desc }}</p>
      </div>
      <!-- end desc -->

      <!-- author -->
      <div class="mt-2">
        <p>
          By <span class="font-semibold">{{ book.data.author.fullname }}</span>
        </p>
      </div>
      <!-- end author -->
    </div>

    <!-- button -->
    <div class="flex justify-between items-end w-full">
      <!-- left -->
      <div class="w-[70%] border-2">
        <div><button>Hello</button></div>
      </div>

      <!-- right -->
      <div class="w-[25%] border-2">
        <div>
          <p>Quantity</p>
        </div>
        <div class="border-2">
          <button>HI</button>
        </div>

      </div>

      <div>

       
      </div>
    </div>
  </div>
</template>


