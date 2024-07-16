<script setup>
import { ref, computed } from 'vue'
import Sidebar from '../components/SidebarComponent.vue'
import Delete from '../assets/delete.svg'
import Edit from '../assets/edit.svg'

const news = ref([
  {
    id: 1,
    title: 'Technology Advances',
    content: 'New technology...',
    category: 'Technology',
    slug: 'technology-advances',
    dateCreated: '2024-07-16'
  },
  {
    id: 2,
    title: 'Health Tips',
    content: 'Important health tips...',
    category: 'Health',
    slug: 'health-tips',
    dateCreated: '2024-07-15'
  },
  {
    id: 3,
    title: 'Science Discoveries',
    content: 'New scientific discoveries...',
    category: 'Science',
    slug: 'science-discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 4,
    title: 'Educational Trends',
    content: 'Latest trends in education...',
    category: 'Education',
    slug: 'educational-trends',
    dateCreated: '2024-07-13'
  },
  {
    id: 5,
    title: 'Sports Highlights',
    content: 'Recent sports highlights...',
    category: 'Sports',
    slug: 'sports-highlights',
    dateCreated: '2024-07-12'
  },
  {
    id: 6,
    title: 'Entertainment News',
    content: 'Latest entertainment news...',
    category: 'Entertainment',
    slug: 'entertainment-news',
    dateCreated: '2024-07-11'
  },
  {
    id: 7,
    title: 'Business Insights',
    content: 'Important business insights...',
    category: 'Business',
    slug: 'business-insights',
    dateCreated: '2024-07-10'
  },
  {
    id: 8,
    title: 'Travel Guides',
    content: 'Comprehensive travel guides...',
    category: 'Travel',
    slug: 'travel-guides',
    dateCreated: '2024-07-09'
  },
  {
    id: 9,
    title: 'Lifestyle Tips',
    content: 'Useful lifestyle tips...',
    category: 'Lifestyle',
    slug: 'lifestyle-tips',
    dateCreated: '2024-07-08'
  },
  {
    id: 10,
    title: 'Food Recipes',
    content: 'Delicious food recipes...',
    category: 'Food',
    slug: 'food-recipes',
    dateCreated: '2024-07-07'
  },
  {
    id: 11,
    title: 'Political Updates',
    content: 'Latest political updates...',
    category: 'Politics',
    slug: 'political-updates',
    dateCreated: '2024-07-06'
  },
  {
    id: 12,
    title: 'Economic Analysis',
    content: 'Detailed economic analysis...',
    category: 'Economy',
    slug: 'economic-analysis',
    dateCreated: '2024-07-05'
  }
])

const searchQuery = ref('')
const currentPage = ref(1)
const itemsPerPage = 10

const handleSearch = () => {
  currentPage.value = 1
  filteredNews.value = news.value.filter((item) =>
    item.title.toLowerCase().includes(searchQuery.value.toLowerCase())
  )
}

const filteredNews = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage
  const end = start + itemsPerPage
  return news.value
    .filter((item) => item.title.toLowerCase().includes(searchQuery.value.toLowerCase()))
    .slice(start, end)
})

const totalPages = computed(() => {
  return Math.ceil(
    news.value.filter((item) => item.title.toLowerCase().includes(searchQuery.value.toLowerCase()))
      .length / itemsPerPage
  )
})

const deleteNews = (id) => {
  const index = news.value.findIndex((item) => item.id === id)
  if (index > -1) {
    news.value.splice(index, 1)
  }
}
</script>

<template>
    <div class="flex">
      <Sidebar />
      <div class="mx-auto w-2/3 mt-5">
        <h1 class="text-center font-bold text-3xl">News</h1>
        <div class="mt-5 flex">
          <input
            v-model="searchQuery"
            @input="handleSearch"
            type="text"
            placeholder="Search news"
            class="flex-grow p-2 border border-gray-300 rounded-md"
          />
          <a
            href="/addnews"
            class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
          >
            Add News
          </a>
        </div>
        <table class="min-w-full bg-white border border-gray-300 mt-5">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b border-r">ID</th>
              <th class="py-2 px-4 border-b border-r">Title</th>
              <th class="py-2 px-4 border-b border-r">Content</th>
              <th class="py-2 px-4 border-b border-r">Category</th>
              <th class="py-2 px-4 border-b border-r">Slug</th>
              <th class="py-2 px-4 border-b border-r">Date Created</th>
              <th class="py-2 px-4 border-b">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in filteredNews" :key="item.id">
              <td class="py-2 px-4 border-b border-r">{{ item.id }}</td>
              <td class="py-2 px-4 border-b border-r">{{ item.title }}</td>
              <td class="py-2 px-4 border-b border-r">{{ item.content }}</td>
              <td class="py-2 px-4 border-b border-r">{{ item.category }}</td>
              <td class="py-2 px-4 border-b border-r">{{ item.slug }}</td>
              <td class="py-2 px-4 border-b border-r">{{ item.dateCreated }}</td>
              <td class="py-2 border-b flex justify-center items-center h-full">
                <a href="/addnews" class="text-blue-500 hover:text-blue-700">
                  <Edit class="w-6 h-6" />
                </a>
                <button @click="deleteNews(item.id)" class="text-red-500 hover:text-red-700">
                  <Delete class="w-6 h-6" />
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-between mt-4">
          <button
            @click="currentPage > 1 ? currentPage-- : null"
            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md"
            :disabled="currentPage === 1"
          >
            Previous
          </button>
          <span>Page {{ currentPage }} of {{ totalPages }}</span>
          <button
            @click="currentPage < totalPages ? currentPage++ : null"
            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md"
            :disabled="currentPage === totalPages"
          >
            Next
          </button>
        </div>
      </div>
    </div>
  </template>
  