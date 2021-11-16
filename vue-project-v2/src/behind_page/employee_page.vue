<template>
  <div>
    <behind-header thistitle="員工管理"></behind-header>
    <div id="top_bar">
      <h1>員工資料第{{ sn }}頁</h1>
      <search-bar></search-bar>
    </div>

    <div id="new_employee" v-if="create">
      <font-awesome-icon
        icon="fa-solid fa-square-plus"
        id="plus"
        @click="create = 0"
      />
    </div>
    <div id="new_employee" v-else>
      <form @submit.prevent="sendData">
        <section class="first_site">
          <div id="employee">
            <div class="manager_list">
              <div class="manager_img_outline">
                <img src="" alt="" />
                <button>修改照片</button>
              </div>
              <div class="manager_list_content">
                <div class="manager_details">
                  <label for="">員工編號</label>
                  <input
                    class="authority"
                    type="text"
                    v-model="new_employee.number"
                  />
                </div>
                <div class="manager_details">
                  <label for="">員工密碼</label>
                  <input
                    class="authority"
                    type="password"
                    v-model="new_employee.password"
                  />
                </div>
                <div class="manager_details">
                  <label for="">員工姓名</label>
                  <input
                    class="authority"
                    type="text"
                    v-model="new_employee.name"
                  />
                </div>
              </div>
              <div class="manager_list_content">
                <div class="manager_details">
                  <label for="">創建員工</label>
                  <input
                    class="authority"
                    type="text"
                    v-model="new_employee.biulder"
                  />
                </div>
                <div class="manager_details">
                  <label for="">創建日期</label>
                  <input
                    class="authority"
                    type="text"
                    v-model="new_employee.create_date"
                  />
                </div>
                <div class="manager_details">
                  <label for="">權限</label>
                  <select
                    name=""
                    class="authority"
                    v-model="new_employee.authority"
                  >
                    <option value="0">管理者</option>
                    <option value="1">超級管理者</option>
                  </select>
                </div>
              </div>
              <!--按鈕開關-->
              <div class="manager_list_button">
                <span class="switch_button">
                  <label for="">狀態</label>
                  <div class="switch" id="outline">
                    <span class="circle" id="circle"></span>
                  </div>
                </span>
                <span></span>

                <button>確認送出</button>
              </div>
            </div>
          </div>
        </section>
      </form>
    </div>
    <!-- 以上為新建員工 -->

    <!-- 以下為員工資料 -->
    <div class="forPosition" v-for="(data, index) in data" :key="index">
      <template>
        <section class="first_site">
          <div id="employee">
            <div class="manager_list close">
              <font-awesome-icon
                icon="fa-solid fa-sort-up"
                class="arrow"
                @click="open($event, index)"
              />
              <span
                class="switch_button"
                @click="[change(index), updateData(index)]"
              >
                <label for="">狀態</label>
                <div
                  class="switch"
                  id="outline"
                  :class="{ '-on': data.ACTIVE }"
                >
                  <span
                    class="circle"
                    id="circle"
                    :class="{ '-on': data.ACTIVE }"
                  ></span>
                </div>
              </span>
              <div class="manager_img_outline">
                <img src="" alt="" class="employee_image" />
                <button @click="clickInput(index, $event)">修改照片</button>
                <input
                  type="file"
                  style="display: none"
                  class="imageButton"
                  @click="setImage()"
                />
              </div>
              <div class="manager_list_content">
                <div class="manager_details">
                  <label for="">員工編號</label>
                  <input class="authority" type="text" v-model="data.ID" />
                </div>
                <div class="manager_details">
                  <label for="">員工密碼</label>
                  <input
                    class="authority"
                    type="password"
                    v-model="data.PASSWORD"
                  />
                </div>
                <div class="manager_details">
                  <label for="">創建員工</label>
                  <input class="authority" type="text" v-model="data.BIULDER" />
                </div>
              </div>
              <div class="manager_list_content">
                <div class="manager_details">
                  <label for="">員工姓名</label>
                  <input
                    class="authority"
                    type="text"
                    v-model="data.EMPLOYEE_NAME"
                  />
                </div>
                <div class="manager_details">
                  <label for="">創建日期</label>
                  <input
                    class="authority"
                    type="text"
                    v-model="data.CREATE_DATE"
                  />
                </div>
                <div class="manager_details">
                  <label for="">權限</label>
                  <select name="" class="authority">
                    <option value="" :selected="data.AUTHORITY == 0">
                      管理者
                    </option>
                    <option value="" :selected="data.AUTHORITY == 1">
                      超級管理者
                    </option>
                  </select>
                </div>
              </div>
              <!--按鈕開關-->
              <div class="manager_list_button">
                <button @click="updateData(index)">修改</button>
                <button>確認</button>
              </div>
            </div>
          </div>
        </section>
      </template>
    </div>
    <ul>
      <li
        v-for="(number, index) in pages"
        :key="index"
        @click="getDataNumber(index)"
      >
        <router-link :to="'/employee/' + (index + 1)">{{ number }}</router-link>
      </li>
    </ul>
  </div>
</template>
<script>
import $ from "jquery";
import VueAxios from "vue-axios";
import axios from "axios";
// Vue.use(VueAxios,axios);
import behindHeader from "../components/behind_page_headercom";
import searchBar from "../components/search_bar";
import employee from "../components/employee";
export default {
  name: "employee_page",
  components: {
    behindHeader,
    searchBar,
    employee,
  },
  data() {
    return {
      data: {},
      create: 1,
      new_employee: {
        number: "",
        name: "",
        password: "",
        authority: "",
        create_date: "",
        biulder: "",
        img: "",
      },
      theIndex: 0,
      pages: [],
      imgData:{},
    };
  },
  mounted() {
    console.log(this.sn);
    $("#employee").siblings().removeClass("target");
    $("#employee").addClass("target");
    // 開始請求資料
    const url = "api";
    const params = new URLSearchParams();
    params.append("page", this.sn - 1);
    this.$axios({
      method: "POST",
      url: "http://localhost/static/quire_member.php",
      data: params,
    }).then((res) => {
      this.data = res.data;
      for (let i = 0; i < this.data.length; i++) {
        this.data[i].ACTIVE = parseInt(this.data[i].ACTIVE);
      }
    });

    // 產生頁數寫入pages[]
    this.$axios({
      method: "get",
      url: "http://localhost/static/quire_member_total.php",
    }).then((res) => {
      let pages = Math.ceil(res.data / 10);
      for (let i = 1; i <= pages; i++) {
        this.pages.push(i);
      }
    });
  },
  methods: {
    open: function ($event, index) {
      this.theIndex = index;
      $($event.target)
        .parents(".forPosition")
        .siblings()
        .children()
        .children()
        .children(".manager_list")
        .addClass("close");
      $($event.target)
        .parents(".forPosition")
        .children()
        .children()
        .children(".manager_list")
        .toggleClass("close");
    },
    change(index) {
      let i = this.data[index].ACTIVE;
      this.data[index].ACTIVE = this.data[index].ACTIVE ? 0 : 1;
    },
    getDataNumber(index) {
      window.scrollTo(0, 0);
      const params = new URLSearchParams();
      params.append("page", index);
      axios({
        method: "post",
        url: "http://localhost/static/quire_member.php",

        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        data: params,
      })
        .then((res) => {
          // console.log(res.data);
          this.data = res.data;
          for (let i = 0; i < this.data.length; i++) {
            this.data[i].ACTIVE = parseInt(this.data[i].ACTIVE);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    sendData() {
      let number = this.new_employee.number;
      let password = this.new_employee.password;
      let name = this.new_employee.name;
      let biulder = this.new_employee.biulder;
      let create_date = this.new_employee.create_date;
      let authority = this.new_employee.authority;
      let data = this.new_employee;
      const params = new URLSearchParams();
      params.append("number", number);
      params.append("password", password);
      params.append("name", name);
      params.append("biulder", biulder);
      params.append("create_date", create_date);
      params.append("authority", authority);
      params.append("data", data);
      // const json = encodeURI(JSON.stringify(data),'utf-8')
      axios({
        method: "post",
        url: "http://localhost/static/join_employee.php",

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
      this.create = 1;
      this.new_employee.number = "";
      this.new_employee.password = "";
      this.new_employee.name = "";
      this.new_employee.biulder = "";
      this.new_employee.create_date = "";
      this.new_employee.authority = "";
    },
    updateData(index) {
      let data = this.data[index];
      const params = new URLSearchParams();
      params.append("id", index);
      params.append("page", this.sn);
      params.append("name", data.EMPLOYEE_NAME);
      params.append("password", data.PASSWORD);
      params.append("authority", data.AUTHORITY);
      params.append("active", data.ACTIVE);
      const json = encodeURI(JSON.stringify(data), "utf-8");
      axios({
        method: "post",
        url: "http://localhost/static/update_employee.php",

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
    },
    clickInput(index, $event) {
      let file = $event.target.nextSibling.nextSibling;
      this.theIndex = index;
      file.click();
    },
    setImage() {
      let button =
        document.querySelectorAll("input[type='file']")[this.theIndex];
      button.onchange = this.pushImage;
    },
    pushImage() {
      let that = this;
      let index = this.theIndex;
      let file =
        document.querySelectorAll("input[type='file']")[this.theIndex].files[0];
        // this.imgData = file
      this.new_employee.img = file.name;
      let readFile = new FileReader();
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", function () {
        let image = document.getElementsByClassName("employee_image")[index];
        image.src = readFile.result;
        
      });
    },
  },
  watch: {
    theIndex: {
      handler: function (newValue) {
        // this.theIndex=newValue
      },
      deep: true,
    },
  },
  computed: {
    sn() {
      return this.$route.params.sn;
    },
  },
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
.first_site {
  width: 1000px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 70px;
  margin-top: 70px;
}
#employee {
  display: grid;
  gap: 30px;
  text-align: center;
  justify-content: center;
  align-items: center;
}
.forPosition {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.manager_list {
  border-radius: 10px;
  overflow: hidden;
  width: 1000px;
  height: 250px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  padding: 20px;
  background-color: #f0d5ce;
  transition: 0.3s;
  .arrow {
    position: absolute;
    right: 10px;
    top: 30px;
    cursor: pointer;
    transition: 0.3s;
    // transform:rotate(180deg);
  }
  .switch_button {
    top: 22px;
    right: 40px;
  }
  .manager_img_outline {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    img {
      width: 200px;
      height: 200px;
      object-fit: cover;
    }
    button {
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
    }
  }
  .manager_list_content {
    display: flex;
    flex-direction: column;
    height: 200px;
    justify-content: space-between;
    align-items: center;
    font-size: 0;
  }
  .manager_details {
    width: 280px;
    display: flex;
    align-items: center;
    flex-direction: row;
    justify-content: space-around;
  }
  label {
    font-size: 20px;
    width: 90px;
  }
  .authority {
    width: 180px;
    text-align: center;
  }
}
.manager_list.close {
  height: 80px;
  overflow: hidden;
  justify-content: center;
  gap: 100px;
  .arrow {
    top: 25px;
    transform: rotate(180deg);
  }
  .manager_list_button {
    display: none;
  }
  .manager_img_outline {
    display: none;
  }
  .manager_list_content {
    height: auto;
    > div:nth-child(2),
    div:nth-child(3) {
      display: none;
    }
  }
  .switch_button {
    right: 30px;
    top: 25px;
  }
}
.manager_list_button {
  width: 115px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  gap: 30px;
  height: 200px;

  .switch {
    width: 40px;
    height: 25px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    border-radius: 20px;
    background-color: #454545;
    position: relative;

    .circle {
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
  button {
    background-color: #454545;
    border-radius: 10px;
    color: white;
    cursor: pointer;
  }
}
select {
  border: 2px solid;
}
.switch_button {
  position: absolute;
  display: flex;
  align-items: center;
  label {
    width: auto;
    margin-right: 5px;
  }
  #circle {
    border-radius: 50%;
    transition: 0.3s;
  }
}
.switch {
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
    border-radius: 50%;
    background-color: white;
    display: inline-block;
    position: relative;
    left: 2px;
    top: -1px;
    // left: 14px;
    transition: 0.5s;
  }
  .circle.-on {
    left: 18px;
    transition: 0.5s;
  }
}

.switch.-on {
  transition: 0.5s;
  background-color: green;
}
#top_bar {
  width: 1000px;
  margin: 0 auto;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}
#new_employee {
  width: 1000px;
  height: 250px;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #f0d5ce;
  border-radius: 5px;
  margin-top: 70px;
  .fa-square-plus {
    color: white;
    font-size: 200px;
    cursor: pointer;
  }
}
ul {
  margin: 0;
  margin-bottom: 50px;
  padding: 0;
  list-style: none;
  display: flex;
  gap: 20px;
  align-items: center;
  justify-content: center;
  a {
    font-size: 16px;
    text-decoration: none;
    color: #515151;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background: white;
    &:hover {
      background: black;
      color: white;
    }
  }
}
</style>