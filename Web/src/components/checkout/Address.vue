<script>
import { useCheckoutStore } from '../../stores/CheckoutStore';
import local from '../../libs/apis/local';

export default {
  data() {
    return {
      checkoutStore: useCheckoutStore(),
      shippingAddress: {
        firstname: null,
        lastname: null,
        address: null,
        city: null,
        country: null,
        zipcode: null,
        optional: null,
        apartment: null
      },
    }
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      local.set('shipping', this.shippingAddress)
      this.checkoutStore.toggleIsShippingAlready(true)
      this.checkoutStore.goToShipping()
      this.checkoutStore.resetNotYetCompleteMsg()
    }
  },
  created() {
    var shipping = local.get('shipping')
    if (shipping) {
      this.shippingAddress.firstname = shipping.firstname
      this.shippingAddress.lastname = shipping.lastname
      this.shippingAddress.address = shipping.address
      this.shippingAddress.city = shipping.city
      this.shippingAddress.country = shipping.country
      this.shippingAddress.zipcode = shipping.zipcode
      this.shippingAddress.optional = shipping.optional
      this.shippingAddress.apartment = shipping.apartment
    }
  }
}
</script>


<template>
  <div class="w-full text-[1.2rem] font-bold tracking-wide">Shipping Address Information</div>
  <form @submit="handleSubmit">
    <div class="flex gap-4 mt-6">
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="First Name" v-model="shippingAddress.firstname" required/>
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="Last Name" v-model="shippingAddress.lastname" required/>
    </div>
    <input type="text" class="w-full py-3 border border-black pl-4 mt-4" placeholder="Address" v-model="shippingAddress.address" required />
    <input type="text" class="w-full py-3 border border-black pl-4 mt-4" placeholder="Apartment, suite, etc (optional)" v-model="shippingAddress.apartment"/>
    <div class="flex gap-4 mt-4">
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="Country" v-model="shippingAddress.country" required/>
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="City" v-model="shippingAddress.city" required />
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="Zipcode" v-model="shippingAddress.zipcode"  required/>
    </div>
    <input type="text" class="w-full py-3 border border-black pl-4 mt-4" placeholder="Another information" v-model="shippingAddress.optional" />
    <div class="my-6 flex items-center">
      <input type="checkbox" id="saveInfo" class="p-4 mr-4 border-2 w-6 h-6">
      <label for="saveInfo" class="text-[#979797]">Save Contact Information</label>
    </div>

    <button type="submit" class="shadow-sm w-full text-white hover:shadow-[#1B1E2B] border-2 tracking-wider bg-[#0D0D0D] py-4"
     >
      Continue to Shipping
    </button>
  </form>
</template>

