<template>
  <div class="flex bg-white/5 p-2">
    <button
      @click="$emit('update:tab', 'boost')"
      :class="[
        'flex-1 py-3 px-4 rounded-xl font-medium transition-all duration-300 flex items-center justify-center gap-2',
        activeTab === 'boost' 
          ? 'bg-gradient-to-r from-purple-500 to-pink-500 text-white shadow-lg transform scale-105' 
          : 'text-gray-300 hover:text-white hover:bg-white/10'
      ]"
    >
      <svg v-if="activeTab === 'boost'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
      </svg>
      <span>Générer</span>
    </button>
    
    <button
      @click="$emit('update:tab', 'history')"
      :class="[
        'flex-1 py-3 px-4 rounded-xl font-medium transition-all duration-300 flex items-center justify-center gap-2',
        activeTab === 'history' 
          ? 'bg-gradient-to-r from-purple-500 to-pink-500 text-white shadow-lg transform scale-105' 
          : 'text-gray-300 hover:text-white hover:bg-white/10'
      ]"
    >
      <svg v-if="activeTab === 'history'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      <span>Historique</span>
      <span v-if="historyCount > 0" class="ml-2 px-2 py-0.5 bg-purple-600/50 rounded-full text-xs">
        {{ historyCount }}
      </span>
    </button>
  </div>
</template>

<script setup>
defineProps({
  activeTab: String,
  historyCount: Number
})

defineEmits(['update:tab'])
</script>