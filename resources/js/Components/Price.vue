<template>
  <span class="font-bold">{{ formattedPrice }}</span>
</template>
<script setup>
import { computed } from "vue";
const props = defineProps({
  price: [Number, String],
});
const formattedPrice = computed(() =>
  Number(props.price).toLocaleString("vi-VN", {
    style: "currency",
    currency: "VND",
    maximumFractionDigits: 0,
  })
);
</script>
<style lang=""></style>
