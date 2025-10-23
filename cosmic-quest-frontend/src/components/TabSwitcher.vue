<template>
  <div class="flex justify-between items-center mb-6">
    <button
      @click="updateTab('boost')"
      :class="activeTab === 'boost' ? activeTabClass : tabClass"
      class="relative overflow-hidden"
    >
      <span class="relative z-10">🌠 Booster</span>
      <span v-if="activeTab === 'boost'" class="absolute inset-0 bg-gradient-to-r from-violet-600 to-pink-600 animate-pulse"></span>
    </button>
    <button
      @click="updateTab('history')"
      :class="activeTab === 'history' ? activeTabClass : tabClass"
      class="relative overflow-hidden"
    >
      <span class="relative z-10">📜 Historique</span>
      <span v-if="activeTab === 'history'" class="absolute inset-0 bg-gradient-to-r from-violet-600 to-pink-600 animate-pulse"></span>
    </button>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  modelValue: String
})

const emit = defineEmits(['update:modelValue'])

const updateTab = (tab) => {
  emit('update:modelValue', tab)
}

const tabClass = computed(() => 
  'flex-1 py-2 text-center font-semibold text-white/70 bg-violet-900 rounded-lg transition hover:bg-violet-800 hover:scale-105 transform'
)

const activeTabClass = computed(() => 
  'flex-1 py-2 text-center font-semibold bg-gradient-to-r from-violet-600 to-pink-600 text-white rounded-lg shadow-md transform scale-105'
)

const activeTab = computed(() => props.modelValue)
</script>