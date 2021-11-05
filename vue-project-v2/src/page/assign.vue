<template>
    <div>
        <headercom></headercom>
        <div class="assign_page_main_bar" style="width:100%;maxWidth:1200px;margin:0 auto;">
            <div class="assign_page_title_h1_outline">
                <div id="signinTitle">
                <titleh1 title="Sign in"></titleh1>
                </div>
                <div id="registerTitle">
                <titleh1 title="Register"></titleh1>
                </div>
                <div id="newTitle">
                <titleh1 title="Sign in/Register"  @click.native="change"></titleh1>
                </div>
                
            </div>
        </div>
        <main id="assign_page_main" >
            <!-- 登入區塊 -->
            <section id="sign_in">
                <span>
                <span class="position">
                <label for="account">帳號 </label>
                <input type="text" id="account" placeholder="請輸入帳號" v-model.lazy="account" />
                <span class="wrong" :class="{'open':accountSuccess}">*需輸入英、數字，介於5~10字之間</span>
                </span>
                <span class="position">
                <label for="password">密碼 </label>
                <input type="password" id="password" placeholder="請輸入密碼" v-model.lazy="password" />
                <span class="wrong" :class="{'open':passwordSuccess}">*需輸入英、數字，介於5~10字之間</span>
                </span>
                <span><a href="#">忘記密碼</a></span>
                <button class="sign_button check">SIGN IN</button>
                <button class="sign_button">以Instagram登入<font-awesome-icon icon="fa-brands fa-instagram" /></button>
                <button class="sign_button">以LINE帳號登入<font-awesome-icon icon="fa-brands fa-line" /></button>
                <button class="sign_button">以Google登入<font-awesome-icon icon="fa-brands fa-google" /></button>
                </span>
            </section>
            <!-- 註冊區塊 -->
            <section id="register" class="close">
                <span  >
                <span class="position">
                <label for="email">Email </label >
                <span class="wrong" :class="{'open':emailSuccess}">信箱格式錯誤</span>
                </span>
                <input type="text" id="email" placeholder="請輸入Email" v-model.lazy="email" />
                <span class="position">
                <label for="password">密碼 </label>
                <span class="wrong" :class="{'open': registPasswordSuccess}">*需輸入英、數字，介於5~10字之間</span>
                </span>
                <input type="password" id="password" placeholder="請輸入密碼" v-model.lazy="registPassword" />
                <span class="position">
                <label for="re_password">確認密碼 </label>
                <span class="wrong" :class="{'open':confirmPasswordSuccess}">需與密碼相同</span>
                </span>
                <input type="password" id="re_password" placeholder="請重複輸入密碼" v-model.lazy="confirmPassword" />
                <span class="position">
                <label for="user_name">姓名 </label>
                <span class="wrong" :class="{'open':nameSuccess}">請輸入您的姓名</span>
                </span>
                <input type="text" id="user_name" placeholder="請輸入姓名"  v-model.lazy="name"/>
                <label>生日</label>
                <div  id="birthday">
                <select name="" id="years">
                    <option value="">1999</option>
                    <option value="">2000</option>
                </select>
                <select name="" id="months">
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
                <select name="" id="days">
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
                </div>
                <button class="sign_button check">SIGN UP</button>
                </span>
            </section>
        </main>
        <footercom></footercom>
        
    </div>
</template>
<script>
import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
    import titleh1 from "../components/title_h1.vue";
export default {
    name:'assignPage',
    components:{
        titleh1,
        headercom,
        footercom,
    },
    data(){  
        return{
            account:'',
            password:'',
            email:'',
            registPassword:'',
            confirmPassword:'',
            name:'',
            accountSuccess:false,
            passwordSuccess:false,
            emailSuccess:false,
            registPasswordSuccess:false,
            confirmPasswordSuccess:false,
            nameSuccess:false,
        }
    },
    methods:{
        change(){
            if($("#sign_in").hasClass("close")){
                $("#sign_in").removeClass('close');
                $("#register").addClass('close');
            }else{
                // console.log($ ("#register").hasClass('close'))
                $("#sign_in").addClass('close');
                $("#register").removeClass('close');
            }
        }
    },
    watch:{
        account:function(newValue){
            
            this.accountSuccess =!(/^[a-zA-Z0-9_]{5,10}$/.test(newValue))
        },
        password:function(newValue){
            this.passwordSuccess =!( /^[a-zA-Z0-9_]{5,10}$/.test(newValue))
        },
        email:function(newValue){
            this.emailSuccess = !(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/.test(newValue))
        },
        registPassword:function(newValue){
            this.registPasswordSuccess = !(/^[a-zA-Z0-9_]{5,10}$/.test(newValue))
        },
        confirmPassword:function(newValue){
            if(this.registPassword == this.confirmPassword){
                this.confirmPasswordSuccess = false
            }else{
                this.confirmPasswordSuccess =true
            }
        },
        name:function(newValue){
            this.nameSuccess = !(/^[a-zA-Z0-9_]{5,10}$/.test(newValue))
        },
        
        
    },
    computed:{
        

    },
    mounted(){
        if($(window).innerWidth() > 576){
            $('#newTitle').hide();
        }
       $(window).bind('resize',function(){
           if($(window).innerWidth() < 604){
               $('#signinTitle').addClass('close');
               $('#registerTitle').addClass('close');
               $('#newTitle').show();
           }else{
               $('#signinTitle').removeClass('close');
               $('#registerTitle').removeClass('close');
               $('#newTitle').hide();
           }
       })
    },

    
}

</script>
<style scoped lang="scss">
@import "../assets/style/var.scss";
*{
    box-sizing: border-box;
}
$bg:#EFE6E4;
body{
    background-color: $bg;
}
.assign_page_title_h1_outline{
    width:100%;
    padding:0 40px;
    max-width:1200px;
    margin:50px auto 0;
    display: flex;
    // border:1px solid blue;
    >div{
        flex:1;
        margin-top: 70px;
        margin-bottom:100px;
        span{
            display: none;
        }
    }
}
#assign_page_main{
    width:100%;
    max-width:1200px;
    gap:20px;
    padding:0 40px;
    margin:0 auto 50px;
    display:grid;
    grid-template-columns: 1fr 1fr;
    .position{
        position:relative;
        .wrong{
            position:absolute;
            white-space: nowrap;
            top:66px;
            left:0;
            font-size:12px;
            color:red;
            display:none
        }
        .wrong.open{
            display:inline-block
        }
    }
    section{
        // border:1px solid red;
        // margin-left:40px;
        display:flex;
        flex-direction: column;
        color:#515151;
        label{
            font-size: 20px;
            margin-bottom:5px;
            width:100%;
        }
        input{
            font-size: 20px;
            margin-bottom:10px;
            height:45px;
            border-radius: 5px;
            width:100%;
            color:#515151;
            background: white;
            border:none;
            &:focus{
            border:1px solid #515151
        }
        }
    }
    button{
        height:55px;
        border-radius: 5px;
        background-color:#F7EDD4;
        border:none;
        box-shadow: $shadow;
        width:100%;
        margin-top: 20px;
        font-size: 20px;
        color:#515151;
        
        &:hover{
            cursor: pointer;
            background-color: #DFB9B0;
        }
    }
    button.check{
        background-color: #DFB9B0;
    }
    #sign_in{
        a{
            display:inline-block;
            font-size: 14px;
            text-decoration: none;
            color:#515151;
            &:hover{
                color:blue;
            }
        }
        button:nth-child(6){
            margin-top:13px;
        }
    }
    
    #register{
        #birthday{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap:10px;
        }
        select{
            width:100%;
            height:45px;
            border-radius: 5px;
            border:none;
            background: white;
            &:focus{
                border:1px solid #515151;
            }
            option{
                text-align: center;
                width:100%;
                border:none;
            }
        }
    }
    
}
@media (max-width:620px){
    #assign_page_main{
        grid-template-columns: 1fr;
        section{
            margin:0 auto;
            width:100%;
        }
    }
    .assign_page_title_h1_outline{
        #signinTitle{
            display: none;
            justify-content: center;
            align-items: center;
            // margin-bottom:30px;
        }
        #registerTitle{
            display:none;
        }
        #newTitle{
            display:flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        
    
    }
    #assign_page_main{
        #register.close{
        display:none;
    }
        #sign_in.close{
            display:none;
        }
    }
    .close{
            display:none;
        }
    h1{
        white-space: nowrap;
    }
}
</style>