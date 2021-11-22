<template>
    <div>


    <div id="main-bar-img"></div>

    <!-- header here  -->
    <headercomp></headercomp>

    <main id="member_fav_detail_page">

        <!-- 會員頁共用main_bar組件 -->
        <member_main_bar :page="page"></member_main_bar>

        <section id="fav_folder">

            <!-- h1組件 -->
            <div class="title_h1_container">
                <title_h1 :title="title" class="title_h1"></title_h1>
            </div>

            <div id="fav_area" v-if="cakeExist === true">

                <div class="card_outline" v-for="(item, index) in favCategory" :key="index">
                    <div class="img_container">
                        <img :src="item.cakeImg">
                    </div>
                    <div class="description_block">
                        <h4 class="cake_title">{{item.cakeName}}</h4>
                        <p class="design_idea">{{item.cakeDescription}}</p>
                        <div class="interact_area">
                            <button class="go_shopping">進入商品頁面</button>
                            <div class="delete" @click="deleteFav(item.cakeID, index)">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class="trash_can_icon" />
                            </div>
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
                        <div class="interact_area">
                            <button class="go_shopping">進入商品頁面</button>
                            <div class="delete">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class="trash_can_icon" />
                            </div>
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
                        <div class="interact_area">
                            <button class="go_shopping">進入商品頁面</button>
                            <div class="delete">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class="trash_can_icon" />
                            </div>
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
                        <div class="interact_area">
                            <button class="go_shopping">進入商品頁面</button>
                            <div class="delete">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class="trash_can_icon" />
                            </div>
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
                        <div class="interact_area">
                            <button class="go_shopping">進入商品頁面</button>
                            <div class="delete">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class="trash_can_icon" />
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- 排版用重複組件結束 -->

            </div>

            <div v-else class="noCake">這個分類中目前沒有蛋糕收藏喔!</div>
            
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
    import store from "../store/store"

    import member_main_bar from "../components/member_main_bar";
    import title_h1 from "../components/title_h1";

    export default {
        components: {
            headercomp,
            footercomp,
            member_main_bar,
            title_h1,
        },
        props: ["categoryID"],
        data(){
            return{
                page: "fav",
                title: "我的最愛",

                memberID: this.$store.state.member_id,
                // favCategoryID: 1,

                favCategory: [],
                cakeExist: true,
            };
        },
        methods:{
            deleteFav(cakeID, index){
                if(confirm("確定要將此蛋糕從收藏中刪除嗎?")){
                    axios.post("http://localhost/A_cake/deleteFavorite.php",qs.stringify({favoriteCategoryID: this.favCategoryID, cakeID: parseInt(cakeID)}))
                    .then(res => console.log(res))
                    .catch((err) => console.log(err));

                    this.favCategory.splice(index, 1);
                }
            },
        },
        mounted(){
            axios.post("http://localhost/A_cake/selectFavDetail.php",qs.stringify({memberID: this.memberID, favCategoryID: this.categoryID}))
                    .then(res => {
                        let data = res["data"];
                        console.log(data.length)
                        console.log(!(data.length === 0));

                        if(!(data.length === 0)){
                            for(let i = 0; i < data.length; i++){
                                let cake = {
                                    cakeID: data[i].CAKE_ID,
                                    cakeName: data[i].CAKE_NAME,
                                    cakeDescription: data[i].CAKE_DESCRIPTION,
                                    cakeImg: require("../assets/images/" + data[i].CAKE_IMAGE),
                                    cakeImgBlob: data[i].CAKE_IMG_BLOB,
                                }
                                this.favCategory.push(cake);
                            }
                        }else{
                            this.cakeExist = false;
                        }

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

#member_fav_detail_page{
    max-width: 1200px;
    min-width: 320px;
    margin: 0 auto;
    font-size: 0;

    #fav_folder{
        text-align: center;
        margin-bottom: 32px;

        .title_h1_container{
            margin: 0 auto;
            padding: 32px 0 45px;
        }

        #fav_area{
            margin: 0 25px 5px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-auto-rows: auto;
            grid-gap: 70px 50px;
            width: auto;
            justify-items: center;
            
            @media (max-width: 1199.98px){
                grid-template-columns: auto auto;
                margin: 0 19px 5px;
                grid-gap: 42px 30px;
            }

            @media (max-width: 767.98px){
                grid-template-columns: auto;
                grid-auto-rows: auto;
                grid-auto-flow: row;
                grid-column-gap: 65px;
                margin: 33px 10px 5px;
            }

            .card_outline{
                box-shadow: $shadow;

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
                        text-align: left;
                    }

                    .interact_area{
                        display: flex;
                        justify-content: space-between;
                        align-items: flex-end;

                        .go_shopping{
                            margin-top: 15px;
                            width: 180px;
                            height: 60px;
                            border-radius: 100px;
                            border: 0;
                            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
                            font-size: $h4;
                            position: relative;
                            color: #515151;
                            cursor: pointer;
                            background-color: #EFE6E4;
                            &:hover{
                                background-color: #F4E9C9;
                            }

                        }

                        .delete{
                            display: inline-block;
                            cursor: pointer;
                            margin-bottom: 3px;

                            .trash_can_icon{
                                font-size: 30px;
                                color: #515151;
                            }

                        }

                    }

                }
            
            }

        }

        .noCake{
            font-size: $h2;
            color: #515151;
            margin: 75px 0 125px;
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

//版面問題
// 375px的時候卡片區域壓迫感會不會太重？

// ===== 頁面的scss結束 =====


// ===== 組件card_voting的scss開始 =====
.card_outline{
    box-sizing: border-box;

    background-color: #DFB9B0;
    width: 350px;
    height: 480px;
    padding: 25px;
    border-radius: 5px;
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
                border-radius: 30px;
                border: 0;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
                font-size: 20px;
                position: relative;
                color: $darkGrey;
                cursor: pointer;
                background-color: $lightPike;
                &:hover{
                    background-color: $lightYellow;
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
// ===== 組件card_voting的scss結束 =====

</style>