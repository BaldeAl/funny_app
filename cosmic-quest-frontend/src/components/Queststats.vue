<template>
  <div class="flex justify-center gap-6 mb-6 p-4 rounded-2xl" style="background: #FEFBF6; border: 2px solid #F5E6D8;">
    <div class="text-center">
      <div class="text-2xl font-black" style="color: #FF7B54;">+1</div>
      <div class="text-xs font-semibold" style="color: #B2BEC3;">XP Gagné</div>
    </div>
    <div class="w-px self-stretch" style="background: #E8E4DF;"></div>
    <div class="text-center">
      <div class="text-2xl font-black" style="color: #86D4A3;">{{ karma }}</div>
      <div class="text-xs font-semibold" style="color: #B2BEC3;">Karma Total</div>
    </div>
    <div class="w-px self-stretch" style="background: #E8E4DF;"></div>
    <div class="text-center">
      <div class="text-2xl font-black" style="color: #B8A9E5;">{{ historyCount }}</div>
      <div class="text-xs font-semibold" style="color: #B2BEC3;">Quêtes</div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  karma: Number,
  historyCount: Number
})
</script>