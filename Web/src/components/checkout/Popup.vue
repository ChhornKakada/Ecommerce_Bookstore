<template>
  <div>
    <!-- Background overlay for the element behind the popup -->
    <div class="fixed inset-0 bg-gray-900 opacity-50"></div>

    <!-- Popup content -->
    <div class="fixed inset-0 flex items-center justify-center z-50">
      <div class="w-[90%] bg-white p-6 rounded-lg shadow-md">
        <!-- :style="{ width: popupWidth }"  -->
        <!-- Your popup content goes here -->
        <div class="w-full xl:flex">

          <!-- left -->
          <div class="border-2 w-full xl:w-1/2">
            <div class="flex items-center gap-4">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                  <path fill-rule="evenodd"
                    d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5zm6.61 10.936a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                    clip-rule="evenodd" />
                  <path
                    d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                </svg>
              </div>
              <div>
                <p>Order {{ data.orderId }}</p>
                <p> {{ data.customer }}</p>
              </div>
            </div>            
            <!-- <p> {{ totalPrice }}</p> -->
          </div>

          <!-- rigth -->
          <div class="border-2 w-full xl:w-1/2">
            <p> {{ data.shippingAddress.firstname }}</p>
            <p> {{ data.shippingCpn }}</p>
            <p> {{ data.orderDetails[0].title }}</p>
            <p> {{ data.totalPrice }}</p>
            <p> {{ data.paymentMethod }}</p>
          </div>
        </div>

        <!-- <router-link to="/checkout"> -->
        <button @click="$emit('closePopup')" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-md">
          Close
        </button>
        <!-- </router-link> -->

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // orderId: this.$route.params.id,
      // totalPrice: null
    };
  },
  // async created() {
  //   alert(this.orderId)
  //   const res = await fetch(`${process.env.API_URL}/api/orders/${this.orderId}`, {
  //     method: "GET",
  //     headers: {
  //       "Content-type": "application/json"
  //     },
  //   });
  //   const result = await res.json();
  //   // if "data" of result equal to 0
  //   // return result;
  //   this.totalPrice = result.data.totalPrice
  // }

  props: {
    // name: String,
    // data: {
    //   user: Object
    // }
    data: Object
  }
};
</script>
