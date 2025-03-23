<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment";
import { computed, ref } from "vue";
const props = defineProps({
  listing: Object,
});
const interestRate = ref(2.5);
const duration = ref(25);
const { monthlyPayment, totalPayment, totalInterest } = useMonthlyPayment(
  props.listing.price,
  interestRate,
  duration
);
</script>

<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box class="md:col-span-7 flex items-center w-full">
      <template #header> Basic info </template>
      <div class="w-full text-center text-gray-500 font-medium">
        <img
          src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/2546244c-1b86-458f-978a-e35bf28e7468/dj79cks-f57a5eee-0fbc-406c-a8f9-e7d97aa413dc.png/v1/fit/w_828,h_1478,q_70,strp/golden_slumber_by_valqira_dj79cks-414w-2x.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MjkxMiIsInBhdGgiOiJcL2ZcLzI1NDYyNDRjLTFiODYtNDU4Zi05NzhhLWUzNWJmMjhlNzQ2OFwvZGo3OWNrcy1mNTdhNWVlZS0wZmJjLTQwNmMtYThmOS1lN2Q5N2FhNDEzZGMucG5nIiwid2lkdGgiOiI8PTE2MzIifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.nDJ9vUWW0M4BeQO8vMWGvCF7mWfLId_GlZ1mdILzGXY"
          alt="meo_meo"
        />
      </div>
    </Box>
    <div class="flex flex-col md:col-span-5 gap-4">
      <Box class="md:col-span-5">
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" />
        <ListingAddress :listing="listing" />
      </Box>
      <Box>
        <template #header>Monthly payment</template>
        <div>
          <label class="label">Interest rate ({{ interestRate }} %)</label>
          <input
            v-model.number="interestRate"
            type="range"
            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
            min="0.1"
            max="30"
            step="0.1"
          />

          <label class="label">Duration ({{ duration }} years)</label>
          <input
            v-model.number="duration"
            type="range"
            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
            min="3"
            max="35"
            step="1"
          />
          <div class="text-gray-600 dark:text-gray-400 mt-2">
            <div class="text-gray-400">Your monthly payment</div>
            <Price :price="monthlyPayment" class="text-3xl font-bold" />
          </div>
          <div class="text-gray-600 dark:text-gray-400 mt-2">
            <div class="flex justify-between">
              <div>Principal paid</div>
              <Price :price="props.listing.price" class="font-bold" />
            </div>
            <div class="flex justify-between">
              <div>Interest paid</div>
              <Price :price="totalInterest" class="font-bold" />
            </div>
            <div class="flex justify-between">
              <div>Total paid</div>
              <Price :price="totalPayment" class="font-bold" />
            </div>
          </div>
        </div>
      </Box>
    </div>
  </div>
</template>

<style scoped></style>
