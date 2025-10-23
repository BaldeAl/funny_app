<template>
  <div 
    class="group relative rounded-2xl p-5 border transition-all hover:shadow-xl hover:scale-[1.02]"
    :class="cardClasses"
  >
    <div class="flex items-start gap-3">
      <div 
        class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
        :class="iconClasses"
      >
        <span class="text-xl">{{ icon }}</span>
      </div>
      <div class="flex-1">
        <h3 class="font-bold mb-2 flex items-center gap-2" :class="titleClasses">
          {{ title }}
          <span v-if="isNew" class="px-2 py-0.5 rounded-full text-xs" :class="badgeClasses">
            NEW
          </span>
        </h3>
        <p class="text-gray-200 leading-relaxed">{{ content }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  icon: String,
  title: String,
  content: String,
  color: String,
  isNew: Boolean
})

const colorMap = {
  purple: {
    card: 'bg-gradient-to-br from-purple-600/20 to-purple-700/20 border-purple-500/30 hover:border-purple-400/50',
    icon: 'bg-purple-500/30',
    title: 'text-purple-300',
    badge: 'bg-purple-500/30'
  },
  pink: {
    card: 'bg-gradient-to-br from-pink-600/20 to-pink-700/20 border-pink-500/30 hover:border-pink-400/50',
    icon: 'bg-pink-500/30',
    title: 'text-pink-300',
    badge: 'bg-pink-500/30'
  },
  indigo: {
    card: 'bg-gradient-to-br from-indigo-600/20 to-indigo-700/20 border-indigo-500/30 hover:border-indigo-400/50',
    icon: 'bg-indigo-500/30',
    title: 'text-indigo-300',
    badge: 'bg-indigo-500/30'
  }
}

const cardClasses = computed(() => colorMap[props.color]?.card || colorMap.purple.card)
const iconClasses = computed(() => colorMap[props.color]?.icon || colorMap.purple.icon)
const titleClasses = computed(() => colorMap[props.color]?.title || colorMap.purple.title)
const badgeClasses = computed(() => colorMap[props.color]?.badge || colorMap.purple.badge)
</script>