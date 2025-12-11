<template>
  <div class="relative group">
    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
      <svg class="w-5 h-5 transition-colors" :style="{ color: isFocused ? '#FF7B54' : '#B2BEC3' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
      </svg>
    </div>
    <input
      :value="modelValue"
      @input="handleInput"
      @keyup.enter="$emit('submit')"
      @focus="isFocused = true"
      @blur="isFocused = false"
      placeholder="Décris ta tâche ennuyeuse..."
      class="w-full pl-14 pr-16 py-4 rounded-2xl text-base font-medium transition-all duration-300"
      :style="{
        background: '#FEFBF6',
        border: isFocused ? '3px solid #FF7B54' : '3px solid #E8E4DF',
        color: '#2D3436',
        boxShadow: isFocused 
          ? '0 0 0 4px rgba(255, 123, 84, 0.15), inset 0 2px 4px rgba(0, 0, 0, 0.02)' 
          : 'inset 0 2px 4px rgba(0, 0, 0, 0.02)'
      }"
      :disabled="loading"
    />
    <div v-if="modelValue.length > 0" class="absolute right-4 top-1/2 -translate-y-1/2">
      <span class="text-xs font-bold px-2 py-1 rounded-full" style="background: #F5E6D8; color: #636E72;">{{ modelValue.length }}/500</span>
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

const isFocused = ref(false)
const typingTimeout = ref(null)

const handleInput = (event) => {
  emit('update:modelValue', event.target.value)
  
  clearTimeout(typingTimeout.value)
  typingTimeout.value = setTimeout(() => {
  }, 500)
}
</script>

<style scoped>
input::placeholder {
  color: #B2BEC3;
}
</style>