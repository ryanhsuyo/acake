<template>
    <div>
        <div class="addenda_title_block">
            <div class="addenda_titlebar">
                <div class="addenda_title">包裝
                    <div class="addenda_cancel_icon">
                        <img src="" alt="">
                    </div>
                </div>
                
                <div class="addenda_detail_item">
                    <div id="addenda_detail">
                        <div class="addenda_img">
                            <img src="../assets/images/cho_cake.jpg" alt="">   
                        </div>
                        <div class="addenda_describe">這只是一班包裝</div>
                    </div>
                    <div class="addenda_detail_outline">
                        <div class="addenda_amount">
                            <label for="">
                                <select>
                                    <option>普通包裝</option>
                                    <option>特殊包裝</option>
                                </select>
                            </label>
                        </div>
                        <div class="addenda_twandprice">
                            
                            <div class="addenda_price_tw">NT$</div>
                            <div class="addenda_price">0</div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="addenda_block">
            <div class="addenda_titlebar">
                <div class="addenda_title">卡片
                    <div class="addenda_cancel_icon">
                        <img src="" alt="">
                    </div>
                </div>
                
                <div class="addenda_detail_item">
                    <div id="addenda_detail">
                        <div class="addenda_img">
                            <img src="../assets/images/cho_cake.jpg" alt="">   
                        </div>
                        <div class="addenda_describe">
                            這只是一班的卡片卡片卡片卡片
                        </div>
                    </div>
                    <div class="addenda_detail_outline">
                        <div class="addenda_amount">
                            <label for="">
                                <select>
                                    <option>一般卡片</option>
                                    <option>情人節卡片</option>
                                </select>
                            </label>
                        </div>
                        <div class="addenda_twandprice">
                            
                            <div class="addenda_price_tw">NT$</div>
                            <div class="addenda_price">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="addenda_titlebar">
                <div class="addenda_title">蠟燭
                    <div class="addenda_cancel_icon">
                        <img src="../assets/images/cho_cake.jpg" alt="">
                    </div>
                </div>
                
                <div class="addenda_detail_item">
                    <div id="addenda_detail">
                        <div class="addenda_img">
                            <img src="../assets/images/cho_cake.jpg" alt="">   
                        </div>
                        <div class="addenda_describe">一根小蠟燭一根小蠟燭一根小蠟燭一根小蠟燭一根小蠟燭</div>
                    </div>
                    <div class="addenda_detail_outline">
                        <div class="addenda_amount">
                            <label for="">
                                <select>
                                    <option>一根蠟燭</option>
                                    <option>造型蠟燭:數字0</option>
                                </select>
                            </label>
                        </div>
                        <div class="addenda_twandprice">
                            <div class="addenda_price_tw">NT$</div>
                            <div class="addenda_price">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="addnew_product_hr"></span>
            <div class="new_addenda_titlebar">
                <div class="new_addenda">
                    <div class="new_addenda_title">新增加購</div>
                    <img src="../assets/images/cho_cake.jpg" alt="">
                </div>
            </div>
            <div class="addenda_button_bar">
                
                <button id="addenda_button_sumbit">前往結帳</button>
                <button id="addenda_button_backtoproduct">返回商品</button>
            </div>
        </div>
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
// import titleh1 from "./title_h1.vue"
// import productDetailAddenda from "../components/productDetailAddenda"

export default {
    name:'productDetailAddenda',
    components:{
        // titleh1,
        headercom,
        footercom,
        // productDetailAddenda,
    },
    data(){
        return{
            counter: 1,
        }
    },
    methods:{
        add(){
            this.counter += 1;
        },
        minus(){
            if(this.counter > 1){
                (this.counter -= 1);
            }

            
        },
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
    // background-color: $bg;
    z-index: 5;
}
.addenda_title_block{
    background-color: $palePike;
    max-width: 1000px;
    width: 100%;
    margin: auto;
    height: 350px;
    padding-top: 10px;
    margin-top: 30px;
    @media screen and (max-width:767.98px){ 
        height: 400px;
    }
}
.addenda_titlebar{
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    margin-top: 45px;
    max-width: 900px;
    width:95%;
    // background-color: $pi;
    .addenda_title{
        font-size: 20px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        @media screen and (max-width:767.98px){ 
            max-width: 470px;
            width: 100%;
            align-items: center;
            margin: auto;
        }
        .addenda_cancel_icon{
            display: inline-block;
            width: 35px;
            height: 35px;
            img{
                object-fit: cover;
                background-color: black;
            }
        }
    }
    .addenda_detail_item{
            max-width: 900px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            align-items: center;
            @media screen and (max-width:767.98px){ 
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            #addenda_detail{
                max-width: 350px;
                width: 100%;
                display: flex;
                justify-content: space-between;
                @media screen and (max-width:767.98px){ 
                    display: flex;
                    max-width: 470px;
                    width: 100%;
                    justify-content: space-between;
                }
                .addenda_img{
                    width: 200px;
                    height: 200px;
                        img{
                            object-fit: cover;
                            width: 200px;
                            height: 200px;
                        }
                    @media screen and (max-width:767.98px){ 
                        width: 150px;
                        height: 150px;
                        img{
                            object-fit: cover;
                            width: 150px;
                            height: 150px;
                        }
                    }
                }  
                .addenda_describe{
                    max-width: 120px;
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    font-size: 16px;
                    align-items: center;
                    justify-content: center;
                }
            }
            .addenda_detail_outline{
                max-width: 470px;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                @media screen and (max-width:767.98px){ 
                    margin-top: 20px;
                }
                .addenda_amount{
                    width: 200px;
                    height: 40px;
                    font-size: $h4;
                    cursor: pointer;
                    select{
                        width: 200px;
                        height: 40px;
                        font-size: $h4;
                        text-align: center;
                        background-color: #F8F8F8;
                        cursor: pointer;
                    }
                    @media screen and (max-width:767.98px){ 
                        max-width: 576px;
                        width: 100%;

                        height: 30px;
                        font-size: $h4;
                        cursor: pointer;
                        select{
                            width: 150px;
                            height: 30px;
                            font-size: $h4;
                            background-color: #F8F8F8;
                            cursor: pointer;
                        }
                    }
                }
                .addenda_twandprice{
                    align-self: center;
                    display: flex;
                    justify-content: space-between;
                    max-width: 120px;
                    width: 100%;
                    .addenda_price_tw{
                        font-size: $h3;
                    }
                    .addenda_price{
                        font-size: $h3;
                        align-self: center;
                        text-align: right;
                        max-width: 100px;
                        width: 100%;
                    }
                }
            }
        }
    }
    .addenda_block{
        padding-top: 30px;
        padding-bottom: 50px;
        background-color: #F7Edd4;
        max-width: 1000px;
        width: 100%;
        margin: 0 auto;
        // margin-top: 70px;
    }
    .addnew_product_hr{
        max-width: 900px;
        margin: 0 auto;
        border-top: 1px solid $darkGrey;
        width: 100%;
        display: block;
        margin-top: 80px;
        margin-bottom: 60px;
    }
    .new_addenda_titlebar{
        width: 95%;
        height: 200px;
        max-width: 900px;
        margin: auto;
        display: flex;
        background-color:rgba(255, 255, 255, .5);
        justify-content: center;
        align-items: center;
        @media screen and (max-width:767.98px){ 
            max-width: 470px;
            width: 90%;
        }
        .new_addenda{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            width: 120px;
            height: 120px;
            padding-top: 15px;
            padding-bottom: 20px;
            cursor: pointer;
            // opacity: 1;
            .new_addenda_title{
                font-size: $h4;
                margin: 0 auto;
                color: $palePike;
            }
            img{
                width: 45px;
                height: 45px;
                align-self: center;
            }
        }
    }
.product_details_combination1_button{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    max-width: 120px;
    height: 50px; 
    align-items: flex-end;
    width: 100%;
    #product_details_combination1_commit{
        margin: 0 auto;
        // margin-top: 20px;
        // margin-bottom: 50px;
        background-color: $darkGrey;
        width: 120px;
        height: 40px;
        font-size: 20px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border-radius: 5px;
        border: 0;
        &:hover{
            color: $lightYellow;
        }
    }
    #product_details_combination1_buy{
        margin: 0 auto;
        margin-top: 20px;
        // margin-bottom: 50px;
        background-color: $darkGrey;
        width: 120px;
        height: 40px;
        font-size: 20px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border-radius: 5px;
        border: 0;
        &:hover{
            color: $lightYellow;
        }
    }
}

#product_details_combination2{
    cursor: pointer;
    width: 100%;
    max-width: 1120px;
    margin: 0 auto;
    margin-top: 30px;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 150px;
    background-color: #EBDCD8;
    .new_combination{
        max-width: 1120px;
        width: 93.5%;
        margin: 0 auto;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        @media screen and (max-width:767.98px){ 
            width: 90%;
        }
        .new_combination_title{
            // margin-left: 60px;
            font-size: $h2;
        }
        img{
            width: 40px;
            height: 40px;
        }
    }
}
#product_details_combination3{
    margin: 0 auto;
    width: 100%;
    max-width: 1120px;
    height: 350px;
    background-color: #EBDCD8;
    display: flex;
    justify-content: space-between;
    @media screen and (max-width:767.98px){ 
        display: flex;
        max-width: 700px;
        width: 100%;
        height: 450px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }
    #combination3_contentoutline{
    max-width: 760px;
    width: 100%;
        @media screen and (max-width:767.98px){ 
            height: 500px;
        }
        #product_details_total{
            width: 90%; 
            max-width: 700px;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0 auto;
            margin-top: 50px;
            @media screen and (max-width:767.98px){ 
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            #combination_titlebar{
                margin-bottom: 40px;
                #combination_title{
                    font-size: $h2;
                    max-width: 470px;
                    width: 100%;
                    @media screecombination_titlen and (max-width:767.98px){ 
                        margin-top: 50px;
                    }   
                }
            }
            .combination_contentbar{
                max-width: 700px;
                display: flex;
                justify-content: space-between;
                width: 100%;
                font-size: $h4;
                @media screen and (max-width:767.98px){ 
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .product_contentbar{
                    display: flex;
                    justify-content: space-between;
                    max-width: 315px;
                    width: 100%;
                    align-items: center;
                    @media screen and (max-width:767.98px){ 
                        display: flex;
                        max-width: 470px;
                        width: 90%;
                        justify-content: flex-start;
                    }
                    // 另外設的scss是正確的
                    .product_speical_fontsize{
                        font-size: $h3;
                    }
                    .product{
                        display: flex;
                        max-width: 280px;
                        width: 100%;
                        font-size: $h4;
                        @media screen and (max-width:767.98px){ 
                            display: flex;
                            justify-content: left;
                        }       
                    }
                    .product_priceandamount{
                        display: flex;
                        justify-content: space-between;
                        max-width: 50px;
                        width: 100%;
                        .proudct_amount_x{
                            max-width: 20px;
                            width: 100%;
                            display: flex;
                            justify-content: center;
                        }
                        .proudct_amount_number{
                            display: flex;
                            margin-left: 5px;
                            width: 100%;
                            max-width: 30px;
                        }
                    }
                }
                .product_twandprice{
                    display: flex;
                    justify-content: space-between;
                    max-width: 150px;
                    width: 100%;
                    @media screen and (max-width:767.98px){ 
                        display: flex;
                        justify-content: right;
                        width: 100%;
                        max-width: 500px;
                    }
                    .product_price_tw{
                        display: flex;
                        justify-content: space-between;
                        max-width: 50px;
                        width: 100%;
                    }
                    .product_price{
                        margin-left: 5px;
                        margin-right: 5px;
                        display: inline-block;
                        max-width: 100px;
                        width: 100%;
                        text-align: right;
                    }
                    // 另外設的SCSS正確的
                    .product_speical_color{
                        color: #9F746B;
                        font-size: $h4;
                    }
                }
            }
            .addnew_product_hr2{
                max-width: 700px;
                margin: 0 auto;
                border-top: 1px solid $darkGrey;
                width: 100%;
                display: block;
                margin-top: 25px;
                margin-bottom: 25px;
                @media screen and (max-width:767.98px){ 
                    max-width: 768px;
                    margin: 0 auto;
                    width: 100%;
                    display: block;
                    margin-top: 25px;
                    margin-bottom: 25px;
                }
            }
        }
    }
    #product_logo_img{
    max-width: 360px;
    width: 70%;
    position: relative;
        @media screen and (max-width:767.98px){ 
            display: none;
        }
        img{
            width: 250px;
            position: absolute;
            top: 0;             
            bottom: 0;           
            left: 0;        
            right: 0;
            margin: auto;  
            height: 190px;
        }
    }
}
#product_details_combination4{
    max-width: 1120px;
    width: 90%;
    display: flex;
    justify-content: space-between;
    margin: 0 auto;
    margin-top: 100px;
    margin-bottom: 100px;
    border: 0;
    #product_details_combination_router{
        display: flex;
        justify-content: center;
        text-decoration: none;
        width: 100%;
        #product_details_combination_checkout{
            background-color: #F7EDD4;
            // max-width: 1120px;
            width: 100%;
            height: 70px;
            font-size: 24px;
            border: 0;
            border-radius: 5px;
            box-shadow: $shadow;
            color: $darkGrey;
            cursor: pointer;
            &:hover{
                color: #9F746B;
            }
            .product_details_combination_checkout_text{
                display: flex;
                justify-content: center;
                align-items: center;
                max-width: 1120px;
                width: 100%;
            }
        }
    }
}
.addenda_button_bar{
    display: flex;
    justify-content: space-between;
    max-width: 500px;
    width: 100%;
    margin: auto;
}
#addenda_button_sumbit{
    margin: 0 auto;
    // margin-top: 20px;
    // margin-bottom: 50px;
    background-color: $darkGrey;
    width: 120px;
    height: 40px;
    margin-top: 50px;
    font-size: 20px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 5px;
    border: 0;
    &:hover{
        color: $lightYellow;
    }
    
}
#addenda_button_backtoproduct{
    margin: 0 auto;
    // margin-top: 20px;
    // margin-bottom: 50px;
    background-color: $darkGrey;
    width: 120px;
    height: 40px;
    margin-top: 50px;
    font-size: 20px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 5px;
    border: 0;
    &:hover{
        color: $lightYellow;
    }

}










</style>



  