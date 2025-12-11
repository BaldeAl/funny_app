<template>
  <button
    @click="$emit('click')"
    :disabled="disabled || loading"
    class="relative w-full py-4 rounded-2xl font-bold text-lg transition-all duration-200 overflow-hidden"
    :style="buttonStyle"
    :class="buttonClass"
  >
    <span v-if="loading" class="flex items-center justify-center gap-3">
      <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
      </svg>
      <span>Création de ta quête épique...</span>
    </span>
    <span v-else class="flex items-center justify-center gap-3">
      <svg class="w-6 h-6 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
      </svg>
      Transformer cette corvée
    </span>
  </button>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  loading: Boolean,
  disabled: Boolean
})

defineEmits(['click'])

const buttonStyle = computed(() => {
  if (props.disabled || props.loading) {
    return {
      background: '#E8E4DF',
      color: '#B2BEC3',
      cursor: 'not-allowed',
      boxShadow: 'none'
    }
  }
  return {
    background: 'linear-gradient(145deg, #FF7B54, #FFB996)',
    color: 'white',
    boxShadow: '0 8px 0 rgba(255, 123, 84, 0.3), 0 12px 25px rgba(255, 123, 84, 0.25)',
    transform: 'translateY(0)'
  }
})

const buttonClass = computed(() => {
  if (props.disabled || props.loading) return ''
  return 'hover:-translate-y-1 hover:shadow-lg active:translate-y-1 active:shadow-sm group'
})
</script>

<style scoped>
button:not(:disabled):hover {
  box-shadow: 0 12px 0 rgba(255, 123, 84, 0.3), 0 16px 30px rgba(255, 123, 84, 0.3) !important;
}

button:not(:disabled):active {
  box-shadow: 0 4px 0 rgba(255, 123, 84, 0.3), 0 6px 15px rgba(255, 123, 84, 0.2) !important;
}
</style>