<template>
  <div>
    <behind-header thistitle="蛋糕製作管理"></behind-header>
      <main>
      <section id="search_site">
        <selectBar></selectBar>
        <search-bar></search-bar>
      </section>
      <section class="cake_data">
        <cakeData></cakeData>
        <div class="outline close" v-for="(data,index) in theFlavor" :key="index">
    <div class="img_outline">
      <img src="../assets/images/cho_cake.jpg" alt="" />
      <button>修改圖片</button>
    </div>

    <div class="text_outline">
      <div class="left_text">
        <div>
          <p>名稱：</p>
          <p>{{data.name}}</p>
        </div>
        <div>
          <p>ID：</p>
          <p>{{data.id}}</p>
        </div>
        <div>
          <p>價格：</p>
          <p>{{data.prize}}</p>
        </div>
      </div>
      <div class="right_text">
        <div>
          <p>種類：</p>
          <select name="" id="">
            <option value="" :selected="data.type == 1">水果</option>
            <option value="" :selected="data.type == 0">巧克力</option>
          </select>
        </div>
        <div id="text_area">
          <p>描述：</p>
          <textarea name="" id="" cols="30" rows="6" v-model="data.description"></textarea>
        </div>
      </div>
    </div>
    <div class="button_outline">
      <div class="button_upsite">
        <span class="switch_button" @click="change(index)">
    <label for="" style="margin-right:3px;">狀態</label>
    <div class="switch" id="outline" :class="{'-on':data.status}">
    <span class="circle" id="circle" :class="{'-on':data.status}"></span>
    </div>
    <!--按鈕開關-->
</span>
        <font-awesome-icon
          icon="fa-solid fa-sort-down"
          class="open_button"
          @click="open"
        />
      </div>
      <div class="button_downsite">
        <button>修改</button>
        <button>確認</button>
      </div>
    </div>
  </div>
      </section>
      </main>
    </div>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
import selectBar from "../components/select_bar";
import cakeData from '../components/behind_cake_make_data';

import axios from 'axios';
import qs from 'qs';

export default {
  name: "cake_make_manager",
  components: {
    behindHeader,
    searchBar,
    selectBar,
    cakeData,
    
  },
  data() {
    return {
      showWhat: '',
      flavor: 1,
      ingredient: 1,
      theFlavor:[],
      // theFlavor: {
      //   id:this.$store.state.id,
      //   name:'',
      //   description:'',
      //   img:'',
      //   price:'',
      //   category:'',
      //   available:'',
      // }
    };
  },
  methods: {
    change(index){
        let i =  this.data[index].status;
        this.data[index].status = this.data[index].status?0:1
          return index;
    },
    open: function (e) {
      // console.log($(e.target).parents(".outline").siblings());
      $(e.target).parents(".outline").siblings().addClass("close");
      $(e.target).parents(".outline").toggleClass("close");
    },
  },
  computed:{
    data(){
      return this.$store.state.cake_make_data
    }
  },
  mounted(){
    $("#cake").siblings().removeClass("target");
    $("#cake").addClass("target");

    // select糕體
    axios.post("http://localhost/melody_php/select_flavor.php", qs.stringify({flavorId: this.flavor}))
      .then(res => {
        let theFlavor = res["data"];
        console.log(theFlavor);
      })
      .catch(err => console.log(err));

    // select配料&裝飾
    axios.post("http://localhost/melody_php/select_ingredient.php", qs.stringify({ingredientId: this.ingredient}))
      .then(res => {
        let data = res["data"];
        console.log(data);
      })
      .catch(err => console.log(err));

  },
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
main{
  margin:0 auto;
  margin-top:80px;
  width:1000px;
  display:flex;
  flex-direction: column;
}
#search_site{
  display:flex;
  justify-content: space-between;
  margin-bottom:30px;
}
  .cake_data{
    display:grid;
    grid-template-columns: 1fr;
    gap:30px;
    // height: 1000px;
    // border: solid 1px #515151;
  }
.outline {
  // border: solid 1px #515151;
  display: flex;
  width: 1000px;
  height: 180px;
  padding: 20px;
  background: #f7dcdc;
  position:relative;
  border-radius: 5px;
  transition: 0.3s;
  .img_outline {
    position:relative;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    button{
      position:absolute;
      right:0;
      bottom:0;
      width:100px;
      height:40px;
      font-size: 20px;
      box-shadow: $shadow;
      cursor:pointer;
      background: #515151;
      color:white;
      border-radius:5px;
      &:active{
        box-shadow: inset $shadow;
      }
    }
  }
}
select{
  background: white;
}
.text_outline {
  flex: 4;
  display: flex;
  justify-content: space-between;
  .right_text,
  .left_text {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    div {
      display: grid;
      grid-template-columns: 1fr 4fr;
      p {
        margin: 0;
        padding-left: 10px;
      }
      textarea {
        resize: none;
        width: 100%;
        height: 100%;
        background: white;
      }
    }
  }
  .left_text {
    padding-left: 20px;
  }
}
.button_outline {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  .button_upsite {
    display: flex;
    justify-content: space-around;
    .open_button {
      cursor: pointer;
      transform: rotate(180deg);
      transition: 0.3s;
    //   margin-top:10px;
    position:absolute;
    right:20px;
    font-size:24px;
    }
  }
  .button_downsite {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    button {
      width: 100px;
      height: 20px;
      margin-top: 10px;
      border-radius: 20px;
      border: none;
      background: #454545;
      color: white;
      cursor: pointer;
      &:active {
        box-shadow: inset $shadow;
      }
    }
  }
}
.outline.close {
  height: 50px;
  overflow: hidden;
  line-height: 32px;
  justify-content: flex-start;
  align-items: flex-start;
  padding: 10px;
  .img_outline {
    display: none;
  }
  .text_outline {
    #text_area {
      display: none;
    }
  }
  .button_upsite {
    justify-content: space-around;
    align-items: center;
    .open_button {
        margin-bottom:10px;
      transform: rotate(0deg);
    }
  }
  .button_downsite {
    display: none;
  }
}
.switch_button{
    display: flex;
    align-items: center;
    // justify-content: space-evenly;
  }
.switch {
margin-left: 5px;
width: 40px;
height: 25px;
border-radius: 10px;
display: flex;
align-items: center;
border-radius: 20px;
background-color: #454545;
position: relative;
cursor: pointer;
    .circle {
        width: 20px;
        height: 20px;
        border-radius: 100px;
        background-color: white;
        display: inline-block;
        position: relative;
        left: 2px;
        // left: 14px;
        transition:.5s;
    }
}
.circle.-on{
    left: 18px;
    transition: .5s;
}
.switch.-on{
    
    transition: .5s;
    background-color: green;
}
</style>