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
            <section class="bill_list_outline">
                <div class="bill_list_titlebar">
                    <div class="list_id">
                        <label>您的訂單</label>
                    </div>
                </div>
                <div class="bill_list_contentbar">
                    <div class="bill_individual_outline">
                        <form class="bill_individual">
                            <div class="bill_individual_title">帳單資訊</div>
                            <div class="recipient">
                                <label class="bill_individual_title_short">收件人</label>
                                <input class="bill_individual_short" type="text" name="catchperson" id="" placeholder="請輸入收件人名稱" v-model="recipient">
                            </div>
                            <div class="phone">
                                <label class="bill_individual_title_short">連絡電話</label>
                                <input class="bill_individual_short" type="tel" name="" id="" placeholder="請輸入能與您聯繫的電話" v-model="phone">
                            </div>
                            <div class="preset_address">
                                <div class="address_inline">
                                    <input type="radio"  name= "address" id="" checked>運送到預設地址
                                </div>
                                <input class="bill_individual_address" type="textarea" value="本來的地址本來的地址本來的地址本來的地址本來的地址"  v-model="address">
                            </div>
                            <div class="new_address">
                                <div class="address_inline">
                                <input type="radio" name="address" id="">運送到不同地址
                                </div>
                                <input class="bill_individual_address"  type="textarea" v-model="otheraddress">
                            </div>
                            <div class="send_date">
                                <label class="bill_individual_title_short">寄送日期</label>
                                <input class="bill_individual_short" type="date" name="" id="" >
                            </div>
                            <div class="mark">
                                <label class="bill_individual_title_long">註記<span class="bill_individual_title_marktext">(選擇宅配需在下方留下您當日方便收件時間)</span></label>
                                <textarea class="bill_individual_mark" type="text" name="" id="" placeholder="請留下配送當日您方便收件的時間及其他想傳達給我們的資訊"></textarea>
                            </div>
                            
                            <div class="ready_to_checkout_coupon">
                                <input type="checkbox" name="" class="ready_to_checkout_coupon_click" checked>
                                <label for="">使用折價卷</label>
                            </div>
                            <coupon class="coupon"></coupon>
                        </form>
                    </div>


                    <!-- 我的訂單 -->
                    <div class="bill_details_outline">
                        <form action="" class="ready_bill_details">
                            <div class="ready_bill_details_title">您的訂單</div>
                            <label class="ready_bill_details_second_title">商品</label>
                            <div class="hr3"></div>
                            <div class="combination_ready">
                                <div class="ready_bill_details_product_title">
                                    <div class="ready_bill_details_product_cakesizeamount">
                                        <label class="ready_bill_details_product_item" for="">巧克力蛋糕</label>
                                        <label class="ready_bill_details_product_cake_size">(6吋)</label>
                                        <label class="ready_bill_details_product_cake_x">X</label>
                                        <label class="ready_bill_details_product_cake_amount">1</label>
                                    </div>
                                    <div class="ready_bill_details_product_twandprice">
                                        <label class="ready_bill_details_product_cake_tw">NT$</label>
                                        <label class="ready_bill_details_product_cake_price">600</label>
                                    </div>
                                </div>
                                <div class="hr4"></div>
                                <div class="ready_bill_details_product_cake_block">
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">普通包裝</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">一般蠟燭</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">一般卡片</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="combination_ready">
                                <div class="ready_bill_details_product_title">
                                    <div class="ready_bill_details_product_cakesizeamount">
                                        <label class="ready_bill_details_product_cake" for="">巧克力蛋糕</label>
                                        <div class="ready_bill_details_product_cake_size">(6吋)</div>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                    </div>
                                    <div class="ready_bill_details_product_twandprice">
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                </div>
                                <div class="hr4"></div>
                                <div class="ready_bill_details_product_cake_block">
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">一般包裝</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">一般蠟燭</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">一般卡片</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">1</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">600</div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="subtotal">
                                <label for="" class="ready_bill_details_second_title">小計</label>
                                <div class="ready_bill_details_product_twandprice">
                                    <div class="ready_bill_details_product_cake_tw">NT$</div>
                                    <div class="ready_bill_details_product_cake_price">600</div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="couple_cost" >
                                <label for="" class="ready_bill_details_second_title">折價卷</label>
                                <div class="ready_bill_details_product_twandprice">
                                    <div class="ready_bill_details_product_cake_tw">NT$</div>
                                    <div class="ready_bill_details_product_cake_price">- 150</div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="shipping_method">
                                <label for="" class="ready_bill_details_second_title">運送方式</label>
                                <div class="shipping_style_block">
                                    <div class="shipping_style_titlebar">
                                        <div class="shipping_style_input">
                                            <input type="radio" name="shipping_style" id="">宅配
                                        </div>
                                        <div class="ready_bill_details_product_twandprice">
                                            <div class="ready_bill_details_product_cake_tw">NT$</div>
                                            <div class="ready_bill_details_product_cake_price">150</div>
                                        </div>
                                    </div>
                                    <div class="shipping_style_titlebar">
                                        <div class="shipping_style_input">
                                            <input type="radio" name="shipping_style" id="">超商取貨(全家)
                                        </div>
                                        <div class="ready_bill_details_product_twandprice">
                                            <div class="ready_bill_details_product_cake_tw">NT$</div>
                                            <div class="ready_bill_details_product_cake_price">60</div>
                                        </div>
                                    </div>
                                    <div class="shipping_style_titlebar">
                                        <div class="shipping_style_input">
                                            <input type="radio" name="shipping_style" id="">超商取貨(7-11)
                                        </div>
                                        <div class="ready_bill_details_product_twandprice">
                                            <div class="ready_bill_details_product_cake_tw">NT$</div>
                                            <div class="ready_bill_details_product_cake_price">60</div>
                                        </div>
                                    </div>
                                    <div class="shipping_style_titlebar">
                                        <div class="shipping_style_input">
                                            <input type="radio" name="shipping_style" id="">黑貓宅急便
                                        </div>
                                        <div class="ready_bill_details_product_twandprice">
                                            <div class="ready_bill_details_product_cake_tw">NT$</div>
                                            <div class="ready_bill_details_product_cake_price"> 120</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="ready_bill_total">
                                <label for="" class="ready_bill_details_second_title">總計</label>
                                <div class="ready_bill_details_product_twandprice">
                                    <div class="ready_bill_details_product_cake_tw ready_bill_special_color">NT$</div>
                                    <div class="ready_bill_details_product_cake_price last_price  ready_bill_special_color">1780</div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="payment_method">
                                <label class="ready_bill_details_second_title">
                                    付款方式
                                </label>
                                <div class="bill_payment_block">
                                    <div class="bill_payment_style_block">
                                        <input type="radio" name="payment" id="">信用卡付款/ATM轉帳
                                        <img class="img_30" src="../assets/images/ecpay_icon.png" alt="">
                                    </div>
                                    <div class="bill_payment_style_block">
                                        <input type="radio" name="payment" id="">貨到付款
                                    </div>
                                    <div class="bill_payment_style_block">
                                        <input type="radio" name="payment" id="">LinePay
                                        <img src="../assets/images/linepay_icon.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <router-link to="checkout_complete">
                                <button class="bill_ready_to_checkout_sumbit">下單購買</button>
                            </router-link>
                            <span class="security_and_privacy">您的個人數據將用於處理您的訂單，支持您在整個網站的體驗，以及我們的隱私權政策中描述的其他目的</span>
                        </form>
                    </div>
                </div>
            </section>

        </main>
        <footercom></footercom>
        
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "../components/title_h1.vue"
import coupon from "../components/coupon.vue"
import axios from "axios"
export default {
    name:'shopping_cart',
    components:{
        titleh1,
        headercom,
        footercom,
        coupon,
    },
    data(){
        return{
            asd:123546,
            name: 123,
            memberId: 1,    // 暫時性資料
            recipient: '',
            phone: '',
            address: '',
            otheraddress: '',
        }
    },
    methods:{
        submitorder(){
            let memberId = new URLSearchParams;
            memberId.append("memberId", this.memberId);
            axios.post("http://localhost/acake/submitorder.php", memberId)
                .then(res => {
                    // console.log(res);
                    let data = res.data;
                    // console.log(data[0].ADDRESS);
                    this.recipient = data[0].RECEIVER;
                    this.phone = data[0].PHONE;
                    this.address = data[0].ADDRESS;
    
                })
                .catch( err => cosole.log(err));

        }
    },
    watch:{
        
    },
    computed:{
        

    },
    mounted(){
        let memberId = new URLSearchParams;
        memberId.append("memberId", this.memberId);
        axios.post("http://localhost/acake/redayToCheckoutSelectReceiver.php", memberId)
            .then(res => {
                // console.log(res);
                let data = res.data;
                // console.log(data[0].ADDRESS);
                this.recipient = data[0].RECEIVER;
                this.phone = data[0].PHONE;
                this.address = data[0].ADDRESS;

            })
            .catch( err => cosole.log(err));
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
router-link{
    text-decoration: none;
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
        max-width: 1120px;
        justify-content: space-around;
        display: flex;
        margin: 0 auto;
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
        .shopping_cart_page,.checkout_page{
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
     // 購物車麵包屑結束
    .bill_list_outline{
        box-sizing: border-box;
        width: 100%;
        max-width: 1120px;
        margin: 0 auto;
        margin-bottom: 100px;
        background-color: $lightYellow;
        @media screen and (max-width:767.98px){ 
            display: flex;
            margin: auto;
            flex-direction: column;
            align-items: center;
            max-width: 576px;
            width: 100%;
        }
        .bill_list_titlebar{
            background-color: $palePike;;
            max-width: 1120px;
            width: 100%;
            display: flex;
            border-radius: 10px 10px 0 0 ;
            height: 100px;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            @media screen and (max-width:767.98px){ 
                max-width: 576px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .list_id{
                align-items: center;
                display: flex;
                justify-content: center;
                max-width: 1120px;
                width: 100%;
            }
        }
        .bill_list_contentbar{
            width: 100%;
            max-width: 1120px;
            display: flex;
            justify-content: center;
            // margin-bottom: 20px;
            @media screen and (max-width:767.98px){ 
                display: flex;
                flex-direction: column;
                max-width: 576px;
                width: 100%;
            }
            .bill_individual_outline{
                width: 60%;
                display: flex;
                justify-content: center;
                max-width: 1120px;
                background-color: #F7F2F1;
                box-sizing: border-box;
                // padding-bottom: 20px;
                @media screen and (max-width:767.98px){ 
                    margin: auto;
                    max-width:768px;
                    width: 100%;
                }
                .bill_individual{
                    margin-top: 35px;
                    width: 95%;
                    max-width: 580px;
                    flex-direction: column;
                    justify-items: center;
                    display: flex;
                    .bill_individual_title{
                        font-size: $h3;
                        margin-bottom: 20px;
                        .recipient,.phone,.preset_address,.new_address,.send_date,.mark,.ready_to_checkout_coupon{
                            margin-bottom: 15px;
                            font-size: $h4;
                            display: flex;
                            .bill_individual_address{
                                height: 28px;
                            
                                max-width: 550px;
                                width: 100%;
                            }
                            .bill_individual_title_short{
                                display: flex;
                                max-width: 100px;
                                width: 100%;
                            }
                            .bill_individual_short{
                                height: 28px;
                                max-width: 150px;
                                width: 100%;
                                // &:focus{
                                //     border: $darkGrey;
                                // }
                            }
                            .bill_individual_title_long{
                                max-width: 500px;
                                width: 100%;
                                margin-bottom: 15px;
                                .bill_individual_title_marktext{
                                    font-size: $p;
                                }
                            }
                            .bill_individual_mark{
                                height: 60px;
                                max-width: 550px;
                                width: 100%;
                                display: block;
                                resize: none;
                                &:hover{
                                    border-width: 2px;
                                    padding: 1px 2px;
                                    border-style: ins-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
                                }
                            }
                        }
                        .preset_address,.new_address,.mark{
                            display: flex;
                            flex-direction: column;
                            .address_inline{
                                display: flex;
                                align-items: center;
                                max-width: 170px;
                                justify-content: space-between  ;
                                width: 100%;
                                margin-bottom: 15px;
                            }
                        }
                    }
                    .ready_to_checkout_coupon{
                        align-items: center;
                        &:hover{
                            cursor: pointer;
                        }
                    }

                }
            }
        }
    }
    .bill_details_outline{
        display: flex;
        .ready_bill_details{
            width: 95%;
            margin-top: 35px;
            max-width: 350px;
            @media screen and (max-width:767.98px){ 
                max-width: 768px;
                width: 95%;
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 0 auto;
                margin-top: 35px;
                margin-bottom: 50px;
            }
            .ready_bill_details_title{
                font-size: $h3;
                margin-bottom: 20px;
            }
            .ready_bill_details_second_title{
                font-size: $h4;
                max-width: 100px;
                width: 100%;
            }
            .hr3{
                width: 100%;
                max-width: 380px;
                border-top: 2px solid $darkGrey;
                margin: auto;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .combination_ready{
                display: flex;
                flex-direction: column;
                @media screen and (max-width:767.98px){ 
                    // max-width: 0px;
                    width: 95%;
                }
                .ready_bill_details_product_title{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    font-size: $p;
                    border: 5px;
                    .ready_bill_details_product_cakesizeamount{
                        display: flex;
                        align-items: center;
                        width: 100%;
                        max-width: 280px;
                        .ready_bill_details_product_item{
                            display: flex;
                            align-items: center;
                            width: 100%;
                            max-width: 160px;
                            align-items: center;
                        }
                        .ready_bill_details_product_cake_size{
                            max-width: 40px;
                            width: 100%;
                            display: flex;
                            line-height: 16px;
                            text-align: right;
                            align-items: center;
                        }
                        .ready_bill_details_product_cake_x{
                            text-align: right;
                            max-width: 30px;
                            line-height: 16px;
                            width: 100%;
                            display: inline-block;
                            text-align: right;
                            align-items: center;
                        }
                        .ready_bill_details_product_cake_amount{
                            text-align: right;
                            max-width: 30px;
                            width: 100%;
                            display: inline-block;
                            align-items: center;
                        }
                    }
                    .ready_bill_details_product_twandprice{
                        display: flex;
                        justify-content: flex-end;
                        // max-width: 350px;
                        width: 100%;
                        .ready_bill_details_product_cake_tw{
                        max-width: 40px;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        text-align: right;
                        justify-content: flex-end;
                        }
                        .ready_bill_special_color{
                            color: #9F746B;
                            font-weight: bold;
                        }
                        .ready_bill_details_product_cake_price{
                        max-width: 60px;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        }
                        .last_price{
                            color: red;
                        }
                    }
                }
                .hr4{
                    width: 100%;
                    max-width: 580px;
                    border-top: 2px dotted rgb(119, 119, 119);
                    margin: auto;
                    margin-top: 5px;
                    margin-bottom: 5px;
                } 
                .ready_bill_details_product_cake_block{
                    max-width: 580px;
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    
                    .ready_bill_details_product_detail{
                        display: flex;
                        max-width: 580px;
                        width: 100%;
                        @media screen and (max-width:767.98px){ 
                            max-width: 576px;
                            width: 100%;
                            display: flex;
                        }
                    }   
                }
            }
        }
        .subtotal{
            display: flex;
            justify-content: space-between;
        }
        .couple_cost{
            display: flex;
            justify-content: space-between;
        }
        .ready_bill_details_second_title,.subtotal,.couple_cost,.shipping_method,.ready_bill_total,.payment_method{
            max-width: 350px;
            width: 100%;
            // @media screen and (max-width:767.98px){ 
                // display: flex;
                // justify-content: space-between;
            // }
            .shipping_style_block{
                display: flex;
                margin-top: 10px;
                flex-direction: column;
                .shipping_style_titlebar{
                    max-width: 350px;
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 5px;
                    .shipping_style_input{
                        max-width: 200px;
                        width: 100%;
                        display: inline-block;
                    }
                }
            }
            .bill_payment_block{
                margin-top: 10px;
                display: flex;
                flex-direction: column;
                .bill_payment_style_block{
                    margin-bottom: 5px;
                    display: flex;
                    .img_30{
                        width: 30px;
                        height: 30px;
                    }
                    img{
                        margin-left: 10px;
                        height: 30px;
                    }
                }
            }
        }
        .ready_bill_total{
            font-size: $h4;
            display: flex;
        }
        .bill_ready_to_checkout_sumbit{
            margin-top: 45px;
            margin-bottom: 20px;
            width: 120px;
            height: 60px;
            border-radius: 10px;
            background-color: $darkGrey;
            color: white;
            font-size: $h4;
            box-shadow: $shadow;
            &:hover{
                color: $lightYellow;
                cursor: pointer;
            }
        }
        .security_and_privacy{
            display: block;
            font-size: $p;
            @media screen and (max-width:767.98px){ 
                max-width: 350px;
                width: 100%;
            }
        }
    }
}
.bill_list_outline{
    box-sizing: border-box;
    width: 100%;
    max-width: 1120px;
}
.bill_list_titlebar{
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
.list_id{
    align-items: center;
    display: flex;
    justify-content: center;
    max-width: 1120px;
    width: 100%;
}
.bill_list_contentbar{
        width: 100%;
        max-width: 1120px;
        display: flex;
        justify-content: center;
        // margin-bottom: 20px;
}
.bill_individual_outline{
    width: 60%;
    display: flex;
    justify-content: center;
    max-width: 1120px;
    background-color: #F7F2F1;
    box-sizing: border-box;
    // margin-bottom: 20px;
}
.bill_individual{
    margin-top: 35px;
    width: 95%;
    max-width: 580px;
    flex-direction: column;
    // justify-content: space-between;
    justify-items: center;
    display: flex;
}
.bill_individual_title{
    font-size: $h3;
    margin-bottom: 20px;
}
.recipient,.phone,.preset_address,.new_address,.send_date,.mark,.ready_to_checkout_coupon{
    margin-bottom: 15px;
    font-size: $h4;
    display: flex;
}
.ready_to_checkout_coupon{
    align-items: center;
}
.ready_to_checkout_coupon_click{
    cursor: pointer;
}
.bill_individual_title_short{
    display: flex;
    max-width: 100px;
    width: 100%;
}
.bill_individual_short{
    height: 28px;
    max-width: 150px;
    width: 100%;
    border: 0;
    border-radius: 5px;
    box-shadow: $inputShadow;
    &:focus{
        border: 1px solid $darkGrey;
    }
}
.bill_individual_address{
    height: 56px;
    max-width: 550px;
    width: 100%;
    display: block;
    border: 0;
    border-radius: 5px;
    box-shadow: $inputShadow;
    // align-items: top;
    &:focus{
        border: 1px solid $darkGrey;
    }
}
.preset_address,.new_address,.mark{
    display: flex;
    flex-direction: column;
}
.address_inline{
    display: flex;
    align-items: center;
    max-width: 170px;
    justify-content: space-between  ;
    width: 100%;
    margin-bottom: 15px;
}
.bill_individual_title_long{
    max-width: 500px;
    width: 100%;
    margin-bottom: 15px;
}
.bill_individual_title_marktext{
    font-size: $p;
}
.bill_individual_mark{
    height: 60px;
    max-width: 550px;
    width: 100%;
    display: block;
    resize: none;
    border: 0;
    border-radius: 5px;
    box-shadow: $inputShadow;
    align-items: flex-start;
    &:focus{
        border: 1px solid $darkGrey;
    }
}
.bill_details_outline{
    max-width: 1120px;
    width: 40%;
    display: flex;
    justify-content: center;
    background-color: $lightYellow;
}
.ready_bill_details{
    width: 95%;
    margin-top: 35px;
    max-width: 350px;
    
}
.ready_bill_details_title{
    font-size: $h3;
    margin-bottom: 20px;
    
}
.ready_bill_details_second_title{
    font-size: $h4;
    max-width: 100px;
    width: 100%;
}
.ready_bill_details_product_cake{
    max-width: 150px;
    width: 100%;
}
.combination_ready{
    display: flex;
    flex-direction: column;
}
.ready_bill_details_product_title{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    font-size: $p;
    border: 10px;
    // align-items: center;
}
.ready_bill_details_product_cakesizeamount{
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 280px;
}
.ready_bill_details_product_item{
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 160px;
    align-items: center;
}
.ready_bill_details_product_cake_size{
    max-width: 40px;
    width: 100%;
    display: flex;
    line-height: 16px;
    text-align: right;
    align-items: center;
}
.ready_bill_details_product_cake_x{
    text-align: right;
    max-width: 30px;
    line-height: 16px;
 
    width: 100%;
    display: inline-block;
    text-align: right;
    align-items: center;
}
.ready_bill_details_product_cake_amount{
    text-align: right;
    max-width: 30px;
    width: 100%;
    display: inline-block;
    align-items: center;

}
.ready_bill_details_product_twandprice{
    display: flex;
    justify-content: flex-end;
    max-width: 350px;
    width: 100%;
}
.ready_bill_details_product_cake_tw{
max-width: 40px;
width: 100%;
display: flex;
align-items: center;
text-align: right;
justify-content: flex-end;

}
.ready_bill_details_product_cake_price{
max-width: 60px;
width: 100%;
display: flex;
align-items: center;
justify-content: flex-end;
}
.hr3{
    width: 100%;
    max-width: 350px;
    border-top: 2px solid $darkGrey;
    margin-top: 5px;
    margin-bottom: 5px;
}
.ready_bill_details_product_cake_block{
    max-width: 350px;
    width: 100%;
    display: flex;
    flex-direction: column;
}
.ready_bill_details_product_detail{
    display: flex;
    justify-content: flex-end;
}
.subtotal{
    display: flex;
    justify-content: space-between;
}
.couple_cost{
    display: flex;
    justify-content: space-between;
}
.shipping_style_block{
    display: flex;
    margin-top: 10px;
    flex-direction: column;
}
.shipping_style_titlebar{
    max-width: 350px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
}
.shipping_style_input{
    max-width: 200px;
    width: 100%;
    display: inline-block;
}
.ready_bill_total{
    font-size: $h4;
    display: flex;
}
.last_price{
    color: red;
}
.bill_payment_block{
    margin-top: 10px;
    display: flex;
    flex-direction: column;
}
.bill_payment_style_block{
    margin-bottom: 5px;
    display: flex;
    align-items: center;
}
.bill_ready_to_checkout_sumbit{
    margin-top: 45px;
    margin-bottom: 20px;
    width: 120px;
    height: 60px;
    border-radius: 10px;
    background-color: $darkGrey;
    color: white;
    font-size: $h4;
    box-shadow: $shadow;
}
.bill_ready_to_checkout_sumbit:hover{
    color: $lightYellow;
    cursor: pointer;
}
.security_and_privacy{
    display: block;
    font-size: $p;
    margin-bottom: 20px;
}
.ready_bill_special_color{
color: #9F746B;
font-weight: bold;
}

.hr4{
    width: 100%;
    max-width: 350px;
    border-top: 2px dotted rgb(119, 119, 119);
    margin-top: 5px;
    margin-bottom: 5px;
} 


@media screen and (max-width:767.98px){ 
    .bill_list_contentbar{
        display: flex;
        flex-direction: column;
        max-width: 576px;
        width: 100%;
    }
    .bill_individual_outline{
        margin: auto;
        max-width: 576px;
        width: 100%;
    }
    .bill_details_outline{
        margin: auto;
        max-width: 576px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .ready_bill_details{
        max-width: 576px;
        width: 95%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .bill_list_outline{
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 576px;
        width: 100%;
    }
    .bill_list_titlebar{
        max-width: 576px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .combination_ready{
        max-width: 350px;
        width: 100%;
    }
    .ready_bill_details_second_title,.subtotal,.couple_cost,.shipping_method,.ready_bill_total,.payment_method{
        max-width: 350px;
        width: 100%;
    }
    .security_and_privacy{
        max-width: 350px;
        width: 100%;
    }
    .coupon{
        transform: scale(0.8);
    }
}




</style>