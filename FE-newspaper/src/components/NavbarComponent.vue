<script>
export default {
  data() {
    return {
      categories: [
        'News', 
        'Sport', 
        'Technology', 
        'Entertainment', 
        'Lifestyle', 
        'Automotive', 
        'Education', 
        'Politic', 
        'Economy'
      ],
      activeCategory: "News"
    };
  },
  methods: {
    setActiveCategory(category) {
      this.activeCategory = category;
    }
  }
};
</script>

<template>
  <div class="px-5 bg-[#000]">
    <ul class="flex justify-evenly text-white py-4">
      <li 
        v-for="category in categories" 
        :key="category" 
        :class="{
          'cursor-pointer': true,
          'text-[#D80000] underline underline-offset-8 decoration-[#D80000]': activeCategory === category
        }"
        @click="setActiveCategory(category)"
      >
        {{ category }}
      </li>
    </ul>
  </div>
</template>
