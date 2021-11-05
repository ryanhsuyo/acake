<template>
    <div>
        <headercom></headercom>
        <div id="main-bar-img300"></div>
        <main class="shopping_cart_main">
            <titleh1 class="titleh1rwd" title="購物車"></titleh1>
            <section class="shopping_cart_bread">
                <span class="shopping_cart_page">購物車</span>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="prepare_checkout_page">準備結帳</span>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="checkout_page">結帳完成</span>
            </section>
            <div class="checkout_complete_titlebar">
                <section class="checkout_complete_list_outline">
                    <div class="checkout_complete_list_titlebar">
                        <div class="list_id">
                            <label>訂單已送出</label>
                        </div>
                    </div>
                </section>
            </div>
            <div class="checkout_complete_list">
                <div class="checkout_complete_list_orderidandother">
                    
                    <div class="checkout_complete_list_orderid">
                            親愛的買家您好，非常感謝您的訂購，您的訂單#211021D0tJ7WAH將於2021/11/23送達
                    </div>
                    <div class="checkout_complete_list_orderother">
                        請再次確認商品詳細內容，若有任何訂單上的疑問歡迎透過Q&A聯絡我們，將由專人為您解答。另外提醒您，由於蛋糕採新鮮現做，3日內冷藏食用完畢為佳
                            想進一步瞭解A cake的產品或服務， 或是對我們有任何寶貴意見，都歡迎您與我們聯繫，我們將竭誠為您服務!
                    </div>
                </div>
            </div>
            <router-link to="member_order">
                <button class="checkout_complete_goto_statement_sumbit">訂單查詢</button>
            </router-link>
        </main>
        <footercom></footercom>
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "../components/title_h1.vue"
export default {
    name:'shopping_cart',
    components:{
        titleh1,
        headercom,
        footercom,
    },
    data(){
        return{
            asd:123546
        }
    },
    methods:{
    },
    watch:{
        
    },
    computed:{
        

    },
    mounted(){
    },

    
}

</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
*{
    box-sizing: border-box;
}
body{
    background-color: $bg;
}

#main-bar-img300{
    margin-top: 50px;
    height: 300px;
    background-image: url("../assets/images/background_img300.png");
    background-size: auto 100%;
    background-position: center center;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: -1;
}
.shopping_cart_main{
    display: flex;
    flex-direction: column;
    align-items: center;
    .titleh1rwd{
        margin-top: 150px;
        margin-bottom: 20px;
        @media screen and (max-width:767.98px){ 
            display: flex;
            justify-content: center;
            margin: 0 auto;
            margin-top: 150px;
            margin-bottom: 50px;
            align-items: center;
        }
    }
    // 購物車麵包屑
    .shopping_cart_bread{
        width: 70%;
        justify-content: space-around;
        display: flex;
        margin: 0 auto;
        max-width: 1120px;
        font-size: $h1;
        margin-top: 200px;
        margin-bottom: 50px;
        @media screen and (max-width:767.98px){ 
            display: flex;
            margin-top: 150px;
            flex-direction: column;
            align-items: center;
            height: 200px;
        }
        .shopping_cart_page,.prepare_checkout_page,.checkout_page{
            font-size: $h1;
            max-width: 200px;
            width: 100%;
            display: flex;
            justify-content: center;
            @media screen and (max-width:767.98px){ 
                font-size: $h4;
            }
        }
        .shopping_cart_page,.prepare_checkout_page{
            color: $darkGrey;
            opacity: .2;
        }
        .shopping_cart_bread_arrow{
            width: 100%;
            max-width: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            .shopping_cart_bread_arrow_img{
                width: 20px;
                height: 20px;
                object-fit: fill;
                @media screen and (max-width:767.98px){ 
                    width: 20px;
                    height: 20px;
                    object-fit: cover;
                    transform: rotate(90deg);
                }
            }
        }
    }
}
     // 購物車麵包屑結束
.checkout_complete_goto_statement_sumbit{
    margin-top: 100px;
    margin-bottom: 100px;
    width: 120px;
    height: 60px;
    border-radius: 10px;
    background-color: $darkGrey;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: $h4;
    box-shadow: $shadow;
}
.checkout_complete_goto_statement_sumbit:hover{
    color: $lightYellow;
    cursor: pointer;
}
.checkout_complete_titlebar{
    background-color: $palePike;;
    max-width: 1120px;
    width: 100%;
    display: flex;
    border-radius: 10px 10px 0 0 ;
    height: 100px;
    align-items: center;
    justify-content: center;
    font-size: 28px;
}
.checkout_complete_list{
    height: 250px;
    max-width: 1120px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    background-color: $lightYellow;
}
.checkout_complete_list_orderidandother{
    height: 120px;
    max-width: 1080px;
    width: 95%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.checkout_complete_list_orderid{
    max-width: 1120px;
    display: flex;
    justify-content: center;
    width: 100%;
    font-size: $p;
}
.checkout_complete_list_orderother{
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1120px;
    width: 100%;
    text-align: center;
    font-size: $p;
}
.checkout_complete_list_outline{
    display: flex;
}
.checkout_complete_list_titlebar{
    align-items: center;
    justify-content: center;
    font-size: 28px;
}
.list_id{
    align-items: center;
    display: flex;
    justify-content: center;
    max-width: 1120px;
    width: 100%;
}
@media screen and (max-width:767.98px){
    .checkout_complete_titlebar{
        max-width: 576px;
        width: 100%;
    }

    .checkout_complete_list{
        height: 300px;
        max-width: 576px;
        width: 100%;
    }
    .checkout_complete_list_orderidandother{
        max-width: 496px;
        width: 95%;
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }
    .checkout_complete_list_orderid{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    .checkout_complete_list_orderother{
        text-align: center;
        display: flex;
        justify-content: center;
    }
    .checkout_complete_goto_statement_sumbit{
        margin-top: 50px;
    }
}

</style>