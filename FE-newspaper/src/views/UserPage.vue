<script setup>
import { ref, computed } from 'vue'
import Sidebar from '../components/SidebarComponent.vue'
import Delete from '../assets/delete.svg' //

// Data pengguna
const users = ref([
  { id: 1, name: 'John Doe', email: 'john.doe@example.com' },
  { id: 2, name: 'Jane Smith', email: 'jane.smith@example.com' },
  { id: 3, name: 'Alice Johnson', email: 'alice.johnson@example.com' },
  { id: 4, name: 'Michael Brown', email: 'michael.brown@example.com' },
  { id: 5, name: 'Emily Davis', email: 'emily.davis@example.com' },
  { id: 6, name: 'Chris Wilson', email: 'chris.wilson@example.com' },
  { id: 7, name: 'Jessica Miller', email: 'jessica.miller@example.com' },
  { id: 8, name: 'Paul Taylor', email: 'paul.taylor@example.com' },
  { id: 9, name: 'Laura Martinez', email: 'laura.martinez@example.com' },
  { id: 10, name: 'Kevin Garcia', email: 'kevin.garcia@example.com' },
  { id: 11, name: 'Sarah White', email: 'sarah.white@example.com' },
  { id: 12, name: 'Sarah Black', email: 'sarah.black@example.com' }
])

const searchQuery = ref('')
const currentPage = ref(1)
const itemsPerPage = 10

const handleSearch = () => {
  currentPage.value = 1
  filteredUsers.value = users.value.filter((user) =>
    user.name.toLowerCase().includes(searchQuery.value.toLowerCase())
  )
}

const filteredUsers = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage
  const end = start + itemsPerPage
  return users.value
    .filter((user) => user.name.toLowerCase().includes(searchQuery.value.toLowerCase()))
    .slice(start, end)
})

const totalPages = computed(() => {
  return Math.ceil(
    users.value.filter((user) => user.name.toLowerCase().includes(searchQuery.value.toLowerCase()))
      .length / itemsPerPage
  )
})

const deleteUser = (id) => {
  const index = users.value.findIndex((user) => user.id === id)
  if (index > -1) {
    users.value.splice(index, 1)
  }
}
</script>

<template>
  <div class="flex">
    <Sidebar />
    <div class="mx-auto w-2/3 mt-5">
      <h1 class="text-center font-bold text-3xl">User</h1>
      <div class="mt-5">
        <input
          v-model="searchQuery"
          @input="handleSearch"
          type="text"
          placeholder="Search users"
          class="w-full p-2 border border-gray-300 rounded-md"
        />
      </div>
      <table class="min-w-full bg-white border border-gray-300 mt-5">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b border-r">ID</th>
            <th class="py-2 px-4 border-b border-r">Name</th>
            <th class="py-2 px-4 border-b border-r">Email</th>
            <th class="py-2 px-4 border-b">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in filteredUsers" :key="user.id">
            <td class="py-2 px-4 border-b border-r">{{ user.id }}</td>
            <td class="py-2 px-4 border-b border-r">{{ user.name }}</td>
            <td class="py-2 px-4 border-b border-r">{{ user.email }}</td>
            <td class="py-2 px-4 border-b">
              <button @click="deleteUser(user.id)" class="text-red-500 hover:text-red-700">
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
