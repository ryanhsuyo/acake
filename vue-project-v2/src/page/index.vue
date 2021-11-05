<template>
    <div>
        <headercom></headercom>
        <div id="first_box">
            <div class="first_screen">
                <div class="banner_box">
                    <img data-offset="20" class="banner_layer3 parallax_reverse" src="../assets/images/banner_layer3.png" alt="">
                    <img data-offset="50" class="banner_layer2 parallax" src="../assets/images/banner_layer2.png" alt="">
                    <img data-offset="10" class="banner_layer1 parallax_reverse" src="../assets/images/banner_layer1.png" alt="">
                </div>
                <img class="subtitle" src="../assets/images/subtitle.png" alt="">
                <div class="first_screen_button">
                    <router-link to="/cakeDesign" id="cakeDesign">
                        <buttontest title=" 前往設計"></buttontest>
                    </router-link>
                </div>
                <img class="background_img" src="../assets/images/background_img130.png" alt="">
            </div>
        </div>
        <div class="second_screen">
            <div id="second_box">
                <!-- 往下箭頭 -->
                <div class="downarrow">
                    <span class="arrow"></span>
                    <span class="arrow"></span>
                    <span class="arrow"></span>
                </div>
                <!-- 往下箭頭 -->
                <div class="second_title">
                    <titleh1 title="關於我們"></titleh1>
                </div>
                <div class="second_content">
                    <div class="about_img">
                        <img id="shiny1" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny2" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny3" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny4" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny5" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny6" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny7" src="../assets/images/shiny.svg" alt="">
                        <img id="shiny8" src="../assets/images/shiny.svg" alt="">
                        <img id="logo" src="../assets/images/aboutus_logo.png" alt="">
                    </div>
                    <div class="about_text">
                        <h2> <img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg);">About Us</h2> 
                        蛋糕店一間間的開，選擇多如滿天繁星
                        但你是不是跟我們一樣，總希望來點不一樣的改變呢？
                        從零開始學習做蛋糕是困難的，但創意是無限的
                        A cake 希望讓每個人的創意，都能被實現
                        讓我們在每一次選蛋糕時，不必再有任何的妥協
                        邀請你來設計，專屬於你的蛋糕。
                        <br>
                        <h2><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg);">A piece of cake</h2>
                        蛋糕是甜蜜的，蛋糕是快樂的，蛋糕也是幸福的，不同的蛋糕，代表著不同的心情和意義。生日、戀愛、婚禮，在人生重要的時刻，當然要與身邊親朋好友或是情人知己、乃至同學同事共同分享，成為記憶中的難忘的生活歡聚時刻。生日，成為有“ 脆 ” 時刻誕生日，是每一個人每年最值得慶祝的大日子。擔當主角的無論男或女，老或少，生日收到蛋糕總是一樂也。 “ 有 ‘ 脆 ’ 時刻 ” 是一種專門為生日設計的 “ 脆脆 ” 蛋糕。其脆是朱古力脆米，是果仁脆，連芒果、啤梨、楊梅等鮮果都是爽脆的，配上軟滑慕思，發不同脆味。告白，簡單中藏 “ 新鮮感 ” 對愛情的要求很簡單：外表平凡，內里雋永。為情侶們打造的三款蛋糕，不僅養眼，鮮果分量多，而且有不同營養功效，把人間溫馨的愛意融入其中。
                    </div>
                </div>
            </div>
        </div>
            <div class="third_screen">
                <div class="vote_box">

                </div>
            </div>
            <div class="fourth_screen">
                <div class="fourth_box">
                    <div class="fourth_title">
                        <titleh1 title="主廚推薦"></titleh1>
                    </div>
                    <div class="fourth_card">
                        <card-voting v-for="(cake_name,index) in 6" :key="index"></card-voting>
                    </div>
                </div>
            </div>
            <div class="fifth_screen">
                <div id="fifth_box">
                    <div class="fifth_title">
                        <titleh1 title="關於蛋糕的小知識"></titleh1>
                    </div>
                    <div class="first_knowledge_img">
                        <img src="../assets/images/int_cho_cake.gif" alt="">
                        <button class="first_knowledge_button">By New</button>
                    </div>
                    <div class="first_knowledge_text">
                        <h2>維也納朱古力杏仁蛋糕的由來</h2>
                        <h3><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg);">Vienna chocolate almond cake</h3>
                        <hr>
                        維也納朱古力杏仁蛋糕源自於公元1873年開幕的 Hotel Imperial，這裏曾經是權貴的集中地方，從帝國時期的 “k.u.k Hof-imperial ” 到後來 “ Hotel lmperial ” 一直都是奧地利最好的旅館，1994年更被評選為世界最好的飯店之一。
                        <br>
                        傳說，當年為了慶祝飯店的開幕並彰顯皇帝Franz-joseph的榮耀，糕餅師傅Xaver Loibner 特地研發出來特殊口感的蛋糕，蛋糕外層的可口的牛奶朱古力伴隨著甜美的杏仁味在舌尖緩緩融化，接著蛋糕中的碎杏仁充滿您的味覺，並隨著絲絲可可亞的香味釋出，完美而細膩的留住在口中，不僅得到皇帝的喜愛，更將之命名為“Imperial Torte”，且被視為 “ 甜密的問候 ”。
                    </div>
                    <div class="second_knowledge_text">
                        <h2>生日蛋糕的由來</h2>
                        <h3><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg);">Birthday Cake</h3>
                        <hr>
                        中古時期的歐洲人相信，生日是靈魂最容易被惡魔入侵的日子，所以在生日當天，親人朋友都會齊聚身邊給予祝福，並且送蛋糕以帶來好運驅逐惡魔。生日蛋糕，最初是只有國王才有資格擁有的，都可以在生日時，買個漂亮的蛋糕，享客群人給予的祝福。
                    </div>
                    <div class="second_knowledge_img">
                        <img src="../assets/images/birthday_cake.jpg" alt="">
                    </div>
                    <div class="third_knowledge_img">
                        <img src="../assets/images/int_sch_cake.gif" alt="">
                        <button class="third_knowledge_button">By New</button>
                    </div>
                    <div class="third_knowledge_text">
                        <h2>黑森林蛋糕由來</h2>
                        <h3><img src="../assets/images/leaf.png" alt="" style="width: 30px;transform: rotate(-15deg);">Schwarzwaelder Kirschtorte</h3>
                        <hr>
                        其實黑森林蛋糕(Schwarzwaelder Kirschtorte)若翻譯成 “ 黑森林櫻桃奶油蛋糕 ” 應該是較恰當吧。因為德文全名里的Schwarzwaelder即為黑森林，而Kirschtorte也就是櫻桃奶油蛋糕的意思。
                        <br>
                        相傳古早以前，每當黑森林區的櫻桃豐收時，農婦們除了將過剩的櫻桃製成果醬外，在做蛋糕時，也會非常大方地將櫻桃塞在蛋糕的夾層里，或是一顆顆細心地裝飾在蛋糕上。而在打制蛋糕的鮮奶油時，更會加入不少櫻桃汁～而這種以櫻桃與鮮奶油為主的蛋糕，從黑森林傳到外地後，也就變成所謂的“黑森林蛋糕”了！
                        <br>
                        黑森林蛋糕真正的主角，還是那鮮美豐富的櫻桃喔！以前德國曾出現消費者因某家黑森林蛋糕的櫻桃含量太少而提出控告的案例～也因此德國政府對這種國寶級黑森林，也作出了相關的規定，像是黑森林蛋糕的鮮奶油部份，就至少得含有80克的櫻桃汁才行喔！
                        所以黑森林呀，真的不是代表黑黑的意思啦。而黑森林蛋糕，更不是朱古力蛋糕的代名詞喔！黑森林是位於德國西南的一個山區，從巴登巴登Baden Baden往南一直到佛來堡Freiburg這帶，都屬黑森林區。今天即使來到黑森林，並不見得到處都能幸運地嘗到沒有朱古力的黑森林蛋糕，不過有機會在此地享受黑森林時，不妨細心留意蛋糕里的小櫻桃，讓自己重新認識黑森林外，別忘了也感受一下那份藏於味蕾深處的新鮮感喔。
                        </div>
                    </div>
                </div>
        <footercom></footercom>
    </div>
</template>
<!-- gsap套件 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<!-- jQ套件 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import titleh1 from '../components/title_h1.vue'
import cardVoting from '../components/card_voting.vue'
import buttontest from '../components/button_h1.vue'
import footercom from '../components/footercom'
// import {gsap} from "gsap"

export default {
    name:"index",
    components:{
        headercom,
        titleh1,
        cardVoting,
        buttontest,
        footercom,
    },
    mounted() {
        // 第一屏 parallax 效果
        $(window).on('mousemove', function(e) {
            var w = $(window).width();
            var h = $(window).height();
            var offsetX = 0.5 - e.pageX / w;
            var offsetY = 0.5 - e.pageY / h;
            
            $(".parallax").each(function(i, el) {
                var offset = parseInt($(el).data('offset'));
                var translate = "translate3d(" + Math.round(offsetX * offset) + "px," + Math.round(offsetY * offset) + "px, 0px)";
            
                $(el).css({
                '-webkit-transform': translate,
                'transform': translate,
                'moz-transform': translate
                });
            });
        });
        // 第一屏 parallax_reverse 效果
        $(window).on('mousemove', function(e) {
            var w = $(window).width();
            var h = $(window).height();
            var offsetX = 0.5 + e.pageX / w;
            var offsetY = 0.5 + e.pageY / h;
            
            $(".parallax_reverse").each(function(i, el) {
                var offset = parseInt($(el).data('offset'));
                var translate = "translate3d(" + Math.round(offsetX * offset) + "px," + Math.round(offsetY * offset) + "px, 0px)";
            
                $(el).css({
                '-webkit-transform': translate,
                'transform': translate,
                'moz-transform': translate
                });
            });
        });                         

        // gsap
        TweenMax.to('#shiny1', {

            duration: 1,
            repeat: 4,
            yoyo: true,
            rotation: 50,
            transformOrigin:'center top',
        });
    },
}
</script>
<style scoped lang="scss">
    @import "../assets/style/var.scss";
    body{
        margin: 0;
        position: relative;
        background-color: #EFE6E4;
    }
    // div#first_box{
    //     margin: 0 auto;
    //     max-width: 1200px;
    //     display: flex;
    //     align-items: center;
    //     flex-direction: column;
    // }

    // 第一屏first_screen
    div.first_screen{
        height: 650px;
        display: flex;
        justify-content: center;
        margin: 0;
        position: relative;
        overflow: hidden;
        img.subtitle{
            position: absolute;
            left: 50%;
            top: -5px;
            // transform: translateX(-50%);
            height: 130px;
            transform-origin: left top;
            animation-name: movSubtitle;
            animation-duration: 2s;
            // animation-delay: 0.1s;
            animation-iteration-count: infinite;
            animation-direction: alternate-reverse;
            animation-timing-function: ease-in-out;
        }
        div.first_screen_button{
            position: absolute;
            left: 50%;
            bottom: 100px;
            transform: translateX(-50%);
            z-index: 5;
        }
        div.banner_box{
            height: 650px;
            display: flex;
            justify-content: center;
        }
    }
    img.banner_layer1{
        height: 100%;
        z-index: 0;          
    }
    img.banner_layer2{
        position: absolute;
        top:30%;
        // left: 19%;
        // transform: translateX(-50%);
        height: 250px;
        z-index: 1;          
    }
    img.banner_layer3{
        position: absolute;
        top:38%;
        // left: 50%;
        // transform: translateX(-50%);
        height: 400px;
        z-index: 2;          
    }
    img.background_img{
        height: 80px;
        // width: 1200px;
        z-index: 2;  
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
    }

    // 第二屏second_screen
    div.second_screen{
        margin-top: 0px;
        background-color: #F7EDD4;
        display: flex;
        justify-content: center;
    }
    div#second_box{
        max-width: 1200px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        position: relative;
        margin: 0;
        margin-top: 10px;
        margin-bottom: 50px;
        //向下箭頭
        div.downarrow{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            width: 100px;
            height: 100px;
            margin: auto 0;
            margin-bottom: 60px;
            span.arrow{
                display: block;
                width: 18px;
                height: 18px;
                border-bottom: 3px solid #707070;
                border-right: 3px solid #707070;
                border-radius: 3px;
                transform: rotate(45deg);
                margin: -5px;
                background: transparent;
                animation-name: down;
                animation-duration: 2s;
                animation-iteration-count: infinite;
            }
        }
        div.second_title{
            display: flex;
            justify-content: center;
        }
        div.second_content{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            position: relative;
            div.about_img{
                height: 300px;
                margin-right: 50px;
                img#logo{
                    height: 100%;
                }
                img#shiny1{
                    height: 20px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 100px;
                    left: 10px;
                }
                img#shiny2{
                    height: 10px;
                    position: absolute;
                    transform: rotate(-30deg);
                    top: 125px;
                    left: 10px;
                }
                img#shiny3{
                    height: 15px;
                    position: absolute;
                    transform: rotate(15deg);
                    top: 120px;
                    left: 30px;
                }
                img#shiny4{
                    height: 15px;
                    position: absolute;
                    transform: rotate(20deg);
                    top: 200px;
                    left: 15px;
                }
                img#shiny5{
                    height: 10px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 200px;
                    left: 0px;
                }
                img#shiny6{
                    height: 10px;
                    position: absolute;
                    transform: rotate(15deg);
                    top: 190px;
                    left: 210px;
                }
                img#shiny7{
                    height: 13px;
                    position: absolute;
                    transform: rotate(30deg);
                    top: 150px;
                    left: 230px;
                }
                img#shiny8{
                    height: 18px;
                    position: absolute;
                    transform: rotate(-15deg);
                    top: 130px;
                    left: 215px;
                }
            }
            div.about_text{
                color: #515151;
                line-height: 28px;
            }
        }
    }

    @media all and (max-width: 768px){

        div#second_box{
            div.second_content{
                margin-left: 40px;
                margin-right: 40px;
                flex-direction: column;
            }
        }
    }

    // 第三屏third_screen
    div.third_screen{
        background-color: #F7EDD4;
        display: flex;
        justify-content: center;
        align-content: center;
        padding: 80px 0px;
        div.vote_box{
            width: 1120px;
            height: 520px;
            border-radius: 5px;
            background-image: url("../assets/images/index_kitchen_img.png");
            background-size: 100%;
            box-shadow: 2px 2px 10px 0 rgba(0, 0, 0, 0.3);
        }
    }

    // 第四屏fourth_scree
    div.fourth_screen{
        margin: 60px 0px;
        display: flex;
        justify-content: center;
        align-content: center;
    }
    div.fourth_box{
        display: flex;
        max-width: 1200px;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        div.fourth_title{
            margin-bottom: 40px;
        }
        div.fourth_card{
            display:grid;
            gap: 80px 35px;
            // grid-template-columns: repeat(auto-fill,minmax(260px,1fr));
            grid-template: repeat(2, 1fr) / repeat(3, 1fr);
        }
    }

    // 第五屏fifth_screen
    div.fifth_screen{
        display: flex;
        justify-content: center;
        //第五屏文字設定
        color: #515151;
        line-height: 28px;
    }
    div#fifth_box{
        max-width: 1200px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 100px 60px;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin: 0;
        margin-top: 50px;
        margin-bottom: 50px;
        div.fifth_title{
            display: flex;
            justify-content: center;
            grid-column: 1/5;
        }
        div.first_knowledge_img{
            position: relative;
            display: flex;
            justify-content: center;
            // justify-content: space-between;
            grid-column: 1/3;
            overflow: hidden;
            max-height: 500px;
            max-width: 500px;
            // border-radius: 50% 60% 50% 40%;
            // animation
            animation-name: movRradius;
            animation-duration: 8s;
            animation-iteration-count: infinite;
            animation-direction: alternate-reverse;

            img{
                height: 500px;
            }
            button.first_knowledge_button{
                position: absolute;
                right: 35px;
                bottom: 35px;
                width: 120px;
                height: 120px;
                // border-radius: 5px;
                background-color: #f4e9c9;
                color: #515151;
                font-size: 24px;
                border: none;
                box-shadow: $shadow;
                transition: 0.2s;
                 // animation
                animation-name: movButton;
                animation-duration: 8s;
                animation-iteration-count: infinite;
                animation-direction: alternate-reverse;
                &:hover {
                    background-color: #dfb9b0;
                    cursor: pointer;
                    transform: translateY(-5px);
                }
            }
        }
        div.first_knowledge_text{
            grid-column: 3/5;
            h2{
                margin-bottom: 10px;
            }
            h3{
                margin-top: 0px;
            }
            hr{
                color: #515151;
            }
        }
        div.second_knowledge_text{
            grid-column: 1/2;
            h2{
                margin-bottom: 10px;
            }
            h3{
                margin-top: 0px;
            }
            hr{
                color: #515151;
            }
        }
        div.second_knowledge_img{
            display: flex;
            justify-content: center;
            grid-column: 2/5;
            overflow: hidden;
            max-height: 500px;
            max-width: 880px;
            animation-name: movRradius2;
            animation-duration: 8s;
            animation-iteration-count: infinite;
            animation-direction: alternate-reverse;
            img{
                height: 500px;
                // border-radius: 5px;
            }
        }
        div.third_knowledge_img{
            position: relative;
            display: flex;
            justify-content: center;
            grid-column: 1/3;
            overflow: hidden;
            max-height: 500px;
            max-width: 500px;
            // animation
            animation-name: movRradius3;
            animation-duration: 8s;
            animation-iteration-count: infinite;
            animation-direction: alternate-reverse;
            button.third_knowledge_button{
                position: absolute;
                right: 35px;
                bottom: 35px;
                width: 120px;
                height: 120px;
                // border-radius: 5px;
                background-color: #f4e9c9;
                color: #515151;
                font-size: 24px;
                border: none;
                box-shadow: $shadow;
                transition: 0.2s;
                 // animation
                animation-name: movButton;
                animation-duration: 8s;
                animation-iteration-count: infinite;
                animation-direction: alternate-reverse;
                &:hover {
                    background-color: #dfb9b0;
                    cursor: pointer;
                    transform: translateY(-5px);
                }
            }
            img{
                height: 500px;
            }
        }
        div.third_knowledge_text{
            grid-column: 3/5;
            h2{
                margin-bottom: 10px;
            }
            h3{
                margin-top: 0px;
            }
            hr{
                color: #515151;
            }
        }
    }

    @media all and (max-width: 768px){
        div#fifth_box{
            margin-left: 40px;
            margin-right: 40px;
            div.first_knowledge_img{
                grid-column: 1/5;
                order:1;
            }
            div.first_knowledge_text{
                grid-column: 1/5;
                order:2;
            }
            div.second_knowledge_img{
                grid-column: 1/5;
                order:3;
            }
            div.second_knowledge_text{
                grid-column: 1/5;
                order:4;
            }
            div.third_knowledge_img{
                grid-column: 1/5;
                order:5;
            }
            div.third_knowledge_text{
                grid-column: 1/5;
                order:6;
            }
        }
    }

    // 第一屏 副標題 animation
    @keyframes movSubtitle {
        0%{
            transform: rotate(-5deg) translate(-50% , 50px);
        }
        100%{
            transform: rotate(5deg) translate(-50% , 50px);
        }
    }

    // 向下箭頭 animation
    @keyframes down{

        0% {
            opacity: 0;
            transform: rotate(45deg) translate(-15px, -15px);
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: rotate(45deg) translate(15px, 15px);
        }
    }

    // 第五屏fifth_screen animation
    @keyframes movRradius {
        0%{
            border-radius: 50% 60% 150px 70%;
        }
        33%{
            border-radius: 60% 50% 150px 50%;
        }
        66%{
            border-radius: 70% 60% 150px 60%;
        }
        100%{
            border-radius: 55% 70% 150px 50%;
        }
    }
    @keyframes movButton {
        0%{
            border-radius: 50% 60% 50% 70%;
            background-color: #f4e9c9;
        }
        33%{
            border-radius: 60% 50% 40% 50%;
            background-color: #fae9b3;
        }
        66%{
            border-radius: 70% 60% 55% 60%;
            background-color: #dfb9b0;
        }
        100%{
            border-radius: 55% 70% 60% 50%;
            background-color: #d3aba2;
        }
    }
    
    // 第五屏second_screen animation
    @keyframes movRradius2 {
        0%{
            border-radius: 50% 60% 70% 65%;
        }
        33%{
            border-radius: 65% 60% 55% 50%;
        }
        66%{
            border-radius: 65% 60% 70% 55%;
        }
        100%{
            border-radius: 70% 65% 65% 50%;
        }
    }

    // 第五屏third_screen animation
     @keyframes movRradius3 {
        0%{
            border-radius: 50% 60% 150px 70%;
        }
        33%{
            border-radius: 60% 50% 150px 50%;
        }
        66%{
            border-radius: 70% 60% 150px 60%;
        }
        100%{
            border-radius: 55% 70% 150px 50%;
        }
    }
</style>