<script setup>
import {Link} from "@inertiajs/vue3";
defineProps({
  message: String
});
</script>
<script>
  import MainLayout from "@/Layouts/MainLayout.vue";

  export default {
    layout: MainLayout
  }
</script>
<template>
    <div>{{ message}}</div>
    <Link href="/hello">Show page</Link>
</template>

<style scoped>

</style>