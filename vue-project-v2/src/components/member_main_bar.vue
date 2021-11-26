<template>
    <div class="main_bar">
            <div id="avatar_container">
                <img src="" alt="會員大頭照" id="avatar_pic">
                <span id="avatar_update"  @click="updateAvatar">
                    <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                </span>
                <input type="file" id="avatar_upload">
            </div>
            <div id="member_page_nav">

                <router-link to="/member_data">
                    <div id="member_data" class="member_page_nav_link" :class="{'-on':page === 'data'}">
                        <img src="../assets/images/member_member_hover.svg" alt="" id="member_data_icon" v-if="page === 'data'">
                        <img src="../assets/images/member_member.svg" alt="" id="member_data_icon" v-else>
                        <span id="member_data_span">會員資料</span>
                    </div>
                </router-link>

                <router-link to="/member_order">
                    <div id="member_order" class="member_page_nav_link" :class="{'-on':page === 'order'}">
                        <img src="../assets/images/member_shoppingBag_hover.svg" alt="" id="member_order_icon" v-if="page === 'order'">
                        <img src="../assets/images/member_shoppingBag.svg" alt="" id="member_order_icon" v-else>
                        <span id="member_order_span">訂單查詢</span>
                    </div>
                </router-link>

                <router-link to="/member_fav">
                    <div id="member_fav" class="member_page_nav_link" :class="{'-on':page === 'fav'}">
                        <img src="../assets/images/member_favorites_hover.svg" alt="" id="member_fav_icon" v-if="page === 'fav'">
                        <img src="../assets/images/member_favorites.svg" alt="" id="member_fav_icon" v-else>
                        <span id="member_fav_span">我的最愛</span>
                    </div>
                </router-link>

            </div>
        </div>
</template>


<script>
import axios from 'axios';
import qs from "qs";
import store from '../store/store';

export default {
    name: "member_main_bar",
    props: ["page"],
    data(){
        return {
            memberId: 1,
        }
    },
    methods: {
        updateAvatar(){
            if(confirm("要更新個人照片嗎?")){
                document.getElementById("avatar_upload").click();
            }
        },
        uploadAvatar(){
            let that = this;
            let memberId = this.memberId;
            let file = document.getElementById("avatar_upload").files[0];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.addEventListener("load", function(){
                document.getElementById("avatar_pic").src = reader.result;

                axios.post("./static/api/uploadAvatar.php",qs.stringify({memberId: that.$store.state.member_id, imgBlob: reader.result}))
                    .then(res => {
                        // console.log(res);
                    })
                    .catch(err => console.log(err));

            });
        },
    },
    mounted(){
        document.getElementById("avatar_upload").addEventListener("change", this.uploadAvatar);

        axios.post("./static/api/selectAvatar.php",qs.stringify({memberId: this.$store.state.member_id}))
            .then(res => {
                // console.log(res);
                document.getElementById("avatar_pic").src = res["data"][0].MEMBER_IMG_BLOB;
            })
            .catch(err => console.log(err));
    },

}
</script>


<style lang="scss" scoped>

@import "../assets/style/var.scss";

    a{
        text-decoration: none;
    }

  .main_bar{
        height: 500px;
        padding-top: 150px;
        
        #avatar_container{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0px auto 50px;
            position: relative;

            &:hover{

                #avatar_update{
                    display: inline-block;
                }

            }

            #avatar_pic{
                z-index: 100;
                width: 100%;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            #avatar_update{
                position: absolute;
                top: 51px;
                right: 9px;
                z-index: 100;
                font-size: 25px;
                color: #515151;
                cursor: pointer;
                display: none;
            }

            #avatar_upload{
                display: none;
            }

        }
        #member_page_nav{
            // border: 1px solid blue;

            display: flex;
            justify-content: space-between;
            width: 410px;
            margin: 0 auto 110px;

            @media (max-width: 575.98px){
                transform: scale(0.8);
            }

             @media (max-width: 409.98px){
                width: 375px;
            }

            .member_page_nav_link{
                // border: 1px solid green;

                width: 82px;
                height: 92px;
                display: inline-flex;
                flex-direction: column;
                align-items: center;

                > img{
                    width: 50px;
                    height: 50px;
                    margin-bottom: 10px;
                    cursor: pointer;
                }

                > span{
                    width: 82px;
                    height: 32px;
                    background-color: #FFFFFF;
                    border-radius: 15px;
                    text-align: center;
                    font-size: $p;
                    line-height: 32px;
                    color: #9F746B;
                    cursor: pointer;
                }
            }
            .member_page_nav_link.-on{
                > span{
                    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
                }
            }
        }
    }  
</style>