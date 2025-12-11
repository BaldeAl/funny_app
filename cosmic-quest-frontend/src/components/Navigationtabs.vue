<template>
  <div class="flex p-3 gap-3" style="background: #FEFBF6; border-bottom: 2px solid #F5E6D8;">
    <button
      @click="$emit('update:tab', 'boost')"
      :class="[
        'flex-1 py-3.5 px-5 rounded-xl font-bold transition-all duration-300 flex items-center justify-center gap-2',
        activeTab === 'boost' 
          ? 'text-white transform scale-105' 
          : 'text-gray-500 hover:text-gray-700'
      ]"
      :style="activeTab === 'boost' 
        ? 'background: linear-gradient(145deg, #FF7B54, #FFB996); box-shadow: 0 6px 0 rgba(255, 123, 84, 0.3);' 
        : 'background: white; box-shadow: 0 4px 0 rgba(0,0,0,0.05);'"
    >
      <svg v-if="activeTab === 'boost'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
      </svg>
      <span>Générer</span>
    </button>
    
    <button
      @click="$emit('update:tab', 'history')"
      :class="[
        'flex-1 py-3.5 px-5 rounded-xl font-bold transition-all duration-300 flex items-center justify-center gap-2',
        activeTab === 'history' 
          ? 'text-white transform scale-105' 
          : 'text-gray-500 hover:text-gray-700'
      ]"
      :style="activeTab === 'history' 
        ? 'background: linear-gradient(145deg, #B8A9E5, #D4C9F2); box-shadow: 0 6px 0 rgba(184, 169, 229, 0.3);' 
        : 'background: white; box-shadow: 0 4px 0 rgba(0,0,0,0.05);'"
    >
      <svg v-if="activeTab === 'history'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      <span>Historique</span>
      <span v-if="historyCount > 0" class="ml-1 px-2.5 py-0.5 rounded-full text-xs font-bold" style="background: rgba(255, 123, 84, 0.15); color: #FF7B54;">
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