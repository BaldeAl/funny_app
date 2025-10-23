<template>
  <div class="relative group">
    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
      <svg class="w-5 h-5 text-gray-400 group-focus-within:text-purple-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
      </svg>
    </div>
    <input
      :value="modelValue"
      @input="handleInput"
      @keyup.enter="$emit('submit')"
      placeholder="Décris ta tâche ennuyeuse..."
      class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300"
      :class="{'animate-pulse-border': isTyping}"
      :disabled="loading"
    />
    <div v-if="modelValue.length > 0" class="absolute right-3 top-1/2 -translate-y-1/2">
      <span class="text-xs text-gray-400">{{ modelValue.length }}/500</span>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
  modelValue: String,
  loading: Boolean
})

const emit = defineEmits(['update:modelValue', 'submit'])

const isTyping = ref(false)
const typingTimeout = ref(null)

const handleInput = (event) => {
  emit('update:modelValue', event.target.value)
  
  isTyping.value = true
  clearTimeout(typingTimeout.value)
  typingTimeout.value = setTimeout(() => {
    isTyping.value = false
  }, 500)
}
</script>

<style scoped>
@keyframes pulseBorder {
  0%, 100% { border-color: rgba(139, 92, 246, 0.3); }
  50% { border-color: rgba(236, 72, 153, 0.5); }
}

.animate-pulse-border {
  animation: pulseBorder 2s ease-in-out infinite;
}
</style>