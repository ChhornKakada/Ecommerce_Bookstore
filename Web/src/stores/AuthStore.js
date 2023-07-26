import { defineStore } from "pinia";
import local from "../libs/apis/local";

export const useAuthStore = defineStore('authStore', {
  state: () => ({
    isAuth: false,
    isLogin: local.get('authToken') ? true : false,
    isCheckout: false
  }),

  getters: {
    loginValue(){
      var login = local.get('authToken') ? true : false
      alert(login)
      return login
    }
  },

  actions: {
    fromCheckout() {
      this.isCheckout = true
    },

    isLoginOrNot() {
      var login = local.get('authToken')
      if (login === null) {
        return false
      } 
      return true
    },

    alreadyLogin() {
      this.isLogin = true
    },

    notYetLogin() {
      this.isLogin = false
    },

    toggleIsAuth(boolean) {
      this.isAuth = boolean
    }
   }
})