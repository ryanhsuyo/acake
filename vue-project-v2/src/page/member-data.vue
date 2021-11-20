<template>
    <div>
        

    <div id="main-bar-img"></div>

    <!-- header here  -->
    <headercomp></headercomp>

    <main id="member_data_page">

        <!-- 會員頁共用main_bar組件 -->
        <member_main_bar :page="page"></member_main_bar>
        
        <section id="member_name_block">
            <form action="" method="post">
                <div id="member_name">
                    <span>姓名: </span>
                    <input type="text" name="userName" class="data-input" v-model="userName" v-show="!edit.userName">
                    <span class="data_input_span" v-show="edit.userName">{{userName}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userName" @click="edit.userName = !edit.userName">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userName" @click="edit.userName = !edit.userName; updateData(); resetInputSize($event)">
                </div>
                <div id="member_nickname">
                    <span>暱稱: </span>
                    <input type="text" name="userNickname" class="data-input" v-model="userNickname" v-show="!edit.userNickname">
                    <span class="data_input_span" v-show="edit.userNickname">{{userNickname}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userNickname" @click="edit.userNickname = !edit.userNickname">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userNickname" @click="edit.userNickname = !edit.userNickname; updateData(); resetInputSize($event)">
                </div>
                <div id="member_birthday">
                    <span>生日: </span>
                    <input type="text" name="userBirthdayYear" class="data-input  input_combined_three" v-model="userBirthdayYear" v-show="!edit.userBirthday">
                    <input type="text" name="userBirthdayMonth" class="data-input  input_combined_three" v-model="userBirthdayMonth" v-show="!edit.userBirthday">
                    <input type="text" name="userBirthdayDate" class="data-input  input_combined_three" v-model="userBirthdayDate" v-show="!edit.userBirthday">
                    <span class="data_input_span" v-show="edit.userBirthday">{{userBirthday}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userBirthday"
                    @click="edit.userBirthday = !edit.userBirthday">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userBirthday" @click="edit.userBirthday = !edit.userBirthday; updateData()">
                </div>
            </form>
        </section>

        <section id="member_data_block">
            <form action="" method="post">
                <div id="member_email">
                    <span>E-mail: </span>
                    <input type="email" name="userEmail" class="data-input" v-model="userEmail" v-show="!edit.userEmail">
                    <span class="data_input_span" v-show="edit.userEmail">{{userEmail}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userEmail" 
                    @click="edit.userEmail = !edit.userEmail">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userEmail" @click="edit.userEmail = !edit.userEmail; updateData(); resetInputSize($event)">
                </div>
                <div id="member_address">
                    <span>地址:&nbsp;</span>
                    <input type="text" name="userAddress" class="data-input" v-model="userAddress" v-show="!edit.userAddress">
                    <span class="data_input_span" v-show="edit.userAddress">{{userAddress}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userAddress" @click="edit.userAddress = !edit.userAddress">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userAddress" @click="edit.userAddress = !edit.userAddress; updateData(); resetInputSize($event)">
                </div>
                <div id="member_phone">
                    <span>電話:&nbsp;</span>
                    <input type="text" name="userPhone" class="data-input" v-model="userPhone" v-show="!edit.userPhone">
                    <span class="data_input_span" v-show="edit.userPhone">{{userPhone}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userPhone"
                    @click="edit.userPhone = !edit.userPhone">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userPhone" @click="edit.userPhone = !edit.userPhone; updateData(); resetInputSize($event)">
                </div>
                <div id="member_password">
                    <span>密碼:&nbsp;</span>
                    <input type="text" name="userPassword" class="data-input" v-model="userPassword" v-show="!edit.userPassword">
                    <span class="data_input_span" v-show="edit.userPassword">{{userPassword}}</span>
                    <img src="../assets/images/pen_icon.svg" v-show="edit.userPassword" @click="edit.userPassword = !edit.userPassword">
                    <img src="../assets/images/yes_icon.svg" v-show="!edit.userPassword" @click="edit.userPassword = !edit.userPassword; updateData(); resetInputSize($event)">
                </div>
            </form>
        </section>

        <section id="cake_design">

            <!-- h1組件 -->
            <div class="title_h1_container_design">
                <title_h1 :title="titleDesign" class="title_h1"></title_h1>
            </div>

            <div id="cake_design_cards">

                <div class="card_outline" v-for="(item, index) in cakeDesignsShowing" :key="index">
                    <div class="img_container">
                        <img :src="item.imgPath">
                    </div>
                    <div class="description_block">
                        <h4 class="cake_title">{{item.cakeTitle}}</h4>
                        <p class="design_idea">{{item.cakeDescription}}</p>
                        <div class="status_area">
                            <div class="verify">
                                <font-awesome-icon icon="fa-solid fa-circle" class="status_ball_pass" v-show="item.voteStatus === '1'"/>
                                <span class="status_text_pass" v-show="item.voteStatus === '1'">人氣投票審核通過</span>
                                <font-awesome-icon icon="fa-solid fa-circle" class="status_ball_making" v-show="item.voteStatus === '2'"/>
                                <span class="status_text_making" v-show="item.voteStatus === '2'">蛋糕製作中</span>
                            </div>
                            <button class="checking" @click="showDesignDetail(item)">
                                查看
                                <font-awesome-icon icon="fa-solid fa-magnifying-glass" class="scope_icon" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 排版用重複組件開始 -->

                <!-- <div class="card_outline">
                    <div class="img_container">
                        <img src="../assets/images/cho_cake.jpg">
                    </div>
                    <div class="description_block">
                        <h4 class="cake_title">無敵大蛋糕</h4>
                        <p class="design_idea">內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文</p>
                        <div class="status_area">
                            <div class="verify">
                                <font-awesome-icon icon="fa-solid fa-circle" class="status_ball"/>
                                <span class="status_text">人氣投票審核通過</span>
                            </div>
                            <button class="checking">
                                查看
                                <font-awesome-icon icon="fa-solid fa-magnifying-glass" class="scope_icon" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card_outline">
                    <div class="img_container">
                        <img src="../assets/images/cho_cake.jpg">
                    </div>
                    <div class="description_block">
                        <h4 class="cake_title">無敵大蛋糕</h4>
                        <p class="design_idea">內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文內文</p>
                        <div class="status_area">
                            <div class="verify">
                                <font-awesome-icon icon="fa-solid fa-circle" class="status_ball"/>
                                <span class="status_text">人氣投票審核通過</span>
                            </div>
                            <button class="checking">
                                查看
                                <font-awesome-icon icon="fa-solid fa-magnifying-glass" class="scope_icon" />
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- 排版用重複組件結束 -->

            </div>

            <div id="view_all_design_area">
                <button id="view_all_design_button" @click="showAllDesign = true; viewDesignButton = false" v-show="viewDesignButton">查看全部</button>
            </div>

            <!-- 卡片詳細頁的light box -->
            <div class="card_light_box" v-show="detailLightBox" @click.self="closeDesignDetail(false)">
                <card_design_detail @close="closeDesignDetail" :designDetail="designDetail" @cakeDesign="changeDesignContent"></card_design_detail>
            </div>

        </section>

        <section id="coupon_block">

            <!-- h1組件 -->
            <div class="title_h1_container_coupon">
                <title_h1 :title="titleCoupon" class="title_h1"></title_h1>
            </div>

            <div id="coupon_area">

                <div class="coupon" v-for="(item, index) in couponShowing" :key="index">
                    <div class="coupon_left_block">
                        <div class="discount_amout">$<span>{{item.discount}}</span></div>
                        <div class="A_cake_text_logo">
                            <img src="http://via.placeholder.com/60x22" alt="">
                        </div>
                        <div class="coupon_left_decoration_img">
                            <img src="http://via.placeholder.com/40x0" alt="">
                        </div>
                        <div class="use_threshold">消費滿&nbsp;<span>{{item.threshold}}</span>&nbsp;即可折抵</div>
                        <img class="bottom_decoration_img" src="../assets/images/snowRWD.svg">
                    </div>
                    <div class="coupon_right_block">
                        <div class="expiration">
                            <span>使用期限</span>
                            <span class="expiration_date">{{item.expiration}}</span>
                        </div>
                        <div class="coupon_right_decoration_img">
                            <img src="http://via.placeholder.com/39x39" alt="">
                        </div>
                        <div class="expiration_countdown">
                            即將失效：剩下&nbsp;<span>{{countDays(item.expirationForCal)}}</span>&nbsp;天
                        </div>
                    </div>
                </div>

                <!-- 排版用重複組件開始 -->
                <!-- <div class="coupon">
                    <div class="coupon_left_block">
                        <div class="discount_amout">$<span>150</span></div>
                        <div class="A_cake_text_logo">
                            <img src="http://via.placeholder.com/60x22" alt="">
                        </div>
                        <div class="coupon_left_decoration_img">
                            <img src="http://via.placeholder.com/40x0" alt="">
                        </div>
                        <div class="use_threshold">消費滿<span>1000</span>即可折抵</div>
                        <img class="bottom_decoration_img" src="../assets/images/snowRWD.svg">
                    </div>
                    <div class="coupon_right_block">
                        <div class="expiration">
                            <span>使用期限</span>
                            <span class="expiration_date">2021/10/31</span>
                        </div>
                        <div class="coupon_right_decoration_img">
                            <img src="http://via.placeholder.com/39x39" alt="">
                        </div>
                        <div class="expiration_countdown">
                            即將失效：剩下<span>10</span>天
                        </div>
                    </div>
                </div>
                <div class="coupon">
                    <div class="coupon_left_block">
                        <div class="discount_amout">$<span>150</span></div>
                        <div class="A_cake_text_logo">
                            <img src="http://via.placeholder.com/60x22" alt="">
                        </div>
                        <div class="coupon_left_decoration_img">
                            <img src="http://via.placeholder.com/40x0" alt="">
                        </div>
                        <div class="use_threshold">消費滿<span>1000</span>即可折抵</div>
                        <img class="bottom_decoration_img" src="../assets/images/snowRWD.svg">
                    </div>
                    <div class="coupon_right_block">
                        <div class="expiration">
                            <span>使用期限</span>
                            <span class="expiration_date">2021/10/31</span>
                        </div>
                        <div class="coupon_right_decoration_img">
                            <img src="http://via.placeholder.com/39x39" alt="">
                        </div>
                        <div class="expiration_countdown">
                            即將失效：剩下<span>10</span>天
                        </div>
                    </div>
                </div> -->
                <!-- 排版用重複組件結束 -->

            </div>

            <button id="view_all_coupon" @click="showAllCoupons = true; viewCouponButton = false" v-show="viewCouponButton">
                <font-awesome-icon icon="fa-solid fa-angles-down" id="arrow_down_icon" />
            </button>

        </section>

        <div id="bottom_snow_img">
            <img src="../assets/images/snowRWD.svg">
        </div>
        
    </main>

    <!-- footer here -->
    <footercomp></footercomp>

    </div>
</template>


<script>
    import headercomp from "../components/headercom";
    import footercomp from "../components/footercom";
    import axios from 'axios';
    import $ from 'jquery';
    import qs from "qs";

    import member_main_bar from "../components/member_main_bar";
    import title_h1 from "../components/title_h1";
    import card_design_detail from "../components/card_design_detail";

    export default {
        components: {
            headercomp,
            footercomp,
            member_main_bar,
            title_h1,
            card_design_detail,
        },
        data(){
            return{
                memberId: 1,    // 測試用暫時性資料

                page: "data",   // 頁面識別用

                // title_h1組件用(往下傳)
                titleDesign: "蛋糕庫設計",
                titleCoupon: "折價券",

                // 會員資料
                userName: "",
                userNickname: "",
                userBirthdayYear: "",
                userBirthdayMonth: "",
                userBirthdayDate: "",
                userEmail: "",
                userAddress: "",
                userPhone: "",
                userPassword: "",

                // 會員資料修改控制
                edit:{
                    userName: true,
                    userNickname: true,
                    userBirthday: true,
                    userEmail: true,
                    userAddress: true,
                    userPhone: true,
                    userPassword: true,
                },

                // 蛋糕設計資料
                cakeDesigns: [],
                showAllDesign: false,
                viewDesignButton: true,

                detailLightBox: false,
                designDetail: {},

                // 折價券資料
                couponData: [],
                showAllCoupons: false,
                viewCouponButton: true,
                
            };
        },
        methods: {
            switchBoolean(val){
                val = !val;
            },
            resetInputSize($event){

                // 被點擊時呼叫
                if($event){

                    $($event.target).siblings("input.data-input").css("width", parseInt($($event.target).siblings("span.data_input_span").css("width")) + 5);
                    $($event.target).siblings("input.data-input").css("height", parseInt($($event.target).siblings("span.data_input_span").css("height")) - 2);

                    return null;
                }

                // mounted時呼叫
                $("input.data-input").each(function(){
                    // console.log($(this).siblings("span.data_input_span").css("width"));
                    $(this).css("width", parseInt($(this).siblings("span.data_input_span").css("width")) + 5);
                    $(this).css("height", parseInt($(this).siblings("span.data_input_span").css("height")) - 2);
                    // console.log("/" + $(this).css("width"))
                 });
                $("input.data-input.input_combined_three").each(function(){
                    // console.log(parseInt($(this).siblings("span.data_input_span").css("width")) / 2.5);
                    $(this).css("width",parseInt($(this).siblings("span.data_input_span").css("width")) / 2.5);
                });
            },
            updateData($event){

                // 第一種拼資料的寫法：
                // let params = new URLSearchParams();
                // params.append('memberId', this.memberId );
                // params.append('inputValue', inputValue );
                // 第二種拼資料的寫法：
                // const params = {
                //     memberId: this.memberId,
                //     inputValue: inputValue,
                // };

                // 先拼好生日的資料再送出
                let birthday = "";
                let birthdayInputs = $("div#member_birthday").find("input.data-input");
                birthdayInputs.each(function(index){
                    birthday += this.value;
                    if(index !== birthdayInputs.length - 1){
                        birthday += "-";
                    }
                });
                // console.log(birthday);

                let inputValues = {
                    name: this.userName,
                    nickname: this.userNickname,
                    birthday: birthday,
                    email: this.userEmail,
                    address: this.userAddress,
                    phone: this.userPhone,
                    password: this.userPassword,
                    memberId: this.memberId,
                };

                axios.post("http://localhost/A_cake/updateMemberData.php", qs.stringify(inputValues))
                    // .then(res => {console.log(res);})
                    .catch(error => console.log(error));
            },
            showDesignDetail(cake){
                this.detailLightBox = true;
                $("body").css("overflow-y", "hidden");

                this.designDetail = {};
                axios.post("http://localhost/A_cake/selectCakeIngredient.php",qs.stringify({cakeID: cake.cakeID}))
                    .then(res => {
                        console.log(res);
                        let data = res["data"];
                        this.designDetail = {
                            cakeImg: require("../assets/images/" + data[0].CAKE_IMAGE),
                            cakeName: data[0].CAKE_NAME,
                            cakeDescription: data[0].CAKE_DESCRIPTION,
                            cakeAvailable: data[0].CAKE_AVAILABLE,
                            cakeID: data[0].CAKE_ID,
                            cakeIngredients: [],
                        };
                        for(let i = 0; i < data.length; i++){
                            let ingredients = {};
                            ingredients.ingredientName = data[i].INGREDIENT_NAME;
                            ingredients.ingredientDescription = data[i].INGREDIENT_DESCRIPTION;
                            ingredients.ingredientQuantity = data[i].QUANTITY
                            this.designDetail.cakeIngredients.push(ingredients);
                        }
                        // console.log(this.designDetail);
                    })
                    .catch(err => console.log(err));

            },
            closeDesignDetail(val){
                this.detailLightBox = val;
                $("body").css("overflow-y", "auto");
            },
            changeDesignContent(val, name){
                let index = this.cakeDesigns.map(item => item.cakeTitle).indexOf(name);
                this.cakeDesigns[index].cakeDescription = val;
            },
            countDays(expiration){
                let future = new Date(...expiration).getTime() / 1000;
                let now = new Date().getTime() / 1000;
                return Math.ceil((future - now) / 86400);
            },
            mobileCakeShowing(){
                if(window.innerWidth < 1200){
                    this.showAllDesign = true;
                    this.viewDesignButton = false;
                }
            },
        },
        computed: {
            userBirthday(){
                return this.userBirthdayYear + "/" + this.userBirthdayMonth + "/" + this.userBirthdayDate;
            },

            cakeDesignsShowing(){
                return this.showAllDesign ? this.cakeDesigns : this.cakeDesigns.slice(0, 3) ;
            },

            couponShowing(){
                return this.showAllCoupons ? this.couponData : this.couponData.slice(0, 2) ;
            },

        },
        mounted(){

            if(this.$store.state.member_id === 0 || typeof this.$store.state.member_id !== "number"){
                alert("您尚未登入，將跳轉到登入頁面");
                this.$router.push('/assign')
            }

            // 載入會員資料
            // 上傳filezilla用的路徑：./static/php/selectMemberData.php
            axios.post("http://localhost/A_cake/selectMemberData.php",qs.stringify({memberId: this.memberId}))
                    .then(res => {
                        // console.log(res);
                        let data = res.data[0];
                        this.userName = data["NAME"];
                        this.userNickname = data["NICKNAME"];
                        this.userBirthdayYear = data["BIRTHDAY"].split("-")[0];
                        this.userBirthdayMonth = data["BIRTHDAY"].split("-")[1];
                        this.userBirthdayDate = data["BIRTHDAY"].split("-")[2].split(" ")[0];
                        this.userEmail = data["EMAIL"];
                        this.userAddress = data["ADDRESS"];
                        this.userPhone = data["PHONE"];
                        this.userPassword = data["PASSWORD"];


                        // 調整會員資料輸入框大小
                        this.$nextTick(()=>{
                            this.resetInputSize();
                        });
                        
                    })
                    .catch(error => console.log(error));

            // 載入蛋糕設計資料
            axios.post("http://localhost/A_cake/selectCakeDesigns.php",qs.stringify({memberId: this.memberId}))
                    .then(res => {
                        // console.log(res);
                        let data = res["data"];
                        for(let i = 0; i < data.length; i++){
                            let cakeInfo = {
                                imgPath: require("../assets/images/" + data[i].CAKE_IMAGE),
                                cakeTitle: data[i].CAKE_NAME,
                                cakeDescription: data[i].CAKE_DESCRIPTION,
                                voteStatus: data[i].CAKE_AVAILABLE,
                                cakeID: data[i].CAKE_ID,
                                };

                            this.cakeDesigns.push(cakeInfo);

                            // 顯示所有蛋糕設計的按鈕
                            this.viewDesignButton = (this.cakeDesigns.length > 3 ? true : false);
                        }

                    })
                    .catch(err => {console.log(err)});


            // 載入折價券資料
            axios.post("http://localhost/A_cake/selectCoupons.php",qs.stringify({memberId: this.memberId}))
                    .then(res => {
                        // console.log(res);
                        let data = res["data"];
                        for(let i = 0; i < data.length; i++){
                            let couponInfo = {
                                discount: data[i].DISCOUNT_AMOUNT,
                                threshold: data[i].USE_THRESHOLD,
                                expirationForCal: data[i].EXPIRATION_DATE.split(" ")[0].split("-"),
                                expiration: data[i].EXPIRATION_DATE.split(" ")[0].replace(/-/g, "/"),
                            };

                            this.couponData.push(couponInfo);

                            // 顯示所有折價券的按鈕
                            this.viewCouponButton = (this.couponData.length > 2 ? true : false);
                        }
                    })
                    .catch(err => console.log(err));
            
            // 監聽視窗大小以控制顯示按鈕、蛋糕資料的出現或隱藏
            window.addEventListener("resize", this.mobileCakeShowing);
            // 載入時先執行一次檢查視窗寬度
            this.mobileCakeShowing();

        },
    }
// span套用字體後寬度似乎會變，jQuery抓到的是使用預設字體的寬度。
// 手機版時span標籤會變兩行，input的高度也會被影響
</script>


<style  scoped lang="scss">
@import "../assets/style/var.scss";


// ===== 頁面的scss開始 =====
#main-bar-img{
    height: 500px;
    background-image: url("../assets/images/background_img500.png");
    background-size: auto 100%;
    background-position: center center;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: -1;
}

#member_data_page{
    max-width: 1200px;
    min-width: 320px;
    margin: 0 auto;

    #member_name_block{
        width: 535px;
        font-size: 0px;
        margin: 40px auto 70px;
        color: $darkGrey;

        @media (max-width: 575.98px){
            width: auto;
            margin: 20px auto 30px;
        }

        > form{
            display: grid;
            grid-template-columns: 1fr 1fr 1.2fr;

            @media (max-width: 575.98px){
                display: flex;
                justify-content: space-between;
                flex-direction: column;
                align-items: center;
                height: 120px;
                width: 100vw;
            }

            #member_name{
                text-align: left;
            }

            #member_nickname{
                text-align: center;
            }

            #member_birthday{
                text-align: right;
            }

            span{
                font-size: $h4;
            }

            .data-input{
                border: 1px solid #515151;
                outline: none;
                font-size: $h4;
                max-width: 298px;

                // display: none;
            }

            img{
                width: 20px;
                height: 20px;
                position: relative;
                top: 2.5px;
                cursor: pointer;
                margin-left: 7px;
            }

        }

    }

    #member_data_block{
        width: 93%;
        height: 250px;
        margin: 0 auto;
        padding-left: 100px;
        background-color: #F7EDD4;
        color: $darkGrey;
        border-radius: 5px;

        @media (max-width: 767.98px){
            padding-left: 50px;
        }

        @media (max-width: 575.98px){
            padding: 0 25px;
        }

        > form{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;

            > div{
                padding: 10px 0;

                span{
                    font-size: $h4;
                }

                img{
                    width: 20px;
                    height: 20px;
                    position: relative;
                    top: 2.5px;
                    cursor: pointer;
                }

                .data-input{
                    border: 1px solid #515151;
                    outline: none;
                    font-size: $h4;
                    max-width: 298px;

                    // display: none;
                }

            }

        }

    }

    #cake_design{
        text-align: center;
        padding: 0 40px;

        @media (max-width: 1198.98px){
            padding: 0;
        }

        .title_h1_container_design{
            margin: 0 auto;
            padding: 45px 0 50px;
        }

        #cake_design_cards{
            text-align: left;
            display: grid;
            grid-template-columns: 350px 350px 350px;
            grid-auto-rows: auto;

            @media (min-width: 1200px){
                grid-column-gap: 35px;
                grid-row-gap: 50px; // 要看XD再確認一下
            }            

            @media (max-width: 1199.98px){
                display: flex;
                justify-content: space-between;
                width: 100vw;
                overflow-x: scroll;
                padding: 0 0 10px;
                justify-content: flex-start;
            }

            .card_outline{
                box-shadow: $shadow;

                @media (max-width: 1199.98px){
                    margin: 0 17.5px;
                }

                .description_block{
                    
                    .cake_title{
                        margin: 15px 0;
                        text-align: left;
                        font-size: $h4;
                        line-height: 20px;
                        color: #515151;
                        font-weight: 400;
                    }

                    .design_idea{
                        margin: 0;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                        overflow: hidden;
                        font-size: $p;
                        line-height: 16px;
                        color: #515151;
                    }

                    .status_area{
                        display: flex;
                        justify-content: space-between;
                        align-items: flex-start;

                        .verify{
                            margin-top: 35px;
                            font-size: 0px;

                            .status_ball_pass{
                                vertical-align: middle;
                                font-size: $p;
                                margin-right: 3px;
                                color: #5A9308;
                            }

                            .status_text_pass{
                                font-size: 12px;
                                vertical-align: middle;
                                color: #5A9308;
                            }

                            .status_ball_making{
                                vertical-align: middle;
                                font-size: $p;
                                margin-right: 3px;
                                color: #5975B2;
                            }

                            .status_text_making{
                                font-size: 12px;
                                vertical-align: middle;
                                color: #5975B2;
                            }

                        }

                        .checking{
                            margin-top: 15px;
                            width: 180px;
                            height: 60px;
                            border-radius: 30px;
                            border: 0;
                            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
                            font-size: $h4;
                            position: relative;
                            color: $darkGrey;
                            cursor: pointer;
                            background-color: $lightPike;
                            &:hover{
                                background-color: $lightYellow;
                            }

                            .scope_icon{
                                position: absolute;
                                right: 15px;
                                top: 30px;
                                transform: translateY(-50%);
                            }

                        }

                    }

                }
            
            }

        }

        .card_light_box{
            position: fixed;
            width: 100vw;
            height: 100vh;
            z-index: 10000;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, .5);
            overflow-y: scroll;
        }

        #view_all_design_area{
            padding: 50px 0;

            @media (max-width: 1198.98px){
                height: 75px;
            }

            #view_all_design_button{
                width: 180px;
                height: 60px;
                background-color: $darkGrey;
                color: #FFFFFF;
                border: 0;
                outline: none;
                cursor: pointer;
                border-radius: 5px;
                font-size: $h3;
                box-shadow: $shadow;
                &:hover{
                    background-color: $lightYellow;
                    color: $darkGrey;
                }

                @media (max-width: 1198.98px){
                    display: none;
                }
                
            }
        }

    }

    #coupon_block{
        margin: 0 40px 32px;
        background-color: $palePike;
        border-radius: 5px;
        text-align: center;
        padding-bottom: 20px;

        @media (max-width: 474.98px){
            margin: 0 15px 32px;
        }

        .title_h1_container_coupon{
            margin: 0 auto;
            padding: 12px 0 15px;
        }

        #coupon_area{
            display: grid;
            grid-template-columns: auto auto;
            grid-auto-rows: auto;
            grid-row-gap: 40px;
            grid-column-gap: 30px;
            justify-items: center;
            padding: 0 40px;

            @media (max-width: 1029.98px){
                grid-template-columns: auto;
            }

            @media (max-width: 575.98px){
                grid-template-columns: 100%;
                grid-auto-rows: 112.5px;
                grid-row-gap: 25px;
            }

            @media (max-width: 474.98px){
                padding: 0 15px;
            }

            .coupon{
                display: inline-flex;

                .coupon_left_block{
                    width: 300px;
                    height: 150px;
                    background-color: #F0D5CE;
                    position: relative;
                    border-right: 1px solid $palePike;
                    border-top-left-radius: 5px;

                    .discount_amout{
                        font-size: 50px;
                        line-height: 56px;
                        position: absolute;
                        top: 19px;
                        left: 27px;
                        color: #515151;
                    }

                    .A_cake_text_logo{
                        width: 60px;
                        height: 22px;
                        position: absolute;
                        top: 33px;
                        right: 34px;
                        overflow: hidden;

                        // border: 1px solid blue;

                        > img{
                            width: 100%;
                        }

                        > span{
                            font-size: 5px;
                            line-height: 4px;
                            color: #515151
                        }

                    }

                    .coupon_left_decoration_img{
                        // 此處樣式未確定
                        position: absolute;
                        left: 27px;
                        bottom: 20px;
                    }

                    .use_threshold{
                        font-size: $p;
                        color: #515151;
                        position: absolute;
                        bottom: 30px;
                        right: 34px;
                    }

                    .bottom_decoration_img{
                        width: 100%;
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        transform: rotate(180deg);
                    }

                    > svg{
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        transform: rotate(180deg);
                    }

                }

                .coupon_right_block{
                    background-color: #F7EDD4;
                    position: relative;
                    width: 120px;
                    height: 150px;
                    border-bottom-right-radius: 5px;

                    &::after{
                        content: "";
                        display: inline-block;
                        width: 42px;
                        height: 42px;
                        position: absolute;
                        top: 0;
                        right: 0;
                        background-image: linear-gradient(45deg, #EFDCAC 50%, $palePike 50%);
                        border-bottom-left-radius: 5px;
                    }

                    .expiration{
                        width: 80px;
                        height: 31px;
                        position: absolute;
                        top: 30px;
                        left: 20px;
                        display: flex;
                        flex-direction: column;

                        > span:first-child{
                            align-self: flex-start;
                            font-size: 12px;
                            transform: scale(0.83);
                            transform-origin:center left;
                            line-height: 14px;
                            color: #515151;
                            margin-bottom: 3px;
                        }

                        .expiration_date{
                            align-self: flex-end;
                            font-size: 12px;
                            line-height: 14px;
                            color: #515151;
                        }

                    }

                    .coupon_right_decoration_img{
                        position: absolute;
                        top: 65px;
                        left: 10px;
                        width: 39px;
                        height: 39px;
                        overflow: hidden;

                        > img{
                            width: 100%;
                        }

                    }

                    .expiration_countdown{
                        color: #E8542E;
                        font-size: 12px;
                        white-space: nowrap;
                        transform: scale(.6);
                        transform-origin:center left;
                        position: absolute;
                        line-height: 10px;
                        left: 28px;
                        bottom: 32px;
                    }

                }

                @media (min-width: 1029.98px){
                // 排版上一列有兩個時用的設定
                    &:nth-child(2n){
                        justify-self: start;
                    }

                    &:nth-child(2n + 1){
                        justify-self: end;
                    }
                }

                @media (max-width: 575.98px){
                    // 手機版
                    transform-origin: center top;
                    transform: scale(.75);
                }

            }

        }

        #view_all_coupon{
            display: inline-block;
            width: 40px;
            height: 36px;
            background-color: transparent;
            padding: 0;
            border: 0;
            outline: none;
            font-size: 0;
            text-align: center;
            cursor: pointer;
            margin-top: 15px;

            #arrow_down_icon{
                display: inline-block;
                font-size: 34px;
                line-height: 3px;
            }
            
        }

    }

    #bottom_snow_img{
        display: block;
        width: 100vw;
        position: relative;
        left: 50%;
        transform: rotate(180deg) translateX(50%);
        overflow: hidden;

        > img{
            min-width: 1200px;
        }

    }

}

//
// 折價券左下圖案樣式未定

// ===== 頁面的scss結束 =====



// ===== card_voting的scss開始 =====
.card_outline{
    box-sizing: border-box;

    background-color: #DFB9B0;
    width: 350px;
    height: 480px;
    padding: 25px;
    border-radius: 5px;
    box-shadow: $shadow;

    .img_container{
        overflow: hidden;
        width: 300px;
        height: 300px;
        margin: 0 auto;

        img{
            height: 100%;
            width: 100%;
        }

    }

    .down_block{
        .cake_title{
            margin: 15px 0;
            text-align: left;
            font-size: 20px;
            line-height: 20px;
            color: #515151;
            font-weight: 400;
        }
        .design_idea{
            margin: 0;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 16px;
            line-height: 16px;
            color: #515151;

        }
        .voting_area{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            .voting_num{
                margin-top: 35px;
                .heart_icon{
                    @extend %heart_icon;
                }
                .num{
                    font-size: 20px;
                    vertical-align: top;
                    line-height: 25px;
                    color: #515151;
                }
            }
            .voting{
                margin-top: 15px;
                width: 180px;
                height: 60px;
                border-radius: 100px;
                border: 0;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
                font-size: 20px;
                position: relative;
                color: #515151;
                cursor: pointer;
                background-color: #EFE6E4;
                &:hover{
                    background-color: #F4E9C9;
                }
                &:active{
                    span{
                        background-image: url('../assets/images/favorites_icon_h_1.svg');
                    }
                }
                span{
                    @extend %heart_icon;
                    position: absolute;
                    right: 15px;
                    top: 30px;
                    transform: translateY(-50%);
                }
            }
        }
    }
}

// 設定愛心的背景圖
%heart_icon{
    background-image: url('../assets/images/favorites_icon_1.svg');
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center center;
    display: inline-block;
    height: 22px;
    width: 22px;
}
section#vote{
    width:100%;
    max-width:1120px;
    margin:0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(300px,1fr));
    gap:70px 35px;
    justify-content: space-between;
    margin-bottom:80px;
    .card_outline{
        width:100%;
        max-width: 350px;
        margin:0 auto;
        .img_container{
            width:100%;
            height:auto;
        }
    }
    
}
// ===== card_voting的scss結束 =====

</style>