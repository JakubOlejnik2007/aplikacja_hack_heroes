<!-- Widok konta -->
<template>
  <div class="center">
    <form @submit="onSubmit">
      <h2>Panel użytkownika</h2>
      <div class="account">
        <div>
          <h3>O tobie:</h3>
          <p>
            <label>Pierwsze imie</label>
            <input type="text" v-model="imie" />
          </p>
          <p>
            <label>Pozostałe imiona</label>
            <input type="text" v-model="imiona" />
          </p>
          <p>
            <label>Naziwsko</label>
            <input type="text" v-model="nazwisko" />
          </p>
          <p>
            <label>Numer PESEL</label>
            <input type="text" v-model="pesel" />
          </p>
          <p>
            <label>Data urodzenia</label>
            <input type="text" v-model="data_urodzenia" />
          </p>
          <p>
            <label>Miejsce urodzenia</label>
            <input type="text" v-model="miejsce_urodzenia" />
          </p>
          <p>
            <label>Płeć</label>
            <input type="text" v-model="plec" />
          </p>
        </div>
        <div>
          <h3>Dane adresowe:</h3>
          <p>
            <label>adres</label>
            <input type="text" v-model="adres" />
          </p>
          <p>
            <label>miejscowość</label>
            <input type="text" v-model="miejscowosc" />
          </p>
          <p>
            <label>kod_pocztowy</label>
            <input type="text" v-model="kod_pocztowy" />
          </p>
          <p>
            <label>gmina</label>
            <input type="text" v-model="gmina" />
          </p>
          <p>
            <label>powiat</label>
            <input type="text" v-model="powiat" />
          </p>
          <p>
            <label>wojewodztwo</label>
            <input type="text" v-model="wojewodztwo" />
          </p>
        </div>
        <div>
          <h3>Rodzice</h3>
          <p>
            <label>Imiona rodziców</label>
            <input type="text" v-model="imiona_rodzicow" />
          </p>
          <p>
            <label>Nazwisko rodowe matki</label>
            <input type="text" v-model="nazwisko_matki" />
          </p>
          <h3>Kontakt:</h3>
          <p>
            <label>E-mail</label>
            <input type="email" v-model="email" />
          </p>
        </div>
      </div>
      <input type="submit" value="Zapisz zmiany" />
    </form>
  </div>
</template>

<script>
export default {
  name: "AccountView",
  data() {
    return {
      id: sessionStorage.getItem("id"),
      imie: sessionStorage.getItem("imie"),
      imiona: sessionStorage.getItem("imiona"),
      nazwisko: sessionStorage.getItem("nazwisko"),
      pesel: sessionStorage.getItem("pesel"),
      data_urodzenia: sessionStorage.getItem("data_urodzenia"),
      miejsce_urodzenia: sessionStorage.getItem("miejsce_urodzenia"),
      plec: sessionStorage.getItem("plec"),
      adres: sessionStorage.getItem("adres"),
      miejscowosc: sessionStorage.getItem("miejscowosc"),
      kod_pocztowy: sessionStorage.getItem("kod_pocztowy"),
      gmina: sessionStorage.getItem("gmina"),
      powiat: sessionStorage.getItem("powiat"),
      wojewodztwo: sessionStorage.getItem("wojewodztwo"),
      nazwisko_matki: sessionStorage.getItem("nazwisko_matki"),
      imiona_rodzicow: sessionStorage.getItem("imiona_rodzicow"),
      email: sessionStorage.getItem("email"),
      response: "",
    };
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
      console.log("");
      const UpdataData = {
        id: this.id,
        operation: "UPDATE",
        imie: this.imie,
        imiona: this.imiona,
        nazwisko: this.nazwisko,
        pesel: this.pesel,
        data_urodzenia: this.data_urodzenia,
        miejsce_urodzenia: this.miejsce_urodzenia,
        plec: this.plec,
        adres: this.adres,
        miejscowosc: this.miejscowosc,
        kod_pocztowy: this.kod_pocztowy,
        gmina: this.gmina,
        powiat: this.powiat,
        wojewodztwo: this.wojewodztwo,
        nazwisko_matki: this.nazwisko_matki,
        imiona_rodzicow: this.imiona_rodzicow,
        email: this.email,
      };
      console.log(UpdataData);
      fetch("http://apphh.ezyro.com/api.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=UTF-8; ",
        },
        body: JSON.stringify(UpdataData),
      })
        .then((response) => response.json())
        .then((json) => (this.response = json));
      let res = this.response;
      res.forEach((obj) => {
        Object.entries(obj).forEach(([key, value]) => {
          window.sessionStorage.setItem(key, value);
        });
      });
      document.location.reload(true);
      document.location.reload(true);
    },
  },
};
</script>

<style lang="scss" scoped>
.center {
  margin-left: auto;
  margin-right: auto;
  width: 90%;
  background-color: #2c3e50;
  border-radius: 10px;
  text-align: center;
  padding: 5px 0;
  .account {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    div {
      label {
        padding-right: 10px;
        color: #5af6ad;
      }
      input {
        border-radius: 15px;
        padding: 5px;
        text-align: center;
      }
    }
  }
  input[type="submit"] {
    width: 120px;
    height: 35px;
    background-color: #42b983;
    color: beige;
    font-size: 15px;
    border-radius: 15px;
  }
}
</style>
