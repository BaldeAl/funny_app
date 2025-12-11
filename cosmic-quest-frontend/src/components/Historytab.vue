<template>
  <div class="space-y-6">
    <HistoryHeader 
      :karma="karma"
      :quest-count="history.length"
    />
    
    <HistorySearch 
      v-model="searchQuery"
      @sort="sortHistory"
    />
    
    <HistoryEmpty 
      v-if="filteredHistory.length === 0"
    />
    
    <HistoryList 
      v-else
      :items="filteredHistory"
      @delete="deleteItem"
      @copy="copyToClipboard"
    />
    
    <HistoryActions 
      v-if="history.length > 0"
      @export="exportHistory"
      @clear="clearHistory"
    />
  </div>
</template>

<script setup>
import { ref, computed, inject } from 'vue'
import HistoryHeader from './Historyheader.vue'
import HistorySearch from './Historysearch.vue'
import HistoryEmpty from './Historyempty.vue'
import HistoryList from './HistoryList.vue'
import HistoryActions from './Historyactions.vue'

const props = defineProps({
  history: Array,
  karma: Number
})

const emit = defineEmits(['update:history', 'update:karma'])
const showToast = inject('showToast')

const searchQuery = ref('')

const filteredHistory = computed(() => {
  if (!searchQuery.value) return props.history
  
  const query = searchQuery.value.toLowerCase()
  return props.history.filter(item => 
    item.task.toLowerCase().includes(query) ||
    item.result.quest.toLowerCase().includes(query) ||
    item.result.compliment.toLowerCase().includes(query) ||
    item.result.excuse.toLowerCase().includes(query)
  )
})

const sortHistory = () => {
  const sorted = [...props.history].reverse()
  emit('update:history', sorted)
  showToast('🔄', 'Tri inversé')
}

const deleteItem = (index) => {
  if (confirm("Supprimer cette quête de l'historique ?")) {
    const newHistory = [...props.history]
    newHistory.splice(index, 1)
    emit('update:history', newHistory)
    emit('update:karma', Math.max(0, props.karma - 1))
    showToast('🗑️', 'Quête supprimée')
  }
}

const copyToClipboard = (item) => {
  const text = `📝 Tâche: ${item.task}\n\n⚔️ Mission: ${item.result.quest}\n\n🏆 Compliment: ${item.result.compliment}\n\n🛡️ Excuse: ${item.result.excuse}`
  
  navigator.clipboard.writeText(text).then(() => {
    showToast('📋', 'Copié dans le presse-papier !')
  })
}

const exportHistory = () => {
  const data = JSON.stringify(props.history, null, 2)
  const blob = new Blob([data], { type: 'application/json' })
  const url = URL.createObjectURL(blob)
  const a = document.createElement('a')
  a.href = url
  a.download = `taskmaster-history-${Date.now()}.json`
  a.click()
  URL.revokeObjectURL(url)
  showToast('📥', 'Historique exporté')
}

const clearHistory = () => {
  if (confirm("Effacer définitivement tout l'historique ? Cette action est irréversible !")) {
    emit('update:history', [])
    emit('update:karma', 0)
    showToast('🧹', 'Historique effacé')
  }
}
</script>