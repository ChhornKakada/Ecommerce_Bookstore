<template>
  <div>
    <!-- Background overlay for the element behind the popup -->
    <div class="fixed inset-0 bg-gray-900 opacity-50"></div>

    <!-- Popup content -->
    <div class="fixed inset-0 flex items-center justify-center z-50">
      <div class="w-[90%] bg-white p-6 rounded-lg shadow-md">
        <!-- :style="{ width: popupWidth }"  -->
        <!-- Your popup content goes here -->
        <div class="w-full max-h-[70vh] overflow-auto xl:flex px-12">

          <!-- left -->
          <div class="w-full xl:w-1/2">
            <!-- thank -->
            <div class="flex items-center gap-4 border-b-2 p-4 md:px-8 xl:px-12 xl:py-4 ">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-24 h-24">
                  <path fill-rule="evenodd"
                    d="M6 3a3 3 0 00-3 3v12a3 3 0 003 3h12a3 3 0 003-3V6a3 3 0 00-3-3H6zm1.5 1.5a.75.75 0 00-.75.75V16.5a.75.75 0 001.085.67L12 15.089l4.165 2.083a.75.75 0 001.085-.671V5.25a.75.75 0 00-.75-.75h-9z"
                    clip-rule="evenodd" />
                </svg>
              </div>
              <div class="text-[1.5rem]">
                <p class="">Order {{ data.orderId }}</p>
                <p class="font-semibold">Thank you, {{ data.customer }}</p>
              </div>
            </div>
            <!-- confirm -->
            <div class="border-b-2 p-4 md:px-8 xl:px-12 xl:py-4">
              <p>Your order is confirmed.</p>
              <p>We've accepted your order and we're getting it ready.</p>
            </div>
            <!-- Customer Information -->
            <div class="border-b-2 p-4 md:px-8 xl:px-12 xl:py-4">
              <div class="text-[1.4rem] font-semibold tracking-wider">Customer Information</div>
              <!-- customer info -->
              <div class="md:flex gap-12">
                <!-- shipping -->
                <div class="w-full md:w-1/2 ">
                  <div>
                    <p class="text-[1.2rem] font-semibold pt-4 pb-2">Shipping Address</p>
                  </div>
                  <div>
                    <p class="font-medium">{{ data.shippingAddress.firstname }} {{ data.shippingAddress.lastname }}</p>
                    <p class="underline text-blue-800">{{ data.shippingAddress.address }}, {{ data.shippingAddress.city
                    }}, {{ data.shippingAddress.country }}, {{ data.shippingAddress.zipcode }}</p>
                  </div>
                </div>
                <!-- Billing -->
                <div class="w-full md:w-1/2">
                  <div>
                    <p class="text-[1.2rem] font-semibold pt-4 pb-2">Shipping Company</p>
                    <p v-if="data.shippingCpn === 'GNT'"><span class="font-semibold">GNT</span><span>(Estimated shipping
                        time of 3-6 days)</span></p>
                    <p v-if="data.shippingCpn === 'ZTO'"><span class="font-semibold">ZTO </span><span>(Estimated shipping
                        time of 4-7 days)</span></p>
                  </div>
                </div>
              </div>
              <!-- payment method -->
              <div class="w-full">
                <div>
                  <p class="text-[1.2rem] font-semibold pt-4 pb-2">Payment Method</p>
                  <div v-if="data.paymentMethod == 'Credit'">
                    <div class="flex gap-4">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                          <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                          <path fill-rule="evenodd"
                            d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                            clip-rule="evenodd" />
                        </svg>
                      </div>
                      <div>Ending with {{ data.cardNumber }} - <span class="font-semibold"> ${{ data.totalPrice.toFixed(2)
                      }}</span></div>
                    </div>
                  </div>
                  <div v-else>
                    <div class="flex gap-2">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="24px" viewBox="0 0 338.667 89.785"
                          xmlns:v="https://vecta.io/nano">
                          <g transform="translate(936.898 -21.779)">
                            <path clip-path="none"
                              d="M-828.604 39.734c-.697 0-1.289.506-1.398 1.195l-8.068 51.165a1.31 1.31 0 0 0 1.294 1.513h9.568c.696 0 1.289-.507 1.398-1.195l2.37-15.025c.108-.688.701-1.195 1.398-1.195h8.699c10.164 0 18.792-7.416 20.368-17.465 1.589-10.134-6.328-18.971-17.549-18.993zm9.301 11.422h6.96c5.73 0 7.596 3.381 7.006 7.12-.59 3.747-3.488 6.507-9.031 6.507h-7.084zm45.788 3.478c-2.416.009-5.196.504-8.317 1.804-7.159 2.984-10.597 9.151-12.057 13.647 0 0-4.647 13.717 5.852 21.253 0 0 9.737 7.255 20.698-.447l-.189 1.203a1.31 1.31 0 0 0 1.292 1.513h9.083c.697 0 1.289-.507 1.398-1.195l5.525-35.038a1.31 1.31 0 0 0-1.292-1.515h-9.083c-.697 0-1.29.507-1.398 1.195l-.297 1.886s-3.967-4.333-11.216-4.306zm.297 11.067c1.043 0 1.997.144 2.853.419 3.919 1.258 6.141 5.023 5.498 9.104-.793 5.025-4.914 8.725-10.199 8.725-1.042 0-1.996-.143-2.853-.418-3.918-1.258-6.154-5.023-5.511-9.104.793-5.025 4.927-8.727 10.212-8.727z"
                              fill="#003087" />
                            <path clip-path="none"
                              d="M-697.804 39.734c-.697 0-1.289.506-1.398 1.195l-8.068 51.165a1.31 1.31 0 0 0 1.294 1.513h9.568c.696 0 1.289-.507 1.398-1.195l2.37-15.025c.108-.688.701-1.195 1.398-1.195h8.699c10.164 0 18.791-7.416 20.366-17.465 1.59-10.134-6.326-18.971-17.547-18.993zm9.301 11.422h6.96c5.73 0 7.596 3.381 7.006 7.12-.59 3.747-3.487 6.507-9.031 6.507h-7.084zm45.787 3.478c-2.416.009-5.196.504-8.317 1.804-7.159 2.984-10.597 9.151-12.057 13.647 0 0-4.645 13.717 5.854 21.253 0 0 9.735 7.255 20.697-.447l-.189 1.203a1.31 1.31 0 0 0 1.294 1.513h9.082c.697 0 1.289-.507 1.398-1.195l5.527-35.038a1.31 1.31 0 0 0-1.294-1.515h-9.083c-.697 0-1.29.507-1.398 1.195l-.297 1.886s-3.967-4.333-11.216-4.306zm.297 11.067c1.043 0 1.997.144 2.853.419 3.919 1.258 6.141 5.023 5.498 9.104-.793 5.025-4.914 8.725-10.199 8.725-1.042 0-1.996-.143-2.853-.418-3.918-1.258-6.154-5.023-5.511-9.104.793-5.025 4.927-8.727 10.212-8.727z"
                              fill="#0070e0" />
                            <path clip-path="none"
                              d="M-745.92 55.859c-.72 0-1.232.703-1.012 1.388l9.958 30.901-9.004 14.562c-.437.707.071 1.62.902 1.62h10.642a1.77 1.77 0 0 0 1.513-.854l27.811-46.007c.427-.707-.083-1.611-.909-1.611h-10.641a1.77 1.77 0 0 0-1.522.869l-10.947 18.482-5.557-18.345c-.181-.597-.732-1.006-1.355-1.006z"
                              fill="#003087" />
                            <path clip-path="none"
                              d="M-609.107 39.734c-.696 0-1.289.507-1.398 1.195l-8.07 51.163a1.31 1.31 0 0 0 1.294 1.515h9.568c.696 0 1.289-.507 1.398-1.195l8.068-51.165a1.31 1.31 0 0 0-1.292-1.513z"
                              fill="#0070e0" />
                            <path clip-path="none"
                              d="M-908.37 39.734a2.59 2.59 0 0 0-2.556 2.185l-4.247 26.936c.198-1.258 1.282-2.185 2.556-2.185h12.445c12.525 0 23.153-9.137 25.095-21.519a20.76 20.76 0 0 0 .245-2.793c-3.183-1.669-6.922-2.624-11.019-2.624z"
                              fill="#001c64" />
                            <path clip-path="none"
                              d="M-874.832 42.359a20.76 20.76 0 0 1-.245 2.793c-1.942 12.382-12.571 21.519-25.095 21.519h-12.445c-1.273 0-2.358.926-2.556 2.185l-3.905 24.752-2.446 15.528a2.1 2.1 0 0 0 2.075 2.43h13.508a2.59 2.59 0 0 0 2.556-2.185l3.558-22.567a2.59 2.59 0 0 1 2.558-2.185h7.953c12.525 0 23.153-9.137 25.095-21.519 1.379-8.788-3.047-16.784-10.611-20.75z"
                              fill="#0070e0" />
                            <path clip-path="none"
                              d="M-923.716 21.779c-1.273 0-2.358.926-2.556 2.183l-10.6 67.216c-.201 1.276.785 2.43 2.077 2.43h15.719l3.903-24.752 4.247-26.936a2.59 2.59 0 0 1 2.556-2.185h22.519c4.098 0 7.836.956 11.019 2.624.218-11.273-9.084-20.58-21.873-20.58z"
                              fill="#003087" />
                          </g>
                        </svg>
                      </div>
                      <div>with {{ data.email }} - <span class="font-semibold"> ${{ data.totalPrice.toFixed(2)
                      }}</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- rigth -->
          <div class="w-full xl:w-1/2">

            <div class=" gap-4  p-4 md:px-8 xl:pl-24 xl:py-4">
              <div class="text-[1.5rem] xl:pt-2">
                <p v-if="data.orderDetails.length == 1" class="font-semibold">Summary ({{ data.orderDetails.length }}
                  item)</p>
                <p v-else class="font-semibold">Summary ({{ data.orderDetails.length }} items)</p>
              </div>
              <div class="py-4 font-semibold">You cart</div>
              <div class="overflow-auto">
                <div v-for="book in data.orderDetails" :key="book">
                  <div class="flex w-full gap-8 border-b-2 pb-4 mb-6">
                    <div class="w-[25%] md:w-[150px]">
                      <img :src="book.img" alt="book cover"
                        class="w-full aspect-[3/4] sm:aspect-[3/3.2] md:aspect-square object-cover rounded-md shadow-lg" />
                    </div>
                    <div class="grow flex-col justify-end">
                      <div>
                        <h2 class="text-[1.2rem] font-medium">{{ book.title }}</h2>

                        <div class="flex items-center gap-3">
                          <div class="">Quantity:</div>
                          <p class="text-[1.2rem] ">{{ book.quantity.qty }}</p>
                        </div>

                        <div class="flex justify-between items-center">
                          <p class="text-[1.5rem] font-semibold">${{ book.quantity.totalPrice.toFixed(2) }}</p>
                          <p class="text-gray-500">By <span class="font-medium">{{ book.author }}</span> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <!-- <p> {{ data.shippingAddress.firstname }}</p>
              <p> {{ data.shippingCpn }}</p>
              <p> {{ data.orderDetails[0].title }}</p>
              <p> {{ data.totalPrice }}</p>
              <p> {{ data.paymentMethod }}</p> -->
            </div>
          </div>

          <!-- <router-link to="/checkout"> -->
          <div class="flex justify-end w-full ">
            <button @click="$emit('closePopup')" class="border-2 hover:bg-red-800 bg-red-600 tracking-wider mt-4 px-4 py-2  text-white rounded-md">
            Close
          </button>
          </div>
          
          <!-- </router-link> -->

        </div>
      </div>
    </div>
</template>

<script>

export default {
  data() {
    return {

    };
  },

  methods: {
    // lastFourEnd(text) {
    //   return text.substr(-4)
    // }
  },

  // computed: {
  //   endCardNumber: this.data.cardNumber.substr(-4)
  // },

  props: {
    data: Object
  }
};
</script>
