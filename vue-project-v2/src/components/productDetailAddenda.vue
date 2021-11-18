<template>
  <div class="addenda_all">
    <div class="addenda_title_block">
      <div class="addenda_titlebar">
        <div class="addenda_title">
          {{ packageSelected.name }}
          <div class="addenda_cancel_icon">
            <img src="" alt="" />
          </div>
        </div>

        <div class="addenda_detail_item">
          <div id="addenda_detail">
            <div class="addenda_img">
              <img src="../assets/images/cho_cake.jpg" alt="" />
            </div>
            <div class="addenda_describe">{{ packageSelected.description }}</div>
          </div>
          <div class="addenda_detail_outline">
            <div class="addenda_amount">
              <label for="">
                <select
                  v-model="packageSelected"
                >
                  <option
                    v-for="(pack, index) in packages"
                    :key="index"
                    :value="pack"
                    >{{ pack.name }}</option
                  >
                </select>
              </label>
            </div>
            <div class="addenda_twandprice">
              <div class="addenda_price_tw">NT$</div>
              <div class="addenda_price">{{ packageSelected.price }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="addenda_block">
      <div
        class="addenda_titlebar"
        v-for="(addendacard, index) in addendacards"
        :key="index"
      >
        <div class="addenda_title">
          {{ addendacard.choice.idname }}
          <div class="addenda_cancel_icon" @click="deladdenda(index)">
            <img src="" alt="" />
          </div>
        </div>

        <div class="addenda_detail_item">
          <div id="addenda_detail">
            <div class="addenda_img">
              <img src="../assets/images/cho_cake.jpg" alt="" />
            </div>
            <div class="addenda_describe">
              {{ addendacard.choice.description }}
            </div>
          </div>
          <div class="addenda_detail_outline">
            <div class="addenda_amount">
              <label for="">
                <select v-model="addendacards[index].choice">
                  <option
                    v-for="(choice, i) in choices"
                    :key="i"
                    :value="choice"
                    v-show="!addendacards.map(card=>card.choice).includes(choice)"
                    >{{ choice.idname }}</option
                  >
                </select>
              </label>
              <select name="quantity" v-model="addendacards[index].quantity">
                <option v-for="quantity in 10" :key="quantity">{{quantity}}</option>
              </select>
            </div>
            <div class="addenda_twandprice">
              <div class="addenda_price_tw">NT$</div>
              <div class="addenda_price" >{{ addendacard.choice.price * addendacard.quantity - addendacard.choice.discount }}</div>
            </div>
          </div>
        </div>
      </div>
      <span class="addnew_product_hr"></span>
      <div v-show="addendacards.length<choices.length" class="new_addenda_titlebar">
        <div class="new_addenda" @click="addaddenda(index)">
        <div class="new_addenda_title" >新增加購</div>
            <img src="../assets/images/cho_cake.jpg" alt="" />
        </div>
      </div>
      <div class="addenda_button_bar">
        <router-link to="">
          <button id="addenda_button_backtoproduct" @click="close">
            返回商品
          </button>
        </router-link>
        <router-link to="shopping_cart">
          <button id="addenda_button_sumbit" @click="aaaaa()">前往結帳</button>
        </router-link>
      </div>
    </div>
  </div>
</template>
<script>
import $ from "jquery";
import headercom from "../components/headercom";
import footercom from "../components/footercom";
const choices =[
          {
            idname: "一般卡片",
            description: "我是一般卡片",
            price: 10,
            option: "",
            discount: 10,
            id:1,
          },
          {
            idname: "一般蠟燭",
            description: "我是一般蠟燭",
            price: 10,
            discount: 10,
            option: "",
            id:2,
          },
          {
            idname: "特殊蠟燭",
            description: "我是特殊蠟燭",
            price: 50,
            discount: 0,
            option: "",
            id:3,
          },
          {
            idname: "情人節卡片",
            description: "情人節卡片",
            price: 30,
            discount: 0,
            option: "",
            id:4,
          },
          {
            idname: "聖誕節卡片",
            description: "聖誕節卡片",
            price: 30,
            discount: 0,
            option: "",
            id:5,
          },
          {
            idname: "造型數字蠟燭(0)",
            description: "數字0蠟燭",
            price: 30,
            discount: 0,
            option: "",
            id:6,
          },
          {
            idname: "造型數字蠟燭(1)",
            description: "數字1蠟燭",
            price: 30,
            discount: 0,
            option: "",
            id:7,
          }
        ]

const packages = [{
  name:"普通包裝",
  price:0,
  description:"一般包裝就是一班包裝",
},{
  name: "高級包裝",
  price:60,
  description:          "高級包裝就是高級包裝",
},{
  name: "特殊包裝",
  price:120,
  description:"特殊包裝就是特殊包裝",
}]
export default {
  model: {
    prop: "showpage", //這個字段，是指父組件設置 v-model 時，將變量值傳給子組件的 msg
    event: "closepage" //這個字段，是指父組件監聽 parent-event 事件
  },
  name: "productDetailAddenda",
  components: {
    // titleh1,
    headercom,
    footercom
    // productDetailAddenda,
  },
  data() {


    return {
      index: 0,
      choices,
      packages,
      theselect: '',
      rank: 0,
      addendacards: [
        {
          quantity: 1,
          choice: choices[0],
        },
        {
          quantity: 1,
          choice: choices[1],
        }
      ],
      packageSelected: packages[0],
      counter: 1,
      closethat: this.showpage,
      dude: Array(choices.length).fill(null).map((val, index)=> index).slice(2),
    };
  },
  props: ["show"],
  methods: {

    fukcMyAnal(){
    console.log(this.theselect);
    },
    add() {
      this.counter += 1;
    },
    minus() {
      if (this.counter > 1) {
        this.counter -= 1;
      }
    },
    close() {
      this.$emit("closepage", !this.show);
      console.log(this.show);
    },
    aaaaa() {
      console.log(packageselect);
    },
    checkChoice(){

    },
    addaddenda(){
      if(this.addendacards.length < choices.length ){
        this.addendacards.push(
          {
            quantity: 1,
            choice: this.notSelectedChoices[0],
          }
        )
      }
    },
    deladdenda(index){
      this.addendacards.splice(index,1);
    },
  },
  computed: {
    notSelectedChoices(){
      return this.choices.filter((choice) => {
        return !this.addendacards.some((addendacard) => {
          return addendacard.choice === choice
        })
      })
    }
  },
  mounted() {
  },
  created() {
  }
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
  box-sizing: border-box;
}
body {
  // background-color: $bg;
  z-index: 5;
}
.addenda_all {
  overflow-y: scroll;
  height: calc(100vh - 150px);
}
.addenda_title_block {
  background-color: $palePike;
  max-width: 1000px;
  width: 100%;
  margin: auto;
  height: 350px;
  padding-top: 10px;
  margin-top: 30px;
  @media screen and (max-width: 767.98px) {
    height: 400px;
  }
}
.addenda_titlebar {
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  margin-top: 45px;
  max-width: 900px;
  width: 95%;
  // background-color: $pi;
  .addenda_title {
    font-size: 20px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    @media screen and (max-width: 767.98px) {
      max-width: 470px;
      width: 100%;
      align-items: center;
      margin: auto;
    }
    .addenda_cancel_icon {
      display: inline-block;
      width: 35px;
      height: 35px;
      cursor: pointer;
      img {
        width: 35px;
        height: 35px;
        object-fit: fill;
        background-color: black;
      }
    }
  }
  .addenda_detail_item {
    max-width: 900px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin: 0 auto;
    align-items: center;
    @media screen and (max-width: 767.98px) {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    #addenda_detail {
      max-width: 350px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      @media screen and (max-width: 767.98px) {
        display: flex;
        max-width: 470px;
        width: 100%;
        justify-content: space-between;
      }
      .addenda_img {
        width: 200px;
        height: 200px;
        img {
          object-fit: cover;
          width: 200px;
          height: 200px;
        }
        @media screen and (max-width: 767.98px) {
          width: 150px;
          height: 150px;
          img {
            object-fit: cover;
            width: 150px;
            height: 150px;
          }
        }
      }
      .addenda_describe {
        max-width: 120px;
        width: 100%;
        display: flex;
        flex-direction: column;
        font-size: 16px;
        align-items: center;
        justify-content: center;
      }
    }
    .addenda_detail_outline {
      max-width: 470px;
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      @media screen and (max-width: 767.98px) {
        margin-top: 20px;
      }
      .addenda_amount {
        width: 200px;
        height: 40px;
        font-size: $h4;
        cursor: pointer;
        select {
          width: 200px;
          height: 40px;
          font-size: $h4;
          text-align: center;
          background-color: #f8f8f8;
          cursor: pointer;
        }
        @media screen and (max-width: 767.98px) {
          max-width: 576px;
          width: 100%;

          height: 30px;
          font-size: $h4;
          cursor: pointer;
          select {
            width: 150px;
            height: 30px;
            font-size: $h4;
            background-color: #f8f8f8;
            cursor: pointer;
          }
        }
      }
      .addenda_twandprice {
        align-self: center;
        display: flex;
        justify-content: space-between;
        max-width: 120px;
        width: 100%;
        .addenda_price_tw {
          font-size: $h3;
        }
        .addenda_price {
          font-size: $h3;
          align-self: center;
          text-align: right;
          max-width: 100px;
          width: 100%;
        }
      }
    }
  }
}
.addenda_block {
  padding-top: 30px;
  padding-bottom: 50px;
  background-color: #f7edd4;
  max-width: 1000px;
  width: 100%;
  margin: 0 auto;
  // margin-top: 70px;
}
.addnew_product_hr {
  max-width: 900px;
  margin: 0 auto;
  border-top: 1px solid $darkGrey;
  width: 100%;
  display: block;
  margin-top: 80px;
  margin-bottom: 60px;
}
.new_addenda_titlebar {
  width: 95%;
  height: 200px;
  max-width: 900px;
  margin: auto;
  display: flex;
  background-color: rgba(255, 255, 255, 0.5);
  justify-content: center;
  align-items: center;
  @media screen and (max-width: 767.98px) {
    max-width: 470px;
    width: 90%;
  }
  .new_addenda {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    width: 120px;
    height: 120px;
    padding-top: 15px;
    padding-bottom: 20px;
    cursor: pointer;
    // opacity: 1;
    .new_addenda_title {
      font-size: $h4;
      margin: 0 auto;
      color: $palePike;
    }
    img {
      width: 45px;
      height: 45px;
      align-self: center;
    }
  }
}
.product_details_combination1_button {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  max-width: 120px;
  height: 50px;
  align-items: flex-end;
  width: 100%;
  #product_details_combination1_commit {
    margin: 0 auto;
    // margin-top: 20px;
    // margin-bottom: 50px;
    background-color: $darkGrey;
    width: 120px;
    height: 40px;
    font-size: 20px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 5px;
    border: 0;
    &:hover {
      color: $lightYellow;
    }
  }
  #product_details_combination1_buy {
    margin: 0 auto;
    margin-top: 20px;
    // margin-bottom: 50px;
    background-color: $darkGrey;
    width: 120px;
    height: 40px;
    font-size: 20px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 5px;
    border: 0;
    &:hover {
      color: $lightYellow;
    }
  }
}

#product_details_combination2 {
  cursor: pointer;
  width: 100%;
  max-width: 1120px;
  margin: 0 auto;
  margin-top: 30px;
  margin-bottom: 30px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 150px;
  background-color: #ebdcd8;
  .new_combination {
    max-width: 1120px;
    width: 93.5%;
    margin: 0 auto;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    @media screen and (max-width: 767.98px) {
      width: 90%;
    }
    .new_combination_title {
      // margin-left: 60px;
      font-size: $h2;
    }
    img {
      width: 40px;
      height: 40px;
    }
  }
}
#product_details_combination3 {
  margin: 0 auto;
  width: 100%;
  max-width: 1120px;
  height: 350px;
  background-color: #ebdcd8;
  display: flex;
  justify-content: space-between;
  @media screen and (max-width: 767.98px) {
    display: flex;
    max-width: 700px;
    width: 100%;
    height: 450px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
  }
  #combination3_contentoutline {
    max-width: 760px;
    width: 100%;
    @media screen and (max-width: 767.98px) {
      height: 500px;
    }
    #product_details_total {
      width: 90%;
      max-width: 700px;
      height: 250px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      margin: 0 auto;
      margin-top: 50px;
      @media screen and (max-width: 767.98px) {
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      #combination_titlebar {
        margin-bottom: 40px;
        #combination_title {
          font-size: $h2;
          max-width: 470px;
          width: 100%;
          @media screecombination_titlen and (max-width: 767.98px) {
            margin-top: 50px;
          }
        }
      }
      .combination_contentbar {
        max-width: 700px;
        display: flex;
        justify-content: space-between;
        width: 100%;
        font-size: $h4;
        @media screen and (max-width: 767.98px) {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
        }
        .product_contentbar {
          display: flex;
          justify-content: space-between;
          max-width: 315px;
          width: 100%;
          align-items: center;
          @media screen and (max-width: 767.98px) {
            display: flex;
            max-width: 470px;
            width: 90%;
            justify-content: flex-start;
          }
          // 另外設的scss是正確的
          .product_speical_fontsize {
            font-size: $h3;
          }
          .product {
            display: flex;
            max-width: 280px;
            width: 100%;
            font-size: $h4;
            @media screen and (max-width: 767.98px) {
              display: flex;
              justify-content: left;
            }
          }
          .product_priceandamount {
            display: flex;
            justify-content: space-between;
            max-width: 50px;
            width: 100%;
            .proudct_amount_x {
              max-width: 20px;
              width: 100%;
              display: flex;
              justify-content: center;
            }
            .proudct_amount_number {
              display: flex;
              margin-left: 5px;
              width: 100%;
              max-width: 30px;
            }
          }
        }
        .product_twandprice {
          display: flex;
          justify-content: space-between;
          max-width: 150px;
          width: 100%;
          @media screen and (max-width: 767.98px) {
            display: flex;
            justify-content: right;
            width: 100%;
            max-width: 500px;
          }
          .product_price_tw {
            display: flex;
            justify-content: space-between;
            max-width: 50px;
            width: 100%;
          }
          .product_price {
            margin-left: 5px;
            margin-right: 5px;
            display: inline-block;
            max-width: 100px;
            width: 100%;
            text-align: right;
          }
          // 另外設的SCSS正確的
          .product_speical_color {
            color: #9f746b;
            font-size: $h4;
          }
        }
      }
      .addnew_product_hr2 {
        max-width: 700px;
        margin: 0 auto;
        border-top: 1px solid $darkGrey;
        width: 100%;
        display: block;
        margin-top: 25px;
        margin-bottom: 25px;
        @media screen and (max-width: 767.98px) {
          max-width: 768px;
          margin: 0 auto;
          width: 100%;
          display: block;
          margin-top: 25px;
          margin-bottom: 25px;
        }
      }
    }
  }
  #product_logo_img {
    max-width: 360px;
    width: 70%;
    position: relative;
    @media screen and (max-width: 767.98px) {
      display: none;
    }
    img {
      width: 250px;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
      height: 190px;
    }
  }
}
#product_details_combination4 {
  max-width: 1120px;
  width: 90%;
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
  margin-top: 100px;
  margin-bottom: 100px;
  border: 0;
  #product_details_combination_router {
    display: flex;
    justify-content: center;
    text-decoration: none;
    width: 100%;
    #product_details_combination_checkout {
      background-color: #f7edd4;
      // max-width: 1120px;
      width: 100%;
      height: 70px;
      font-size: 24px;
      border: 0;
      border-radius: 5px;
      box-shadow: $shadow;
      color: $darkGrey;
      cursor: pointer;
      &:hover {
        color: #9f746b;
      }
      .product_details_combination_checkout_text {
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 1120px;
        width: 100%;
      }
    }
  }
}
.addenda_button_bar {
  display: flex;
  justify-content: space-between;
  max-width: 500px;
  width: 100%;
  margin: auto;
}
#addenda_button_sumbit {
  margin: 0 auto;
  // margin-top: 20px;
  // margin-bottom: 50px;
  background-color: $darkGrey;
  width: 120px;
  height: 40px;
  margin-top: 50px;
  font-size: 20px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border-radius: 5px;
  border: 0;
  &:hover {
    color: $lightYellow;
  }
}
#addenda_button_backtoproduct {
  margin: 0 auto;
  // margin-top: 20px;
  // margin-bottom: 50px;
  background-color: $darkGrey;
  width: 120px;
  height: 40px;
  margin-top: 50px;
  font-size: 20px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border-radius: 5px;
  border: 0;
  &:hover {
    color: $lightYellow;
  }
}
</style>
