<template>
    <div>
        <headercom></headercom>
        <main id="product_details">
            <section class="shopping_cart_bread">
                <router-link to="product">
                    <span class="shopping_cart_page" v-if="cakeClass">{{cakeClass}}</span>
                </router-link>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="prepare_checkout_page" v-if="cake && cake.CAKE_NAME">{{cake.CAKE_NAME}}</span>
                <!-- <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="checkout_page">結帳完成</span> -->
            </section>

            <section id="product_details_combination1">
                <div id="cake_information"> 
                    <div id="cake_img_outline"> 
                        <img class="cake_img" :src="cake.CAKE_IMAGE_BLOB" alt="">
                        <!-- <img id="change_cake" src="../assets/images/cho_cake.jpg" alt=""> -->
                    </div>
                    <div id="cake_details">
                        <div class="cake_titlebar_content">
                            <div id="cake_titlebar">
                                <div id="cake_title" v-if="cake && cake.CAKE_NAME">{{cake.CAKE_NAME}}
                                    <!-- <img class="cake_detail_img" src="../assets/images/love_icon.svg" alt=""> -->
                                </div>
                                <div class="product_details_combination1_button">
                                    <!-- <router-link to="shopping_cart"> -->
                                        <button id="product_details_combination1_commit" @click="addToStorage(cake); addToStorageQ(counter); addToPStorage(packageSelected); addAdditionalToStorage(addendacards)">加入購物車</button>
                                    <!-- </router-link> -->
                                    <!-- <router-link to="shopping_cart"> -->

                                        <button id="product_details_combination1_buy" @click="open(); addToStorageQ(counter) ;addToStorage(cake);">直接購買</button>
                                    <!-- </router-link> -->
                                </div>


                            </div>
                            <div id="cake_content" v-if="cake && cake.CAKE_DESCRIPTION">{{cake.CAKE_DESCRIPTION}}
                            </div>
                        </div>
                        <div id="cake_size_quantity">
                            <form id='cake_quantity' method='POST' action='#'>
                                <input type='button' value='-' class='qtyminus' field='quantity' @click="minus"/>
                                <input type='text' name='quantity' value='數量' class='qty' disabled v-model="counter"/>
                                <input type='button' value='+' class='qtyplus' field='quantity' @click="add"/>
                            </form>
                            <div id="cake_size" style="border-radius: 5px;">
                                <label for="" style="border-radius: 5px;">
                                    <select class="cake_size_select">
                                        <option v-if="cake && cake.SIZE">{{cake.SIZE}}吋</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productDetailAddenda_block" v-show="showpage" >
                    <productDetailAddenda class="heyBro" v-show="showpage" @click="closeThePage" @closepage="nnn" :show="showpage"></productDetailAddenda>
                    <div class="blackpage" @click="closeThePage"></div>
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
import productDetailAddenda from "../components/productDetailAddenda"
import axios from "axios"
import qs from "qs"

export default {
    
    name:'product_detail',
    components:{
        titleh1,
        headercom,
        footercom,
        productDetailAddenda,
    },
    data(){
        return{
            counter: 1,
            showpage: false,
            cake: {},
            cakeClass: '',
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
        open(){
            this.showpage = !this.showpage;
            document.querySelector('body').style.overflow='hidden'
            
        },
        outlineclose(){
            this.showpage = !this.showpage;
            document.querySelector('body').style.overflow='auto'
        },
        nnn(ev){
            this.showpage = ev;
        },
        // 蛋糕數量資料 可給1就好
        addToStorageQ(cakeQuantity){
            this.$store.dispatch('cakeQ', cakeQuantity)
        },
        // 蛋糕資訊 ('圖片名稱','價錢','價錢','圖片','吋數')
        addToStorage(cake){
            this.$store.dispatch('storage', cake)
        },
        // 加購商品資料
        addAdditionalToStorage(additional){
            this.$store.dispatch('AStorage', additional)
            alert('已加入購物車!!')
        },
        // 包裝資料
        addToPStorage(packageSelected){
            this.$store.dispatch('PStorage', packageSelected)
        },
        closeThePage(){
            this.showpage = !this.showpage
        },
        // getCakeClass(){
        //     return this.$store.state.cakeClass
        // }
    },
    watch:{
        
    },
    computed:{
        cakeQuantity(){
            if(this.$store.state.cakeQuantity != "1"){
                this.counter =  this.$store.state.cakeQuantity
            }
            // this.counter = cakeQuantity
        },

    },
    mounted(){
        let pageID = this.$route.query.id;
        //     {
            axios.post("./static/yoyo_api/productSelectCakeChangePage.php",qs.stringify({pageID  : pageID }))
            .then(res => {
                this.cake = res.data[0];
                // this.cake = data.filter(item => item.CAKE_ID === 'pageID');
            //     data: pageID,
            // })
            }
        )
         const params = new URLSearchParams();
        // params.append("page", index);
        axios({
            method: "post",
            url: "./static/yoyo_api/productDetailSelectAdditional.php",
            data: params,
        })
        .then((res) => {
            let data = res.data;
            this.choices = data;
            this.addendacards = 
                [
                {
                    quantity: 1,
                    choice: this.choices[0],
                },
                {
                    quantity: 1,
                    choice: this.choices[2],
                }
                ]
        })
        .catch((error) => {
            console.log(error);
        })
        const data = new URLSearchParams();
        // params.append("page", index);
        axios({
            method: "post",
            url: "./static/yoyo_api/productDetailSelectPackage.php",
            data: data,
        })
        .then((res) => {
            let data = res.data;
            this.packages = data;
            this.packageSelected = this.packages[0]
        })
        .catch((error) => {
            console.log(error);
        })
        this.cakeClass = this.$store.state.cakeClass

    },
    created(){
        window.scrollTo(0, 0);
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
#product_details{
    background-color: $lightPike;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;

    // 購物車麵包屑
    .shopping_cart_bread{
        width: 95%;
        max-width: 950px;
        justify-content: flex-start;
        display: flex;
        font-size: $h4;
        margin-top: 120px;
        // margin-bottom: 50px;
        a{
            text-decoration: none;
            color: #515151;
        }
        @media screen and (max-width:767.98px){ 
            display: flex;
            margin-top: 120px;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 120px;
        }
        // .shopping_cart_page{
        //     text-decoration: none;
        //     color: black;
        // }
        .shopping_cart_page,.checkout_page{
            font-size: $p;
            max-width: 80px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            @media screen and (max-width:767.98px){ 
                font-size: $h4;
                max-width: 100px;
                width: 100%;
            }
        }
        .prepare_checkout_page{
            font-size: $p;
            max-width: 200px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: #515151;
            @media screen and (max-width:767.98px){ 
                justify-content: center;
            }
        }
        .shopping_cart_bread_arrow{
            width: 100%;
            max-width: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            .shopping_cart_bread_arrow_img{
                width: 16px;
                height: 16px;
                object-fit: fill;
                @media screen and (max-width:767.98px){ 
                    width: 16px;
                    height: 16px;
                    object-fit: fill;
                    transform: rotate(90deg);
            }
        }
    }
}
     // 購物車麵包屑結束

    #product_details_combination1{
        max-width: 1120px;
        width:100%;
        margin: 0 auto;
        margin-top: 30px;
        border-radius: 10px;
        margin-bottom: 100px;
        background-color: $palePike;
        @media screen and (max-width:767.98px){ 
            margin-bottom: 50px;
            max-width: 100%;
            width: 100%;
            transform: scale(0.95);
        }
        #cake_information{
            margin: 0 auto;
            margin-top: 100px;
            margin-bottom: 100px;
            max-width: 950px;
            width: 95%;
            display: flex;
            justify-content: space-between;
            @media screen and (max-width:767.98px){ 
                display: flex;
                flex-direction: column;
                max-width: 768px;
                width: 100%;
                align-items: center;
                margin-top: 50px;
                margin-bottom: 50px;
                height: 760px;
            }
            #cake_img_outline{
                width: 350px;
                height: 380px;
                // position: relative;
                // margin-right: 20px;
                z-index: 1;
                .cake_img{
                    width: 350px;
                    height: 380px;
                }
                // #change_cake{
                //     width: 100px;
                //     height: 100px;
                //     left: 250px;
                //     top: 280px;
                //     z-index: 5;
                //     // position: absolute;
                //     box-shadow: $shadow;
                //     cursor: pointer;
                // }
            }
            #cake_details{
                max-width: 470px;
                height: 380px;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                @media screen and (max-width:767.98px){ 
                    width: 95%;
                }
                .cake_titlebar_content{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    height: 220px;
                    color: #515151;
                    @media screen and (max-width:767.98px){ 
                        margin-top: 20px;
                    }
                    #cake_titlebar{
                        // height: 50px; 
                        // max-height: 120px;
                        // height: 100%;

                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;
                        @media screen and (max-width:767.98px){ 
                            margin-bottom: 70px;
                        }
                        #cake_title{
                            font-size: 36px;
                            .cake_detail_img{
                                object-fit: cover;
                                width: 20px;
                                height: 20px;
                                margin-left: 20px;
                                margin-top: 10px;
                                cursor: pointer;
                            }       
                        }
                        // #cake_clear{
                        //     width: 100px;
                        //     height: 40px;
                        //     align-items: center;
                        //     button{
                        //         display: inline-block;
                        //         width: 100px;
                        //         height: 40px;
                        //         font-size: 20px;
                        //         border: 2px solid $darkGrey;
                        //         background-color: $palePike;
                        //         border-radius: 10px;
                        //         box-shadow: $shadow;
                        //         cursor: pointer;
                        //     }
                        // }
                    }
                    #cake_content{
                    max-width: 470px;
                    width: 100%;
                    font-size: 16px;
                    }
                }
                #cake_size_quantity{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    width: 100%;
                    font-size: 0;
                    // margin: 0;
                    margin-top: 40px;
                    #cake_quantity{
                        display: flex;
                        
                        margin-bottom: 40px;
                        
                        .qtyminus,.qtyplus{
                            cursor: pointer;
                            width:50px;
                            height: 40px;
                            display: inline-block;
                            font-size: 25px;
                            background-color: #F7Edd4;
                        }
                        .qty{
                            border: none;
                            background-color: white;
                            margin: 0;
                            display: inline-block;
                            width: calc(100% - 50px - 50px);
                            height: 40px;
                            padding: 0px;
                            text-align: center;
                            font-size: 20px;
                            box-sizing: border-box;
                        }
                    }
                    #cake_size{
                        // display: flex;
                        text-align: right;
                        background-color: white;
                        width: 100%;
                        height: 40px;
                        max-width: 470px;
                        // justify-content: center;
                        // align-items: center;
                        // font-size: $h4;
                        .cake_size_select{
                            cursor: pointer;
                            width: 100%;
                            font-size: $h4;
                            text-align: center;
                            height: 40px;
                            max-width: 470px;
                            color: #515151;
                            border: none;
                            border-radius: 5px;
                        }
                    }
                }
            }
        }
        .addenda_titlebar{
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            margin-top: 45px;
            max-width: 900px;
            width:95%;
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
                        }  
                        .addenda_describe{
                            max-width: 120px;
                            white-space:pre-wrap;
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
        }   
        .addenda_block{
            padding-top: 30px;
            padding-bottom: 50px;
            background-color: #F7Edd4;
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            margin-top: 70px;
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
            width: 100%;
            height: 200px;
            max-width: 900px;
            margin: auto;
            display: flex;
            background-color:rgba(255, 255, 255, .5);
            justify-content: center;
            align-items: center;
            @media screen and (max-width:767.98px){ 
                max-width: 470px;
                width: 100%;
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
        height: 100px; 
        // margifn-top: 50px;
        align-items: flex-end;
        width: 100%;
        #product_details_combination1_commit{
            margin: 0 auto;
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
            box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.3);
            &:hover{
                color: $lightYellow;
            }
            router-link{
            text-decoration: none;
            height: 40px;
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
            box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.3);
            &:hover{
                color: $lightYellow;
            }
        router-link{
            text-decoration: none;
            height: 40px;
        }

        }
    }
}


.productDetailAddenda_block{
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.35);
    margin: auto;
    position: fixed;
    top: 0px;
    left: 0;
    z-index: 99999999;
    // transform: scale(0.5);
    @media screen and (max-width:767.98px){ 
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,.35);
        
    }
    .heyBro{
        margin: 100px auto;
        @media screen and (max-width:767.98px){ 
            margin: 250px auto;
            height: 800px;
        }
    }

}
.blackpage{
    background-color:  rgba(0,0,0,.35);;
    @media screen and (max-width:767.98px){ 
        margin: 0;
    }

}





</style>