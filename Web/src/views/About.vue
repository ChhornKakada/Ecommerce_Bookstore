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
          imgPath: 'https://i.pinimg.com/736x/84/e4/73/84e4732d07ffc571aee8abc261e2249a.jpg'
        },
        {
          title: 'Our Vision ',
          text: "Looking ahead, we envision a future where every Cambodian teenager embraces the habit of reading. We see a society where books are not only sources of knowledge but also tools of empowerment and inspiration. Through our collective efforts, we aspire to contribute to a generation of well-informed, imaginative, and empathetic individuals who will shape a better tomorrow.",
          imgPath: 'https://wpvip.edutopia.org/wp-content/uploads/2022/10/F4M17R-crop.jpg?w=2880&quality=85'
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
    <div class="xl:flex xl:w-[80%] mx-auto items-center py-12 xl:py-18 border-b-2">
      <div class="text-center xl:text-left pl-12 pr-12 xl:pr-24 w-full xl:w-1/2">
        <h1 class="md:text-2xl xl:text-3xl py-4 xl:py-12 text-[1.5rem]">{{ cards[0].title }}</h1>
        <p class="pb-8">{{ cards[0].text }}</p>
      </div>
      <div class="w-[80%] mx-auto xl:pr-12 xl:w-1/2">
        <div class="flex w-full gap-8 justify-center">
          <div class="w-1/2 md:w-[320px] rounded-lg">
            <img class="w-full border-2 shadow-2xl aspect-[3/4] object-cover"
              src="https://i.pinimg.com/564x/77/0d/4c/770d4c2761cdec8c7a95d7a6c28d99b2.jpg" alt="">
          </div>
          <div class="w-1/2  md:w-[320px]">
            <img class="w-full border-2 aspect-[3/4] shadow-2xl object-cover"
              src="https://i.pinimg.com/564x/b2/04/d7/b204d7323de067b968ed2dbd210b5ac6.jpg" alt="">
          </div>
        </div>
      </div>
    </div>

    <!-- our community -->
    <div class="xl:flex w-full xl:w-[80%] mx-auto gap-8 px-12">
      <Card :title="cards[1].title" :imgPath="cards[1].imgPath" :text="cards[1].text" 
      class="w-[80%] mx-auto xl:w-1/2 my-12" />
      <Card :title="cards[2].title" :imgPath="cards[2].imgPath" :text="cards[2].text" 
      class="w-[80%] mx-auto xl:w-1/2 my-12" />
    </div>
  </main>
</template>

