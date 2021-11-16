<template>
<div>
    <!-- <span class="circle_one"></span>
    <span class="circle_two"></span>
    <span class="circle_three"></span> -->
	<button class="button_h1">
        <img src="../assets/images/cake_design/decoration4.png">{{title}}
        <img src="../assets/images/cake_design/decoration4.png">
        <span>GOOOOO !</span>
    </button>
    <!-- <span class="circle_four"></span>
    <span class="circle_five"></span> -->
</div>
</template>
<script>
// import "../font/fff.less";
import $ from 'jquery'
export default {
  name:"button_h1",
  props:["title"],
}
</script>
<style scoped lang="scss">
$shadow:4px 4px 5px 0 rgba(0, 0, 0, 0.3);
*{
    box-sizing: border-box;
}
// span.circle_one{
//     background-color: #dfb9b0;
//     width: 10px;
//     height: 10px;
//     border-radius: 5px;
// }
.button_h1 {
    font-family: "EB Garamond";
    width: 250px;
    height: 75px;
    border-radius: 5px;
    background-color: #dfb9b0;
    color: #515151;
    font-size: 20px;
    border: none;
    box-shadow: $shadow;
    transition: 0.2s;
    
    img{
        width:30px;
        height:30px;
        position:relative;
        transform: translateY(5px);
    }
    > span {
        transform: translateY(-2px);
        display: block;
        font-size: 12px;
    }
    &:hover {
        background-color: #f4e9c9;
        cursor: pointer;
        transform: translateY(-5px);
    }
}

</style>