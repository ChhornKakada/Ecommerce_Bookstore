<script>
import { useCheckoutStore } from '../../stores/CheckoutStore';
import { useAuthStore } from '../../stores/AuthStore';
export default {
  data() {
    return {
      checkoutStore: useCheckoutStore(),
      authStore: useAuthStore(),
      nothingToCheckout: null
    }
  },
  methods: {
    handleSubmit() {
      if (!this.checkoutStore.isCartEmpty) {
        const isLogin = this.authStore.isLoginOrNot();
        // alert(isLogin)
        if (isLogin) {
          this.checkoutStore.goToCheckout();
        } else if (isLogin == false) {
          this.authStore.fromCheckout();

          // the form login display only when not login and isAuth = true
          this.authStore.toggleIsAuth(true);
          this.authStore.notYetLogin()
        }
        this.nothingToCheckout = null
      } else {
        this.nothingToCheckout = 'Nothing to checkout!'
      }

    }
  },
  props: {
    totalPrice: String
  }
}
</script>

<template>
  <div class="w-full text-[1.5rem] font-bold tracking-wider">Discount</div>
  <div>
    <input type="text" class="w-full py-3 border border-black pl-4 my-6" placeholder="Enter coupon code here" />
    <div class="flex justify-between">
      <p>Subtotal</p>
      <p class="text-[1.2rem] font-semibold"> ${{ totalPrice }} </p>
    </div>
    <div class="flex justify-between mt-2 border-b pb-4 mb-4 border-black">
      <p>Shipping</p>
      <p class="text-gray-500">Calculate at the next step</p>
    </div>
    <div class="flex justify-between font-bold mb-8 items-center">
      <p>Total</p>
      <p class="text-[2rem]"> ${{ totalPrice }} </p>
    </div>

    <div v-if="nothingToCheckout != null" class="text-red-500 flex gap-2 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
        <path fill-rule="evenodd"
          d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
          clip-rule="evenodd" />
      </svg>
      <p>{{ nothingToCheckout }}</p>
    </div>
    
    <button class="py-4 shadow-sm w-full  tracking-wider hover:shadow-[#1B1E2B] border-2 bg-[#0D0D0D] text-white"
      @click="handleSubmit">
      Continue to Checkout
    </button>
</div></template>