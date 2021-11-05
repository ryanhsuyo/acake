<template>
    <div class="all">
        <headercom></headercom>
        <!-- 開始製作 -->
        <section id="first_screen">
            <div id="first_screen_button" @click="isStart">
                    <buttontest title=" 開始製作"></buttontest>
            </div>
            <div id="first_screen_cake">
            <img id="first_screen_cake_look" src="../assets/images/cake_design_look.svg" alt="">
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
         <div class="center_box">
         <section id="second_screen">
             <div id="production_area">
                 <input id="back_step" type="button" style="opacity: 0;">
                 <div id="cake_box">
                     <div id="big_cake_model_box">
                        <img id="big_cake_model" src="../../static/cake_design/cake_model1.png"  alt="">
                     </div>
                     <div id="big_plate_box">
                        <img id="big_plate" src="../assets/images/cake_design/plate.png" alt="">
                     </div>
                 </div>
                 <input id="next_step" type="button">
             </div>
             <!-- 選擇糕體 -->
             <div id="choose_cake_model">
                 <div id="cake_model_title_box">
                     <img src="../assets/images/button_butter.png" alt="" style="width:30px"><p>選擇糕體</p><img src="../assets/images/button_butter.png" alt="" style="width:30px">
                 </div>
                 <div id="choose_cake_model_box">
                     <button id="left_move" style="z-index:10;">《</button>
                     <div id="choose_cake_model_box_contents">
                         <div id="small_img">
                            <img class="cake" id="cake_model1" src="../assets/images/cake_design/cake_model1.png" alt="">
                            <img class="cake" id="cake_model2" src="../assets/images/cake_design/cake_model2.png" alt="">
                            <img class="cake" id="cake_model3" src="../assets/images/cake_design/cake_model3.png" alt="">
                            <img id="cake_plate" src="../assets/images/cake_design/plate.png" alt="">
                         </div>
                     </div>
                     <button id="right_move" style="z-index:10;">》</button>
                 </div>
                 <div id="instructions_text">
                     <div id="instructions_text_con">
                        草莓原產於南美，目前中國位居生產草莓
榜首而且，草莓的果實，其實是上面佈滿的眾多小點唷!!是不是嚇了一大跳呀？
                        
                     <!-- <img src="../assets/images/dialog_box.png" alt=""> -->
                     </div>
                </div>
                 <div id="mascot_box">
                     <button id="use_button">使用</button>
                     <div id="mascot">
                        <img src="../assets/images/mascot1.png" alt="">
                     </div>
                 </div>
             </div>
             <!-- 選擇糕體 -->
             <!-- 選擇水果 -->
             <div id="choose_cake_fruits">

             </div>
             <!-- 選擇水果 -->
             <!-- 選擇裝飾 -->
             <div id="choose_cake_decorations">

             </div>
             <!-- 選擇裝飾 -->
         </section>
         </div>
         <!-- 製作中 -->
        <footercom></footercom>
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import buttontest from '../components/button_h1.vue'
import footercom from '../components/footercom'

export default {
    name:"cakeDesign",
    components:{
        headercom,
        buttontest,
        footercom,
    },
    data(){
        return{
            smallIMages:["../../static/cake_design/cake_model"],
            bigImages:["../../static/cake_design/cake_model"],
        }
    },
    methods:{
        isStart(){
            // alert("10")
            $('#first_screen').toggleClass('start');
            $('#second_screen').addClass('add_start');
            // $('#first_screen').css("display: none;")
        }
        // chaneImage(e){
        //     document.querySelector("#big_cake_model").attr("src")=e.target.attr("src");
        // }
    },
    mounted() {

        // 選擇-蛋糕糕體
        $("#left_move").click(function(){
            $("#choose_cake_model_box_contents").children("div").animate({marginLeft:'+=340px'},200);
        });
        $("#right_move").click(function(){
            $("#choose_cake_model_box_contents").children("div").animate({marginLeft:'-=340px'},200);
            if ($("div").marginLeft >= 500) {
                $("#choose_cake_model_box_contents").children("div").animate({marginLeft:'-=500px'},200);
            }
        });
        // 當選項到底 會跑回第一個


        //點擊小圖換大圖
        $(function(){	
            $("#small_img img").click(function(){
                // alert("1");		
                var num = $(this).attr("id").substr(10);		
                $("#big_cake_model").attr( "src" , "../../static/cake_design/cake_model" + num + ".png" );
            });
        });
        
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
        // div{
        //     div.center_box{
        //         margin: 0;
        //         width: 100%;
        //         display: flex;
        //         justify-content: center;
        //     }
        // }
    }

    //---------------------------------- 開始製作 first_screen ----------------------------------
    section#first_screen.start{
        display: none;
    }
    section#first_screen{
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
            img#first_screen_cake_look{
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
    section#second_screen.add_start{
        display: grid;
    }
    section#second_screen{
        width: 100%;
        height: 100vh;
        // display: grid;
        grid-template-columns: 1fr 1fr 370px;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 0;
        position: relative;
        // top: 50%;
        // left: 50%;
        // transform: translate(-50%,0)
        // overflow: hidden;
        display: none;
    }
    div#production_area{
        height: 100vh;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        grid-column: 1/3;
        background-image: url("../assets/images/index_kitchen_img_small.png");
        background-size: cover;
        background-repeat:no-repeat;
        background-color: rgba(255, 255, 255, 0.4);
        z-index: -2;
        div#cake_box{
            width: 450px;
            height: 450px;
            position: relative;
            bottom: 30px;
            div#big_cake_model_box{
                z-index: 10;
                img#big_cake_model{
                    width: 100%;
                }
            }
            div#big_plate_box{
                z-index: -1;
                width: 90%;
                position: absolute;
                top: 85%;
                left: 52%;
                transform: translate(-50%,-50%);
                img#big_plate{
                    width: 100%;
                }
            }
        }
        input#back_step{
            // background-image: url("../assets/images/next_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
        input#next_step{
            background-image: url("../assets/images/next_step.png");
            width: 85px;
            height: 85px;
            background-size: 100%;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            background-color:rgba(0, 0, 0, 0.0);
            &:hover{
                transform: translateY(-5px);
            }
        }
    }
    div#choose_cake_model{
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
            
            div#choose_cake_model_box_contents{
                position: relative;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                width: 170px;
                height: 170px;
                margin: 0 10px;
                div{
                    position: relative;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;
                    img.cake{
                        width: 170px;
                        margin: 0;
                    }
                    img#cake_plate{
                        position: absolute;
                        width: 170px;
                        bottom: 0;
                        z-index: -1;
                    }
                }
            }
        }
        div#instructions_text{
            // height: 220px;
            width: 370px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            div#instructions_text_con{
                padding: 20px 15px;
                padding-bottom: 40px;
                // padding-left: 20px;
                display: -webkit-box;
                -webkit-line-clamp: 3; // 行數
                -webkit-box-orient: vertical;
                white-space: normal;
                color: #515151;
                // line-height: 24px;

                width: 320px;
                height: 140px;
                background-image: url("../assets/images/dialog_box.png");
                background-size: cover;
                background-repeat:no-repeat;

            }
        }
        div#mascot_box{
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                align-items: center;
                button#use_button{
                    width: 100px;
                    height: 40px;
                    border: none;
                    border-radius: 5px;
                    background-color: #F7EDD4;
                    color: #515151;
                    box-shadow: 4px 4px 5px 0 rgba(0, 0, 0, 0.3);
                    transition: 0.2s;
                    &:hover{
                        background-color: #515151;
                        color: #F7EDD4;
                        transform: translateY(-5px);
                    }
                }
                div#mascot{
                    width: 210px;
                    img{
                        width: 100%;
                    }
                }
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
</style>