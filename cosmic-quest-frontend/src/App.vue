<template>
  <div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <BackgroundStars />
    
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center p-4 md:p-6">
      <AppHeader />
      
      <div class="w-full max-w-2xl bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
        <NavigationTabs 
          :active-tab="activeTab" 
          :history-count="historyCount"
          @update:tab="activeTab = $event"
        />
        
        <div class="p-6 md:p-8">
          <transition name="slide-fade" mode="out-in">
            <BoostTab 
              v-if="activeTab === 'boost'" 
              key="boost"
              @quest-created="handleQuestCreated"
            />
            <HistoryTab 
              v-else 
              key="history"
              :history="history"
              :karma="karma"
              @update:history="history = $event"
              @update:karma="karma = $event"
            />
          </transition>
        </div>
      </div>
      
      <AppFooter />
    </div>
    
    <ToastNotification :toast="toast" @close="toast = null" />
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch, provide } from 'vue'
import BackgroundStars from './components/BackgroundStars.vue'
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'
import NavigationTabs from './components/NavigationTabs.vue'
import BoostTab from './components/BoostTab.vue'
import HistoryTab from './components/HistoryTab.vue'
import ToastNotification from './components/ToastNotification.vue'

const activeTab = ref('boost')
const history = ref([])
const karma = ref(0)
const toast = ref(null)

const historyCount = computed(() => history.value.length)

const showToast = (icon, message) => {
  toast.value = { icon, message }
  setTimeout(() => {
    toast.value = null
  }, 3000)
}

provide('showToast', showToast)

onMounted(() => {
  const savedHistory = JSON.parse(localStorage.getItem('taskMasterHistory') || '[]')
  const savedKarma = parseInt(localStorage.getItem('taskMasterKarma') || '0')
  history.value = savedHistory
  karma.value = savedKarma
})

watch([history, karma], () => {
  localStorage.setItem('taskMasterHistory', JSON.stringify(history.value))
  localStorage.setItem('taskMasterKarma', karma.value.toString())
}, { deep: true })

const handleQuestCreated = (quest) => {
  history.value.unshift(quest)
  karma.value += 1
}
</script>

<style>
.slide-fade-enter-active,
.slide-fade-leave-active {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.slide-fade-enter-from {
  transform: translateX(20px);
  opacity: 0;
}

.slide-fade-leave-to {
  transform: translateX(-20px);
  opacity: 0;
}
</style>