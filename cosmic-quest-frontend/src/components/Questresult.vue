<template>
  <div class="space-y-4 animate-fadeIn">
    <QuestStats 
      :karma="karma"
      :history-count="historyCount"
    />
    
    <div class="space-y-3">
      <ResultCard
        icon="⚔️"
        title="Mission Épique"
        :content="result.quest"
        color="purple"
        :is-new="true"
      />
      
      <ResultCard
        icon="🏆"
        title="Boost d'Ego"
        :content="result.compliment"
        color="pink"
      />
      
      <ResultCard
        icon="🛡️"
        title="Plan de Secours"
        :content="result.excuse"
        color="indigo"
      />
    </div>
    
    <div class="flex gap-3 pt-4">
      <button
        @click="$emit('share')"
        class="flex-1 py-2 bg-white/10 hover:bg-white/20 rounded-xl text-gray-300 font-medium transition-all hover:scale-105"
      >
        Partager 📤
      </button>
      <button
        @click="$emit('reset')"
        class="flex-1 py-2 bg-gradient-to-r from-purple-600/50 to-pink-600/50 hover:from-purple-600 hover:to-pink-600 rounded-xl text-white font-medium transition-all hover:scale-105"
      >
        Nouvelle Quête ✨
      </button>
    </div>
  </div>
</template>

<script setup>
import QuestStats from './QuestStats.vue'
import ResultCard from './ResultCard.vue'

defineProps({
  result: Object,
  task: String,
  karma: Number,
  historyCount: Number
})

defineEmits(['share', 'reset'])
</script>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>