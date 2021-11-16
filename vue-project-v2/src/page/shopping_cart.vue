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
            <!-- 從這開始 -->
            <section class="addenda_block_outline">
                <div class="addenda_cancel_button">
                    <font-awesome-icon class="addenda_cancel_button_icon" icon="fa-solid fa-xmark" />
                </div>
                <div class="addenda_block_inline">
                    <div class="addenda_block_list1">
                        <div class="addenda_block_cake">
                            <div class="addenda_block_cake_img_block">
                                <img src="../assets/images/bit_cake.jpg" alt="">
                            </div>
                            <div class="addenda_block_cake_content">
                                <div class="addenda_block_cake_title">草莓奶油蛋糕草莓奶油</div>
                                <div class="addenda_block_cake_sizeandamount">
                                    <div class="addenda_block_cake_size">
                                        8吋
                                    </div>
                                    <div class="addenda_block_cake_amountandunit">
                                        <div class="addenda_block_cake_amount">1</div>
                                        <div class="addenda_block_cake_unit">個</div>
                                    </div>
                                </div>
                                <div class="addenda_block_cake_twandprice">
                                    <div class="addenda_block_cake_tw">NT$</div>
                                    <div class="addenda_block_cake_price">500</div>
                                </div>
                            </div>
                        </div>
                        <div class="select_block">

                            <div class="addenda_block_package">
                                <div class="addenda_block_package_item_img_block">
                                    <img src="../assets/images/cho_cake.jpg" alt="">
                                </div>
                                <div class="addenda_block_cake_content">
                                    <div class="addenda_block_cake_title">{{packdata}}</div>
                                    <div class="addenda_block_cake_sizeandamount">
                                        <div class="addenda_block_cake_size">
                                        </div>
                                        <div class="addenda_block_cake_amountandunit">
                                            <div class="addenda_block_cake_amount"></div>
                                            <div class="addenda_block_cake_unit"></div>
                                        </div>
                                    </div>
                                    <div class="addenda_block_cake_twandprice">
                                        <div class="addenda_block_cake_tw">NT$</div>
                                        <div class="addenda_block_cake_price">0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="addenda_block_package_select_block">  
                                <select v-model="packdata" name="" id="addenda_block_package_select">
                                    <option v-for="(pack, index) in packs" :key='index' :value="pack">{{pack}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="addenda_cancel_button_block" >
                            
                        </div>
                    </div>
                    <div class="addenda_hr"></div>
                    <div class="addenda_block_list2" v-for="(list,index) in lists" :key='index' >
                        <div class="addenda_item_block_cardorcandle">
                            <div class="addenda_block_cake_img_block_cardorcandle">
                                <img src="../assets/images/bit_cake.jpg" alt="">
                            </div>
                            <div class="addenda_block_cake_content_cardorcandle">
                                <div class="addenda_block_cake_title_cardorcandle">{{list.idname}}</div>
                                <div class="addenda_block_cake_sizeandamount">
                                    <div class="addenda_block_cake_size">
                                    </div>
                                    <div class="addenda_block_cake_amountandunit">
                                        <div class="addenda_block_cake_amount"></div>
                                        <div class="addenda_block_cake_unit"></div>
                                    </div>
                                </div>
                                <div class="addenda_block_cake_twandprice_cardorcandle">
                                    <div class="addenda_block_cake_tw_cardorcandle">NT$</div>
                                    <div class="addenda_block_cake_price_cardorcandle">{{list.price}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="addenda_block_cake_item_cardorcandle_select">
                            <select v-model="list.idname" name="" id="addenda_block_cake_item_select">
                                <option  v-for="(item, index) in items" :key='index'>{{item}}</option>
                            </select>
                        </div>
                        <div class="addenda_block_cake_item_cardorcandle_select_other">
                            <select name="" id="addenda_block_cake_item_select_other">
                                <option v-for="(amount, index) in 10 " :key='index'>{{amount}}</option>
                            </select>
                        </div>

                        <!-- <div class="addenda_item_detail">

                        </div>
                        <div class="addenda_item_amount"></div> -->
                        <div class="addenda_item_cancel_block">
                            <div class="addenda_item_cancel"  @click="deladdenda(index)">
                                <img src="../assets/images/trash_icon.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="addenda_block_list4">
                        <div class="new_addenda_block_outline">
                            <div class="new_addenda_block_square" @click="addaddenda()" >
                                <img src="../assets/images/add_purchase_icon.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="addenda_button_block">
                <router-link to="product">
                    <button class="addenda_goto_shopping">繼續購物</button>
                </router-link>
                <router-link to="ready_to_checkout">
                    <button class="goto_checkout">前往結帳</button>
                </router-link>
            </div>
            <!-- <section class="shopping_cart_list">
                <div class="shopping_cart_block">
                    <div class="choose_cakeandimg">
                        <input type="checkbox" name="" class="shopping_cart_check">
                        <img class="shopping_cart_img" src="../assets/images/cho_cake.jpg" alt="">
                    </div>
                    <div class="choose_contentandcancel">
                        <span class="choose_content">
                            巧克力蛋糕<br>
                            普通蠟燭<br>
                            情人節卡片<br>
                        </span>
                        <img class="cancel_logo" src="../assets/images/cho_cake.jpg" alt="">
                    </div>
                </div>
            </section>
            <section class="shopping_cart_list">
                <div class="shopping_cart_block">
                    <div class="choose_cakeandimg">
                        <input type="checkbox" name="" class="shopping_cart_check">
                        <img class="shopping_cart_img" src="../assets/images/cho_cake.jpg" alt="">
                    </div>
                    <div class="choose_contentandcancel">
                        <span class="choose_content">
                            巧克力蛋糕<br>
                            普通蠟燭<br>
                            情人節卡片<br>
                        </span>
                        <img class="cancel_logo" src="../assets/images/cho_cake.jpg" alt="">
                    </div>
                </div>
            </section>
            <section class="shopping_cart_button">
                <router-link to="product">
                    <button class="return_shopping">繼續購物</button>
                </router-link>
                <router-link to="ready_to_checkout">
                    <button class="goto_checkout">前往結帳</button>
                </router-link>
            </section> -->
        </main>
        <footercom></footercom>
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "../components/title_h1.vue"
import Vue from 'vue'
export default {
    name:'shopping_cart',
    components:{
        titleh1,
        headercom,
        footercom,
    },
    data(){
        return{
            packs:['普通包裝','高級包裝','特殊包裝'],
            asd:123546,
            lists:[{
                idname: '一般卡片',
                price: 0,
                items:{
                },
            },{
                idname: '一般蠟燭',
                price: 0,
                items:{
                },

            }],
            items:['一般蠟燭','特殊蠟燭','一般卡片','特殊卡片'],
            packdata:'',
            // amount:'',
            // listother:{},
        }
    },
    methods:{
        addaddenda(){
            this.lists.push(
                {
                    idname: '一般蠟燭',
                    price: 0,
                    items:['一般蠟燭'
                    ],
                items:['一般蠟燭','特殊蠟燭','一般卡片','特殊卡片'],
            })
        },
        deladdenda(index){
            console.log(index)
                if(index !==1 && index !== 0){
                this.lists.splice(index,1);
            }
        },
    },
    watch: {                  // 2 宣告成物件
    },
    computed:{
        
    },
    mounted(){
    },
    updated() {
        // console.log(`updated() pack: ---> ${this.packdata}`)
    },
    created(){
        this.packdata = this.packs[0];
        document.querySelector('body').style.overflow='auto'
    }
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
        .prepare_checkout_page,.checkout_page{
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
    .addenda_block_outline{
        position: relative;
        max-width: 1120px;
        width: 100%;
        // height: 650px;
        background-color: $palePike;
        border-radius: 5px;
        display: flex;
        flex-direction: column;;
        .addenda_cancel_button{
            height: 35px;
            width: 35px;
            // display: flex;
            // justify-content: flex-end;
            position: absolute;
            top:20px;
            right: 20px;
            .addenda_cancel_button_icon{
                width: 35px;
                height: 35px;
                object-fit: cover;
                color: $darkGrey;
                cursor: pointer;
                // transform: rotate(0deg);
                transition: all .2s ease-out;
                &:hover{
                    // transform: rotate(10deg);
                    color: #916060;
                }
            }
        }
        .addenda_block_inline{
            max-width: 1120px;
            width: 95%;
            margin: auto;
            margin-bottom: 50px;
            .addenda_block_list1{
                max-width: 1060px;
                margin-top: 30px;
                width: 95%;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                // background-color: $lightYellow;
                @media screen and (max-width:991.98px){ 
                    flex-direction: column;
                    justify-content: space-between;
                    height: 300px;
                    align-items: center;
                }
                .addenda_block_cake{
                    max-width: 345px;
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    @media screen and (max-width:991.98px){ 
                        max-width: 70%;
                        width: 95%;
                    }
                    .addenda_block_cake_img_block{
                        width: 100px;
                        height: 100px;
                        img{
                            width: 100px;
                            height: 100px;
                            object-fit: fill;
                        }
                    }
                    .addenda_block_package_item_img_block{
                        width: 100px;
                        height: 100px;
                        img{
                            width: 100px;
                            height: 100px;
                            object-fit: cover;
                        }
                    }
                    .addenda_block_cake_content{
                        max-width: 225px;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        width: 100%;
                        height: 100px;
                        .addenda_block_cake_title{
                            max-width: 225px;
                            width: 100%;
                            font-size: $h4;
                        }
                        .addenda_block_cake_sizeandamount{
                            display: flex;
                            justify-content: space-between;
                            font-size: $p;
                            .addenda_block_cake_size{
                                font-size: $p;
                            }
                        }
                        .addenda_block_cake_amountandunit{
                            max-width: 60px;
                            display: flex;
                            width: 100%;
                            .addenda_block_cake_amount{
                                max-width: 35px;
                                width: 100%;
                            }
                            .addenda_block_cake_unit{
                                max-width: 25px;
                                width: 100%;
                            }
                        }
                    }
                    .addenda_block_cake_twandprice{
                        max-width: 225px;
                        width: 100%;
                        font-size: $h3;
                        display: flex;
                        justify-content: flex-start;
                        .addenda_block_cake_tw{
                            max-width: 50px;
                            width: 100%;
                        }
                        .addenda_block_cake_price{
                            max-width: 150px;
                            width: 50px;
                        }
                    }
                }
                .select_block{
                display: flex;
                justify-content: space-between;
                width: calc(100% - 400px);
                @media screen and (max-width:991.98px){ 
                    // display: flex;
                    // flex-direction: column;
                }
                    .addenda_block_package{
                        max-width: 220px;
                        width: 100%;
                        display: flex;
                        // margin-left: 60px;
                        justify-content: space-between;
                        @media screen and (max-width:991.98px){ 
                            max-width: 70%;
                            width: 95%;
                        }
                        .addenda_block_package_item_img_block{
                            width: 100px;
                            height: 100px;
                            background-color: black;
                            img{
                                width: 100px;
                                height: 100px;
                                object-fit: cover;
                            }
                        }
                        .addenda_block_cake_content{
                            max-width: 100px;
                            width: 100%;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            .addenda_block_cake_title{
                                font-size: $h4;
                            }
                            .addenda_block_cake_twandprice{
                                max-width: 225px;
                                width: 100%;
                                font-size: $h3;
                                display: flex;
                                justify-content: flex-start;
                                .addenda_block_cake_tw{
                                    max-width: 50px;
                                    width: 100%;
                                }
                                .addenda_block_cake_price{
                                    max-width: 50px;
                                    width: 100%;
                                    
                                }
                            }
                        }
                    }
                .addenda_block_package_select_block{
                    max-width: 220px;
                    width: 100%;
                    display: flex;
                    // margin-left: 85px;
                    align-items: center;
                    text-align: center;
                    select{
                        max-width: 220px;
                        background-color: white;
                        width: 100%;
                        height: 30px;
                    }
                }
            }
            .addenda_cancel_button_block{
                width: 150px;
                display: flex;
                justify-content: flex-end;
                
            }

        }
        .addenda_hr{
            max-width: 1060px;
            width: 100%;
            border-top: 2px dotted $darkGrey;
            margin-bottom: 25px;
            margin-top: 25px;
            
        }
        .addenda_block_list2{
            display: flex;
            max-width: 1060px;
            width: 100%;
            margin-bottom: 50px;
            .addenda_item_block_cardorcandle{
                max-width: 345px;
                width: 100%;
                display: flex;
                justify-content: space-between;
                .addenda_block_cake_img_block_cardorcandle{
                    width: 100px;
                    height: 100px;
                    img{
                        width: 100px;
                        height: 100px;
                        object-fit: cover;
                    }
                }
                .addenda_block_cake_content_cardorcandle{
                    max-width: 225px;
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    .addenda_block_cake_title_cardorcandle{
                        max-width: 225px;
                        width: 100%;
                        font-size: $h4;
                    }
                    .addenda_block_cake_twandprice_cardorcandle{
                        max-width: 225px;
                        width: 100%;
                        font-size: $h3;
                        display: flex;
                        justify-content: flex-start;
                        .addenda_block_cake_tw_cardorcandle{
                            max-width: 50px;
                            width: 100%;
                        }
                        .addenda_block_cake_price_cardorcandle{
                            max-width: 150px;
                            width: 50px;
                        }
                    }
                }
            }
            .addenda_block_cake_item_cardorcandle_select{
                margin-left: 60px;
                max-width: 220px;
                width: 100%;
                // height: 30px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                #addenda_block_cake_item_select{
                    background-color: white;
                    width: 100%;
                    height: 30px;
                    display: flex;
                    justify-content: center;
                }
            }
            .addenda_block_cake_item_cardorcandle_select_other{
                margin-left: 85px;
                max-width: 220px;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                #addenda_block_cake_item_select_other{
                    background-color: white;
                    width: 100%;
                    height: 30px;
                    display: flex;
                    justify-content: center;
                }
            }
            .addenda_item_cancel_block{
                width: 235px;
                display: flex;
                justify-content: center;
                align-items: center;
                .addenda_item_cancel{
                    cursor: pointer;
                    width: 30px;
                    height: 30px;
                    transform:scale(1,1);
                        transition:all .3s ease-out;
                        &:hover{
                            transform: scale(1.2,1.2);
                        }
                    img{
                        width: 30px;
                        height: 30px;
                    }
                }

                }
            }
        
            
            .addenda_block_list4{
                display: flex;
                max-width: 1120px;
                width: 100%;
                height: 100px;
                margin: auto;
                background-color: rgba(255, 255, 255, 0.4);
                .new_addenda_block_outline{
                    max-width: 960;
                    width: 100%;
                    height: 100px;
                    display: flex;
                    // margin-bottom: 50px;
                    justify-content: center;
                    align-items: center;
                    .new_addenda_block_square{
                        width: 75px;
                        height: 75px;
                        cursor: pointer;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-around;
                        align-items: center;
                        img{
                            object-fit: fill;
                            align-items: center;
                            margin: auto;
                            width: 75px;
                            height: 75px
                        }
                    }
                }
            }
        }
    }
    .addenda_button_block{
        max-width: 520px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-bottom: 50px;
        margin-top: 50px;
        .addenda_goto_shopping{
            // margin-top: 45px;
            // margin-bottom: 20px;
            width: 120px;
            height: 60px;
            border-radius: 5px;
            background-color: $darkGrey;
            color: white;
            font-size: $h4;
            box-shadow: $shadow;
            &:hover{
                color: $lightYellow;
                cursor: pointer;
            }
        }
        .goto_checkout{
            width: 120px;
            height: 60px;
            border-radius: 5px;
            background-color: $darkGrey;
            color: white;
            font-size: $h4;
            box-shadow: $shadow;
            &:hover{
                color: $lightYellow;
                cursor: pointer;
            }
        }
    }
}

// img{
//     display: none;
// }
</style>