<template>
  <div class="flex gap-3 pt-4">
    <button
      @click="$emit('export')"
      class="flex-1 py-3.5 rounded-xl font-bold transition-all duration-200"
      style="background: linear-gradient(145deg, #B8A9E5, #D4C9F2); color: white; box-shadow: 0 6px 0 rgba(184, 169, 229, 0.3);"
      @mouseenter="$event.target.style.transform = 'translateY(-2px)'; $event.target.style.boxShadow = '0 8px 0 rgba(184, 169, 229, 0.3)'"
      @mouseleave="$event.target.style.transform = 'translateY(0)'; $event.target.style.boxShadow = '0 6px 0 rgba(184, 169, 229, 0.3)'"
    >
      Exporter 📥
    </button>
    <button
      @click="$emit('clear')"
      class="flex-1 py-3.5 rounded-xl font-bold transition-all duration-200"
      style="background: #FFF0F0; border: 3px solid #FFCACA; color: #D63031; box-shadow: 0 4px 0 rgba(214, 48, 49, 0.1);"
      @mouseenter="$event.target.style.transform = 'translateY(-2px)'; $event.target.style.boxShadow = '0 6px 0 rgba(214, 48, 49, 0.15)'"
      @mouseleave="$event.target.style.transform = 'translateY(0)'; $event.target.style.boxShadow = '0 4px 0 rgba(214, 48, 49, 0.1)'"
    >
      Tout effacer 🗑️
    </button>
  </div>
</template>

<script setup>
defineEmits(['export', 'clear'])
</script>