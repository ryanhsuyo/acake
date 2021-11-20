import nodeNotifier from "node-notifier";
import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);
// let cart = {orderID: 1, product: [{cakeID: 1, acce:[{PRODCT_ID: 1, acceID:1},{}]}, {cakeID: 2}]};
// cart = {訂單: 1, 會員: 1,{蛋糕:1,價格: 1,{加購: 1},{加購: 2}},{蛋糕: 2}}
const state = {
  member_id:1,
  cart:{},
  AStorage:{},
  storage:{},
  cakeQuantity:1,
  PStorage:{},
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
    AStorage(context, AStoragearr,Quantity){
      context.commit("updateAStorage", AStoragearr,Quantity);
    },
    cakeQ(context, cakeQuantity){
      context.commit("updateQuantity", cakeQuantity)
    },
    PStorage(context, PStoragearr){
      context.commit("updatePStorage", PStoragearr);
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
    updateAStorage(state, AStoragearr,Quantity){
      state.AStorage = AStoragearr
      state.Quantity = Quantity
    },
    updateQuantity(state, cakeQuantity){
      state.cakeQuantity = cakeQuantity
    },
    updatePStorage(state, PStoragearr){
      state.PStorage = PStoragearr
    }
  }
});
