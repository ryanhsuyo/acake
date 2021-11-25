<template>
<<<<<<< HEAD
  <div id="app">
=======
  <div id="app" :style="{fontFamily: `'EB Garamond','jf open 粉圓 1.1'`, padding: `0 !important`}">
>>>>>>> 977b379c662b4cd155e13ad6cf4a9f1ef83ff19c
    
    <router-view></router-view>
    
  </div>
</template>
<script>
import $ from "jquery";
export default {
  name: "App",
  components: {
  },
  mounted(){
    $("body").css({"margin":0,"padding":0,"backgroundColor":"#EFE6E4"});
    // console.log(1)
  },
  
  data(){
    return{
      show:true,
      fontSetting:{
        fontFamily: 'jf open 粉圓 1.1',
    src:(require('../static/font/jf-openhuninn-1.1.ttf')),
      },
    }
  }
};

</script>
<style  lang="scss">
@import "./assets/style/var.scss";
*{
  font-family: 'EB Garamond','TEST';
}
@font-face {
  font-family: 'EB Garamond';
  src: url('~@/assets/style/EBG.ttf');
};
@font-face {
  font-family: 'TEST';
  src: url('~@/assets/style/jf-openhuninn-1.1.ttf');
};
</style>