<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({filters: Object})
const filterForm = useForm({
  priceFrom: props.filters.priceFrom ?? null,
  priceTo:  props.filters.priceTo ?? null,
  beds:  props.filters.beds ?? null,
  baths:  props.filters.baths ?? null,
  areaFrom:  props.filters.areaFrom ?? null,
  areaTo:  props.filters.areaTo ?? null,
});
const filter = () => {
  filterForm.get(route("listings.index"),
      {
        preserveState: true,
        preserveScroll: true,
      })
}
const clear = () => {
  filterForm.priceFrom = null,
      filterForm.priceTo = null,
      filterForm.beds = null,
      filterForm.baths = null,
      filterForm.areaFrom = null,
      filterForm.areaTo = null
}
</script>

<template>
  <form @submit.prevent="filter">
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input type="text" name="" id="" placeholder="Price from" v-model.number="filterForm.priceFrom"
               class="input-filter-l"/>
        <input type="text" name="" id="" placeholder="Price to" v-model.number="filterForm.priceTo"
               class="input-filter-r"/>
      </div>
      <div class="flex flex-nowrap items-center">
        <select class="input-filter-l w-28" v-model.number="filterForm.beds">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
          <option>+6</option>
        </select>
        <select class="input-filter-r w-28" v-model.number="filterForm.baths">
          <option :value="null">Baths</option>
          <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
          <option>+6</option>
        </select>
      </div>
      <div class="flex flex-nowrap items-center">
        <input type="text" name="" id="" class="input-filter-l" placeholder="Area from"
               v-model.number="filterForm.areaFrom"/>
        <input type="text" name="" id="" class="input-filter-r" placeholder="Area to"
               v-model.number="filterForm.areaTo"/>
      </div>
      <button type="submit" class="btn-primary w-20">Submit</button>
      <button type="reset" class="btn-normal w-20" @click="clear">Reset</button>
    </div>
  </form>
</template>

<style scoped>

</style>