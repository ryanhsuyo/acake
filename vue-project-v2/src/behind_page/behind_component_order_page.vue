<template>
  <section id="right_section">
    <div class="title">
      <h1>訂單查詢</h1>
      <searchBar></searchBar>
    </div>
    <div class="cake">
      <div class="detail_outline"  v-for="(data ,index) in order_data" :key="index" :style="hideContent">
        <!-- <span id="switch_button"><font-awesome-icon icon="fa-solid fa-sort-up" /></span> -->
        <span id="switch_button" @click="open"
          ><font-awesome-icon icon="fa-solid fa-sort-down"
        /></span>

        <div class="text_outline">
          <div class="first_line">
            <div class="first_item">
              <p>訂單ID：</p>
              <p class="content">{{data.order_id}}</p>
            </div>
            <div class="second_item">
              <p>會員ID：</p>
              <p class="content">{{data.member_id}}</p>
            </div>
            <div class="third_item">
              <!-- <p>狀態</p> -->
              <!-- <select>
                <option value="" :selected="data.status==0">奧客</option>
                <option value="" :selected="data.status==1">超級奧客</option>
              </select> -->
            </div>
          </div>
          <div class="second_line">
            <div class="first_item">
              <p>下單日期：</p>
              <p class="content">{{data.order_date}}</p>
            </div>
            <div class="second_item">
              <p>寄送日期：</p>
              <p class="content">{{data.send_date}}</p>
            </div>
            <div class="third_item">
              <p>完成日期：</p>
              <p class="content">{{data.complete_date}}</p>
            </div>
          </div>
          <div class="third_line">
            <div class="first_item" style="max-width: 350px">
              <p>收件人：</p>
              <p class="content">{{data.recipient}}</p>
            </div>
            <div class="second_item">
              <p>連絡電話：</p>
              <p class="content">{{data.phone}}</p>
            </div>
          </div>
          <div class="forth_line">
            <div class="first_item">
              <p>折價券ID：</p>
              <p class="content">{{data.coupon.id}}</p>
            </div>
            <div class="second_item">
              <p>折價</p>
              <p class="content">{{data.coupon.discount}}</p>
            </div>
            <div class="third_item">
              <p>運費</p>
              <p class="content">{{data.shipping}}</p>
            </div>
            <div class="forth_item">
              <p>總價</p>
              <p class="content">{{data.total}}</p>
            </div>
          </div>
          <div class="fifth_line">
            <div class="first_item">
              <p>寄送地址：</p>
              <p class="content">
                {{data.address}}
              </p>
            </div>
          </div>
        </div>
        <div class="combo_outline" v-for="(item, index) in data.combination" :key="index">
          <div class="combo_title">
            <h1>組合{{index + 1}}：</h1>
          </div>
          <div class="combo_item">
            <p v-for="(innerItem, innerIndex) in item.name" :key="innerIndex">{{innerItem}}</p>
            <p>小計</p>
          </div>
          <div class="combo_prize_outline">
            <div class="combo_prize" v-for="(innerItem, innerIndex) in item.quantity" :key="innerIndex">
              <p class="prize">{{innerItem}}</p>
            </div>
            <div class="combo_prize">
              <p class="prize">{{item.subTotal}}</p>
            </div>
          </div>
        </div>
        <div class="description">
          <input type="text" v-model="data.note"/>
          <div class="button_zone">
            <button>確認修改</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
import order from "../components/order_detail";
import axios from 'axios';
export default {
  name: "order_detail",
  components: {
    behindHeader,
    searchBar,
    order,

    hideOrderContent: true,
  },
  data() {
    return {
      order_data: [],
    };
  },
  methods: {
    open:　function(e){
      // console.log($(e.target).parents('.detail_outline').siblings())
        $(e.target).parents('.detail_outline').siblings().removeClass('open');
        $(e.target).parents('.detail_outline').toggleClass('open');
    },
  },
  computed: {
    hideContent(){
      return 
    }
  },
  mounted() {
    
    axios.post("http://localhost/A_cake/BE_selectAllOrder.php")
      .then(res => {
        let data = res["data"];
        console.log(data);

        let orderCounter = -1; // 紀錄正在操作的訂單物件的index
        let orderChecker = "-1"; // 判斷是否加入新的訂單物件，第一筆資料必定開始加入
        let totalPriceCounter = 0;  // 計算訂單總額
        let productCounter = -1;  // 紀錄正在操作的購物組合的index
        let productChecker = "-1";  // 判斷是否加入新的購物組合

        for(let i = 0; i < data.length; i++){

          // 這個 if 操作的單位是以訂單為準
          if(orderChecker !== data[i].ORDER_ID){
            // 加入新的訂單物件
            orderChecker = data[i].ORDER_ID;
            this.order_data.push({
              order_id: data[i].ORDER_ID,
              member_id: data[i].MEMBER_ID,
              order_date: data[i].CREATE_DATE.split(" ")[0],
              send_date: !!data[i].SHIPPING_DATE !== false ? data[i].SHIPPING_DATE.split(" ")[0] : "尚未寄出",
              complete_date: !!data[i].FINISHED_DATE !== false ? data[i].FINISHED_DATE.split(" ")[0] : "尚未完成",
              recipient: data[i].RECEIVER,
              phone: data[i].PHONE,
              coupon: {id: data[i].COUPON_ID, discount: !!data[i].DISCOUNT_AMOUNT !== false ? data[i].DISCOUNT_AMOUNT : "0"},
              shipping: data[i].DELIVER_FEE, 
              address: data[i].ADDRESS,
              note: data[i].NOTE,
              combination: [],
            });
            // combination: [{name: [], quantity: []}, {}, {}],

            // 初始化給這個訂單物件用的總金額
            totalPriceCounter = 0 - parseInt(!!data[i].DISCOUNT_AMOUNT !== false ? data[i].DISCOUNT_AMOUNT : "0") + parseInt(data[i].DELIVER_FEE);
            orderCounter++;
            productCounter = -1;  // 初始化
          }

          // 這個 if 操作的單位是以購物組合為準
          if(productChecker !== data[i].CAKE_ID){
            productChecker = data[i].CAKE_ID;
            this.order_data[orderCounter].combination.push({name: [data[i].CAKE_NAME], quantity: [data[i].QUANTITY], subTotal: data[i].PRICE});  // 第一筆放入這個購物組合的蛋糕
            productCounter++;
            // 累計訂單總金額
            totalPriceCounter += parseInt(data[i].PRICE);
            this.order_data[orderCounter].total = totalPriceCounter;
          }

          this.order_data[orderCounter].combination[productCounter].name.push(data[i].ACCESSORIES_NAME);
          this.order_data[orderCounter].combination[productCounter].quantity.push(data[i].ACCESSORIES_QUANTITY);

        }
      })
      .catch(err => console.log(err));
  },
  computed:{
    // order_data(){
    //   return this.$store.state.order_detail
    // }
  }
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
.title {
  width: 775px;
  display: flex;
  justify-content: center;
  align-items: center;
  // flex-direction: column;
  h1 {
    font-size: 36px;
    font-weight: 400;
  }
}
.cake {
  display: grid;
  gap: 30px;
}
#right_section {
  padding: 70px 100px;
  .title {
    display: flex;
    justify-content: space-between;
  }
}
.detail_outline{
  height: 90px;
  transition: 0.5s;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 775px;
  padding: 20px;
  background: #f7dcdc;
  border-radius: 10px;
  position: relative;
  #switch_button {
    position: absolute;
    top: 4px;
    right: 20px;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    transition: 0.2s;
    transform: rotate(0deg);
  }
  .content {
    padding: 0 10px;
    border-radius: 5px;
    background: #e4e4e4;
  }
}
.detail_outline.open {
  height: 850px;
  #switch_button {
    transform: rotate(-180deg);
  }
}
.text_outline {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-start;

  .first_line {
    display: flex;
    width: 100%;
    justify-content: space-between;
    .first_item {
      display: flex;
    }
    .second_item {
      display: flex;
    }
    .third_item {
      display: flex;
      justify-content: center;
      align-items: center;
      select {
        margin-left: 10px;
        background: white;
      }
      option {
        text-align: center;
      }
    }
  }
  .second_line {
    display: flex;
    width: 100%;
    justify-content: space-between;
    .first_item {
      display: flex;
    }
    .second_item {
      display: flex;
    }
    .third_item {
      display: flex;
      option {
        text-align: center;
      }
    }
  }
  .third_line {
    display: flex;
    width: 100%;
    justify-content: flex-start;
    .first_item {
      display: flex;
      margin-right: 15px;
    }
    .second_item {
      display: flex;
    }
  }
  .forth_line {
    display: flex;
    width: 100%;
    justify-content: space-between;
    .first_item {
      display: flex;
    }
    .second_item {
      display: flex;
    }
    .third_item {
      display: flex;
      option {
        text-align: center;
      }
    }
    .forth_item {
      display: flex;
    }
  }
  .fifth_line {
    display: flex;
    width: 100%;
    justify-content: space-between;
    .first_item {
      display: flex;
    }
  }
}
.combo_outline {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
  background: #f7edd4;
  border-radius: 5px;
  padding: 20px;
  .combo_title {
    display: flex;
  }
  .combo_item {
    display: flex;
    flex-direction: column;
    font-weight: 600;
  }
  .combo_prize_outline {
    display: flex;
    flex-direction: column;

    .combo_prize {
      display: flex;
      justify-content: space-between;
    }
  }
}
.description {
  display: flex;
  height: 80px;
  margin-top: 20px;
  input {
    flex: 7;
    margin: 0;
    background: white;
    margin-right: 15px;
  }
  .button_zone {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    button {
      // margin-bottom:15px;
      border-radius: 20px;
      height: 30px;
      cursor: pointer;
      color: white;
      background: #454545;
    }
  }
}
</style>