<template>
  <section id="right_section">
    <div class="title">
      <h1>人氣投票上傳</h1>
      <searchBar @selectData="goSearching" placeholder="輸入蛋糕名稱或創作理念..."></searchBar>
    </div>
    <div class="cake">
      <div class="no_result" v-show="no_result">沒有符合的搜尋結果！</div>
        <div class="outline" v-for="(data,index) in cake_data" :key="index">
          <div class="img_outline" @click="updateCakeImageDiv($event, data.cakeID)">
            <input type="file" class="cakeImageUpload" @change="updateCakeImageInput($event, index)">
            <img :src="data.cakeIMG" v-show="data.cakeIMG" />
            <span class="update_hint">
              <span>上傳照片&nbsp;</span>
              <font-awesome-icon icon="fa-solid fa-pen-to-square" /></span>
            <span v-show="!data.cakeIMG" class="indicator">蛋糕照片尚未上傳</span>
            <span v-show="!data.cakeIMG" class="for_border"></span>
          </div>

          <div class="text_outline">
            <h1>蛋糕：{{ data.cakeName }}</h1>
            <p id="author">創作者：{{ data.memberName }}</p>
            <p id="description">創作理念：{{ data.cakeDescription }}</p>
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
import uploadVote from "../components/upload_vote";
import axios from "axios";
import qs from "qs";
export default {
  name: "upload_vote",
  components: {
    behindHeader,
    searchBar,
    uploadVote,
  },
  data() {
    return {
      showWhat: [],

      cake_data: [],
      cake_data_unchanged: [],

      selectedCakeID: 0,
      
      no_result: false,
    };
  },
  methods: {
    updateCakeImageDiv($event, cakeID){
      this.selectedCakeID = cakeID;
      $($event.target).closest("div.img_outline").find("input.cakeImageUpload").click();
    },
    updateCakeImageInput($event, index){
      let file = $event.target.files[0];
      let cakeID = this.selectedCakeID;
      let cake_data = this.cake_data;
      // let cake_data_unchanged = this.cake_data_unchanged;
      let reader = new FileReader();

      reader.readAsDataURL(file);
      reader.addEventListener("load", function(){
        cake_data[index].cakeIMG = reader.result;
        // let unchangedIndex = cake_data_unchanged.findIndex(item => item.cakeID === cake_data[index].cakeID);
        // console.log(unchangedIndex);
        // cake_data_unchanged[unchangedIndex].cakeIMG = reader.result;

        axios.post("http://localhost/A_cake/BE_updateCakeImage.php", qs.stringify({cakeID: cakeID, cakeImgBlob: reader.result}))
        .then(res => console.log(res))
        .catch(err => console.log(err));
      });

    },
    goSearching(newVal){
      this.no_result = false;
      this.cake_data = this.cake_data_unchanged.concat();
      let searchVal = new RegExp(newVal, "i");
      this.cake_data = this.cake_data.filter(item => {
        return searchVal.test(item.cakeName) || searchVal.test(item.cakeDescription);
      });
      if(this.cake_data.length === 0) this.no_result = true;
    },
  },
  watch: {
    // cake_data: {
    //   handler: function(newVal){
    //     console.log(newVal);
    //   },
    //   deep: true,
    // },
    // cake_data_unchanged: {
    //   handler: function(newVal){
    //     console.log(newVal);
    //   },
    //   deep: true,
    // },
  },
  mounted() {
    axios.post("http://localhost/A_cake/BE_selectCake.php")
      .then(res => {
        let data = res["data"];

        let hasPhoto = [];
        let noPhoto = [];
        for(let i = 0; i < data.length; i++){

          if(data[i].CAKE_IMAGE_BLOB === null){
            noPhoto.push({
              cakeID: data[i].CAKE_ID,
              cakeName: data[i].CAKE_NAME,
              cakeIMG: null,
              cakeDescription: data[i].CAKE_DESCRIPTION,
              memberName: data[i].NAME,
            });
          }else{
            hasPhoto.push({
              cakeID: data[i].CAKE_ID,
              cakeName: data[i].CAKE_NAME,
              cakeIMG: data[i].CAKE_IMAGE_BLOB,
              cakeDescription: data[i].CAKE_DESCRIPTION,
              memberName: data[i].NAME,
            });
          }

        }

        this.cake_data = noPhoto.concat(hasPhoto);
        this.cake_data_unchanged = this.cake_data.concat(); // 兩者目前不知為何會自動連動修改

      })
      .catch(err => console.log(err));
  },
  computed:{
    // cake_data(){
    //   return this.$store.state.upload_game_pic
    // }
  }
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
  justify-content: center;
  align-items: center;
  // flex-direction: column;
  h1 {
    font-size: 36px;
    font-weight: 400;
  }
}
.cake {
  display: grid;
  gap: 30px;
}
#right_section {
  padding: 70px 100px;
  .title {
    display: flex;
    justify-content: space-between;
  }
}
.no_result{
  color: #515151;
  font-size: 32px;
  text-align: center;
  padding-top: 100px;
}
.outline {
  display: flex;
  width: 775px;
  height: 250px;
  padding: 20px;
  background: #f7dcdc;
  border-radius: 5px;
  // transform:scale(2);
  .img_outline {
    flex: 0.5;
    position: relative;
    cursor: pointer;

    &:hover{
      > span.update_hint{
        opacity: .8;
      }
      > span.indicator, span.for_border{
        display: none;
      }
    }

    .cakeImageUpload{
      display: none;
    }
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
    }
    > span.update_hint{
      display: flex;
      width: 100%;
      height: 100%;
      position: absolute;
      background-color: #F4E9C9;
      opacity: 0;
      font-size: 24px;
      color: #111111;
      justify-content: center;
      align-items: center;
      transition: opacity .2s ease-out;
      >span{
        display: inline-block;
        font-weight: bold;
      }
    }
    > span.indicator{
      text-align: center;
      font-size: 20px;
      color: #515151;
      position: absolute;
      display: inline-block;
      width: 100%;
      top: 50%;
      transform: translateY(-50%);
    }
    > span.for_border{
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      border: 1px solid #515151;
      opacity: .8;
    }
  }
  .text_outline {
    flex: 1;
    // display:flex;
    margin-left: 20px;
    flex-direction: column;
    justify-content: space-between;
    h1 {
      margin-top: 0;
      font-size: 20px;
      color: #515151;
    }
    #author {
      font-size: 12px;
      color: #515151;
    }
    #description {
      font-size: 16px;
      color: #515151;
      font-weight: 700;
    }
  }
}
</style>