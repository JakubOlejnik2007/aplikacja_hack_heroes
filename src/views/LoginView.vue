<!-- Widok lgoowania -->
<template>
  <div class="center">
    <h2>Logowanie</h2>
    <form @submit="onSubmit">
      <div class="txt_field">
        <input type="email" required v-model="email" />
        <span></span>
        <label>e-mail</label>
      </div>
      <div class="txt_field">
        <input type="password" required v-model="password" />
        <span></span>
        <label>Hasło</label>
      </div>
      <input type="submit" value="Logowanie" />
      <span></span>
      <div class="signup_link">
        Nie masz konta? <a href="/#/zarejestruj"><h3>Zarejestruj się</h3></a>
      </div>
      <div id="error"></div>
    </form>
  </div>
</template>

<script>
export default {
  name: "LoginView",
  data() {
    return {
      email: "",
      password: "",
      response: "",
    };
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
      if (!this.email || !this.password) {
        alert("Niektóre pola w formularzy pozostają puste!");
        return;
      }
      let mail_format = new RegExp(/^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/);
      if (mail_format.test(this.email)) {
        alert("Niepoprawny adres e-mail!");
        return;
      }
      let password_format = new RegExp(/^(?=.*?[0-9])(?=.*?[a-zA-Z]).{3,30}$/);
      if (!password_format.test(this.password)) {
        alert("Niepoprawne hasło!");
        return;
      }
      const LoginData = {
        operation: "LOGIN",
        id: Math.floor(Math.random() * 100000),
        email: this.email,
        password: this.password,
      };
      fetch("http://apphh.ezyro.com/api.php", {
        //mode: "no-cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=UTF-8; ",
        },
        body: JSON.stringify(LoginData),
      })
        .then((response) => response.json())
        .then((json) => (this.response = json));
      let res = this.response;
      if (res[0]["message"] === "Failed") {
        document.getElementById("error").innerHTML =
          '<span style="color:#ff0000;"> Failed to log in </span>';
      } else {
        res.forEach((obj) => {
          Object.entries(obj).forEach(([key, value]) => {
            window.sessionStorage.setItem(key, value);
          });
        });

        window.sessionStorage.setItem("isLogged", "1");

        document.location.reload(true);
        setTimeout(1000);
        location.replace("http://apphh.ezyro.com/#/account");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.center {
  margin-left: auto;
  margin-right: auto;
  width: 300px;
  background-color: #2c3e50;
  border-radius: 10px;
  text-align: center;
  padding: 5px 0;

  h2 {
    font-size: 32px;
  }
  h3 {
    font-size: 12.8px;
  }

  form {
    padding: 0 40px;
    box-sizing: border-box;
    .txt_field {
      position: relative;
      border-bottom: 2px solid #44cae8;
      margin: 30px 0;
      input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        color: beige;
        &:focus ~ label,
        &:valid ~ label {
          top: -12px;
          color: #42b983;
        }
        &:focus ~ span::before,
        &:valid ~ span::before {
          width: 100%;
        }
      }
      label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50);
        font-size: 16px;
        pointer-events: none;
        transition: 0.25s;
      }
      span::before {
        content: "";
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #2282c3;
        transition: 0.5s;
      }
    }
  }
}
.pass {
  margin: -5px 0 20px 5px;
  color: beige;
  cursor: pointer;
  &:hover {
    text-decoration: underline;
  }
}
input[type="submit"] {
  width: 100%;
  height: 50px;
  border: 1px solid;
  background-color: #42b983;
  border-radius: 25px;
  font-size: 18px;
  color: beige;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  &:hover {
    border-color: #2282c3;
    transition: 0.25s;
  }
}
.signup_link {
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: beige;
  a {
    color: #42b983;
    text-decoration: none;
  }
}
/*.signup_link a:hover{
    text-decoration: underline;
}*/
</style>
