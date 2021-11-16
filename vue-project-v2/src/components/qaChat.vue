<template>
    <div>
        <section id="qa_chat">
            <div id="qa_titlebar">
                <img src="../assets/images/cho_cake.jpg" alt="">
                <h1>文字客服</h1>
            </div>
            <div id="qa_chatbox">
                <div id="qa_chatbox_bg">
                    <div class="textarea">
                        <img src="../assets/images/cho_cake.jpg" alt="">
                        <p>我的訂單有問題，我要湊齊三個</p>
                    </div>
                    <div class="textarea2">
                        <p>哪裡有問題呢?</p>
                        <img src="../assets/images/cho_cake.jpg" alt="">
                    </div>
                </div>
            </div>
            <div id="qa_chat_answerbar">
                <input placeholder="請輸入問題" id="qa_answer_input">
                <button id="qa_answer_input_button">發送</button>
            </div>
        </section>
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "./title_h1.vue"
import search_bar from "./search_bar.vue"
export default {
    name:'qaChat',
    components:{
        titleh1,
        headercom,
        footercom,
        search_bar,
    },
    data(){
        return{
            asd:123546
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
#qa_chat{
    background-color: $lightYellow;
    max-width: 400px;
    width: 100%;
    height: 350px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    // justify-content: center;
    align-items: center;
    #qa_titlebar{
        max-width: 360px;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        // margin-top:  20px;
        img{
            margin-left: 20px;
            width: 30px;
            height: 30px;
            object-fit: cover;
        }
        h1{
            font-size: $h4;
            color: black;
        }
    }
    #qa_chatbox{
        display: flex;
        background-color: white;
        width: 90%;
        max-width: 350px;
        height: 350px;
        margin: auto;
        justify-content: center;
        border-radius: 10px;
        p{
            font-size: $p;
        }
        img{
            margin-left: 20px;
            width: 20px;
            height: 20px;
            object-fit: cover;
        }
        #qa_chatbox_bg{
            display: flex;
            flex-direction: column;
            // justify-content: flex-start;
            align-items: center;
            width: 100%;
            .textarea{
                display: flex;
                justify-content: flex-end;
                align-items: center;
                width: 95%;
                p{
                    // margin-right: 30px;
                }
                img{
                    margin-right: 20px;
                    width: 20px;
                    height: 20px;
                    object-fit: cover;
                }
            }
            .textarea2{
                margin-top: 20px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                max-width: 400px;
                width: 95%;
                // margin: auto;
                p{
                    // margin-left: 30px;
                }
                img{
                    margin-left: 20px;
                    width: 20px;
                    height: 20px;
                    object-fit: cover;
                }
            }
        }
    }
    #qa_chat_answerbar{
        max-width: 500px;
        width: 90%;
        height: 40px;
        margin-top: 20px;
        display: flex;
        margin-bottom: 20px;
        #qa_answer_input{
            border: 0;
            height: 40px;
            background-color: white;
            border-radius: 5px 0 0 5px;
            width: 250px;
            &:focus{
                border: 1px solid $darkGrey;
            }
        }
        #qa_answer_input_button{
            width: 30%;
            height: 40px;
            background-color: $palePike;
            font-size: $h4;
            border: 0;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            &:hover{
                color: $lightYellow;
            }
        }
    }
}
</style>