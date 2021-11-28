<template>
  <section id="bottom_section">
    <div class="title">
      <h1>加購區</h1>
      <!-- <searchBar></searchBar> -->
    </div>
    <div class="cake" >
      <div class="outline close" @click="open()">
        <div class="img_outline">
          <img src="../assets/images/add_icon.svg" alt="" id="new_cake_img"/>
          <button @click="newClickInput($event)">
            修改照片
          </button>
          <input
            type="file"
            style="display: none"
            class="imageButton"
            @click="setNewImage()"
          />
        </div>
        <div class="text_outline">
          <div class="infor">
            <div class="left_infor">
              <div class="first">
              <p>商品ID：</p>
              <input type="text"  disabled >
              </div>
              <div class="second">
                <p>商品名稱：</p>
                <input type="text" v-model="newPlus.newPlusName">
              </div>
              <!-- <div class="third">
                <p>吋數:</p>
                <select name="" id="" v-for="(size, index) in result" :key="index">
                  <option>{{size}}吋</option>
                </select>
              </div>
              <div class="forth">
                <p>糕體口味：</p>
                <select name="" id="" v-model="newChefCake.newCakeFlavor">
                  <option :value="flavor.ID" v-for="(flavor,indexxx) in allFlavor" :key="indexxx">{{flavor.NAME}}</option>
                </select>
              </div> -->
            </div>
            <div class="right_infor">
              <div class="first">
                <p>狀態：</p>
                <select name="" id="">
                  <!-- <option value="" :selected="chefCake.AVAIABLE == 1">上架</option>
                  <option value="" :selected="chefCake.AVAIABLE == 0">下架</option> -->
                </select>
              </div>
                <div class="second">
                <p>價格：</p>
                <input type="text" v-model="newPlus.newPlusPrice">
              </div>
              <!-- <div class="third">
                <p>10吋價格：</p>
                <p>等下</p>
              </div> -->

            <!-- <div class="ingredient" v-for="(name, index) in chefCake.INGREDIENT_NAME" :key="index">
              <input class="icheckbox" type="checkbox" checked>
            </div> -->
          </div>
          <div class="descript">
              <p>描述：</p>
              <textarea name="" id="" cols="30" rows="7" v-model="newPlus.description"></textarea>
          </div>
            </div>   
            <div class="button_outline" >
                <font-awesome-icon icon="fa-solid fa-xmark" id="toggle" @click="open"  />
              <div class="button_position">
                <button @click="sendData">確認送出</button>
              </div>
            </div>
        </div>
    </div>




      <div class="outline close" v-for="(plus,index) in pluses" :key="index">
          <div class="img_outline">
          <img src="../assets/images/add_icon.svg" alt="" id="new_cake_img"/>
          <button @click="newClickInput($event)">
            修改照片
          </button>
          <input
            type="file"
            style="display: none"
            class="imageButton"
            @click="setNewImage()"
          />
        </div>
            <div class="text_outline">
                <div class="infor">
                    <div class="left_infor">
                        <div class="first">
                            <p>商品ID：</p>
                            <p>{{plus.ID}}</p>
                        </div>
                        <div class="second">
                            <p>商品名稱：</p>
                            <p>{{plus.ACCESSORIES_NAME}}</p>
                        </div>
                        <!-- <div class="third">
                            <p>：</p>
                            <p>{{data.eight}}</p>
                        </div>
                        <div class="forth">
                            <p>糕體口味：</p>
                            <p>{{data.test}}</p>
                        </div> -->
                    </div>
                    <div class="right_infor">
                        <div class="first">
                            <p>狀態</p>
                            <select name="" id="">
                                <option value="" :selected="plus.ACCESSOPIES_CATEGORY==1">上架</option>
                                <option value="" :selected="plus.ACCESSOPIES_CATEGORY==2">下架</option>
                            </select>
                        </div>
                        <div class="second">
                            <p>價格</p>
                            <p>{{plus.ACCESSORIES_PRICE}}</p>
                        </div>
                        <!-- <div class="third">
                            <p>10吋價格：</p>
                            <p>{{data.ten}}</p>
                        </div> -->
                        <!-- <div class="forth">
                            <p>狀態</p>
                            <select name="" id="">
                                <option value="" :selected="plus.ACCESSOPIES_CATEGORY==1">上架</option>
                                <option value="" :selected="plus.ACCESSOPIES_CATEGORY==2">下架</option>
                            </select>
                        </div> -->
                    </div>
                </div>
                <div class="descript">
                    <p>描述：</p>
                    <textarea name="" id="" cols="30" rows="7" v-model="plus.ACCESSORIES_DESCRIPTION"></textarea>
                </div>
            </div>   
            <div class="button_outline" >
                <font-awesome-icon icon="fa-solid fa-xmark" id="toggle" @click="open"  />
                <div class="button_position">
                    <button>修改確認</button>
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
import cakeData from "../components/behind_cake_data";
import axios from "axios"
export default {
  name: "plus_shop",
  components: {
    behindHeader,
    searchBar,
    cakeData,
  },
  data() {
    return {
      index: 0,
      showWhat: [],
      pluses:[],
      result: [],
      data: [],
      aaa: [],
      ingredientAll: [],
      newPlus: {
        newPlusID:'',
        newPlusName:'',
        size:'',
        newPlusPrice:'',
        description: '',
        img:'',
        // available:1,
      },
        modifyData:'',
        allFlavor:[],
    };
  },
  methods:{
    open:　function(e){
        // console.log($(e.target).parents('.outline').siblings())
        $(e.target).parents('.outline').siblings().addClass('close');
        $(e.target).parents('.outline').toggleClass('close');
    },
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
        let image = document.getElementById("new_plus_img");
        // console.log(readFile.result);
        image.src = readFile.result;
        that.newFlavor.img = readFile.result;
      })
    },
     clickInput(index, $event,data) {
      // alert(123)
      let file = $event.target.nextSibling.nextSibling;
      this.theIndex = index;
      this.modifyData=data
      file.click();
    },
       setImage() {
      // alert(this.theIndex)
      let button =
        document.querySelectorAll("input[type='file']")[this.theIndex + 1];
      button.onchange = this.pushImage;
    },
    pushImage() {
      let that = this;
      let index = this.theIndex;
      let file =
        document.querySelectorAll("input[type='file']")[this.theIndex + 1].files[0];
      this.imgData = file;
      let readFile = new FileReader();
      // console.log(readFile.readAsBinaryString(file));
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", function () {
        let image = document.getElementsByClassName("plus_image")[index];
        // console.log(readFile.result);
        image.src = readFile.result;
        const params = new FormData();
        params.append("img", that.imgData);
        params.append("test", readFile.result);
        params.append("index", this.modifyData.ID);
        axios({
          method: "post",
          url: "http://localhost/yoyo/behindInsertPlusImg.php",

          headers: {
            "Content-Type": "multipart/form-data",
          },
          data: params,
        })
          .then((response) => {
          })
          .catch((error) => {
            console.log(error);
          });
      });
      // 寫進資料庫
    },
    clickInput(index, $event,data) {
      let file = $event.target.nextSibling.nextSibling;
      this.theIndex = index;
      this.modifyData=data
      file.click();
    },
     sendData(){
      let data = new URLSearchParams();
      data.append('name',this.newPlus.newPlusName)
      data.append('img',this.newPlus.img)
      data.append('price',this.newPlus.newPlusPrice)
      data.append('description',this.newPlus.description)
      axios({
        data,
        url:"http://localhost/yoyo/behindComponentPlusInsert.php",
        method:"POST",
      }).then((res)=>{
      }).catch((err)=>{
        console.log(err)
      })
    },
  },
   updateData(datas){
      let data = new URLSearchParams();
      data.append('name',datas.Plus_NAME)
      data.append('id',datas.Plus_ID)
      data.append('description',datas.Plus_DESCRIPTION)
      data.append('available',datas.Plus_AVAILABLE)
      data.append('price',datas.PRICE)
      axios({
        method:"POST",
        data,
        url:"http://localhost/yoyo/behindComponentPlusUpdate.php"
      }).then((res)=>{
      }).catch((err)=>{
        console.log(err)
      })
  },
  computed:{
    //   data(){
    //       return this.$store.state.chef_cake
    //   }
  },
  mounted() {
    $("#plus").siblings().removeClass("target");
    $("#plus").addClass("target");
    const params = new URLSearchParams();
            // params.append("page", index);
        axios({
            method: "post",
            url: "http://localhost/yoyo/behindComponentPlusSelect.php",
            data: params,
        })
        .then((res) => {
            this.pluses = res.data;
        })
        .catch((error) => {
            console.log(error);
        })
        const params2 = new URLSearchParams();
        axios({
            method: "post",
            url: "http://localhost/yoyo/behindComponentPlusSelect.php",
            data: params2,
        })
        .then((res) => {
            let data = res.data;
            this.plus = data
        })
        .catch((error) => {
            console.log(error);
        })
    const ingredientAll = new URLSearchParams();
        axios({
            method: "post",
            url: "http://localhost/yoyo/behindComponentSelectIngredientAll.php",
            data: ingredientAll,
        })
        .then((res) => {
            let data = res.data;
            this.ingredientAll = data
        })
        .catch((error) => {
            console.log(error);
        })
  },
  watch:{
    modifyData:{
      deep:true
    },
    newChefCake:{
      deep:true
    }
  }
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
#bottom_section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  .title {
    margin-top: 60px;
    margin-bottom: 60px;
    width: 1025px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    h1 {
      margin: 0;
      font-size: 36px;
      font-weight: 400;
    }
  }
  .cake {
    // width:903px;
    display: grid;
    gap: 30px;
  }
}
.outline {
  display: flex;
  width: 1025px;
  height: 300px; /*展開300px*/
  padding: 20px;
  background: #f7dcdc;
  border-radius: 5px;
  transition: 0.3s;
  .img_outline {
    position: relative;
    width: 250px;
    height: 250px;
    flex: 1;
    img {
      width: 100%;
      height: 100%;
      object-fit: fill;
    }
    button {
      position: absolute;
      right: 0;
      bottom: 0;
      width: 100px;
      height: 40px;
      font-size: 20px;
      box-shadow: $shadow;
      cursor: pointer;
      background: #515151;
      color: white;
      border-radius: 5px;
      &:active {
        box-shadow: inset $shadow;
      }
    }
  }
  .text_outline {
    // flex:1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
}
.infor {
  display: flex;
  // flex-direction: column;
  justify-content: space-between;

  .left_infor,
  .right_infor {
    display: flex;
    flex-direction: column;
    // justify-content: space-between;
    > div {
      display: grid;
      grid-template-columns: 1fr 3fr;
      padding: 0 3px;
      margin-bottom: 5px;
      p {
        margin: 0;
      }
    }
  }
}
.first{
  height: 50px;
}
.descript {
  margin-top: 10px;
  display: grid;
  grid-template-columns: 1fr 7fr;
  height: 70px;
  textarea {
    width: 100%;
    resize: none;
  }
  p {
    white-space: nowrap;
    margin: 0;
  }
}
.button_outline {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
  #toggle {
    cursor: pointer;
    font-size: 24px;
    transform: rotate(0deg);
    transition: 0.5s;
  }
  .button_position {
    display: flex;
    flex-direction: column;
    button {
      width: 100px;
      height: 24px;
      margin-top: 10px;
      background: #454545;
      color: white;
      border-radius: 20px;
      border: none;
      margin-left: 5px;
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
  line-height: 54px;
  padding: 0 20px;
  .img_outline {
    display: none;
  }
  .text_outline {
    flex: 1;
  }
  .button_outline {
    flex-shrink: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    #toggle {
      transform: rotate(45deg);
    }
    .button_position {
      display: none;
    }
  }
}
.ingredientOutline{
  max-width: 100%;
  display: flex;

}
.ingredient{
  display: flex;
  flex-direction: row;
  align-items: center;
  max-width: 100px;
  width: 100%;
  margin: 0;
  
}
.icheckbox{
max-width: 100px;
display: flex;
}
select{
  height: 30px;
  width: 150px;
  align-items: center;
  margin: 10px;
}
</style>
