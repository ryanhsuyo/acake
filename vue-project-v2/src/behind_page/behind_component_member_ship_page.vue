<template>
  <section id="right_section">
    <div class="title">
      <h1>會員資料</h1>
      <searchBar @selectData="goSearching" placeholder="輸入會員姓名、暱稱或Email..."></searchBar>
    </div>
    <div class="cake">
      
      <!-- 會員取消權限修改 -->
       <!-- <div id="confirm" v-bind:class="{open: confirmCase}">
         <div class="confirm_outline">
          <h1>狀態是否改為停用</h1>
          <div class="check">
              <button class="true" id="confirm_yes"  @click="yes">確認</button>
              <button class="false1" id="confirm_no" @click="cancel">取消</button>
          </div> -->
          <!-- @click="yes(index)"@click="cancel(index)" -->
        <!-- </div>
      </div>   -->
      <div class="no_result" v-show="no_result">沒有符合的搜尋結果！</div>
      <div class="outline" :class="{'-off': status.show === false}" v-for="(status,index) in member_data" :key="index">
      <!-- 確認框 -->
     
     <!-- 會員框 -->
       
        <div class="img_outline">
          <img :src="status.memberImg" alt="" />
        </div>

        <div class="text_outline">
          <!-- <div class="forPosition open">
            <span> -->
              <!-- 會員取消權限修改 -->
              <!-- <span class="switch_button" @click="change(index);opened_index = index">
                <label for="" style="margin-right: 10px" >狀態</label>
                <div class="switch" id="outline" :class="{ '-on': status.status }">
                  按鈕開關
                  <span
                    class="circle"
                    id="circle"
                    :class="{ '-on': status.status }"
                  ></span>
                </div>
              </span> -->
            <!-- </span>
          </div> -->
          <div class="text">
            <label for="">姓名:<span>&nbsp;{{status.name}}</span></label>
            <label for="">Email:<span>&nbsp;{{status.email}}</span></label>
            <span class="icon" @click="status.show = !status.show"><font-awesome-icon icon="fa-solid fa-caret-down"/></span>
          </div>
          <div class="text">
            <label for="">暱稱:<span>&nbsp;{{status.nickName}}</span></label>
            <label for="">創建日期:<span>&nbsp;{{status.createDate}}</span></label>
          </div>
          <div class="text">
            <label for="">手機號碼:<span>&nbsp;{{status.phone}}</span></label>
            <label for="">生日:<span>&nbsp;{{status.birthday}}</span></label>
          </div>
          <div class="address">
            <label for="">地址:&nbsp;</label>
            <p>{{status.address}}</p>
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
import member from "../components/member_data";
import axios from "axios";
export default {
  name: "membership",
  components: {
    behindHeader,
    searchBar,
    member,
  },
  data() {
    return {
      // opened_index:null,
      // confirmCase: 0,
      // switchCase: 1,

      member_data: [],
      member_data_unchanged: [],

      no_result: false,
    };
  },
  methods: {
    // 會員取消權限修改
    // cancel(){
    //       this.confirmCase = 0
    //   },
      // yes(){
      //     console.log(this.change)
      // },
    //   change(index){
    //     let i =  this.member_data[index].status;
    //     this.member_data[index].status = this.member_data[index].status?0:1
    //     if(this.member_data[index].status == 0){
    //       this.confirmCase = 1;
    //     };
    //     this.opened_index = index;
    // },

    goSearching(newVal){
      this.no_result = false;
      this.member_data = this.member_data_unchanged.concat();
      let searchVal = new RegExp(newVal, "i");
      this.member_data = this.member_data.filter(item => {
        return searchVal.test(item.name) || searchVal.test(item.nickName) ||searchVal.test(item.email);
      });
      if(this.member_data.length === 0) this.no_result = true;
    },
  },
  mounted() {
    axios.post("./static/jiawei.api/BE_selectMember.php")
      .then(res => {
        let data = res["data"];
        // console.log(data);

        for(let i = 0; i < data.length; i++){
          this.member_data.push({
            show: false,
            memberID: data[i].member_ID,
            name: data[i].NAME,
            nickName: data[i].NICKNAME,
            email: data[i].EMAIL,
            createDate: data[i].CREATEDATE.split(" ")[0].replace(/-/g, "/"),
            phone: data[i].PHONE,
            birthday: data[i].BIRTHDAY.split(" ")[0].replace(/-/g, "/"),
            address: data[i].ADDRESS,
            memberImg: data[i].MEMBER_IMG_BLOB,
          });
        }
        this.member_data_unchanged = this.member_data.concat();
      })
      .catch(err => console.log(err));
  },
  computed: {
    // member_data(){
    //   return this.$store.state.member_status
    // },
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
  padding: 70px 140px 70px 60px;
  .title {
    display: flex;
    justify-content: space-between;
  }
}
// 會員檔案
.no_result{
  color: #515151;
  font-size: 32px;
  text-align: center;
  padding-top: 100px;
}
.outline {
  display: flex;
  width: 815px;
  height: 250px;
  padding: 20px;
  background: #f7dcdc;
  border-radius: 5px;
  transition: all .5s;
  overflow: hidden;
  // transform:scale(2);
  .img_outline {
    flex: 0.5;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  .text_outline {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    padding: 0 20px;
    // position:relative;
    // top:40px;
  }
  .text {
    display: flex;
    margin: 5px 0;
    position: relative;
    .icon{
      position: absolute;
      top: -10px;
      right: 0;
      font-size: 28px;
      cursor: pointer;
      transition: all .3s;
    }
    label {
      flex: 1;
      padding: 0 5px;
      > span{
        padding-left: 5px;
      }
    }
  }
}
.outline.-off{
  height: 65px;
  .img_outline {
    display: none;
  }
  .text_outline{
    .text, .address{
      display: none;
      &:first-child{
        display: flex;
      }
    }
    .text .icon{
      transform: rotate(180deg);
    }
  }
}
.address {
  padding: 0 5px;
  // display:flex;
  gap: 4px;
  display: grid;
  grid-template-columns: 40px 1fr;
  label {
    white-space: nowrap;
  }
  p{
    padding: 0;
    margin: 0;
  }
}
// .forPosition {
//   justify-content: flex-end;
//   // flex-direction: column;
//   display: none;
//   span {
//     display: flex;
//     align-items: center;
//     justify-content: center;
//   }
// }
// .forPosition.open {
//   display: flex;
// }

#confirm {
  width: calc(100vw - 280px);
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  position: fixed;
  left: 280px;
  top: 0px;
  display: none;
  justify-content: center;
  align-items: center;
}
#confirm.open {
  display: flex;
  z-index:999;
}
// 按鈕
.switch_button {
  display: flex;
  align-items: center;
  // justify-content: space-evenly;
}
  .fa-xmark{
    font-size:30px;
    cursor: pointer;
  }
.switch {
  margin-right: 25px;
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
    transition: 0.5s;
  }
}
.circle.-on {
  left: 18px;
  transition: 0.5s;
}
.switch.-on {
  transition: 0.5s;
  background-color: green;
}
// 確認框
.confirm_outline {
  width: 570px;
  height: 300px;
  border-radius: 5px;
  background: #efe6e4;
  display: flex;
  flex-direction: column;
  // border:1px solid red;
  h1 {
    text-align: center;
    color: #515151;
  }
  div {
    display: flex;
    justify-content: center;
    button {
      width: 250px;
      height: 75px;
      margin: 60px 10px;
      border: none;
      border-radius: 5px;
      box-shadow: $shadow;
      font-size: 24px;
      cursor: pointer;
      color: #515151;
      &:active {
        box-shadow: inset $shadow;
      }
    }
    button:nth-child(1) {
      background: #dfb9b0;
    }
    button:nth-child(2) {
      background: #f7edd4;
    }
  }
}
</style>