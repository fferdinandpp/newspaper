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
          judul: 'Inovasi Teknologi Terkini',
          date: 'Senin, 16 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Kesehatan Mental di Era Digital',
          date: 'Selasa, 15 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Olahraga untuk Gaya Hidup Sehat',
          date: 'Rabu, 14 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Tren Pendidikan di Tahun 2024',
          date: 'Kamis, 13 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Makanan Sehat dan Bergizi',
          date: 'Jumat, 12 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Perkembangan Bisnis Digital',
          date: 'Sabtu, 11 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Wisata Alam Terpopuler 2024',
          date: 'Minggu, 10 Juli 2024'
        },
        {
          image: '/img/Banner.jpg',
          judul: 'Analisis Ekonomi Global',
          date: 'Senin, 09 Juli 2024'
        },
      ],

      tags: [
        'Berita Terbaru',
        'Teknologi',
        'Olahraga',
        'Kesehatan',
        'Pendidikan',
        'Bisnis',
        'Wisata',
        'Ekonomi'
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
        <a href="/detailnews" v-for="item in newsItems" :key="item.judul" class="p-2 w-fit">
          <img :src="item.image" class="w-60 rounded-md" alt="" />
          <h2 class="max-w-60 mt-2 font-bold leading-5">{{ item.judul }}</h2>
          <p class="mt-2 text-xs italic text-slate-400">{{ item.date }}</p>
        </a>
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
