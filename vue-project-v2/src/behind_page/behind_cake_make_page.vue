<template>
  <div>
    <behind-header thistitle="蛋糕製作管理"></behind-header>
      <main>
      <section id="search_site">
        <!-- <selectBar></selectBar> -->
        <!-- selectBar -->
        <select name="" id="select_box" v-model='choose' :style="{opacity:'70%'}">
            <option value="model">糕體</option>
            <option value="fruits">配料</option>
            <option value="decorations">裝飾</option>
        </select>
        <!-- selectBar -->
        <search-bar :style="{opacity:'70%'}"></search-bar>
      </section>
      <section class="cake_data">
        <!-- <p>{{newFlavor}}</p> -->
        <!-- <p>{{theFlavor}}</p> -->
        <!-- <p>{{theIngredient}}</p> -->
        <!-- <cakeData></cakeData> -->
        <!-- <img :src="newFlavor.img" alt=""> -->

        <div id="new_cake" v-show="!newbox">
          <font-awesome-icon
            icon="fa-solid fa-square-plus"
            id="plus"
            @click="newbox = !newbox"
          />
        </div>
        <!-- 新增物件 -->
      <div class="outline" v-show="newbox">
      <div class="img_outline">
        <!-- <img src="" alt="" /> -->
        <img src="../assets/images/add_icon.svg" alt="" id="new_cake_img"/>
        <button @click="newClickInput($event)">上傳圖片</button>
        <input
                  type="file"
                  style="display: none"
                  class="imageButton"
                  @click="setNewImage()"
                />
      </div>

    <div class="text_outline">
      <div class="left_text">
        <div>
          <p>名稱：</p>
          <input class="new_name" type="text" v-model="newFlavor.name"/>
          <!-- <p>{{data.INGREDIENT_NAME}}</p> -->
        </div>
        <div>
          <p>ID：</p>
          <p>{{newFlavor.id}}</p>
          <!-- <input class="new_id" type="text" v-model="newFlavor.id"/> -->
        </div>
        <div>
          <p>價格：</p>
          <!-- <p>{{data.PRICE}}</p> -->
          <input class="new_price" type="text" v-model="newFlavor.price"/>
        </div>
      </div>
      <div class="right_text">
        <div>
          <p>種類：</p>
          <select name="" id="" v-model="newFlavor.category">
            <option :value='parseInt(1)'>糕體</option>
            <option :value='parseInt(2)'>水果</option>
            <option :value='parseInt(3)'>裝飾</option>
          </select>
        </div>
        <div id="text_area">
          <p>描述：</p>
          <textarea name="" id="" cols="30" rows="6" v-model="newFlavor.description"></textarea>
        </div>
      </div>
    </div>
    <div class="button_outline">
      <div class="button_upsite">
         <span class="switch_button" @click="change(index)">
    <label for="" style="margin-right:3px;">狀態</label>
    <div class="switch" id="outline" >
    <span class="circle" id="circle" ></span>
    </div>
    <!--按鈕開關-->
</span>
        <!-- <font-awesome-icon
          icon="fa-solid fa-sort-down"
          class="open_button"
          @click="open"
        /> -->
      </div>
      <div class="button_downsite">
        <button @click="sendData()">確認送出</button>
      </div>
    </div>
  </div>
        <!---------------------------------- 新增物件 ---------------------------------- >


        <!-- theFlavor 蛋糕部分 -->
        <div class="outline close" v-for="(data,index) in theFlavor" :key="index" v-if="choose=='model'">
      <div class="img_outline">
        <img :src="data.IMG" alt="" class="cake_make_image" />
        <button @click="clickInput(index, $event, data)">修改圖片</button>
        <input type="file" style="display: none" class="imageButton" @click="setImage()">
      </div>

    <div class="text_outline">
      <div class="left_text">
        <div>
          <p>名稱：</p>
          <!-- <p>{{data.NAME}}</p> -->
          <input class="name" type="text" v-model="data.NAME"/>
        </div>
        <div>
          <p>ID：</p>
          <p>{{data.ID}}</p>
          <!-- <input class="id" type="text" v-model="data.ID"/> -->
        </div>
        <div>
          <p>價格：</p>
          <!-- <p>{{data.PRICE}}</p> -->
          <input class="price" type="text" v-model="data.PRICE"/>
        </div>
      </div>
      <div class="right_text">
        <div>
          <p>種類：</p>
          <select name="" id="">
            <option :selected="data.CATEGORY=='1'">糕體</option>
            <option :selected="data.CATEGORY=='2'">水果</option>
            <option :selected="data.CATEGORY=='3'">裝飾</option>
          </select>
        </div>
        <div id="text_area">
          <p>描述：</p>
          <textarea name="" id="" cols="30" rows="6" v-model="data.DESCRIPTION"></textarea>
        </div>
      </div>
    </div>
    <div class="button_outline">
      <div class="button_upsite">
        <span class="switch_button" @click="change(index)">
    <label for="" style="margin-right:3px;">狀態</label>
    <div class="switch" id="outline" :class="{'-on':data.AVAILABLE=='1'}" @click="changeStatus(data);updateData(data)">
      <!-- :class="{'-on':data.status} -->
    <span class="circle" id="circle" :class="{'-on':data.AVAILABLE=='1'}" ></span>
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
        <!-- <button>修改</button> -->
        <button @click="updateData(data)">確認修改</button>
      </div>
    </div>
  </div>
        <!-- theFlavor 蛋糕部分 -->

        <!-- theFlavor 水果部分 -->
        <div class="outline close" v-for="(data,index) in theIngredient2" :key="index" v-if=" choose == 'fruits'">
      <div class="img_outline">
        <img :src="data.IMG" alt="" class="cake_make_image"/>
        <button @click="clickInput(index, $event, data)">修改圖片</button>
        <input type="file" style="display: none" class="imageButton" @click="setImage()" @change="pushImage">
      </div>

    <div class="text_outline">
      <div class="left_text">
        <div>
          <p>名稱：</p>
          <!-- <p>{{data.INGREDIENT_NAME}}</p> -->
          <input class="name" type="text" v-model="data.INGREDIENT_NAME"/>
        </div>
        <div>
          <p>ID：</p>
          <p>{{data.INGREDIENT_ID}}</p>
        </div>
        <div>
          <p>價格：</p>
          <!-- <p>{{data.PRICE}}</p> -->
          <input class="name" type="text" v-model="data.PRICE"/>
        </div>
      </div>
      <div class="right_text">
        <div>
          <p>種類：</p>
          <select name="" id="">
            <option value="" :selected="data.CATEGORY == '2'">水果</option>
            <option value="" :selected="data.CATEGORY == '1'">糕體</option>
            <option value="" :selected="data.CATEGORY == '3'">裝飾</option>
          </select>
        </div>
        <div id="text_area">
          <p>描述：</p>
          <textarea name="" id="" cols="30" rows="6" v-model="data.DESCRIPTION"></textarea>
        </div>
      </div>
    </div>
    <div class="button_outline">
      <div class="button_upsite">
        <span class="switch_button" @click="change(index)">
    <label for="" style="margin-right:3px;">狀態</label>
    <!-- 叫庭揚修 -->
    <div class="switch" id="outline" :class="{'-on':1}" @click="changeStatus2(data);updateData(data)">
    <span class="circle" id="circle" :class="{'-on':1}"></span>
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
        <!-- <button>修改</button> -->
        <button @click="updateData(data)">確認修改</button>
      </div>
    </div>
  </div>
        <!-- theFlavor 水果部分 -->

        <!-- theFlavor 裝飾部分 -->
        <div class="outline close" v-for="(data,index) in theIngredient3" :key="index" v-if="choose == 'decorations'">
      <div class="img_outline">
        <img :src="data.IMG" alt="" class="cake_make_image"/>
        <button @click="clickInput(index, $event, data)">修改圖片</button>
        <input type="file" style="display: none" class="imageButton" @click="setImage()">
      </div>

    <div class="text_outline">
      <div class="left_text">
        <div>
          <p>名稱：</p>
          <!-- <p>{{data.INGREDIENT_NAME}}</p> -->
          <input class="name" type="text" v-model="data.INGREDIENT_NAME"/>
        </div>
        <div>
          <p>ID：</p>
          <p>{{data.INGREDIENT_ID}}</p>
        </div>
        <div>
          <p>價格：</p>
          <!-- <p>{{data.PRICE}}</p> -->
          <input class="name" type="text" v-model="data.PRICE"/>
        </div>
      </div>
      <div class="right_text">
        <div>
          <p>種類：</p>
          <select name="" id="">
            <option value="" :selected="data.CATEGORY == '1'">糕體</option>
            <option value="" :selected="data.CATEGORY == '2'">水果</option>
            <option value="" :selected="data.CATEGORY == '3'">裝飾</option>
          </select>
        </div>
        <div id="text_area">
          <p>描述：</p>
          <textarea name="" id="" cols="30" rows="6" v-model="data.DESCRIPTION"></textarea>
        </div>
      </div>
    </div>
    <div class="button_outline">
      <div class="button_upsite">
        <span class="switch_button" @click="change(index)">
    <label for="" style="margin-right:3px;">狀態</label>
    <div class="switch" id="outline" :class="{'-on':1}" @click="changeStatus2(data);updateData(data)">
    <span class="circle" id="circle" :class="{'-on':1}"></span>
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
        <!-- <button>修改</button> -->
        <button @click="updateData(data)">確認修改</button>
      </div>
    </div>
  </div>
        <!-- theFlavor 裝飾部分 -->
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
      newbox: false,
      forSearch: "",
      showWhat: '',
      flavor: 1,
      ingredient: 1,
      theFlavor:[],
      // theIngredient:[],
      theIngredient2:[],
      theIngredient3:[],
      choose:'model',
      // choose:this.theFlavor,
      newFlavor: {
        name:'',
        description:'',
        img:'',
        price:'',
        category:1,
        available:1,
      },
      // newIngredient: {
      //   name:'',
      //   description:'',
      //   img:'',
      //   price:'',
      //   category:'',
      //   available:1,
      // },
    };
  },
  methods: {
    changeStatus(value){
      // console.log(value)
      console.log(value.AVAILABLE)
      if(value.AVAILABLE == 1){
        value.AVAILABLE =0
      }else{
        value.AVAILABLE =1
      }
    },
    changeStatus2(value){
      // console.log(value)
      console.log(value.INGREDIENT_AVAILABLE)
      if(value.INGREDIENT_AVAILABLE == 1){
        value.INGREDIENT_AVAILABLE =0
      }else{
        value.INGREDIENT_AVAILABLE =1
      }
    },
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

    // ---------------- 上傳照片 ----------------
    newClickInput($event){
      let file = $event.target.nextSibling.nextSibling;
      file.click();
    },
    setNewImage(){
      let button =
        document.querySelectorAll("input[type='file']")[0];
      button.onchange = this.pushNewImage;
    },
    pushNewImage(){
      let that = this;
      let file = document.querySelectorAll("input[type='file']")[0].files[0];
      
      let readFile = new FileReader();
      // console.log(readFile.readAsBinaryString(file));
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", function () {
        let image = document.getElementById("new_cake_img");
        // console.log(readFile.result);
        image.src = readFile.result;
        that.newFlavor.img = readFile.result;
      })
    },
    // ---------------- 新增配料 ----------------
    sendData(){
      
      if (this.newFlavor.category == 1) {
        
        axios.post("./static/melody_php/new_flavor.php", qs.stringify({
        name: this.newFlavor.name,
        description: this.newFlavor.description,
        img: this.newFlavor.img,
        price: this.newFlavor.price,
        // category: this.newFlavor.category,
        // available: this.newFlavor.available,
        })).then((res)=>{
          console.log(res.data);
        }).catch((error)=>{
          console.log(error);
        })

      } else {
        
        axios.post("./static/melody_php/new_ingredient.php", qs.stringify({
        name: this.newFlavor.name,
        description: this.newFlavor.description,
        img: this.newFlavor.img,
        price: this.newFlavor.price,
        category: this.newFlavor.category,
        // available: this.newFlavor.available,
        })).then(res => {
          // this.newFlavor = res.data;
          // let data = res["data"];
          console.log(res.data);
        })
        .catch(err => console.log(err));

      }
      alert('已新增完成');

    },
    // ---------------- 修改配料 ----------------
    updateData(data){
      if (data.CATEGORY == undefined) {
        
        axios.post("./static/melody_php/update_flavor.php", qs.stringify({
        id: data.ID,
        name: data.NAME,
        description: data.DESCRIPTION,
        status:data.AVAILABLE,
        // img: data.IMG,
        price: data.PRICE,
        // category: this.newFlavor.category,
        // available: this.newFlavor.available,
        })).then((res)=>{
          console.log(res.data);
          console.log(data);
          console.log(data.CATEGORY);
        }).catch((error)=>{
          console.log(error);
        })

      } else {
        
        axios.post("./static/melody_php/update_ingredient.php", qs.stringify({
        id: data.INGREDIENT_ID,
        name: data.INGREDIENT_NAME,
        description: data.INGREDIENT_DESCRIPTION,
        img: data.IMG,
        status:data.INGREDIENT_AVAILABLE,
        // price: data.PRICE,
        category: data.CATEGORY,
        // available: this.newFlavor.available,
        })).then(res => {
          // this.newFlavor = res.data;
          // let data = res["data"];
          console.log(res.data);
          console.log(data);
          console.log(data.CATEGORY);
        })
        .catch(err => console.log(err));

        // let data= new URLSearchParams();
        // data.append('name':this.theI)
      };
      alert('已更新完成');
    },
    // ---------------- 更新照片 ----------------
    clickInput(index, $event,data) {
      let file = $event.target.nextSibling.nextSibling;
      this.theIndex = index;
      this.newFlavor = data;
      file.click();
    },
    setImage() {
      let button = document.querySelectorAll("input[type='file']")[this.theIndex+1];
      button.onchange = this.pushImage;
      // console.log(button);
      // console.log(this.newFlavor);
      // console.log(this.theIndex);
      // console.log(data);
      // alert(data);
    },
    pushImage() {
      console.log(111)
      let that = this;
      let index = this.theIndex;
      let file =
      document.querySelectorAll("input[type='file']")[this.theIndex+1].files[0];
      this.imgData = file;
      let readFile = new FileReader();
      // console.log(readFile.readAsBinaryString(file));
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", function () {
        let image = document.getElementsByClassName("cake_make_image")[index];
        // console.log(readFile.result);
        image.src = readFile.result;
        // that.data.IMG = readFile.result;
        // console.log(that.data.CATEGORY);
        // alert(that.data);

        if (that.newFlavor.CATEGORY == undefined) {
        
        axios.post("./static/melody_php/update_flavor_img.php", qs.stringify({
        id: parseInt(that.newFlavor.ID),
        img: readFile.result,
        })).then((res)=>{
          console.log(res.data);
        }).catch((error)=>{
          console.log(error);
        })

      } else {
        
        axios.post("./static/melody_php/update_ingredient_img.php", qs.stringify({
        id: that.newFlavor.INGREDIENT_ID,
        img: readFile.result,
        category: that.newFlavor.CATEGORY,
        })).then(res => {
          console.log(res.data);
        })
        .catch(err => console.log(err));
      };

      });
      // 寫進資料庫
      alert('圖片已修改完成');
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
    axios.post("./static/melody_php/select_flavor.php", qs.stringify({
      flavorId: this.flavor,
      
      }))
      .then(res => {
        this.theFlavor = res.data;
        // let theFlavor = res["data"];
        console.log(this.theFlavor);
      })
      .catch(err => console.log(err));

    // select配料
    axios.post("./static/melody_php/select_ingredient.php", qs.stringify({
      ingredientId: 2}))
      .then(res => {
        this.theIngredient2 = res.data;
        // let data = res["data"];
        console.log(theIngredient);
      })
      .catch(err => console.log(err));

    // select裝飾
    axios.post("./static/melody_php/select_ingredient.php", qs.stringify({
      ingredientId: 3}))
      .then(res => {
        this.theIngredient3 = res.data;
        // let data = res["data"];
        console.log(theIngredient);
      })
      .catch(err => console.log(err));

  },
   watch: {
    forSearch: {
      handler: function (newValue) {
        this. $emit("selectData", newValue);
      },
      deep: true,
    },
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
    width: 140px;
    height: 140px;
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
      input{
        margin: 0;
        padding-left: 10px;
      }
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
  input.id{
    display: none;
  }
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

// selectBar
select#select_box {
  width: 400px;
  max-width: 100%;
  height: 50px;
  border-radius: 100px;
  border: none;
  padding: 0 30px;
  opacity: 70%;
  background: rgba(255, 255, 255, 1);
  box-shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
  font-size: 20px;
  cursor: pointer;
  // color:red;
  &:focus {
    border: none;
  }
}

// 新增配料的卡片
#new_cake {
  width: 1000px;
  height: 250px;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #f0d5ce;
  border-radius: 5px;
  margin-top: 70px;
  .fa-square-plus {
    color: white;
    font-size: 200px;
    cursor: pointer;
  }
}
img.new_cake_img{
  width: 200px;
  height: 200px;
  object-fit: cover;
}
</style>