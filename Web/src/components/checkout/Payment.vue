<script>
import { ref, computed } from 'vue';
import { useCheckoutStore } from '../../stores/CheckoutStore';

export default {
  data() {
    return {
      creditCart: {
        cardNumber: null,
        cardholderName: null,
        month: null,
        year: null,
        cvv: null
      },
      paypal: {
        email: null,
        password: null
      },
      checkoutStore: useCheckoutStore(),
      currentYear: new Date().getFullYear(),
      months: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
      method: 'credit',
      tmp: null
    }
  },
  computed: {
    yearRange() {
      const range = 5;
      const startYear = this.currentYear - range;
      const endYear = this.currentYear + range;
      return Array.from({ length: endYear - startYear + 1 }, (_, index) => startYear + index);
    }
  },
  methods: {

    handleSubmit(e) {
      e.preventDefault();
      const payment = Object();
      if (this.method === 'credit') {
        payment.paymentMethodId = 1
        payment.payment = this.creditCart
      } else {
        payment.paymentMethodId = 2
        payment.payment = this.paypal
      }
      this.$emit('checkout', payment);
    }
  },
  created() {
  },
};
</script>

<template>
  <nav class="w-full flex gap-6">
    <button @click="method = 'credit'" :class="{ select: method === 'credit' }"
      class="w-2/5  py-2 border-2 border-[#003087] flex justify-center items-center gap-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
        <path fill-rule="evenodd"
          d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
          clip-rule="evenodd" />
      </svg>
      <p class="font-semibold">Credit Card</p>
    </button>
    <button @click="method = 'paypal'" :class="{ select: method === 'paypal' }"
      class="w-2/5 flex justify-center border-[#003087] py-2 border-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="px" viewBox="0 0 338.667 89.785"
        xmlns:v="https://vecta.io/nano">
        <g transform="translate(936.898 -21.779)">
          <path clip-path="none"
            d="M-828.604 39.734c-.697 0-1.289.506-1.398 1.195l-8.068 51.165a1.31 1.31 0 0 0 1.294 1.513h9.568c.696 0 1.289-.507 1.398-1.195l2.37-15.025c.108-.688.701-1.195 1.398-1.195h8.699c10.164 0 18.792-7.416 20.368-17.465 1.589-10.134-6.328-18.971-17.549-18.993zm9.301 11.422h6.96c5.73 0 7.596 3.381 7.006 7.12-.59 3.747-3.488 6.507-9.031 6.507h-7.084zm45.788 3.478c-2.416.009-5.196.504-8.317 1.804-7.159 2.984-10.597 9.151-12.057 13.647 0 0-4.647 13.717 5.852 21.253 0 0 9.737 7.255 20.698-.447l-.189 1.203a1.31 1.31 0 0 0 1.292 1.513h9.083c.697 0 1.289-.507 1.398-1.195l5.525-35.038a1.31 1.31 0 0 0-1.292-1.515h-9.083c-.697 0-1.29.507-1.398 1.195l-.297 1.886s-3.967-4.333-11.216-4.306zm.297 11.067c1.043 0 1.997.144 2.853.419 3.919 1.258 6.141 5.023 5.498 9.104-.793 5.025-4.914 8.725-10.199 8.725-1.042 0-1.996-.143-2.853-.418-3.918-1.258-6.154-5.023-5.511-9.104.793-5.025 4.927-8.727 10.212-8.727z"
            :fill="method === 'paypal' ? 'white' : '#003087'" />
          <!--  -->
          <path clip-path="none"
            d="M-697.804 39.734c-.697 0-1.289.506-1.398 1.195l-8.068 51.165a1.31 1.31 0 0 0 1.294 1.513h9.568c.696 0 1.289-.507 1.398-1.195l2.37-15.025c.108-.688.701-1.195 1.398-1.195h8.699c10.164 0 18.791-7.416 20.366-17.465 1.59-10.134-6.326-18.971-17.547-18.993zm9.301 11.422h6.96c5.73 0 7.596 3.381 7.006 7.12-.59 3.747-3.487 6.507-9.031 6.507h-7.084zm45.787 3.478c-2.416.009-5.196.504-8.317 1.804-7.159 2.984-10.597 9.151-12.057 13.647 0 0-4.645 13.717 5.854 21.253 0 0 9.735 7.255 20.697-.447l-.189 1.203a1.31 1.31 0 0 0 1.294 1.513h9.082c.697 0 1.289-.507 1.398-1.195l5.527-35.038a1.31 1.31 0 0 0-1.294-1.515h-9.083c-.697 0-1.29.507-1.398 1.195l-.297 1.886s-3.967-4.333-11.216-4.306zm.297 11.067c1.043 0 1.997.144 2.853.419 3.919 1.258 6.141 5.023 5.498 9.104-.793 5.025-4.914 8.725-10.199 8.725-1.042 0-1.996-.143-2.853-.418-3.918-1.258-6.154-5.023-5.511-9.104.793-5.025 4.927-8.727 10.212-8.727z"
            :fill="method === 'paypal' ? '#F1F5F8' : '#0070e0'" />
          <path clip-path="none"
            d="M-745.92 55.859c-.72 0-1.232.703-1.012 1.388l9.958 30.901-9.004 14.562c-.437.707.071 1.62.902 1.62h10.642a1.77 1.77 0 0 0 1.513-.854l27.811-46.007c.427-.707-.083-1.611-.909-1.611h-10.641a1.77 1.77 0 0 0-1.522.869l-10.947 18.482-5.557-18.345c-.181-.597-.732-1.006-1.355-1.006z"
            :fill="method === 'paypal' ? 'white' : '#003087'" />
          <path clip-path="none"
            d="M-609.107 39.734c-.696 0-1.289.507-1.398 1.195l-8.07 51.163a1.31 1.31 0 0 0 1.294 1.515h9.568c.696 0 1.289-.507 1.398-1.195l8.068-51.165a1.31 1.31 0 0 0-1.292-1.513z"
            :fill="method === 'paypal' ? '#F1F5F8' : '#0070e0'" />
          <path clip-path="none"
            d="M-908.37 39.734a2.59 2.59 0 0 0-2.556 2.185l-4.247 26.936c.198-1.258 1.282-2.185 2.556-2.185h12.445c12.525 0 23.153-9.137 25.095-21.519a20.76 20.76 0 0 0 .245-2.793c-3.183-1.669-6.922-2.624-11.019-2.624z"
            fill="#001c64" />
          <path clip-path="none"
            d="M-874.832 42.359a20.76 20.76 0 0 1-.245 2.793c-1.942 12.382-12.571 21.519-25.095 21.519h-12.445c-1.273 0-2.358.926-2.556 2.185l-3.905 24.752-2.446 15.528a2.1 2.1 0 0 0 2.075 2.43h13.508a2.59 2.59 0 0 0 2.556-2.185l3.558-22.567a2.59 2.59 0 0 1 2.558-2.185h7.953c12.525 0 23.153-9.137 25.095-21.519 1.379-8.788-3.047-16.784-10.611-20.75z"
            :fill="method === 'paypal' ? '#F1F5F8' : '#0070e0'" />
          <path clip-path="none"
            d="M-923.716 21.779c-1.273 0-2.358.926-2.556 2.183l-10.6 67.216c-.201 1.276.785 2.43 2.077 2.43h15.719l3.903-24.752 4.247-26.936a2.59 2.59 0 0 1 2.556-2.185h22.519c4.098 0 7.836.956 11.019 2.624.218-11.273-9.084-20.58-21.873-20.58z"
            :fill="method === 'paypal' ? 'white' : '#003087'" />
        </g>
      </svg>
    </button>

  </nav>

  <div class="w-full text-[1.2rem] font-bold tracking-wide py-4">Payment Details</div>
  <!-- paypal -->
  <form @submit="handleSubmit">
    <div v-if="method === 'paypal'">
      <input type="email" required class="mt-4 w-full py-3 border border-black pl-4" placeholder="Email"
        v-model="paypal.email" />
      <input type="password" required class="mt-4 w-full py-3 border border-black pl-4" placeholder="Password"
        v-model="paypal.password" />
    </div>

    <div v-else>
      <input type="text" v-model="creditCart.cardholderName" required class="mt-4 w-full py-3 border border-black pl-4"
        placeholder="Cardholder Name" />
      <input type="number" v-model="creditCart.cardNumber" required class="mt-4 w-full py-3 border border-black pl-4"
        placeholder="Card Number" />
      <div class="w-full flex gap-4 mt-4">
        <select name="month" id="month" required class="w-1/3 border border-black pl-4" v-model="creditCart.month">
          <option class="text-[#9CA3AF]" hidden disabled selected :value="tmp">Month</option>
          <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
        </select>
        <select name="year" id="year" required class="w-1/3 border border-black pl-4 py-3" v-model="creditCart.year">
          <option class="" disabled selected hidden :value="tmp">Year</option>
          <option v-for="year in yearRange" :key="year" :value="year">{{ year }}</option>
        </select>
        <input type="number" v-model="creditCart.cvv" required class="w-1/3 py-3 border border-black pl-4"
          placeholder="CVV" />
      </div>
      <div class="flex justify-between items-center mt-8">
        <label for="saveCard">Save card data for future payment</label>
        <label class="switch">
          <input type="checkbox" id="saveCard">
          <span class="slider round"></span>
        </label>
      </div>
    </div>

    <button type="submit"
      class="text-center shadow-sm mt-8 hover:shadow-[#1B1E2B] border-2 w-full text-white tracking-wider bg-[#0D0D0D] py-4">
      Pay Now
    </button>
  </form>
</template>

<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked+.slider {
  background-color: #2196F3;
}

input:focus+.slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.select {
  background: #003087;
  color: white;
  border-radius: 8px;
}
</style>
