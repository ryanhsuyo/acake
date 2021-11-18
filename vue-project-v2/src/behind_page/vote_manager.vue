<template>
  <div>
    <behind-header thistitle="投票系統管理" style="zIndex:2"></behind-header>
    <main style="zIndex:1">
      <section id="left_section">
        <!-- <div class="select_option"></div> -->
        <div
          id="runOrStop"
          class="select_option"
          @click="showWhat = 'runOrStop'" style="margin-top:75px"
        >
          <h1>舉辦或取消票選活動</h1>
        </div>
        
      </section>
      <diV id="content">
      <section id="right_section" :is="showWhat" @runEvent="event" @back="back">
        
      </section>
      </diV>
    </main>
  </div>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
import runOrStop from './behind_component_runOrStop_page';
import newEvent from './behind_component_newEvent_page';

export default {
  name: "vote_manager",
  components: {
    behindHeader,
    searchBar,
    runOrStop,
  },
  data() {
    return {
      showWhat: 'runOrStop',
    };
  },
  methods: {
    event(){
      this.showWhat = newEvent
    },
    back(){
      this.showWhat=runOrStop
    }
  },
  mounted(){
      $("#vote").siblings().removeClass("target");
    $("#vote").addClass("target");
  },
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
main {
  display: grid;
  grid-template-columns: 280px 3fr;
  top:-20px;
  position:relative;
}
#left_section{
  background:#F0D5CE;
  position:sticky;
  top:80px;
  height:calc(100vh - 80px);
  overflow-y: auto;
  .select_option {
    height: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    position:relative;
    color:#515151;
    cursor: pointer;
    &:hover{
      background: #DFB9B0;
    }
    &:after{
      content:'';
      position:absolute;
      width:80%;
      left:50%;
      transform: translate(-50%);
      bottom:0;
      height:1px;
      background:black;
    }
    &:nth-child(1){
      &:before{
      content:'';
      position:absolute;
      width:80%;
      left:50%;
      transform: translate(-50%);
      top:0;
      height:1px;
      background:black;
    }
    }
  }
    .select_option.target{
        background: #DFB9B0;
    }
}
#right_section {
  padding:70px 100px;
  width:920px;
  margin:0 auto;
  .title {
    display: flex;
    justify-content: space-between;
  }
}
#content{
  display:flex;
  justify-content: center;
  align-items:center;
}
</style>