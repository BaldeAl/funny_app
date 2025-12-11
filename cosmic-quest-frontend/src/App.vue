<template>
  <div class="min-h-screen relative overflow-hidden" style="background: linear-gradient(135deg, #FFF8F0 0%, #FEFBF6 50%, #FFF0E6 100%);">
    <BackgroundStars />
    
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center p-4 md:p-6">
      <AppHeader />
      
      <div class="w-full max-w-2xl card-3d overflow-hidden" style="background: #FFFFFF; border: 4px solid #F5E6D8;">
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
import BackgroundStars from './components/Backgroundstars.vue'
import AppHeader from './components/Appheader.vue'
import AppFooter from './components/Appfooter.vue'
import NavigationTabs from './components/Navigationtabs.vue'
import BoostTab from './components/Boosttab.vue'
import HistoryTab from './components/Historytab.vue'
import ToastNotification from './components/Toastnotification.vue'

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
  transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.slide-fade-enter-from {
  transform: translateX(20px) scale(0.95);
  opacity: 0;
}

.slide-fade-leave-to {
  transform: translateX(-20px) scale(0.95);
  opacity: 0;
}
</style>