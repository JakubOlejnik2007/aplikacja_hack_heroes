import { createRouter, createWebHashHistory } from "vue-router";
import AccountView from "../views/AccountView.vue";
import HomeView from "../views/HomeView.vue";
import WycinkaDrzewa from "../views/WycinkaDrzewa.vue";
import RejestracjaPojazdu from "../views/RejestracjaPojazdu.vue";
import LoginView from "../views/LoginView.vue";
import RegisterView from "../views/RegisterView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/account",
    name: "account",
    component: AccountView,
  },
  {
    path: "/wycinka-drzewa",
    name: "wycinka-drzewa",
    component: WycinkaDrzewa,
  },
  {
    path: "/rejestracja-pojazdu",
    name: "rejestracja-pojazdu",
    component: RejestracjaPojazdu,
  },
  {
    path: "/zaloguj",
    name: "zaloguj",
    component: LoginView,
  },
  {
    path: "/zarejestruj",
    name: "zarejestruj",
    component: RegisterView,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
