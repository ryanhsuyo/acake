import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './router/router.js'
import App from './App'
import './assets/style/var.scss'
import VueAxios from 'vue-axios'
import axios from "axios"
import $ from 'jquery'
import store from './store/store.js'
import qs from 'qs'
// fullpage
// import 'fullpage.js/vendors/scrolloverflow' // Optional. When using scrollOverflow:true
// import './fullpage.scrollHorizontally.min' // Optional. When using fullpage extensions
// import VueFullPage from '../static/fullpage/vue-fullpage.js'
// fullpage
// import 'swiper/css/swiper.css'
import 'vue-fabric/dist/vue-fabric.min.css'
import { Fabric } from 'vue-fabric'
import { fabric } from 'fabric'
import html2canvas from "html2canvas"
import VueAwesomeSwiper from 'vue-awesome-swiper'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faGoogle,faInstagram,faLine} from '@fortawesome/free-brands-svg-icons'
import { faAnglesLeft,faAngleLeft,faAnglesRight,faAngleRight,faHeart,fa5,fa4,fa3,fa2,fa1,faXmark,faSortDown,faSortUp, faCircle, faMagnifyingGlass, faAnglesDown, faPlus, faMinus, faTrashCan,faSquarePlus, faCheck, faPenToSquare, faCaretDown} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faGoogle,faInstagram,faLine,faAnglesLeft,faAngleLeft,faHeart,faAnglesRight,faAngleRight,fa5,fa4,fa3,fa2,fa1,faXmark,faSortDown,faSortUp, faCircle, faMagnifyingGlass, faAnglesDown, faPlus, faMinus, faTrashCan,faSquarePlus, faCheck, faPenToSquare, faCaretDown)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.prototype.$qs = qs
// Vue.use(VueFullpage)
// Vue.use(VueAxios)
// Vue.use(axios)
// Vue.use(VueFullPage)
Vue.use(VueRouter,axios,VueAxios)
Vue.use(VueAwesomeSwiper)
Vue.use(html2canvas)
Vue.use(Fabric)
Vue.use(fabric)

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
