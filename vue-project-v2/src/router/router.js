import App from '../App';
// import member_data from "../page/member-data";  // 會員資料頁
// import member_order from "../page/member-order";  // 會員訂單查詢頁
// import member_fav from "../page/member-fav";  // 會員最愛分類頁
// import member_fav_detail from "../page/member-fav-detail";  // 會員最愛詳細頁
// console.log(App)
// Vue.use(Router)
export default[{
    path:'',
    component:App,   //component: r => require.ensure([], () => r(require('../page/home')), 'home')
    children:[
        // {path:'dm', component: r => require.ensure([], () => r(require('../behind_page/employee_page')), 'employee_pages')},
        {path:'assign', component: r => require.ensure([], () => r(require('../page/assign')), 'assign_page')},
        {path:'vote', component: r => require.ensure([], () => r(require('../page/vote_page')), 'vote_page')},
        {path:'', component: r => require.ensure([], () => r(require('../behind_page/employee_page')), 'employee_page')},
        {path:'memberManager', component: r => require.ensure([], () => r(require('../behind_page/member_manager')), 'member_manager')},
        {path:'voteManager', component: r => require.ensure([], () => r(require('../behind_page/vote_manager')), 'vote_manager')},
        {path:'shopManager', component: r => require.ensure([], () => r(require('../behind_page/behind_shop_page')), 'behind_shop')},
        {path:'cakeMakeManager', component: r => require.ensure([], () => r(require('../behind_page/behind_cake_make_page')), 'behind__cake_make')},
        {path:'messageManager', component: r => require.ensure([], () => r(require('../behind_page/behind_message_manager_page')), 'behind_message_manager')},
        {path:'member_data', component: r => require.ensure([], () => r(require('../page/member-data')), 'member-data')}, // 會員資料頁
        {path:'member_fav', component: r => require.ensure([], () => r(require('../page/member-fav')), 'member_fav')}, // 會員最愛分類頁
        {path:'member_order', component: r => require.ensure([], () => r(require('../page/member-order')), 'member_order')}, // 會員訂單查詢頁
        {path:'member_fav_detail', component: r => require.ensure([], () => r(require('../page/member-fav-detail')), 'member_fav_detail')}, // 會員最愛詳細頁
        // {path:'member_data', component: member_data},   // 會員資料頁
        // {path:'member_order', component: member_order},   // 會員訂單查詢頁
        // {path:'member_fav', component: member_fav},   // 會員最愛分類頁
        // {path:'member_fav_detail', component: member_fav_detail},   // 會員最愛詳細頁
    ],
}]