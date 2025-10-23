<template>
  <button
    @click="$emit('click')"
    :disabled="disabled || loading"
    class="relative w-full py-4 rounded-2xl font-bold text-white transition-all duration-300 transform overflow-hidden group"
    :class="[
      disabled || loading
        ? 'bg-gray-700 cursor-not-allowed opacity-50'
        : 'bg-gradient-to-r from-purple-600 to-pink-600 hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98]'
    ]"
  >
    <span v-if="loading" class="flex items-center justify-center gap-3">
      <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
      </svg>
      <span class="animate-pulse">Création de ta quête épique...</span>
    </span>
    <span v-else class="flex items-center justify-center gap-2">
      <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
      </svg>
      Transformer cette corvée
    </span>
    <div v-if="!loading && !disabled" class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity"></div>
  </button>
</template>

<script setup>
defineProps({
  loading: Boolean,
  disabled: Boolean
})

defineEmits(['click'])
</script>