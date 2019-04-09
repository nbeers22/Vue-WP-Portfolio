import Vue       from "vue";
import Router    from "vue-router";
import Home      from "./views/Home.vue";
import About     from "./views/About.vue";
import Contact   from "./views/Contact.vue";
import Portfolio from "./views/Portfolio.vue";
import Post      from "./views/Post.vue";
import NotFound  from "./views/NotFound.vue";

Vue.use(Router);

const router = new Router({
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/about",
      name: "about",
      component: About
    },
    {
      path: "/contact",
      name: "contact",
      component: Contact
    },
    {
      path: "/portfolio",
      name: "portfolio",
      component: Portfolio
    },
    {
      path: "/projects/:postSlug",
      name: "Post",
      component: Post
    },
    {
      path: '*',
      name: "notfound",
      component: NotFound
    }
  ],
  mode: "history",
  base: "",
  // Prevents window from scrolling back to top
  // when navigating between components/views
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  }
})

router.beforeEach((to, from, next) => {
  // Redirect if fullPath end with a hash
  let length = to.fullPath.length;

  if (to.fullPath.includes('/#')) {
    const path = to.fullPath.split('/#')[0];
  }
  if(to.fullPath.slice(-1) == '/'){
    const path = to.fullPath.slice(0, to.fullPath.length - 1);;
  }
  next(path);
  return;
  next();
});
export default router;

// export default new Router({
//   routes: [
//     {
//       path: "/",
//       name: "home",
//       component: Home
//     },
//     {
//       path: "/about",
//       name: "about",
//       component: About
//     },
//     {
//       path: "/contact",
//       name: "contact",
//       component: Contact
//     },
//     {
//       path: "/portfolio",
//       name: "portfolio",
//       component: Portfolio
//     },
//     {
//       path: "/projects/:postSlug",
//       name: "Post",
//       component: Post
//     },
//     { 
//       path: '*',
//       name: "notfound",
//       component: NotFound
//     }
//   ],
//   mode: "history",
//   base: "",
//   // Prevents window from scrolling back to top
//   // when navigating between components/views
//   scrollBehavior(to, from, savedPosition) {
//     if (savedPosition) {
//       return savedPosition;
//     } else {
//       return { x: 0, y: 0 };
//     }
//   }
// });
