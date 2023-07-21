<script>
import Discount from '../components/checkout/Discount.vue'
import Shipping from '../components/checkout/Shipping.vue'
import Address from '../components/checkout/Address.vue'
import Payment from '../components/checkout/Payment.vue'
import { useCheckoutStore } from '../stores/CheckoutStore'


export default {
  components: {
    Discount, Address, Shipping, Payment
  },

  setup() {

    const checkoutStore = useCheckoutStore()

    const booksOrder = [
      {
        title: "Hello Beautiful",
        imgUrl: "https://m.media-amazon.com/images/I/912iiFEK2wL.jpg",
        author: "Chhorn Kakada",
        qty: 1,
        totalPrice: 12,
      },
      {
        title: "The Roughest Draft",
        imgUrl:
          "https://m.media-amazon.com/images/I/A1TxlqsSuOL._AC_UF1000,1000_QL80_.jpg",
        author: "Chhorn Kakada",
        qty: 1,
        totalPrice: 13,
      },
    ];
    const wrapperHeight = ""

    const cancel = () => {
      history.back();
    }

    return {
      booksOrder, wrapperHeight, cancel, checkoutStore
    }
  }
};
</script>

<template>
  <div class="flex justify-end mr-4 mt-4">
    <button @click="cancel" class="py-1 flex items-center gap-2 px-4 text-red-500 rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-12 h-12">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- main -->

  <div class="w-[80%] mx-auto mb-6">
    <h1 class="text-[2.2rem] font-bold tracking-wider mb-4">Your Cart</h1>

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
              <img :src="book.imgUrl" alt=""
                class="aspect-[3/4] sm:aspect-[3/3.2] md:aspect-square object-cover rounded-md shadow-lg" />
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
        <Discount />
        <!-- <Address/> -->
        <!-- <Shipping/> -->
        <!-- {{ checkoutStore.hello }} -->
        <!-- <Payment/> -->
      </div>
    </div>
  </div>
</template>