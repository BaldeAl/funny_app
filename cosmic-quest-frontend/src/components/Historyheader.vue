<template>
  <div class="text-center">
    <h2 class="text-3xl font-black mb-3" style="color: #2D3436;">
      Journal des Quêtes
    </h2>
    <div class="flex justify-center items-center gap-8 mt-4 p-4 rounded-2xl" style="background: #FEFBF6; border: 2px solid #F5E6D8;">
      <div class="text-center">
        <div class="text-3xl font-black flex items-center justify-center gap-1" style="color: #FFB996;">
          {{ karma }}
          <span class="text-2xl">⭐</span>
        </div>
        <div class="text-xs font-semibold mt-1" style="color: #B2BEC3;">Karma Total</div>
      </div>
      <div class="w-px h-10" style="background: #E8E4DF;"></div>
      <div class="text-center">
        <div class="text-3xl font-black" style="color: #B8A9E5;">
          {{ questCount }}
        </div>
        <div class="text-xs font-semibold mt-1" style="color: #B2BEC3;">Quêtes Accomplies</div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  karma: Number,
  questCount: Number
})
</script>