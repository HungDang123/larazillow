<template lang="">
  <div> <span class="font-bold">
  {{ listing.beds }}
  </span> beds <span class="text-gray"> | </span> <span class="font-bold">
  {{ listing.baths }}
  </span> baths <span class="text-gray"> | </span> <span class="font-bold">
  {{ listing.area }}
  </span> m<sup>2</sup> </div>
</template>
<script setup>
defineProps({
  listing: Object,
});
</script>
<style lang=""></style>
