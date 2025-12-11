<template>
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div 
      v-for="bubble in bubbles" 
      :key="bubble.id"
      class="bubble"
      :style="{
        left: bubble.left + '%',
        width: bubble.size + 'px',
        height: bubble.size + 'px',
        animationDuration: bubble.duration + 's',
        animationDelay: bubble.delay + 's',
        background: bubble.color
      }"
    ></div>
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>
  </div>
</template>

<script setup>
const colors = [
  'rgba(255, 123, 84, 0.15)',
  'rgba(134, 212, 163, 0.15)',
  'rgba(184, 169, 229, 0.15)',
  'rgba(255, 185, 150, 0.15)',
  'rgba(135, 206, 235, 0.15)'
]

const bubbles = Array.from({ length: 12 }, (_, i) => ({
  id: i,
  left: Math.random() * 100,
  size: 40 + Math.random() * 60,
  duration: 15 + Math.random() * 15,
  delay: Math.random() * 10,
  color: colors[Math.floor(Math.random() * colors.length)]
}))
</script>

<style scoped>
.bubble {
  position: absolute;
  bottom: -100px;
  border-radius: 50%;
  animation: rise linear infinite;
}

@keyframes rise {
  0% {
    transform: translateY(0) scale(1);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(-120vh) scale(1.2);
    opacity: 0;
  }
}

.cloud {
  position: absolute;
  background: rgba(255, 255, 255, 0.6);
  border-radius: 100px;
}

.cloud::before,
.cloud::after {
  content: '';
  position: absolute;
  background: inherit;
  border-radius: 50%;
}

.cloud-1 {
  width: 120px;
  height: 40px;
  top: 10%;
  left: 5%;
  animation: float-cloud 25s ease-in-out infinite;
}

.cloud-1::before {
  width: 50px;
  height: 50px;
  top: -25px;
  left: 20px;
}

.cloud-1::after {
  width: 35px;
  height: 35px;
  top: -15px;
  left: 60px;
}

.cloud-2 {
  width: 100px;
  height: 35px;
  top: 20%;
  right: 10%;
  animation: float-cloud 20s ease-in-out infinite reverse;
}

.cloud-2::before {
  width: 40px;
  height: 40px;
  top: -20px;
  left: 15px;
}

.cloud-2::after {
  width: 30px;
  height: 30px;
  top: -12px;
  left: 50px;
}

.cloud-3 {
  width: 80px;
  height: 28px;
  top: 35%;
  left: 15%;
  animation: float-cloud 30s ease-in-out infinite;
}

.cloud-3::before {
  width: 35px;
  height: 35px;
  top: -18px;
  left: 10px;
}

.cloud-3::after {
  width: 25px;
  height: 25px;
  top: -10px;
  left: 40px;
}

@keyframes float-cloud {
  0%, 100% {
    transform: translateX(0) translateY(0);
  }
  25% {
    transform: translateX(30px) translateY(-10px);
  }
  50% {
    transform: translateX(0) translateY(-20px);
  }
  75% {
    transform: translateX(-30px) translateY(-10px);
  }
}
</style>