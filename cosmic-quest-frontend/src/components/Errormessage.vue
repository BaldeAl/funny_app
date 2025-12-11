<template>
  <transition name="shake">
    <div class="rounded-2xl p-4" style="background: #FFF0F0; border: 3px solid #FFCACA;">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(145deg, #FF7B7B, #FFA5A5); box-shadow: 0 3px 0 rgba(255, 123, 123, 0.3);">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
          </svg>
        </div>
        <p class="flex-1 font-medium" style="color: #D63031;">{{ message }}</p>
        <button @click="$emit('close')" class="w-8 h-8 rounded-full flex items-center justify-center transition-all" style="background: rgba(214, 48, 49, 0.1);" @mouseenter="$event.target.style.background = 'rgba(214, 48, 49, 0.2)'" @mouseleave="$event.target.style.background = 'rgba(214, 48, 49, 0.1)'">
          <svg class="w-4 h-4" style="color: #D63031;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </transition>
</template>

<script setup>
defineProps({
  message: String
})

defineEmits(['close'])
</script>

<style scoped>
.shake-enter-active {
  animation: shake 0.5s;
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
  20%, 40%, 60%, 80% { transform: translateX(4px); }
}
</style>