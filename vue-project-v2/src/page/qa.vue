<template>
  <div>
    <div id="chat_icon_block">
      <img
        id="chat_icon"
        src="../assets/images/message_icon.png"
        alt=" "
         @click="qaChatOpen ? (qaChatOpen = false) : (qaChatOpen = true)"
      />
      <qaChat class="qaChatPosition" v-show="qaChatOpen"></qaChat>
    </div>

    <headercom openWhat="qa"></headercom>
    <div id="main-bar-img300"></div>
    <main class="shopping_cart_main">
      <titleh1 class="titleh1rwd" title="QA問答"></titleh1>

      <div class="searchbar_titlebar">
        
      </div>
      <!-- 訂單問題 -->
      <section class="qa_question_block" style="marginTop:100px;">
        <div class="qa_question_bar">
          <div class="qa_maxtitlebar">
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-minus"
              v-show="openQuest"
              @click="openQuest=!openQuest"
            />
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-plus"
              v-show="!openQuest"
              @click="openQuest=!openQuest"
            />
            <label>訂單問題</label>
          </div>
        </div>
        <div
          class="qa_question_answer_block_outline"
          :class="{ 'close': !openQuest }"
        >
          <div class="qa_question_answer_block_insideblock">
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer0_1 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer0_1"
                  @click="openAnswer0_1 = !openAnswer0_1"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer0_1"
                  @click="openAnswer0_1 = !openAnswer0_1"
                />
                <div class="qa_common_question_title">如何更改訂單內容、送貨地址或取消訂單？</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">如遇到要更改訂單，或是取消訂單之情況，請於一日內出貨前來信或來電告知更改，我們將盡快為您做出更改或取消的動作。
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer0_2 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer0_2"
                  @click="openAnswer0_2 = !openAnswer0_2"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer0_2"
                  @click="openAnswer0_2 = !openAnswer0_2"
                />
                <div class="qa_common_question_title">如何選購尺寸？</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">不同品牌或會使用不同尺寸及量度系統, 所以我們於商品頁面提供適合不同品牌的尺寸指南幫助顧客選擇商品尺寸。<br>有任何問題歡迎來信及來電做詢問。
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer0_3 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer0_3"
                  @click="openAnswer0_3 = !openAnswer0_3"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer0_3"
                  @click="openAnswer0_3 = !openAnswer0_3"
                />
                <div class="qa_common_question_title">如何付款呢</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">我們接受以下付款方式:<br>
1.信用卡 -綠界科技第三方支付<br>
2.ATM轉帳匯款 :<br>
匯款資訊：<br>
土地銀行 / 代號：005 / 北台南分行<br>
帳號：123-456-7890<br>
戶名：緯育前端班第三組
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer0_4 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer0_4"
                  @click="openAnswer0_4 = !openAnswer0_4"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer0_4"
                  @click="openAnswer0_4 = !openAnswer0_4"
                />
                <div class="qa_common_question_title">我想要更換蛋糕口味可以嗎?</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">蛋糕皆為接單生產，所以訂單完成後無法再更換口味。
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- 保存蛋糕 -->
      <section class="qa_question_block">
        <div class="qa_question_bar">
          <div class="qa_maxtitlebar">
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-minus"
              v-show="openQuest2"
              @click="openQuest2=!openQuest2"
            />
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-plus"
              v-show="!openQuest2"
              @click="openQuest2=!openQuest2"
            />
            <label>保存問題</label>
          </div>
        </div>
        <div
          class="qa_question_answer_block_outline"
          :class="{ 'close': !openQuest2 }"
        >
          <div class="qa_question_answer_block_insideblock">
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer2_1 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer2_1"
                  @click="openAnswer2_1 = !openAnswer2_1"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer2_1"
                  @click="openAnswer2_1 = !openAnswer2_1"
                />
                <div class="qa_common_question_title">應該如何保存呢？</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">常溫保存約1~2個小時。建議到家先冰冷凍30分鐘~1個小時，等蛋糕變軟硬適中後，再分切冰入冷凍或冷藏；行車過程中，盡量保持蛋糕平放，若還有其他行程，請勿將蛋糕置於車內，需放置陰涼處避免變質。
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer2_2 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer2_2"
                  @click="openAnswer2_2 = !openAnswer2_2"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer2_2"
                  @click="openAnswer2_2 = !openAnswer2_2"
                />
                <div class="qa_common_question_title">為什麼蛋糕可以保存7 天，會不新鮮吧？</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">因為我們的乳酪蛋糕不添加麵粉及水，全是真材實料的乳酪製作而成，
所以只要以冷凍保存是可以保存 7 天的哦！請您放心享用。
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- 運送問題 -->
      <section class="qa_question_block">
        <div class="qa_question_bar">
          <div class="qa_maxtitlebar">
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-minus"
              v-show="openQuest3"
              @click="openQuest3=!openQuest3"
            />
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-plus"
              v-show="!openQuest3"
              @click="openQuest3=!openQuest3"
            />
            <label>運送問題</label>
          </div>
        </div>
        <div
          class="qa_question_answer_block_outline"
          :class="{ 'close': !openQuest3 }"
        >
          <div class="qa_question_answer_block_insideblock">
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer3_1 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer3_1"
                  @click="openAnswer3_1 = !openAnswer3_1"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer3_1"
                  @click="openAnswer3_1 = !openAnswer3_1"
                />
                <div class="qa_common_question_title">請問下單完成後最快多久會送達呢?</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">官網下單有三天工作天，您可以在官網的結帳頁面查看最快到貨日期唷！例如：<br
              >今日9/1(一)下單，可選擇9/5(五)的希望到貨日期；如已無法選擇您想要的希望到貨日期，可以在客服服務時間內致電詢問，我們會建議再您要使用蛋糕當天的前一兩天先收到貨，比較不會因為物流端因素(包裹送錯縣市、當區包裹量太大送不完)等耽誤到您的慶祝或是送禮安排，提前先收到的蛋糕都會在賞味期限內請您放心！
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer3_2 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer3_2"
                  @click="openAnswer3_2 = !openAnswer3_2"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer3_2"
                  @click="openAnswer3_2 = !openAnswer3_2"
                />
                <div class="qa_common_question_title">在我指定的時段內都快到了蛋糕卻還沒送達，怎麼辦呢?</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">如有登入會員下單的話，您可以再次登入會員，點選畫面右上角的小人物圖示查看您的「訂單」，選擇該筆訂單點選「查閱」，在送貨資訊欄處可以看到【黑貓物流追蹤】，點選後即可了解目前包裹配送狀態哦！<br>
如未登入會員下單的話，則無法在官網看到您的訂單資訊，請您選擇以下方式與我們聯繫：<br>
在網路客服服務時間內(平日早上9點-晚上6點)致電1234-5678、加入官方LINE@好友ID：@moneymoney、粉絲專頁私訊，並告知您的訂購姓名、電話或是訂單編號及問題給我們，我們將在收到您的訊息後回覆您。
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer3_3 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer3_3"
                  @click="openAnswer3_3 = !openAnswer3_3"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer3_3"
                  @click="openAnswer3_3 = !openAnswer3_3"
                />
                <div class="qa_common_question_title">請問可以寄便利商店店到店嗎?</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">不好意思，目前我們僅配合黑貓低溫宅配寄送，
無提供超商取貨、店到店服務哦！
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="qa_question_block">
        <div class="qa_question_bar">
          <div class="qa_maxtitlebar">
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-minus"
              v-show="openQuest4"
              @click="openQuest4=!openQuest4"
            />
            <font-awesome-icon
              class="icon_40"
              icon="fa-solid fa-plus"
              v-show="!openQuest4"
              @click="openQuest4=!openQuest4"
            />
            <label>自製蛋糕問題</label>
          </div>
        </div>
        <div
          class="qa_question_answer_block_outline"
          :class="{ 'close': !openQuest4 }"
        >
          <div class="qa_question_answer_block_insideblock">
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer4_1 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer4_1"
                  @click="openAnswer4_1 = !openAnswer4_1"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer4_1"
                  @click="openAnswer4_1 = !openAnswer4_1"
                />
                <div class="qa_common_question_title">自己設計難度會很高嗎?</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">我們主打沒有任何經驗也可以參與製作，即使您完全沒有接觸過料理，只要你有意願，一樣能夠做出漂漂亮亮、專屬於您的蛋糕。<br>詳情可以到製作蛋糕區試作喔。
              </div>
            </div>
            <div
              class="qa_common_question_answerblock"
              :class="{ close: openAnswer4_2 }"
            >
              <div class="qa_common_question_titlebar">
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-minus"
                  v-show="!openAnswer4_2"
                  @click="openAnswer4_2 = !openAnswer4_2"
                />
                <font-awesome-icon
                  class="icon_30"
                  icon="fa-solid fa-plus"
                  v-show="openAnswer4_2"
                  @click="openAnswer4_2 = !openAnswer4_2"
                />
                <div class="qa_common_question_title">自製蛋糕會不會不好吃?</div>
              </div>
              <div class="qa_hr"></div>
              <div class="qa_common_answer">我們每一份原料都保證新鮮，不會有私藏的情況。您可以放心地使用我們提供的每一樣原料，做出你喜愛的口味。我們向您保證，絕對滿足您好奇的胃。
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footercom></footercom>
  </div>
</template>
<script>
import $ from "jquery";
import headercom from "../components/headercom";
import footercom from "../components/footercom";
import titleh1 from "../components/title_h1.vue";
import search_bar from "../components/search_bar.vue";
import qaChat from "../components/qaChat.vue";
import axios from "axios";
export default {
  name: "qa_page",
  components: {
    titleh1,
    headercom,
    footercom,
    search_bar,
    qaChat,
  },
  data() {
    return {
      qaChatOpen: false,
      openQuest: false,
      openQuest2:false,
      openQuest3:false,
      openQuest4:false,
      openAnswer0_1:true,
      openAnswer0_2:true,
      openAnswer0_3:true,
      openAnswer0_4:true,
      openAnswer2_1:true,
      openAnswer2_2:true,
      openAnswer3_1:true,
      openAnswer3_2:true,
      openAnswer3_3:true,
      openAnswer4_1:true,
      openAnswer4_2:true,
      openAnswer: false,
    };
  },
  methods: {
  },
  watch: {
    
  },
  computed: {},
  mounted() {
    
  },
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
  box-sizing: border-box;
  color: #515151 !important;
}
body {
  background-color: $bg;
  position: relative;
}
#chat_icon_block {
  position: fixed;
  bottom: 15px;
  right: 90px;
  // z-index: 9999;
  // animation: floattop;
  // animation-duration: 2s;
  // animation-iteration-count: infinite;
  
  #chat_icon {
    width: 50px;
    height: 50px;
    cursor: pointer;
    position:relative;
    
  }
  .qaChatPosition {
    position: absolute;
    bottom: 70px;
    right: 0px;
    display: block;
  }
  @media screen and (max-width:500px) {
    .qaChatPosition{
      right:0px;
    }
  }
}
@media screen and (max-width:500px){
  #chat_icon_block{
    right:5px
  }
}
.qaChatPosition {
  position: absolute;
  bottom:150px;
  right: 100px;
  z-index: 5;
}
#main-bar-img300 {
  margin-top: 50px;
  margin-bottom:100px;
  height: 300px;
  background-image: url('../assets/images/background_img300.png');
  background-size: auto 100%;
  background-position: center center;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  z-index: -1;
}
.shopping_cart_main {
  display: flex;
  flex-direction: column;
  align-items: center;
  .titleh1rwd {
    margin-top: 150px;
    margin-bottom: 20px;
    @media screen and (max-width: 767.98px) {
      display: flex;
      justify-content: center;
      margin: 0 auto;
      margin-top: 150px;
      margin-bottom: 50px;
      align-items: center;
    }
  }
  // 購物車麵包屑
  .shopping_cart_bread {
    width: 70%;
    justify-content: space-around;
    display: flex;
    margin: 0 auto;
    font-size: $h1;
    margin-top: 200px;
    margin-bottom: 50px;
    @media screen and (max-width: 767.98px) {
      display: flex;
      margin-top: 100px;
      flex-direction: column;
      align-items: center;
      height: 200px;
    }
    .shopping_cart_page,
    .prepare_checkout_page,
    .checkout_page {
      font-size: $h1;
      max-width: 200px;
      width: 100%;
      display: flex;
      justify-content: center;
      @media screen and (max-width: 767.98px) {
        font-size: $h4;
      }
    }
    .shopping_cart_bread_arrow {
      width: 100%;
      max-width: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      .shopping_cart_bread_arrow_img {
        width: 20px;
        height: 20px;
        object-fit: cover;
        @media screen and (max-width: 767.98px) {
          width: 20px;
          height: 20px;
          object-fit: cover;
          transform: rotate(90deg);
        }
      }
    }
  }
}
// 購物車麵包屑結束
// 搜尋欄
.searchbar_titlebar {
  display: flex;
  justify-content: flex-end;
  width:80%;
  max-width: 1120px;
  margin-top: 150px;
  @media screen and (max-width: 767.98px) {
    width: 80%;
    display: flex;
    justify-content: center;
    margin: auto;
  }
}
.search_baron {
  max-width: 100%;
  height: 50px;
  border-radius: 100px;
  border: none;
  padding: 0 30px;
  opacity: 70%;
  box-shadow: $shadow;
  font-size: $h4;
  display: flex;
  max-width: 400px;
  width: 100%;
  cursor: text;
  justify-content: flex-end;
  margin-bottom: 50px;
  &:focus {
    border: none;
  }
  @media screen and (max-width: 767.98px) {
    max-width: 400px;
    width: 95%;
    margin-top: 120px;
  }
}
.qa_question_block {
  display: flex;
  justify-content: center;
  max-width: 1120px;
  width: 80%;
  align-items: center;
  flex-direction: column;
  background-color:rgba(255,255,255,.5);
  border-radius: 10px;
    box-shadow: 2px 3px 3px rgba(0,0,0,.3);
    margin-bottom:30px;
}
.qa_question_bar {
  max-width: 1120px;
  width: 100%;
  height: 100px;
  background-color: $palePike;
  display: flex;
  align-items: center;
  border-radius: 10px 10px 0 0;
  margin-bottom:20px;
}
.qa_maxtitlebar {
  display: flex;
  width: 80%;
  font-size: $h2;
  align-items: center;
  padding-left:20px;
  label{
    margin-left:20px;
  }
}
.icon_30 {
  width: 30px;
  cursor: pointer;
  height: 30px;
}
.icon_40 {
  width: 40px;
  height: 40px;
  cursor: pointer;
}

.qa_maxopenclose {
  width: 40px;
  height: 40px;
  object-fit: cover;
  background-color: black;
}
.qa_question_answer_block_outline {
  max-width: 1120px;
  width: 95%;
  display: flex;
  align-items: center;
}
.qa_question_answer_block_outline.close {
  display: none;
}
.qa_question_answer_block_insideblock {
  // height: 300px;
  max-width: 900px;
  width: 95%;
  margin: auto;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}
.qa_common_question_answerblock {
  // height: 120px;
  width: 100%;
  max-width: 900px;
  margin-bottom: 40px;
}
.qa_common_question_answerblock.close {
  
  .qa_common_answer{
    display:none;
  }

}
.qa_common_question_titlebar {
  width: 100%;
  display: flex;
  align-items: center;
  line-height: 50px;
}
.qa_common_question_titleimg {
  width: 30px;
  height: 30px;
  object-fit: cover;
  background-color: black;
  margin-right: 30px;
}
.qa_common_question_title {
  font-size: $h3;
  margin-left: 20px;
  width:100%;
}
.qa_hr {
  margin: auto;
  width: 100%;
  max-width: 900px;
  border-top: 2px solid rgb(119, 119, 119);
  margin-top: 5px;
  margin-bottom: 5px;
}
.qa_common_answer {
  display: flex;
  margin-top: 15px;
  margin-bottom: 30px;
  white-space: pre-wrap;
}
.qa_question_blockother {
  max-width: 1120px;
  width: 100%;
  margin-bottom: 50px;
}
.qa_question_blockother2 {
  max-width: 1120px;
  width: 100%;
  margin-bottom: 100px;
  border-radius: 10px;
}
.qa_question_barother {
  border-radius: 10px;
}

@keyframes floattop{

0% {

    transform: translate(0px, 0px);
}

50% {
    transform: translate(0px, -10px);
}

100% {
    transform: translate(0px, 0px);
}}
</style>