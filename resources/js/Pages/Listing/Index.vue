<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import Box from "@/Components/UI/Box.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
defineProps({
  listings: Array,
});
</script>

<template>
  <div class="grid grid-cols-3 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings" :key="listing.id" :listing="listing" />
  </div>
</template>

<style scoped></style>
