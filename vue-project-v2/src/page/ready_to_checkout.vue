<template>
    <div>
        <headercom></headercom>
        <div id="main-bar-img300"></div>
        <main class="shopping_cart_main">
            <titleh1 class="titleh1rwd" title="購物車"></titleh1>
            <section class="shopping_cart_bread">
                <span class="shopping_cart_page">購物車</span>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="prepare_checkout_page">準備結帳</span>
                <div class="shopping_cart_bread_arrow">
                    <img class="shopping_cart_bread_arrow_img" src="../assets/images/process_icon.svg" alt="">
                </div>
                <span class="checkout_page">結帳完成</span>
            </section>
            <section class="bill_list_outline">
                <div class="bill_list_titlebar">
                    <div class="list_id">
                        <label>您的訂單</label>
                    </div>
                </div>
                <div class="bill_list_contentbar">
                    <div class="bill_individual_outline">
                        <form class="bill_individual">
                            <div class="bill_individual_title">帳單資訊</div>
                            <div class="recipient">
                                <label class="bill_individual_title_short">收件人</label>
                                <input class="bill_individual_short" type="text" name="catchperson" id="" placeholder="請輸入收件人名稱" v-model="recipient">
                            </div>
                            <div class="phone">
                                <label class="bill_individual_title_short">連絡電話</label>
                                <input class="bill_individual_short" type="tel" name="" id="" placeholder="請輸入能與您聯繫的電話" v-model="phone">
                            </div>
                            <div class="preset_address">
                                <div class="address_inline">
                                    <input type="radio"  name= "address" id="" checked>運送地址
                                </div>
                                <input class="bill_individual_address" v-model="address" type="textarea" value="本來的地址本來的地址本來的地址本來的地址本來的地址">
                            </div>
                            <div class="send_date">
                                <label class="bill_individual_title_short">寄送日期</label>
                                <input class="bill_individual_short" type="date" name="" id="myID" v-model="date" :picker-option="{disableDate}">
                            </div>
                            <div class="mark">
                                <label class="bill_individual_title_long">註記<span class="bill_individual_title_marktext">(選擇宅配需在下方留下您當日方便收件時間)</span></label>
                                <textarea class="bill_individual_mark" type="text" name="" id="" v-model="mark" placeholder="請留下配送當日您方便收件的時間及其他想傳達給我們的資訊"></textarea>
                            </div>
                            
                            
                            <div class="ready_to_checkout_coupon">
                                <input id="nonono" type="radio"  class="ready_to_checkout_coupon_click cursorPoint" value="0" v-model="couponDiscount">
                                <label for="nonono" class="cursorPoint">不使用折價卷</label>
                            </div>
                            <div class="coupon " v-for="(item, index) in couponData" :key="index" >
                                <div class="ready_to_checkout_coupon">
                                    <input type="radio" :id="item.couponId" class="ready_to_checkout_coupon_click" :value="item" v-model="couponDiscount" >
                                    <label :for="item.couponId" class="cursorPoint">使用折價卷</label>
                                </div>
                                <label :for="item.couponId">
                                <div class="coupon_block cursorPoint" >

                                    <div class="coupon_left_block">
                                        <div class="discount_amout">$<span>{{item.discount}}</span></div>
                                        <div class="A_cake_text_logo">
                                            <img src="../assets/images/logo_title.png" alt="">
                                            
                                        </div>
                                        <div class="coupon_left_decoration_img">
                                            <img src="../assets/images/blueberry_cream.png" alt="">
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
                                            <img src="../assets/images/jellyfish_icon.svg" alt="">
                                        </div>
                                        <div class="expiration_countdown">
                                            即將失效：剩下&nbsp;<span>{{7}}</span>&nbsp;天
                                        </div>
                                    </div>
                                
                                </div>
                                </label>
                            </div>
                        </form>
                    </div>


                    <!-- 我的訂單 -->
                    <div class="bill_details_outline">
                        <form class="ready_bill_details">
                            <div class="ready_bill_details_title">您的訂單</div>
                            <label class="ready_bill_details_second_title">商品</label>
                            <div class="hr3"></div>
                            <div class="combination_ready" >
                                <div class="ready_bill_details_product_title">
                                    <div class="ready_bill_details_product_cakesizeamount">
                                        <label class="ready_bill_details_product_item" for="">{{storage.CAKE_NAME}}</label>
                                        <label class="ready_bill_details_product_cake_size">{{storage.SIZE}} 吋</label>
                                        <label class="ready_bill_details_product_cake_x">X</label>
                                        <label class="ready_bill_details_product_cake_amount">{{cakeQuantity}}</label>
                                    </div>
                                    <div class="ready_bill_details_product_twandprice">
                                        <label class="ready_bill_details_product_cake_tw">NT$</label>
                                        <label class="ready_bill_details_product_cake_price">{{storage.PRICE * cakeQuantity}}</label>
                                    </div>
                                </div>
                                <div class="hr4"></div>
                                <div class="ready_bill_details_product_cake_block">
                                    <div class="ready_bill_details_product_detail">
                                        <label for="" class="ready_bill_details_product_item">{{PStorage.ACCESSORIES_NAME}}</label>
                                        <div class="ready_bill_details_product_cake_x"></div>
                                        <div class="ready_bill_details_product_cake_amount"></div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">{{PStorage.ACCESSORIES_PRICE - PStorage.ACCESSORIES_DISCOUNT}}</div>
                                    </div>
                                    <div class="ready_bill_details_product_detail"  v-for="(addendacard,index) in AStorage" :key='index'>
                                        <label for="" class="ready_bill_details_product_item">{{addendacard.choice.ACCESSORIES_NAME}}</label>
                                        <div class="ready_bill_details_product_cake_x">X</div>
                                        <div class="ready_bill_details_product_cake_amount">{{addendacard.quantity}}</div>
                                        <div class="ready_bill_details_product_cake_tw">NT$</div>
                                        <div class="ready_bill_details_product_cake_price">{{addendacard.choice.ACCESSORIES_PRICE * addendacard.quantity - addendacard.choice.ACCESSORIES_DISCOUNT}}</div>
                                    </div>
                                </div>
                            <div class="hr3"></div>
                            </div>
                            <div class="subtotal">
                                <label for="" class="ready_bill_details_second_title">小計</label>
                                <div class="ready_bill_details_product_twandprice">
                                    <div class="ready_bill_details_product_cake_tw">NT$</div>
                                    <div class="ready_bill_details_product_cake_price">{{storage.PRICE * cakeQuantity + aPrice }}</div>
                                </div>
                            </div>
                            <div class="hr3"  v-if="couponDiscount.discount > 0"></div>
                            <div class="couple_cost" v-if="couponDiscount.discount > 0">
                                <label for="" class="ready_bill_details_second_title">折價卷</label>
                                <div class="ready_bill_details_product_twandprice">
                                    <div class="ready_bill_details_product_cake_tw">NT$</div>
                                    <div class="ready_bill_details_product_cake_price">- {{couponDiscount.discount}}</div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="shipping_method">
                                <label for="" class="ready_bill_details_second_title">運送方式</label>
                                <div class="shipping_style_block">
                                    <div class="shipping_style_titlebar">
                                        <div class="shipping_style_input">
                                            <input type="radio" name="shipping_style" id="" value="宅配" v-model="shipPrice">宅配
                                        </div>
                                        <div class="ready_bill_details_product_twandprice">
                                            <div class="ready_bill_details_product_cake_tw">NT$</div>
                                            <div class="ready_bill_details_product_cake_price">150</div>
                                        </div>
                                    </div>
                                    <div class="shipping_style_titlebar">
                                        <div class="shipping_style_input">
                                            <input type="radio" name="shipping_style" id="" value="黑貓宅急便" v-model="shipPrice">黑貓宅急便
                                        </div>
                                        <div class="ready_bill_details_product_twandprice">
                                            <div class="ready_bill_details_product_cake_tw">NT$</div>
                                            <div class="ready_bill_details_product_cake_price"> 120</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="ready_bill_total">
                                <label for="" class="ready_bill_details_second_title">總計</label>
                                <div class="ready_bill_details_product_twandprice">
                                    <div class="ready_bill_details_product_cake_tw ready_bill_special_color">NT$</div>
                                    <div class="ready_bill_details_product_cake_price last_price  ready_bill_special_color">{{totalMoney}}</div>
                                </div>
                            </div>
                            <div class="hr3"></div>
                            <div class="payment_method">
                                <label class="ready_bill_details_second_title">
                                    付款方式
                                </label>
                                <div class="bill_payment_block">
                                    <div class="bill_payment_style_block">
                                        <input type="radio" name="payment" v-model="payment" id="" class="cursorPoint" value=0>信用卡付款/ATM轉帳
                                        <img class="img_30" src="../assets/images/ecpay_icon.png" alt="">
                                    </div>
                                    <div class="bill_payment_style_block" >
                                        <input type="radio" class="cursorPoint" name="payment" id="" v-model="payment" value=1>貨到付款
                                    </div>
                                    <div class="bill_payment_style_block">
                                        <input type="radio" name="payment" id="" class="cursorPoint" v-model="payment" value=2>LinePay
                                        <img src="../assets/images/linepay_icon.png" alt="">
                                    </div>
                                </div>
                            </div>
                            
                                <button class="bill_ready_to_checkout_sumbit" @click.prevent="submitorder">下單購買</button>
                            
                            <span class="security_and_privacy">您的個人數據將用於處理您的訂單，支持您在整個網站的體驗，以及我們的隱私權政策中描述的其他目的</span>
                        </form>
                    </div>
                </div>
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
import coupon from "../components/coupon.vue"
import axios from "axios"
import qs from "qs"
import {mapState, mapGetters} from 'vuex'
// const fp = flatpickr(myID, 
//     {
//         minDate: "today",
//         maxDate: new Date().fp_incr(90)
//     }
// )

export default {
    name:'shopping_cart',
    components:{
        titleh1,
        headercom,
        footercom,
        coupon,
    },
    data(){
        return{
            asd:123546,
            name: 123,
            memberId: 1,    // 暫時性資料
            recipient: '',
            phone: '',
            address: '',
            otheraddress: '',
            aPrice: 0,
            shipPrice: '宅配',
            couponDiscount: 0,
            // 折價券資料
            couponData: [],
            // 寄送資訊
            recipient:'',
            phone:'',
            address:'',
            mark:'尚無注記',
            date:'',
            payment: 0,
            newOrderDate:'',
        }
    },
    methods:{
        disableDate(date){
            var t = new Date();
            var t_s = t.getTime();
            t.setTime(t_s + 3000 * 60 * 60 *24);

            // var days = parseInt(Math.abs(Date.now() + 259200) / 1000 / 60 / 60 / 24);
            // alert(days);

            let myID = document.getElementById("myID");
            const fp = flatpickr(myID, 
            {       
                    
                    minDate: t,
                    defaultDate: t,
                    maxDate: new Date().fp_incr(90),
                    
                });
            function clickthis(){
                console.log( myID.value);
        }
        // let calendar = flatpickr(myID, "config");
        //     calendar.changeDates(3); // 提前一个月
        },
        chooseDiscount(item){
            this.couponDiscount.discount = item;
        },
        submitorder(){
            if(this.date!=''&&this.recipient!=''&&this.phone!=''&&this.adress!=''){ //擋下智障

                let data = new URLSearchParams();
                    data.append('payment',this.payment); //付款方法
                    if(this.couponDiscount ==0){
                        data.append('coupon',0)
                    }else{
                        data.append('coupon',this.couponDiscount.couponId); //優惠卷ID
                    }
                    data.append("memberId",this.$store.state.member_id); //會員ID
                    data.append('shipday',this.date); //寄送日期
                    data.append("fee",this.changejaipei); //寄送金額
                    data.append('recipient',this.recipient); //收信人
                    data.append("address",this.address); //地址
                    data.append('deliver_method', this.changeCTY); //配送
                    data.append("phone",this.phone); //電話
                    data.append("mark",this.mark); //註記
                    axios({
                        method:"POST",
                        data,
                        url:"http://localhost/static/yoyo_api/insertOrder.php"
                    }).then((res)=>{
                        // 流程控制，寫入訂單詳細資訊
                        this.newOrderDate = res.data;
                        let orderDetail=new URLSearchParams();
                        orderDetail.append('cakeId',this.$store.state.storage.CAKE_ID)
                        orderDetail.append('number',this.$store.state.cakeQuantity);
                        orderDetail.append('total',parseInt(this.$store.state.storage.PRICE)*parseInt(this.$store.state.cakeQuantity));
                        orderDetail.append('time',this.newOrderDate);
                        orderDetail.append('smallPrice', parseInt(this.storage.PRICE * this.cakeQuantity + this.aPrice))
                        axios({
                            method:"POST",
                            url:'http://localhost/static/yoyo_api/insertOrderCake.php',
                            data:orderDetail,
                        }).then((res)=>{
                            // 以下為流程控制寫入包裝
                            let packages = new URLSearchParams();
                            packages.append('packages', this.$store.state.PStorage.ID)
                            packages.append('time', this.newOrderDate)
                            axios({
                                method:"POST",
                                data:packages,
                                url:"http://localhost/static/yoyo_api/insertPackages.php"
                            }).then((res)=>{
                                console.log(res.data);
                            }).catch((err)=>{
                                console.log(err)
                            })
                            // 以上為流程控制寫入包裝
                            // 以下為流程控制寫入加購品
                            let access = new URLSearchParams();
                            access.append('time', this.newOrderDate)
                            let accessId=[];
                            let accessNum=[];
                            for(let i =0;i<this.$store.state.AStorage.length;i++){
                                accessId.push(this.$store.state.AStorage[i].choice.ID);
                                accessNum.push(this.$store.state.AStorage[i].quantity)
                            }
                            access.append('accessId',accessId);
                            access.append('accessNum',accessNum);
                            axios({
                                method:"POST",
                                data:access,
                                url:'http://localhost/static/yoyo_api/insertAdditionals.php'
                            }).then((res)=>{
                                console.log(res.data);
                            }).catch((err)=>{
                                console.log(err);
                            })
                        }).catch((err)=>{
                            console.log(err);
                        })
                        // 以上為流程控制寫入加購品
                        // 流程控制，刪除該張coupon券
                        if(this.couponDiscount!=0){
                            let couponData = new URLSearchParams()
                            couponData.append('coupon',this.couponDiscount.couponId)
                            axios({
                                method:"POST",
                                url:'http://localhost/static/yoyo_api/updateCouponId.php',
                                data:couponData,
                            }).then((res)=>{
                            }).catch((err)=>{
                                console.log(err);
                            })
                        // 以上為流程控制幹掉贖罪券

                        }
                        this.$router.push('checkout_complete')
                    }).catch((err)=>{
                        console.log(err)
                    })
            }else{
                alert("您可能日期尚未輸入唷!!")
            }

            axios.post("", qs.stringify({smallPrice: parseInt(this.storage.PRICE * this.cakeQuantity + this.aPrice)}))
            .then(res => console.log(res))
            .catch(err => console.log(err));
        },
    },
    watch:{
        
    },
    computed:{
        changejaipei(){
            switch(this.shipPrice){
                case '黑貓宅急便':
                    return 120;
                case '宅配':
                    return 150;
            }
        },
        changeCTY(){//更改寄送方式成為數字
            switch(this.shipPrice){
                case "黑貓宅急便":
                    return '0';
                case "宅配":
                    return '1';
            }
        },
        totalMoney(){
            if(this.couponDiscount == 0){
                let allPrice = parseInt(this.$store.state.storage.PRICE)*parseInt(this.$store.state.cakeQuantity)+parseInt(this.aPrice) + parseInt(this.$store.state.PStorage.ACCESSORIES_PRICE - this.$store.state.PStorage.ACCESSORIES_DISCOUNT) + parseInt(this.changejaipei)
            return allPrice
            }else{
                let allPrice = parseInt(this.$store.state.storage.PRICE)*parseInt(this.$store.state.cakeQuantity)+parseInt(this.aPrice) + parseInt(this.$store.state.PStorage.ACCESSORIES_PRICE - this.$store.state.PStorage.ACCESSORIES_DISCOUNT) - parseInt(this.couponDiscount.discount) + parseInt(this.changejaipei)
            return allPrice
            }
        },
        countDays(expiration){
            let future = new Date(...expiration).getTime() / 1000;
            let now = new Date().getTime() / 1000;
            return Math.ceil((future - now) / 86400);
        },
        ...mapState([
            'storage',
            'PStorage',
            'cakeQuantity',

        ]),
        AStorage(){
            let a = this.$store.state.AStorage;
            let sum = 0;
            for(let i = 0; i < a.length; i++){
                a[i].price = a[i].quantity * a[i].choice.ACCESSORIES_PRICE - a[i].choice.ACCESSORIES_DISCOUNT;
                sum = sum + a[i].price
            }
            
            this.aPrice = sum
            return this.$store.state.AStorage
        },
        
    },
    mounted(){
        let memberId = new URLSearchParams;
        memberId.append("memberId", this.memberId);
        axios.post( "http://localhost/static/yoyo_api/redayToCheckoutSelectReceiver.php", memberId)
            .then(res => {
                let data = res.data;
                this.recipient = data[0].RECEIVER;
                this.phone = data[0].PHONE;
                this.address = data[0].ADDRESS;

            })
            .catch( err => console.log(err));
            // 載入折價券資料
            axios.post("http://localhost/static/yoyo_api/selectCoupons.php",qs.stringify({memberId: this.memberId}))
                    .then(res => {
                        let data = res["data"];
                        for(let i = 0; i < data.length; i++){
                            let couponInfo = {
                                discount: data[i].DISCOUNT_AMOUNT,
                                threshold: data[i].USE_THRESHOLD,
                                expirationForCal: data[i].EXPIRATION_DATE.split(" ")[0].split("-"),
                                expiration: data[i].EXPIRATION_DATE.split(" ")[0].replace(/-/g, "/"),
                                couponId:data[i].COUPON_ID,
                            };

                            this.couponData.push(couponInfo);
                            

                            // 顯示所有折價券的按鈕
                            // this.viewCouponButton = (this.couponData.length > 2 ? true : false);
                        }
                            console.log('我家很大',this.couponData);
                    })
                    .catch(err => console.log(err));
    },
    my(){
        return this.$store.state.memberId
    },
    created(){
        window.scrollTo(0, 0);
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
router-link{
    text-decoration: none;
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
        max-width: 1120px;
        justify-content: space-around;
        display: flex;
        margin: 0 auto;
        font-size: $h1;
        margin-top: 200px;
        margin-bottom: 50px;
        @media screen and (max-width:767.98px){ 
            display: flex;
            margin-top: 150px;
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
            color: #515151;
            @media screen and (max-width:767.98px){ 
                font-size: $h4;
            }
        }
        .shopping_cart_page,.checkout_page{
            color: $darkGrey;
            opacity: .2;
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
                object-fit: fill;
                @media screen and (max-width:767.98px){ 
                    width: 20px;
                    height: 20px;
                    object-fit: cover;
                    transform: rotate(90deg);
                }
            }
        }
    }
     // 購物車麵包屑結束
    .bill_list_outline{
        box-sizing: border-box;
        width: 100%;
        max-width: 1120px;
        margin: 0 auto;
        margin-bottom: 100px;
        background-color: $lightYellow;
        @media screen and (max-width:767.98px){ 
            display: flex;
            margin: auto;
            flex-direction: column;
            align-items: center;
            max-width: 576px;
            width: 100%;
        }
        .bill_list_titlebar{
            background-color: $palePike;;
            max-width: 1120px;
            width: 100%;
            display: flex;
            border-radius: 10px 10px 0 0 ;
            height: 100px;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            @media screen and (max-width:767.98px){ 
                max-width: 576px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .list_id{
                align-items: center;
                display: flex;
                justify-content: center;
                max-width: 1120px;
                width: 100%;
            }
        }
        .bill_list_contentbar{
            width: 100%;
            max-width: 1120px;
            display: flex;
            justify-content: center;
            // margin-bottom: 20px;
            @media screen and (max-width:767.98px){ 
                display: flex;
                flex-direction: column;
                max-width: 576px;
                width: 100%;
            }
            .bill_individual_outline{
                width: 60%;
                display: flex;
                justify-content: center;
                max-width: 1120px;
                background-color: #F7F2F1;
                box-sizing: border-box;
                // padding-bottom: 20px;
                @media screen and (max-width:767.98px){ 
                    margin: auto;
                    max-width:768px;
                    width: 100%;
                }
                .bill_individual{
                    margin-top: 35px;
                    width: 95%;
                    max-width: 580px;
                    flex-direction: column;
                    justify-items: center;
                    display: flex;
                    .bill_individual_title{
                        font-size: $h3;
                        margin-bottom: 20px;
                        .recipient,.phone,.preset_address,.new_address,.send_date,.mark,.ready_to_checkout_coupon{
                            margin-bottom: 15px;
                            font-size: $h4;
                            display: flex;
                            .bill_individual_address{
                                height: 28px;
                            
                                max-width: 550px;
                                width: 100%;
                            }
                            .bill_individual_title_short{
                                display: flex;
                                max-width: 100px;
                                width: 100%;
                            }
                            .bill_individual_short{
                                height: 28px;
                                max-width: 150px;
                                width: 100%;
                                // &:focus{
                                //     border: $darkGrey;
                                // }
                            }
                            .bill_individual_title_long{
                                max-width: 500px;
                                width: 100%;
                                margin-bottom: 15px;
                                .bill_individual_title_marktext{
                                    font-size: $p;
                                }
                            }
                            .bill_individual_mark{
                                height: 60px;
                                max-width: 550px;
                                width: 100%;
                                display: block;
                                resize: none;
                                &:hover{
                                    border-width: 2px;
                                    padding: 1px 2px;
                                    border-style: ins-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
                                }
                            }
                        }
                        .preset_address,.mark{
                            display: flex;
                            flex-direction: column;
                            .address_inline{
                                display: flex;
                                align-items: center;
                                // max-width: 170px;
                                // justify-content: space-between  ;
                                // width: 100%;
                                margin-bottom: 15px;
                            }
                        }
                    }
                    .ready_to_checkout_coupon{
                        align-items: center;
                    }

                }
            }
        }
    }
    .bill_details_outline{
        display: flex;
        color: #515151;
        .ready_bill_details{
            width: 95%;
            margin-top: 35px;
            max-width: 350px;
            @media screen and (max-width:767.98px){ 
                max-width: 768px;
                width: 95%;
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 0 auto;
                margin-top: 35px;
                margin-bottom: 50px;
            }
            .ready_bill_details_title{
                font-size: $h3;
                margin-bottom: 20px;
            }
            .ready_bill_details_second_title{
                font-size: $h4;
                max-width: 100px;
                width: 100%;
            }
            .hr3{
                width: 100%;
                max-width: 380px;
                border-top: 2px solid $darkGrey;
                margin: auto;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .combination_ready{
                display: flex;
                flex-direction: column;
                @media screen and (max-width:767.98px){ 
                    // max-width: 0px;
                    width: 95%;
                }
                .ready_bill_details_product_title{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    font-size: $p;
                    border: 5px;
                    .ready_bill_details_product_cakesizeamount{
                        display: flex;
                        align-items: center;
                        width: 100%;
                        max-width: 280px;
                        .ready_bill_details_product_item{
                            display: flex;
                            align-items: center;
                            width: 100%;
                            max-width: 160px;
                            align-items: center;
                        }
                        .ready_bill_details_product_cake_size{
                            max-width: 40px;
                            width: 100%;
                            display: flex;
                            line-height: 16px;
                            text-align: right;
                            align-items: center;
                        }
                        .ready_bill_details_product_cake_x{
                            text-align: right;
                            max-width: 30px;
                            line-height: 16px;
                            width: 100%;
                            display: inline-block;
                            text-align: right;
                            align-items: center;
                        }
                        .ready_bill_details_product_cake_amount{
                            text-align: right;
                            max-width: 30px;
                            width: 100%;
                            display: inline-block;
                            align-items: center;
                        }
                    }
                    .ready_bill_details_product_twandprice{
                        display: flex;
                        justify-content: flex-end;
                        // max-width: 350px;
                        width: 100%;
                        .ready_bill_details_product_cake_tw{
                        max-width: 40px;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        text-align: right;
                        justify-content: flex-end;
                        }
                        .ready_bill_special_color{
                            color: #9F746B;
                            font-weight: bold;
                        }
                        .ready_bill_details_product_cake_price{
                        max-width: 60px;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        }
                        .last_price{
                            color: red;
                        }
                    }
                }
                .hr4{
                    width: 100%;
                    max-width: 580px;
                    border-top: 2px dotted rgb(119, 119, 119);
                    margin: auto;
                    margin-top: 5px;
                    margin-bottom: 5px;
                } 
                .ready_bill_details_product_cake_block{
                    max-width: 580px;
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    
                    .ready_bill_details_product_detail{
                        display: flex;
                        max-width: 580px;
                        width: 100%;
                        @media screen and (max-width:767.98px){ 
                            max-width: 576px;
                            width: 100%;
                            display: flex;
                        }
                    }   
                }
            }
        }
        .subtotal{
            display: flex;
            justify-content: space-between;
        }
        .couple_cost{
            display: flex;
            justify-content: space-between;
        }
        .ready_bill_details_second_title,.subtotal,.couple_cost,.shipping_method,.ready_bill_total,.payment_method{
            max-width: 350px;
            width: 100%;
            // @media screen and (max-width:767.98px){ 
                // display: flex;
                // justify-content: space-between;
            // }
            .shipping_style_block{
                display: flex;
                margin-top: 10px;
                flex-direction: column;
                .shipping_style_titlebar{
                    max-width: 350px;
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 5px;
                    .shipping_style_input{
                        // max-width: 200px;
                        // width: 100%;
                        display: inline-block;
                        cursor: pointer;
                    }
                }
            }
            .bill_payment_block{
                margin-top: 10px;
                display: flex;
                flex-direction: column;
                .bill_payment_style_block{
                    margin-bottom: 5px;
                    line-height: 30px;
                    display: flex;
                    // cursor: pointer;
                    .img_30{
                        width: 30px;
                        height: 30px;
                    }
                    img{
                        margin-left: 10px;
                        height: 30px;
                    }
                }
            }
        }
        .ready_bill_total{
            font-size: $h4;
            display: flex;
        }
        .bill_ready_to_checkout_sumbit{
            margin-top: 45px;
            margin-bottom: 20px;
            width: 120px;
            height: 60px;
            border-radius: 10px;
            background-color: $darkGrey;
            color: white;
            font-size: $h4;
            box-shadow: $shadow;
            &:hover{
                color: $lightYellow;
                cursor: pointer;
            }
        }
        .security_and_privacy{
            display: block;
            font-size: $p;
            @media screen and (max-width:767.98px){ 
                max-width: 350px;
                width: 100%;
            }
        }
    }
}
.bill_list_outline{
    box-sizing: border-box;
    width: 100%;
    max-width: 1120px;
}
.bill_list_titlebar{
    background-color: $palePike;;
    max-width: 1120px;
    width: 100%;
    display: flex;
    border-radius: 10px 10px 0 0 ;
    height: 100px;
    align-items: center;
    justify-content: center;
    font-size: 28px;
}
.list_id{
    align-items: center;
    display: flex;
    justify-content: center;
    max-width: 1120px;
    width: 100%;
    color: #515151;
}
.bill_list_contentbar{
        width: 100%;
        max-width: 1120px;
        display: flex;
        justify-content: center;
        // margin-bottom: 20px;
}
.bill_individual_outline{
    width: 60%;
    display: flex;
    justify-content: center;
    max-width: 1120px;
    background-color: #F7F2F1;
    box-sizing: border-box;
    // margin-bottom: 20px;
}
.bill_individual{
    margin-top: 35px;
    width: 95%;
    max-width: 580px;
    flex-direction: column;
    // justify-content: space-between;
    justify-items: center;
    display: flex;
}
.bill_individual_title{
    font-size: $h3;
    margin-bottom: 20px;
}
.recipient,.phone,.preset_address,.new_address,.send_date,.mark,.ready_to_checkout_coupon{
    margin-bottom: 15px;
    font-size: $h4;
    display: flex;
}
.coupon_block{
    display: flex;
    transform: scale(0.8);
    @media screen and (max-width:767.98px){ 
        transform: scale(1);
    }
}
.ready_to_checkout_coupon{
    align-items: center;
     
}
.ready_to_checkout_coupon_click{
    cursor: pointer;
}
.coupon{
    display: flex;
    flex-direction: column;
    margin-bottom: 25px;
    
    .coupon_option{
        display: flex;
    }
    .coupon_left_block{
        width: 300px;
        height: 150px;
        background-color: #F0D5CE;
        position: relative;
        border-right: 1px solid $palePike;
        border-top-left-radius: 5px;
        overflow: hidden;

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
            position: absolute;
            left: 15px;
            bottom: -10px;
            width: 100px;
            z-index: 100;

            >img{
                width: 100%;
            }

        }

        .use_threshold{
            font-size: $p;
            color: #515151;
            position: absolute;
            bottom: 30px;
            right: 34px;
        }

        .bottom_decoration_img{
            width: 200%;
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
            background-image: linear-gradient(45deg, #EFDCAC 50%, #F7F2F1 50%);
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
.bill_individual_title_short{
    display: flex;
    max-width: 100px;
    width: 100%;
}
.bill_individual_short{
    height: 28px;
    max-width: 150px;
    width: 100%;
    border: 0;
    border-radius: 5px;
    box-shadow: $inputShadow;
    &:focus{
        border: 1px solid $darkGrey;
    }
}
.bill_individual_address{
    height: 56px;
    max-width: 550px;
    width: 100%;
    display: block;
    border: 0;
    border-radius: 5px;
    box-shadow: $inputShadow;
    // align-items: top;
    &:focus{
        border: 1px solid $darkGrey;
    }
}
.preset_address,.new_address,.mark{
    display: flex;
    flex-direction: column;
}
.address_inline{
    display: flex;
    align-items: center;
    max-width: 170px;
    // justify-content: space-between  ;
    width: 100%;
    margin-bottom: 15px;
}
.bill_individual_title_long{
    max-width: 500px;
    width: 100%;
    margin-bottom: 15px;
}
.bill_individual_title_marktext{
    font-size: $p;
}
.bill_individual_mark{
    height: 60px;
    max-width: 550px;
    width: 100%;
    display: block;
    resize: none;
    border: 0;
    border-radius: 5px;
    box-shadow: $inputShadow;
    align-items: flex-start;
    &:focus{
        border: 1px solid $darkGrey;
    }
}
.bill_details_outline{
    max-width: 1120px;
    width: 40%;
    display: flex;
    justify-content: center;
    background-color: $lightYellow;
}
.ready_bill_details{
    width: 95%;
    margin-top: 35px;
    max-width: 350px;
    
}
.ready_bill_details_title{
    font-size: $h3;
    margin-bottom: 20px;
    
}
.ready_bill_details_second_title{
    font-size: $h4;
    max-width: 100px;
    width: 100%;
}
.ready_bill_details_product_cake{
    max-width: 150px;
    width: 100%;
}
.combination_ready{
    display: flex;
    flex-direction: column;
}
.ready_bill_details_product_title{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    font-size: $p;
    border: 10px;
    // align-items: center;
}
.ready_bill_details_product_cakesizeamount{
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 280px;
}
.ready_bill_details_product_item{
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 160px;
    align-items: center;
}
.ready_bill_details_product_cake_size{
    max-width: 40px;
    width: 100%;
    display: flex;
    line-height: 16px;
    text-align: right;
    align-items: center;
}
.ready_bill_details_product_cake_x{
    text-align: right;
    max-width: 30px;
    line-height: 16px;
 
    width: 100%;
    display: inline-block;
    text-align: right;
    align-items: center;
}
.ready_bill_details_product_cake_amount{
    text-align: right;
    max-width: 30px;
    width: 100%;
    display: inline-block;
    align-items: center;

}
.ready_bill_details_product_twandprice{
    display: flex;
    justify-content: flex-end;
    max-width: 350px;
    width: 100%;
}
.ready_bill_details_product_cake_tw{
max-width: 40px;
width: 100%;
display: flex;
align-items: center;
text-align: right;
justify-content: flex-end;

}
.ready_bill_details_product_cake_price{
max-width: 60px;
width: 100%;
display: flex;
align-items: center;
justify-content: flex-end;
}
.hr3{
    width: 100%;
    max-width: 350px;
    border-top: 2px solid $darkGrey;
    margin-top: 5px;
    margin-bottom: 5px;
}
.ready_bill_details_product_cake_block{
    max-width: 350px;
    width: 100%;
    display: flex;
    flex-direction: column;
}
.ready_bill_details_product_detail{
    display: flex;
    justify-content: flex-end;
}
.subtotal{
    display: flex;
    justify-content: space-between;
}
.couple_cost{
    display: flex;
    justify-content: space-between;
}
.shipping_style_block{
    display: flex;
    margin-top: 10px;
    flex-direction: column;
}
.shipping_style_titlebar{
    max-width: 350px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
}
.shipping_style_input{
    // max-width: 200px;
    // width: 100%;
    padding-right: 10px;
    white-space: nowrap;
    line-height: 30px;
    display: inline-block;
}
.ready_bill_total{
    font-size: $h4;
    display: flex;
}
.last_price{
    color: red;
}
.bill_payment_block{
    margin-top: 10px;
    display: flex;
    flex-direction: column;
}
.bill_payment_style_block{
    margin-bottom: 5px;
    padding-right: 10px;
    display: flex;
    align-items: center;
    width: auto;
    cursor: pointer;
}
.bill_ready_to_checkout_sumbit{
    margin-top: 45px;
    margin-bottom: 20px;
    width: 120px;
    height: 60px;
    border-radius: 10px;
    background-color: $darkGrey;
    color: white;
    font-size: $h4;
    box-shadow: $shadow;
    border: none;
}
.bill_ready_to_checkout_sumbit:hover{
    color: $lightYellow;
    cursor: pointer;
}
.security_and_privacy{
    display: block;
    font-size: $p;
    margin-bottom: 20px;
}
.ready_bill_special_color{
color: #9F746B;
font-weight: bold;
}

.hr4{
    width: 100%;
    max-width: 350px;
    border-top: 2px dotted rgb(119, 119, 119);
    margin-top: 5px;
    margin-bottom: 5px;
} 


@media screen and (max-width:767.98px){ 
    .bill_list_contentbar{
        display: flex;
        flex-direction: column;
        max-width: 576px;
        width: 100%;
    }
    .bill_individual_outline{
        margin: auto;
        max-width: 576px;
        width: 100%;
    }
    .bill_details_outline{
        margin: auto;
        max-width: 576px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .ready_bill_details{
        max-width: 576px;
        width: 95%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .bill_list_outline{
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 576px;
        width: 100%;
    }
    .bill_list_titlebar{
        max-width: 576px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .combination_ready{
        max-width: 350px;
        width: 100%;
    }
    .ready_bill_details_second_title,.subtotal,.couple_cost,.shipping_method,.ready_bill_total,.payment_method{
        max-width: 350px;
        width: 100%;
    }
    .security_and_privacy{
        max-width: 350px;
        width: 100%;
    }
    .coupon{
        transform: scale(0.8);
    }
}

#coupon {
  display: inline-flex;

  #coupon_left_block {
    width: 300px;
    height: 150px;
    background-color: #f0d5ce;
    position: relative;
    border-right: 1px solid $palePike;
    border-top-left-radius: 5px;

    #discount_amout {
      font-size: 50px;
      line-height: 56px;
      position: absolute;
      top: 19px;
      left: 27px;
      color: #515151;
    }

    #A_cake_text_logo {
      width: 60px;
      height: 22px;
      position: absolute;
      top: 33px;
      right: 34px;
      overflow: hidden;

      // border: 1px solid blue;

      > img {
        width: 100%;
      }

      > span {
        font-size: 5px;
        line-height: 4px;
        color: #515151;
      }
    }

    #coupon_left_decoration_img {
      // 此處樣式未確定
      position: absolute;
      left: 27px;
      bottom: 20px;
    }

    #use_threshold {
      font-size: $p;
      color: #515151;
      position: absolute;
      bottom: 30px;
      right: 34px;
    }

    #bottom_decoration_img {
      width: 100%;
      position: absolute;
      bottom: 0;
      left: 0;
      transform: rotate(180deg);
    }

    > svg {
      position: absolute;
      bottom: 0;
      left: 0;
      transform: rotate(180deg);
    }
  }

  #coupon_right_block {
    background-color: #f7edd4;
    position: relative;
    width: 120px;
    height: 150px;
    border-bottom-right-radius: 5px;

    &::after {
      content: "";
      display: inline-block;
      width: 42px;
      height: 42px;
      position: absolute;
      top: 0;
      right: 0;
      background-image: linear-gradient(45deg, #efdcac 50%, #F7F2F1 50%);
      border-bottom-left-radius: 5px;
    }

    #expiration {
      width: 80px;
      height: 31px;
      position: absolute;
      top: 30px;
      left: 20px;
      display: flex;
      flex-direction: column;

      > span:first-child {
        align-self: flex-start;
        font-size: 12px;
        transform: scale(0.83);
        transform-origin: center left;
        line-height: 14px;
        color: #515151;
        margin-bottom: 3px;
      }

      #expiration_date {
        align-self: flex-end;
        font-size: 12px;
        line-height: 14px;
        color: #515151;
      }
    }

    #coupon_right_decoration_img {
      position: absolute;
      top: 65px;
      left: 10px;
      width: 39px;
      height: 39px;
      overflow: hidden;

      > img {
        width: 100%;
      }
    }

    #expiration_countdown {
      color: #e8542e;
      font-size: 12px;
      white-space: nowrap;
      transform: scale(0.6);
      transform-origin: center left;
      position: absolute;
      line-height: 10px;
      left: 28px;
      bottom: 32px;
    }
  }
}
.cursorPoint{
    cursor: pointer;
}

</style>