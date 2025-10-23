<template>
  <div class="text-center">
    <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 mb-2">
      Journal des Quêtes
    </h2>
    <div class="flex justify-center items-center gap-6 mt-4">
      <div class="text-center">
        <div class="text-3xl font-bold text-yellow-400 flex items-center justify-center gap-1">
          {{ karma }}
          <span class="text-2xl">⭐</span>
        </div>
        <div class="text-xs text-gray-400 mt-1">Karma Total</div>
      </div>
      <div class="w-px h-8 bg-gray-600"></div>
      <div class="text-center">
        <div class="text-3xl font-bold text-purple-400">
          {{ questCount }}
        </div>
        <div class="text-xs text-gray-400 mt-1">Quêtes Accomplies</div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  karma: Number,
  questCount: Number
})
</script>