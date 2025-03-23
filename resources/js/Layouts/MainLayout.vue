<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.user);
</script>

<template>
  <header
    class="border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 w-full"
  >
    <div class="container mx-auto"></div>
    <nav class="flex justify-between items-center p-4">
      <div class="text-lg font-medium">
        <Link :href="route('listings.index')">Listing </Link>
      </div>
      <div
        class="text-lg text-indigo-600 dark:text-indigo-400 font-bold text-center hover:text-indigo-500 dark:hover:text-indigo-300"
      >
        <Link :href="route('listings.index')">LaraZillow</Link>
      </div>
      <div v-if="user" class="flex items-center gap-4">
      <div>{{ user.name }}</div>
        <Link
          :href="route('listings.create')"
          class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium p-2 rounded-md"
        >
          + New Listing
        </Link>
        <Link
          :href="route('logout')"
          class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium p-2 rounded-md"
          as="button"
        >
          Logout
        </Link>
      </div>
      <div v-else>
        <Link
          :href="route('login')"
          class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium p-2 rounded-md"
        >
          Login 
        </Link>
      </div>
    </nav>
  </header>
  <main class="container mx-auto p-4">
    <div
      v-if="flashSuccess"
      class="mb-4 border rounded-md shadow-sm p-4 border-green-200 dark:border-green-500 bg-green-500 dark:bg-green-900 text-white"
    >
      {{ flashSuccess }}
    </div>
    <slot></slot>
  </main>
</template>

<style scoped></style>
