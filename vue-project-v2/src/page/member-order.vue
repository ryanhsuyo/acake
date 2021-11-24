<template>
    <div>


    <div id="main-bar-img"></div>

    <!-- header here  -->
    <headercomp></headercomp>

    <main id="member_order_page">

        <!-- 會員頁共用main_bar組件 -->
        <member_main_bar :page="page"></member_main_bar>

        <section id="title_h1_block">
            <!-- h1組件 -->
            <div class="title_h1_container">
                <title_h1 :title="title" class="title_h1"></title_h1>
            </div>
        </section>

        <section id="switch_tab_block">
            <switch_tab @switchTo="switchTo"></switch_tab>
        </section>

        <section id="filter_block">
            <form action="" method="post">
                <div id="select_block">
                    <select name="year" id="year" class="choose_date" v-model="yearSelected" @change="selectByDate">
                        <option value="-1" disabled selected>選擇年份</option>
                        <option value="0">不限年份</option>
                        <option :value="index" v-for="index in yearAvailable" :key="index">{{index}}年</option>
                    </select>
                    <select class="choose_date disabled_select" disabled v-show="yearSelected === -1">
                        <option>選擇月份</option>
                    </select>
                    <select name="month" id="month" class="choose_date" v-model="monthSelected" @change="selectByDate" v-show="yearSelected !== -1">
                        <option value="-1" disabled selected>選擇月份</option>
                        <option value="0">不限月份</option>
                        <option :value="index" v-for="index in 12" :key="index">{{index}}月</option>
                    </select>
                </div>
                <!-- searchbar組件 -->
                <input type="text" placeholder="輸入訂單編號或蛋糕名稱..." class="search" @input="searchCake" v-model="searchValue">
            </form>
        </section>

        <section id="order_block">

            <div class="order" v-for="(item, index) in orderChoose" :key="index">
                <div class="order_title">
                    <div class="title_main">
                        <div class="order_number">{{item.orderID}}</div>
                        <div class="order_status" v-show="item.finished === '0'">進行中</div>
                        <div class="order_status" v-show="item.finished === '1'">已完成</div>
                        <div class="order_date">
                            訂購日期:&nbsp;
                            <span>{{item.createDate}}</span>
                        </div>
                    </div>
                    <button class="show_detail">
                        <font-awesome-icon icon="fa-solid fa-plus" class="plus_icon" v-show="!orderShow[index]" @click="foldOrderDetail(index)"/>
                        <font-awesome-icon icon="fa-solid fa-minus" class="minus_icon" v-show="orderShow[index]" @click="unfoldOrderDetail(index)"/>
                    </button>
                </div>
                <transition name="slide" mode="out-in">
                    <div class="order_detail" v-show="orderShow[index]">
                        <div class="order_item" v-for="(item, index) in item.cakeData" :key="index">
                            <div class="product_image">
                                <img :src="item.cakeImage">
                            </div>
                            <div class="product_description_block">
                                <div class="product_title">{{item.cakeName}}</div>
                                <div class="product_description">{{item.cakeDescription}}</div>
                            </div>
                            <div class="item_number"><span>{{item.quantity}}</span>個</div>
                            <div class="item_total">$<span>{{item.price}}</span></div>
                        </div>
                        <!-- 重複排版用組件開始 -->
                        <!-- <div class="order_item">
                            <div class="product_image">
                                <img src="../assets/images/cho_cake.jpg">
                            </div>
                            <div class="product_description_block">
                                <div class="product_title">巧克力大蛋糕</div>
                                <div class="product_description">超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕</div>
                            </div>
                            <div class="item_number"><span>1</span>個</div>
                            <div class="item_total">$<span>180</span></div>
                        </div>
                        <div class="order_item">
                            <div class="product_image">
                                <img src="../assets/images/cho_cake.jpg">
                            </div>
                            <div class="product_description_block">
                                <div class="product_title">巧克力大蛋糕</div>
                                <div class="product_description">超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕超級好吃的巧克力蛋糕</div>
                            </div>
                            <div class="item_number"><span>1</span>個</div>
                            <div class="item_total">$<span>180</span></div>
                        </div> -->
                        <!-- 重複排版用組件結束 -->
                        <div class="information_block">
                            <div class="information_left">
                                <div class="payment_method">
                                    付款方式:
                                    <span>{{item.paymentMethod}}</span>
                                </div>
                                <div class="pickup_store">
                                    地址:
                                    <span>{{item.address}}</span>
                                </div>
                            </div>
                            <div class="information_right">
                                <div class="deliver_fee">
                                    <span>運費: $&nbsp;</span>
                                    <span>{{item.deliverFee}}</span>
                                </div>
                                <div class="discount">
                                    <span>折扣: $&nbsp;</span>
                                    <span>{{item.discount}}</span>
                                </div>
                                <div class="order_total">
                                    <span>總計: $&nbsp;</span>
                                    <span>{{getOrderPrice(item)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
            
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
    
    import switch_tab from "../components/switchTabMember"
    import member_main_bar from "../components/member_main_bar";
    import title_h1 from "../components/title_h1";

    export default {
        components: {
            headercomp,
            footercomp,
            member_main_bar,
            title_h1,
            switch_tab
        },
        data(){
            return{
                page: "order",
                title: "我的訂單",

                memberId: this.$store.state.member_id,

                order: [],
                orderChoose: [],
                orderChooseTemp: [],  // orderChoose進行篩選時會將未篩選資料存在此處
                orderShow: [],

                yearSelected: -1,
                monthSelected: -1,

                searchValue: "",
            };
        },
        methods: {
            unfoldOrderDetail(index){
                // console.log(index)
                this.$set(this.orderShow, index, false);
            },
            foldOrderDetail(index){
                // console.log(index)
                this.$set(this.orderShow, index, true);
            },
            chooseOrderType(state){
                return state === "進行中" ? this.orderChooseTemp = this.order.filter(item => item.finished === "0") : state === "已完成" ? this.orderChooseTemp =  this.order.filter(item => item.finished === "1") : this.orderChooseTemp = this.order;
            },
            switchTo(state){
                this.orderChoose = this.chooseOrderType(state);
                this.searchValue = "";
                this.yearSelected = -1;
                this.monthSelected = -1;
            },
            selectByDate(){
                this.searchValue = "";
                this.orderChoose = this.orderChooseTemp.concat();
                if(this.yearSelected !== "0"){
                    this.orderChoose = this.orderChoose.filter(item => parseInt(item.createDate.split("/")[0]) === this.yearSelected);
                }
                if(this.monthSelected !== "0" && this.monthSelected !== -1){
                    this.orderChoose = this.orderChoose.filter(item => parseInt(item.createDate.split("/")[1]) === this.monthSelected);
                }
            },
            searchCake(){
                this.yearSelected = -1;
                this.monthSelected = -1;
                this.orderChoose = this.orderChooseTemp.concat();
                let searchVal = new RegExp(this.searchValue);
                this.orderChoose = this.orderChoose.filter(item => {
                    return searchVal.test(item.orderID);
                });
            },
            getOrderPrice(item){
                return parseInt(item.totalPrice) + parseInt(item.deliverFee) - parseInt(item.discount);
            },
        },
        computed: {
            yearAvailable(){
                let years = [];
                let thisYear = new Date().getFullYear();
                for(let i = 2016; i < thisYear + 1; i++){
                    years.push(i);
                }
                return years;
            },
        },
        mounted(){
            axios.post("./static/jiawei.api/selectOrder.php",qs.stringify({memberId: this.memberId}))
                    .then(res => {
                        // console.log(res);
                        let data = res["data"];
                        let orderID = null;   // orderID控制要不要加入同筆訂單共用資料，第一筆資料會判定加入
                        let ongoingCakeCount = -1;  // 控制加入蛋糕配料的位置
                        let totalPrice; // 計算各筆訂單總金額

                        for(let i = 0; i < data.length; i++){
                            
                            if(orderID !== data[i].ORDER_ID){
                                let order = {
                                    orderID: data[i].ORDER_ID,
                                    createDate: data[i].CREATE_DATE.split(" ")[0].replace(/-/g, "/"),
                                    // finished: data[i].FINISHED === "0" ? "進行中" : data[i].FINISHED === "1" ? "已完成" : "資料錯誤",
                                    finished: data[i].FINISHED,
                                    paymentMethod: data[i].PAYMENT_METHOD === "0" ? "信用卡付款" : data[i].PAYMENT_METHOD === "1" ? "行動支付付款" : data[i].PAYMENT_METHOD === "2" ? "轉帳付款" : "資料錯誤",
                                    address: data[i].ADDRESS,
                                    deliverFee: data[i].DELIVER_FEE,
                                    discount: data[i].DISCOUNT === undefined ? "0" : data[i].DISCOUNT,
                                    cakeData: [],
                                };
                                orderID = data[i].ORDER_ID;
                                this.order.push(order);
                                ongoingCakeCount++;
                                totalPrice = 0;
                                this.orderShow.push(false);
                            }

                            // 加入單筆訂單中不同的蛋糕資料
                            let cakeData = {
                                cakeImage: require("../assets/images/" + data[i].CAKE_IMAGE),
                                cakeName: data[i].CAKE_NAME,
                                cakeDescription: data[i].CAKE_DESCRIPTION,
                                quantity: data[i].QUANTITY,
                                price: data[i].PRICE,
                            };
                            this.order[ongoingCakeCount].cakeData.push(cakeData);

                            totalPrice += parseInt(cakeData.quantity) * parseInt(cakeData.price);
                            this.order[ongoingCakeCount].totalPrice = totalPrice;

                        }
                        this.orderShow.splice(0, 1, true);
                        this.orderChoose = this.chooseOrderType("進行中");
                        // console.log(this.order);
                    })
                    .catch(err => console.log(err));
        },
    }
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

#member_order_page{
    max-width: 1200px;
    min-width: 320px;
    margin: 0 auto;
    font-size: 0;

    #title_h1_block{
        text-align: center;
        .title_h1_container{
            margin: 0 auto;
            padding: 27px 0 50px;
        }
    }

    #switch_tab_block{  // 佔位用的樣式大小
        height: 50px;
        margin: 0 auto 55px;
    }
    
    #filter_block{
        margin: 0 40px 70px;

        > form{
        display: flex;
        justify-content: space-between;

        @media (max-width: 991.98px){
            display: block;
        }

            #select_block{
                display: inline-flex;
                justify-content: space-between;
                padding-top: 5px;

                @media (max-width: 992.98px){
                    display: flex;
                }

                .choose_date{
                    width: 260px;
                    height: 40px;
                    text-align: center;
                    font-size: $h4;
                    vertical-align: top;

                    &:nth-child(1){
                        margin-right: 40px;
                    }

                    @media (max-width: 992.98px){
                        width: 100%;
                    }

                }

                .disabled_select{
                    cursor: not-allowed;
                }

                input.search{
                    display: inline-block;
                    vertical-align: top;
                }

            }

        }
        
    }

    #order_block{
        display: flex;
        flex-direction: column;
        width: 93%;
        margin: 0 auto;
        
        .order{
            margin-bottom: 50px;

            .order_title{
                background-color: $palePike;
                height: 140px;
                display: flex;
                justify-content: space-between;
                align-content: center;

                .title_main{
                    align-self: center;
                    display: flex;
                    position: relative;
                    margin-left: 40px;

                    @media (max-width: 575.98px){
                        flex-direction: column;
                        margin-left: 20px;
                    }

                    .order_number{
                        font-size: $h2;
                        color: $darkGrey;
                    }

                    .order_status{
                        font-size: $h2;
                        color: $darkGrey;
                        margin-left: 45px;

                        @media (max-width: 575.98px) {
                            margin-left: 0;
                            text-align: right;
                            margin-top: 5px;
                        }

                    }

                    .order_date{
                        font-size: 12px;
                        color: #848484;
                        position: absolute;
                        line-height: 16px;
                        left: 0px;
                        bottom: -17px;

                        @media (max-width: 575.98px) {
                            bottom: 12px;
                        }
                    }

                }

                .show_detail{
                    width: 40px;
                    height: 40px;
                    border: 0;
                    outline: none;
                    padding: 0;
                    background-color: transparent;
                    cursor: pointer;
                    align-self: center;
                    margin-right: 50px;

                    @media (max-width: 575.98px) {
                        margin-right: 15px;
                    }

                    .plus_icon, .minus_icon{
                        font-size: 40px;
                        line-height: 38px;
                    }
                    
                }
                
            }

            .order_detail{
                background-color: #F7F2F1;
                display: flex;
                flex-direction: column;

                .order_item{
                    margin: 50px 45px 0;
                    display: flex;
                    flex-wrap: nowrap;
                    position: relative;

                    @media (max-width: 767.98px){
                        margin: 70px 45px 0;
                    }

                    @media (max-width: 575.98px){
                        margin: 70px 25px 0;
                    }

                    @media (max-width: 414px){
                        margin: 70px 15px 0;
                    }

                    .product_image{
                        width: 100px;
                        height: 100px;
                        overflow: hidden;
                        margin-right: 45px;
                        flex-shrink: 0;
                        align-self: center;

                        @media (max-width: 767.98px){
                            margin-right: 25px;
                        }

                        @media (max-width: 414px){
                            margin-right: 15px;
                        }

                        > img{
                            width: 100%;
                            height: 100%;
                        }

                    }

                    .product_description_block{
                        font-size: $p;
                        color: #979797;
                        width: auto;
                        flex-grow: 1;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        padding-right: 100px;

                        @media (max-width: 1199.98px) and (min-width: 991.98px){
                            padding-right: 50px;
                        }

                        @media (max-width: 991.98px){
                            padding: 0;
                        }

                    }

                    .item_number{
                        font-size: $p;
                        color: #979797;
                        align-self: center;
                        width: 135px;
                        text-align: right;
                        flex-shrink: 0;

                        @media (max-width: 1199.98px) and (min-width: 767.98px){
                            width: 100px
                        }

                        @media (max-width: 767.98px){
                            width: 70px;
                            align-self: flex-start;
                        }
                        
                        @media (max-width: 414px){
                            width: 50px;
                        }

                    }

                    .item_total{
                        font-size: $p;
                        color: #979797;
                        align-self: center;
                        width: 135px;
                        text-align: right;
                        flex-shrink: 0;

                        @media (max-width: 1199.98px) and (min-width: 767.98px){
                            width: 100px
                        }

                        @media (max-width: 767.98px){
                            width: 70px;
                            position: absolute;
                            bottom: 0;
                            right: 0;
                        }

                        @media (max-width: 414px){
                            width: 50px;
                        }

                    }

                }

                .information_block{
                    margin: 50px 45px 0;
                    display: flex;
                    justify-content: space-between;
                    font-size: $h2;
                    color: $darkGrey;

                    @media(max-width: 767.98px){
                        font-size: 22px;
                    }

                    @media(max-width: 575.98px){
                        flex-direction: column;
                        margin: 50px 25px 0;
                    }

                    .information_left{

                        .payment_method{
                            line-height: 37px;
                            margin-bottom: 15px;
                        }

                        .pickup_store{
                            line-height: 37px;
                            margin-bottom: 15px;
                        }

                    }

                    .information_right{

                        @media(max-width: 575.98px){
                        font-size: 20px;
                        display: flex;
                        justify-content: space-between;
                        
                    }

                    @media(max-width: 414px){
                        font-size: 18px;
                    }

                        .deliver_fee{
                            line-height: 37px;
                            margin-bottom: 15px;
                            display: flex;
                            justify-content: space-between;
                        }

                        .discount{
                            line-height: 37px;
                            margin-bottom: 15px;
                            display: flex;
                            justify-content: space-between;
                        }

                        .order_total{
                            line-height: 37px;
                            margin-bottom: 27px;
                            display: flex;
                            justify-content: space-between;
                        }

                    }

                }

            }

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

//版面問題
// 1. 下拉選單預設選項的設置方式需要優化
// 2. 下拉選單的樣式要再調整
// 3. 下拉選單的寬高設定在safari似乎不起作用
// 4. 金額計算個位數要對齊

// ===== 頁面的scss結束 =====



// ===== 組件title_h1的scss開始 =====
.title_h1 {
    display: inline-block;
    position: relative;
    .outline{
        display:flex;
    }
    h1 {
        display: inline-block;
        margin:0;
        font-size: 36px;
        color: #515151;
    }
    span {
        display: inline-block;
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        border-radius: 5px;
        background-color: #dfb9b0;
    }
    img {
        max-width: 58px;
        max-height: 58px;
        width:100%;
        height:100%;
        // vertical-align: middle;
        // position: relative;
        // transform: translateY(-10px);
    }
}
@media (max-width:576px){
    .title_h1 h1{
        font-size:24px;
        position:relative;
        line-height:48px;
    }
}
// ===== 組件title_h1的scss結束 =====


// ===== 組件searchbar的scss開始 =====
input.search{
    width:400px;
    max-width:100%;
    height:50px;
    border-radius: 100px;
    border:none;
    padding:0 30px;
    opacity:70%;
    box-shadow: $shadow;
    font-size: 20px;
    cursor: text;
    &:focus{
        border:none;
    }

    // 自己加上的RWD樣式
    @media (max-width: 1199.98px) and (min-width: 992px){
        width: 300px;
    }

    @media (max-width: 991.98px){
        display: block;
        margin-top: 50px;
        width: 100%;
    }

}
// ===== 組件searchbar的scss結束 =====


// ===== 以下為 Vue transition 的CSS設定 =====
.slide-enter-active{
    transition: all .3s ease;
}
.slide-leave-active{
    transition: all .2s ease;
}
.slide-enter, .slide-leave-to{
    // transform: translateY(-5%);
    opacity: 0;
}
.slide-enter-to, .slide-leave{
    // transform: translateY(0);
    opacity: 100%;
}

</style>