import { defineStore } from "pinia";

export const useCheckoutStore = defineStore('checkoutStore', {
  state: () => ({
    state: 'discount',
    isShippingAlready: false,
    isPaymentAlready: false,
    notYetCompleteMsg: null,
    isCartEmpty: false,
    alreadyPaid: false,
    justCheckoutData: Object(),

  }),
  actions: {

    setJustCheckoutData(data) {
      this.justCheckoutData.name = data.name
    },

    setAlreadyPaid(boolean) {
      this.alreadyPaid = boolean
    },

    reset(){
      this.state = 'discount',
      this.isShippingAlready = false,
      this.isPaymentAlready = false,
      this.notYetCompleteMsg = null,
      this.isCartEmpty = false,
      this.alreadyPaid = false
    },

    setCartEmplty(boolean) {
      this.isCartEmpty = boolean
    },

    setNotYetCompleteMsg() {
      this.notYetCompleteMsg = 'Please fill this form first!'
    },

    resetNotYetCompleteMsg() {
      this.notYetCompleteMsg = null
    },

    toggleIsShippingAlready(boolean) {
      this.isShippingAlready = boolean
    },

    toggleIsPaymentAlready(boolean) {
      this.isPaymentAlready = boolean
    },
    
    addBookToCart(book) {
      this.cart.push(book);
    },

    goToDiscount() {
      this.state = 'discount'
    },
    goToCheckout() {
      this.state = 'address'
    },
    goToShipping() {
      this.state = 'shipping'
    },
    goToPayment() {
      this.state = 'payment'
    },
    payNow() {
      this.state = 'Already Paid'
    }
  }
})