export default [
  {
    path: "",
    name: "routeone",
    children:[
      {
        path: "moduleone",
        name: "routetwo",
        component: () => import('./pages/Index')
      }
    ],
    component: () => import('./pages/Index')
  }
];
