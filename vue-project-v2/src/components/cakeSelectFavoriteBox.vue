<template>
    <div class="favorite" v-show="openFavorite">
        <div class="favoriteChangeBox" v-for="(choose, index) in allFavorite" :key="index">
            <div class="favoriteBox" @click="writeFavorite(choose)">{{choose.CATEGORY_NAME}}</div>
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
            totalFavoriteID: '1',
        }
    },
    props:['allFavorite','openFavorite','cakeID'],
    methods: {
        switchLite(){
            this.$emit("receive",this.switch_tab);
        },
        writeFavorite(choose){
            let isOK = confirm("是否要把此蛋糕加入收藏")
            if(isOK){
                let that = this;
                let data = new URLSearchParams();
                data.append('fileID',choose.CATEGORY_ID);
                data.append('cakeID',this.cakeID)
                data.append('allID',this.totalFavoriteID)
                axios({
                    method:"POST",
<<<<<<< HEAD
                    url:'http://localhost/yoyo/insertFavorite.php',
=======
                    url:'./static/yoyo_api/insertFavorite.php',
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
                    data,
                }).then((res)=>{
                    alert(`已將此蛋糕加入${choose.CATEGORY_NAME}資料夾`)
                    that.$emit('callFile');
                }).catch((err)=>{
                    console.log(err)
                })
            }
        }
    },
    computed:{
        Case(){
            return this.switch_tab? true:false;
        }
    },
<<<<<<< HEAD

=======
    mounted(){
        this.$emit('callFile');
        axios.post("./static/yoyo_api/cakeSelectFavoriteBoxAll.php",qs.stringify({cakeID: this.CAKE_ID}))
            .then(res => {
                    this.allFavorite = res.data;
                    this.totalFavoriteID = this.allFavorite.filter((item)=>{return item.CATEGORY_NAME=='所有收藏'}
                        )
                        [0].CATEGORY_ID
                })
            .catch((error) => {
                console.log(error);
            })
        
        
    
    },
    watch:{
    },
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
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
