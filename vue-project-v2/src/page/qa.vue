<template>
    <div>
        <div id="chat_icon_block" >
            <img id="chat_icon" src="../assets/images/message_icon.png" alt=" " @click="qaChatOpen ?　qaChatOpen = false : qaChatOpen = true">
            <qaChat class="qaChatPosition" v-show="qaChatOpen" ></qaChat>
        </div>

        <headercom openWhat="qa"></headercom>
        <div id="main-bar-img300"></div>
        <main class="shopping_cart_main">
            <titleh1 class="titleh1rwd" title="QA問答"></titleh1>
            <!-- <section class="shopping_cart_bread">
                <span class="shopping_cart_page">購物車</span>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="prepare_checkout_page">準備結帳</span>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="checkout_page">結帳完成</span>
            </section> -->
            <!-- 搜尋欄 -->
            <div class="searchbar_titlebar">
                <input type="text" placeholder="搜尋..." class="search_baron"/>
            </div>
            <section class="qa_question_block">
                <div class="qa_question_bar">
                    <div class="qa_maxtitlebar">
                        <font-awesome-icon class="icon_40" icon="fa-solid fa-minus" />
                        <label>保存問題</label>
                    </div>
                </div>
                <div class="qa_question_answer_block_outline">
                    <div class="qa_question_answer_block_insideblock">
                        <div class="qa_common_question_answerblock">
                            <div class="qa_common_question_titlebar">
                                <font-awesome-icon class="icon_30" icon="fa-solid fa-minus" />
                                <div class="qa_common_question_title">蛋糕保存辦法</div>
                            </div>
                            <div class="qa_hr"></div>
                            <div class="qa_common_answer">常溫保存約1~2個小時。建議到家先冰冷凍30分鐘~1個小時，等蛋糕變軟硬適中後，再分切冰入冷凍或冷藏；行車過程中，盡量保持蛋糕平放，若還有其他行程，請勿將蛋糕置於車內，需放置陰涼處避免變質。</div>
                        </div>
                        <div class="qa_common_question_answerblock">
                            <div class="qa_common_question_titlebar ">
                                <font-awesome-icon class="icon_30" icon="fa-solid fa-plus" />
                                <div class="qa_common_question_title">蛋糕可在室溫可以存放多久</div>
                            </div>
                            <div class="qa_hr"></div>
                        </div>
                        <div class="qa_common_question_answerblock">
                            <div class="qa_common_question_titlebar">
                                <font-awesome-icon class="icon_30" icon="fa-solid fa-plus" />
                                <div class="qa_common_question_title">蛋糕最多可以放幾天</div>
                            </div>
                            <div class="qa_hr"></div>
                        </div>
                    </div>
                </div>
                <section class="qa_question_blockother">
                    <div class="qa_question_bar qa_question_barother">
                        <div class="qa_maxtitlebar">
                            <font-awesome-icon class="icon_40" icon="fa-solid fa-plus" />
                            <label>訂單問題</label>
                        </div>
                    </div>
                </section>
                <section class="qa_question_blockother2">
                    <div class="qa_question_bar qa_question_barother">
                        <div class="qa_maxtitlebar">
                            <font-awesome-icon class="icon_40" icon="fa-solid fa-plus" />
                            <label>預訂蛋糕</label>
                        </div>
                    </div>
                </section>
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
import search_bar from "../components/search_bar.vue"
import qaChat from "../components/qaChat.vue";
export default {
    name:'shopping_cart',
    components:{
        titleh1,
        headercom,
        footercom,
        search_bar,
        qaChat,
    },
    data(){
        return{
            asd:123546,
            qaChatOpen : false,
            a: true,
            b: false,
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
    position: relative;
}
#chat_icon_block{
    position:fixed;
    bottom: 50px;
    right: 50px;
    #chat_icon{
        width: 50px;
        height: 50px;
        cursor: pointer;
    }
    .qaChatPosition{
        position: absolbute;
        // bottom: 70px;
        top: -340px;
        right: 45px;
        display: block;
    }
}


.qaChatPosition{
    position: absolute;
    top: 300px;
    right: 100px;
    z-index: 5;
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
        font-size: $h1;
        margin-top: 200px;
        margin-bottom: 50px;
        @media screen and (max-width:767.98px){ 
            display: flex;
            margin-top: 100px;
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
        .shopping_cart_bread_arrow{
            width: 100%;
            max-width: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            .shopping_cart_bread_arrow_img{
                width: 20px;
                height: 20px;
                object-fit: cover;
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
// 搜尋欄
.searchbar_titlebar{
    display: flex;
    justify-content: flex-end;
    width: 100%;
    max-width: 1120px;
    margin-top: 150px;
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
        margin-top: 120px;
    }
}
.qa_question_block{
    display: flex;
    justify-content: center;
    max-width: 1120px;
    width: 100%;
    align-items: center;
    flex-direction: column;
}
.qa_question_bar{
    max-width: 1120px;
    width: 100%;
    height: 100px;
    background-color: $palePike;
    display: flex;
    align-items: center;
    border-radius: 10px 10px 0 0;
}
.qa_maxtitlebar{
    display: flex;
    justify-content: space-around;
    max-width: 200px;
    width: 80%;
    font-size: $h2;
    align-items: center;
}
.icon_30{
    width: 30px;
    height: 30px;
}
.icon_40{
    width: 40px;
    height: 40px;
}

.qa_maxopenclose{
    width: 40px;
    height: 40px;
    object-fit: cover;
    background-color: black;
}
.qa_question_answer_block_outline{
    max-width: 1120px;
    width: 95%;
    height: 400px;
    background-color: $lightPike;
    display: flex;
    align-items: center;
    @media screen and (max-width:767.98px){ 
        height: 500px;
    }
}
.qa_question_answer_block_insideblock{
    // height: 300px;
    max-width: 900px;
    width: 95%;
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}
.qa_common_question_answerblock{
    // height: 120px;
    width: 100%;
    max-width: 900px;
    // margin-bottom: 40px;
}
.qa_common_question_titlebar{
    max-width: 400px;
    width: 100%;
    display: flex;
    align-items: center;
    line-height: 50px;
}
.qa_common_question_titleimg{
    
    width: 30px;
    height: 30px;
    object-fit: cover;
    background-color: black;
    margin-right: 30px;
}
.qa_common_question_title{
    font-size: $h3;
    margin-left: 20px;
}
.qa_hr{
    margin: auto;
    width: 100%;
    max-width: 900px;
    border-top: 2px solid rgb(119, 119, 119);
    margin-top: 5px;
    margin-bottom: 5px;
}
.qa_common_answer{
    display: flex;
    justify-content: flex-end;
    max-width: 750px;
    margin-left: 20%;
    width: 80%;
    margin-top: 15px;
    margin-bottom: 30px;
    white-space:pre-wrap
}
.qa_question_blockother{
    max-width: 1120px;
    width: 100%;
    margin-bottom: 50px;
}
.qa_question_blockother2{
    max-width: 1120px;
    width: 100%;
    margin-bottom: 100px;
    border-radius: 10px;
}
.qa_question_barother{
    border-radius: 10px;
}

</style>