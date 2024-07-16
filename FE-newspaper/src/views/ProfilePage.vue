<script setup>
import LogoutIcon from "../assets/logout.svg"
</script>

<template>
    <div class="px-4">
        <div class="flex items-center justify-between">
            <img src="/img/Logo.png" class="w-60" alt="Logo">
            <a href="/login">
                <LogoutIcon class="w-10 h-10 fill-[#D80000] rounded-md"/>
            </a>
        </div>
        <div class="flex justify-center items-center h-[550px]">
            <div class="flex flex-col justify-center items-center w-1/2 mx-auto">
              <img src="/img/Avatar.png" class="w-44" alt="Avatar">
              <div class="mt-4 w-full">
                <p class="font-bold">Name</p>
                <input type="text" class="w-full border p-2 rounded-md" placeholder="Enter your name">
              </div>
              <div class="my-4 w-full">
                <p class="font-bold">Email</p>
                <input type="email" class="w-full border p-2 rounded-md" placeholder="Enter your email">
              </div>
              <div class="flex w-full justify-center gap-4">
                <a href="/" class="border-2 border-[#000] font-bold px-4 py-2 rounded-md">Back</a>
                <a href="/editprofile" class="bg-[#d80000] text-white font-bold px-4 py-2 rounded-md">Edit Profile</a>
              </div>
            </div>
          </div>
          
    </div>
</template>
