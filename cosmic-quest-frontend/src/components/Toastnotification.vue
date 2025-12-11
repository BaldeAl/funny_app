<template>
  <transition name="toast">
    <div 
      v-if="toast" 
      class="fixed bottom-4 right-4 rounded-2xl px-5 py-4 flex items-center gap-4 z-50"
      style="background: white; border: 3px solid #F5E6D8; box-shadow: 0 8px 0 rgba(0,0,0,0.05), 0 15px 40px rgba(0,0,0,0.1);"
    >
      <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background: linear-gradient(145deg, #86D4A3, #A8E6C3); box-shadow: 0 3px 0 rgba(134, 212, 163, 0.3);">
        <span class="text-xl">{{ toast.icon }}</span>
      </div>
      <span class="font-semibold" style="color: #2D3436;">{{ toast.message }}</span>
      <button 
        @click="$emit('close')"
        class="ml-2 w-7 h-7 rounded-full flex items-center justify-center transition-all"
        style="background: #F5E6D8;"
        @mouseenter="$event.target.style.background = '#E8E4DF'"
        @mouseleave="$event.target.style.background = '#F5E6D8'"
      >
        <svg class="w-4 h-4" style="color: #636E72;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
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
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.toast-enter-from {
  transform: translateX(100%) scale(0.8);
  opacity: 0;
}

.toast-leave-to {
  transform: translateY(20px) scale(0.9);
  opacity: 0;
}
</style>