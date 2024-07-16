<script></script>
<template>
  <div class="flex flex-col justify-center items-center w-full h-screen mx-auto">
    <div class="w-1/2">
      <div class="">
        <img src="/img/Logo.png" class="w-60 mx-auto" alt="Logo" />
      </div>
      <div class="p-20 border-2 rounded-lg">
        <div class="">
          <p class="font-bold">Name</p>
          <input type="text" class="w-full border p-2 rounded-md" placeholder="Enter your name" />
        </div>
        <div class="my-4">
          <p class="font-bold">Email</p>
          <input type="email" class="w-full border p-2 rounded-md" placeholder="Enter your email" />
        </div>
        <div class="my-4">
          <p class="font-bold">Password</p>
          <input
            type="password"
            class="w-full border p-2 rounded-md"
            placeholder="Enter your password"
          />
        </div>
        <button class="my-4 w-full p-2 rounded-md bg-[#D80000] text-white font-bold">
          Register
        </button>
      </div>
    </div>
  </div>
</template>
