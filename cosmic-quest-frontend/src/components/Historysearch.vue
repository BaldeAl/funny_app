<template>
  <div class="flex gap-3">
    <input
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      placeholder="Rechercher une quête..."
      class="flex-1 px-5 py-3 rounded-xl text-base font-medium transition-all duration-300"
      style="background: #FEFBF6; border: 3px solid #E8E4DF; color: #2D3436;"
      @focus="$event.target.style.borderColor = '#B8A9E5'; $event.target.style.boxShadow = '0 0 0 4px rgba(184, 169, 229, 0.15)'"
      @blur="$event.target.style.borderColor = '#E8E4DF'; $event.target.style.boxShadow = 'none'"
    />
    <button
      @click="$emit('sort')"
      class="px-4 py-3 rounded-xl transition-all duration-200"
      style="background: #FEFBF6; border: 3px solid #E8E4DF; box-shadow: 0 4px 0 rgba(0,0,0,0.05);"
      @mouseenter="$event.target.style.transform = 'translateY(-2px)'; $event.target.style.boxShadow = '0 6px 0 rgba(0,0,0,0.08)'"
      @mouseleave="$event.target.style.transform = 'translateY(0)'; $event.target.style.boxShadow = '0 4px 0 rgba(0,0,0,0.05)'"
    >
      <svg class="w-5 h-5" style="color: #636E72;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
      </svg>
    </button>
  </div>
</template>

<script setup>
defineProps({
  modelValue: String
})

defineEmits(['update:modelValue', 'sort'])
</script>

<style scoped>
input::placeholder {
  color: #B2BEC3;
}
</style>