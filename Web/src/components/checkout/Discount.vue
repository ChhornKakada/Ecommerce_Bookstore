<script>
export default {

}
</script>

<template>
  <div class="w-full text-[1.5rem] font-bold tracking-wider">Discount</div>
  <form action="#">
    <input type="text" class="w-full py-3 border border-black pl-4 my-6" placeholder="Enter coupon code here" />
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
    <button class="text-center w-full text-white tracking-wider bg-[#0D0D0D] py-4">
      Continue to Checkout
    </button>
  </form>
</template>