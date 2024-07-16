<script setup>
import Dashboard from '../assets/dashboard.svg'
import User from '../assets/user.svg'
import Category from '../assets/category.svg'
import News from '../assets/news.svg'
import Comment from '../assets/comment.svg'
import Logout from '../assets/logout.svg'
</script>

<template>
  <div class="min-h-screen w-64 bg-[#D80000] text-white flex flex-col p-5">
    <img src="/img/LogoWhite.png" class="w-52 mx-auto" alt="" />
    <div class="mt-4 flex-1">
      <a href="/dashboard" class="py-2 flex items-center gap-2">
        <Dashboard class="w-6 h-6" />
        Dashboard
      </a>
      <a href="/user" class="py-2 flex items-center gap-2">
        <User class="w-6 h-6" />
        User
      </a>
      <a href="/category" class="py-2 flex items-center gap-2">
        <Category class="w-6 h-6" />
        Category
      </a>
      <a href="/news" class="py-2 flex items-center gap-2">
        <News class="w-6 h-6" />
        News
      </a>
      <a href="/comment" class="py-2 flex items-center gap-2">
        <Comment class="w-6 h-6" />
        Comment
      </a>
    </div>
    <a href="/login" class="flex items-center gap-2">
      <Logout class="w-6 h-6" />
      Logout
    </a>
  </div>
</template>
