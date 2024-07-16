<script setup>
import { ref, computed } from 'vue'
import Sidebar from '../components/SidebarComponent.vue'
import Delete from '../assets/delete.svg'
import Edit from '../assets/edit.svg'

const categories = ref([
  { id: 1, category: 'Technology', slug: 'technology' },
  { id: 2, category: 'Health', slug: 'health' },
  { id: 3, category: 'Science', slug: 'science' },
  { id: 4, category: 'Education', slug: 'education' },
  { id: 5, category: 'Sports', slug: 'sports' },
  { id: 6, category: 'Entertainment', slug: 'entertainment' },
  { id: 7, category: 'Business', slug: 'business' },
  { id: 8, category: 'Travel', slug: 'travel' },
  { id: 9, category: 'Lifestyle', slug: 'lifestyle' },
  { id: 10, category: 'Food', slug: 'food' },
  { id: 11, category: 'Politics', slug: 'politics' },
  { id: 12, category: 'Economy', slug: 'economy' }
])

const searchQuery = ref('')
const currentPage = ref(1)
const itemsPerPage = 10

const handleSearch = () => {
  currentPage.value = 1
  filteredCategories.value = categories.value.filter((category) =>
    category.category.toLowerCase().includes(searchQuery.value.toLowerCase())
  )
}

const filteredCategories = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage
  const end = start + itemsPerPage
  return categories.value
    .filter((category) => category.category.toLowerCase().includes(searchQuery.value.toLowerCase()))
    .slice(start, end)
})

const totalPages = computed(() => {
  return Math.ceil(
    categories.value.filter((category) =>
      category.category.toLowerCase().includes(searchQuery.value.toLowerCase())
    ).length / itemsPerPage
  )
})

const deleteCategory = (id) => {
  const index = categories.value.findIndex((category) => category.id === id)
  if (index > -1) {
    categories.value.splice(index, 1)
  }
}

const editCategory = (id) => {
  alert(`Edit category with id ${id}`)
}
</script>

<template>
  <div class="flex">
    <Sidebar />
    <div class="mx-auto w-2/3 mt-5">
      <h1 class="text-center font-bold text-3xl">Category</h1>
      <div class="mt-5 flex">
        <input
          v-model="searchQuery"
          @input="handleSearch"
          type="text"
          placeholder="Search categories"
          class="flex-grow p-2 border border-gray-300 rounded-md"
        />
        <a
          href="/addcategory"
          class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
        >
          Add Category
        </a>
      </div>
      <table class="min-w-full bg-white border border-gray-300 mt-5">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b border-r">ID</th>
            <th class="py-2 px-4 border-b border-r">Category</th>
            <th class="py-2 px-4 border-b border-r">Slug</th>
            <th class="py-2 px-4 border-b">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in filteredCategories" :key="category.id">
            <td class="py-2 px-4 border-b border-r">{{ category.id }}</td>
            <td class="py-2 px-4 border-b border-r">{{ category.category }}</td>
            <td class="py-2 px-4 border-b border-r">{{ category.slug }}</td>
            <td class="py-2 px-4 border-b flex space-x-2">
              <button @click="editCategory(category.id)" class="text-blue-500 hover:text-blue-700">
                <Edit class="w-6 h-6" />
              </button>
              <button @click="deleteCategory(category.id)" class="text-red-500 hover:text-red-700">
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
