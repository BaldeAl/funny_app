<template>
  <div class="space-y-4 animate-pop-in">
    <QuestStats 
      :karma="karma"
      :history-count="historyCount"
    />
    
    <div class="space-y-4">
      <ResultCard
        icon="⚔️"
        title="Mission Épique"
        :content="result.quest"
        color="coral"
        :is-new="true"
      />
      
      <ResultCard
        icon="🏆"
        title="Boost d'Ego"
        :content="result.compliment"
        color="mint"
      />
      
      <ResultCard
        icon="🛡️"
        title="Plan de Secours"
        :content="result.excuse"
        color="lavender"
      />
    </div>
    
    <div class="flex gap-3 pt-4">
      <button
        @click="$emit('share')"
        class="flex-1 py-3 rounded-xl font-bold transition-all duration-200"
        style="background: #FEFBF6; border: 3px solid #E8E4DF; color: #636E72; box-shadow: 0 4px 0 rgba(0,0,0,0.05);"
        @mouseenter="$event.target.style.transform = 'translateY(-2px)'; $event.target.style.boxShadow = '0 6px 0 rgba(0,0,0,0.08)'"
        @mouseleave="$event.target.style.transform = 'translateY(0)'; $event.target.style.boxShadow = '0 4px 0 rgba(0,0,0,0.05)'"
      >
        Partager 📤
      </button>
      <button
        @click="$emit('reset')"
        class="flex-1 py-3 rounded-xl font-bold transition-all duration-200"
        style="background: linear-gradient(145deg, #86D4A3, #A8E6C3); color: white; box-shadow: 0 6px 0 rgba(134, 212, 163, 0.3);"
        @mouseenter="$event.target.style.transform = 'translateY(-2px)'; $event.target.style.boxShadow = '0 8px 0 rgba(134, 212, 163, 0.3)'"
        @mouseleave="$event.target.style.transform = 'translateY(0)'; $event.target.style.boxShadow = '0 6px 0 rgba(134, 212, 163, 0.3)'"
      >
        Nouvelle Quête ✨
      </button>
    </div>
  </div>
</template>

<script setup>
import QuestStats from './Queststats.vue'
import ResultCard from './Resultcard.vue'

defineProps({
  result: Object,
  task: String,
  karma: Number,
  historyCount: Number
})

defineEmits(['share', 'reset'])
</script>

<style scoped>
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
</style>