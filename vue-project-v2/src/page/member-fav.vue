<template>
    <div>


    <div id="main-bar-img"></div>

    <!-- header here  -->
    <headercomp></headercomp>

    <div id="main-bar-img"></div>

    <main id="member_fav_page">

        <!-- 會員頁共用main_bar組件 -->
        <member_main_bar :page="page"></member_main_bar>

        <section id="fav_folder">

            <!-- h1組件 -->
            <div class="title_h1_container">
                <title_h1 :title="title" class="title_h1"></title_h1>
            </div>

            <div id="folder_area">

                <div class="folder">
                    <div class="folder_title_tag">
                        <span class="folder_title">所有收藏</span>
                    </div>
                    <div class="folder_img_outline">
                        <a @click.prevent="selectFavFolder({categoryID: '0'})">
                            <div class="four_pic_container" v-if="noCake === false">
                                <img :src="item" v-for="(item) in randomIndexInFolder" :key="item">
                                <img src="../assets/images/mascot1.png" v-for="item in (4 - randomIndexInFolder.length)" :key="item">
                            </div>
                            <span v-else>收藏內尚未加入任何蛋糕！</span>
                        </a>
                    </div>
                </div>

                <div class="folder" v-for="(item, index) in favFolder" :key="item">
                    <div class="folder_title_tag">
                        <span class="folder_title" v-show="!editTitle[index]" @click="editTitleContent(index, true)">{{item.categoryName}}</span>
                        <input type="text" v-model.lazy="item.categoryName" v-show="editTitle[index]">
                        <button class="delete_folder" @click="deleteFolder(item.categoryID)" v-show="!editTitle[index]">
                            <font-awesome-icon icon="fa-solid fa-xmark" class="close_icon" />
                        </button>
                        <button class="change_name" @click="editTitle[index] = false; editTitleContent(index, false); updateTitle(index)" v-show="editTitle[index]">
                            <font-awesome-icon icon="fa-solid fa-check" class="check_icon" />
                        </button>
                    </div>
                    <div class="folder_img_outline" :class="{'noPointer': !!item.categoryPic === false}">
                        <a @click.prevent="selectFavFolder(item)">
                            <img :src="item.categoryPic" v-if="!!item.categoryPic === true">
                            <span v-else>這個分類尚未加入蛋糕喔！</span>
                        </a>
                    </div>
                </div>

                <!-- 排版用重複組件開始 -->
                <!-- <div class="folder">
                    <div class="folder_title_tag">
                        <span class="folder_title">我的最愛</span>
                        <button class="delete_folder">
                            <font-awesome-icon icon="fa-solid fa-xmark" class="close_icon" />
                        </button>
                    </div>
                    <div class="folder_img_outline">
                        <router-link to="/member_fav_detail">
                            <img src="../assets/images/cho_cake.jpg" alt="">
                        </router-link>
                    </div>
                </div>
                <div class="folder">
                    <div class="folder_title_tag">
                        <span class="folder_title">我的最愛</span>
                        <button class="delete_folder">
                            <font-awesome-icon icon="fa-solid fa-xmark" class="close_icon" />
                        </button>
                    </div>
                    <div class="folder_img_outline">
                        <router-link to="/member_fav_detail">
                            <img src="../assets/images/cho_cake.jpg" alt="">
                        </router-link>
                    </div>
                </div>
                <div class="folder">
                    <div class="folder_title_tag">
                        <span class="folder_title">我的最愛</span>
                        <button class="delete_folder">
                            <font-awesome-icon icon="fa-solid fa-xmark" class="close_icon" />
                        </button>
                    </div>
                    <div class="folder_img_outline">
                        <router-link to="/member_fav_detail">
                            <img src="../assets/images/cho_cake.jpg" alt="">
                        </router-link>
                    </div>
                </div> -->
                <!-- 排版用重複組件結束 -->
                

                <!-- 排在最後一個的add_folder按鈕 -->
                <div id="folder_last">
                    <button id="add_folder" @click="addFolder">
                        <font-awesome-icon icon="fa-solid fa-plus" class="add_icon" />
                    </button>
                </div>

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
    import store from "../store/store";

    import member_main_bar from "../components/member_main_bar";
    import title_h1 from "../components/title_h1";

    export default {
        components: {
            headercomp,
            footercomp,
            member_main_bar,
            title_h1,
        },
        data(){
            return{
                memberId: this.$store.state.member_id,

                page: "fav",    // 頁面識別用

                // title_h1組件用(往下傳)
                title: "資料夾分類",

                // 最愛資料夾
                favFolder: [],

                // 資料夾改名輸入框啓閉
                editTitle: [],

                // 收藏內是否有蛋糕，控制未分類蛋糕資料夾的照片是否顯示
                noCake: false,

            };
        },
        methods: {
            deleteFolder(categoryID){
                this.editTitle = Array(this.favFolder.length).fill(false);
                if(confirm("確定要刪除此分類資料夾?")){
                    // console.log(categoryId);
                    axios.post("http://localhost/A_cake/deleteFavFolder.php",qs.stringify({categoryId: categoryID, memberId: this.memberId}))
                        .then(res => {
                            // console.log(res.data);
                            this.favFolder = [];
                            this.selectFolder();
                            this.editTitle.pop();
                            // console.log(this.editTitle);
                            // console.log(this.favFolder);
                        })
                        .catch(err => cosole.log(err));
                }
            },
            addFolder(){
                let newName = prompt("請輸入資料夾名稱");
                if(newName === "") alert("資料夾名稱未輸入！")
                if(!!newName === true){
                    axios.post("http://localhost/A_cake/addFavFolder.php",qs.stringify({categoryName: newName, memberId: this.memberId}))
                            .then(res => {
                                // console.log(res);
                                this.favFolder = [];
                                this.selectFolder();
                                // this.favfolder.push({
                                //     categoryName: newName,
                                //     categoryID: "暫時還沒處理",
                                //     categoryPic: "",
                                // });
                                this.editTitle.push(false);
                                // console.log(this.editTitle);
                            })
                            .catch(err => {console.log(err)});
                }
            },
            editTitleContent(index, boo){
                this.$set(this.editTitle, index, boo);
            },
            updateTitle(index){
                axios.post("http://localhost/A_cake/updateTitle.php",qs.stringify({categoryID: this.favFolder[index].categoryID, categoryName: this.favFolder[index].categoryName}))
                    .then(res => {
                        // console.log(res);
                    })
                    .catch(err => console.log(err));
            },
            selectFavFolder(item){
                this.$router.push({
                    path: `/member_fav_detail/${item.categoryID}`
                });
            },
            // addPhoto(){
            //     axios.post("http://localhost/A_cake/selectFavoriteCategoryPic.php",qs.stringify({memberId: this.memberId}))
            //         .then(res => {
            //             // console.log(res);
            //             let data = res["data"];
            //             let categoryID = 1;
            //             for(let i = 0; i < data.length; i++){
            //                 if(categoryID === parseInt(data[i].CATEGORY_ID)){
            //                     this.favFolder[(categoryID - 1)].categoryPic = require("../assets/images/" + data[i].IMAGE);
            //                     categoryID++;
            //                 }
            //             }
            //             console.log(this.favFolder);
            //         })
            //         .catch(err => {console.log(err)})
            // },




            selectFolder(){
                // axios做兩次呼叫取資料合併成一個物件時，第二次取得的資料有問題，重整後不會渲染畫面，下面暫且先合併成一次axios呼叫做處理
                axios.post("http://localhost/A_cake/selectFavoriteCategoryPic.php",qs.stringify({memberId: this.memberId}))
                    .then(res => {
                        let data = res["data"];
                        // console.log(data.length);
                        console.log(data);

                        if(data.length === 0){
                            this.noCake = true;
                        }else{

                            // 第一個直接寫入，從第二個資料夾開始比對並放資料
                            this.favFolder.push({
                                categoryName: data[0].CATEGORY_NAME,
                                categoryID: data[0].CATEGORY_ID,
                                categoryPic: !!data[0].CAKE_IMAGE_BLOB ? data[0].CAKE_IMAGE_BLOB : data[0].CAKE_DESIGN_IMAGE_BLOB,
                            });

                            let folderCounter = 0;
                            for(let i = 1; i < data.length; i++){
                                if(this.favFolder[folderCounter].categoryID !== data[i].CATEGORY_ID){
                                    folderCounter++;
                                    let folder = {
                                        categoryName: data[i].CATEGORY_NAME,
                                        categoryID: data[i].CATEGORY_ID,        
                                    };
                                    this.favFolder.push(folder);
                                
                                    try{
                                        this.favFolder[folderCounter].categoryPic = !!data[i].CAKE_IMAGE_BLOB ? data[i].CAKE_IMAGE_BLOB : data[i].CAKE_DESIGN_IMAGE_BLOB;
                                    }catch(e){
                                        this.favFolder[folderCounter].categoryPic = null;
                                    }
                                }

                            }

                        }
                        this.editTitle = Array(this.favFolder.length).fill(false);

                    })
                    .catch(err => {console.log(err)});
            },
            forArrayShuffle(a,b) {
                return Math.random() > 0.5 ? -1:1;
            }
        },
        computed: {
            // 所有收藏資料夾用的隨機圖片
            randomIndexInFolder(){
                return this.favFolder.map(item => item.categoryPic).filter(item => item != null).sort(this.forArrayShuffle);
            },
        },
        mounted(){

            if(this.memberId == '0'){
                alert("您尚未登入，將跳轉到登入頁面");
                this.$router.push('/assign')
            }

            //     axios.post("http://localhost/A_cake/selectFavoriteCategory.php",qs.stringify({memberId: this.memberId}))
        //             .then(res => {
            //                 // console.log(res);
        //                 let data = res["data"];
        //                 for(let i = 0; i < data.length; i++){
            //                     let folder = {
                //                         categoryName: data[i].CATEGORY_NAME,
        //                         categoryID: data[i].CATEGORY_ID,
        //                     };
        //                     this.favFolder.push(folder);
        //                 }
        //                 // console.log(this.favFolder);
        //                 this.addPhoto();
        //             })
        //             .catch(err => {console.log(err)})



        this.selectFolder();
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

#member_fav_page{
    max-width: 1200px;
    min-width: 320px;
    margin: 0 auto;
    font-size: 0;

    #fav_folder{
        text-align: center;
        margin-bottom: 32px;
        padding: 0 40px;

        @media (max-width: 767.98px){
            padding: 0;
        }

        .title_h1_container{
            margin: 0 auto;
            padding: 27px 0 48px;
        }

        #folder_area{
            margin: 0 auto 5px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-auto-rows: auto;
            // grid-gap: 75px;
            grid-row-gap: 65px;
            justify-items: center;
            
            @media (max-width: 1199.98px){
                grid-template-columns: auto auto;
                // grid-gap: 100px;
                grid-row-gap: 65px;
            }

            @media (max-width: 767.98px){
                grid-template-columns: auto;
                grid-auto-columns: auto;
                grid-auto-flow: column;
                width: 100vw;
                overflow-y: scroll;
                grid-template-areas: "first .";
                padding: 0 30px 10px;
                margin: 33px 0 5px;
                grid-gap: 70px;
            }

            .folder{
                width: 290px;
                height: 330px;
                background-color: $palePike;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding-bottom: 20px;
                position: relative;
                border-radius: 5px;
                &::before{
                    content: "";
                    width: 110px;
                    height: 40px;
                    display: inline-block;
                    background-color: #EFE6E4;
                    position: absolute;
                    top: 0;
                    right: 0;
                }
                &::after{
                    content: "";
                    display: inline-block;                
                    width: 290px;
                    height: 290px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    left: 0;
                    box-shadow: $shadow;
                    border-radius: 5px;
                    z-index: -1;
                }
                &:first-child{
                    .folder_title{
                        cursor: default !important;
                    }
                }

                .folder_title_tag{
                    padding-left: 10px;
                    padding-top: 10px;
                    text-align: left;
                    position: relative;

                    > input {
                        width: 120px;
                        height: 27px;
                        font-size: 20px;
                    }

                    .folder_title{
                        font-size: $h4;
                        line-height: 27px;
                        display: inline-block;
                        width: 150px;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                        overflow: hidden;
                        cursor: pointer;

                    }

                    .delete_folder{
                        background-color: transparent;
                        width: 20px;
                        height: 20px;
                        padding: 0;
                        font-size: 0;
                        border: 0;
                        outline: 0;
                        cursor: pointer;
                        position: absolute;
                        top: 10px;
                        right: 120px;

                        .close_icon{
                            font-size: 30px;
                            line-height: 20px;
                        }
                        
                    }

                    .change_name{
                        background-color: transparent;
                        width: 20px;
                        height: 20px;
                        padding: 0;
                        font-size: 0;
                        border: 0;
                        outline: 0;
                        cursor: pointer;
                        position: absolute;
                        top: 10px;
                        right: 123px;

                        .check_icon{
                            font-size: 30px;
                            line-height: 20px;
                        }
                    }

                }

                .folder_img_outline{
                    width: 240px;
                    height: 240px;
                    margin: 0 auto;
                    cursor: pointer;
                    overflow: hidden;

                    > a{
                        display: block;
                        text-decoration: none;

                        > img{
                            width: 100%;
                            // position: relative;
                            // top: 50%;
                            // transform: translateY(-50%);
                        }

                        > span{
                            font-size: $h4;
                            color: #515151;
                            position: relative;
                            top: 100px;
                        }

                        .four_pic_container{
                        display: grid;
                        width: 100%;
                        height: 100%;
                        grid-template-columns: 1fr 1fr;
                        grid-template-rows: 1fr 1fr;
                        grid-gap: 0;

                            > img{
                                width: 100%;
                            }

                        }

                    }

                }

                .folder_img_outline.noPointer{
                    cursor: default;
                }

            }

            #folder_last{
                width: 290px;
                height: 330px;
                background-color: transparent;
                // border: 1px solid red;
                display: flex;
                justify-content: center;
                align-items: center;

                @media (max-width: 767.98px){
                    grid-area: first;
                }

                #add_folder{
                    width: 100px;
                    height: 100px;
                    background-color: $palePike;
                    border: 0;
                    outline: 0;
                    border-radius: 10px;
                    cursor: pointer;

                    @media (max-width: 767.98px){
                        // margin-left: 100px;
                    }

                    .add_icon{
                        color: $lightPike;
                        font-size: 85px;
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

}

//版面問題
// 手機版的增加資料夾按鈕要持續顯現一小塊

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

</style>