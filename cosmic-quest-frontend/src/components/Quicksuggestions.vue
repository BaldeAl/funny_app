<template>
  <div class="flex flex-wrap gap-2">
    <button
      v-for="suggestion in suggestions"
      :key="suggestion"
      @click="$emit('select', suggestion)"
      class="px-4 py-2 text-sm font-semibold rounded-full transition-all duration-200"
      style="background: #FEFBF6; border: 2px solid #E8E4DF; color: #636E72;"
      @mouseenter="$event.target.style.borderColor = '#FF7B54'; $event.target.style.color = '#FF7B54'; $event.target.style.transform = 'scale(1.05)'"
      @mouseleave="$event.target.style.borderColor = '#E8E4DF'; $event.target.style.color = '#636E72'; $event.target.style.transform = 'scale(1)'"
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