<template>
    <div class="product_card_outline">
        <div class="product_img_container">
            <img class="product_img_container_img" src="../assets/images/cho_cake.jpg">
        </div>
        <div class="product_introduce">
            <div class="product_detail">
                <div class="product_cake_title" >巧克力蛋糕</div>
                <span class="price">NT$800</span>
            </div>
            <button class="like_button" :style="{fontFamily: `'EB Garamond','jf open 粉圓 1.1'`}">
                加入我的最愛
                <img src="../assets/images/love_icon.svg">
            </button>
        </div>
    </div>
</template>
<script>
export default {
    name:"card_product",
}
</script>
<style scoped lang="scss">
$bg:#EFE6E4;
$h1 : 36px;
$h2 : 28px;
$h3 : 24px;
$h4 : 20px;
$p : 16px;
$shadow:4px 4px 5px 0 rgba(0, 0, 0, 0.3);
$darkGrey : #515151;
$palePike : #DFB9B0;
$lightPike : #EFE6E4;
$lightYellow : #F4E9C9;
*{
    box-sizing: border-box;
}
#product_cakecard{
    width: 100%;
    margin-bottom:80px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(350px,1fr));
    gap:85px 30px;
    max-width: 1120px;
    .product_card_outline{
        background-color: $palePike;
        display: flex;
        flex-direction: column;
        justify-content: center;
        // align-items: center;
        margin: auto;
        width: 100%;
        max-width: 350px;

        .product_img_container{
            max-width: 300px;
            margin: 25px;
            width:100%;
            .product_img_container_img{
                object-fit: cover;
                width: 100%;
            }

        }
        .product_introduce{
            margin: 20px;
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            .product_detail{
                display: flex;
                flex-direction: column;
                // height: 60px;
                .product_cake_title{
                    font-size: $h3;
                }
                .price{
                    font-size: $h4;
                }
            }
            .like_button{
                width: 180px;
                height: 60px;
                border-radius: 50px;
                box-shadow: $shadow;
                background-color: $lightPike;
                font-size: $h4;
                
                img{
                    width: 20px;
                    height: 20px;
                }
            }
        }
    }
}
.like_button{
    cursor: pointer;
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
</style>