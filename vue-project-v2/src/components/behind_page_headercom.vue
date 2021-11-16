<template>
<span>
  <header class="header">
    <div class="header_box">
      <router-link to="/vote" id="logo">
        <img src="../assets/images/logo.png" />
      </router-link>
      <ul class="header_nav">
        <div id="header_div_one">
          <li class="nav_item"><router-link to="/employee/1" id="employee">員工管理</router-link></li>
          <li class="nav_item"><router-link to="/memberManager" id="member">會員資料管理</router-link></li>
          <li class="nav_item"><router-link to="/cakeMakeManager" id="cake">蛋糕製作管理</router-link></li>
          <li class="nav_item"><router-link to="/voteManager" id="vote">投票系統管理</router-link></li>
          <li class="nav_item"><router-link to="/shopManager" id="shop">商城管理</router-link></li>
          <li class="nav_item"><router-link to="/messageManager" id="request">客服回覆</router-link></li>
          <li class="nav_item"><router-link to="/vote" >登出</router-link></li>
        </div>
      </ul>
    </div>
  </header>
    <div class="title">
      <img src="../assets/images/background_img500.png" alt="">
      <title-h1 :title="thistitle" ></title-h1>
    </div>
  </span>
</template>
<script>
import $ from "jquery";
// import titleh1 from './title_h1';
import titleH1 from "./title_h1.vue";
export default {
  name: "behind_page_header",
  components:{
    titleH1,
  },
  props:['thistitle'],
  mounted() {
    $(document).ready(function () {
      $(window).bind("scroll", function () {
        if ($(window).scrollTop() > 80) {
          $("header").addClass("shadow");
        } else {
          $("header").removeClass("shadow");
        }
      });
    });
  },
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
  box-sizing: border-box;
  list-style-type: none;
}

// header陰影
header.header.shadow {
  box-shadow: 0px 3px 5px 0px hsla(0, 0%, 0%, 0.2);
}
header.header {
  height: 80px;
  background-color: #dfb9b0;
  // padding: 0px 30px;
  position:sticky;
  top:0;
  // 無條件最上層
  z-index: 9999;
  div.header_box {
    height: 80px;
    max-width: 1200px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
    a#logo {
      height: 70px;
      display: flex;
      align-items: center;
      img {
        height: 100%;
      }
    }
    ul.header_nav {
      padding: 0;
      display: flex;
      justify-content: space-between;
      overflow: hidden;
      div#header_div_one {
        display: flex;
        li.nav_item {
          text-align: center;
          list-style-type: none;
          margin: 0px 16px;
          a {
            color: #515151;
            text-decoration: none;
            font-size: 18px;
            &:hover {
              color: #9f746b;
            }
          }
          a.target{
            color:#9f746b;
          }
        }
      }
    }
  }
}
.title{
  z-index:100;
  display:flex;
  justify-content: center;
  align-items: center;
  height:256px;
  width:100%;
  position:relative;
  img{
    position:absolute;
    width:100%;
    height:100%;
    object-fit: cover;
  }
}
</style>