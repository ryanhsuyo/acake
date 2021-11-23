<template>
    <div class="favorite" v-show="openFavorite" @click="openFavorite">
        <div class="favoriteChangeBox" v-for="(choose, index) in choosefavorite" :key="index">
            <div class="favoriteBox">{{choose.CATEGORY_NAME}}</div>
        </div>
    </div>
</template>
<script>
import $ from "jquery";
import axios from "axios"
import qs from "qs"
export default {
name: "switchTab",
    data(){
        return{
            switch_tab: true,
            choosefavorite: [],
        }
    },
    props:['openFavorite'],
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
        {
            // axios.post("./static/jiawei.api/productSelectCake.php",qs.stringify({cakeID: this.CAKE_ID}))
        axios.post("http://localhost/A_cake/cakeSelectFavoriteBox.php",qs.stringify({cakeID: this.CAKE_ID}))
            .then(res => {
                console.log('讓我看看res.data',res.data);
                let data = res.data;
                // let datalength = data.length
                this.choosefavorite = data.filter(item => item.MEMBER_ID === "1");
                console.log('cty',choosefavorite);
                    
                // console.log('我的最愛',this.favorite);


                // this.designerCake = data.filter(item => item.MEMBER_ID !== "0");
                })
            .catch((error) => {
                console.log(error);
            })
        }
        
    
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
.favorite{
    position: absolute;
    top: 35px;
    right: 0;
    background-color: $darkGrey;
    color: white;
    border-radius: 10px;
    .favoriteChangeBox{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 5px;
        // justify-content: space-between;
        max-width: 300px;
        width: 100%;
        .favoriteBox{
            display: flex;
            justify-content: flex-end;
            cursor: pointer;
            width: 100%;
            white-space: nowrap;
            &:hover{
                color: $lightYellow;
                text-decoration: underline;
            }
            
        }
    }
}
</style>
