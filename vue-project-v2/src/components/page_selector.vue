<template>
	<ul class="page_select">
        <li><span><font-awesome-icon icon="fa-solid fa-angles-left" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-angle-left" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-1" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-2" class="number" /><font-awesome-icon icon="fa-solid fa-2" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-3" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-4" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-5" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-angle-right" class="number" /></span></li>
        <li><span><font-awesome-icon icon="fa-solid fa-angles-right" class="number" /></span></li>
    </ul>
</template>
<script>
export default {
  name:"page_selector",
  props:["title"],
}
</script>
<style scoped lang="scss">
*{
    box-sizing: border-box;
}
@import "../assets/style/var.scss";

.page_select{
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
    width:100%;
    padding:0;
    li{
        margin:0 8px;
        span{  
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            width:40px;
            height:40px;
            text-decoration: none;
            color:#515151;
            background-color: white;
            border-radius: 50%;
            cursor: pointer;
            &:hover{
                background-color: black;
                color:white;
            }
        }
    }
}
@media (max-width:576px){
    .page_select{
        justify-content: space-between;
        li{
            margin:auto;
        }
    }
}
@media (max-width:414px){
    .page_select{
        li{
            span{
                width:30px;
                height:30px;
            }
        }
    }
}
</style>