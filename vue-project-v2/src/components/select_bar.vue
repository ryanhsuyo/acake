<template>
<div>
    <select name="" id="select_box">
        <option value="model">糕體</option>
        <option value="fruits">配料</option>
        <option value="decorations">裝飾</option>
    </select>
</div>
  <!-- <input
    type="text"
    placeholder="搜尋..."
    class="search"
    v-model.lazy="forSearch"
  /> -->
</template>
<script>
import axios from "axios";
export default {
  name: "select_bar",
  props: ["title"],
  data() {
    return {
      forSearch: "",
    };
  },
  watch: {
    forSearch: {
      handler: function (newValue) {
        this. $emit("selectData", newValue);
      },
      deep: true,
    },
  },
};
</script>
<style scoped lang="scss">
* {
  box-sizing: border-box;
}
select#select_box {
  width: 400px;
  max-width: 100%;
  height: 50px;
  border-radius: 100px;
  border: none;
  padding: 0 30px;
  opacity: 70%;
  background: rgba(255, 255, 255, 1);
  box-shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
  font-size: 20px;
  cursor: pointer;
  // color:red;
  &:focus {
    border: none;
  }
}
</style>