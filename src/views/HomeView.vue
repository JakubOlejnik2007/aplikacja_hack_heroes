<!-- Widok o aplikacji -->
<template>
  <div class="about">
    <h2>O aplikacji</h2>

    <p>
      Aplikacja E- Urząd służy do wypełniania wniosków oraz wysyłania ich od
      razu do urzędu. Użycie aplikacji pozwala zaoszczędzić wiele czasu na
      szukaniu wzorów wniosków oraz dostarczaniu i do urzędu. Dzięki aplikacji
      E-Urząd składanie wniosków staje się prostsze.
    </p>

    <img src="@/assets/logo.png" alt="logo aplikacji" />

    <h3>Instrukcja obsługi aplikacji.</h3>

    <h4>1. Logowanie do aplikacji</h4>

    <p>
      By utworzyć konto należy wprowadzić e-mail, Imię, Nazwisko oraz założyć
      hasło do konta.
    </p>

    <h4>2. Uzupełnianie wniosków</h4>

    <p>
      Aby wypełnić wniosek należy przejść do zakładki z zgłoszeniem które chcemy
      wypełnić. Następnie wypełniamy formularz wniosku i odsyłamy go za pomocą
      przycisku “Wyślij”.
    </p>
  </div>
</template>
<style lang="scss" scoped>
@media screen and (min-width: 768px) {
  .about {
    width: 80%;
    margin-right: auto;
    margin-left: auto;
  }
}
@media screen and (max-width: 767px) {
  .about {
    margin: 15px;
  }
}
.about {
  background-color: #2c3e50;
  padding: 20px;
  color: beige;
  border-radius: 30px;

  img {
    background-color: beige;
    padding: 10px;
    border-radius: 60px;
  }

  p {
    text-align: left;
  }
}
</style>
