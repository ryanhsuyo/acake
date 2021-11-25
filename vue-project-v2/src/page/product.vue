<template>
    <div>
        <headercom></headercom>
        <!-- 主廚/創意頁面切換 -->
        <div class="product_page_main_bar">
            <div class="change_page">
                <switchTab @receive="abc"></switchTab>   
            </div>
            <!-- 搜尋欄 -->
            <div class="searchbar_titlebar">
                <input type="text" placeholder="搜尋..." class="search_baron"/>
            </div>
            <!-- </div> -->
            <!-- <div id="select_test"></div> -->
        </div>
<!-- 
        <section class="product_page_main" v-show="bbb">
            <titleh1 class="titleh1rwd" title="主廚蛋糕" ></titleh1>
                <div id="product_cakecard" >
                        <div class="product_card_outline" v-for="(card, index) in chefCake" :key="index"> 
                            <div class="product_img_container">
                                <router-link to="product_detail"  >
                                    <img class="product_img_container_img" src="../assets/images/cho_cake.jpg" />
                                </router-link>
                            </div>
                            <div class="product_introduce">
                                <div class="product_detail">
                                    <div class="product_cake_title" >{{card.CAKE_NAME}}</div>
                                    <div class="ntandprice">
                                        <span class="nt">NT$</span>
                                        <span class="price">{{card.PRICE}}</span>
                                    </div>
                                </div>
                                <button class="like_button">
                                    加入我的最愛
                                    <img src="../assets/images/love_icon.svg">
                                </button>
                            </div>
                        </div>
                </div>
        </section> -->
        <section class="product_page_main" v-show="bbb">
            <titleh1 class="titleh1rwd" title="主廚蛋糕" ></titleh1>
            <div id="product_cakecard" >
                <div class="product_card_outline" v-for="(card, index) in chefCake" :key="index"> 
                    <div class="product_cake_title" >{{card.CAKE_NAME}}
                        <!-- <img class="loveicon2" src="../assets/images/love_icon_h.svg" > -->
                        <font-awesome-icon class="loveicon" icon="fa-solid fa-heart"  @click="openFavorite=!openFavorite;loveActive()" :class="{'active':light}" />
                        <!-- <img class="loveicon" src="../assets/images/love_icon.svg"> -->
                        <SelectFavorite class="openFavorite" :openFavorite="openFavorite"></SelectFavorite>
                    </div>
                    <div class="product_img_container" @click="addToStorage(card, card.CAKE_ID)">
                        <!-- <router-link to="product_detail"  > -->
                            <img class="product_img_container_img" src="../assets/images/cho_cake.jpg" />
                        <!-- </router-link> -->
                    </div>
                    <div class="product_introduce">
                        <div class="product_detail">
                            <div class="ntandprice">
                                <span class="nt">NT$</span>
                                <span class="price">{{card.PRICE}}</span>
                            </div>
                            <div class="size">{{card.SIZE}}吋</div>
                        </div>
                        <button class="addtocar" @click="addToCakeCart(card); addQuantityToCart(counter); addToPStorage(packageSelected); addAdditionalToStorage(addendacards)">
                            加入購物車 
                            <img src="../assets/images/shoppingCar.svg">
                            <transition appear
                                @before-appear="beforeEnter"
                                @after-appear='afterEnter'
                                v-for="(item,index) in showMoveDot"
                                :key="index.id">
                                <div class="move_dot"
                                    ref="ball"
                                    v-if="item">
                                </div>
                            </transition>       
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="product_page_main" v-show="!bbb">
            <titleh1 class="titleh1rwd" title="私廚蛋糕" ></titleh1>
            <div id="product_cakecard" >
                <div class="product_card_outline" v-for="(card, index) in designerCake" :key="index"> 
                    <div class="product_cake_title" >{{card.CAKE_NAME}}
                        <font-awesome-icon class="loveicon" icon="fa-solid fa-heart"  @click="openFavorite=!openFavorite;loveActive()" :class="{'active':light}" />
                        <!-- <img class="loveicon" src="../assets/images/love_icon.svg"> -->
                        <SelectFavorite class="openFavorite" :openFavorite="openFavorite"></SelectFavorite>
                    </div>
                    <div class="product_img_container" @click="addToStorage(card, card.CAKE_ID)">
                        <!-- <router-link to="product_detail"  > -->
                            <img class="product_img_container_img" src="../assets/images/cho_cake.jpg" />
                        <!-- </router-link> -->
                    </div>
                    <div class="product_introduce">
                        <div class="product_detail">
                            <div class="ntandprice">
                                <span class="nt">NT$</span>
                                <span class="price">{{card.PRICE}}</span>
                            </div>
                            <div class="size">{{card.SIZE}}吋</div>


                        </div>
                        <button class="addtocar" @click="addToCakeCart(card); addQuantityToCart(counter); addToPStorage(packageSelected); addAdditionalToStorage(addendacards)">
                            加入購物車 
                            <img src="../assets/images/shoppingCar.svg">
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <footercom></footercom>
        
    </div>
</template>
<script>

import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "../components/title_h1.vue"
import switchTab from "../components/switchTab"
import SelectFavorite from "../components/cakeSelectFavoriteBox"
import axios from "axios"
import qs from "qs"


export default {
    name:'product',
    components:{
        titleh1,
        headercom,
        footercom,
        switchTab,
        SelectFavorite
    },
    data(){
        return{
            vuex:this.$store.state.member_id.NAME,
            receive: '',
            bbb : true,
            chefCake: [],
            designerCake: [],
            showMoveDot: [], 
            elLeft: 0, //當前點擊購物車按鈕在網頁中的絕對top值
            elTop: 0, //當前點擊購物車按鈕在網頁中的絕對left值
            counter: 1,
            openFavorite: false,
            light:false,
            packageSelected: {},
            addendacards:[],
            // pageID: 0,
        }
    },
    // props:{
        
    // },
    methods:{
        // changeblock: changeblock? 
        // getValFormChild(val){
        //     this.receive = 
        // }
            // 我要資料替換掉light
        loveActive(){
            this.light=true
        },
        abc(ev){
            console.log(ev)
            console.log(typeof ev)
            this.bbb = ev;
        },   
        addToCart(product, num){
            this.showMoveDot = [...this.showMoveDot, true];
            this.elLeft = event.target.getBoundingClientRect().left;
            this.elTop = event.target.getBoundingClientRect().top;
        },
        addToStorage(cake, id){
            this.$store.dispatch('storage', cake);
            this.$router.push({path: `product_detail?id=${id}`});
            console.log('讓我看看',id);
        },
        addToCakeCart(cake){
            this.$store.dispatch('storage', cake)
        },
        addQuantityToCart(counter){
            this.$store.dispatch('cakeQ', counter)
        },
        addAdditionalToStorage(additional){
        this.$store.dispatch('AStorage', additional)
        },
        addToPStorage(packageSelected){
        this.$store.dispatch('PStorage', packageSelected)
        console.log('做不出來',packageSelected);
        }


    },
    watch:{ 
        
    },
    computed:{
        my(){
            return this.$store.state.member_id
        },
        beforeEnter (el) {
        // 設置transform值
        el.style.transform = `translate3d(${this.elLeft - 30}px,${this.elTop - 100}px , 0)`;
        // 設置透明度
        el.style.opacity = 0;
        },
        afterEnter (el) {
        // 獲取底部購物車徽標
        const badgePosition = document
        .getElementById("buycar")
        .getBoundingClientRect();
        // 設置小球移動的位移
        el.style.transform = `translate3d(${badgePosition.left + 30}px,${badgePosition.top - 30}px,0)`
        // 增加貝塞爾曲線  
        el.style.transition = 'transform .88s cubic-bezier(0.3, -0.25, 0.7, -0.15)';
        el.style.transition = 'transform .88s linear';
        this.showMoveDot = this.showMoveDot.map(item => false);
        // 設置透明度
        el.style.opacity = 1;
        }

    },
    mounted(){
        {
        // axios.post("./static/api/productSelectCake.php",qs.stringify({cakeID: this.CAKE_ID}))
            axios.post("./static/api/productSelectCake.php",qs.stringify({cakeID: this.CAKE_ID}))
            .then(res => {
                console.log(res.data);
                let data = res["data"];
                // let datalength = data.length
                this.chefCake = data.filter(item => item.MEMBER_ID === "0");
                this.designerCake = data.filter(item => item.MEMBER_ID !== "0");
            })
            .catch((error) => {
                console.log(error);
            })
        }
        {
        // axios.post("./static/api/productSelectCake.php",qs.stringify({cakeID: this.CAKE_ID}))
            axios.post("./static/api/productDetailSelectPackage.php")
            .then(res => {
                console.log(res.data);
                this.packageSelected = res.data[0];
                console.log( '這個要跑什麼好呢',this.packageSelected);
            })
            .catch((error) => {
                console.log(error);
            })
        }
        const params = new URLSearchParams();
        // params.append("page", index);
        axios({
            method: "post",
            url: "./static/api/productDetailSelectAdditional.php",
            data: params,
        })
        .then((res) => {
            console.log(res.data);
            let data = res.data;
            console.log('這是什麼', data)
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
            console.log('這個choices', this.choices)
        })
        .catch((error) => {
            console.log(error);
        })
        const data = new URLSearchParams();
        // params.append("page", index);
        axios({
            method: "post",
            url: "./static/api/productDetailSelectPackage.php",
            data: data,
        })
        .then((res) => {
            console.log(res.data);
            let data = res.data;
            this.packages = data;
            console.log('這是什麼packages', this.packages)
            this.packageSelected = this.packages[0]
            console.log(this.packageSelected);
            console.log(this.packageSelected.ACCESSOPIES_PRICE);
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

.outline{
    margin-bottom: 50px;
}
.titleh1rwd{
    margin-bottom: 50px;
    @media screen and (max-width:767.98px){ 
        display: flex;
        justify-content: center;
        margin: 0 auto;
        margin-bottom: 50px;
        align-items: center;
        // margin-bottom: 150px;
    }
}
// 主廚/創意頁面切換
.product_page_main_bar{
    max-width: 1120px;
    width:100%;
    margin:0 auto;
    @media screen and (max-width:767.98px){ 
        justify-content: center;
        max-width: 576px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: auto;
    }
    .change_page{
        margin-top: 150px;
        max-width: 1120px;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 100px;
        @media screen and (max-width:767.98px){ 
            max-width: 400px;
            width: 95%;
            display: flex;
            justify-content: center;
        }
    }
}
// 搜尋欄
.searchbar_titlebar{
    display: flex;
    justify-content: flex-end;
    @media screen and (max-width:767.98px){ 
        max-width: 400px;
        width: 100%;
        display: flex;
        justify-content: center;
        margin: auto;
    }
}
.search_baron{
    max-width:100%;
    height:50px;
    border-radius: 100px;
    border:none;
    padding:0 30px;
    opacity:70%;
    box-shadow: $shadow;
    font-size: $h4;
    display: flex;
    max-width: 400px;
    width: 100%;
    cursor: text;
    justify-content: flex-end;
    margin-bottom: 50px;
    &:focus{
        border:none;
    }
    @media screen and (max-width:767.98px){ 
        max-width: 400px;
        width: 95%;
    }
}
#select_test{
    margin-bottom: 85px;
}

.product_page_main{
    width:100%;
    max-width: 1120px;
    margin:0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    @media screen and (max-width:767.98px){ 
        max-width: 576px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
}

// 下方商品卡片
#product_cakecard{
    margin: 0 auto;
    margin-bottom: 100px;
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(320px,1fr));
    gap:85px 30px;
    max-width: 1120px;
    width: 95%;
    @media screen and (max-width:767.98px){ 
        margin: 0 auto;
        margin-bottom:70px;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(320px,1fr));
        flex-wrap: wrap;
        gap:70px 30px;
        max-width: 576px;
        width: 100%;
    }
    
    .product_card_outline{
        background-color: $palePike;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        margin: auto;
        width: 100%;
        max-width: 350px;
        @media screen and (max-width:767.98px){ 
            background-color: $palePike;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            width: 100%;
            max-width: 320px;
        }
        .product_cake_title{
            max-width: 300px;
            width: 100%;
            font-size: $h3;
            margin-top: 15px;
            margin-bottom: 15px;
            position: relative;
        }
        .loveicon{
            position: absolute;
            top:3px;
            right: 0px;
            width: 25px;
            height: 25px;
            object-fit: fill;
            &:hover{
                cursor: pointer;
                color: red;
            }
        }
        .loveicon.active{
            color: red;
        }

        router-link{
            text-decoration: none;
            display: flex;
        }
        .product_img_container{
            max-width: 300px;
            // margin: 15px;
            cursor: pointer;
            width: 100%;
            display: flex;
            justify-content: center;
            .product_img_container_img{
                object-fit: cover;
                width: 100%;
                height: 100%;
                @media screen and (max-width:767.98px){ 
                width: 100%;
                height: 100%;
                object-fit: cover;
                }
            }
        }
        .product_introduce{
            margin: 15px;
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            .product_detail{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                max-width: 100px;
                width: 100%;
                color: black;
                .ntandprice{
                    display: flex; 
                    align-items: center;
                    justify-content: space-between;
                    .price{
                        font-size: $h3;
                        }
                    .nt{
                        font-size: $h3;
                    }
                }
                .size{
                    font-size: $h4;
                }
            }
            .addtocar{
                width: 180px;
                height: 60px;
                border-radius: 30px; 
                box-shadow: $shadow;
                background-color: $lightPike;
                font-size: $h4;
                border: 0;
                
                img{
                    width: 20px;
                    height: 20px;
                }
                &:hover{
                    // color: $lightPike;
                    cursor: pointer;
                    // background-color: $darkGrey;
                }
            }
        }
    }
}
.like_button{
    cursor: pointer;
}
a{
    text-decoration: none;
    display: flex;
}
.openFavorite{
    position: absolute;
    top: 0;
}
</style>