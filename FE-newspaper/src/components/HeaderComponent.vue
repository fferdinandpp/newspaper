<script>
import Dropdown from "../assets/dropdown.svg"

export default {
  components: {
    Dropdown
  },
  methods: {
    handleDropdown() {
      alert('Dropdown button clicked')
    }
  }
}
</script>
<template>
    <div class="px-5">
        <div class="flex justify-between items-center">
          <a href="/">
            <img src="/img/Logo.png" class="w-60" alt="Logo">
          </a>
            <div class="flex items-center gap-4">
                <input type="text" class="border-2 rounded-md h-fit px-4 py-1 w-[500px]" placeholder="Seacrh">
                <div class="flex items-center">
                  <a href="/profile">
                    <img src="/img/Avatar.png" class="w-10" alt="Avatar">
                  </a>
                    <Dropdown class="w-7 h-7" @click="handleDropdown"/>
                </div>
            </div>
        </div>
    </div>
</template>