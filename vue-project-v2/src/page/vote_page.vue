<template>
    <div>
        <headercom voteon=1 qaon=0 saleon=0 cakeon=0 openWhat="vote"></headercom>
        <div id="vote_page_main_bar">
            <titleh1 title="人氣投票"></titleh1>
            <p>
                <span>{{vote_info.EVENT_NAME}}</span>

        {{vote_info.EVENT_DESCRIPTION}}

        <span>活動期間：{{vote_info.START_DATE}}~{{vote_info.END_DATE}}</span>
      </p>
    </div>
    <main id="vote_page_main">
      <h1 class="nowRange" style="color:#515151">
        <img src="../assets/images/jellyfish_single.svg" alt="" />現在排名
      </h1>
      <section id="topthree">
        <div class="vote_topthree" v-for="(three,index) in topthree" :key="index">
          <img
            :src="require('@/assets/images/chefHatNo'+(index+1)+'.png')"
            alt=""
            class="topthree_hat" 
          />
          <img :src="three.CAKE_IMAGE_BLOB" alt="" class="pic_cake" style="borderRadius:10px 10px 0 0"/>
          <div>
            <h1>{{three.CAKE_NAME}}</h1>
            <p>Voting NO. {{three.CAKE_ID}}</p>
            <!-- 資料庫給副標題 -->
          </div>
        </div>
        
      </section>
      <cake-selector
        :total_decorations="total_decorations"
        :total_ingredients="total_ingredients"
        :total_cakebodys="total_cakebodys"
        @selector="changeItem"
      ></cake-selector>
      <!-- <div id="select_test"></div> -->
      <h1 class="vote_title">
        <span style="color:#515151"
          ><img
            src="../assets/images/jellyfish_single.svg"
            alt=""
          />候選名單</span
        >
        <search-bar></search-bar>
      </h1>
      <!-- <card-voting 
        :cake_name="cake.CAKE_NAME" :cake_description="cake.DESCRIPTION" :cake_vote_num="cake.VOTING_NUM"
        :cake_id="cake.CAKE_ID" :cake_img="cake.CAKE_IMAGE_BLOB"
        ></card-voting> -->
      <section id="vote">
        <div class="card_outline2" v-for="(cake, index) in vote_cake" :key="index" >
        <div class="img_container">
            <img :src="cake.CAKE_IMAGE_BLOB">
        </div>
        <div class="down_block">
            <h4 class="cake_title">{{cake.CAKE_NAME}}</h4>
            <p class="design_idea">{{cake.DESCRIPTION}}</p>
            <div class="voting_area">
                <div class="voting_num">
                    <span class="heart_icon"></span>
                    <span class="num">{{cake.VOTING_NUM}}</span>
                </div>
                <button class="voting" @click="votePlus(cake)" :class="{'check':cake.choose}" :style="{fontFamily: `'EB Garamond','jf open 粉圓 1.1'`}">
                    投票
                    <span></span>
                </button>
            </div>
        </div>
    </div>
      </section>
      <ul>
      <li
        v-for="(number, index) in pages"
        :key="index"
        @click="getDataNumber(index)"
      >
        <router-link :to="'/vote/' + (index + 1)">{{ number }}</router-link>
      </li>
    </ul>
    </main>

    <footercom></footercom>
  </div>
</template>
<script>
import $ from "jquery";
import pageSelect from "../components/page_selector";
import headercom from "../components/headercom";
import footercom from "../components/footercom";
import searchBar from "../components/search_bar";
import cardTopthree from "../components/card_topthree";
import titleh1 from "../components/title_h1.vue";
import Search_bar from "../components/search_bar.vue";
import cakeSelector from "../components/cake_selector.vue";
import cardVoting from "../components/card_voting.vue";
import card_topthree from "../components/card_topthree.vue";
import axios from 'axios'
export default {
  name: "votePage",
  data(){
    return{
      total_decorations:["裝飾小葉子",'A cake 小立牌','鮮奶油','薄荷葉','迷迭香'],
      total_ingredients:["新鮮藍莓","新鮮櫻桃","新鮮綠葡萄","新鮮奇異果","もも水蜜桃片"],
      total_cakebodys:["優格馬斯卡邦","鮮奶油草莓","藍莓優格乳酪","奶油抹茶香緹","奶油紅茶香緹"],
topthree:[],
vote_info:{},
pages:[],
vote_cake:[],
    }
  },
  components: {
    titleh1,
    headercom,
    footercom,
    pageSelect,
    searchBar,
    Search_bar,
    cakeSelector,
    cardVoting,
    cardTopthree,
    card_topthree,
  },
    methods:{
      votePlus(cake){
            if(this.$store.state.member_id==0){
                alert('您尚未登入')
            }else{
                //先判定是否是會員才進行投票判定
            if(cake.choose == 0){
                //加一票
                        //如果投過三票
                    if(document.cookie.indexOf(`${this.$store.state.member_id}-3`)!=-1){
                        alert('你今天已經投過三票囉')
                    }
                
                    //如果投過兩票
                    if(document.cookie.indexOf(`${this.$store.state.member_id}-2`)!=-1&&(document.cookie.indexOf(`${this.$store.state.member_id}-3`)==-1)){
                            document.cookie = `${this.$store.state.member_id}-3=Mike222; max-age=60`;
                        cake.choose = 1;
                        cake.VOTING_NUM++;
                        alert('今天投完票囉')
                    }
                //如果投過一票
                if(document.cookie.indexOf(`${this.$store.state.member_id}-1`)!=-1&&(document.cookie.indexOf(`${this.$store.state.member_id}-2`)==-1)){
                    document.cookie = `${this.$store.state.member_id}-2=Mike222; max-age=60;`
                    cake.choose = 1;
                    cake.VOTING_NUM++;
                    alert('剩下一票')
                }
                    //如果都沒投票
                if(document.cookie.indexOf(`${this.$store.state.member_id}-1`)==-1){
                document.cookie = `${this.$store.state.member_id}-1=Mike222; max-age=60;`
                cake.choose = 1;
                cake.VOTING_NUM++;
                alert('剩下兩票')
                }
            }else{
                //減一票
                //收回第一票
                if(document.cookie.indexOf(`${this.$store.state.member_id}-1`)!=-1&&document.cookie.indexOf(`${this.$store.state.member_id}-2`)==-1&&document.cookie.indexOf(`${this.$store.state.member_id}-3`)==-1){
                    document.cookie = `${this.$store.state.member_id}-1=Mike222=;expires=${(new Date(0)).toGMTString()}`;
                    cake.choose = 0;
                    cake.VOTING_NUM--
                    alert('取消第一票')
                }
                //收回第二票
                if(document.cookie.indexOf(`${this.$store.state.member_id}-1`)!=-1&&document.cookie.indexOf(`${this.$store.state.member_id}-2`)!=-1&&document.cookie.indexOf(`${this.$store.state.member_id}-3`)==-1){
                    document.cookie = `${this.$store.state.member_id}-2=Mike222=;expires=${(new Date(0)).toGMTString()}`;
                    cake.choose = 0;
                    cake.VOTING_NUM--
                    alert('取消第二票')
                }
                //收回第三票
                if(document.cookie.indexOf(`${this.$store.state.member_id}-1`)!=-1&&document.cookie.indexOf(`${this.$store.state.member_id}-2`)!=-1&&document.cookie.indexOf(`${this.$store.state.member_id}-3`)!=-1){
                    document.cookie = `${this.$store.state.member_id}-3=Mike222=;expires=${(new Date(0)).toGMTString()}`;
                    cake.choose = 0;
                    cake.VOTING_NUM--
                    alert('取消第三票')
                }
                
            }
            // 將投票資訊送出
            let data = new URLSearchParams();
            data.append('id',cake.CAKE_ID)
            data.append('vote',cake.VOTING_NUM)
            axios({
        method: "post",
        url: "http://localhost/static/cty_api/update_card_vote_num.php",
        // headers: {
        //   "Content-Type": "application/x-www-form-urlencoded",
        // },
        data: data,
      })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
            }
        }
      ,

      page(){
        axios({
      method: "get",
      url: "http://localhost/static/cty_api/quire_num_vote_cake.php",
    }).then((res) => {
      // console.log(res.data);
      let pages = Math.ceil(res.data / 10);
      for (let i = 1; i <= pages; i++) {
        this.pages.push(i);
      }
    });
      },
        getDataNumber(index) {
      window.scrollTo(0, 0);
      const params = new URLSearchParams();
      params.append("page", index);
      axios({
        method: "post",
        url: "http://localhost/static/cty_api/quire_vote_cake.php",

        data: params,
      })
        .then((res) => {
          // console.log(res.data);
          this.vote_cake = res.data
          for(let i =0;i<this.vote_cake.length;i++){
            this.vote_cake[i].choose=0
          }
        })
        .catch((error) => {
          // console.log(error);
        });
    },
    changeItem(choose,choose_flavor){
      if(choose.length!=0||choose_flavor.length!=0){
      const data = new URLSearchParams();
      data.append('ingredient',choose)
      data.append('flavor',choose_flavor)
      axios({
        method:"POST",
        url:"http://localhost/static/cty_api/select_cake.php",
        data,
      }).then((res)=>{
        console.log(res.data);
        this.vote_cake=res.data
        for(let i =0;i<this.vote_cake.length;i++){
          this.vote_cake[i].choose=0
        }
        this.pages = []
      }).catch((error)=>{
        // console.log(error);
      })
      }else{
        this.page()
        const params = new URLSearchParams();
    params.append("page", this.sn - 1);
    this.$axios({
      method: "POST",
      url: "http://localhost/static/cty_api/quire_vote_cake.php",
      data: params,
    }).then((res) => {
      console.log(res.data);
      this.vote_cake = res.data
      for(let i =0;i<this.vote_cake.length;i++){
        this.vote_cake[i].choose=0
      }
    });
    
      }
    }
    },
    computed:{
        sn() {
      return this.$route.params.sn;
    },

    },
    mounted(){
      // 取得前三名
        axios({
          method:"GET",
          url:'http://localhost/static/cty_api/quire_topThree.php',

        }).then((res)=>{
          // console.log(res);
          this.topthree = res.data
        }).catch((res)=>{
          // console.log(res);
        });
      // 取得活動資訊
      axios({
        method:"GET",
        url:'http://localhost/static/cty_api/quire_vote_information.php'
      }).then((res)=>{
        // console.log(res);
        this.vote_info = res.data[0]
      }).catch((error)=>{
        // console.log(error);
      });
      // 生成頁數
      this.page();
    // 請求當頁資料
    const params = new URLSearchParams();
    params.append("page", this.sn - 1);
    this.$axios({
      method: "POST",
      url: "http://localhost/static/cty_api/quire_vote_cake.php",
      data: params,
    }).then((res) => {
      // console.log(res.data);
      this.vote_cake = res.data
      for(let i = 0;i<this.vote_cake.length;i++){
        this.vote_cake[i].choose=0
      }
    });
    },

    
}

</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
  box-sizing: border-box;
}
$bg: #efe6e4;
#vote_page_main_bar {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  > div {
    margin-top: 100px;
  }
  p {
    // width:550px;
    text-align: center;
    margin-top: 35px;
    font-size: 16px;
    line-height: 32px;
    margin-bottom: 100px;
    color: #515151;
    span {
      display: block;
    }
  }
}
#vote_page_main {
  width: 100%;
  max-width: 1120px;
  margin: 0 auto;
}

.nowRange {
  width: 100%;
  justify-content: flex-start;
  display: flex;
  margin-bottom: 100px;
  align-items: center;
  margin-bottom: 100px;
  img {
    width: 35px;
    height: 35px;
    margin-right: 10px;
    display: inline-block;
  }
}
.vote_title {
  width: 100%;
  justify-content: space-between;
  display: flex;
  margin-bottom: 100px;
  align-items: center;
  span {
    display: flex;
    align-items: center;
  }
  img {
    width: 35px;
    height: 35px;
    margin-right: 10px;
    display: inline-block;
  }
}
@media all and (max-width:576px){
    .vote_title{
        flex-direction: column;
        span{
            margin-bottom:20px;
        }
    }
}
#topthree {
  display: grid;
  gap: 35px;
  margin-bottom: 100px;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
}
@media (min-width: 576px) and (max-width: 870px) {
  #topthree {
    display: grid;
    gap: 35px;
    grid-template-areas: "one one" "second third";
    div.vote_topthree:nth-child(1) {
      grid-area: one;
      transform: scale(1.1);
      
    }
    div.vote_topthree:nth-child(2) {
      grid-area: second;
    }
    div.vote_topthree:nth-child(3) {
      grid-area: third;
    }
  }
}
// 以下為參賽作品
section#vote {
  width: 100%;
  max-width: 1120px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 60px 25px;
  justify-content: space-between;
  margin-bottom: 80px;
  .card_outline {
    width: 100%;
    max-width: 350px;
    margin: 0 auto;
    .img_container {
      width: 100%;
      height: auto;
    }
  }
}
// 以下前三名
div.vote_topthree {
  border-radius:10px;
      // overflow:hidden;
  margin: 0 auto;
  display: inline-block;
  position: relative;
  background-color: #f7edd4;
  color: #515151;
  .topthree_hat {
    position: absolute;
    width: 110px;
    height: 110px;
    left: -20px;
    top: -50px;
    transform: rotate(-15deg);
  }
  .pic_cake {
    height: 260px;
  }
  > div {
    padding: 10px;
    h1 {
      margin: 0;
    }
    p {
      margin: 0;
    }
  }
}
ul {
  margin: 0;
  margin-bottom: 50px;
  padding: 0;
  list-style: none;
  display: flex;
  gap: 20px;
  align-items: center;
  justify-content: center;
  a {
    font-size: 16px;
    text-decoration: none;
    color: #515151;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background: white;
    &:hover {
      background: black;
      color: white;
    }
  }
}

.card_outline2{
    box-sizing: border-box;
    margin:0 auto;
    background-color: #DFB9B0;
    width: 350px;
    height: 480px;
    padding: 25px;
    border-radius: 7px;
    .img_container{
        overflow: hidden;
        width: 300px;
        height: 300px;
        margin: 0 auto;
        img{
            height: 100%;
            width: 100%;
        }
    }
    .down_block{
        .cake_title{
            margin: 15px 0;
            text-align: left;
            font-size: 20px;
            line-height: 20px;
            color: #515151;
            font-weight: 400;
        }
        .design_idea{
            margin: 0;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 16px;
            line-height: 16px;
            color: #515151;
        }
        .voting_area{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            .voting_num{
                margin-top: 35px;
                .heart_icon{
                    @extend %heart_icon;
                }
                .num{
                    font-size: 20px;
                    vertical-align: top;
                    line-height: 25px;
                    color: #515151;
                }
            }
            .voting{
                margin-top: 15px;
                width: 180px;
                height: 60px;
                border-radius: 100px;
                border: 0;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
                font-size: 20px;
                position: relative;
                color: #515151;
                cursor: pointer;
                background-color: #EFE6E4;
                &:hover{
                    background-color: #F4E9C9;
                }
                
                span{
                    @extend %heart_icon;
                    position: absolute;
                    right: 15px;
                    top: 30px;
                    transform: translateY(-50%);
                }
            }
            .voting.check{
                box-shadow: inset $shadow;
                background: #F4E9C9;
            }
        }
    }
}

// 設定愛心的背景圖
%heart_icon{
    background-image: url('../assets/images/favorites_icon_1.svg');
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center center;
    display: inline-block;
    height: 22px;
    width: 22px;
}
</style>