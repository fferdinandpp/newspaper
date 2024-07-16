<template>
    <div class="px-4">
        <div class="flex items-center">
            <img src="/img/Logo.png" class="w-60" alt="Logo">
        </div>
        <div class="flex justify-center items-center h-[550px]">
            <div class="flex flex-col justify-center items-center w-1/2 mx-auto">
              <img src="/img/Avatar.png" class="w-44" alt="Avatar">
              <div class="mt-4 w-full">
                <p class="font-bold">Name</p>
                <input type="text" class="w-full border p-2 rounded-md" placeholder="Enter your new name">
              </div>
              <div class="my-4 w-full">
                <p class="font-bold">Email</p>
                <input type="email" class="w-full border p-2 rounded-md" placeholder="Enter your new email">
              </div>
              <button class="underline text-sm">Change password</button>
              <div class="flex w-full justify-center my-4 gap-4">
                <button class="border-2 border-[#000] font-bold px-4 py-2 rounded-md">Cancel</button>
                <button class="bg-[#d80000] text-white font-bold px-4 py-2 rounded-md">Save</button>
              </div>
            </div>
          </div>
    </div>
</template>
