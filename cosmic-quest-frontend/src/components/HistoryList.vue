<template>
  <transition-group name="list" tag="div" class="space-y-4">
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
import HistoryItem from './Historyitem.vue'

defineProps({
  items: Array
})

defineEmits(['delete', 'copy'])
</script>

<style scoped>
.list-enter-active,
.list-leave-active,
.list-move {
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.list-enter-from {
  opacity: 0;
  transform: translateY(-15px) scale(0.95);
}

.list-leave-to {
  opacity: 0;
  transform: translateX(30px) scale(0.95);
}
</style>