<script setup>
import Sidebar from '../components/SidebarComponent.vue'
import User from '../assets/user.svg'
import Category from '../assets/category.svg'
import News from '../assets/news.svg'
import Comment from '../assets/comment.svg'
</script>

<template>
  <div class="flex">
    <Sidebar />
    <div class="mx-auto w-2/3 mt-5">
      <h1 class="text-center font-bold text-3xl">Dashboard</h1>
      <div class="flex justify-between mt-5">
        <a href="" class="flex justify-center items-center bg-slate-400 rounded-md p-4 w-56 gap-4">
          <User class="w-10 h-10" />
          <div class="text-white">
            <p class="text-2xl font-semibold">100</p>
            <p>Total User</p>
          </div>
        </a>
        <a href="" class="flex justify-center items-center bg-slate-400 rounded-md p-4 w-56 gap-4">
          <Category class="w-10 h-10" />
          <div class="text-white">
            <p class="text-2xl font-semibold">100</p>
            <p>Total Category</p>
          </div>
        </a>
        <a href="" class="flex justify-center items-center bg-slate-400 rounded-md p-4 w-56 gap-4">
          <News class="w-10 h-10" />
          <div class="text-white">
            <p class="text-2xl font-semibold">100</p>
            <p>Total News</p>
          </div>
        </a>
        <a href="" class="flex justify-center items-center bg-slate-400 rounded-md p-4 w-56 gap-4">
          <Comment class="w-10 h-10" />
          <div class="text-white">
            <p class="text-2xl font-semibold">100</p>
            <p>Total Comment</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>
