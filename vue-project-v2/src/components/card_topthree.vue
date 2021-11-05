<template>
  <div class="vote_topthree">
    <img src="../assets/images/chefHatNo2.png" alt="" class="topthree_hat" />
    <img src="../assets/images/cho_cake.jpg" alt="" class="pic_cake" />
    <div>
      <h1>巧克力蛋糕</h1>
      <p>Chocolate cake</p>
    </div>
  </div>
</template>
<script>
import $ from "jquery";
export default {
  name: "card_topthree",
};
</script>
<style scoped lang="scss">
$shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
* {
  box-sizing: border-box;
}
div.vote_topthree {
  margin: 0 auto;
  display: inline-block;
  position: relative;
  background-color: #f7edd4;
  color: #515151;
  .topthree_hat {
    position: absolute;
    width: 110px;
    height: 110px;
    border: 1px solid red;
    left: -20px;
    top: -50px;
    transform: rotate(-15deg);
  }
  .pic_cake {
    height: 260px;
  }
  > div {
    padding: 10px;
    h1 {
      margin: 0;
    }
    p {
      margin: 0;
    }
  }
}
</style>