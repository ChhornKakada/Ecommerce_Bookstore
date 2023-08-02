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
          text: "At D2K-Bookstore, our mission is to promote a thriving reading culture among teenagers in Cambodia. We firmly believe that literacy is the foundation for personal growth and development. By fostering a love for reading, we aim to equip Cambodian youth with invaluable skills that will benefit them throughout their lives. Through carefully curated books, we strive to empower and inspire the younger generation, breaking down barriers to access and promoting local voices and traditions. Together, we envision a well-informed and enlightened generation that can contribute positively to their communities and embrace a brighter future. Join us on this journey to shape Cambodia's youth through the transformative power of books.",
          imgPath: '../../assets/images/mission.png'
        },
        {
          title: 'Our Community',
          text: "We firmly believe that achieving our mission requires collaboration and unity. That's why we actively seek partnerships with schools, libraries, and organizations that share our dedication to education and literacy. By working together with the community, we aim to create a nurturing environment where reading thrives and knowledge is accessible to all.",
          imgPath: '../../assets/images/earth.png'
        },
        {
          title: 'Our Vision ',
          text: "Looking ahead, we envision a future where every Cambodian teenager embraces the habit of reading. We see a society where books are not only sources of knowledge but also tools of empowerment and inspiration. Through our collective efforts, we aspire to contribute to a generation of well-informed, imaginative, and empathetic individuals who will shape a better tomorrow.",
          imgPath: '../../assets/images/visionary.png'
        }
      ]
    }
  }
}
</script>

<template>
  <main>
    <!-- cover -->
    <div class="lg:relative">
      <img src="https://wallpapercave.com/wp/wp4430576.jpg"
        class="w-full sm:aspect-[9/3.5] object-cover shadow-2xl h-[246px] sm:h-auto" />
      <div
        class="w-full h-full flex justify-center items-center lg:absolute sm:text-xl lg:px-[152px] py-1 lg:bg-opacity-60 lg:bg-black text-center rounded-lg lg:text-white lg:top-1/2 lg:left-1/2 lg:-translate-x-1/2 lg:-translate-y-1/2">
        <div class="lg:bg-black rounded-lg px-12 lg:bg-opacity-60">
          <h1 class="md:text-2xl lg:text-3xl py-4 lg:py-12 text-[1.5rem]">About Us</h1>
          <p class="pb-8">At D-double-K Bookstore, our story began with a passion for books and a deep-rooted desire to
            make
            a positive
            impact on the lives of young readers. The idea for this ecommerce bookstore sprouted from a personal
            experience
            that ignited our love for literature. We realized that books possess the power to transform minds, inspire
            creativity, and pave the way for a brighter future.</p>
        </div>
      </div>
      <center>
        <div class="w-[60%] lg:w-0 px-12 lg:px-0 lg:border-b-0 border-b-2">
        </div>
      </center>

    </div>

    <!-- Our Mission -->
    <div class="xl:flex w-[80%] mx-auto items-center py-12 xl:py-18">
      <div class="text-center xl:text-left pl-12 pr-24 w-full xl:w-1/2">
        <h1 class="md:text-2xl xl:text-3xl py-4 xl:py-12 text-[1.5rem]">{{ cards[0].title }}</h1>
        <p class="pb-8">{{ cards[0].text }}</p>
      </div>
      <div class="w-full xl:pr-12 xl:w-1/2">
        <div class="flex w-full gap-8">
          <div class="w-1/2 rounded-lg">
            <img class="w-full border-2 shadow-2xl aspect-[3/4] object-cover" src="https://i.pinimg.com/564x/77/0d/4c/770d4c2761cdec8c7a95d7a6c28d99b2.jpg" alt="">
          </div>
          <div class="w-1/2">
            <img class="w-full border-2 aspect-[3/4] shadow-2xl object-cover" src="https://i.pinimg.com/564x/b2/04/d7/b204d7323de067b968ed2dbd210b5ac6.jpg" alt="">
          </div>
        </div>
        <!-- <div class="w-full mt-8">
            <img class="w-full border-2 aspect-[4/1.5] shadow-2xl object-cover" src="https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77701491896.jpg" alt="">
          </div> -->
      </div>
    </div>
  </main>
</template>

