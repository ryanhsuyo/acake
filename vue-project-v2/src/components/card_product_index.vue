<template>
	<div class="card_outline">
        <div class="img_container">
            <img src="../assets/images/cho_cake.jpg">
        </div>
        <div class="down_block">
            <div class="voting_area">
                <div class="voting_num">
                    <h4 class="cake_title">無敵大蛋糕</h4>
                    <p class="price">NT $500</p>
                </div>
                <button class="voting" :style="{fontFamily: `'EB Garamond','jf open 粉圓 1.1'`}">
                    加入我的最愛
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"card_voting_index",
    data(){
        return{
            // choose:0,
            // vote:310,
        }
    },
    methods:{
        // votePlus(){
        //     if(this.choose == 0){
        //         this.vote++
        //     }else{
        //         this.vote--
        //     }
        // }
    }
}
</script>
<style scoped lang="scss">
$shadow:4px 4px 5px 0 rgba(0, 0, 0, 0.3);
*{
    box-sizing: border-box;
}
.card_outline{
    box-sizing: border-box;

    background-color: #DFB9B0;
    width: 350px;
    height: 480px;
    padding: 25px;
    border-radius: 7px;
    box-shadow: $shadow;
    .img_container{
        overflow: hidden;
        width: 300px;
        height: 300px;
        margin: 0 auto;
        img{
            height: 100%;
            width: 100%;
        }
    }
    .down_block{
        .voting_area{
            display: flex;
            justify-content: space-between;
            align-items: center;
            .voting_num{
                margin-top: 35px;
                    .cake_title{
                        margin: 15px 0;
                        text-align: left;
                        font-size: 20px;
                        line-height: 20px;
                        color: #515151;
                        font-weight: 400;
                    }
                    p.price{
                        font-size: 20px;
                        color: #515151;
                        margin-top: 0px;
                    }
                // .heart_icon{
                //     @extend %heart_icon;
                // }
                .num{
                    font-size: 20px;
                    vertical-align: top;
                    line-height: 25px;
                    color: #515151;
                }
            }
            .voting{
                margin-top: 15px;
                width: 180px;
                height: 60px;
                padding-right: 25px;
                border-radius: 100px;
                border: 0;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
                font-size: 20px;
                position: relative;
                color: #515151;
                cursor: pointer;
                background-color: #EFE6E4;
                &:hover{
                    background-color: #F4E9C9;
                }
                
                span{
                    @extend %heart_icon;
                    position: absolute;
                    right: 15px;
                    top: 30px;
                    transform: translateY(-50%);
                }
            }
            .voting.check{
                box-shadow: inset $shadow;
                background: #F4E9C9;
            }
        }
    }
}

// 設定愛心的背景圖
%heart_icon{
    background-image: url('../assets/images/favorites_icon_1.svg');
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center center;
    display: inline-block;
    height: 22px;
    width: 22px;
}
</style>