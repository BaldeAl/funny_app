<template>
  <div class="text-center mb-8 animate-float">
    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full mb-4 shadow-2xl">
      <span class="text-4xl">✨</span>
    </div>
    <h1 class="text-5xl md:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400 mb-3">
      TaskMaster AI
    </h1>
    <p class="text-lg md:text-xl text-gray-300 font-light">
      Transforme tes corvées en aventures épiques avec l'intelligence artificielle
    </p>
  </div>
</template>

<style scoped>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}
</style>