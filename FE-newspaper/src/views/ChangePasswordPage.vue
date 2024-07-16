<script></script>
<template>
    <div class="flex flex-col justify-center items-center w-full h-screen mx-auto">
        <div class="w-1/2">
            <div class="">
                <img src="/img/Logo.png" class="w-60 mx-auto" alt="Logo">
            </div>
            <div class="p-20 border-2 rounded-lg">
                <div class="">
                    <p class="font-bold">Password</p>
                    <input type="password" class="w-full border p-2 rounded-md" placeholder="Enter your new password">
                </div>
                <div class="flex w-full justify-center my-4 gap-4">
                    <a href="/profile" class="w-24 border-2 border-[#000] font-bold px-4 py-2 rounded-md text-center">Cancel</a>
                    <a href="/profile" class="w-24 bg-[#d80000] text-white font-bold px-4 py-2 rounded-md text-center">Save</a>
                </div>
            </div>
        </div>
    </div>
</template>
