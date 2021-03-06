import nodeNotifier from "node-notifier";
import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);
// let cart = {orderID: 1, product: [{cakeID: 1, acce:[{PRODCT_ID: 1, acceID:1},{}]}, {cakeID: 2}]};
// cart = {訂單: 1, 會員: 1,{蛋糕:1,價格: 1,{加購: 1},{加購: 2}},{蛋糕: 2}}
const state = {
  member_id: 0,
  employee_id: 0,
  cart:{},
  AStorage:[],  // 加購倉庫
  storage:{},   // 蛋糕倉庫
  cakeQuantity:1,  // 蛋糕數量
  PStorage:{},  // 包裝倉庫
  cakeClass: '',
  orderDate: '',
  
  // Quantity:1,
};
export default new Vuex.Store({
  state, 
  // 操作行為
  actions: {
    // 提交會員認證
    update_memberId(context,status){
      context.commit("update_memberData",status);
    },
    storage(context, storagearr){
      context.commit("updateStorage", storagearr)
    },
    AStorage(context, AStoragearr){
      context.commit("updateAStorage", AStoragearr);
    },
    cakeQ(context, cakeQuantity){
      context.commit("updateQuantity", cakeQuantity)
    },
    PStorage(context, PStoragearr){
      context.commit("updatePStorage", PStoragearr);
    },
    cakeClass(context, cakeClass){
      context.commit("updateCakeClass", cakeClass);
    },
    orderDate(context, orderDate){
      context.commit('updateOrderDate', orderDate);
    }
  },
  // 操作狀態
  mutations: {
    // 修改會員ID
    update_memberData(state,status){
      state.member_id = status
    },
    updateStorage(state, storagearr){
      state.storage = storagearr
    },
    updateAStorage(state, AStoragearr){
      state.AStorage = AStoragearr
    },
    updateQuantity(state, cakeQuantity){
      state.cakeQuantity = cakeQuantity
    },
    updatePStorage(state, PStoragearr){
      state.PStorage = PStoragearr
    },
    updateCakeClass(state, cakeClass){
      state.cakeClass = cakeClass
    },
    updateOrderDate(state, orderDate){
      state.orderDate = orderDate
    }
  }
});
