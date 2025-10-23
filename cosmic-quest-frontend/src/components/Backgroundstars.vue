<template>
  <div class="absolute inset-0 overflow-hidden">
    <div class="stars"></div>
    <div class="stars2"></div>
    <div class="stars3"></div>
  </div>
</template>

<style scoped>
.stars, .stars2, .stars3 {
  position: absolute;
  width: 3px;
  height: 3px;
  border-radius: 50%;
  box-shadow: 50px 30px white,
    100px 80px white,
    80px 120px white,
    300px 20px white,
    250px 130px white,
    200px 180px white,
    150px 100px white,
    320px 370px white,
    450px 180px white,
    400px 100px white,
    520px 200px white,
    600px 150px white,
    680px 220px white,
    750px 100px white,
    820px 280px white;
  animation: animStar 150s linear infinite;
}

.stars2 {
  width: 2px;
  height: 2px;
  animation: animStar 100s linear infinite;
}

.stars3 {
  width: 1px;
  height: 1px;
  animation: animStar 50s linear infinite;
}

@keyframes animStar {
  from { transform: translateY(0px); }
  to { transform: translateY(-2000px); }
}
</style>