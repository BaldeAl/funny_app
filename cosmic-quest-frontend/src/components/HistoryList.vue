<template>
  <transition-group name="list" tag="div" class="space-y-3">
    <HistoryItem
      v-for="(item, index) in items"
      :key="item.id || index"
      :item="item"
      :index="index"
      :total="items.length"
      @delete="$emit('delete', index)"
      @copy="$emit('copy', item)"
    />
  </transition-group>
</template>

<script setup>
import HistoryItem from './HistoryItem.vue'

defineProps({
  items: Array
})

defineEmits(['delete', 'copy'])
</script>

<style scoped>
.list-enter-active,
.list-leave-active,
.list-move {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.list-enter-from {
  opacity: 0;
  transform: translateY(-10px);
}

.list-leave-to {
  opacity: 0;
  transform: translateX(20px);
}
</style>