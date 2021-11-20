<template>
  <div>
    <behind-header thistitle="商城管理" style="zIndex:2;"></behind-header>
    <main style="zIndex:1">
      <section id="top_section">
        <!-- <div class="select_option"></div> -->
        <div
          id="chefCake"
          class="select_option"
          @click="showWhat = 'chefCake'"
        >
          <h1>主廚推薦</h1>
        </div>
        <div
          id="ideaCake"
          class="select_option"
          @click="showWhat = 'ideaCake'"
        >
          <h1>創意點子</h1>
        </div>
        <div id="plus" class="select_option" @click="showWhat = 'plus'">
          <h1>加購商品</h1>
        </div>
      </section>
      <diV id="content">
      <section id="bottom_section" :is="showWhat">
        
      </section>
      </div>
    </main>
  </div>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
import chefCake from './behind_component_chef_cake'
import ideaCake from './behind_component_idea_cake'
import plus from './behind_component_plus'
export default {
  name: "behind_shop_manager",
  components: {
    behindHeader,
    searchBar,
    chefCake,
    ideaCake,
    plus,
  },
  data() {
    return {
      showWhat: 'chefCake',
    };
  },
  methods: {},
  mounted(){
      $("#shop").siblings().removeClass("target");
    $("#shop").addClass("target");
  },
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
#top_section{
    display:flex;
    justify-content: center;
    align-items: center;
    margin-top:60px;
    >div{
        width:300px;
        text-align: center;
        background: #F0D5CE;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: $shadow;
        margin:0 1px;
        h1{
            margin:0;
        }
    }
    >div.target{
        background: #DFB9B0;
    }
}
</style>