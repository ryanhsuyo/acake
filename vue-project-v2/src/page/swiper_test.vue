<template>
  <div>
      <!-- <img id="my-image" src="../assets/images/cake_design/decoration4.png" alt="" style="width: 100px;"> -->

     <!-- <swiper ref="hits" :auto-update="true" class="actor-list" :options="swiperOption">
        <swiper-slide v-for="(slide, key) in swiperList" :key="key" >
            <div align="center"><img :src="slide" alt=""></div>
        </swiper-slide> -->
        <!-- <div class="swiper-pagination" slot="pagination"></div> -->
        <!-- <div class="swiper-button-prev swiper-button-white" slot="button-prev"  @click="prev"></div>
        <div class="swiper-button-next swiper-button-white" slot="button-next" @click="next"></div>
    </swiper> -->

    <!-- 把需要生成截圖的元素放在一個元素容器裡,設定一個ref -->
    <!-- <div ref="imageTofile"> -->
      <!-- 這裡放需要截圖的元素,自定義元件元素也可以 -->
      <!-- <div>我是擷取的內容</div>
      <div>我是擷取的內容</div>
      <div>我是擷取的內容</div>
      <div>我是擷取的內容</div>
      <div>我是擷取的內容</div>
    </div> -->
    <!-- 如果需要展示擷取的圖片,給一個img標籤 -->
    <!-- <img :src="htmlUrl" v-show="isShow" /> -->
    <!-- <button @click="toImage">擷取</button> -->

    <!-- <vue-fabric id="x" ref="canvas" @selection:created="selected" :width="width" :height="height" style="background-color: cadetblue;"></vue-fabric> -->

    <!-- <canvas id="canvas" width="300" height="300" style="background-color: cadetblue;">
    </canvas> -->
    <canvas id="canvas" width="300" height="300" style="background-color: cadetblue;">
    </canvas>
    <button @click="addimg">addimg</button>

    <!-- <div id="main"> -->
        <!-- <canvas id="canvas" width="200" height="200"></canvas>
        <br/>
        <button class="btn" v-on:click="attachCanvas">attachCanvas - 1</button>
        <button class="btn" v-on:click="addLayerToCanvas">addLayerToCanvas - 2</button> -->
    <!-- </div> -->
 
  </div>
</template>

<script>
import $ from 'jquery'
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import html2canvas from "html2canvas"
import { Fabric } from 'vue-fabric'
import { fabric } from 'fabric'
export default {
    name:'work',
    components: {
        Swiper,
        SwiperSlide,
        html2canvas,
        Fabric,
        fabric
    },
    data(){
        
        return {
            canvas:{},
            rect:{},
            // swiperList :[
            //     'https://fuss10.elemecdn.com/a/3f/3302e58f9a181d2509f3dc0fa68b0jpeg.jpeg',
            //     'https://fuss10.elemecdn.com/1/34/19aa98b1fcb2781c4fba33d850549jpeg.jpeg',
            //     'https://fuss10.elemecdn.com/9/bb/e27858e973f5d7d3904835f46abbdjpeg.jpeg',
            //     'https://fuss10.elemecdn.com/d/e6/c4d93a3805b3ce3f323f7974e6f78jpeg.jpeg',
            //     'https://fuss10.elemecdn.com/3/28/bbf893f792f03a54408b3b7a7ebf0jpeg.jpeg',
            //     'https://fuss10.elemecdn.com/2/11/6535bcfb26e4c79b48ddde44f4b6fjpeg.jpeg'
            // ],
            // swiperOption: {
            //     autoplay: {
            //         disableOnInteraction: false,  // 使用者操作swiper之後，是否禁止autoplay
            //         delay: 3000, // 自動切換的時間間隔（單位ms）
            //     },
            //     initialSlide: 0,
            //     loop: true,
            //     // pagination: { el: '.swiper-pagination' }, // 分頁按鈕
            //     paginationClickable: true,
            //     onSlideChangeEnd: swiper => {
            //     //console.log('onSlideChangeEnd', swiper.realIndex)
            //     }
            // },
            // navigation: {
            //   nextEl: '.swiper-button-next',
            //   prevEl: '.swiper-button-prev'
            // },

            // htmlUrl: "",
            // isShow: false,
        }
    },
    methods: {
         //adds canvas
        //         attachCanvas: function(){
        //             this.canvas = new fabric.Canvas('canvas');
        //             this.canvas.backgroundColor="#21618C";
        //             this.canvas.renderAll();
        //         },
        //         //adds layer to canvas
        //         addLayerToCanvas:function(){
        //         this.rect = new fabric.Rect({
        //             left: 70,
        //             top: 70,
        //             // fill:  "#FF0000",
        //             stroke: "#000",
        //             width: 50,
        //             height: 50,
        //             strokeWidth: 4, 
        //             opacity: .8  
        //     });
            
        //     this.canvas.add(this.rect);

        // },
        

        addimg(){

            // // 在畫布添加內容
            // const imgElement = document.getElementById('my-image');
            // imgElement.src = '../assets/images/cake_design/decoration4.png'
            // imgElement.onload = () => {
            //     const image = new fabric.Image(imgElement,{
            //         left: 100, // 圖片相對畫布的左側距離
            //         top: 100, // 圖片相對畫布的頂部距離
            //         angle: 30, // 圖片旋轉角度
            //         opacity: 0.85, // 圖片透明度

            //     })
            //     canvas.add(image)
            // }


            // const imgInstance = new fabric.Image (imgElement, {
            // left: 100, // 圖片相對畫布的左側距離
            // top: 100, // 圖片相對畫布的頂部距離
            // angle: 30, // 圖片旋轉角度
            // opacity: 0.85, // 圖片透明度
            // // 這裡可以通過scaleX和scaleY來設置圖片繪製後的大小，這裡為原來大小的一半
            // scaleX: 0.5, 
            // scaleY: 0.5
            // });
            // 添加對象後, 如下圖
            // canvas.add(imgInstance);
        },


        // prev(){
        //     this.$refs.hits.$swiper.slidePrev();
        // },
        // next(){
        //     this.$refs.hits.$swiper.slideNext();
        // },

        // 頁面元素轉圖片
    // toImage() {
    //   // 第一個引數是需要生成截圖的元素,第二個是自己需要配置的引數,寬高等
    //   html2canvas(this.$refs.imageTofile, {
    //     backgroundColor: null,
    //   }).then((canvas) => {
    //     let url = canvas.toDataURL("image/png");
    //     this.htmlUrl = url; // 把生成的base64點陣圖片上傳到伺服器,生成線上圖片地址
    //     if (this.htmlUrl) {
    //       // 渲染完成之後讓圖片顯示，用v-show可以避免一些bug
    //       this.isShow = true;
    //     }
    //     // this.sendUrl();
    //   });
    // }, // 圖片上傳伺服器
    },
    mounted() {
        this.canvasObj = new Fabric.Canvas('canvas',{
            preserveObjectStacking: true //禁止選中時物件的圖層自訂至於頂部
        });
        this.canvasObj.setWidth(this.caWidth); //設置畫布寬度
        this.canvasObj.setHeight(this.caHeight);//設置畫布高度
        
        // // 設置畫布
        // const card = new fabric.Canvas('canvas')
        // card.setWidth(350)
        // card.setHeight(350)
        // card.on('object:modified',(e) => {
        //     console.log(e.target)
        // });
        
        // 添加圖片
        // 方式一（通過img元素添加）
        const imgElement = document.getElementById('my-image');
        const imgInstance = new fabric.Image(imgElement, {
        left: 100, // 圖片相對畫布的左側距離
        top: 100, // 圖片相對畫布的頂部距離
        angle: 30, // 圖片旋轉角度
        opacity: 0.85, // 圖片透明度
        // 這裡可以通過scaleX和scaleY來設置圖片繪製後的大小，這裡為原來大小的一半
        scaleX: 0.5, 
        scaleY: 0.5
        });
        // 添加對象後, 如下圖
        card.add(imgInstance);
        
    },
}
</script>

<style>
    /* .swiper-pagination{
        color: #000;
        width: 20px;
        height: 20px;
    } */
    
</style>