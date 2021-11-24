<template>
  <div>
    <behind-header thistitle="客服回覆" style="zIndex:2"></behind-header>
    <main>
      <section class="left_site">
        <div class="member_outline" style="background:#DFB9B0" v-for="(data,index) in total_member" :key="index"  v-if="data.UNSOLVED_PROBLEM == '1'">
          <div class="img_outline">
            <img :src="data.MEMBER_IMG_BLOB" alt="">
          </div>
          <h1 id="user_name" @click="[chooseMember(data.MEMBER_ID),select_member=data]">{{data.NAME}}</h1>
        </div>
        <div class="member_outline" v-for="(data,index) in total_member" :key="index"  v-if="data.UNSOLVED_PROBLEM == '0'">
          <div class="img_outline">
            <img :src="data.MEMBER_IMG_BLOB" alt="">
          </div>
          <h1 id="user_name" @click="[chooseMember(data.MEMBER_ID),select_member=data]">{{data.NAME}}</h1>
        </div>
        <!-- 沒問題的 -->
      </section>
      <section class="middle_site">
        <div class="who">
          <img :src="select_member.MEMBER_IMG_BLOB" alt="">
          <div class="status">
            <p>{{select_member.NAME}}</p>
          </div>
        </div>
      </section>
      <section class="right_site">
        <div class="first_line">
        <p>文字客服</p>
        <button @click="endQa">封存問題</button>
        </div>
        <div class="contact">
          <p :class="{'question':ask.SENDER==1,'request':ask.SENDER==0}" v-for="(ask,index) in select_member_message" :key="index">{{ask.MESSAGE}}</p>
        </div>
        <div class="answer">
          <input type="text" placeholder="回答問題..." v-model="answer">
          <button @click="sendAnswer">發送</button>
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
import axios from 'axios'
export default {
  name: "message_manager",
  components: {
    behindHeader,
    searchBar,
  },
  data() {
    return {
      showWhat: 'runOrStop',
      total_member:[],
      select_member:[],
      select_member_message:[],
      answer:'',
    };
  },
  methods: {
    quireTotalMember(){
      axios({
        method:"POST",
        url:"http://localhost/static/cty_api/quire_total_member.php",
      }).then((res)=>{
        this.total_member = res.data
      }).catch((error)=>{
        console.log(error);
      })
    },
    chooseMember(id){
      let data= new URLSearchParams();
      data.append("id",id)
      axios({
        method:"POST",
        url:'http://localhost/static/cty_api/quire_member_message.php',
        data,
      }).then((res)=>{
        this.select_member_message = res.data;
      }).catch((error)=>{
        console.log(error);
      })
    },
    sendAnswer(){
      if(this.answer!=''){
        let data = new URLSearchParams();
        let id=this.select_member.MEMBER_ID
        data.append('id',this.select_member.MEMBER_ID);
        data.append('message',this.answer);
        axios({
          method:"POST",
          url:'http://localhost/static/cty_api/send_message_answer.php',
          data,
        }).then((res)=>{
          if(res.data=="success"){
            this.answer='';
            this.quireTotalMember();
            this.chooseMember(id)
          }
        }).catch((error)=>{
          alert('發送失敗')
        })
      }else{
        alert("請輸入內容")
      }
    },
    endQa(){
      let data=new URLSearchParams();
      data.append("id",this.select_member.MEMBER_ID);
      axios({
        method:"POST",
        url:'http://localhost/static/cty_api/change_unsolved_problem.php',
        data,
      }).then((res)=>{
        if(res.data="success"){
          this.quireTotalMember()
        }
      }).catch((error)=>{
        console.log(error);
      })
    }
  },
  mounted(){
      $("#request").siblings().removeClass("target");
    $("#request").addClass("target");
    this.quireTotalMember();
  },
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
main{
  display:grid;
  grid-template-columns: 1fr 1fr 2fr;
}
.left_site{
  position:relative;
  height:calc(100vh);
  overflow-y: auto;
  top:-20px;
  background: #F0D5CE;
  .member_outline{
    width:100%;
    height:120px;
    display: flex;
    // justify-content: center;
    padding-left:20%;
    align-items: center;
    position:relative;
    .img_outline{
      width:55px;
      height:55px;
      margin-right:10px;
      img{
        width: 100%;
        height:100%;
        object-fit: cover;
      }
      
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
  }
  .member_outline:first-child{
    margin-top:100px;
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
.middle_site{
  display:flex;
  flex-direction: column;
  align-items: center;
  margin-top:80px;
  .who{
    display:flex;
    img{
      width:90px;
      height:90px;
      object-fit: cover;
    }
    .status{
      display:flex;
      flex-direction: column;
      justify-content: center;
      // align-items: flex-end;
      p{
        margin:0;
        margin-left:10px;
        font-size:24px;
      }
      p:nth-child(2){
        margin-top:10px;
        font-size:12px;
        color:#5A9308;
        position:relative;
        align-self:center;
        &:before{
          content:'';
          width:10px;
          height:10px;
          background:#5A9308 ;
          border-radius: 50%;
          position:absolute;
          left:-15px;
          top:50%;
          transform: translateY(-50%);
        }
      }
      p:nth-child(2).not_ok{
        color:red;
        &:before{
          content:'';
          width:10px;
          height:10px;
          background:red ;
          border-radius: 50%;
          position:absolute;
          left:-15px;
          top:50%;
          transform: translateY(-50%);
        }
      }
    }
  }
  button{
    font-size:20px;
    margin-top:10px;
    width:180px;
    height:40px;
    border-radius:5px;
    border:none;
    background:#9F746B ;
    box-shadow: $shadow;
    color:white;
    cursor: pointer;
    &:active{
      box-shadow: inset $shadow;
    }
  }
  button:nth-child(4){
    background:#454545 ;
  }
}
.right_site{
  position:relative;
  display: flex;
  flex-direction: column;
  background:#F4E9C9;
  top:-20px;
  height:100%;
  padding:80px 20px;
  .first_line{
    // width:570px;
    justify-content: space-between;
    display:flex;
    p{
      font-size:24px;
    }
    button{
      font-size:20px;
      width:100px;
      height:40px;
      background: #454545;
      box-shadow: $shadow;
      color:white;
      cursor: pointer;
      border:none;
      border-radius:5px;
      &:active{
        box-shadow: inset $shadow;
      }
    }
  }
  .contact{
    height:550px;
    overflow-y:auto;
    background: white;
    color:black;
    padding:5px;
    display:flex;
    flex-direction: column;
  }
  .answer{
    display:flex;
    height:60px;
    margin-top:60px;
    input{
      flex:1;
      padding:20px;
      border:none;
      background: white;
      border-radius:5px 0 0 5px;
      font-size:20px;
    }
    button{
      width:150px;
      border-radius: 0 5px 5px 0;
      background:#DFB9B0 ;
      font-size:20px;
      cursor: pointer;
      border:none;
      &:active{
        box-shadow: inset $shadow;
      }
    }
  }
}
#user_name{
  cursor: pointer;
}
p.question{
  font-size:24px;
  display:flex;
  align-self: flex-start;
  justify-content: flex-start;
  color:white;
  background:#9F746B;
  padding:5px 10px;
  border-radius: 5px;
}
p.request{
  font-size:24px;
  display:flex;
  justify-content: flex-end;
  align-self: flex-end;
  // width:80%;
  background:#DFB9B0;
  padding:5px 10px;
  border-radius: 5px;
  color:#515151;
}
</style>