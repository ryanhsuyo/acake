<template>
  <section id="right_section">
    <div class="title">
      <h1>舉辦新活動</h1>
    </div>
    <div class="top_outline">
      <div class="img_outline">
        <img src="../assets/images/add_icon.svg" alt="" id='new_vote_img'/>
        <button @click="newClickInput($event)">上傳照片</button>
                <input
                  type="file"
                  style="display: none"
                  class="imageButton"
                  @click="setNewImage()"
                />
      </div>
      <div class="text_outline">
        <div>
          <label for="">活動主題：</label>
          <input type="text" v-model="newVoteData.title"/>
        </div>
        <div>
          <label for="">活動時間：</label>
          <div class="write_time">
            <input type="text" v-model="newVoteData.startDate"  />~
            <input type="text" v-model="newVoteData.endDate"  />
            </div>
        </div>
        <div>
          <label for="" >活動內文：</label>
          <textarea name="" id="" cols="30" rows="7" v-model="newVoteData.description"></textarea>
        </div>
      </div>
    </div>
    <div class="button_outline">
      <button @click="toDefault">清空</button>
      <button @click="runNewEvent">上傳</button>
    </div>
  </section>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
import axios from "axios";
export default {
  name: "newEvent",
  components: {
    behindHeader,
    searchBar,
  },
  data() {
    return {
      showWhat: [],
      newVoteData:{
        title:"",
        description:'',
        startDate:'',
        endDate:'',
        img:'',
      },
    };
  },
  methods: {
    toDefault(){
      this.newVoteData={title:"",
        description:'',
        startDate:'',
        endDate:'',
        img:'',};
        let image = document.getElementById("new_vote_img");
        image.src = require("../assets/images/add_icon.svg");

    },
    // 圖片按鈕相關
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
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", function () {
        let image = document.getElementById("new_vote_img");
        image.src = readFile.result;
        that.newVoteData.img = readFile.result;
      })
    },
    // 送出資料
    runNewEvent(){
      let data = this.newVoteData;
      const params = new URLSearchParams();
      params.append("title",data.title);
      params.append("description",data.description);
      params.append("startDate",data.startDate);
      params.append("endDate",data.endDate);
      params.append("img",data.img);
axios({
        method: "post",
        url: "http://localhost/static/new_vote_event.php",

        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        data: params,
      })
        .then((response) => {
          if(response.data == "success"){
          this.toDefault();
          this.$emit('back')
          }else{
            console.log(response);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  mounted() {
    $("#runOrStop").siblings().removeClass("target");
    $("#runOrStop").addClass("target");
  },
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
.title {
  width: 775px;
  display: flex;
  // justify-content: center;
  align-items: center;
  margin-bottom: 100px;
  // flex-direction: column;
  h1 {
    font-size: 36px;
    font-weight: 400;
  }
}
.top_outline {
  width: 775px;
  display: flex;

  .img_outline {
    width: 211px;
    height: 211px;
    position:relative;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    button{
      position: absolute;
      right: 0px;
      bottom: 0;
      width: 100px;
      height: 50px;
      border: none;
      border-radius: 5px 0 0 0;
      font-size: 20px;
      background: #454545;
      color: white;
      font-weight: 900;
      box-shadow: $shadow;
      cursor: pointer;
      &:active{
        box-shadow: inset $shadow;
      }
    }
  }
  .text_outline{
      font-size:24px;
      flex:1;
      display:flex;
      flex-direction: column;
      >div{
          padding-left:20px;
          display: grid;
          grid-template-columns: 1fr 3fr;
          margin-bottom:10px;
      }
  }
}
  .button_outline{
      width:775px;
      display:flex;
      justify-content: flex-end;
      align-items: center;
      button{
          margin-left:20px;
          margin-top:50px;
          width:180px;
          height:60px;
          cursor: pointer;
          font-size:24px;
          border:1px solid gray;
          box-shadow: $shadow;
          border-radius:5px;
          background: transparent;
          &:active{
              box-shadow: inset $shadow;
          }
      }
      button:nth-child(2){
          background: #515151;
          color:white;
      }
  }
.write_time{
  display:flex;
  justify-content: space-between;
  align-items: center;
  input{
    height:100%;
  }
}
</style>