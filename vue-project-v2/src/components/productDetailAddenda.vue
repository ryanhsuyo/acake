<template>
  <div class="addenda_all">
    <div class="addenda_title_block">
      <div class="addenda_titlebar">
        <div class="addenda_title">
          {{checkPackageDatas[packageIndex].NAME}}
          <div class="addenda_cancel_icon">
            <!-- <img src="" alt="" /> -->
          </div>
        </div>

        <div class="addenda_detail_item">
          <div id="addenda_detail">
            <div class="addenda_img">
              <img src="../assets/images/cho_cake.jpg" alt="" />
            </div>
            <div class="addenda_describe">{{checkPackageDatas[packageIndex].DESCRIPTION}}</div>
          </div>
          <div class="addenda_detail_outline">
            <div class="addenda_amount">
              <label for="">
                <select v-model="packageIndex">
                  <option v-for="(packageData, packageIndex) in checkPackageDatas" :key="packageIndex" :value="packageIndex">{{checkPackageDatas[packageIndex].NAME}}
                </option>
                </select>
              </label>
            </div>
            <div class="addenda_twandprice">
              <div class="addenda_price_tw">NT$</div>
              <div class="addenda_price">{{checkPackageDatas[packageIndex].PRICE}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="addenda_block">
      <div class="addenda_titlebar" v-for="(checkAdditional, additionalIndex) in checkAdditionals" :key="additionalIndex" :value="additionalIndex">
        <div class="addenda_title">{{checkAdditional.NAME}}
          <div class="addenda_cancel_icon" @click="delAdditional(additionalIndex)" v-show="checkAdditional.NAME !== '一般卡片' && checkAdditional.NAME !== '一般蠟燭'">
            <img src="" alt="" />
          </div>
        </div>

        <div class="addenda_detail_item">
          <div id="addenda_detail">
            <div class="addenda_img">
              <img src="../assets/images/cho_cake.jpg" alt="" />
            </div>
            <div class="addenda_describe">{{checkAdditionals[additionalIndex].DESCRIPTION}}
              
            </div>
          </div>
          <div class="addenda_detail_outline">
            <div class="addenda_amount">
              <label for="">
                <select name="additionalName" @change="changeName(additionalNameIndex)" >
                  <option>替換其他商品</option >
                  <option v-for="(checkAdditionalName, additionalNameIndex) in additionals" :key="additionalNameIndex" :value="additionalNameIndex" >{{checkAdditionalName.NAME}}{{checkAdditionalName.ID}}
                  </option>
                </select>
              </label>
              <select name="quantity" >
                <option v-for="(quantity, quantityIndex) in 10" :key="quantityIndex">{{quantity}}
                
                </option>
              </select>
            </div>
            <div class="addenda_twandprice">
              <div class="addenda_price_tw">NT$</div>
              <div class="addenda_price">{{checkAdditionals[additionalIndex].PRICE}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <span class="addnew_product_hr"></span>
      <div class="new_addenda_titlebar">
        <div class="new_addenda" @click="addNewAdditional()">
          <div class="new_addenda_title">新增加購</div>
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
import axios from "axios"

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
      a: [],
      theselect: "",
      rank: 0,
      packageIndex: 0,
      packageDatas:[],
      checkPackageDatas:[],
      counter: 1,
      closethat: this.showpage,
      additionals : [],
      checkAdditionals: [],
      checkAdditionalNames: [],
      // additionalNameIndex: 0,
      // dude: Array(choices.length)
      //   .fill(null)
      //   .map((val, index) => index)
      //   .slice(2)
    };
  },
  props: ["show"],
  methods: {
    changeName(additionalNameIndex){
      console.log(additionalNameIndex)
      // checkAdditional.NAME = this.checkAdditionals[additionalIndex].NAME
    },
   // changeCheckPackageDatas(packageIndex){
    //   console.log(packageIndex)
    // },
    // 
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
      document.querySelector('body').style.overflow='auto'
    },
    checkChoice() {},
    addNewAdditional(){
      console.log(this.additionals[0]);
      if(this.additionals[0]){
        this.checkAdditionals.push(this.additionals[0])
        this.additionals.shift();
        // console.log('全部商品', this.additionals)
        // console.log('選取商品',this.checkAdditionals)
      }
    },
    delAdditional(additionalIndex){
      // if(this.checkAdditionals[0] && this.checkAdditionals[1]){

        console.log('處理前', this.additionals)
        this.additionals.push(...this.checkAdditionals.splice(additionalIndex,1));
        console.log('處理後', this.additionals)
      // }
    },
    // deladdenda(index) {
    //   // console.log(this.dude);
    //   console.log(this.addendacards);
    //   // this.index = index
    //   if (index !== 1 && index !== 0) {
    //     this.addendacards.splice(index, 1);
    //     console.log(index);
    //     this.dude.push(index);
    //     this.dude.sort((a, b) => a - b);
    //     console.log(this.dude);
    //   }
    // }
  },
  computed: {},
  mounted(){
        axios.post("http://localhost/acake/productDetailSelectPackage.php")
            .then(res => {
                // console.log(res);
                this.packageDatas = res.data
                this.checkPackageDatas = this.packageDatas 
                // console.log(this.packageDatas[0].NAME)
                this.checkPackageDatas.push(this.packageDatas[0])
                // console.log(this.checkPackageDatas[0].NAME)
                
            })
            .catch( err => console.log(err));
        axios.post("http://localhost/acake/productDetailSelectAdditional.php")
            .then(res => {
              // console.log(res.data);
              this.additionals = res.data 
              // console.log(this.additionals)
              this.checkAdditionals.push(this.additionals[0])
              this.additionals.splice(0, 1)
              this.checkAdditionals.push(this.additionals[0])
              this.additionals.splice(0, 1)
              console.log(this.additionals)
              console.log(this.checkAdditionals)  
              // console.log(this.checkAdditionals)
              // this.checkAdditionals.push(this.additionals[1])
              // console.log(this.checkAdditionals)
              // console.log(this.checkAdditionals)
              // console.log(this.checkAdditionals[0].NAME)
            })
            .catch( err => console.log(err));
              
    
            
  },
  beforeDestroy() {
   
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
  // overscroll-behavior: contain;
  overflow-y: scroll;
  height: 70vh;
}
.addenda_title_block {
  background-color: $palePike;
  max-width: 1000px;
  width: 100%;
  margin: auto;
  height: 350px;
  padding-top: 10px;
  // margin-top: 30px;
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
