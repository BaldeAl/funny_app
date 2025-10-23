<template>
  <transition name="toast">
    <div 
      v-if="toast" 
      class="fixed bottom-4 right-4 bg-white/10 backdrop-blur-lg rounded-xl px-4 py-3 shadow-2xl border border-white/20 flex items-center gap-3 z-50"
    >
      <span class="text-2xl">{{ toast.icon }}</span>
      <span class="text-white">{{ toast.message }}</span>
      <button 
        @click="$emit('close')"
        class="ml-2 text-gray-400 hover:text-white transition-colors"
      >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
  </transition>
</template>

<script setup>
defineProps({
  toast: Object
})

defineEmits(['close'])
</script>

<style scoped>
.toast-enter-active,
.toast-leave-active {
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.toast-enter-from {
  transform: translateX(100%);
  opacity: 0;
}

.toast-leave-to {
  transform: translateY(100%);
  opacity: 0;
}
</style>