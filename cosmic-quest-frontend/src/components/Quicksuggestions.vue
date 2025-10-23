<template>
  <div class="flex flex-wrap gap-2">
    <button
      v-for="suggestion in suggestions"
      :key="suggestion"
      @click="$emit('select', suggestion)"
      class="px-3 py-1.5 text-sm bg-white/10 hover:bg-white/20 text-gray-300 rounded-full transition-all hover:scale-105"
    >
      {{ suggestion }}
    </button>
  </div>
</template>

<script setup>
defineEmits(['select'])

const suggestions = [
  "Répondre aux emails",
  "Faire le ménage",
  "Appeler ma mère",
  "Finir ce rapport"
]
</script>