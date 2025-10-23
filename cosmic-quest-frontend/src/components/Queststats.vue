<template>
  <div class="flex justify-center gap-4 mb-6">
    <div class="text-center">
      <div class="text-2xl font-bold text-purple-400">+1</div>
      <div class="text-xs text-gray-400">XP Gagné</div>
    </div>
    <div class="text-center">
      <div class="text-2xl font-bold text-pink-400">{{ karma }}</div>
      <div class="text-xs text-gray-400">Karma Total</div>
    </div>
    <div class="text-center">
      <div class="text-2xl font-bold text-indigo-400">{{ historyCount }}</div>
      <div class="text-xs text-gray-400">Quêtes</div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  karma: Number,
  historyCount: Number
})
</script>