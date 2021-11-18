import nodeNotifier from "node-notifier";
import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

const state = {
  member_id:1,
};
export default new Vuex.Store({
  state,
  actions: {
    // 提交會員認證
    update_memberId(context,status){
      context.commit("update_memberData",status);
    }
  },
  mutations: {
    // 修改會員ID
    update_memberData(state,status){
      state.member_id = status
    }
  }
});
