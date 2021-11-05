<template>
  <div class="title_h1">
    <span></span>
    <div class="outline">
      <img src="../assets/images/eggBeater.png" alt="" />
      <h1>{{ title }}</h1>
      <img src="../assets/images/eggBeater.png" alt="" />
    </div>
  </div>
</template>
<script>
import $ from "jquery";
export default {
  name: "title_h1",
  props: ["title"], //上層屬性用這三個
  data() {
    return {
      //   title:123,
    };
  },
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
  box-sizing: border-box;
}
.title_h1 {
  display: inline-block;
  position: relative;
  .outline {
    display: flex;
  }
  h1 {
    display: inline-block;
    margin: 0;
    font-size: 36px;
    color: #515151;
  }
  span {
    display: inline-block;
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 100%;
    height: 5px;
    border-radius: 5px;
    background-color: #dfb9b0;
  }
  img {
    max-width: 50px;
    max-height:50px;
    transform: translateY(5px);
    width: 100%;
    height: 100%;
    // vertical-align: middle;
    // position: relative;
    // transform: translateY(-10px);
  }
}
@media (max-width: 576px) {
  .title_h1 {
    h1 {
      font-size: 24px;
      position: relative;
      line-height: 48px;
    }

    img {
      width: 40px;
      height: 40px;
      transform: translateY(5px);
    }
  }
}
</style>