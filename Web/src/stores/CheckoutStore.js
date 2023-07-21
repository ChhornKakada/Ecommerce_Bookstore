import { defineStore } from "pinia";

export const useCheckoutStore = defineStore('checkoutStore', {
  state: () => ({
    hello: 'Hell0 from Kakada'
  }),
  actions: {
    test() {
      this.hello = 'hello from Sacda'
    }
  }
})