import { routes as moduleOne } from "../modules/moduleOne/index";


const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      ...moduleOne,
      {
        path: "*",
        component: () => import("../modules/Error404.vue")
      }
    ]
  }
];

export default routes;
