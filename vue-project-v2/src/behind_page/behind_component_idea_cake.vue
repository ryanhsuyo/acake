<template>
    <section id="bottom_section">
    <div class="title">
        <h1>創意蛋糕</h1>
        <searchBar></searchBar>
    </div>
    <div class="cake" >
        <div class="outline close" v-for="(ideaCake,index) in ideaCakes" :key="index">
            <div class="img_outline">
                <img src="../assets/images/cho_cake.jpg" alt="">
                <button>修改照片</button>
            </div>
            <div class="text_outline">
                <div class="infor">
                    <div class="left_infor">
                        <div class="first">
                            <p>蛋糕ID：</p>
                            <p>{{ideaCake.CAKE_ID}}</p>
                        </div>
                        <div class="second">
                            <p>蛋糕名稱：</p>
                            <p>{{ideaCake.CAKE_NAME}}</p>
                        </div>
                        <div class="third">
                            <p>吋數:</p>
                            <p>{{ideaCake.SIZE}}</p>
                        </div>
                        <div class="forth">
                            <p>糕體口味：</p>
                            <p>{{ideaCake.CATEGORY_NAME}}</p>
                        </div>
                    </div>
                    <div class="right_infor">
                        <div class="first">
                            <p>狀態：</p>
                            <select name="" id="">
                                <option value="" :selected="ideaCake.AVAIABLE==1">上架</option>
                                <option value="" :selected="ideaCake.AVAIABLE==0">下架</option>
                            </select>
                        </div>
                        <div class="second">
                            <p>價格：</p>
                            <p>{{ideaCake.PRICE}}</p>
                        </div>
                        <!-- <div class="third">
                            <p>10吋價格：</p>
                            <p>{{data.ten}}</p>
                        </div> -->
                        <div class="forth">
                            <p>製作者：</p>
                            <p>{{ideaCake.NICKNAME}}</p>
                        </div>
                    </div>
                </div>
                <div class="ingredientOutline">
                    <div class="ingredient" v-for="(name, index) in ideaCake.INGREDIENT_NAME" :key="index">
                        <input class="icheckbox" type="checkbox" checked>{{name}}
                    </div>
                </div>
                <div class="descript">
                    <p>描述：</p>
                    <textarea name="" id="" cols="30" rows="7" v-model="ideaCake.CAKE_DESCRIPTION"></textarea>
                </div>
            </div>   
            <div class="button_outline" >
                <font-awesome-icon icon="fa-solid fa-xmark" id="toggle" @click="open"  />
                <div class="button_position">
                    <button>修改</button>
                    <button>確認</button>
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
  name: "idea_cake",
  components: {
    behindHeader,
    searchBar,
    cakeData,
  },
  data() {
    return {
      showWhat: [],
      ideaCakes: {},
    //   data:[{
    //       id: 1,
    //       name: 3,
    //       eight: 5,
    //       test: 2,
    //       author: 2,
    //       six: 3,
    //       ten: 5,
    //   }]
    };
  },
  mounted() {
    $("#ideaCake").siblings().removeClass("target");
    $("#ideaCake").addClass("target");
     const params = new URLSearchParams();
            // params.append("page", index);
        axios({
            method: "post",
            url: "http://localhost/A_cake/behindComponentIdeaCakeSelect.php",
            data: params,
        })
        .then((res) => {
            // console.log(res.data);
            let data = res.data;
            console.log('應該要有三個蛋糕 ',data);
            // this.chefCakes = data.filter(item => item.MEMBER_ID === "0")
            
            // 
            for (let index = 0; index < data.length; index++) {
                const element = data[index];
                console.log('element' , element)
                const id = element.ID;
                console.log('這個印出的id', id);
                if(this.ideaCakes[id]){
                    this.ideaCakes[id].INGREDIENT_NAME.push(element.INGREDIENT_NAME) 
                }else{
                    this.ideaCakes[id] = element
                    this.ideaCakes[id].INGREDIENT_NAME = [this.ideaCakes[id].INGREDIENT_NAME]
                }
                
                // console.log('可以可以印隊的給我',this.ideaCakes[id]);
            }
            this.$forceUpdate()
            // a = this.chefCakes.ID
            // for(let i = 0; i < data.length; i++){
              // INGREDIENT.push()
        
            // let currentCakeID = "-1";
            //   if(data[i].CAKE_ID !== currentCakeID){
            //     currentCakeID = data[i].CAKE_ID;
                
            //   }
            // }
            
            // console.log(this.chefCakes);
            //  = this.chefCakes.filter(item => item.MEMBER_ID === "0");
            // this.designerCake = a.filter(item => item.MEMBER_ID !== "0");
            // console.log('thischefcake', this.chefCakes);
            // console.log('thisdesingerckae', this.designerCake);
            // console.log(data.length);
            // console.log(data.length); 
            // this.DesignerCake = res.data
        })
        .catch((error) => {
            console.log(error);
        })
  },

//     const params = new URLSearchParams();
//                 // params.append("page", index);
//             axios({
//                 method: "post",
//                 url: "http://localhost/A_cake/behindComponentIdeaCakeSelect.php",
//                 data: params,
//             })
//             .then((res) => {
//                 // console.log(res.data);
//                 let data = res.data;
//                 // console.log(data);
//                 this.ideaCakes = data.filter(item => item.MEMBER_ID === "1");
//                 // this.designerCake = data.filter(item => item.MEMBER_ID !== "0");
//                 console.log('thischefcake', this.ideaCakes);
//                 // console.log('thisdesingerckae', this.designerCake);
//                 // console.log(data.length);
//                 // console.log(data.length); 
//                 // this.DesignerCake = res.data
//             })
//             .catch((error) => {
//                 console.log(error);
//             })
    
//   },
  methods:{
    open:　function(e){
        // console.log($(e.target).parents('.outline').siblings())
        $(e.target).parents('.outline').siblings().addClass('close');
        $(e.target).parents('.outline').toggleClass('close');
    },
  },
//   computed:{
//     //   data(){
//     //       return this.$store.state.chef_cake
//     //   }
//   },
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
