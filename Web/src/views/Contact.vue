<template>
  <div class="w-[80%] justify-center mx-auto lg:flex py-6">
    <!-- contact us -->
    <div class="w-full sm:w-[90%] lg:w-full lg:mx-0 mx-auto lg:pr-[5%]">
      <h1 class="text-[2rem] font-medium md:text-[2.5rem] tracking-wider py-6">
        Contact Us
      </h1>
      <p class="text-gray-500">
        Welcome to our Contact page! We're here to assist you in any way we can.
        If you have any questions, inquiries, or feedback, please don't hesitate
        to reach out to us. Fill out the form below, and our dedicated team will
        get back to you as soon as possible. We appreciate your interest and
        look forward to hearing from you.
      </p>

      <!-- contact -->
      <div class="sm:pl-6 md:pl-12 py-10 lg:pl-6 xl:pl-12">
        <div class="flex gap-2 py-1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6"
          >
            <path
              fill-rule="evenodd"
              d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
              clip-rule="evenodd"
            />
          </svg>
          <a
            href="https://goo.gl/maps/Puy8zvcR7Ve9amYG8"
            class="hover:text-blue-700 hover:underline"
            >GX62+W5W, Saint 369, Phnom Penh 12358</a
          >
        </div>
        <div class="flex gap-2 py-1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6"
          >
            <path
              fill-rule="evenodd"
              d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
              clip-rule="evenodd"
            />
          </svg>
          <p>+855 17702078</p>
        </div>
        <div class="flex gap-2 py-1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6"
          >
            <path
              d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"
            />
            <path
              d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"
            />
          </svg>
          <p>chhornkakada22@gmail.com</p>
        </div>
      </div>
    </div>

    <!-- send email -->
    <form class="w-full sm:w-[90%] lg:w-full lg:mx-0 mx-auto lg:my-6 lg:pt-4">
      <div class="">
        <label for="name" class="text-[1.2rem] font-medium">Name</label> <br />
        <input
          class="w-full bg-white border-2 pl-4 rounded-lg py-2 mt-2"
          required
          pattern="[a-z]{2,20}"
          type="text"
          id="name"
          name="name"
          placeholder="Chhorn Kakada"
        />
      </div>

      <!-- for email -->
      <div class="pt-6">
        <label for="email" class="text-[1.2rem] font-medium">Email</label>
        <br />
        <input
          class="w-full bg-white border-2 pl-4 rounded-lg py-2 mt-2"
          required
          type="email"
          id="email"
          name="email"
          placeholder="chhornkakada22@gmail.com"
        />
      </div>
      <!-- for message -->
      <div class="pt-6">
        <label for="message" class="text-[1.2rem] font-medium">Message</label>
        <br />
        <textarea
          class="w-full bg-white border-2 pl-4 rounded-lg py-2 mt-2"
          id="message"
          rows="5"
          placeholder="Your message"
        ></textarea>
      </div>
      <button class="bg-[#337DF9] py-2 px-4 text-white rounded-md mt-4">
        Send Message
      </button>
    </form>
  </div>
</template>

<style>
svg:hover {
  color: red;
}
</style>
