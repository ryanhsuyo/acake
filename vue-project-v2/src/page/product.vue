<template>
    <div>
        <headercom openWhat="product"></headercom>
        <!-- 主廚/創意頁面切換 -->
        <div class="product_page_main_bar">
            <div class="change_page">
                <switchTab></switchTab>   
            </div>
            <!-- 搜尋欄 -->
            <div class="searchbar_titlebar">
                <input type="text" placeholder="搜尋..." class="search_baron"/>
            </div>
            <!-- </div> -->
            <!-- <div id="select_test"></div> -->
        </div>

        <main class="product_page_main">
            <titleh1 class="titleh1rwd" title="主廚蛋糕"></titleh1>
                <div id="product_cakecard" >
                    <router-link to="product_detail"  v-for="(card, index) in 12" :key="index">
                        <div class="product_card_outline"> 
                            <div class="product_img_container">
                                <img class="product_img_container_img" src="../assets/images/cho_cake.jpg" />
                            </div>
                            <div class="product_introduce">
                                <div class="product_detail">
                                    <div class="product_cake_title" >巧克力蛋糕</div>
                                    <span class="price">NT$800</span>
                                </div>
                                <button class="like_button">
                                    加入我的最愛
                                    <img src="../assets/images/love_icon.svg">
                                </button>
                            </div>
                        </div>
                    </router-link>
                </div>
        </main>
        <main class="product_page_main">
            <titleh1 class="titleh1rwd" title="私廚蛋糕"></titleh1>
                <div id="product_cakecard" >
                    <div class="product_card_outline" v-for="(card, index) in 12" :key="index"> 
                        <div class="product_img_container">
                            <img class="product_img_container_img" src="../assets/images/cho_cake.jpg" />
                        </div>
                        <div class="product_introduce">
                            <div class="product_detail">
                                <div class="product_cake_title" >巧克力蛋糕</div>
                                <span class="price">NT$800</span>
                            </div>
                            <button class="like_button">
                                加入我的最愛
                                <img src="../assets/images/love_icon.svg">
                            </button>
                        </div>
                    </div>
                </div>
        </main>

        <footercom></footercom>
        
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "../components/title_h1.vue"
import switchTab from "../components/switchTab"
export default {
    name:'product',
    components:{
        titleh1,
        headercom,
        footercom,
        switchTab,
    },
    data(){
        return{
            asd:123546,
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
router-link{
    text-decoration: none;
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
        .product_img_container{
            max-width: 300px;
            margin: 25px;
            width: 100%;
            display: flex;
            justify-content: center;
            .product_img_container_img{
                object-fit: cover;
                width: 100%;
                height: 100%;
                @media screen and (max-width:767.98px){ 
                width: 80%;
                height: 80%;
                object-fit: cover;
                }
            }
        }
        .product_introduce{
            margin: 20px;
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            .product_detail{
                display: flex;
                flex-direction: column;
                // height: 60px;
                color: black;
                .product_cake_title{
                    font-size: $h3;
                }
                .price{
                    font-size: $h4;
                }
            }
            .like_button{
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
            }
        }
    }
}
.like_button{
    cursor: pointer;
}
a{
    text-decoration: none;
}
</style>