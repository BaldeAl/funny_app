<template>
  <div class="mt-8 text-center">
    <p class="text-gray-400 text-sm">
      Propulsé par l'IA • {{ currentYear }} TaskMaster
    </p>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const currentYear = computed(() => new Date().getFullYear())
</script>