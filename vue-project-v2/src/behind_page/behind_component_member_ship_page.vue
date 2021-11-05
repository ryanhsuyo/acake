<template>
  <section id="right_section">
    <div class="title">
      <h1>會員資料</h1>
      <searchBar></searchBar>
    </div>
    <div class="cake">
      
       <div id="confirm" v-bind:class="{open: confirmCase}">
         <div class="confirm_outline">
        <h1>狀態是否改為停用</h1>
        <div class="check">
            <button class="true" id="confirm_yes"  @click="yes">確認</button>
            <button class="false1" id="confirm_no" @click="cancel">取消</button>
        </div>
         <!-- @click="yes(index)"@click="cancel(index)" -->
    </div>
    </div>  
      <div class="outline" v-for="(status,index) in member_data" :key="index">
      <!-- 確認框 -->
     
     <!-- 會員框 -->
       
        <div class="img_outline">
          <img src="../assets/images/cho_cake.jpg" alt="" />
        </div>

        <div class="text_outline">
          <div class="forPosition open">
            <span>
              <span class="switch_button" @click="change(index);opened_index = index">
                <label for="" style="margin-right: 10px" >狀態</label>
                <div class="switch" id="outline" :class="{ '-on': status.status }"><!--按鈕開關-->
                  <span
                    class="circle"
                    id="circle"
                    :class="{ '-on': status.status }"
                  ></span>
                </div>
              </span>
              <font-awesome-icon
                icon="fa-solid fa-xmark"
                
              />
            </span>
          </div>
          <div class="text">
            <label for="">Email<input type="text" :value=status.email></label>
            <label for="">姓名<input type="text" :value=status.name /></label>
          </div>
          <div class="text">
            <label for="">暱稱<input type="text" :value=status.nickName /></label>
            <label for="">創建日期<input type="text" :value=status.createDate /></label>
          </div>
          <div class="text">
            <label for="">手機號碼<input type="text" :value=status.phone /></label>
            <label for="">生日<input type="text" :value=status.birthday /></label>
          </div>
          <div class="adress">
            <label for="">地址</label>
            <textarea name="" id="" cols="50" rows="3" v-model="status.adress"></textarea>
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
export default {
  name: "membership",
  components: {
    behindHeader,
    searchBar,
    member,
  },
  data() {
    return {
      opened_index:null,
      confirmCase: 0,
      switchCase: 1,
    };
  },
  methods: {
    cancel(){
          this.confirmCase = 0
      },
      yes(){
          console.log(this.change)
      },
      change(index){
        let i =  this.member_data[index].status;
        this.member_data[index].status = this.member_data[index].status?0:1
        if(this.member_data[index].status == 0){
          this.confirmCase = 1;
        };
        this.opened_index = index;
    },
  },
  mounted() {
    $("#member_ship_manager").siblings().removeClass("target");
    $("#member_ship_manager").addClass("target");
  },
  computed: {
    member_data(){
      return this.$store.state.member_status
    },
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
  padding: 70px 100px;
  .title {
    display: flex;
    justify-content: space-between;
  }
}
// 會員檔案
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
    justify-content: space-between;
    // position:relative;
    // top:40px;
  }
  .text {
    display: flex;
    margin: 5px 0;
    label {
      flex: 1;
      padding: 0 5px;
    }
    input {
      float: right;
    }
  }
}
.adress {
  padding: 0 5px;
  // display:flex;
  gap: 4px;
  display: grid;
  grid-template-columns: 64px 1fr;
  label {
    white-space: nowrap;
    // width:15%;
  }
  textarea {
    // vertical-align: top;
    width: 100%;
    resize: none;
    border: 2px solid;
  }
}
.forPosition {
  display: flex;
  justify-content: flex-end;
  // flex-direction: column;
  display: none;
  span {
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
.forPosition.open {
  display: flex;
}

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