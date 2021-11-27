<template>
    <div class="manager_list">
      <div class='manager_img_outline'>
        <img src="" alt="" />
        <button>修改照片</button>
      </div>
      <div class="manager_list_content">
        <div class="manager_details">
            <label for="">員工編號</label>
            <input class="authority" type="text">
        </div>
        <div class="manager_details">
            <label for="">員工密碼</label>
            <input class="authority" type="password">
        </div>
      <div class="manager_details">
            <label for="">員工姓名</label>
            <input class="authority" type="text">
        </div>
      </div>
      <div class="manager_list_content">
          <div class="manager_details">
              <label for="">創建員工</label>
              <input class="authority" type="text">
          </div>
          <div class="manager_details">
              <label for="">創建日期</label>
              <input class="authority" type="date">
          </div>
          <div class="manager_details">
            <label for="">權限</label>
            <select name="" class="authority">
              <option value="">1</option>
            </select>
          </div>
      </div>
      <div class="manager_list_button">
          <switchButton :title=thistitle></switchButton>
          <span></span>
          <span></span>
        <button>修改</button>
        <button>確認</button>
        </div>
    </div>
    
</template>
<script>
import $ from "jquery";
import switchButton from "./switch_button"
export default {
  name: "employee",
  props:['thistitle'],
  data(){
    return{
      
    }
  },
  methods: {},
  components:{
    switchButton,
  }
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
*{
    box-sizing: border-box;
}
.manager_list{
    width:1000px;
    height:250px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:20px;
    background-color: #F0D5CE;
    .manager_img_outline{
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        img{
          width: 200px;
          height: 200px;
        }
        button{
            position:absolute;
            right:0px;
            bottom:0;
            width:100px;
            height:50px;
            border:none;
            border-radius:5px 0 0 0;
            font-size:20px;
            background: #454545;
            color:white;
            font-weight: 900;
            box-shadow: $shadow;
            cursor: pointer;
        }
    }
    .manager_list_content{
        display:flex;
        flex-direction: column;
        height:200px;
        justify-content: space-between;
        align-items: center;
        font-size:0;
    }
    .manager_details{
      width: 280px;
      display: flex;
      align-items: center;
      flex-direction: row;
      justify-content: space-around;
    }
    label{
      font-size: 20px;
      width: 90px;
    }
    .authority{
      width: 180px;
      text-align: center;
    }
}
.manager_list_button{
  width:115px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 200px;
  
  .switch{
      width:40px;
      height:25px;
      border-radius:10px;
      display: flex;
      align-items: center;
      border-radius: 20px;
      background-color: #454545;
      position: relative;
      
    .circle{
      width: 20px;
      height: 20px;
      border-radius: 100px;
      background-color: white;
      display: inline-block;
      position: relative;
      left: 2px;
      // left: 14px;
    }
  }
  button{
    background-color: #454545;
    border-radius: 10px;
    color: white;
    cursor: pointer;
  }
}
select{
  border:2px solid ;
}
</style>