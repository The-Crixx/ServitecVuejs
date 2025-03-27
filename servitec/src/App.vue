<template>
  <div id="app">
    <!-- Navigation can be added here if needed -->
    <router-view></router-view>
  </div>
</template>

<script setup>
// Any app-wide logic can be placed here
</script>

<style>
/* Global styles */
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: rgb(24,57,106);
  background: linear-gradient(60deg, rgba(24,57,106,1) 0%, rgba(255,255,255,1) 100%);
  font-family: 'Poppins', sans-serif;
  position: relative;
}
</style>