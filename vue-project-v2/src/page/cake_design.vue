<template>
    <div class="all">
        <headercom openWhat="cakeDesign"></headercom>
        <section id="outside">
        <!-- 開始製作 -->
        <section id="first_screen">
            <!-- 下雪 -->
            <div class="snow-container" style="z-index: 1;">
                <div class="snow foreground"></div>
                <div class="snow foreground layered"></div>
                <div class="snow middleground"></div>
                <div class="snow middleground layered"></div>
                <div class="snow background"></div>
                <div class="snow background layered"></div>
            </div>
            <!-- 下雪 -->
            <div id="first_screen_button" @click="isStart">
                    <buttontest2 title=" 開始製作"></buttontest2>
            </div>
            <div id="first_screen_cake">
            <img class="first_screen_cake_look" src="../assets/images/cake_design_look.svg" alt="">
            <div id="first_screen_cake_demo">
                <img id="first_screen_cake_front" src="../assets/images/cake_design_cake_demo.png" alt="">
                <img id="first_screen_cake_back" src="../assets/images/cake_design_cake_demo2.png" alt="">
                <!-- <div id="first_screen_cake_back"></div> -->
            </div>
            </div>
            <img id="first_screen_bg" src="../assets/images/cake_design_gb_1.jpg" alt="">
        </section>
         <!-- 開始製作 -->
         <!-- 製作中 -->
         <!-- <div class="center_box"> -->
        <transition name="disappear">
         <section id="second_screen" v-show="isFinish1">
             <div id="production_area">

                 <!-- RWD需要的上一步 下一步 -->
                 <!-- <div class="rwd_step">
                     <input id="rwd_back_step" type="button" @click="showModel = true; changeShowArea('back')" v-show="showArea > 1"> -->
                    <!-- 選擇糕體 上一步按鈕的偽元素 -->
                    <!-- <input id="rwd_pseudo_element_button" type="button" v-show="showArea === 1">

                    <input id="rwd_next_step" type="button" @click="showModel = false; changeShowArea('next')" v-show="showArea < 3"> -->
                 <!-- 蛋糕完成按鈕 -->
                 <!-- <input id="rwd_finish" type="button" v-show="showArea === 3" @click="[toImage(), isFinish()]">
                 </div> -->
                 <!-- RWD需要的上一步 下一步 -->

                 <!-- 下雪 -->
                <div class="snow-container">
                    <div class="snow foreground"></div>
                    <div class="snow foreground layered"></div>
                    <div class="snow middleground"></div>
                    <div class="snow middleground layered"></div>
                    <div class="snow background"></div>
                    <div class="snow background layered"></div>
                </div>
                 <!-- 下雪 -->

                 <input id="back_step" type="button" @click="showModel = true; changeShowArea('back')" v-show="showArea > 1">
                 <!-- 選擇糕體 上一步按鈕的偽元素 -->
                 <input id="pseudo_element_button" type="button" v-show="showArea === 1">
                 <div id="cake_box_outline">
                 <div id="cake_box">
                     <div ref="imageTofile">
                     <canvas class="cake_add_box" id="c" :width="Cwidth" :height="Cheight" style="overflow: hidden;"></canvas>
                     <div id="big_cake_model_box">
                        <img id="big_cake_model" :src="bigPic"  alt="">
                     </div>
                     </div>
                     <div id="big_plate_box">
                        <img id="big_plate" src="../assets/images/cake_design/plate.png" alt="">
                     </div>
                     <!-- <img :src="htmlUrl" v-show="isShow" style="width:100px;"> -->
                     <img id="shiny1" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny2" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny3" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny4" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny5" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny6" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny7" src="../assets/images/shiny.svg" alt="">
                     <img id="shiny8" src="../assets/images/shiny.svg" alt="">
                 </div>
                 </div>
                 <input id="next_step" type="button" @click="showModel = false; changeShowArea('next')" v-show="showArea < 3">
                 <!-- 蛋糕完成按鈕 -->
                 <!-- <img class="first_screen_cake_look" src="../assets/images/cake_design_look.svg" alt=""> -->
                 <input id="finish" type="button" v-show="showArea === 3" @click="[toImage(), isFinish()]">
                 <!-- <button @click="deleteImg">deleteImg</button> -->
             </div>

             <!-- 選擇糕體 -->
             <div class="choose_cake_model" v-if="showArea === 1">
                 <div id="cake_model_title_box">
                     <img src="../assets/images/butter.png" alt="" style="width:30px"><p>選擇糕體</p><img src="../assets/images/butter.png" alt="" style="width:30px">
                 </div>
                 <div id="choose_cake_model_box">
                     <!-- 左鍵 -->
                     <input class="left_move" type="button" style="z-index:10; position: absolute; left:50px; top:33%" @click="outPrev('prev_button_1')">
                     <!-- <div class="swiper-button-prev swiper-button-white" slot="button-prev"  @click="prev" style="z-index:10;"></div> -->

                     <div id="choose_cake_model_box_contents">
                         <swiper ref="hits" :auto-update="true" class="actor-list small_img" style="position:relative;" :options="swiperOption">
                             <!-- 以上的'key值'是甫god加的 :key="swiperList1"-->
                            
                            <swiper-slide v-for="(slide, key) in swiperList1" :key="key" >
                                <div align="center" class="cake_box" style="position: relative;">
                                    <img class="cake" :src="slide.img" @click="bigPic=slide.img; sendFlavorID(slide.flavorID, slide.price)" alt="">
                                    <img class="cake_plate" src="../assets/images/cake_design/plate.png" alt="">
                                </div>
                                <div class="instructions_text">
                                    <div class="instructions_text_con">
                                        <h4 style="margin-top: 0px; margin-bottom: 2px;">
                                            {{slide.title}}
                                        </h4>
                                            {{slide.text}}
                                    </div>
                                </div>
                                <input class="left_move" type="button" style="z-index:10; left:50px; top:33%;position:absolute; opacity: 0;" @click="prev()" id="prev_button_1">
                                <input class="right_move" type="button"  style="z-index:10; right: 50px; top:33%;position:absolute; opacity: 0;" @click="next()" id="next_button_1"> 
                            </swiper-slide>
                             
                            
                         </swiper>

                     </div>
                     <!-- <div class="swiper-button-next swiper-button-white" slot="button-next" @click="next" style="z-index:10;"></div> -->

                     <!-- 右鍵 -->
                     <input class="right_move" type="button"  style="z-index:10; position: absolute; right: 50px; top:33%" @click="outNext('next_button_1')"> 
                     <!-- @click=data='datatotal[index]' -->
                 </div>
                 
                
                <!-- </div> -->
                 
                 <div class="mascot_box">
                     <!-- <button class="delete_button" @click="deleteImg">刪除已選裝飾</button> -->
                     <div class="mascot">
                        <img src="../assets/images/mascot1.gif" alt="">
                     </div>
                 </div>
             </div>
             <!-- 選擇糕體 -->
            
             <!-- 選擇水果 -->
             <div class="choose_cake_fruits" v-if="showArea === 2">
                 <div id="cake_fruits_title_box">
                     <img src="../assets/images/butter.png" alt="" style="width:30px"><p>選擇配料</p><img src="../assets/images/butter.png" alt="" style="width:30px">
                 </div>
                 <div id="choose_cake_fruits_box">
                    <!-- 左鍵 -->
                     <input class="left_move" type="button" style="z-index:10; position: absolute; left:50px; top:33%" @click="outPrev('prev_button_2')">

                     <div id="choose_cake_fruits_box_contents">
                         <swiper ref="hits" :auto-update="true" class="actor-list small_img testFor2" :options="swiperOption">
                             <!-- 以上的'key值'是甫god加的 :key="swiperList1" -->
                            <swiper-slide v-for="(slide, key) in swiperList2" :key="key" >
                                <div align="center" class="cake_box" style="position: relative;">
                                    <img class="cake my-image" :src="slide.img" @click="decorationCake(slide,key)" alt="" :id='slide.img'>
                                    <img class="cake_plate" src="../assets/images/cake_design/plate.png" alt="">
                                </div>
                                <div class="instructions_text">
                                    <div class="instructions_text_con">
                                        <h4 style="margin-top: 0px; margin-bottom: 2px;">
                                            {{slide.title}}
                                        </h4>
                                            {{slide.text}}
                                    </div>
                                </div>
                            <input class="left_move" type="button" style="z-index:10; position: absolute; left:50px; top:33%; opacity: 0;" @click="prev()" id="prev_button_2">
                            <input class="right_move" type="button"  style="z-index:10; position: absolute; right: 50px; top:33%; opacity: 0;" @click="next()" id="next_button_2">
                            </swiper-slide>
                         </swiper>

                     </div>

                     <!-- 右鍵 -->
                     <input class="right_move" type="button"  style="z-index:10; position: absolute; right: 50px; top:33%" @click="outNext('next_button_2')"> 
                 </div>
                 <div class="mascot_box">
                     <button class="delete_button" @click="deleteImg">刪除已選水果</button>
                     <div class="mascot">
                        <img src="../assets/images/mascot1.gif" alt="">
                     </div>
                 </div>
                 <!-- <div class="delete_button_box">
                     <button class="delete_button" @click="deleteImg">刪除已選裝飾</button>
                 </div> -->
             </div>
             <!-- 選擇水果 -->

             <!-- 選擇裝飾 -->
             <div class="choose_cake_decorations" v-if="showArea === 3">
                 <div id="cake_decorations_title_box">
                     <img src="../assets/images/butter.png" alt="" style="width:30px"><p>選擇裝飾</p><img src="../assets/images/butter.png" alt="" style="width:30px">
                 </div>
                 <div id="choose_cake_decorations_box">
                    <!-- 左鍵 -->
                     <input class="left_move" type="button" style="z-index:10; position: absolute; left:50px; top:33%" @click="outPrev('prev_button_3')">

                     <div id="choose_cake_decorations_box_contents">
                         <swiper ref="hits" :auto-update="true" class="actor-list small_img testFor2" :options="swiperOption">
                             <!-- 以上的'key值'是甫god加的 :key="swiperList1" -->
                            <swiper-slide v-for="(slide2, key) in swiperList3" :key="key" >
                                <div align="center" class="cake_box" style="position: relative;">
                                    <img class="cake my-image" :src="slide2.img" @click="decorationCake2(slide2,key)" alt="" :id='slide2.img'>
                                    <img class="cake_plate" src="../assets/images/cake_design/plate.png" alt="">
                                </div>
                                <div class="instructions_text">
                                    <div class="instructions_text_con">
                                        <h4 style="margin-top: 0px; margin-bottom: 2px;">
                                            {{slide2.title}}
                                        </h4>
                                            {{slide2.text}}
                                    </div>
                                </div>
                            <input class="left_move" type="button" style="z-index:10; position: absolute; left:50px; top:33%; opacity: 0;" @click="prev()" id="prev_button_3">
                            <input class="right_move" type="button"  style="z-index:10; position: absolute; right: 50px; top:33%; opacity: 0;" @click="next()" id="next_button_3">
                            </swiper-slide>
                         </swiper>

                     </div>

                     <!-- 右鍵 -->
                     <input class="right_move" type="button"  style="z-index:10; position: absolute; right: 50px; top:33%" @click="outNext('next_button_3')"> 
                 </div>
                 <div class="mascot_box">
                     <button class="delete_button" @click="deleteImg">刪除已選裝飾</button>
                     <div class="mascot">
                        <img src="../assets/images/mascot1.gif" alt="">
                     </div>
                 </div>
             </div>
             <!-- 選擇裝飾 -->
             <img class="first_screen_cake_look" src="../assets/images/cake_design_look.svg" alt="">
         </section>
         </transition>
         <!-- </div> -->
         <!-- 製作中 -->

        <!-- isLoading cooking -->
        <transition @before-enter="beforeEnter" @before-leave="beforeLeave">
            <div v-if="isLoading" class="loading">
                <img src="../assets/images/cooking.gif" alt="loading">
                <div class="loading_text">
                    <p>c</p>
                    <p>o</p>
                    <p>o</p>
                    <p>k</p>
                    <p>i</p>
                    <p>n</p>
                    <p>g</p>
                    <p>.</p>
                    <p>.</p>
                    <p>.</p>
                </div>
            </div>
        </transition>
        <!-- isLoading cooking -->

         <!-- 製作完成 填寫設計理念 -->
         <transition name="appear">
         <section id="third_screen" v-show="isFinish2">
            <!-- 下雪 -->
            <div class="snow-container" style="z-index: 0;">
                <div class="snow foreground"></div>
                <div class="snow foreground layered"></div>
                <div class="snow middleground"></div>
                <div class="snow middleground layered"></div>
                <div class="snow background"></div>
                <div class="snow background layered"></div>
            </div>
            <!-- 下雪 -->
            <div id="finish_cake_box">
                <img :src="htmlUrl" v-show="isShow" class="finish_cake_img">
                <img id="shiny1" src="../assets/images/shiny.svg" alt="">
                <img id="shiny2" src="../assets/images/shiny.svg" alt="">
                <img id="shiny3" src="../assets/images/shiny.svg" alt="">
                <img id="shiny4" src="../assets/images/shiny.svg" alt="">
                <img id="shiny5" src="../assets/images/shiny.svg" alt="">
                <img id="shiny6" src="../assets/images/shiny.svg" alt="">
                <img id="shiny7" src="../assets/images/shiny.svg" alt="">
                <img id="shiny8" src="../assets/images/shiny.svg" alt="">
                <img class="first_screen_cake_look" src="../assets/images/cake_design_look.svg" alt="">
            </div>
            <div id="finish_designIdea_box">
                <div class="designIdea_name">
                    <p><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg) translate(-5px , 8px);">蛋糕名稱</p>
                    <textarea name="" id="" cols="50" rows="2" placeholder="我的蛋糕名稱" v-model="newCakeDesign.name"></textarea>
                </div>
                <div class="designIdea_name">
                    <p><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg) translate(-5px , 8px);">蛋糕英文名稱</p>
                    <textarea name="" id="" cols="50" rows="2" placeholder="蛋糕英文名稱" v-model="newCakeDesign.nameEng"></textarea>
                </div>
                <div class="designIdea">
                    <p><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg) translate(-5px , 8px);">蛋糕設計理念</p>
                    <textarea name="" id="" cols="50" rows="5" placeholder="我的蛋糕設計理念..." v-model="newCakeDesign.description"></textarea>
                </div>
            </div>
            <div id="finish_mascot_box">
                <div class="mascot_text">
                    <p>
                        太棒啦～屬於你的專屬蛋糕已經完成，快快寫下你的蛋糕名稱和設計理念，儲存到「蛋糕設計庫」吧！也可以直接下訂此蛋糕呦～
                    </p>
                </div>
                <div class="mascot">
                    <img src="../assets/images/mascot1.gif" alt="">
                </div>
                <div class="finish_cakeDesign_button_box">
                    <div id="remake_button" @click="initial">
                        <buttontest2 title=" 重新製作"><router-link to="/cakeDesign" id="cakeDesign"  class="headerIcon" :class="{'open':openWhat == 'cakeDesign'}" ></router-link></buttontest2>
                    </div>
                    <div id="finish_cakeDesign_button" @click="isPopup">
                        <buttontest title=" 儲存蛋糕"></buttontest>
                    </div>
                </div>
            </div>
            <!-- 是否購買彈窗 -->
            <div class="popup_box">
                <article>
                    <p><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg) translate(-5px , 8px);">是否直接購買設計完成的客製化蛋糕?</p>
                    <div class="popup_button">
                        <router-link to="/member_data" id="member_data">
                        <button class="no" @click="buy = 0;keepCakeDesign()">否，加入設計庫</button></router-link>
                        <button class="yes" @click="buy = 1;keepCakeDesign()">是，直接購買</button>
                        <!-- <buttontest title=" 是，直接購買"></buttontest> -->
                        <!-- <buttontest title=" 否，加入設計庫"></buttontest> -->
                    </div>
                </article>
            </div>
            <!-- 是否購買彈窗 -->
         </section>
         </transition>
         <!-- 製作完成 填寫設計理念 -->
        </section>

        <!-- 讓蛋糕配料一直存在 -->
        <template style="display:none">
            <div v-for="(test,noproblem) in swiperList2" :key="noproblem" style="display:none">
        <img :src="test.img" alt="" :id="test.img+noproblem">
                
            </div>
            <div v-for="(test,problem) in swiperList3" :key="problem" style="display:none">
                <!-- 製作完成的蛋糕 圖片 -->
                <img :src="test.img" alt="" :id="test.img+problem">
                <!-- 製作完成的蛋糕 圖片 -->
            </div>
        </template>
        <!-- 讓蛋糕配料一直存在 -->
        <footercom></footercom>
    </div>
</template>
<script>
import $ from 'jquery'
import html2canvas from "html2canvas"
import { Fabric } from 'vue-fabric'
import { fabric } from 'fabric'
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import headercom from '../components/headercom'
import buttontest from '../components/button_h1.vue'
import buttontest2 from '../components/button_h1_2.vue'
import buttontest3 from '../components/button_h1_3.vue'
import footercom from '../components/footercom'
import store from '../store/store';

import axios from 'axios'
import qs from 'qs'

export default {
    name:"cakeDesign",
    components:{
        headercom,
        buttontest,
        buttontest2,
        buttontest3,
        Swiper,
        SwiperSlide,
        Fabric,
        fabric,
        html2canvas,
        footercom,
    },
    data(){
        return{
            newCakeDesign:{
                name:'',
                nameEng:'',
                description:'',
                flavorID: '1',
                flavorPrice: '',
                voteID: '',
                price: '500',
            },
            flavor: 1,
            ingredient: 1,
            // theFlavor:[],
            isLoading: false,
            // isFinish: true,
            isFinish1: true,
            isFinish2: false,
            Cwidth: 280,
            Cheight: 180,
            isShow: false,
            htmlUrl: "",
            showArea: 1,
            // smallIMages:["../../static/cake_design/cake_model"],
            // bigImages:["../../static/cake_design/cake_model"],
            bigPic:require ('../assets/images/cake_design/cake_model1.png'),
            // 糕體
            // swiperList1:[
            //     {img:require ('../assets/images/cake_design/cake_model1.png'),
            //     title:'優格馬斯卡邦糕體',
            //     text: '酸甜可口的特製野莓優格醬搭配鬆軟的海綿糕體，甜而不膩 ♡',
            //     price: 500,
            //     flavorID: 1,
            //     },
            //     {img:require ('../assets/images/cake_design/cake_model2.png'),
            //     title:'鮮奶油草莓糕體',
            //     text: '百分百法國原裝頂級鮮奶油，與大溪地香草完美比例的清新香緹 ♡',
            //     price: 600,
            //     flavorID: 2,
            //     },
            //     {img:require ('../assets/images/cake_design/cake_model3.png'),
            //     title:'威士忌覆盆子巧克力糕體',
            //     text: '72% 法國頂級苦甜黑巧克力的香緹，打造重磅迷人的大人風味 ♡',
            //     price: 700,
            //     flavorID: 3,
            //     },
            //     {img:require ('../assets/images/cake_design/cake_model4.png'),
            //     title:'藍莓優格乳酪糕體',
            //     text: '濃郁微酸的優格與藍莓果餡層層疊疊起清爽酸甜的口味，讓妳不禁一口接一口 ♡',
            //     price: 500,
            //     flavorID: 4,
            //     },
            //     {img:require ('../assets/images/cake_design/cake_model5.png'),
            //     title:'鮮奶油抹茶香緹糕體',
            //     text: '原裝頂級鮮奶油，搭配外圍綠色漸層抹面天然抹茶香緹，碰撞出溫柔的幸福風味 ♡',
            //     price: 500,
            //     flavorID: 5,
            //     },
            //     {img:require ('../assets/images/cake_design/cake_model6.png'),
            //     title:'鮮奶油紅茶香緹糕體',
            //     text: '原裝頂級鮮奶油，搭配外圍橘黃色漸層抹面天然紅茶香緹，成熟又不失優雅的大人感 ♡',
            //     price: 500,
            //     flavorID: 6,
            //     },
            // ],
            cakeImg: '',
            datatotal:[],
                // imgIndex: 0,

                // 水果配料
                // swiperList2:[
                    
                //     {img:require ('../assets/images/cake_design/fruit1.png'),
                //     title:'當季新鮮草莓（整顆）',
                //     text: '來自苗栗大湖現採草莓，趕快試看看把草莓加到你的設計上，甜入你心～ ♡',
                //     price: 50
                //     },
                //     {img:require ('../assets/images/cake_design/fruit2.png'),
                //     title:'當季新鮮草莓（半顆）',
                //     text: '來自苗栗大湖現採草莓，風味絕佳，帶有牛奶香味 ♡',
                //     price: 50
                //     },
                //     {img:require ('../assets/images/cake_design/fruit3.png'),
                //     title:'新鮮藍莓',
                //     text: '藍莓是五大健康水果之一呦！選了他，你的蛋糕一定會像你一樣吸引人 ♡',
                //     price: 20
                //     },
                //     {img:require ('../assets/images/cake_design/fruit4.png'),
                //     title:'新鮮櫻桃',
                //     text: '你知道嗎？櫻桃常被用來代表許多美好的事物，猶如甜蜜的幸福 ♡',
                //     price: 30
                //     },
                //     {img:require ('../assets/images/cake_design/fruit5.png'),
                //     title:'新鮮綠葡萄',
                //     text: '綠葡萄含有豐富的維生素 C，能促進膠原蛋白合成、提升免疫力 ♡',
                //     price: 10
                //     },
                //     {img:require ('../assets/images/cake_design/fruit6.png'),
                //     title:'新鮮奇異果',
                //     text: '外表可愛的 kiwi 能養顏美容、增強免疫系統、幫助消化，吃一口好處多多 ♡',
                //     price: 20
                //     },
                //     {img:require ('../assets/images/cake_design/fruit7.png'),
                //     title:'新鮮檸檬',
                //     text: '天然的美容聖品 ♡',
                //     price: 50
                //     },
                //     {img:require ('../assets/images/cake_design/fruit8.png'),
                //     title:'もも水蜜桃片',
                //     text: '甜甜滋滋的桃子，如同愛情中溫柔的珍惜，快為蛋糕增添更多粉色泡泡吧 ♡',
                //     price: 50
                //     },
                // ],
                swiperList1: [],
                swiperList2: [],
                swiperList3: [],

                // 蛋糕價格計算
                allPrice: 0,

                // 直接購買，將包裝加入購物車
                thePackage: [],
                // 直接購買，將加購品加入購物車
                theAdditional: [],
                // 判斷是否將蛋糕組合加入購物車
                buy: 0,

                // 裝飾
                // swiperList3:[
                //     {img:require ('../assets/images/cake_design/decoration1.png'),
                //     title:'HAPPY BIRTHDAY 立牌',
                //     text: '甜甜的蛋糕，暖暖的祝福 ♡',
                //     price: 50
                //     },
                //     {img:require ('../assets/images/cake_design/decoration2.png'),
                //     title:'裝飾小葉子',
                //     text: '快為蛋糕點綴一點俏皮可愛的小綠葉吧 ♡',
                //     price: 20
                //     },
                //     {img:require ('../assets/images/cake_design/decoration3.png'),
                //     title:'A cake 小立牌',
                //     text: '讓你一整天都 A piece of cake ♡',
                //     price: 20
                //     },
                //     {img:require ('../assets/images/cake_design/decoration4.png'),
                //     title:'鮮奶油',
                //     text: '白花花的鮮奶油是甜點界的花仙子，將美好幻想帶入生活 ♡',
                //     price: 10
                //     },
                //     {img:require ('../assets/images/cake_design/decoration5.png'),
                //     title:'薄荷葉',
                //     text: '清爽氣息綠意盎然，如同喝了冰鎮飲料，格外清涼 ♡',
                //     price: 10
                //     },
                //     {img:require ('../assets/images/cake_design/decoration6.png'),
                //     title:'迷迭香',
                //     text: '海洋之露，小巧清新而不失優雅，替你抹去記憶裡的憂傷 ♡',
                //     price: 20
                //     },
                // ],

            canvas:[],
            rect:[],

            // 糕體 配料 裝飾
            swiperOption:{
                autoplay:{
                    disableOnInteraction: false,  // 使用者操作swiper之後，是否禁止autoplay
                    delay: 2000, // 自動切換的時間間隔（單位ms）
                },
                initialSlide: 0,
                loop: false,
                paginationClickable: true,
                onSlideChangeEnd: swiper => {
                //console.log('onSlideChangeEnd', swiper.realIndex)
                },
            },
    
            navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
            },
            indexx:0,
        }
    },
    methods:{
        // 將資料加入設計庫
        keepCakeDesign(){
            // 加購品呼叫
            // alert('step1')
                axios({
                    method:"GET",
                    url:"./static/melody_php/productDetailSelectPackage.php"
                }).then((res)=>{
                    this.thePackage = res.data
                }).catch((err)=>{
                    console.log(err)
                })
                axios({
                    method:"GET",
                    url:"./static/melody_php/productDetailSelectAdditional.php"
                }).then((res)=>{
                    this.theAdditional.push(res.data[0])
                }).catch((err)=>{
                    console.log(err)
                })
                axios({
                    method:"GET",
                    url:"./static/melody_php/productDetailSelectAdditional2.php"
                }).then((res)=>{
                    this.theAdditional.push(res.data[0])
                }).catch((err)=>{
                    console.log(err)
                })
            
            axios.post("./static/melody_php/new_cake_design.php", qs.stringify({
                name: this.newCakeDesign.name, 
                nameEng: this.newCakeDesign.nameEng, 
                price: parseInt(parseInt(this.allPrice) + parseInt(this.newCakeDesign.flavorPrice)), 
                description: this.newCakeDesign.description, 
                flavorID: this.newCakeDesign.flavorID,
                cakeDesignImageBlob: this.htmlUrl, 
                memberID: this.$store.state.member_id, 
                authorization: Math.ceil(Math.random() * 3), 
                votingID: this.newCakeDesign.voteID,
            }))
            .then((res)=>{
                // alert("step2")
                if(this.buy==1){
                    
                
                let data=new URLSearchParams();
                data.append("time",res['data'])
                console.log(res['data'])
                
                axios({
                    method:"POST",
                    data,
                    url:'./static/melody_php/buy_new_cake_design.php'
                }).then((res)=>{
                    // alert(this.buy)
                    console.log(res.data);
                    // 蛋糕要給('蛋糕名稱','蛋糕圖片''''''')
                    
                    this.$store.dispatch('storage', res.data)
                    // 蛋糕數量給1就可
                    this.$store.dispatch('cakeQ', 1)
                    // 加購品給0跟6就好
                    this.$store.dispatch('AStorage', this.theAdditional)
                    // 包裝
                    this.$store.dispatch('PStorage', this.thePackage)
                    alert('已加入購物車');
                    this.$router.push('/shopping_cart')

                }).catch((err)=>{
                    console.log(err)
                })
                }
            })
            .catch(err => console.log(err));
            
            // let readFile = new FileReader();
            // console.log(readFile.readAsBinaryString(file));
    //         readFile.readAsDataURL(file);
    //         readFile.addEventListener("load", function () {
    //             let image = this.htmlUrl;
    //             // console.log(readFile.result);
    //             image.src = readFile.result;
    //             that.file.img = readFile.result;

                
    //   })
        },
        
        // 製作完成
        isFinish(){
            this.isFinish1 = false;
            this.isLoading = true;

            window.setTimeout(()=>{
                this.isFinish2 = true;
            },4000);
            
        },
        beforeEnter() {
            this.height = 0;
        },
        beforeLeave(){
            this.$nextTick(() => {
            // $refs
            this.height = this.$refs.content.getBoundingClientRect().height;
      })
        },


        // 彈窗顯示
        isPopup(){
            $("div.popup_box").fadeIn();
        },

        // 隱藏物件邊框
        hideObj(){
            if(this.canvas.getActiveObject()!=undefined){
                this.canvas.getActiveObject().set({
                    hasControls:false,
                    borderColor:'rgba(0 , 0 , 0, 0)',
                })
            }
            this.canvas.renderAll()

            
            
        },
        // 重新製作
        initial(){
                this.isStart();
                this.showArea=1;
                this.isLoading=false;
                this.isFinish1=true;
                this.isFinish2=false;
                this.canvas.clear();
                html2canvas(this.$refs.imageTofile, {
                width: this.Cwidth,
                height: this.Cheight,
            })
        },
        outPrev(name){
            let button = document.getElementById(name)
            button.click()
            // let that = this
        },
        outNext(name){
                        let button = document.getElementById(name)
                        button.click()

        },
        prev(){
            // let that = this
            this.$refs.hits.$swiper.slidePrev();
        },
        next(){
            this.$refs.hits.$swiper.slideNext();
        },

        // 點擊刪除蛋糕配料
        deleteImg(){
            
            this.canvas.remove(this.canvas.getActiveObject()) 
            this.canvas.renderAll()
            this.allPrice -= parseInt(slide.price);
        },

        // 點擊增加水果
        decorationCake (slide,key){
            var imgElement = document.getElementById(slide.img+key)
            // console.log(imgElement);
            // let test = document.createElement("img");
            // test.src = val.img
            // console.log(test);
            var imgInstance = new fabric.Image(imgElement,{
                left: 15,
                top: 15,
                width: 400,
                height: 400,
                scaleX: .2,
                scaleY: .2,
                // lockScalingFlip: true,
                lockScalingX: true,
                lockScalingY: true,
                selectable: true,
            });
            // console.log(imgInstance);
            
            this.canvas.add(imgInstance);
            // imgInstance.onclick
            // console.log(typeof slide.price);
            this.allPrice += parseInt(slide.price);
        },

        // 點擊增加裝飾
        decorationCake2 (slide2,key){
            var imgElement = document.getElementById(slide2.img+key)
            // console.log(imgElement);
            // let test = document.createElement("img");
            // test.src = val.img
            // console.log(test);
            var imgInstance = new fabric.Image(imgElement,{
                left: 15,
                top: 15,
                width: 400,
                height: 400,
                scaleX: .35,
                scaleY: .35,
                // lockScalingFlip: true,
                lockScalingX: true,
                lockScalingY: true,
                selectable: true,
            });
            // console.log(imgInstance);
            
            this.canvas.add(imgInstance);
            // imgInstance.onclick
            this.allPrice += parseInt(slide2.price);
        },


        // 第一屏換到第二屏
        isStart(){
            // alert("10")
            $('#first_screen').toggleClass('start');
            $('#second_screen').addClass('add_start');
            // $('#first_screen').css("display: none;")
        },

        // 第二屏換到第三屏
        // isFinish(){
        //     // alert("10")
        //     $('#second_screen').toggleClass('start2');
        //     $('#third_screen').addClass('add_start2');
        //     // $('#first_screen').css("display: none;")
        // },

        // 蛋糕製作步驟 按鈕
        changeShowArea(action){
            action === "back" ? this.showArea-- : action === "next" ? this.showArea++ : this.showArea;
        },

        // 送出所選的糕體ID
        sendFlavorID(flavorID, price){
            this.newCakeDesign.flavorID = flavorID;
            this.newCakeDesign.flavorPrice = price;
        },

        // 頁面元素轉圖片
        toImage() {

            this.hideObj();
            let that = this
        // 第一個引數是需要生成截圖的元素,第二個是自己需要配置的引數,寬高等
        html2canvas(this.$refs.imageTofile, {
            width: 300,
            height: 330,
            backgroundColor: null,
        }).then((canvas) => {
            let url = canvas.toDataURL("image/png");
            this.htmlUrl = url; // 把生成的base64點陣圖片上傳到伺服器,生成線上圖片地址
            if (this.htmlUrl) {
            // 渲染完成之後讓圖片顯示，用v-show可以避免一些bug
            // console.log(this.width);
            // console.log(this.height);
            // that.canvas.width = 300;
            // that.canvas.height = 330;
            // this.Cwidth = 300;
            // this.Cheight = 330;
            this.isShow = true;
            }
            // this.sendUrl();
        });
        }, // 圖片上傳伺服器
        // canvasExpand(){
        //     Cwidth = 300;
        //     Cheight = 330;
        // }
    },
    mounted() {

        this.canvas = new fabric.Canvas('c');
        this.showArea = 1;

        // -------------------------------------------- 資料處理部分 --------------------------------------------
                // axios.post("./static/melody_php/select_flavor.php", qs.stringify({flavorId: this.flavor}))
                // .then(res => {
                //     let theFlavor = res["data"];
                //     // console.log(theFlavor);
                // })
                // .catch(err => console.log(err));

                // select配料&裝飾
                axios.post("./static/melody_php/select_ingredient_all.php")
                .then(res => {
                    let data = res["data"];
                    console.log(data);
                    let dataFruits = data.filter(item => item.CATEGORY === '2');
                    let dataDecoration = data.filter(item => item.CATEGORY === '3');
                    for(let i = 0; i < dataFruits.length; i++){
                        this.swiperList2.push({
                            ingredientID: dataFruits[i].INGREDIENT_ID,
                            img: dataFruits[i].IMG,
                            title: dataFruits[i].INGREDIENT_NAME,
                            text: dataFruits[i].INGREDIENT_DESCRIPTION,
                            price: dataFruits[i].PRICE,
                        });
                    }
                    for(let i = 0; i < dataDecoration.length; i++){
                        this.swiperList3.push({
                            ingredientID: dataDecoration[i].INGREDIENT_ID,
                            img: dataDecoration[i].IMG,
                            title: dataDecoration[i].INGREDIENT_NAME,
                            text: dataDecoration[i].INGREDIENT_DESCRIPTION,
                            price: dataDecoration[i].PRICE,
                        });
                    }
                    // console.log(this.swiperList2);
                    console.log(this.swiperList3);
                })
                .catch(err => console.log(err));

                axios.post("./static/melody_php/select_flavor_all.php")
                .then(res =>{
                    let data = res["data"];
                    console.log(res)
                    for(let i = 0; i < data.length; i++){
                        this.swiperList1.push({
                            flavorID: data[i].ID,
                            img: data[i].IMG,
                            title: data[i].NAME,
                            text: data[i].DESCRIPTION,
                            price: data[i].PRICE,
                        });
                    }
                    console.log(this.swiperList1);
                })
                .catch(err => console.log(err));

                // 取得最近的投票活動ID
                axios.post("./static/melody_php/get_latest_voteID.php")
                .then(res =>{
                    this.newCakeDesign.voteID = res.data[0].ID;
                })
                .catch(err => console.log(err));
    },
    
    watch: {
        $route: {
            handler () {
            this.productId = this.$route.params.Id
            this.getDetail()
            }
        },
        buy:{
            deep:true
        }
    },
}
</script>
<style>
li.nav_item > a#cakeDesign{
    color: #9F746B;
}
</style>
<style scoped lang="scss">
@import "../assets/style/var.scss";
    body{
        margin: 0;
        position: relative;
        background-color: #EFE6E4;
    }

    //---------------------------------- RWD需要的上一步下一步 ----------------------------------
    div.rwd_step{
        display: none;
        // position: absolute;
        // flex-direction: row;
        // justify-content: space-evenly;
        // left: 50%;
        // bottom: 20%;
        // transform: translateX(-50%);
        // 選擇糕體 上一步按鈕的偽元素
        input#rwd_pseudo_element_button{ 
            visibility: hidden;
            // background-image: url("../assets/images/back_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
        input#rwd_back_step{
            // visibility: hidden;
            background-image: url("../assets/images/back_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
        input#rwd_next_step{
            background-image: url("../assets/images/next_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
        // 完成蛋糕 按鈕
        input#rwd_finish{
            background-image: url("../assets/images/finish_button.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
    }
    @media all and (max-width: 976px){
        div.rwd_step{
            z-index: 10;
            display: flex;
            position: absolute;
            flex-direction: row;
            justify-content: space-evenly;
            left: 50%;
            bottom: 10%;
            transform: translateX(-50%);
        }
    }
    //---------------------------------- 是否購買彈窗樣式 ----------------------------------
    div.popup_box{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: hsla(0, 0%, 0%, .2);

        display: none;
        z-index:10000;
        article{
            background-color: #EFE6E4;
            color: #515151;
            width: 45%;
            // height: 300px;
            min-width: 570px;
            border-radius: 5px;
            box-shadow: 3px 3px 6px 0px hsla(0, 0%, 0%, .3);
            padding: 30px;
            padding-bottom: 50px;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index:10001;
            p{
                margin-top: 0;
                font-size: 20px;
            }
            div.popup_button{
                display: flex;
                justify-content: space-between;
                button.yes{
                    width: 250px;
                    height: 75px;
                    border-radius: 5px;
                    background-color: #dfb9b0;
                    color: #515151;
                    font-size: 20px;
                    border: none;
                    box-shadow: $shadow;
                    transition: 0.2s;
                    &:hover {
                        background-color: #f4e9c9;
                        cursor: pointer;
                        transform: translateY(-5px);
                    }
                }
                button.no{
                    width: 250px;
                    height: 75px;
                    border-radius: 5px;
                    background-color: #f4e9c9;
                    color: #515151;
                    font-size: 20px;
                    border: none;
                    box-shadow: $shadow;
                    transition: 0.2s;
                    &:hover {
                        background-color: #dfb9b0;
                        cursor: pointer;
                        transform: translateY(-5px);
                    }
                }
            }
        }
    }
    //---------------------------------- 最外層 ----------------------------------
    section#outside{
        overflow-x: hidden;
        width: 100%;
        min-height: 100vh;
    }
    // @media all and (max-width: 976px){
    //     section#outside{
    //         height: 200vh;
    //     }
    // }
    //---------------------------------- 開始製作 first_screen ----------------------------------
    section#first_screen.start{
        // display: none;
        // transform: translateY(-100vh);
        height: 0vh;
    }
    section#first_screen{
        position: relative;
        height: 100vh;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 0;
        position: relative;
        overflow: hidden;
        // display: none;

        //頁面切換
        transition:0.5s all ease;
        div#first_screen_button{
            z-index: 2;
            position: absolute;
            left: 50%;
            bottom: 20%;
            transform: translateX(-50%);
        }
        div#first_screen_cake{
            z-index: 1;
            width: 320px;
            height: 100vh;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            img.first_screen_cake_look{
                // z-index: 1;
                width: 60px;
                position: absolute;
                top: 28%;
                right: 0;
                transform-origin: bottom left;
                // transform: translate(-50%, -50%);
                animation-name: lookmov;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-direction: ease;
                animation-fill-mode:both;
            }
            div#first_screen_cake_demo{
                // z-index: 1;
                position: relative;
                top: -5%;
                left: -10px;
                width: 320px;
                height: 320px;
                // top: 45%;
                // left: 50%;
                // transform: translate(-50%, -50%);
                /*preserve the back when fliping*/
                transform-style:preserve-3d;
                transition:0.5s all ease;
                &:hover{
                    transform:rotateY(180deg);
                }
                img#first_screen_cake_front{
                    position: absolute;
                    width: 100%;
                    /*hide backface*/
                    backface-visibility:hidden;
                    
                }
                img#first_screen_cake_back{
                    position: absolute;
                    width: 100%;
                    /*hide backface*/
                    backface-visibility:hidden;
                    // color:#333;
                    // font-size:1.5rem;
                    // background:url("../assets/images/cake_design_cake_demo2.png") center top repeat;
                    transform:rotateY(180deg);
                }
            }
        }
        img#first_screen_bg{
            z-index: 0;
            height: 100vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    }

    //---------------------------------- 開始製作 second_screen ----------------------------------
    
    // *** 轉換製作區動畫 ***
    // #choose_start{
    //     display: none;
    // }
    // #choose_add_start{
    //     display: flex;
    // }
    // *** 轉換製作區動畫 ***

    section#second_screen.add_start{
        display: grid;
    }
    // section#second_screen.start2{
    //     // height: 0vh;
    //     // display: none;
    //     // visibility: hidden;
    //     animation-name: isFinishAn;
    //     animation-duration: 2s;
    //     // animation-iteration-count: infinite;
    //     // animation-timing-function: ease-in-out;
    // }
    section#second_screen{
        width: 100%;
        height: 100vh;
        // display: grid;
        grid-template-columns: 1fr 1fr 375px;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 0;
        position: relative;
        // top: 50%;
        // left: 50%;
        // transform: translate(-50%,0)
        overflow: hidden;
        display: none;
    }
    @media all and (max-width: 976px){
        section#second_screen{
            grid-template-columns: 1fr;
            height: 200vh;
        }
    }
    img.first_screen_cake_look{
                // z-index: 1;
                width: 40px;
                position: absolute;
                top: 18%;
                right: 80px;
                transform-origin: bottom left;
                // transform: translate(-50%, -50%);
                animation-name: lookmov;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-direction: ease;
                animation-fill-mode:both;
    }
    @media all and (max-width: 976px){
        img.first_screen_cake_look{
            top: 8%;
            right: 38%;
        }
    }
    @media all and (max-width: 768px){
        img.first_screen_cake_look{
            right: 35%;
        }
    }
    @media all and (max-width: 576px){
        img.first_screen_cake_look{
            right: 30%;
        }
    }
    @media all and (max-width: 576px){
        img.first_screen_cake_look{
            right: 25%;
        }
    }

    div#cake_box_outline{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        padding-top: 50px;
        padding-bottom: 0px;
        background-color:rgba(255, 255, 255, 0.3);
        z-index: 0;
        animation-name: movRradius2;
        animation-duration: 5s;
        animation-iteration-count: infinite;
        animation-direction: alternate-reverse;
    }
    div#production_area{
        position: relative;
        height: 100vh;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        grid-column: 1/3;
        background-image: url("../assets/images/index_kitchen_img_small.png");
        background-size: cover;
        background-repeat:no-repeat;
        background-color: rgba(255, 255, 255, 0.4);
        z-index: 1;
        div#cake_box{
            // border: solid 1px #515151;
            padding-top: 50px;
            width: 450px;
            height: 450px;
            position: relative;
            bottom: 30px;
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            background-color: rgba(255, 255, 255, 0.4);
            // border-radius: 50%;
            z-index: 0;
            // animation
            animation-name: movRradius;
            animation-duration: 6s;
            animation-iteration-count: infinite;
            animation-direction: alternate-reverse;

            canvas.cake_add_box{
                // border: solid 1px #f9b3ff;
                border-radius: 100px;
            }
            div#big_cake_model_box{
                width: 90%;
                min-width: 380px;
                position: absolute;
                // border: solid 1px #f88282;
                z-index: -1;
                top: 50%;
                left: 48%;
                transform: translate(-50%,-50%);

                img#big_cake_model{
                    width: 100%;
                }
            }
            div#big_plate_box{
                // border: solid 1px #82a7f8;
                z-index: -2;
                width: 90%;
                min-width: 350px;
                position: absolute;
                top: 79%;
                // bottom: -40px;
                left: 50%;
                transform: translate(-50%,-50%);
                img#big_plate{
                    width: 100%;
                }
            }
            img#shiny1{
                    height: 20px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 50px;
                    left: 10px;
                    // 動畫效果
                    animation-name: shiny_animation1;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                }
            img#shiny2{
                    height: 10px;
                    position: absolute;
                    transform: rotate(-30deg);
                    top: 75px;
                    left: 10px;
                    // 動畫效果
                    animation-name: shiny_animation2;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 2s;
                }
            img#shiny3{
                    height: 15px;
                    position: absolute;
                    transform: rotate(15deg);
                    top: 70px;
                    left: 30px;
                    // 動畫效果
                    animation-name: shiny_animation3;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 3s;
                }
            img#shiny4{
                    height: 15px;
                    position: absolute;
                    transform: rotate(20deg);
                    bottom: 140px;
                    left: 30px;
                    // 動畫效果
                    animation-name: shiny_animation4;
                    animation-duration: 4s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                }
            img#shiny5{
                    height: 10px;
                    position: absolute;
                    transform: rotate(-15deg);
                    bottom: 150px;
                    left: 15px;
                    // 動畫效果
                    animation-name: shiny_animation5;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 1s;
                }
            img#shiny6{
                    height: 10px;
                    position: absolute;
                    transform: rotate(15deg);
                    top: 160px;
                    right: 0px;
                    // 動畫效果
                    animation-name: shiny_animation6;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                }
            img#shiny7{
                    height: 13px;
                    position: absolute;
                    transform: rotate(30deg);
                    top: 150px;
                    right: 20px;
                    // 動畫效果
                    animation-name: shiny_animation7;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 1s;
                }
            img#shiny8{
                    height: 18px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 130px;
                    right: 5px;
                    // 動畫效果
                    animation-name: shiny_animation8;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 2s;
                }
        }
        // 選擇糕體 上一步按鈕的偽元素
        input#pseudo_element_button{ 
            visibility: hidden;
            // background-image: url("../assets/images/back_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
        input#back_step{
            // visibility: hidden;
            background-image: url("../assets/images/back_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            z-index: 5;
            &:hover{
                transform: translateY(-5px);
            }
        }
        input#next_step{
            background-image: url("../assets/images/next_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            z-index: 5;
            &:hover{
                transform: translateY(-5px);
            }
        }
        // 完成蛋糕 按鈕
        input#finish{
            background-image: url("../assets/images/finish_button.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            z-index: 5;
            &:hover{
                transform: translateY(-5px);
            }
        }
        // img.first_screen_cake_look{
        //         // z-index: 1;
        //         width: 40px;
        //         position: absolute;
        //         top: 24%;
        //         right: 80px;
        //         transform-origin: bottom left;
        //         // transform: translate(-50%, -50%);
        //         animation-name: lookmov;
        //         animation-duration: 1s;
        //         animation-iteration-count: infinite;
        //         animation-direction: ease;
        //         animation-fill-mode:both;
        //     }
    }
    @media all and (max-width: 976px){
        div#production_area{
            grid-column: 1/2;
            order: 2;
            // input#pseudo_element_button{
            //     display: none;
            // }
            // input#back_step{
            //     display: none;
            // }
            // input#next_step{
            //     display: none;
            // }
            // input#next_step{
            //     display: none;
            // }
        }
    }
    @media all and (max-width: 660px){
        div#production_area{
            div#cake_box{
                width: 400px;
                height: 400px;
            }
        }
        input#pseudo_element_button{
            position: absolute;
            left: 2%;
        }
        input#back_step{
            position: absolute;
            left: 2%;
        }
        input#next_step{
            position: absolute;
            right: 2%;
        }
        input#finish{
            position: absolute;
            right: 2%;
        }
    }
    @media all and (max-width: 490px){
        div#production_area{
            div#cake_box{
                width: 385px;
                height: 385px;
            }
        }
        input#pseudo_element_button{
            position: absolute;
            left: 25%;
            bottom: 10%;
        }
        input#back_step{
            position: absolute;
            left: 25%;
            bottom: 10%;
        }
        input#next_step{
            position: absolute;
            right: 25%;
            bottom: 10%;
        }
        input#finish{
            position: absolute;
            right: 25%;
            bottom: 10%;
        }
    }

    div.choose_cake_model{
        // overflow: hidden;
        // width: 370px;
        height: 100vh;
        display: flex;
        // justify-content: center;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
        grid-column: 3/4;
        position: relative;
        div#cake_model_title_box{
            margin: 0;
            margin-top: 85px;
            margin-left: 30px;
            height: 6%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            p{
                color: #515151;
            }
        }
        div#choose_cake_model_box{
            margin: 0;
            height: 44%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;

            input.left_move{
                background-image: url("../assets/images/left_move_icon.png");
                background-size: cover;
                background-repeat: no-repeat;
                width: 20px;
                height: 40px;
                background-size: 100%;
                border: none;
                cursor: pointer;
                transition: 0.2s;
                background-color:rgba(0, 0, 0, 0.0);
                &:hover{
                    transform: scale(1.1);
                }
            }
            input.right_move{
                background-image: url("../assets/images/right_move_icon.png");
                background-size: cover;
                background-repeat: no-repeat;
                width: 20px;
                height: 40px;
                background-size: 100%;
                border: none;
                cursor: pointer;
                transition: 0.2s;
                background-color:rgba(0, 0, 0, 0.0);
                &:hover{
                    transform: scale(1.1);
                }
            }
            
            div#choose_cake_model_box_contents{
                position: relative;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                width: 375px;
                height: 375px;
                margin: 0 10px;
                cursor: pointer;
                .small_img{
                    // position: relative;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;
                    div.cake_box{
                        img.cake{
                            width: 170px;
                            height: 170px;
                            margin: 0;
                        }
                        img.cake_plate{
                            position: absolute;
                            width: 170px;
                            bottom: 0;
                            z-index: -1;
                            // left: 3px;
                            left: 51%;
                            bottom: 8px;
                            transform: translateX(-50%);
                        }
                    }
                }
                // img#cake_plate{
                //     position: absolute;
                //     width: 170px;
                //     bottom: 0;
                //     z-index: -1;
                //     left: 3px;
                // }
                
            }
        }
        div.instructions_text{
            // height: 220px;
            // border: solid 1px orchid;
            margin: 0;
            width: 320px;
            height: 170px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;

            background-image: url("../assets/images/dialog_box.png");
            background-size: 99.99%;
            background-repeat:no-repeat;
            transform: translate(20px,25px);
            div.instructions_text_con{
                position: absolute;
                top: 20px;
                // padding: 20px 15px;
                // padding-bottom: 40px;
                // padding-left: 20px;
                display: -webkit-box;
                -webkit-line-clamp: 3; // 行數
                -webkit-box-orient: vertical;
                white-space: normal;
                text-overflow : ellipsis;
                color: #515151;
                // line-height: 24px;

                width: 295px;
                height: 70px;
                overflow: hidden;

            }
        }
        div.mascot_box{
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                align-items: center;
                div.mascot{
                    width: 210px;
                    img{
                        width: 100%;
                    }
                }
        }
    }

    @media all and (max-width: 976px){
        div.choose_cake_model{
            grid-column: 1/2;
            order: 1;
            div#cake_model_title_box{
                width: 90%;
            }
        }
    }
    
    // ------------------------------------------- 選擇水果 -------------------------------------------
    div.choose_cake_fruits{
        // overflow: hidden;
        // width: 370px;
        height: 100vh;
        display: flex;
        // justify-content: center;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
        grid-column: 3/4;
        position: relative;
        div#cake_fruits_title_box{
            margin: 0;
            margin-top: 85px;
            margin-left: 30px;
            height: 6%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            p{
                color: #515151;
            }
        }
        div#choose_cake_fruits_box{
            margin: 0;
            height: 44%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;

            input.left_move{
                background-image: url("../assets/images/left_move_icon.png");
                background-size: cover;
                background-repeat: no-repeat;
                width: 20px;
                height: 40px;
                background-size: 100%;
                border: none;
                cursor: pointer;
                transition: 0.2s;
                background-color:rgba(0, 0, 0, 0.0);
                &:hover{
                    transform: scale(1.1);
                }
            }
            input.right_move{
                background-image: url("../assets/images/right_move_icon.png");
                background-size: cover;
                background-repeat: no-repeat;
                width: 20px;
                height: 40px;
                background-size: 100%;
                border: none;
                cursor: pointer;
                transition: 0.2s;
                background-color:rgba(0, 0, 0, 0.0);
                &:hover{
                    transform: scale(1.1);
                }
            }
            
            div#choose_cake_fruits_box_contents{
                position: relative;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                width: 375px;
                height: 375px;
                margin: 0 10px;
                cursor: pointer;
                .small_img{
                    // position: relative;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;
                    div.cake_box{
                        img.cake{
                            width: 170px;
                            height: 170px;
                            margin: 0;
                        }
                        img.cake_plate{
                            position: absolute;
                            width: 170px;
                            bottom: 0;
                            z-index: -1;
                            // left: 3px;
                            left: 51%;
                            bottom: 15px;
                            transform: translateX(-50%);
                        }
                    }
                }
                
            }
        }
        div.instructions_text{
            // height: 220px;
            // border: solid 1px orchid;
            margin: 0;
            width: 320px;
            height: 170px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;

            background-image: url("../assets/images/dialog_box.png");
            background-size: 99.99%;
            background-repeat:no-repeat;
            transform: translate(20px,25px);
            div.instructions_text_con{
                position: absolute;
                top: 20px;
                // padding: 20px 15px;
                // padding-bottom: 40px;
                // padding-left: 20px;
                display: -webkit-box;
                -webkit-line-clamp: 3; // 行數
                -webkit-box-orient: vertical;
                white-space: normal;
                text-overflow : ellipsis;
                color: #515151;
                // line-height: 24px;

                width: 295px;
                height: 70px;
                overflow: hidden;

            }
        }
        div.mascot_box{
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                align-items: center;

                button.delete_button{
                    width: 100px;
                    height: 40px;
                    border: none;
                    border-radius: 5px;
                    background-color: #F7EDD4;
                    color: #515151;
                    box-shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
                    transition: 0.2s;
                    font-size: 14px;
                    &:hover{
                        background-color: #515151;
                        color: #F7EDD4;
                        transform: translateY(-5px);
                    }
                }
                div.mascot{
                    width: 210px;
                    img{
                        width: 100%;
                    }
                }
        }
    }

    @media all and (max-width: 976px){
        div.choose_cake_fruits{
            grid-column: 1/2;
            order: 1;
        }
    }

    // ------------------------------------------- 選擇裝飾 -------------------------------------------
    div.choose_cake_decorations{
        // overflow: hidden;
        // width: 370px;
        height: 100vh;
        display: flex;
        // justify-content: center;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
        grid-column: 3/4;
        position: relative;
        div#cake_decorations_title_box{
            margin: 0;
            margin-top: 85px;
            margin-left: 30px;
            height: 6%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            p{
                color: #515151;
            }
        }
        div#choose_cake_decorations_box{
            margin: 0;
            height: 44%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;

            input.left_move{
                background-image: url("../assets/images/left_move_icon.png");
                background-size: cover;
                background-repeat: no-repeat;
                width: 20px;
                height: 40px;
                background-size: 100%;
                border: none;
                cursor: pointer;
                transition: 0.2s;
                background-color:rgba(0, 0, 0, 0.0);
                &:hover{
                    transform: scale(1.1);
                }
            }
            input.right_move{
                background-image: url("../assets/images/right_move_icon.png");
                background-size: cover;
                background-repeat: no-repeat;
                width: 20px;
                height: 40px;
                background-size: 100%;
                border: none;
                cursor: pointer;
                transition: 0.2s;
                background-color:rgba(0, 0, 0, 0.0);
                &:hover{
                    transform: scale(1.1);
                }
            }
            
            div#choose_cake_decorations_box_contents{
                position: relative;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                width: 375px;
                height: 375px;
                margin: 0 10px;
                cursor: pointer;
                .small_img{
                    // position: relative;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;
                    div.cake_box{
                        img.cake{
                            width: 170px;
                            height: 170px;
                            margin: 0;
                        }
                        img.cake_plate{
                            position: absolute;
                            width: 170px;
                            bottom: 0;
                            z-index: -1;
                            // left: 3px;
                            left: 51%;
                            bottom: 15px;
                            transform: translateX(-50%);
                        }
                    }
                }
                
            }
        }
        div.instructions_text{
            // height: 220px;
            // border: solid 1px orchid;
            margin: 0;
            width: 320px;
            height: 170px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;

            background-image: url("../assets/images/dialog_box.png");
            background-size: 99.99%;
            background-repeat:no-repeat;
            transform: translate(20px,25px);
            div.instructions_text_con{
                position: absolute;
                top: 20px;
                // padding: 20px 15px;
                // padding-bottom: 40px;
                // padding-left: 20px;
                display: -webkit-box;
                -webkit-line-clamp: 3; // 行數
                -webkit-box-orient: vertical;
                white-space: normal;
                text-overflow : ellipsis;
                color: #515151;
                // line-height: 24px;

                width: 295px;
                height: 70px;
                overflow: hidden;

            }
        }
        div.mascot_box{
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                align-items: center;

                button.delete_button{
                    width: 100px;
                    height: 40px;
                    border: none;
                    border-radius: 5px;
                    background-color: #F7EDD4;
                    color: #515151;
                    box-shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
                    transition: 0.2s;
                    font-size: 14px;
                    &:hover{
                        background-color: #515151;
                        color: #F7EDD4;
                        transform: translateY(-5px);
                    }
                }
                div.mascot{
                    width: 210px;
                    img{
                        width: 100%;
                    }
                }
        }
    }
    @media all and (max-width: 976px){
        div.choose_cake_decorations{
            grid-column: 1/2;
            order: 1;
        }
    }
        //---------------------------------- 製作完成 third_screen ----------------------------------

        .loading{
            width: 180px;
            height: 180px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            background-color: rgba(255, 255, 255, 0.4);
            animation-name: movRradius3;
            animation-duration: 4s;
            animation-iteration-count: infinite;
            animation-direction: alternate-reverse;
            z-index: -1;
            img{
                width: 100%;
                // transform-origin: center;
                // animation: animate_dailyimg 2s infinite;
                // -webkit-animation: animate_dailyimg 2s infinite;
            }
            div.loading_text{
                display: flex;
                justify-content: center;
                p{
                    color: #515151;
                    text-align: center;
                    margin-top: -30px;
                    font-size: 18px;
                    opacity: .1;

                    transition: all .5s;
                    animation: animate_dailycss 2s infinite;
                    -webkit-animation: animate_dailycss 2s infinite;
                }
                p:nth-child(1){
                    animation-delay: .1s;
                }
                p:nth-child(2){
                    animation-delay: .2s;
                }
                p:nth-child(3){
                    animation-delay: .3s;
                }
                p:nth-child(4){
                    animation-delay: .4s;
                }
                p:nth-child(5){
                    animation-delay: .5s;
                }
                p:nth-child(6){
                    animation-delay: .6s;
                }
                p:nth-child(7){
                    animation-delay: .7s;
                }
                p:nth-child(8){
                    animation-delay: .8s;
                }
                p:nth-child(9){
                    animation-delay: .9s;
                }
                p:nth-child(10){
                    animation-delay: 1s;
                }
            }
        }

        // section#third_screen.add_start2{
        //         display: grid;
        //     }
        section#third_screen{
            width: 100%;
            height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0;
            position: relative;
            // display: none;
            overflow: hidden;
        
            background-image: url("../assets/images/index_kitchen_img_small.png");
            background-size: cover;
            background-repeat:no-repeat;
            background-color: rgba(255, 255, 255, 0.4);
            div.finish_cakeDesign_button_box{
                width: 70%;
                z-index: 2;
                position: absolute;
                left: 50%;
                bottom: 15%;
                transform: translateX(-50%);
                display: flex;
                justify-content: space-evenly;
            }
        }
        @media all and (max-width: 768px){
            section#third_screen{
                grid-template-columns: 1fr;
                height: 200vh;
                div.finish_cakeDesign_button_box{
                    flex-direction: column;
                    align-items: center;
                    height: 200px;
                    bottom: 3%;
                }
            }
        }
        
        div#finish_cake_box{
            height: 100vh;
            display: flex;
            position: relative;
            justify-content: space-evenly;
            align-items: center;
            grid-column: 1/3;
            img.finish_cake_img{
                width:300px;
            }
            // z-index: 1;
            img.first_screen_cake_look{
                // z-index: 1;
                width: 60px;
                position: absolute;
                top: 32%;
                right: 10%;
                transform-origin: bottom left;
                // transform: translate(-50%, -50%);
                animation-name: lookmov;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-direction: ease;
                animation-fill-mode:both;
            }
            img#shiny1{
                    height: 20px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 220px;
                    left: 12%;
                    // 動畫效果
                    animation-name: shiny_animation1;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                }
            img#shiny2{
                    height: 10px;
                    position: absolute;
                    transform: rotate(-30deg);
                    top: 245px;
                    left: 10%;
                    // 動畫效果
                    animation-name: shiny_animation2;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 2s;
                }
            img#shiny3{
                    height: 15px;
                    position: absolute;
                    transform: rotate(15deg);
                    top: 240px;
                    left: 16%;
                    // 動畫效果
                    animation-name: shiny_animation3;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 3s;
                }
            img#shiny4{
                    height: 15px;
                    position: absolute;
                    transform: rotate(20deg);
                    bottom: 250px;
                    left: 13%;
                    // 動畫效果
                    animation-name: shiny_animation4;
                    animation-duration: 4s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                }
            img#shiny5{
                    height: 10px;
                    position: absolute;
                    transform: rotate(-15deg);
                    bottom: 260px;
                    left: 10%;
                    // 動畫效果
                    animation-name: shiny_animation5;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 1s;
                }
            img#shiny6{
                    height: 10px;
                    position: absolute;
                    transform: rotate(15deg);
                    top: 400px;
                    right: 25px;
                    // 動畫效果
                    animation-name: shiny_animation6;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                }
            img#shiny7{
                    height: 13px;
                    position: absolute;
                    transform: rotate(30deg);
                    top: 390px;
                    right: 45px;
                    // 動畫效果
                    animation-name: shiny_animation7;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 1s;
                }
            img#shiny8{
                    height: 18px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 370px;
                    right: 30px;
                    // 動畫效果
                    animation-name: shiny_animation8;
                    animation-duration: 3s;
                    animation-iteration-count: infinite;
                    animation-timing-function: ease-in-out;
                    animation-delay: 2s;
                }
        }
        @media all and (max-width: 768px){
            div#finish_cake_box{
                margin-top: 130px;
                margin-bottom: 30px;
                grid-column: 1/2;
                height: 40vh;
                img.first_screen_cake_look{
                    top: 2%;
                    right: 20%;
                }
                img#shiny6{
                    top: 40%;
                }
                img#shiny7{
                    top: 43%;
                }
                img#shiny8{
                    top: 50%;
                }
            }
        }
        @media all and (max-width: 490px){
            div#finish_cake_box{
                img.finish_cake_img{
                width:200px;
            }
            }
        }

        div#finish_designIdea_box{
            padding-top: 80px;
            padding-bottom: 200px;
            padding-left: 10%;
            padding-right: 10%;
            height: 100vh;
            display: flex;
            justify-content: space-evenly;
            flex-direction: column;
            align-items: flex-start;
            grid-column: 3/5;
            div.designIdea_name{
                p{
                    color: #515151;
                }
                textarea{
                    // width: 400px;
                    // height: 35px;
                    resize : none;
                    border: 0;
                    border-radius: 5px;
                    box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.3);
                    background-color: white;
                    color: #515151;
                }
            }
            div.designIdea{
                p{
                    color: #515151;
                }
                textarea{
                    // width: 400px;
                    // height: 100px;
                    resize : none;
                    border: 0;
                    border-radius: 5px;
                    box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.3);
                    background-color: white;
                    color: #515151;
                }
            }
        }
        @media all and (max-width: 768px){
            div#finish_designIdea_box{
                height: 400px;
                grid-column: 1/2;
                padding-top: 0;
                align-items: center;
                padding-bottom: 0;
            }
        }
        @media all and (max-width: 490px){
            div#finish_designIdea_box{
                div.designIdea_name{
                    textarea{
                        max-width: 360px;
                    }
                }
                div.designIdea{
                    textarea{
                        max-width: 360px;
                    }
                }

            }
        }

        div#finish_mascot_box{
            padding-top: 180px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            // align-items: center;
            align-items: flex-start;
            grid-column: 5/6;
            div.mascot_text{
                width: 170px;
                height: 260px;
                position: relative;
                display: flex;
                justify-content: center;
                // align-items: center;

                background-image: url("../assets/images/dialog_box2.png");
                background-size: 99.99%;
                background-repeat:no-repeat;
                // transform: translate(20px,25px);
                overflow: hidden;

                transform-origin: bottom center;
                animation-name: mascotTextmov;
                animation-duration: 1.5s;
                animation-iteration-count: infinite;
                animation-direction: ease;
                animation-fill-mode:both;
                p{
                margin: 0;
                padding: 15px;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                white-space: normal;
                text-overflow : ellipsis;
                // -webkit-line-clamp: 3; // 行數
                color: #515151;
                line-height: 24px;
                }
            }
            div.mascot{
                width: 210px;
                img{
                    width: 100%;
                }
            }
        }
        @media all and (max-width: 768px){
            div#finish_mascot_box{
                margin-top: 10px;
                grid-column: 1/2;
                order:2;
                padding: 0;
                align-items: center;
                // div.mascot{
                //     margin-bottom: 200px;
                // }
            }
        }

    //---------------------------------- first_screen 動畫 ----------------------------------
    @keyframes lookmov {
        0%{
            transform: rotate(6deg) translate(10% , 0%);
        }
        45%{
            transform: rotate(-6deg) translate(10% , 0%);
        }
        60%{
            transform: rotate(6deg) translate(10% , 0%);
        }
        75%{
            transform: rotate(-6deg) translate(10% , 0%);
        }
        100%{
            transform: rotate(6deg) translate(10% , 0%);
        }
    }

//---------------------------------- shiny 動畫 ----------------------------------
    @keyframes shiny_animation1 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1.1);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
    @keyframes shiny_animation2 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1.3);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
    @keyframes shiny_animation3 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
    @keyframes shiny_animation4 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1.1);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
     @keyframes shiny_animation5 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1.3);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
     @keyframes shiny_animation6 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1.1);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
    @keyframes shiny_animation7 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1.3);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
    @keyframes shiny_animation8 {
        0%{
            transform: rotate(0deg) scale(.8);
        }
        50%{
            transform: rotate(80deg) scale(1);
        }
        100%{
            transform: rotate(0deg) scale(.8);
        }
    }
//---------------------------------- 製作完成 動畫 ----------------------------------
    // @keyframes isFinishAn {
    //     0%{
    //         transform: translateY(0%);
    //         opacity: 1;
    //     }
    //     100%{
    //         transform: translateY(-100%);
    //         opacity: 0;
    //     }
    // }
    .disappear-leave-active,
    .disappear-enter-active{
        transform: all 1s ease;
    }
    
    .disappear-enter{
        transform: translateY(100%);
        opacity: 1;
    }

    .disappear-leave-to{
        transform: translateY(-100%);
        opacity: 0;
    }

    .appear-leave-active,
    .appear-enter-active{
        transform: all 1s ease;
    }

    .appear-enter{
        transform: translateY(-100%);
        opacity: 0;
    }

    .appear-leave-to{
        transform: translateY(100%);
        opacity: 1;
    }

    @keyframes mascotTextmov {
        0%{
            transform: rotate(2deg) translate(10% , 0%);
        }
        45%{
            transform: rotate(-2deg) translate(10% , 0%);
        }
        60%{
            transform: rotate(2deg) translate(10% , 0%);
        }
        75%{
            transform: rotate(-2deg) translate(10% , 0%);
        }
        100%{
            transform: rotate(2deg) translate(10% , 0%);
        }
    }
//---------------------------------- 蛋糕製作底 動畫 ----------------------------------
@keyframes movRradius {
        0%{
            border-radius: 50% 60% 55% 70%;
            // background:conic-gradient(rgba( 244, 233, 201,.4), rgba( 250, 233, 179,.5), rgba( 244, 233, 201,.4), rgba( 239, 230, 228,.4), rgba( 223, 285, 176,.3), rgba( 223, 285, 176,.3), rgba( 250, 233, 179,.5), rgba( 244, 233, 201,.4));
        }
        33%{
            border-radius: 60% 50% 65% 50%;
            // background:conic-gradient(rgba( 244, 233, 201,.4), rgba( 239, 230, 228,.4), rgba( 244, 233, 201,.4), rgba( 239, 230, 228,.4), rgba( 244, 233, 201,.4), rgba( 223, 285, 176,.3), rgba( 244, 233, 201,.4), rgba( 250, 233, 179,.5));
        }
        66%{
            border-radius: 70% 60% 50% 60%;
            // background:conic-gradient(rgba( 244, 233, 201,.4), rgba( 250, 233, 179,.5), rgba( 244, 233, 201,.4), rgba( 239, 230, 228,.4), rgba( 223, 285, 176,.3), rgba( 223, 285, 176,.3), rgba( 250, 233, 179,.5), rgba( 244, 233, 201,.4));
        }
        100%{
            border-radius: 55% 70% 60% 50%;
            // background:conic-gradient(rgba( 244, 233, 201,.4), rgba( 239, 230, 228,.4), rgba( 244, 233, 201,.4), rgba( 239, 230, 228,.4), rgba( 244, 233, 201,.4), rgba( 223, 285, 176,.3), rgba( 244, 233, 201,.4), rgba( 250, 233, 179,.5));
        }
    }

@keyframes movRradius2 {
        0%{
            border-radius: 45% 65% 55% 60%;
        }
        33%{
            border-radius: 65% 50% 60% 50%;
        }
        66%{
            border-radius: 65% 55% 50% 45%;
        }
        100%{
            border-radius: 55% 65% 60% 55%;
        }
    }

// ---------------------------------- cooking動畫 ----------------------------------
// @keyframes animate_dailyimg {
//     0% {
//         transform: scale(1, 1);
//         margin-left: 0;
//     }

//     50% {
//         transform: scale(1.05, 1.05);
//         margin-left: 10px;
//         text-shadow: 0 15px 5px rgba(0, 0, 0, .1);
//     }

//     100% {
//         transform: scale(1, 1);
//     }
// }
@keyframes animate_dailycss {
    0% {
        opacity: .1;
        transform: translateY(0);
        margin-left: 0;
    }

    25% {
        opacity: 1;
        transform: translateY(-15px);
        margin-left: 10px;
        text-shadow: 0 15px 5px rgba(0, 0, 0, .2);
    }

    100% {
        opacity: .1;
        transform: translateY(0);
    }
}
@keyframes movRradius3 {
        0%{
            border-radius: 50% 60% 55% 70%;
            opacity: 0;
        }
        33%{
            border-radius: 60% 50% 65% 50%;
        }
        66%{
            border-radius: 70% 60% 50% 60%;
        }
        100%{
            border-radius: 55% 70% 60% 50%;
            opacity: 1;
        }
    }
// ---------------------------------- 下雪 ----------------------------------
.snow-container {
  position: absolute;
  height: 100%;
  width: 100%;
  max-width: 100%;
  top: 0;
  overflow: hidden;
  z-index: -1;
  pointer-events: none;
//   background-color: red;
}

.snow {
  display: block;
  position: absolute;
  z-index: -1;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  pointer-events: none;
  -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
  -webkit-animation: snow linear infinite;
          animation: snow linear infinite;
}
.snow.foreground {
  background-image: url("../assets/images/snow.png");
  -webkit-animation-duration: 15s;
          animation-duration: 15s;
}
.snow.foreground.layered {
  -webkit-animation-delay: 7.5s;
          animation-delay: 7.5s;
}
.snow.middleground {
  background-image: url("../assets/images/snow2.png");
  -webkit-animation-duration: 20s;
          animation-duration: 20s;
}
.snow.middleground.layered {
  -webkit-animation-delay: 10s;
          animation-delay: 10s;
}
.snow.background {
  background-image: url("../assets/images/snow3.png");
  -webkit-animation-duration: 30s;
          animation-duration: 30s;
}
.snow.background.layered {
  -webkit-animation-delay: 15s;
          animation-delay: 15s;
}

@-webkit-keyframes snow {
  0% {
    -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
  }
  100% {
    -webkit-transform: translate3d(15%, 100%, 0);
            transform: translate3d(15%, 100%, 0);
  }
}

@keyframes snow {
  0% {
    -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
  }
  100% {
    -webkit-transform: translate3d(15%, 100%, 0);
            transform: translate3d(15%, 100%, 0);
  }
}



</style>