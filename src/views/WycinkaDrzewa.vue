<template>
  <div class="wycinka-drzewa">
    <form>
      <div class="heading">
        <h2>Wniosek o zezwolenie na wycinkę drzewa</h2>
        <img
          src="@/assets/tree.png"
          alt="Wniosek o rejestrację pojazdu"
          title="Wniosek o rejestrację pojazdu"
        />
      </div>

      <div class="flex">
        <div>
          <h3>Dane wnioskującego</h3>
          <p>
            <label for="imie">Imie</label>
            <input type="text" id="imie" v-model="imie" />
          </p>
          <p>
            <label for="nazwisko">Nazwisko</label>
            <input type="text" id="nazwisko" v-model="nazwisko" />
          </p>
          <p>
            <label for="adres_wlasciciela">Adres właściciela</label>
            <input type="text" id="adres_wlasciciela" />
          </p>
        </div>
        <div>
          <h3>Dane urzędu gminy</h3>
          <p>
            <label for="urzad_gminy">Urząd gminy</label>
            <input type="text" id="urzad_gminy" />
          </p>
          <p>
            <label for="adres_gminy">Adres gminy</label>
            <input type="text" id="adres_gminy" />
          </p>
        </div>
        <div>
          <h3>Wniosek</h3>
          <p>
            Ja, będący/a właścicielem/ką nieruchomości:
            <label for="wlasciciel"> (adres, nr działki itd.) </label>
            <input type="text" id="wlasciciel" />
            proszę o wydanie mi zezwolenia na wycinkę
          </p>
          <p>
            <label for="ilosc">(ilość, drzewo, krzew) </label>
            <input type="text" id="ilosc" />
          </p>
          <p>
            <label for="gatunek">(gatunek)</label>
            <input type="text" id="gatunek" />
          </p>
          <p>
            <label for="obwod"
              >(obwód pnia mierzonego na wysokości 130cm)</label
            >
            <input type="text" id="obwod" />
          </p>
          <p>
            <label for="przeznaczenie_terenu"
              >(przeznaczenie terenu, na którym rośnie)</label
            >
            <input type="text" id="przeznaczenie_terenu" />
          </p>
          <p>
            <label for="przyczyna"
              >(przyczynę i termin zamierzonego wycięcia)</label
            >
            <input type="text" id="przyczyna" />
          </p>
          <p>
            <label for="wielkosc"
              >(wielkość powierzchni, z której nastąpią wycięcia)</label
            >
            <input type="text" id="wielkosc" />
          </p>
        </div>
      </div>
      <input type="submit" value="Prześlij" />
    </form>
  </div>
</template>

<script>
export default {
  name: "wycinka-drzewa.vue",
  data() {
    return {
      imie: sessionStorage.getItem("imie"),
      nazwisko: sessionStorage.getItem("nazwisko"),
    };
  },
};
</script>

<style lang="scss" scoped>
.wycinka-drzewa {
  box-sizing: border-box;
  background-color: #2c3e50;
  padding: 10px;
  margin: 10px;
  color: beige;
  border-radius: 30px;
  p {
    text-align: left;
  }
  .flex {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    input {
      border-radius: 15px;
      padding: 5px;
      text-align: center;
    }
  }
  .heading {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    img {
      background-color: beige;
      border-radius: 30px;
    }
  }
}
input[type="submit"] {
  border-radius: 15px;
  padding: 5px;
  text-align: center;
}
</style>
