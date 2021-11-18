<template>
  <div>
    <section id="qa_chat">
      <button id="new_qa" @click="openUnsolved" :disabled="problem==1" :class="{'canDo':problem==0}">新增問題</button>
      <div id="qa_titlebar">
        <img src="../assets/images/cho_cake.jpg" alt="" />
        <h1>文字客服</h1>
      </div>
      <div id="qa_chatbox">
        <div id="qa_chatbox_bg">
          <div
            :class="{ textarea2: ask.SENDER == 0, textarea: ask.SENDER == 1 }"
            v-for="(ask, index) in qa"
            :key="index"
          >
            <p>{{ ask.MESSAGE }}</p>
          </div>
        </div>
      </div>
      <div id="qa_chat_answerbar">
        <input
        @click="quireMessage"
          placeholder="請輸入問題"
          id="qa_answer_input"
          v-model="message"
          :disabled="problem==0"
        />
        <button id="qa_answer_input_button" @click="sendMessage">發送</button>
      </div>
    </section>
  </div>
</template>
<script>
import $ from "jquery";
import headercom from "../components/headercom";
import footercom from "../components/footercom";
import titleh1 from "./title_h1.vue";
import search_bar from "./search_bar.vue";
import axios from "axios";
export default {
  name: "qaChat",
  components: {
    titleh1,
    headercom,
    footercom,
    search_bar,
  },
  data() {
    return {
      message: "",
      qa:[],
      problem:0,
    };
  },
  methods: {
    sendMessage() {
      if (this.message != "") {
        let data = new URLSearchParams();
        data.append("message", this.message);
        data.append("id", this.$store.state.member_id);
        axios({
          method: "POST",
          url: "http://localhost/static/send_qa.php",
          data,
        })
          .then((res) => {
            console.log(res.data);
            let data2 = new URLSearchParams();
            data2.append("id", this.$store.state.member_id);
            axios({ //成功送出後重新select資料
              method: "POST",
              url: "http://localhost/static/qa.php",
              data: data2,
            })
              .then((res) => {
                this.qa = res.data;
                this.message='';
              })
              .catch((error) => {
                console.log(error);
              });
          })
          .catch((res) => {
            console.log(res.data);
          });
      }
    },
    openUnsolved(){
      let data = new URLSearchParams();
      data.append("id",this.$store.state.member_id)
      data.append("open",0)
      axios({
        method:"POST",
        url:'http://localhost/static/openUnsolved.php',
        data,
      }).then((res)=>{
        if(res.data=="success"){
          let data2 = new URLSearchParams();
            data2.append("id", this.$store.state.member_id);
            axios({ //
              method: "POST",
              url: "http://localhost/static/qa.php",
              data: data2,
            })
              .then((res) => {
                this.qa = res.data;
                this.problem=parseInt(res.data[0].UNSOLVED_PROBLEM)
              })
              .catch((error) => {
                console.log(error);
              });
        }
      }).catch((error)=>{
        console.log(error);
      })
    },
    quireMessage(){
      let data2 = new URLSearchParams();
            data2.append("id", this.$store.state.member_id);
            axios({ //
              method: "POST",
              url: "http://localhost/static/qa.php",
              data: data2,
            })
              .then((res) => {
                this.qa = res.data;
                this.problem=parseInt(res.data[0].UNSOLVED_PROBLEM)
              })
              .catch((error) => {
                console.log(error);
              });
    }
  },
  watch: {},
  computed: {},
  mounted() {
    //   開場要求資料
      let data2 = new URLSearchParams();
            data2.append("id", this.$store.state.member_id);
            axios({ //
              method: "POST",
              url: "http://localhost/static/qa.php",
              data: data2,
            })
              .then((res) => {
                this.qa = res.data;
                this.problem=parseInt(res.data[0].UNSOLVED_PROBLEM)
              })
              .catch((error) => {
                console.log(error);
              });
  },
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
  box-sizing: border-box;
}
body {
  background-color: $bg;
}
#qa_chat {
  background-color: $lightYellow;
  max-width: 400px;
  width: 100%;
  height: 500px;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  #new_qa{
    position:absolute;
    right:20px;
    top:10px;
    border-radius: 5px;
    border:none;
    background: #dfb9b0;
    cursor: pointer;
    padding:5px 10px;
    font-size:20px;
    &:active{
      color:$lightYellow
    }
  }
  #qa_titlebar {
    max-width: 360px;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    img {
      margin-left: 20px;
      width: 30px;
      height: 30px;
      object-fit: cover;
    }
    h1 {
      font-size: $h4;
      color: black;
    }
  }
  #qa_chatbox {
    display: flex;
    background-color: white;
    width: 90%;
    max-width: 350px;
    height: 350px;
    justify-content: center;
    border-radius: 10px;
    p {
      font-size: $p;
      padding: 8px 13px;
      margin: 0;
      max-width: 80%;
    }
    img {
      margin-left: 20px;
      width: 20px;
      height: 20px;
      object-fit: cover;
    }
    #qa_chatbox_bg {
      padding:5px;
      display: flex;
      flex-direction: column;
      // justify-content: flex-start;
      // align-items: center;
      width: 320px;
      overflow: auto;
      .textarea {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 100%;
        margin-top: 20px;
        p {
          background: #f4e9c9;
          border-radius: 5px;
        }
        img {
          margin-right: 20px;
          width: 20px;
          height: 20px;
          object-fit: cover;
        }
      }
      .textarea2 {
        margin-top: 20px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        // margin: auto;
        p {
          background: #dfb9b0;
          border-radius: 5px;
        }
        img {
          margin-left: 20px;
          width: 20px;
          height: 20px;
          object-fit: cover;
        }
      }
    }
  }
  #qa_chat_answerbar {
    max-width: 500px;
    width: 90%;
    height: 40px;
    margin-top: 20px;
    display: flex;
    margin-bottom: 20px;
    #qa_answer_input {
      border: 0;
      height: 40px;
      background-color: white;
      border-radius: 5px 0 0 5px;
      width: 250px;
      &:focus {
        border: 1px solid $darkGrey;
      }
    }
    #qa_answer_input_button {
      width: 30%;
      height: 40px;
      background-color: $palePike;
      font-size: $h4;
      border: 0;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      &:active {
        color: $lightYellow;
      }
    }
  }
}
button.canDo{
  box-shadow: 2px 2px 3px 0 rgba( 0, 0, 0, .3);
}
</style>