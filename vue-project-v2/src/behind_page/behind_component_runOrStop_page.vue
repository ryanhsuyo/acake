<template>
  <section id="right_section">
    <div class="title">
      <h1>活動內容管理</h1>
      <searchBar></searchBar>
    </div>
    <div class="cake">
      <div id="new_event">
        <h1>舉辦新活動</h1>
        <font-awesome-icon
          icon="fa-solid fa-square-plus"
          id="plus_new_event"
          @click="newEvent"
        />
      </div>
      <div v-for="(data,index) in voteData" :key="index">
        <div class="outline">
          <div class="img_outline">
            <img :src="data.IMG" alt="" />
          </div>
          <div class="text_outline">
            <div class="content">
              <div class="text_content">
                <p>活動主題：</p>
                <input type='text' v-model="data.EVENT_NAME">
              </div>
              <div class="text_content">
                <p>活動內容：</p>
                <input type="text" v-model='data.EVENT_DESCRIPTION'>
              </div>
              <div class="text_content">
                <p>活動時程：</p>
                <p>{{data.START_DATE}}</p>
                <p>~</p>
                <input type='text' v-model="data.END_DATE">
              </div>
            </div>
            <div class="progress">
              <h1 v-if="data.END_DATE >= today">進行中</h1>
              <h1 v-else>已結束</h1>
              <div class="button_zone">
                <div>
                  <button @click="modifyEvent(index)">修改活動</button>
                  <button>結束活動</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
// import "../font/fff.less";
import $ from "jquery";
import axios from "axios";
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
export default {
  name: "runOrStop",
  components: {
    behindHeader,
    searchBar,
  },
  data() {
    return {
      showWhat: [],
      voteData:{},
      newVoteData:{
        title:'',
        description:'',
        img:'',
        startTime:'',
        endTime:''
      },
      modifyVoteData:{
        title:'',
        description:'',
        img:'',
        startTime:'',
        endTime:'',
      },
      theIndex:0,
      today:'',
    };
  },
  methods: {
    newEvent() {
      this.$emit("runEvent");
    },
    // 修改活動內容
    modifyEvent(index){
      let data = this.voteData[index];
      const params = new URLSearchParams();
      params.append("title", data.EVENT_NAME);
      params.append("description", data.EVENT_DESCRIPTION);
      params.append("endDate", data.END_DATE);
      params.append("id", data.ID);
      axios({
        method: "post",
        url: "http://localhost/static/update_vote_event.php",

        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        data: params,
      })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    
    }
  },
  computed:{
  },
  mounted() {
    $("#runOrStop").siblings().removeClass("target");
    $("#runOrStop").addClass("target");
// 要求最近五筆活動資料照日期排
    this.$axios({
      method: "GET",
      url: "http://localhost/static/quire_vote_activity.php",
    }).then((res) => {
      this.voteData = res.data;
    });
    // 算出今天日期並放在data中
    let day = new Date();
      const today = ((day.getFullYear()+"-"+day.getMonth()+"-"+day.getDate()))
      this.today= today;
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
  padding: 70px 50px;
  .title {
    display: flex;
    justify-content: space-between;
  }
}
#new_event {
  width: 775px;
  height: 250px;
  padding: 20px;
  background: #f7dcdc;
  border-radius: 5px;
  position: relative;
  display: flex;
  align-items: center;
  h1 {
    font-size: 24px;
    color: #515151;
  }
  #plus_new_event {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font-size: 150px;
    color: white;
    cursor: pointer;
  }
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
    flex: 1;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  .text_outline {
    flex: 3;
    display: flex;
    margin-left: 20px;
    flex-direction: column;
    align-items: flex-start;
    .content {
      flex: 1;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      .text_content {
        display: flex;
        align-items: flex-start;
        margin-bottom: 10px;

        p {
          margin: 0 8px 0 0;
          font-size: 18px;
          color: #515151;
        }
        p:nth-child(1) {
          white-space: nowrap;
          vertical-align: top;
        }
      }
    }
    .progress {
      flex: 1;
      display: flex;
      align-items: flex-end;
      width: 100%;
      justify-content: space-between;
      h1 {
        margin: 0;
        color: #515151;
      }
    }
  }
  .button_zone {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    button {
      width: 100px;
      height: 25px;
      font-size: 16px;
      line-height: 16px;
      border-radius: 5px;
      background: #f4e9c9;
      cursor: pointer;
      color: #515151;
      border: none;
      padding: 5px;
      margin: 0 5px;
      &:active {
        box-shadow: inset $shadow;
      }
    }
  }
}
</style>