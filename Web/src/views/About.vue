<script>
import Card from '../components/about/Card.vue'
export default {
  components: {
    Card
  },
  data() {
    return {
      cards: [
        {
          title: 'Our Mission',
          text: 'Our mission is simple yet powerful – to promote a thriving reading culture among teenagers in Cambodia. We firmly believe that literacy is the foundation for personal growth and development. By fostering a love for reading, we aim to equip Cambodian youth with invaluable skills that will benefit them throughout their lives.',
          imgPath: '../assets/images/mission.png'
        },
        {
          title: 'Our Community',
          text: "We firmly believe that achieving our mission requires collaboration and unity. That's why we actively seek partnerships with schools, libraries, and organizations that share our dedication to education and literacy. By working together with the community, we aim to create a nurturing environment where reading thrives and knowledge is accessible to all.",
          imgPath: '../assets/images/earth.png'
        },
        {
          title: 'Our Vision ',
          text: "Looking ahead, we envision a future where every Cambodian teenager embraces the habit of reading. We see a society where books are not only sources of knowledge but also tools of empowerment and inspiration. Through our collective efforts, we aspire to contribute to a generation of well-informed, imaginative, and empathetic individuals who will shape a better tomorrow.",
          imgPath: '../assets/images/visionary.png'
        }
      ]
    }
  }
}
</script>

<template>
  <div class="w-[95%] 2sm:w-[80%] mx-auto">

    <!-- header -->
    <div class="xl:flex justify-between pt-24 py-12 items-start border-b-2 mb-12">
      <div class="w-full xl:w-1/2 text-center xl:text-left 2xl:pt-8 ">
        <h1 class="text-[2rem] font-semibold pb-4 ">About Us</h1>
        <h1 class="text-[1.2rem] tracking-widest font-medium">Empowering Cambodian Teens to Read More</h1>
        <p class="pt-6 text-gray-500">
          At D-double-K Bookstore, our story began with a passion for books and a deep-rooted desire to make a positive
          impact on the lives of young readers. The idea for this ecommerce bookstore sprouted from a personal experience
          that ignited our love for literature. We realized that books possess the power to transform minds, inspire
          creativity, and pave the way for a brighter future.
        </p>
      </div>
      <div class="hidden w-full xl:w-1/2 lg:flex xl:justify-end pt-8 xl:pt-0 justify-center">
        <img src="https://c1.wallpaperflare.com/preview/821/335/782/book-reading-hand-legs.jpg" alt=""
          class="w-[400px] border-2 rounded-[24px] shadow-2xl  xl:w-[80%]">
      </div>
    </div>
    <!-- end header -->

    <div class="lg:flex flex-wrap justify-center gap-12 lg:w-full w-[100%] mx-auto">
      <center v-for="card in cards" :key="card">
        <card class="mb-14 2sm:w-[380px] w-full" 
          :title="card.title" :text="card.text" :imgPath="card.imgPath"
        />
      </center>
    </div>

    <center class="py-12 text-gray-500">

    </center>
  </div>
</template>

