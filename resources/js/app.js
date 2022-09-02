import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import AppLayout from "@/Layouts/AppLayout.vue";
import ResizeTextarea from "resize-textarea-vue3";
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Stuxnet";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(ResizeTextarea)
            .component('font-awesome-icon', FontAwesomeIcon)
            .component("InertiaHead", Head)
            .component("InertiaLink", Link)
            .component("AppLayout", AppLayout)
            .mount(el);
    },
});

InertiaProgress.init({ color: "#fede00" });
