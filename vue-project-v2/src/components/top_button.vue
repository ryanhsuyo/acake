<template>
    <div>
        <button type="button" id="go_top" @click="top">
            <img src="../assets/images/butter.png">
            <p>TOP</p>
            <!-- <span></span> -->
        </button>
    </div>
</template>
<script>
import $ from "jquery";
export default {
    name: "top_button",
    props: ["topButton"], //上層屬性用這三個
    methods: {
        // top(){
        //     window.scrollTo(0, 0);
        // }
    },
    mounted() {
        $("#go_top").on("click", function(e){
            e.preventDefault();
            $('html, body').animate({
            scrollTop: 0
            }, 750);
        });
    },
}
</script>
<style scoped lang="scss">
#go_top{
  width: 60px;
  height: 60px;
  background: none;
  position: fixed;
  right: 20px;
  bottom: 20px;
  color: white;
  background-color: #F0D5CE;
  border-radius: 50%;
  /* font-size: 20px;
  /* color: #343535; */
  align-items: center;
  line-height: 1;
  outline: none;
  cursor: pointer;
  border: none;
  box-shadow: 2px 2px 3px 0px hsla(0, 0%, 0%, .2);
  z-index:999;
  animation: floattop;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}
#go_top img{
  margin-top: -5px;
  height: 35px;
}
#go_top p{
  font-size: 6px;
  color: #515151;
  margin: 0;
  margin-top: -5px;
  font-style: italic;
}
span{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border:  1.8px solid #515151;
    border-radius: 50%;
    width: 55px;
    height: 55px;
}

@keyframes floattop{

0% {

    transform: translate(0px, 0px);
}

50% {
    transform: translate(0px, -10px);
}

100% {
    transform: translate(0px, 0px);
}}
</style>