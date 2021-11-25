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
            <section class="addenda_block_outline" v-if="cake.CAKE_NAME">
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
                                <div class="addenda_block_cake_title">{{cake.CAKE_NAME}}</div>
                                <div class="addenda_block_cake_sizeandamount">
                                    <div class="addenda_block_cake_size">
                                        {{cake.SIZE}} 吋
                                    </div>
                                    <div class="addenda_block_cake_amountandunit">
                                        <div class="addenda_block_cake_amount">{{cakeQuantity}}</div>
                                        <div class="addenda_block_cake_unit">個</div>
                                    </div>
                                </div>
                                <div class="addenda_block_cake_twandprice">
                                    <div class="addenda_block_cake_tw">NT$</div>
                                    <div class="addenda_block_cake_price">{{cake.PRICE * cakeQuantity}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="select_block">

                            <div class="addenda_block_package" v-if="packageSelected.ACCESSORIES_NAME">
                                <div class="addenda_block_package_item_img_block">
                                    <img src="../assets/images/cho_cake.jpg" alt="">
                                </div>
                                <div class="addenda_block_cake_content">
                                    <div class="addenda_block_cake_title">{{packageSelected.ACCESSORIES_NAME}}</div>
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
                                        <div class="addenda_block_cake_price">{{packageSelected.ACCESSORIES_PRICE}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="addenda_block_package_select_block">  
                                <select  v-model='packageSelected' name="" id="addenda_block_package_select">
                                    <option  v-for="(pack, index) in packages" :key='index' :value="pack" >{{pack.ACCESSORIES_NAME}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="addenda_cancel_button_block" >
                            
                        </div>
                    </div>
                    <div class="addenda_hr"></div>
                    <div class="addenda_block_list2" v-for="(addendacard,index) in addendacards" :key='index' >
                        <div class="addenda_item_block_cardorcandle">
                            <div class="addenda_block_cake_img_block_cardorcandle">
                                <img src="../assets/images/bit_cake.jpg" alt="">
                            </div>
                            <div class="addenda_block_cake_content_cardorcandle">
                                <div class="addenda_block_cake_title_cardorcandle">{{addendacard.choice.ACCESSORIES_NAME}}</div>
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
                                    <div class="addenda_block_cake_price_cardorcandle">{{addendacard.choice.ACCESSORIES_PRICE * addendacard.quantity }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="addenda_block_cake_item_cardorcandle_select_block">

                            <div class="addenda_block_cake_item_cardorcandle_select">
                                <select v-model="addendacards[index].choice"  id="addenda_block_cake_item_select">
                                    <option 
                                    v-for="(choice, i) in choices"                  
                                    :key='i'
                                    :value="choice"
                                    v-show="!addendacards.map(card=>card.choice).includes(choice)"
                                    >{{choice.ACCESSORIES_NAME}}</option>
                                </select>
                            </div>
                            <div class="addenda_block_cake_item_cardorcandle_select_other">
                                <select name="quantity" id="addenda_block_cake_item_select_other" v-model="addendacards[index].quantity">
                                    <option v-for="quantity in 10 " :key='quantity'>{{quantity}}</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="addenda_item_detail">

                        </div>
                        <div class="addenda_item_amount"></div> -->
                        <div class="addenda_item_cancel_block">
                            <div class="addenda_item_cancel"  @click="deladdenda(index, ASt)">
                                <img src="../assets/images/trash_icon.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="addenda_block_list4" v-show="addendacards.length<choices.length">
                        <div class="new_addenda_block_outline">
                            <div  class="new_addenda_block_square" @click="addaddenda(index)" >
                                <img src="../assets/images/add_purchase_icon.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="addenda_button_block">
                <router-link to="product">
                    <button class="addenda_goto_shopping" v-if="packageSelected.ACCESSORIES_NAME">繼續購物</button>
                </router-link>
                <router-link to="ready_to_checkout">
                    <button class="goto_checkout" v-if="packageSelected.ACCESSORIES_NAME" @click="addToCart(addendacards, cake, cakeQuantity, packageSelected)">前往結帳</button>
                </router-link>
            </div>
            <p class="errorText" v-if="!packageSelected.ACCESSORIES_NAME">您還沒有購入任何蛋糕</p>
            <router-link to="product">
                <button class="backToProduct" v-if="!packageSelected.ACCESSORIES_NAME">選購蛋糕</button>
            </router-link>
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
import axios from "axios"
// const choices =[
//             {
//                 idname: "一般卡片",
//                 description: "我是一般卡片",
//                 price: 10,
//                 option: "",
//                 discount: 10,
//                 id:1,
//             },
//             {
//                 idname: "一般蠟燭",
//                 description: "我是一般蠟燭",
//                 price: 10,
//                 discount: 10,
//                 option: "",
//                 id:2,
//             },
//             {
//                 idname: "特殊蠟燭",
//                 description: "我是特殊蠟燭",
//                 price: 50,
//                 discount: 0,
//                 option: "",
//                 id:3,
//             },
//             {
//                 idname: "情人節卡片",
//                 description: "情人節卡片",
//                 price: 30,
//                 discount: 0,
//                 option: "",
//                 id:4,
//             },
//             {
//                 idname: "聖誕節卡片",
//                 description: "聖誕節卡片",
//                 price: 30,
//                 discount: 0,
//                 option: "",
//                 id:5,
//             },
//             {
//                 idname: "造型數字蠟燭(0)",
//                 description: "數字0蠟燭",
//                 price: 30,
//                 discount: 0,
//                 option: "",
//                 id:6,
//             },
//             {
//                 idname: "造型數字蠟燭(1)",
//                 description: "數字1蠟燭",
//                 price: 30,
//                 discount: 0,
//                 option: "",
//                 id:7,
//             }
//         ]

// const AS0 = this.$store.state.AStorage[0].choice
// const AS1 = this.$store.state.AStorage[1].choice

// const packages = [{
//     description:"一般包裝就是一班包裝",
//     name:"普通包裝",
//     price:0,
// },{
//     description:"高級包裝就是高級包裝",
//     name: "高級包裝",
//     price:60,
// },{
//     description:"特殊包裝就是特殊包裝",
//     name: "特殊包裝",
//     price:120,
// }]
export default {
    name:'shopping_cart',
    components:{
        titleh1,
        headercom,
        footercom,
    },
    data(){
        return{
            index: 0,
            packages: [],
            packageSelected: this.$store.state.PStorage,
            choices: [],
        }
    },
    methods:{
        testChange(){
            let select = document.getElementById('addenda_block_package_select');
            this.packageSelected=select.value
            console.log(select)
        },
        addaddenda(){
            if(this.addendacards.length < this.choices.length ){
                this.addendacards.push(
                    {
                        quantity: 1,
                        choice: this.notSelectedChoices[0],
                    }
                )
            }
        },
        deladdenda(index){
            this.addendacards.splice(index,1);
        },
        addToCart(addendacards, cake, cakeQuantity, packageSelected){
            console.log(addendacards);
            console.log(cake);
            console.log(cakeQuantity);
            console.log(packageSelected);
            
        }
        
    },
    watch: {                  // 2 宣告成物件
    },
    computed:{
        notSelectedChoices(){
            //全部商品過濾每個商品
            return this.choices.filter((choice) => {
                // console.log('thischoices這個',choices);
                // 已選的商品如果有回傳true
                return !this.addendacards.some((addendacard) => {
                    // 已選商品 === 目前商品
                    // console.log('sing' ,addendacard.choice, choice);
                    return JSON.stringify(addendacard.choice) === JSON.stringify(choice)
                })
            })
        },
        // packages(){
        //     return this.$store.state.PStorage
        // },
        addendacards(){
            return this.$store.state.AStorage
        },
        cake(){
            return this.$store.state.storage
        },
        cakeQuantity(){
            return this.$store.state.cakeQuantity
        },
        PStorage(){
            return this.$store.state.PStorage
        }
    },
    mounted(){
        const params = new URLSearchParams();
        // params.append("page", index);
        axios({
            method: "post",
            url: "http://localhost/yoyo/productDetailSelectAdditional.php",
            data: params,
        })
        .then((res) => {
            console.log(res.data);
            let data = res.data;
            console.log('這是什麼', data)
            this.choices = data;
            // console.log('012', this.choices);
            // this.addendacards = 
            //     [
            //     {
            //         quantity: 1,
            //         choice: this.choices[0],
            //     },
            //     {
            //         quantity: 1,
            //         choice: this.choices[2],
            //     }
            //     ]
            console.log('這個choices', this.choices)
        })
        .catch((error) => {
            console.log(error);
        })
        // for(let prop in this.$store.state.AStorage){
        //     console.log(this.$store.state.AStorage[prop])
        //     this.addendacards.push(this.$store.state.AStorage[prop]);
        // }
        // this.addendacards.concat(this.$store.state.AStorage);
        // 會員認證，非會員跳轉到登入頁面
            // if(this.$store.state.member_id==0){
            //     alert("您尚未登入，將跳轉到登入頁面");
            //     this.$router.push('/assign')
            // }

            // return this.$store.state.storage;
            // return this.$store.state.Astorage;
            const data = new URLSearchParams();
        // params.append("page", index);
        axios({
            method: "post",
            url: "http://localhost/yoyo/productDetailSelectPackage.php",
            data: data,
        })
        .then((res) => {
            console.log(res.data);
            let data = res.data;
            this.packages = data;
            console.log('shopping這是什麼packages', this.packages)
            // this.chefCake = data.filter(item => item.MEMBER_ID === "0");
            // this.designerCake = data.filter(item => item.MEMBER_ID !== "0");
            // console.log('thischefcake', this.chefCake);
            // console.log('thisdesingerckae', this.designerCake);
            // console.log(data);
            // console.log(datalength);
            // console.log(data.length); 
            // this.DesignerCake = res.data
        })
        .catch((error) => {
            console.log(error);
        })
            
    },
    updated() {
        // console.log(`updated() pack: ---> ${this.packdata}`)
    },
    created(){
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
                max-width: 845px;
                margin-top: 30px;
                width: 100%;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                // background-color: $lightYellow;
                @media screen and (max-width:991.98px){ 
                    flex-direction: column;
                    justify-content: space-between;
                    height: 300px;
                    align-items: center;
                    margin: auto;
                    margin-top: 50px;
                }
                .addenda_block_cake{
                    max-width: 345px;
                    width: 100%;
                    display: flex;
                    // justify-content: space-between;
                    justify-content: flex-start;
                    @media screen and (max-width:991.98px){ 
                        max-width: 576px;
                        width: 100%;
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
                        // margin-left: 60px;
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
                        margin-left: 18px;
                        @media screen and (max-width:991.98px){
                            justify-content: flex-start;
                            max-width: 225px;
                            width: 100%;
                        }
                        @media screen and (max-width:575.98px){
                            max-width: 225px;
                            width: 100%;
                        }
                        .addenda_block_cake_title{
                            max-width: 225px;
                            width: 100%;
                            font-size: $h4;
                            @media screen and (max-width:575.98px){
                                // width: 225px;
                            }
                        }
                        .addenda_block_cake_sizeandamount{
                            display: flex;
                            justify-content: space-between;
                            font-size: $p;
                            .addenda_block_cake_size{
                                font-size: $p;
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
                }
                .select_block{
                display: flex;
                justify-content: space-between;
                // width: calc(100% - 400px);
                width: 500px;
                @media screen and (max-width:991.98px){ 
                    max-width: 576px;
                    width: 100%;
                    display: flex;
                    // flex-direction: column;
                    justify-content: start;
                }
                    .addenda_block_package{
                        max-width: 220px;
                        width: 100%;
                        display: flex;
                        margin-left: 60px;
                        // justify-content: space-between;
                        @media screen and (max-width:991.98px){ 
                            max-width: 345px;
                            // width: 100%;
                            // max-width: 220px;
                            //   width: 100%;
                            margin: 0px;
                        }
                        @media screen and (max-width:575.98px){ 
                            max-width: 345px;
                            width: 100%;
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
                            // max-width: 100px;
                            width: 100%;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            // margin: 0px;
                            @media screen and (max-width:991.98px){ 
                                margin-left: 18px;
                                width: 225px;
                            }
                            @media screen and (max-width:575.98px){ 
                                width: 100%
                            }
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
                    max-width: 177.5px;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    text-align: center;
                    margin-left: 0px;
                    @media screen and (max-width:991.98px){ 
                        max-width: 120px;
                        width: 100%;
                        margin-left: 37px;
                        @media screen and (max-width:575.98px){ 
                            margin-left: 0px;
                        }
                    }
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
            @media screen and (max-width:991.98px){ 
                display: flex;
                max-width: 576px;
                width: 100%;
                margin: auto;
                justify-content: space-between;
                margin-bottom: 30px;
            }
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
                    @media screen and (max-width:575.98px){ 
                        margin-left: 18px;
                    }
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
            .addenda_block_cake_item_cardorcandle_select_block{
                max-width: 500px;
                width: 100%;
                display: flex;
                @media screen and (max-width:991.98px){ 
                    display: flex;
                    flex-direction: column;
                    max-width: 150px;
                    width: 100%;
                    justify-content: space-between;
                }
                .addenda_block_cake_item_cardorcandle_select{
                margin-left: 60px;
                max-width: 220px;
                width: 100%;
                // height: 30px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                @media screen and (max-width:991.98px){
                    margin: 0;
                    max-width: 150px;
                    width: 100%;
                }
                #addenda_block_cake_item_select{
                    background-color: white;
                    width: 100%;
                    height: 30px;
                    display: flex;
                    justify-content: center;
                    @media screen and (max-width:991.98px){
                        max-width: 150px;
                        width: 80%;
                        margin: auto;
                    }
                    @media screen and (max-width:575.98px){
                        width: 90%;
                    }
                }
            }
            .addenda_block_cake_item_cardorcandle_select_other{
                margin-left: 85px;
                max-width: 220px;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                @media screen and (max-width:991.98px){
                    max-width: 150px;
                    width: 100%;
                    margin: 0;
                }
                #addenda_block_cake_item_select_other{
                    background-color: white;
                    width: 100%;
                    height: 30px;
                    display: flex;
                    justify-content: center;
                    @media screen and (max-width:991.98px){
                        width: 80%;
                        margin: auto;
                    }
                    @media screen and (max-width:575.98px){
                        width: 90%;
                    }
                }
            }
            }
            .addenda_item_cancel_block{
                width: 235px;
                display: flex;
                justify-content: center;
                align-items: center;
                 @media screen and (max-width:991.98px){
                    max-width: 30px;
                    width: 100%;
                    margin: 0;
                }
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
.errorText{
    color: $darkGrey;
    font-size: $h1;
    margin-bottom: 50px;
}
.backToProduct{
    width: 120px;
    height: 60px;
    border-radius: 5px;
    background-color: $darkGrey;
    color: white;
    font-size: $h4;
    box-shadow: $shadow;
    margin-bottom: 100px;
    &:hover{
        color: $lightYellow;
        cursor: pointer;
    }
}
// img{
//     display: none;
// }
</style>