<script setup>
import {Link} from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import Box from "@/Components/UI/Box.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Filter from "@/Pages/Listing/Index/Components/Filter.vue";

const props = defineProps({
  listings: Object,
  filters:Object
});
</script>

<template>
  <div>
    <Filter :filters="filters"/>
  </div>
  <div class="grid grid-cols-3 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in props.listings.data" :key="listing['id']" :listing="listing"/>
  </div>
  <div v-if="props.listings.data.length" class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="props.listings.links"/>
  </div>
</template>

<style scoped></style>
