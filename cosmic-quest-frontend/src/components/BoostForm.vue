<template>
  <div>
    <input
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      placeholder="Ex: J'ai oublié un appel..."
      class="w-full p-4 rounded-2xl text-base font-medium mb-4 transition-all duration-300"
      style="background: #FEFBF6; border: 3px solid #E8E4DF; color: #2D3436;"
      @focus="$event.target.style.borderColor = '#FF7B54'; $event.target.style.boxShadow = '0 0 0 4px rgba(255, 123, 84, 0.15)'"
      @blur="$event.target.style.borderColor = '#E8E4DF'; $event.target.style.boxShadow = 'none'"
    />
    <button
      @click="$emit('generate')"
      :disabled="loading"
      class="w-full py-4 rounded-2xl font-bold text-lg transition-all duration-200"
      :style="loading 
        ? 'background: #E8E4DF; color: #B2BEC3; cursor: not-allowed;' 
        : 'background: linear-gradient(145deg, #FF7B54, #FFB996); color: white; box-shadow: 0 8px 0 rgba(255, 123, 84, 0.3);'"
      @mouseenter="!loading && ($event.target.style.transform = 'translateY(-2px)')"
      @mouseleave="!loading && ($event.target.style.transform = 'translateY(0)')"
    >
      {{ loading ? "Chargement..." : "Booster ma journée" }}
    </button>

    <transition name="fade">
      <div v-if="result" class="mt-6 space-y-4 animate-pop-in">
        <div class="rounded-2xl p-5" style="background: #FFF5F0; border: 3px solid #FFD4C4;">
          <h2 class="text-lg font-bold mb-2" style="color: #FF7B54;">🌌 Quête</h2>
          <p style="color: #636E72;">{{ result.quest }}</p>
        </div>
        <div class="rounded-2xl p-5" style="background: #F0FFF4; border: 3px solid #C3EDD0;">
          <h2 class="text-lg font-bold mb-2" style="color: #5DAF7B;">🛸 Compliment</h2>
          <p style="color: #636E72;">{{ result.compliment }}</p>
        </div>
        <div class="rounded-2xl p-5" style="background: #F8F5FF; border: 3px solid #DDD4F2;">
          <h2 class="text-lg font-bold mb-2" style="color: #9583CD;">☄️ Excuse</h2>
          <p style="color: #636E72;">{{ result.excuse }}</p>
        </div>
      </div>
    </transition>

    <p v-if="error" class="mt-4 p-4 rounded-2xl font-medium" style="background: #FFF0F0; border: 3px solid #FFCACA; color: #D63031;">{{ error }}</p>
  </div>
</template>

<script setup>
defineProps({
  modelValue: String,
  loading: Boolean,
  error: String,
  result: Object
})

defineEmits(['update:modelValue', 'generate'])
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

.animate-pop-in {
  animation: pop-in 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes pop-in {
  0% {
    transform: scale(0.9);
    opacity: 0;
  }
  50% {
    transform: scale(1.02);
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

input::placeholder {
  color: #B2BEC3;
}
</style>