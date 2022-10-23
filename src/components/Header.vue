<template>
  <header>
    <img src="@/assets/logo.png" title="logo" alt="logo" />
    <h1>E - Urząd</h1>
  </header>
</template>

<script>
export default {
  name: "MainHeader",
};
</script>

<style lang="scss" scoped>
header {
  width: 100%;
  box-sizing: border-box;
  text-align: center;
  background-color: #42b983;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  img {
    box-sizing: border-box;
    height: 25vh;
    background-color: beige;
    padding: 10px;
    margin: 20px 0;
    border-radius: 60px;
  }
}
</style>
