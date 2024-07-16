<script setup>
import { ref, computed } from 'vue'
import Sidebar from '../components/SidebarComponent.vue'
import Delete from '../assets/delete.svg'

const comments = ref([
  {
    id: 1,
    comment: 'Great article on technology!',
    user: 'Alice',
    news: 'Technology Advances',
    dateCreated: '2024-07-16'
  },
  {
    id: 2,
    comment: 'Very informative health tips.',
    user: 'Bob',
    news: 'Health Tips',
    dateCreated: '2024-07-15'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  },
  {
    id: 3,
    comment: 'Interesting discoveries in science.',
    user: 'Charlie',
    news: 'Science Discoveries',
    dateCreated: '2024-07-14'
  }
])

const searchQuery = ref('')
const currentPage = ref(1)
const itemsPerPage = 10

const handleSearch = () => {
  currentPage.value = 1
  filteredComments.value = comments.value.filter((comment) =>
    comment.comment.toLowerCase().includes(searchQuery.value.toLowerCase())
  )
}

const filteredComments = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage
  const end = start + itemsPerPage
  return comments.value
    .filter((comment) => comment.comment.toLowerCase().includes(searchQuery.value.toLowerCase()))
    .slice(start, end)
})

const totalPages = computed(() => {
  return Math.ceil(
    comments.value.filter((comment) =>
      comment.comment.toLowerCase().includes(searchQuery.value.toLowerCase())
    ).length / itemsPerPage
  )
})

const deleteComment = (id) => {
  const index = comments.value.findIndex((comment) => comment.id === id)
  if (index > -1) {
    comments.value.splice(index, 1)
  }
}
</script>

<template>
  <div class="flex">
    <Sidebar />
    <div class="mx-auto w-2/3 mt-5">
      <h1 class="text-center font-bold text-3xl">Comments</h1>
      <div class="mt-5 flex">
        <input
          v-model="searchQuery"
          @input="handleSearch"
          type="text"
          placeholder="Search comments"
          class="flex-grow p-2 border border-gray-300 rounded-md"
        />
      </div>
      <table class="min-w-full bg-white border border-gray-300 mt-5">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b border-r">ID</th>
            <th class="py-2 px-4 border-b border-r">Comment</th>
            <th class="py-2 px-4 border-b border-r">User</th>
            <th class="py-2 px-4 border-b border-r">News</th>
            <th class="py-2 px-4 border-b border-r">Date Created</th>
            <th class="py-2 border-b">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="comment in filteredComments" :key="comment.id">
            <td class="py-2 px-4 border-b border-r">{{ comment.id }}</td>
            <td class="py-2 px-4 border-b border-r">{{ comment.comment }}</td>
            <td class="py-2 px-4 border-b border-r">{{ comment.user }}</td>
            <td class="py-2 px-4 border-b border-r">{{ comment.news }}</td>
            <td class="py-2 px-4 border-b border-r">{{ comment.dateCreated }}</td>
            <td class="py-2 border-b flex justify-center items-center h-full">
              <button @click="deleteComment(comment.id)" class="text-red-500 hover:text-red-700">
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
