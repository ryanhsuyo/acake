<template>
  <div id="app" :style="{fontFamily: `'EB Garamond','jf open 粉圓 1.1'`}">
    
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
    }
  }
};

</script>
<style  lang="scss">
  // *{
  //   font-family: 'EB Garamond','jf open 粉圓 1.1';
  // }
</style>