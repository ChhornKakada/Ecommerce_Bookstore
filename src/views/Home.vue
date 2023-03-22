<script setup>
import cateImg from '../components/homePage/categoryImg.vue'
import headerBox from '../components/homePage/HeaderBox.vue'
import latestBook from '../components/homePage/LatestArrivalBook.vue'
import book from '../components/homePage/BookWithTitle.vue'

</script>

<template>
  <main>
    <div>
      <img src="../assets/images/cover.png" alt="" class="w-full aspect-[9/3.5] object-cover shadow-2xl">
    </div>
    <!-- category -->
    <div class="mt-10">
      <headerBox headTitle="Category"
        para="A medium for recording information in the form of writing or images, typically composed of many pages (madeof papyrus, parchment, vellum, or paper) bound together and protected by a cover."
        btnText="See more"></headerBox>
      
      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div>
          <cateImg imgPath="/src/assets/images/novel.png" title="Novel"></cateImg>
        </div>
        <div>
          <cateImg imgPath="/src/assets/images/science.png" title="Science"></cateImg>
        </div>
        <div>
          <cateImg imgPath="/src/assets/images/technology.png" title="Technology"></cateImg>
        </div>
      </div>
    </div>

    <!-- latest -->
    <div class="mt-10">
      <div>
        <headerBox headTitle="Our latest arrivals"
          para="Here are the latest arrival books. Many more are store in this page. Find your favorite one by clicking the below button."
          btnText="See more"></headerBox>
      </div>
      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div>
          <div class="h-[60px]"></div>
          <latestBook imgPath="/src/assets/images/TheAweofGod.png"></latestBook>
        </div>
        <div>
          <latestBook imgPath="/src/assets/images/TheAdventuresOfAmina.png" ></latestBook>
        </div>
        <div>
          <div class="sm:h-[60px]"></div>
          <latestBook imgPath="/src/assets/images/NextInLine.png"></latestBook>
        </div>
      </div>
    </div>

    <!-- our product (books) -->
    <div class="pb-20 mt-10">
      <div>
        <headerBox headTitle="Our Books"
          para="Many titles are sell in this website you serve the need of the customers. Our website give the customers with good product and services."
          btnText="See more"></headerBox>
      </div>
      <div class="flex justify-center md:w-[90%] mx-auto gap-10 flex-wrap w-full">
        <div>
          <book imgPath="/src/assets/images/IHavaLostMyWay.png" title="I have lost my way"></book>
        </div>
        <div>
          <book imgPath="/src/assets/images/stephenKing.png" title="Stephen King"></book>
        </div>
        <div>
          <book imgPath="/src/assets/images/WhoMoveMyCheese.png" title="Who move my cheese?"></book>
        </div>
      </div>
    </div>

  </main>
</template>
