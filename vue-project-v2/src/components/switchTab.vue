<template>
    <div class="change_page" @click="switchLite">
        <div class="chef_cake" :class="{'-on':Case}" @click="switch_tab = true" is="chefpage">主廚推薦</div>         
        <div class="designer_cake" :class="{'-on':!Case}" @click="switch_tab = false" is="designerpage">創意點子</div>         
    </div>
</template>
<script>
import $ from "jquery";
export default {
name: "switchTab",
    data(){
        return{
            switch_tab: true,
        }
    },
    methods: {
        switchLite(){
            this.$emit("receive",this.switch_tab);
        }
    },
    computed:{
        Case(){
            return this.switch_tab? true:false;
        }
    },
    mounted(){
    },
    watch:{
    },
};
</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
* {
box-sizing: border-box;
}
.change_page{
        margin-top: 150px;
        max-width: 1120px;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 50px;
        @media screen and (max-width:767.98px){ 
            max-width: 400px;
            width: 95%;
            display: flex;
            justify-content: center;
        }
    }
    .chef_cake,.designer_cake{
        width: 50%;
        font-size: $h3;
        color: $darkGrey;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: $shadow;
        // border-radius: 0px 10px 10px 0px;
        background-color: #F7F2F1;
        &:hover{
            font-weight: bold;
            text-shadow: 0px 0px 1px $darkGrey(0,0,0,.8);
        }
    }
    .-on{
    background-color: $palePike;
    box-shadow: inset $shadow,inset $shadow;
    }
    .chef_cake{
        border-radius: 10px 0px 0px 10px;
    }
    .designer_cake{
        border-radius: 0px 10px 10px 0px;

    }
</style>
