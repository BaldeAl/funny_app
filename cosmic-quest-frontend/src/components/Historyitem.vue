<template>
  <div
    class="group bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300"
    :class="{'ring-2 ring-purple-500': isExpanded}"
  >
    <div
      @click="toggleExpand"
      class="p-4 cursor-pointer hover:bg-white/5 transition-colors"
    >
      <div class="flex justify-between items-start">
        <div class="flex-1">
          <div class="flex items-center gap-2 mb-2">
            <span class="text-xs text-gray-400">{{ formatDate(item.date) }}</span>
            <span class="px-2 py-0.5 bg-purple-600/30 rounded-full text-xs text-purple-300">
              Quête #{{ total - index }}
            </span>
          </div>
          <h3 class="font-semibold text-white mb-1">{{ item.task }}</h3>
          <p class="text-sm text-gray-300 line-clamp-2">{{ item.result.quest }}</p>
        </div>
        <button class="ml-4 text-gray-400 hover:text-white transition-transform"
                :class="{'rotate-180': isExpanded}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
      </div>
    </div>
    
    <transition name="expand">
      <div v-if="isExpanded" class="px-4 pb-4 space-y-3 border-t border-white/10">
        <div class="pt-3 space-y-3">
          <div class="bg-purple-600/10 rounded-xl p-3">
            <div class="flex items-center gap-2 mb-1">
              <span class="text-sm font-semibold text-purple-300">⚔️ Mission</span>
            </div>
            <p class="text-sm text-gray-200">{{ item.result.quest }}</p>
          </div>
          <div class="bg-pink-600/10 rounded-xl p-3">
            <div class="flex items-center gap-2 mb-1">
              <span class="text-sm font-semibold text-pink-300">🏆 Compliment</span>
            </div>
            <p class="text-sm text-gray-200">{{ item.result.compliment }}</p>
          </div>
          <div class="bg-indigo-600/10 rounded-xl p-3">
            <div class="flex items-center gap-2 mb-1">
              <span class="text-sm font-semibold text-indigo-300">🛡️ Excuse</span>
            </div>
            <p class="text-sm text-gray-200">{{ item.result.excuse }}</p>
          </div>
        </div>
        <div class="flex gap-2 pt-2">
          <button
            @click.stop="$emit('delete')"
            class="flex-1 py-2 bg-red-500/20 hover:bg-red-500/30 rounded-lg text-red-300 text-sm font-medium transition-all"
          >
            Supprimer
          </button>
          <button
            @click.stop="$emit('copy')"
            class="flex-1 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-gray-300 text-sm font-medium transition-all"
          >
            Copier
          </button>
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref } from 'vue'

defineProps({
  item: Object,
  index: Number,
  total: Number
})

defineEmits(['delete', 'copy'])

const isExpanded = ref(false)

const toggleExpand = () => {
  isExpanded.value = !isExpanded.value
}

const formatDate = (d) => {
  const date = new Date(d)
  const now = new Date()
  const diff = Math.floor((now - date) / 1000)
  
  if (diff < 60) return 'À l\'instant'
  if (diff < 3600) return `Il y a ${Math.floor(diff / 60)} min`
  if (diff < 86400) return `Il y a ${Math.floor(diff / 3600)}h`
  if (diff < 604800) return `Il y a ${Math.floor(diff / 86400)}j`
  
  return date.toLocaleDateString('fr-FR', {
    day: 'numeric',
    month: 'short',
    year: date.getFullYear() !== now.getFullYear() ? 'numeric' : undefined
  })
}
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.expand-enter-active,
.expand-leave-active {
  transition: all 0.3s ease;
  overflow: hidden;
}

.expand-enter-from,
.expand-leave-to {
  max-height: 0;
  opacity: 0;
}

.expand-enter-to,
.expand-leave-from {
  max-height: 500px;
  opacity: 1;
}
</style>