<template>
    <div>
        <headercom voteon=1 qaon=0 saleon=0 cakeon=0></headercom>
        <div id="vote_page_main_bar">
            <titleh1 title="主廚推薦"></titleh1>
            <p>
                <span>「老母辛苦了！！」母親節檔期活動</span>

        對媽媽的愛要大聲說，一份專屬於媽媽特別的愛，快來秀出你的創意讓大家看到

        <span>活動期間：2021/4/16~2021/6/15</span>
      </p>
    </div>
    <main id="vote_page_main">
      <h1 class="nowRange">
        <img src="../assets/images/jellyfish_single.svg" alt="" />現在排名
      </h1>
      <section id="topthree">
        <div class="vote_topthree" v-for="(three,index) in 3" :key="index">
          <img
            :src="require('@/assets/images/chefHatNo'+(index+1)+'.png')"
            alt=""
            class="topthree_hat"
          />
          <img src="../assets/images/cho_cake.jpg" alt="" class="pic_cake" />
          <div>
            <h1>巧克力蛋糕</h1>
            <p>Chocolate cake</p>
          </div>
        </div>
        
      </section>
      <cake-selector
        :total_decorations="total_decorations"
        :total_ingredients="total_ingredients"
        :total_cakebodys="total_cakebodys"
        
      ></cake-selector>
      <!-- <div id="select_test"></div> -->
      <h1 class="vote_title">
        <span
          ><img
            src="../assets/images/jellyfish_single.svg"
            alt=""
          />候選名單</span
        >
        <search-bar></search-bar>
      </h1>
      <section id="vote">
        <card-voting v-for="(cake_name, index) in 9" :key="index"></card-voting>
      </section>
      <pageSelect style="margin-bottom: 70px"></pageSelect>
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
export default {
  name: "votePage",
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
        
    },
    watch:{
        
    },
    computed:{
        

    },
    mounted(){
        
    },

    
}

</script>
<style scoped lang="scss">
// @import "../assets/style/var.scss";
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
  margin: 0 auto;
  display: inline-block;
  position: relative;
  background-color: #f7edd4;
  color: #515151;
  .topthree_hat {
    position: absolute;
    width: 110px;
    height: 110px;
    border: 1px solid red;
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



</style>