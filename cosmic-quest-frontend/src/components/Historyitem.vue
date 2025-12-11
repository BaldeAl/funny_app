<template>
  <div
    class="group rounded-2xl overflow-hidden transition-all duration-300"
    style="background: white; border: 3px solid #F5E6D8; box-shadow: 0 4px 0 rgba(0,0,0,0.03);"
    :class="{'ring-3': isExpanded}"
    :style="isExpanded ? 'border-color: #B8A9E5; box-shadow: 0 8px 25px rgba(184, 169, 229, 0.15);' : ''"
  >
    <div
      @click="toggleExpand"
      class="p-5 cursor-pointer transition-colors"
      @mouseenter="!isExpanded && ($event.currentTarget.style.background = '#FEFBF6')"
      @mouseleave="!isExpanded && ($event.currentTarget.style.background = 'white')"
    >
      <div class="flex justify-between items-start">
        <div class="flex-1">
          <div class="flex items-center gap-2 mb-2">
            <span class="text-xs font-semibold" style="color: #B2BEC3;">{{ formatDate(item.date) }}</span>
            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold" style="background: rgba(184, 169, 229, 0.15); color: #9583CD;">
              Quête #{{ total - index }}
            </span>
          </div>
          <h3 class="font-bold text-lg mb-1" style="color: #2D3436;">{{ item.task }}</h3>
          <p class="text-sm line-clamp-2" style="color: #636E72;">{{ item.result.quest }}</p>
        </div>
        <button 
          class="ml-4 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300"
          :style="isExpanded 
            ? 'background: linear-gradient(145deg, #B8A9E5, #D4C9F2); transform: rotate(180deg);' 
            : 'background: #F5E6D8;'"
        >
          <svg class="w-4 h-4" :style="{ color: isExpanded ? 'white' : '#636E72' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
      </div>
    </div>
    
    <transition name="expand">
      <div v-if="isExpanded" class="px-5 pb-5 space-y-3" style="border-top: 2px solid #F5E6D8;">
        <div class="pt-4 space-y-3">
          <div class="rounded-xl p-4" style="background: #FFF5F0; border: 2px solid #FFD4C4;">
            <div class="flex items-center gap-2 mb-2">
              <span class="text-sm font-bold" style="color: #FF7B54;">⚔️ Mission</span>
            </div>
            <p class="text-sm" style="color: #636E72;">{{ item.result.quest }}</p>
          </div>
          <div class="rounded-xl p-4" style="background: #F0FFF4; border: 2px solid #C3EDD0;">
            <div class="flex items-center gap-2 mb-2">
              <span class="text-sm font-bold" style="color: #5DAF7B;">🏆 Compliment</span>
            </div>
            <p class="text-sm" style="color: #636E72;">{{ item.result.compliment }}</p>
          </div>
          <div class="rounded-xl p-4" style="background: #F8F5FF; border: 2px solid #DDD4F2;">
            <div class="flex items-center gap-2 mb-2">
              <span class="text-sm font-bold" style="color: #9583CD;">🛡️ Excuse</span>
            </div>
            <p class="text-sm" style="color: #636E72;">{{ item.result.excuse }}</p>
          </div>
        </div>
        <div class="flex gap-3 pt-2">
          <button
            @click.stop="$emit('delete')"
            class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-200"
            style="background: #FFF0F0; border: 2px solid #FFCACA; color: #D63031; box-shadow: 0 3px 0 rgba(214, 48, 49, 0.1);"
            @mouseenter="$event.target.style.transform = 'translateY(-2px)'"
            @mouseleave="$event.target.style.transform = 'translateY(0)'"
          >
            Supprimer
          </button>
          <button
            @click.stop="$emit('copy')"
            class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-200"
            style="background: #FEFBF6; border: 2px solid #E8E4DF; color: #636E72; box-shadow: 0 3px 0 rgba(0,0,0,0.03);"
            @mouseenter="$event.target.style.transform = 'translateY(-2px)'"
            @mouseleave="$event.target.style.transform = 'translateY(0)'"
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
  max-height: 600px;
  opacity: 1;
}
</style>