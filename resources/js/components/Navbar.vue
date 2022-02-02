<template>
  <nav class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-8">
      <div class="flex justify-between">
        <div>
          <a href="#" class="flex items-center py-2 px-3 text-gray-700">
            <svg
              role="img"
              class="h-6 w-6 mr-4"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <title>Vue.js</title>
              <path
                d="M24,1.61H14.06L12,5.16,9.94,1.61H0L12,22.39ZM12,14.08,5.16,2.23H9.59L12,6.41l2.41-4.18h4.43Z"
              />
            </svg>
            <span> Laravel Vue Spa</span>
          </a>
        </div>
        <div
          class="
            hidden
            md:flex
            flex
            items-center
            space-x-3
            py-2
            px-3
            text-gray-700
          "
        >
          <router-link :to="{ name: 'dashboard' }"> Dashboard</router-link>
          <router-link :to="{ name: 'create' }"> Create</router-link>
        </div>
        <div class="md:hidden flex items-center">
          <button class="mobile-menu-button" @click="mobileMenu = !mobileMenu">
            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              className="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="{2}"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div v-if="mobileMenu">
      <router-link :to="{ name: 'dashboard' }" class="block py-2 px-4 text-sm">
        Dashboard</router-link
      >
      <router-link :to="{ name: 'create' }" class="block py-2 px-4 text-sm">
        Create</router-link
      >
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      mobileMenu: false,
    };
  },
};
</script>
