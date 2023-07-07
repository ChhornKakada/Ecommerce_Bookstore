<script>

export default {
  data() {
    return {
      booksOrder: [
        {
          title: 'Hello Beautiful',
          imgUrl: 'https://m.media-amazon.com/images/I/912iiFEK2wL.jpg',
          author: 'Chhorn Kakada',
          qty: 1,
          totalPrice: 12
        },
        {
          title: 'The Roughest Draft',
          imgUrl: 'https://m.media-amazon.com/images/I/A1TxlqsSuOL._AC_UF1000,1000_QL80_.jpg',
          author: 'Chhorn Kakada',
          qty: 1,
          totalPrice: 13
        },

      ]
    };
  },
  methods: {
    cancel() {
      history.back();
    },
  },
};
</script>

<template>
  <div class="flex justify-end mr-4 mt-4">
    <button
      @click="cancel"
      class="py-1 flex items-center border-2 gap-2 px-4 text-white hover:bg-blue-500 bg-blue-400 rounded-lg"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="w-6 h-6"
      >
        <path
          fill-rule="evenodd"
          d="M9.53 2.47a.75.75 0 010 1.06L4.81 8.25H15a6.75 6.75 0 010 13.5h-3a.75.75 0 010-1.5h3a5.25 5.25 0 100-10.5H4.81l4.72 4.72a.75.75 0 11-1.06 1.06l-6-6a.75.75 0 010-1.06l6-6a.75.75 0 011.06 0z"
          clip-rule="evenodd"
        />
      </svg>
      Go Back
    </button>
  </div>

  <!-- main -->

  <div class="w-[80%] mx-auto ">
    <h1 class="text-[2.2rem] font-bold tracking-wider mb-4">Your Card</h1>

    <div class="xl:flex">
      <!-- left -->
      <div class="xl:w-1/2">
        <p class="pb-6">
          Not ready to checkout? 
          <RouterLink to="/shop" class="text-[#1D4ED8] font-medium hover:underline">Continue shopping</RouterLink>
        </p>

        <!-- a book -->
        <div v-for="book in booksOrder" :key="book">
          <div class="flex w-full gap-8 border-b-2 pb-4 mb-6">
            <div class="w-[25%] md:w-[150px]">
              <img
                :src="book.imgUrl"
                alt=""
                class="aspect-[3/4] sm:aspect-[3/3.2] md:aspect-square object-cover rounded-md shadow-lg"
              />
            </div>
            <div class="grow flex-col justify-end">
              <div>
                <h2 class="text-[1.5rem] font-medium">{{ book.title }}</h2>

                <p>Quantity: {{ book.qty }}</p>
                <div class="flex justify-between items-center">
                  <p class="text-[2rem]">${{ book.totalPrice }}</p>
                  <p>By {{ book.author }}</p>
                </div>
              </div>

              <div class="flex justify-end">
                <p class="underline">Remove</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- right -->
      <div class="xl:pl-36 xl:w-1/2 xl:mb-0 mb-6">
        <div class="text-[1.5rem] font-bold tracking-wider">Discount</div>
        <form action="#">
          <input type="text" class="w-full py-3 border border-black pl-4 my-6" placeholder="Enter coupon code here">
          <div class="flex justify-between">
            <p>Subtotal</p>
            <p>$25</p>
          </div>
          <div class="flex justify-between mt-2 border-b pb-4 mb-4 border-black">
            <p>Shipping</p>
            <p class="text-gray-500">Calculate at the next step</p>
          </div>
          <div class="flex justify-between font-bold mb-8">
            <p>Total</p>
            <p class="">$25</p>
          </div>
          <button class="text-center w-full text-white tracking-wider bg-[#0D0D0D] py-4">Continue to Checkout</button>
        </form>
      </div>
    </div>
  </div>
</template>