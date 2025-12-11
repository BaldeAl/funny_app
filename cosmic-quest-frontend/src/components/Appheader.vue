<template>
  <div class="text-center mb-10 animate-float">
    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full mb-5 relative" style="background: linear-gradient(145deg, #FFB996, #FF7B54); box-shadow: 0 8px 0 rgba(255, 123, 84, 0.3), 0 12px 30px rgba(255, 123, 84, 0.2);">
      <span class="text-5xl">✨</span>
      <div class="absolute -top-1 -right-1 w-6 h-6 rounded-full bg-white" style="box-shadow: 0 3px 0 rgba(0,0,0,0.05);"></div>
    </div>
    <h1 class="text-5xl md:text-6xl font-black mb-4" style="color: #2D3436; text-shadow: 3px 3px 0 rgba(184, 169, 229, 0.3);">
      TaskMaster AI
    </h1>
    <p class="text-lg md:text-xl font-medium" style="color: #636E72;">
      Transforme tes corvées en aventures épiques
    </p>
  </div>
</template>

<style scoped>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-8px); }
}

.animate-float {
  animation: float 4s ease-in-out infinite;
}
</style>