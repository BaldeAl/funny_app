<template>
  <div class="flex gap-3 pt-4">
    <button
      @click="$emit('export')"
      class="flex-1 py-3 bg-gradient-to-r from-purple-600/50 to-pink-600/50 hover:from-purple-600 hover:to-pink-600 rounded-xl text-white font-medium transition-all hover:scale-105"
    >
      Exporter 📥
    </button>
    <button
      @click="$emit('clear')"
      class="flex-1 py-3 bg-red-600/50 hover:bg-red-600 rounded-xl text-white font-medium transition-all hover:scale-105"
    >
      Tout effacer 🗑️
    </button>
  </div>
</template>

<script setup>
defineEmits(['export', 'clear'])
</script>