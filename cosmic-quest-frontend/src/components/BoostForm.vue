<template>
  <div>
    <input
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      placeholder="Ex: J'ai oublié un appel..."
      class="w-full p-3 rounded-lg bg-violet-900 text-white outline-none mb-4 placeholder-gray-400 focus:ring-2 focus:ring-pink-400 transition hover:bg-violet-800"
    />
    <button
      @click="$emit('generate')"
      :disabled="loading"
      class="w-full py-3 rounded-lg bg-gradient-to-r from-pink-500 to-violet-500 hover:opacity-90 transition font-bold shadow-lg hover:scale-105 transform"
    >
      {{ loading ? "Chargement..." : "Booster ma journée" }}
    </button>

    <transition name="fade">
      <div v-if="result" class="mt-6 space-y-5 text-left bg-violet-900/30 p-4 rounded-xl border border-violet-700/30 animate-slide-in">
        <div>
          <h2 class="text-xl font-semibold text-pink-400 mb-1">🌌 Quête</h2>
          <p>{{ result.quest }}</p>
        </div>
        <div>
          <h2 class="text-xl font-semibold text-blue-400 mb-1">🛸 Compliment</h2>
          <p>{{ result.compliment }}</p>
        </div>
        <div>
          <h2 class="text-xl font-semibold text-green-400 mb-1">☄️ Excuse</h2>
          <p>{{ result.excuse }}</p>
        </div>
      </div>
    </transition>

    <p v-if="error" class="text-red-400 mt-4 animate-pulse">{{ error }}</p>
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

.animate-slide-in {
  animation: slide-in 0.5s ease-out;
}

@keyframes slide-in {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}
</style>