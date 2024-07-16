<script setup>
import { ref } from 'vue'

const title = ref('')
const selectedCategory = ref('')
const content = ref('')

const categories = [
  'Technology',
  'Health',
  'Science',
  'Education',
  'Sports',
  'Entertainment',
  'Business',
  'Travel',
  'Lifestyle',
  'Food',
  'Politics',
  'Economy'
]

const save = () => {
  console.log('News saved:', {
    title: title.value,
    category: selectedCategory.value,
    content: content.value
  })
}

const cancel = () => {
  title.value = ''
  selectedCategory.value = ''
  content.value = ''
}
</script>
<template>
  <div class="px-4">
    <div class="flex items-center">
      <img src="/img/Logo.png" class="w-60" alt="Logo" />
    </div>
    <div class="flex justify-center items-center h-[550px]">
      <div class="flex flex-col justify-center items-center w-1/2 mx-auto">
        <h1>Add News</h1>
        <div class="mt-4 w-full flex flex-col">
          <input
            v-model="title"
            type="text"
            class="w-full border p-2 rounded-md"
            placeholder="Enter news title"
          />
          <select v-model="selectedCategory" class="mt-4 w-full border p-2 rounded-md">
            <option disabled value="">Select Category</option>
            <option v-for="category in categories" :key="category" :value="category">
              {{ category }}
            </option>
          </select>
          <textarea
            v-model="content"
            class="mt-4 w-full border p-2 rounded-md"
            placeholder="Enter news content"
            rows="5"
          ></textarea>
        </div>
        <div class="flex w-full justify-center my-4 gap-4">
          <a href="/news" class="border-2 border-[#000] font-bold px-4 py-2 rounded-md" @click="cancel">
            Cancel
          </a>
          <a href="/news" class="bg-[#d80000] text-white font-bold px-4 py-2 rounded-md" @click="save">
            Save
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
