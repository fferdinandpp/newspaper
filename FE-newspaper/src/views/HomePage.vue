<script setup>
import Header from '../components/HeaderComponent.vue'
import Navbar from '../components/NavbarComponent.vue'
import Footer from '../components/FooterComponent.vue'
</script>

<script>
export default {
  data() {
    return {
      newsItems: [
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Ini judul berita',
          date: 'Day, Date/Month/Year'
        },
      ],

      tags: [
        'Berita Terbaru',
        'Teknologi',
        'Olahraga',
        'Kesehatan',
        'Kesehatan',
        'Kesehatan',
        'Kesehatan',
        'Kesehatan'
      ]
    }
  }
}
</script>

<template>
  <div>
    <Header />
    <Navbar />
    <div class="m-10 bg-local rounded-md" style="background-image: url('/img/Banner.jpg')">
      <h1 class="p-4 flex justify-start items-end h-96 text-black text-3xl font-bold">
        Ini judul berita headline<br />(Headline)
      </h1>
    </div>
    <div class="bg-[#000] m-5 h-0.5 rounded-full"></div>
    <div class="m-10 flex">
      <div class="flex flex-wrap gap-5">
        <div v-for="item in newsItems" :key="item.judul" class="p-2 w-fit">
          <img :src="item.image" class="w-48 rounded-md" alt="" />
          <h2 class="mt-2 font-bold leading-5">{{ item.judul }}</h2>
          <p class="mt-2 text-xs italic text-slate-400">{{ item.date }}</p>
        </div>
      </div>
      <div>
        <div class="border-2 rounded-md p-4">
          <h2 class="font-bold">Tags</h2>
          <div class="flex flex-wrap gap-2 mt-2">
            <span
              v-for="tag in tags"
              :key="tag"
              class="bg-[#D80000] rounded-md px-2 py-1 text-xs text-white font-semibold"
            >
              {{ tag }}
            </span>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>
