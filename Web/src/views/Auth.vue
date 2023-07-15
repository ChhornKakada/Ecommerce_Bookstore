<script>
import Login from "../components/auth/Login.vue";
import Register from "../components/auth/Register.vue";

export default {
  data() {
    return {
      isLogin: true,
    };
  },
  methods: {
    cancel() {
      this.isLogin = true;
      history.back();
    },
  },
  components: {
    Login,
    Register,
  },
};
</script>

<template>
  <!-- popup for checkout -->
  <div
    id="checkoutPopup"
    class="relative z-10 block"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
  >
    <div
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
    ></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div
        class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
      >
        <div
          class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
        >
          <!-- card -->
          <div class="bg-white px-12 sm:p-6 sm:pb-4 rounded-[25px]">
            <div>
              <div class="flex justify-end px-4 pt-4">
                <button @click="$emit('cancel')">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-9 h-9 text-red-500"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>
              </div>

              <Login v-if="isLogin" @signup="isLogin = false" />
              <Register v-else @login="isLogin = true" />
            </div>

          </div>
          <!-- end card -->
        </div>
      </div>
    </div>
  </div>
  <!-- end popup table -->
</template>