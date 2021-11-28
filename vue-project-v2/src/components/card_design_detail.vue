<template>
    <div class="card_outline">
        <button class="close_button" @click="closeDesignDetail">
            <font-awesome-icon icon="fa-solid fa-xmark" class="close_icon" />
        </button>
        <div class="img_container">
            <img :src="designDetail.cakeImg">
        </div>
        <div class="description_block">
            <h4 class="cake_title">{{designDetail.cakeName}}</h4>
            <p class="design_idea" v-show="!editing">{{designDetail.cakeDescription}}</p>
            <textarea class="edit_textarea" v-model="designDetail.cakeDescription" v-show="editing"></textarea>
            <div class="editing_placeholder" v-show="editing"></div>
            <div class="status_area">
                <div class="verify">
                    <font-awesome-icon icon="fa-solid fa-circle" class="status_ball_pass" v-show="designDetail.cakeAvailable === '1'"/>
                    <span class="status_text_pass" v-show="designDetail.cakeAvailable === '1'">人氣投票審核通過</span>
                    <font-awesome-icon icon="fa-solid fa-circle" class="status_ball_making" v-show="designDetail.cakeAvailable === '2'"/>
                    <span class="status_text_making" v-show="designDetail.cakeAvailable === '2'">蛋糕製作中</span>
                </div>
                <button class="edit_content" @click="editing = true" v-show="!editing">
                    編輯內文
                </button>
                <button class="edit_content" @click="editing = false; updateCakeDesign()" v-show="editing">
                    完成編輯
                </button>
            </div>
            <div class="division_line"></div>
            <div class="gredient_block">
                <h4>使用配料</h4>
                <div class="gredient_content">
                    <div v-for="(item, index) in designDetail.cakeIngredients" :key="index">{{showCakeIngredient(item)}}</div>
                </div>
            </div>
            <div class="buying_block">
                <button class="go_buying" :style="{fontFamily: `'EB Garamond','jf open 粉圓 1.1'`}" @click="goBuying">
                    再次購買
                    <img src="../assets/images/shoppingCar.svg">
                </button>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import qs from "qs";

export default {
    name: "card_design_detail",
    props: ["designDetail"],
    data(){
        return {
            editing: false,
        }
    },
    computed: {
        
    },
    methods: {
        closeDesignDetail(){
            this.$emit("close", false);
        },
        updateCakeDesign(){
            console.log(this.designDetail);
            axios.post("http://localhost/A_cake/updateCakeDescription.php",qs.stringify({cakeID: this.designDetail.cakeID, cakeDescription: this.designDetail.cakeDescription}))
                .then(res => {
                    console.log(res);
                    this.$emit("cakeDesign", this.designDetail.cakeDescription, this.designDetail.cakeName);
                })
                // .catch(err => console.log(err));
        },
        showCakeIngredient(item){
            return item.ingredientName + ": " + item.ingredientDescription + " × " + item.ingredientQuantity;
        },
        goBuying(){
            this.$emit("close", false);
            this.$router.push({
                path: `/product_detail?id=${this.designDetail.cakeID}`
            });
        },
    },
}
</script>


<style lang="scss" scoped>

@import "../assets/style/var.scss";

.card_outline{
    box-shadow: $shadow;
    position: relative;
    padding: 28px 28px 15px 28px;
    width: 408px;
    height: 785px;
    display: block;
    margin: 0 auto 20px;

    // 開發查看用，組件組合時拿掉
    margin-top: 50px;

    @media (max-width: 575.98px){
        width: 360px;
    }

    .close_button{
        width: 30px;
        height: 30px;
        background-color: #FFFFFF;
        border: 0;
        outline: none;
        position: absolute;
        right: 0;
        top: -46px;
        border-radius: 50%;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, .2);
        cursor: pointer;

        .close_icon{
            font-size: 22px;
            color: $darkGrey;
        }

    }

    .img_container{
        overflow: hidden;
        width: 350px;
        height: 350px;
        margin: 0 auto;

        @media (max-width: 575.98px){
            width: 308px;
            height: 308px;
        }

        img{
            height: 100%;
            width: 100%;
        }

    }

    .description_block{
        position: relative;

        .cake_title{
            margin: 15px 0;
            text-align: left;
            font-size: 21px;
            line-height: 28px;
            color: #515151;
            font-weight: 400;
        }

        .design_idea{
            margin: 0;
            width: 285px;
            height: 85px;
            overflow-y: scroll;
            font-size: 12px;
            color: $darkGrey;
            text-align: left;
        }

        .edit_textarea{
            width: 285px;
            height: 85px;
            position: absolute;
            top: 43px;
            left: 0;
            resize: none;
            outline: none;
            font-size: 12px;
        }
        
        .editing_placeholder{
            width: 285px;
            height: 85px;
        }

        .status_area{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 33px auto 16px;

            .verify{
                font-size: 0px;

                .status_ball_pass{
                    vertical-align: middle;
                    font-size: $p;
                    margin-right: 3px;
                    color: #5A9308;
                }

                .status_text_pass{
                    font-size: 12px;
                    vertical-align: middle;
                    color: #5A9308;
                }

                .status_ball_making{
                    vertical-align: middle;
                    font-size: $p;
                    margin-right: 3px;
                    color: #5975B2;
                }

                .status_text_making{
                    font-size: 12px;
                    vertical-align: middle;
                    color: #5975B2;
                }

            }

            .edit_content{
                width: 85px;
                height: 35px;
                border-radius: 3px;
                border: 0;
                box-shadow: $shadow;
                font-size: $p;
                color: #515151;
                cursor: pointer;
                background-color: #F7EDD4;
                // &:hover{
                    
                // }
                // &:active{
                   
                // }
                
            }

        }

        .division_line{
            border-top: 1px solid #707070;
        }

        .gredient_block{

            > h4{
                margin: 15px 0;
                text-align: left;
                font-size: 21px;
                line-height: 28px;
                color: #515151;
                font-weight: 400;
            }
    
            .gredient_content{
                margin: 0;
                width: 285px;
                height: 32px;   // 感覺不太夠
                margin-bottom: 25px;
                overflow-y: scroll;
                font-size: 12px;
                color: $darkGrey;
                text-align: left;
            }

        }

        .buying_block{
            display: flex;
            justify-content: flex-end;
            align-items: center;

            .go_buying{
                width: 150px;
                height: 50px;
                border-radius: 100px;
                border: 0;
                box-shadow: $shadow;
                font-size: $p;
                position: relative;
                color: #515151;
                cursor: pointer;
                background-color: $lightPike;
                &:hover{
                    background-color: #F4E9C9;
                }
                
                > img{
                    width: 16.5px;
                    height: 16.5px;
                    position: absolute;
                    right: 15px;
                    top: 17px;
                }
            }

        }

    }

}

</style>