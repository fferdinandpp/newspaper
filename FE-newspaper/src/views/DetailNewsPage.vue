<script setup>
import Header from '../components/HeaderComponent.vue'
import Navbar from '../components/NavbarComponent.vue'
import Footer from '../components/FooterComponent.vue'
</script>

<script>
export default {
  data() {
    return {
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
    <div class="flex m-5">
      <div class="mx-5">
        <div>
          <h2>Category</h2>
        </div>
        <div class="mt-2">
          <h1 class="font-bold text-3xl">Ini judul berita</h1>
        </div>
        <div class="mt-2">
          <p class="text-sm text-slate-400 italic">Day, Date/Month/Year</p>
        </div>
        <div class="mt-4">
          <img src="/img/Banner.jpg" class="w-[990px] rounded-md" alt="Image" />
        </div>
        <div class="mt-5">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab magni quam libero incidunt
            amet delectus sapiente, molestiae odio magnam aperiam, doloremque hic nulla neque esse.
            Sequi repudiandae id dignissimos aliquid.
          </p>
        </div>
        <div class="mt-5">
          <h3>Tags</h3>
          <div class="flex flex-wrap gap-2 mt-1">
            <span
              v-for="tag in tags"
              :key="tag"
              class="bg-[#D80000] rounded-md px-2 py-1 text-xs text-white font-semibold"
            >
              {{ tag }}
            </span>
          </div>
        </div>
        <div class="mt-5">
          <h3>
            Comments
            <div class="flex items-center mt-1 p-3 gap-3 border-2 rounded-md">
                <img src="/img/Avatar.png" class="w-10 h-10" alt="Avatar">
                <div>
                    <h3 class="font-bold text-sm">User Name</h3>
                    <p class="text-sm">User's comment content</p>
                </div>
            </div>
            <div class="flex items-center mt-1 p-3 gap-3 border-2 rounded-md">
                <img src="/img/Avatar.png" class="w-10 h-10" alt="Avatar">
                <div>
                    <h3 class="font-bold text-sm">User Name</h3>
                    <p class="text-sm">User's comment content</p>
                </div>
            </div>
            <div class="flex items-center mt-1 p-3 gap-3 border-2 rounded-md">
                <img src="/img/Avatar.png" class="w-10 h-10" alt="Avatar">
                <div>
                    <h3 class="font-bold text-sm">User Name</h3>
                    <p class="text-sm">User's comment content</p>
                </div>
            </div>
            <div>
                <input type="text" class="border-2 rounded-md mt-1 p-1.5 w-full text-sm" placeholder="Write comment">
            </div>
          </h3>
        </div>
      </div>
      <div>
        <h3 class="font-bold">Popular Tags</h3>
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
    <Footer />
  </div>
</template>
