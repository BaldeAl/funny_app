<template>
  <div 
    class="group relative rounded-2xl p-5 transition-all duration-300"
    :style="cardStyle"
    @mouseenter="isHovered = true"
    @mouseleave="isHovered = false"
  >
    <div class="flex items-start gap-4">
      <div 
        class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0"
        :style="iconStyle"
      >
        <span class="text-2xl">{{ icon }}</span>
      </div>
      <div class="flex-1">
        <h3 class="font-bold text-lg mb-2 flex items-center gap-2" :style="{ color: titleColor }">
          {{ title }}
          <span v-if="isNew" class="px-2.5 py-0.5 rounded-full text-xs font-bold" :style="badgeStyle">
            NEW
          </span>
        </h3>
        <p class="leading-relaxed" style="color: #636E72;">{{ content }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from 'vue'

const props = defineProps({
  icon: String,
  title: String,
  content: String,
  color: String,
  isNew: Boolean
})

const isHovered = ref(false)

const colorMap = {
  coral: {
    bg: '#FFF5F0',
    border: '#FFD4C4',
    borderHover: '#FF7B54',
    icon: 'linear-gradient(145deg, #FF7B54, #FFB996)',
    title: '#FF7B54',
    badge: { background: 'rgba(255, 123, 84, 0.15)', color: '#FF7B54' }
  },
  mint: {
    bg: '#F0FFF4',
    border: '#C3EDD0',
    borderHover: '#86D4A3',
    icon: 'linear-gradient(145deg, #86D4A3, #A8E6C3)',
    title: '#5DAF7B',
    badge: { background: 'rgba(134, 212, 163, 0.15)', color: '#5DAF7B' }
  },
  lavender: {
    bg: '#F8F5FF',
    border: '#DDD4F2',
    borderHover: '#B8A9E5',
    icon: 'linear-gradient(145deg, #B8A9E5, #D4C9F2)',
    title: '#9583CD',
    badge: { background: 'rgba(184, 169, 229, 0.15)', color: '#9583CD' }
  }
}

const colors = computed(() => colorMap[props.color] || colorMap.coral)

const cardStyle = computed(() => ({
  background: colors.value.bg,
  border: `3px solid ${isHovered.value ? colors.value.borderHover : colors.value.border}`,
  boxShadow: isHovered.value 
    ? `0 8px 25px rgba(0, 0, 0, 0.08), 0 6px 0 ${colors.value.border}`
    : `0 4px 0 ${colors.value.border}`,
  transform: isHovered.value ? 'translateY(-3px)' : 'translateY(0)'
}))

const iconStyle = computed(() => ({
  background: colors.value.icon,
  boxShadow: `0 4px 0 rgba(0, 0, 0, 0.1)`
}))

const titleColor = computed(() => colors.value.title)

const badgeStyle = computed(() => colors.value.badge)
</script>