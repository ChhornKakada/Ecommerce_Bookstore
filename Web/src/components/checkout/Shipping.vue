<script>
import { useCheckoutStore } from '../../stores/CheckoutStore';
import local from '../../libs/apis/local';

export default {
  data() {
    return {
      checkoutStore: useCheckoutStore(),
      shippingCompany: 1
    }
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      // alert(this.shippingCompany)
      local.set('shippingCompany', this.shippingCompany)
      this.checkoutStore.resetNotYetCompleteMsg()
      this.checkoutStore.toggleIsPaymentAlready(true)
      this.checkoutStore.goToPayment()
    }
  }, 
  created() {
    var shipCom = local.get('shippingCompany');
    this.shippingCompany = shipCom ? shipCom : 1;
  }
}

</script>

<template>
  <!-- GNT -->
  <form @submit="handleSubmit">
    <div class="bg-white">
      <label for="gnt">
        <div class="py-4">
          <div class="pl-6 flex items-center gap-4">
            <input type="radio" id="gnt" class="w-6 h-6" name="shipping" v-model="shippingCompany" value="1" checked>
            <p class="text-[1.2rem] font-medium">GNT</p>
          </div>
          <div class="pl-16">
            <p>4-6 Business Days</p>
          </div>
        </div>
      </label>
    </div>
    <!-- ZTO -->
    <div class="bg-white mt-4">
      <label for="zto">
        <div class="py-4">
          <div class="pl-6 flex items-center gap-4">
            <input type="radio" id="zto" class="w-6 h-6" v-model="shippingCompany" name="shipping" value="2">
            <p class="text-[1.2rem] font-medium">ZTO</p>
          </div>
          <div class="pl-16">
            <p>3-5 Business Days</p>
          </div>
        </div>
      </label>
    </div>
    <button type="submit" class="py-4 shadow-sm mt-16 w-full  tracking-wider hover:shadow-[#1B1E2B] border-2 bg-[#0D0D0D] text-white">
      Continue to Payment
    </button>
  </form>
</template>