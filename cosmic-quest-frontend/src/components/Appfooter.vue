<template>
  <div class="mt-10 text-center">
    <p class="text-sm font-medium" style="color: #B2BEC3;">
      Propulsé par l'IA • {{ currentYear }} TaskMaster
    </p>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const currentYear = computed(() => new Date().getFullYear())
</script>