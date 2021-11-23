<template>
  <section id="right_section">
    <h1>折價券</h1>
    <div class="content">
      <input type="text" placeholder="會員ID" @change="checkMemberID($event)"/>
      <input type="text" placeholder="折扣金額" v-model="coupon_prize" @keydown="keyInNumber($event)" @keyup="keyInNumber_II($event)"/>
      <select v-model="useThreshold">
        <option value="0" selected>使用門檻</option>
        <option :value="item" v-for="(item, index) in useThresholdArr" :key="index">{{item}}</option>
      </select>
      <input type="text" placeholder="期限" v-model="deadline" @keydown="keyInDate($event)" />
    </div>
    <div class="coupon">
      <div id="coupon" style="transform:scale(.8) translate(-105px,37px);">
    <div id="coupon_left_block">
      <div id="discount_amout">$<span>{{coupon_prize}}</span></div>
      <div id="A_cake_text_logo">
        <img src="../assets/images/logo_title.png" alt="" />
      </div>
      <div id="coupon_left_decoration_img">
        <img src="../assets/images/blueberry_cream.png" alt="" />
      </div>
      <div id="use_threshold">消費滿$&nbsp;<span>{{useThreshold}}</span>&nbsp;即可折抵</div>
      <img id="bottom_decoration_img" src="../assets/images/snowRWD.svg" />
    </div>
    <div id="coupon_right_block">
      <div id="expiration">
        <span>使用期限</span>
        <span id="expiration_date">{{deadline}}</span>
      </div>
      <div id="coupon_right_decoration_img">
        <img src="../assets/images/jellyfish_icon.svg" alt="" />
      </div>
      <div id="expiration_countdown">即將失效：剩下<span v-html="'&nbsp 10 &nbsp'"></span>天</div>
    </div>
  </div>
      <!-- <coupon class="ticket" style="transform:scale(.8) translate(-105px,37px);"></coupon> -->
      <input type="text" placeholder="張數" style="transform:translateX(-70px)" @keydown="keyInNumber($event)" @keyup="keyInNumber_II($event)"/>
    </div>
    <button>確認送出</button>
  </section>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import behindHeader from "../components/behind_page_headercom";
import axios from 'axios';
export default {
  name: "behind_coupon",
  components: {
    behindHeader,
  },
  data() {
    return {
      coupon_prize:180,
      deadline:'2021/12/12',

      // 使用門檻的選項
      useThreshold: 0,
      useThresholdArr: [150, 350, 500, 600, 800, 1000, 1500, 2000],

      // 會員ID的驗證
      allMemberID: [],
      validMemberID: false,
    };
  },
  methods: {
    keyInDate($event){
      console.log($event.key)
      if(new RegExp(/[\d]/).test($event.key) || ["Backspace", "ArrowLeft", "ArrowRight"].includes($event.key)){
        console.log($event.target.value.length);
        if($event.target.value.length === 3) {$event.target.value += ($event.key + "/")}
        if($event.target.value.length === 5 && $event.key === "Backspace") {$event.target.value = $event.target.value.slice(0, 4);}
      }else{
        $event.preventDefault();
      }
    },
    keyInNumber($event){
      // 只允許輸入數字與左右移動、backspace
      if(new RegExp(/\D/).test($event.key) && !["Backspace", "ArrowLeft", "ArrowRight"].includes($event.key)){
        $event.preventDefault();
      }
      // 超過五位數後只允許輸入左右移動與backspace
      if($event.target.value.length > 4 && !["Backspace", "ArrowLeft", "ArrowRight"].includes($event.key)){$event.preventDefault();}
    },
    keyInNumber_II($event){
      // 阻擋注音與中文的輸入
      $event.target.value = $event.target.value.replace(/\D/g, "");
    },
    checkMemberID($event){
      this.validMemberID = false;
      if(this.allMemberID.includes($event.target.value) && $event.target.value !== "0"){
        this.validMemberID = true;
      }else{
        alert("無效的會員ID，請重新輸入。")
        $event.target.value = "";
      }
    }
  },
  mounted() {
    axios.post("http://localhost/A_cake/BE_selectAllMemberID.php")
      .then(res => {
        this.allMemberID = res.data.map(item => item.MEMBER_ID);
      })
      .catch(err => console.log(err));
  },
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";

* {
  box-sizing: border-box;
}
#right_section {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-start;
  h1 {
    align-self: flex-start;
    margin-bottom:50px;
    font-size:36px;
    font-weight:500;
  }
  .content{
    width:920px;
    display:flex;
    justify-content: space-between;
    input{
      font-size:24px;
      width:180px;
      height:45px;
      box-shadow:$shadow;
      border:none;
      background:#fff;
      border-radius:5px;
    }
    select{
      box-shadow:$shadow;
      border:none;
      background:#fff;
      border-radius:5px;
      font-size:24px;
      width:180px;
      height:45px;
    }
  }
  .coupon{
      width:100%;
      display:flex;
      justify-content: space-between;
      align-items: center;
      margin-top:50px;
      margin-bottom:50px;
      
      input{
          align-self: flex-end;
          width:150px;
          height:45px;
          font-size:24px;
          padding-left:10px;
      }
  }
  button{
      align-self: center;
      width:180px;
      height:60px;
      background: #454545;
      color:white;
      cursor: pointer;
      font-size:24px;
      border:none;
      border-radius:5px;
      &:active{
          box-shadow: inset $shadow;
      }
  }
}
#coupon {
  display: inline-flex;

  #coupon_left_block {
    width: 600px;
    height: 300px;
    background-color: #f0d5ce;
    position: relative;
    border-right: 1px solid $palePike;
    border-top-left-radius: 5px;
    overflow: hidden;
    #discount_amout {
      font-size: 100px;
      line-height: 106px;
      position: absolute;
      top: 38px;
      left: 54px;
      color: #515151;
    }

    #A_cake_text_logo {
      width: 120px;
      height: 44px;
      position: absolute;
      top: 66px;
      right: 68px;
      overflow: hidden;

      // border: 1px solid blue;

      > img {
        width: 100%;
      }

      > span {
        font-size: 10px;
        line-height: 8px;
        color: #515151;
      }
    }

    #coupon_left_decoration_img {
      position: absolute;
      left: 15px;
      bottom: -20px;
      width: 200px;
      z-index: 100;

      >img{
          width: 100%;
      }
    }

    #use_threshold {
      font-size: $p * 2;
      color: #515151;
      position: absolute;
      bottom: 60px;
      right: 68px;
      display:flex;
    }

    #bottom_decoration_img {
      width: 200%;
      position: absolute;
      bottom: 0;
      left: 0;
      transform: rotate(180deg);
    }

    > svg {
      position: absolute;
      bottom: 0;
      left: 0;
      transform: rotate(180deg);
    }
  }

  #coupon_right_block {
    background-color: #f7edd4;
    position: relative;
    width: 240px;
    height: 300px;
    border-bottom-right-radius: 10px;

    &::after {
      content: "";
      display: inline-block;
      width: 84px;
      height: 84px;
      position: absolute;
      top: 0;
      right: 0;
      background-image: linear-gradient(45deg, #efdcac 50%, rgb(239, 230, 228) 50%);
      border-bottom-left-radius: 10px;
    }

    #expiration {
      width: 160px;
      height: 62px;
      position: absolute;
      top: 60px;
      left: 40px;
      display: flex;
      flex-direction: column;

      > span:first-child {
        align-self: flex-start;
        font-size: 24px;
        transform: scale(0.83);
        transform-origin: center left;
        line-height: 28px;
        color: #515151;
        margin-bottom: 6px;
      }

      #expiration_date {
        align-self: flex-end;
        font-size: 24px;
        line-height: 28px;
        color: #515151;
      }
    }

    #coupon_right_decoration_img {
      position: absolute;
      top: 130px;
      left: 20px;
      width: 78px;
      height: 78px;
      overflow: hidden;

      > img {
        width: 100%;
      }
    }

    #expiration_countdown {
      color: #e8542e;
      font-size: 20px;
      white-space: nowrap;
      transform-origin: center left;
      position: absolute;
      line-height: 20px;
      left: 30px;
      bottom: 50px;
      display:flex;
    }
  }
}
</style>