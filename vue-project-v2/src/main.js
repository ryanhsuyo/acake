import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './router/router.js'
import App from './App'
import './assets/style/var.scss'
import VueAxios from 'vue-axios'
import axios from "axios";
import $ from 'jquery'
import store from './store/store.js'
import qs from 'qs'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faGoogle,faInstagram,faLine} from '@fortawesome/free-brands-svg-icons'
import { faAnglesLeft,faAngleLeft,faAnglesRight,faAngleRight,fa5,fa4,fa3,fa2,fa1,faXmark,faSortDown,faSortUp, faCircle, faMagnifyingGlass, faAnglesDown, faPlus, faMinus, faTrashCan,faSquarePlus, faCheck, faPenToSquare} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faGoogle,faInstagram,faLine,faAnglesLeft,faAngleLeft,faAnglesRight,faAngleRight,fa5,fa4,fa3,fa2,fa1,faXmark,faSortDown,faSortUp, faCircle, faMagnifyingGlass, faAnglesDown, faPlus, faMinus, faTrashCan,faSquarePlus, faCheck, faPenToSquare)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.prototype.$qs = qs
Vue.use(VueRouter,VueAxios,axios)

// Vue.prototype.HOST = '/api'
// // 以下為遠端請求
// // for axiosInstance, no need to xampp
// let subPath = process.env.NODE_ENV === "production" 
//       ? process.env.VUE_APP_SUB_PATH 
//       : ""
// let axiosInstance = axios.create({
//   baseURL:
//     process.env.NODE_ENV === "production"
//       ? `http://localhost/${subPath}`
//       : "http://localhost:3000/",
// })
// // for php cli server
// Vue.prototype.$axios = axiosInstance
// // for xampp
Vue.prototype.$axios = axios;
// Vue.config.productionTip = false
// // 以上為遠端請求

const router = new VueRouter({
  routes,
  // mode:"history",
})

// console.log(router)
new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app');
