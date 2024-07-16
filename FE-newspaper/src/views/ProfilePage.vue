<script>
import LogoutIcon from "../assets/logout.svg"

export default {
  components: {
    LogoutIcon
  },
  methods: {
    handleLogout() {
      alert('Logout button clicked')
    }
  }
}
</script>
<template>
    <div class="px-4">
        <div class="flex items-center justify-between">
            <img src="/img/Logo.png" class="w-60" alt="Logo">
            <button @click="handleLogout">
                <LogoutIcon class="w-10 h-10 fill-[#D80000] rounded-md"/>
            </button>
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
                <button class="border-2 border-[#000] font-bold px-4 py-2 rounded-md">Back</button>
                <button class="bg-[#d80000] text-white font-bold px-4 py-2 rounded-md">Edit Profile</button>
              </div>
            </div>
          </div>
          
    </div>
</template>
