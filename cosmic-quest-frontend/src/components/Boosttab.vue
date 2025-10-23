<template>
  <div class="space-y-6">
    <TaskInput 
      v-model="task"
      @submit="generate"
      :loading="loading"
    />
    
    <QuickSuggestions 
      v-if="!result && !loading"
      @select="task = $event"
    />
    
    <GenerateButton 
      :loading="loading"
      :disabled="!task.trim()"
      @click="generate"
    />
    
    <QuestResult 
      v-if="result && !loading"
      :result="result"
      :task="task"
      :karma="karma"
      :history-count="historyCount"
      @share="shareResult"
      @reset="resetForm"
    />
    
    <ErrorMessage 
      v-if="error"
      :message="error"
      @close="error = null"
    />
  </div>
</template>

<script setup>
import { ref, inject } from 'vue'
import axios from 'axios'
import confetti from 'canvas-confetti'
import TaskInput from './TaskInput.vue'
import QuickSuggestions from './QuickSuggestions.vue'
import GenerateButton from './GenerateButton.vue'
import QuestResult from './QuestResult.vue'
import ErrorMessage from './ErrorMessage.vue'

const emit = defineEmits(['quest-created'])
const showToast = inject('showToast')

const task = ref('')
const result = ref(null)
const error = ref(null)
const loading = ref(false)
const karma = ref(0)
const historyCount = ref(0)

const generate = async () => {
  if (!task.value.trim()) {
    error.value = "Tu dois d'abord décrire ta corvée ! 🎯"
    setTimeout(() => error.value = null, 3000)
    return
  }

  error.value = null
  loading.value = true
  result.value = null

  try {
    const res = await axios.post('http://localhost:8000/api/boost', { 
      task: task.value 
    }, {
      timeout: 30000
    })
    
    result.value = res.data

    const quest = {
      id: Date.now(),
      date: new Date(),
      task: task.value,
      result: res.data
    }

    emit('quest-created', quest)
    
    confetti({
      particleCount: 100,
      spread: 70,
      origin: { y: 0.6 },
      colors: ['#a78bfa', '#ec4899', '#6366f1']
    })
    
    showToast('✨', 'Nouvelle quête créée avec succès !')
    
  } catch (e) {
    console.error('Erreur:', e)
    error.value = e.response?.data?.error || "Oops ! L'IA fait une pause café ☕"
  } finally {
    loading.value = false
  }
}

const resetForm = () => {
  task.value = ''
  result.value = null
  error.value = null
}

const shareResult = () => {
  if (navigator.share) {
    navigator.share({
      title: 'Ma quête épique',
      text: `J'ai transformé "${task.value}" en aventure épique avec TaskMaster AI !`
    })
  } else {
    const text = `📝 Tâche: ${task.value}\n\n⚔️ Mission: ${result.value.quest}\n\n🏆 Compliment: ${result.value.compliment}\n\n🛡️ Excuse: ${result.value.excuse}`
    navigator.clipboard.writeText(text).then(() => {
      showToast('📋', 'Copié dans le presse-papier !')
    })
  }
}
</script>