<script>
import Discount from "../components/checkout/Discount.vue";
import Shipping from "../components/checkout/Shipping.vue";
import Address from "../components/checkout/Address.vue";
import EmptyCart from "../components/checkout/EmptyCart.vue";
import Payment from "../components/checkout/Payment.vue";
import Popup from "../components/checkout/Popup.vue";
import { useCheckoutStore } from "../stores/CheckoutStore";
import local from "@/libs/apis/local";
import bookApi from "@/libs/apis/book";

export default {
  components: {
    Discount,
    Address,
    Shipping,
    Payment,
    EmptyCart,
    Popup,
  },

  data() {
    return {
      checkoutStore: useCheckoutStore(),
      cart: [],
      lastPath: null,
      isLoading: false,
      showPopup: false,
      checkoutData: {},
      emptyCartMsg: null,
    };
  },

  computed: {
    getTotalPrice() {
      var total = 0;
      for (let book of this.cart) {
        total += book.quantity.totalPrice;
      }
      return total.toFixed(2);
    },

    isCartEmpty() {
      if (this.cart.length == 0) {
        this.checkoutStore.setCartEmplty(true);
        return true;
      } else {
        this.checkoutStore.setCartEmplty(false);
        return false;
      }
    },
  },

  methods: {
    resetCheckout() {
      this.cart = [];
      local.remove("Cart");
      local.remove("shipping");
      this.checkoutStore.reset();
    },

    checkout(paymentFromChile) {
      if (this.cart.length == 0) {
        this.emptyCartMsg = "Nothing to checkout!";
      } else {
        // alert(paymentFromChile.paymentMethodId);
        var url = `${process.env.API_URL}/api/orders`;

        var user = local.get("currectUser");
        var customerId = user.id;

        var shippingCompany = local.get("shippingCompany");
        const paymentMethodId = paymentFromChile.paymentMethodId;
        const payment = paymentFromChile.payment;

        var shippingAddress = local.get("shipping");
        var orderDetails = local.get("Cart");
        var totalPrice = 0;
        for (let ele of orderDetails) {
          totalPrice += ele.totalPrice;
        }
        var priceAfterDiscount = totalPrice;

        // console.log(JSON.stringify({ customerId, shippingCompany, shippingAddress, paymentMethodId, payment, orderDetails, totalPrice, priceAfterDiscount }));
        fetch(url, {
          method: "POST",
          headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            customerId,
            shippingCompany,
            shippingAddress,
            paymentMethodId,
            payment,
            orderDetails,
            totalPrice,
            priceAfterDiscount,
          }),
        }).then(async (res) => {
          console.log(res.status);
          if (res.status >= 300 || res.status < 200) {
            const data = await res.json();
            // this.errorLogin = data.message
            console.log(data);
          } else {
            const data = await res.json();
            console.log(data);
            this.checkoutData.customer = user.name;
            this.checkoutData.orderId = data.orderId;
            this.checkoutData.shippingAddress = shippingAddress;
            this.checkoutData.shippingCpn =
              shippingCompany == 1 ? "ZTO" : "GNT";
            this.checkoutData.orderDetails = this.cart;
            this.checkoutData.totalPrice = totalPrice;
            if (paymentMethodId == 1) {
              this.checkoutData.paymentMethod = "Credit";
              this.checkoutData.cardNumber = payment.cardNumber;
            } else {
              this.checkoutData.paymentMethod = "Paypal";
              this.checkoutData.email = payment.email;
            }
            this.showPopup = true;
            this.emptyCartMsg = null;
            // this.clearCheckoutInLocal()
            this.resetCheckout();
            this.checkoutStore.updateCartQty()
            // this.$router.push(
            //   `/thank/${data.orderId}`
            // );
            // this.checkoutStore.setAlreadyPaid(true)
          }
        });
      }
    },

    cancel() {
      const link = this.lastPath ? this.lastPath : "/";
      this.$router.push(link);
    },

    // remove book from cart
    async remove(bookId) {
      // remove in localstorage
      local.removeBookFromCart("Cart", bookId);
      this.checkoutStore.increaseNumberInCart(-1);
      // remove in UI
      this.cart = this.cart.filter((book) => book.quantity.bookId !== bookId);
      this.checkoutStore.updateCartQty();
    },

    // increase book quantity
    increaseBookQty(bookId, qty, unitPirce) {
      for (let i = 0; i < this.cart.length; i++) {
        if (this.cart[i].quantity.bookId == bookId) {
          if (this.cart[i].quantity.qty + qty >= 1) {
            local.increaseQtyBookInCart("Cart", bookId, qty, unitPirce);
            this.cart[i].quantity.qty += qty;
            this.cart[i].quantity.totalPrice =
              this.cart[i].quantity.qty * this.cart[i].price;
          }
          break;
        }
      }
    },

    async getTheFirstData() {
      var tmpCart = local.get("Cart");
      if (tmpCart != null) {
        for (let item of tmpCart) {
          var data = await bookApi.detail(item.bookId);
          var book = {
            quantity: item,
            title: data.data.title,
            price: data.data.price,
            img: data.data.imgs.front,
            author: data.data.author.fullname,
          };
          this.cart.push(book);
        }
        var length = this.cart.length;
        this.isCartEmpty = length == 0 ? true : false;
      } else {
        this.isCartEmpty = true
      }
    },

    handleShpping() {
      if (this.checkoutStore.isShippingAlready) {
        this.checkoutStore.goToShipping();
      } else {
        this.checkoutStore.setNotYetCompleteMsg();
      }
    },

    handlePayment() {
      if (this.checkoutStore.isPaymentAlready) {
        this.checkoutStore.goToPayment();
      } else {
        this.checkoutStore.setNotYetCompleteMsg();
      }
    },
  },

  mounted() {
    this.isLoading = true;
    this.getTheFirstData();
    this.lastPath = this.$router.options.history.state.back;
    this.isLoading = false;
  },
};
</script>

<template>
  <div class="flex justify-end mr-4 mt-4">
    <button
      @click="cancel"
      class="py-1 flex items-center gap-2 px-4 text-red-500 rounded-lg"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-12 h-12"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M6 18L18 6M6 6l12 12"
        />
      </svg>
    </button>
  </div>

  <!-- main -->

  <div class="w-[80%] mx-auto mb-6 min-h-[100vh]">
    <h1
      v-if="checkoutStore.state === 'discount'"
      class="text-[2.2rem] font-bold tracking-wider mb-4"
    >
      Your Cart
    </h1>

    <div class="xl:flex">
      <!-- left -->
      <div class="xl:w-1/2">
        <h1
          v-if="checkoutStore.state !== 'discount'"
          class="text-[1.5rem] mt-12 font-bold tracking-wider mb-4"
        >
          Your Cart
        </h1>

        <div v-if="isLoading">
          <!-- <EmptyCart/> -->
          Loading...
        </div>
        <div v-else>
          <div v-if="!isCartEmpty">
            <p class="pb-6">
              Not ready to checkout?
              <RouterLink
                to="/shop/genre/0?page=1"
                class="text-[#1D4ED8] font-medium hover:underline"
                >Continue shopping
              </RouterLink>
            </p>

            <!-- a book -->
            <div v-for="book in cart" :key="book">
              <div class="flex w-full gap-8 border-b-2 pb-4 mb-6">
                <div class="w-[25%] md:w-[150px]">
                  <img
                    :src="book.img"
                    alt="book cover"
                    class="w-full aspect-[3/4] sm:aspect-[3/3.2] md:aspect-square object-cover rounded-md shadow-lg"
                  />
                </div>
                <div class="grow flex-col justify-end">
                  <div>
                    <h2 class="text-[1.5rem] font-medium">{{ book.title }}</h2>

                    <div class="flex items-center gap-3">
                      <div class="">Quantity:</div>
                      <button
                        @click="
                          increaseBookQty(book.quantity.bookId, -1, book.price)
                        "
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="w-4 h-4 text-gray-500"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 12h-15"
                          />
                        </svg>
                      </button>
                      <p class="text-[1.2rem]">{{ book.quantity.qty }}</p>
                      <button
                        @click="
                          increaseBookQty(book.quantity.bookId, 1, book.price)
                        "
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="w-4 h-4 text-gray-500"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15"
                          />
                        </svg>
                      </button>
                    </div>

                    <div class="flex justify-between items-center">
                      <p class="text-[2rem] font-semibold">
                        ${{ book.quantity.totalPrice.toFixed(2) }}
                      </p>
                      <p class="text-gray-500">
                        By <span class="font-medium">{{ book.author }}</span>
                      </p>
                    </div>
                  </div>

                  <div class="flex justify-end">
                    <button @click="remove(book.quantity.bookId)" class="">
                      <p class="hover:underline text-red-500 font-medium">
                        Remove
                      </p>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- empty card -->
          <div v-else>
            <div
              v-if="emptyCartMsg != null"
              class="text-red-500 flex gap-2 items-center"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-8 h-8"
              >
                <path
                  fill-rule="evenodd"
                  d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                  clip-rule="evenodd"
                />
              </svg>
              <p>{{ emptyCartMsg }}</p>
            </div>
            <EmptyCart />
          </div>
        </div>

        <!-- discount -->
        <form action="#" v-if="checkoutStore.state !== 'discount'">
          <input
            type="text"
            class="w-full py-3 border border-black pl-4 my-6"
            placeholder="Enter coupon code here"
          />
          <div class="flex justify-between">
            <p>Subtotal</p>
            <p class="text-[1.2rem] font-semibold">${{ getTotalPrice }}</p>
          </div>
          <div
            class="flex justify-between mt-2 border-b pb-4 mb-4 border-black"
          >
            <p>Shipping</p>
            <p class="text-gray-500">Calculate at the next step</p>
          </div>
          <div class="flex justify-between font-bold mb-8 items-center">
            <p>Total</p>
            <p class="text-[2rem]">${{ getTotalPrice }}</p>
          </div>
        </form>
      </div>

      <!-- right -->
      <div class="xl:pl-36 xl:w-1/2 xl:mb-0 mb-6">
        <Discount
          v-if="checkoutStore.state === 'discount'"
          :totalPrice="getTotalPrice"
        />
        <div v-else class="text-[1.2rem] font-medium">
          <div class="w-full text-[2rem] font-bold tracking-wider">
            Checkout
          </div>
          <div class="flex items-center gap-4 mt-4">
            <button
              :class="{ selected: checkoutStore.state === 'address' }"
              @click="checkoutStore.goToCheckout"
              class="hover:underline"
            >
              Address
            </button>
            <div class="grow">
              <div class="w-full h-[2px] bg-black"></div>
            </div>
            <button
              :class="{ selected: checkoutStore.state === 'shipping' }"
              @click="handleShpping"
              class="hover:underline"
            >
              Shipping
            </button>
            <div class="grow">
              <div class="w-full h-[2px] bg-black"></div>
            </div>
            <button
              :class="{ selected: checkoutStore.state === 'payment' }"
              @click="handlePayment"
              class="hover:underline"
            >
              Payment
            </button>
          </div>
          <div class="mb-12 text-red-500 text-[1rem] font-normal">
            <div
              v-if="checkoutStore.notYetCompleteMsg != null"
              class="flex gap-4 items-center"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-6 h-6"
              >
                <path
                  fill-rule="evenodd"
                  d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                  clip-rule="evenodd"
                />
              </svg>
              <p>{{ checkoutStore.notYetCompleteMsg }}</p>
            </div>
          </div>
        </div>

        <Address v-if="checkoutStore.state === 'address'" />
        <Shipping v-if="checkoutStore.state === 'shipping'" />
        <Payment
          v-if="checkoutStore.state === 'payment'"
          @checkout="checkout"
        />
      </div>
    </div>
  </div>

  <div v-if="showPopup">
    <Popup @closePopup="showPopup = false" :data="checkoutData" />
  </div>
</template>

<style>
.selected {
  /* color: #003087; */
  color: #004bd3;
  font-size: 1.3rem;
}
</style>
