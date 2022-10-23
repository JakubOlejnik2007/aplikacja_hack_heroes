<template>
  <MainHeader />
  <nav>
    <router-link to="/">Home </router-link>
    <p>|</p>
    <router-link v-if="this.isLogged == 1" to="/wycinka-drzewa"
      >Zgoda na wycinkę drzewa</router-link
    >
    <router-link v-if="this.isLogged == 1" to="/rejestracja-pojazdu"
      >Rejestracja pojazdu</router-link
    >
    <router-link v-if="this.isLogged == 1" to="/account">
      <img
        src="@/assets/user_panel.png"
        alt="Panel użytkownika"
        title="Panel użytkownika"
      />
    </router-link>
    <router-link v-if="this.isLogged != 1" to="/zaloguj">Zaloguj</router-link>
    <router-link v-if="this.isLogged != 1" to="/zarejestruj"
      >Zarejestruj</router-link
    >
  </nav>
  <main>
    <router-view />
  </main>
  <footer>
    <MainFooter />
  </footer>
</template>
<script>
import MainFooter from "@/components/Footer";
import MainHeader from "@/components/Header";
export default {
  components: { MainHeader, MainFooter },
  data() {
    return {
      isLogged: parseInt(window.sessionStorage.getItem("isLogged")),
    };
  },
};
</script>

<style lang="scss">
body {
  /*min-height: 200vh;*/
  overflow: auto;
}
#app {
  display: grid;
  grid-template-areas:
    "header"
    "nav"
    "main"
    "footer";
  grid-template-rows: auto auto 1fr auto;
  width: 100vw;
  height: 100%;
  color: beige;
  background-image: url("@/assets/carbon_fibre.png");
  /* background pattern from subtlepatterns.com */
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
}
nav {
  box-sizing: border-box;
  background-color: #2c3e50;
  position: sticky;
  top: 0;
  padding: 10px;
  display: flex;
  justify-content: space-evenly;
  align-items: center;

  box-shadow: 0 17px 31px -6px rgba(0, 0, 0, 0.91);
  -webkit-box-shadow: 0 17px 31px -6px rgba(0, 0, 0, 0.91);
  -moz-box-shadow: 0 17px 31px -6px rgba(0, 0, 0, 0.91);
  img {
    background-color: beige;
    border-radius: 15px;
    margin-left: 10px;
  }
  p {
    padding-left: 10px;
  }
  a {
    font-weight: bold;
    color: beige;
    /*&:nth-child(2) {
      padding: 2px;
      border-left: 2px solid beige;
    }*/
    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
