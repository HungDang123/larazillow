<template lang="">
  <Box> <div> <Link :href="route('listings.show', listing.id)"> <div class="flex
  items-center justify-center"> <Price :price="listing.price" class="text-2xl font-bold"
  /> <div class="text-sm text-gray-500"> <Price :price="monthlyPayment" />pm </div> </div>
  <ListingSpace :listing="listing" /> <ListingAddress :listing="listing" /> </Link> </div>
  <div> <button type="button"> <Link :href="route('listings.edit',
  listing.id)">Update</Link> </button> </div> <div> <Link :href="route('listings.destroy',
  listing.id)" method="delete" as="button" >Delete</Link > </div> </Box>
</template>
<script setup>
import Box from "@/Components/UI/Box.vue";
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import { Link } from "@inertiajs/vue3";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";
const props = defineProps({
  listing: Object,
});
const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>
<style lang=""></style>
