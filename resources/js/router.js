import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Index from "./pages/index";
import Login from "./pages/login";
import Register from "./pages/register";

const routes = [
    { path: "/", component: Index },
    { path: "/login", component: Login },
    { path: "/register", component: Register }
];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: "history"
});

router.beforeEach((to, from, next) => {
    // console.log(window.loggedIn);
    let middleware = to.matched[0].components.default.middleware;

    if (middleware == "guest") {
        if (window.loggedIn) {
            next("/");
            return;
        }
    }

    if (middleware == "auth") {
        if (!window.loggedIn) {
            next("/login");
            return;
        }
    }
    next();
});

export default router;
