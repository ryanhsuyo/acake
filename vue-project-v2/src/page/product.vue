<template>
    <div>
        <headercom openWhat="product"></headercom>
        <!-- 主廚/創意頁面切換 -->
        <div class="product_page_main_bar">
            <div class="change_page">
                <switchTab @receive="abc"></switchTab>   
            </div>
            <!-- 搜尋欄 -->
            <!-- <div class="searchbar_titlebar">
                <input type="text" placeholder="搜尋..." class="search_baron"/>
            </div> -->
        </div>
        <section class="product_page_main" v-show="bbb">
            <titleh1 class="titleh1rwd" title="主廚蛋糕" ></titleh1>
            <div id="product_cakecard" >
                <div class="product_card_outline" v-for="(card, index) in chefCake" :key="index"> 
                    <div class="product_cake_title" >{{card.CAKE_NAME}}
                        <font-awesome-icon class="loveicon" icon="fa-solid fa-heart"  @click="returnTrueOrFalse(card);loveActive();openSelect(card)" :class="{'active':returnTrueOrFalse(card)}" />
                        <SelectFavorite @callFile="realCallFile()" :cakeID="card.CAKE_ID" class="openFavorite" :openFavorite="card.STATUS" :allFavorite="allFavorite"></SelectFavorite>
                    </div>
                    <div class="product_img_container" @click="addToStorage(card, card.CAKE_ID); addCakeName('主廚蛋糕')">
                        <!-- <router-link to="product_detail"  > -->
                            <img class="product_img_container_img" :src="card.CAKE_IMAGE_BLOB" />
                        <!-- </router-link> -->
                    </div>
                    <div class="product_introduce">
                        <div class="product_detail">
                            <div class="ntandprice">
                                <span class="nt">NT$</span>
                                <span class="price">{{card.PRICE}}</span>
                            </div>
                            <div class="size">{{card.SIZE}}吋</div>
                        </div>
                        <button class="addtocar" @click="addToCakeCart(card); addQuantityToCart(counter); addToPStorage(packageSelected); addAdditionalToStorage(addendacards)">
                            加入購物車 
                            <font-awesome-icon icon="fa-solid fa-cart-plus" />
                            <transition appear
                                @before-appear="beforeEnter"
                                @after-appear='afterEnter'
                                v-for="(item,index) in showMoveDot"
                                :key="index.id">
                                <div class="move_dot"
                                    ref="ball"
                                    v-if="item">
                                </div>
                            </transition>       
                        </button>
                    </div>
                </div>
            </div>
        </section>








<!-- 視作版 -->
        <section class="product_page_main" v-show="!bbb">
            <titleh1 class="titleh1rwd" title="私廚蛋糕" ></titleh1>
            <div id="product_cakecard" >
                <div class="product_card_outline" v-for="(card, index) in designerCake" :key="index"> 
                    <div class="product_cake_title" >{{card.CAKE_NAME}}
                        <font-awesome-icon class="loveicon" icon="fa-solid fa-heart"  @click="returnTrueOrFalse(card);loveActive();openSelect(card)" :class="{'active':returnTrueOrFalse(card)}" />
                        <SelectFavorite @callFile="realCallFile()" :cakeID="card.CAKE_ID" class="openFavorite" :openFavorite="card.STATUS"  :allFavorite="allFavorite"></SelectFavorite>
                    </div>
                    <div class="product_img_container" @click="addToStorage(card, card.CAKE_ID); addCakeName('私廚蛋糕')">
                        <img class="product_img_container_img" :src="card.CAKE_IMAGE_BLOB" />
                    </div>
                    <div class="product_introduce">
                        <div class="product_detail">
                            <div class="ntandprice">
                                <span class="nt">NT$</span>
                                <span class="price">{{card.PRICE}}</span>
                            </div>
                            <div class="size">{{card.SIZE}}吋</div>


                        </div>
                        <button class="addtocar" @click="addToCakeCart(card); addQuantityToCart(counter); addToPStorage(packageSelected); addAdditionalToStorage(addendacards)">
                            加入購物車 
                            <font-awesome-icon icon="fa-solid fa-cart-plus" />
                            <transition appear
                                @before-appear="beforeEnter"
                                @after-appear='afterEnter'
                                v-for="(item,index) in showMoveDot"
                                :key="index.id">
                                <div class="move_dot"
                                    ref="ball"
                                    v-if="item">
                                </div>
                            </transition>       
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <footercom></footercom>
        
    </div>
</template>
<script>

import $ from 'jquery'
import headercom from '../components/headercom'
import footercom from '../components/footercom'
import titleh1 from "../components/title_h1.vue"
import switchTab from "../components/switchTab"
import SelectFavorite from "../components/cakeSelectFavoriteBox"
import axios from "axios"
import qs from "qs"


export default {
    name:'product',
    components:{
        titleh1,
        headercom,
        footercom,
        switchTab,
        SelectFavorite
    },
    data(){
        return{
            vuex:this.$store.state.member_id.NAME,
            receive: '',
            bbb : true,
            chefCake: [],
            designerCake: [],
            showMoveDot: [], 
            elLeft: 0, //當前點擊購物車按鈕在網頁中的絕對top值
            elTop: 0, //當前點擊購物車按鈕在網頁中的絕對left值
            counter: 1,
            openFavorite: false,
            choosefavorite: [],
            light:false,
            packageSelected: {},
            addendacards:[],
            allFavorite :[],
            favoriteFold: [],
            // pageID: 0,
        }
    },
    // props:{
        
    // },
    methods:{
        realCallFile(){
            this.callFile();
            this.choosefavoritefunction()
        },
        callFile(){//呼叫資料夾做比對
<<<<<<< HEAD
            axios.post("http://localhost/yoyo/productSelectCake.php",qs.stringify({cakeID: this.CAKE_ID}))
=======
            axios.post("./static/yoyo_api/productSelectCake.php",qs.stringify({cakeID: this.CAKE_ID}))
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
            .then(res => {
                // console.log(res.data);
                let data = res["data"];
                for(let i =0;i<data.length;i++){
                    data[i].STATUS=0
                }
                // let datalength = data.length
                this.chefCake = data.filter(data => data.MEMBER_ID === "0");
                this.designerCake = data.filter(cty => cty.MEMBER_ID !== "0");
            })
            .catch((error) => {
                console.log(error);
            })
        },
        openSelect(data){
            if(this.returnTrueOrFalse(data)){
                let i= confirm("是否要取消收藏")
                if(i){
                    alert('已取消收藏')
                    let data2 = new URLSearchParams();
                    data2.append('id',this.$store.state.member_id);
                    data2.append('cakeid',data.CAKE_ID);
                    axios({
                        method:"POST",
                        data:data2,
<<<<<<< HEAD
                        url:'http://localhost/yoyo/cancelFavoriteBox.php'
=======
                        url:'./static/yoyo_api/cancelFavoriteBox.php'
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
                    }).then((res)=>{
                        this.realCallFile()
                    }).catch((err)=>{
                        console.log(err)
                    })
                }else{
                    // alert('未取消')
                }
            }else{
                data.STATUS =  !data.STATUS
            }
        },
        returnTrueOrFalse(card){
            for(let i =0;i<this.choosefavorite.length;i++)
            {
                if(card.CAKE_ID == this.choosefavorite[i].CAKE_ID)
                {   
                    return this.choosefavorite[i].CAKE_ID
                }
            }
            return 0
            
        },
        loveActive(){
            this.light = !this.light
        },
        abc(ev){
            this.bbb = ev; 
        },   
        addToCart(product, num){
            this.showMoveDot = [...this.showMoveDot, true];
            this.elLeft = event.target.getBoundingClientRect().left;
            this.elTop = event.target.getBoundingClientRect().top;
        },
        addToStorage(cake, id){
            this.$store.dispatch('storage', cake);
            this.$router.push({path: `product_detail?id=${id}`});
        },
        // 蛋糕要給('蛋糕名稱','蛋糕圖片''''''')
        addToCakeCart(cake){
            this.$store.dispatch('storage', cake)
        },
        // 蛋糕數量給1就可
        addQuantityToCart(counter){
            this.$store.dispatch('cakeQ', counter)
        },
        // 加購品給0跟6就好
        addAdditionalToStorage(additional){
        this.$store.dispatch('AStorage', additional)
        },
        // 包裝
        addToPStorage(packageSelected){
        this.$store.dispatch('PStorage', packageSelected)
        alert('已加入購物車')
        },
        openClick(card, index){
            document.getElementById('index')

            this.chefCake[index]
            this.openFavorite=!this.openFavorite
        },
        choosefavoritefunction(){
<<<<<<< HEAD
            axios.post("http://localhost/yoyo/cakeSelectFavoriteBox.php",qs.stringify({cakeID: this.CAKE_ID}))
=======
            axios.post("./static/yoyo_api/cakeSelectFavoriteBox.php",qs.stringify({cakeID: this.CAKE_ID}))
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
            .then(res => {
                    this.choosefavorite = res.data;
                })
            .catch((error) => {
                console.log(error);
            })
        },
        // 將麵包屑分類送至下個頁面
        addCakeName(cakeClass){
            this.$store.dispatch('cakeClass', cakeClass,)
        }

    },
    watch:{ 
        
    },
    computed:{
        my(){
            return this.$store.state.member_id
        },
        beforeEnter (el) {
        // 設置transform值
        el.style.transform = `translate3d(${this.elLeft - 30}px,${this.elTop - 100}px , 0)`;
        // 設置透明度
        el.style.opacity = 0;
        },
        afterEnter (el) {
        // 獲取底部購物車徽標
        const badgePosition = document
        .getElementById("buycar")
        .getBoundingClientRect();
        // 設置小球移動的位移
        el.style.transform = `translate3d(${badgePosition.left + 30}px,${badgePosition.top - 30}px,0)`
        // 增加貝塞爾曲線  
        el.style.transition = 'transform .88s cubic-bezier(0.3, -0.25, 0.7, -0.15)';
        el.style.transition = 'transform .88s linear';
        this.showMoveDot = this.showMoveDot.map(item => false);
        // 設置透明度
        el.style.opacity = 1;
        },
        

    },
    mounted(){
        
        this.callFile();
        const params = new URLSearchParams();
        axios({
            method: "post",
<<<<<<< HEAD
            url: "http://localhost/yoyo/productDetailSelectAdditional.php",
=======
            url: "./static/yoyo_api/productDetailSelectAdditional.php",
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
            data: params,
        })
        .then((res) => {
            let data = res.data;
            this.choices = data;
            this.addendacards = 
                [
                {
                    quantity: 1,
                    choice: this.choices[0],
                },
                {
                    quantity: 1,
                    choice: this.choices[6],
                }
                ]
        })
        .catch((error) => {
            console.log(error);
        })
        const data = new URLSearchParams();
        axios({
            method: "post",
<<<<<<< HEAD
            url: "http://localhost/yoyo/productDetailSelectPackage.php",
=======
            url: "./static/yoyo_api/productDetailSelectPackage.php",
>>>>>>> b18c1fa51864e670a21d999b4db465713e22dcd9
            data: data,
        })
        .then((res) => {
            let data = res.data;
            this.packages = data;
            this.packageSelected = this.packages[0]
        })
        .catch((error) => {
            console.log(error);
        })
        this.choosefavoritefunction()
    //         mounted(){
    },
    watch:{

    },
    created(){
        window.scrollTo(0, 0);
        axios.post("http://localhost/yoyo/cakeSelectFavoriteBoxAll.php")
            .then(res => {
                this.allFavorite = res.data;
                this.totalFavoriteID = this.allFavorite.filter((item)=>{return item.CATEGORY_NAME=='所有收藏'})[0].CATEGORY_ID
            })
        .catch((error) => {
            console.log(error);
        })
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
    // opacity:0.7;
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

// 下方商品卡片
#product_cakecard{
    margin: 0 auto;
    margin-bottom: 100px;
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(320px,1fr));
    gap:85px 30px;
    max-width: 1120px;
    width: 95%;
    color: #515151;
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
        border-radius: 10px;
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
        .product_cake_title{
            max-width: 300px;
            width: 100%;
            font-size: $h3;
            margin-top: 15px;
            margin-bottom: 15px;
            position: relative;
        }
        .loveicon{
            position: absolute;
            top:3px;
            right: 0px;
            width: 25px;
            height: 25px;
            object-fit: fill;
            color: #515151;
            &:hover{
                cursor: pointer;
                color: rgb(233, 105, 105);
            }
        }
        .loveicon.active{
            color: rgb(204, 31, 60);
        }

        router-link{
            text-decoration: none;
            display: flex;
        }
        .product_img_container{
            max-width: 300px;
            // margin: 15px;
            cursor: pointer;
            width: 100%;
            display: flex;
            justify-content: center;
            .product_img_container_img{
                object-fit: fill;
                max-width: 300px;
                max-height: 300px;
                width: 100%;
                height: 100%;
                @media screen and (max-width:767.98px){ 
                width: 100%;
                height: 100%;
                object-fit: cover;
                }
            }
        }
        .product_introduce{
            margin: 15px;
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            .product_detail{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                max-width: 100px;
                width: 100%;
                color: #515151;
                .ntandprice{
                    display: flex; 
                    align-items: center;
                    justify-content: space-between;
                    color: #515151;
                    .price{
                        font-size: $h3;
                        }
                    .nt{
                        font-size: $h3;
                    }
                }
                .size{
                    font-size: $h4;
                }
            }
            .addtocar{
                width: 180px;
                height: 60px;
                border-radius: 30px; 
                box-shadow: $shadow;
                background-color: $lightPike;
                font-size: $h4;
                border: 0;
                color: #515151;
                
                i{
                    width: 20px;
                    height: 20px;
                }
                // img{
                //     width: 20px;
                //     height: 20px;
                // }
                &:hover{
                    color: $lightPike;
                    cursor: pointer;
                    background-color: $darkGrey;
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
    display: flex;
}
.openFavorite{
    position: absolute;
    top: 0;
}
</style>