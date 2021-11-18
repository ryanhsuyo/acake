<template>
  <div>
    <div class="button">
      <button><a href="/index"> 前台</a></button>
      <button><a href="/employee/1"> 後台</a></button>
    </div>
    <!-- <div id="container"></div> -->
    <!-- <button>前台</button>
      <button>後台</button> -->
  </div>
</template>
 
<script>
import * as THREE from "three";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import Stats from "three/examples/jsm/libs/stats.module.js";
import { GUI } from "three/examples/jsm/libs/dat.gui.module.js";
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';

export default {
  name: "ThreeTest",
  data() {
    return {
      camera: null,
      scene: null,
      renderer: null,
      mesh: null,
      controls: null,
      meshCar: null,
      plate: null,
      cylinder: null,
    };
  },
  methods: {
    snowSplite() {
      let camera, scene, renderer, stats, parameters;
      let mouseX = 0,
        mouseY = 0;

      let windowHalfX = window.innerWidth / 2;
      let windowHalfY = window.innerHeight / 2;

      const materials = [];

      init();
      animate();
      function init() {
        camera = new THREE.PerspectiveCamera(
          1500,
          window.innerWidth / window.innerHeight,
          1,
          800
        );
        camera.position.z = 500;

        scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0xcccccc, 0.002);
        const geometry = new THREE.BufferGeometry();
        const vertices = [];

        const textureLoader = new THREE.TextureLoader();

        const sprite1 = textureLoader.load("../../static/snowSplite/01.png");
        const sprite2 = textureLoader.load("../../static/snowSplite/02.png");
        const sprite3 = textureLoader.load("../../static/snowSplite/03.png");
        const sprite4 = textureLoader.load("../../static/snowSplite/02.png");
        const sprite5 = textureLoader.load("../../static/snowSplite/01.png");

        for (let i = 0; i < 2000; i++) {
          const x = Math.random() * 2000 - 1000;
          const y = Math.random() * 2000 - 1000;
          const z = Math.random() * 2000 - 1000;

          vertices.push(x, y, z);
        }

        geometry.setAttribute(
          "position",
          new THREE.Float32BufferAttribute(vertices, 3)
        );

        parameters = [
          [[1.0, 0.2, 0.5], sprite2, 20],
          [[0.95, 0.1, 0.5], sprite3, 15],
          [[0.9, 0.05, 0.5], sprite1, 10],
          [[0.85, 0, 0.5], sprite5, 8],
          [[0.8, 0, 0.5], sprite4, 5],
        ];
        for (let i = 0; i < parameters.length; i++) {
          const color = parameters[i][0];
          const sprite = parameters[i][1];
          const size = parameters[i][2];

          materials[i] = new THREE.PointsMaterial({
            size: size,
            map: sprite,
            blending: THREE.AdditiveBlending,
            depthTest: false,
            transparent: true,
          });
          materials[i].color.setHSL(color[0], color[1], color[2]);

          const particles = new THREE.Points(geometry, materials[i]);

          particles.rotation.x = Math.random() * 6;
          particles.rotation.y = Math.random() * 6;
          particles.rotation.z = Math.random() * 6;

          scene.add(particles);
        }

        renderer = new THREE.WebGLRenderer();
        (renderer.autoClear = true), renderer.setClearColor(0xf0d5ce, 1);
        // 陰影
        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFSoftShadowMap;
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        //

        stats = new Stats();
        // document.body.appendChild( stats.dom );

        //

        // const gui = new GUI();

        // const params = {
        // 	texture: true
        // };

        // gui.add( params, 'texture' ).onChange( function ( value ) {

        // 	for ( let i = 0; i < materials.length; i ++ ) {

        // 		materials[ i ].map = ( value === true ) ? parameters[ i ][ 1 ] : null;
        // 		materials[ i ].needsUpdate = true;

        // 	}

        // } );

        // gui.open();

        document.body.style.touchAction = "none";
        document.body.addEventListener("pointermove", onPointerMove);

        //

        window.addEventListener("resize", onWindowResize);
      }

      function onWindowResize() {
        windowHalfX = window.innerWidth / 2;
        windowHalfY = window.innerHeight / 2;

        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        renderer.setSize(window.innerWidth, window.innerHeight);
      }

      function onPointerMove(event) {
        if (event.isPrimary === false) return;

        mouseX = event.clientX - windowHalfX;
        mouseY = event.clientY - windowHalfY;
      }

      //

      function animate() {
        requestAnimationFrame(animate);

        render();
        stats.update();
      }

      function render() {
        const time = Date.now() * 0.00005;

        camera.position.x += (mouseX - camera.position.x) * 0.05;
        camera.position.y += (-mouseY - camera.position.y) * 0.05;

        camera.lookAt(scene.position);

        for (let i = 0; i < scene.children.length; i++) {
          const object = scene.children[i];

          if (object instanceof THREE.Points) {
            object.rotation.y = time * (i < 4 ? i + 1 : -(i + 1));
          }
        }

        for (let i = 0; i < materials.length; i++) {
          const color = parameters[i][0];

          const h = ((360 * (color[0] + time)) % 360) / 360;
          materials[i].color.setHSL(h, color[1], color[2]);
        }
        renderer.render(scene, camera);
      }
      this.scene = scene;

      // 辅助坐标系  参数250表示坐标系大小，可以根据场景大小去设置
      // const axisHelper = new THREE.AxisHelper(80000);
      // this.scene.add(axisHelper);
      //燈光
      const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
      directionalLight.castShadow = true;
      scene.add(directionalLight);
      directionalLight.position.set(100, 300, 150);
      // const helper = new THREE.DirectionalLightHelper(directionalLight, 50);
      // scene.add(helper);
      // 文字
      const loader = new THREE.FontLoader();

loader.load( 'static/helvetiker_regular.typeface.json', function ( font ) {

    const textGeo = new THREE.TextGeometry( "A-cake", {

        font: font,

        size: 200,
        height: 50,
        curveSegments: 12,

        bevelThickness: 2,
        bevelSize: 5,
        bevelEnabled: true

    } );

    const textMaterial = new THREE.MeshPhongMaterial( { color: 0x9F746B } );

    const mesh = new THREE.Mesh( textGeo, textMaterial );
    mesh.position.set(-500,150,-250)
scene.add( mesh );
} );
    },
    cake() {
      // 第一層
      const geometry = new THREE.CylinderGeometry(
        200,
        200,
        60,
        3,
        1,
        false,
        0,
        6.3
      );
      const material = new THREE.MeshMatcapMaterial({
        color: 0xf7edd4,
      });
      const material3 = new THREE.MeshLambertMaterial({
        color: 0x9f4141,
        emissive: 0xf3e7b4,
        fog: false,
      });
      const cylinder = new THREE.Mesh(geometry, material3);
      cylinder.castShadow = true;
      this.scene.add(cylinder);
      // 第二層
      const geometry2 = new THREE.CylinderGeometry(
        200,
        200,
        10,
        3,
        1,
        false,
        0,
        6.3
      );
      const material2 = new THREE.MeshMatcapMaterial({
        color: 0xf7edd4,
        opacity: 1,
        transparent: true,
      });
      const material4 = new THREE.MeshMatcapMaterial({
        color: 0x5a1702,
        emissive: 0x5a1702,
        transparent: true,
        opacity: 1,
      });
      const cylinder2 = new THREE.Mesh(geometry2, material4);
      cylinder2.position.set(0, 35, 0);
      this.scene.add(cylinder2);
      // 第三層
      const geometry3 = new THREE.CylinderGeometry(
        200,
        200,
        60,
        3,
        1,
        false,
        0,
        6.3
      );

      const cylinder3 = new THREE.Mesh(geometry3, material3);
      cylinder3.position.set(0, 70, 0);
      this.scene.add(cylinder3);
      // 第四層
      const geometry4 = new THREE.CylinderGeometry(
        200,
        200,
        10,
        3,
        1,
        false,
        0,
        6.3
      );

      const cylinder4 = new THREE.Mesh(geometry4, material4);
      cylinder4.position.set(0, 105, 0);
      this.scene.add(cylinder4);
      // 第五層
      const geometry5 = new THREE.CylinderGeometry(
        200,
        200,
        60,
        3,
        1,
        false,
        0,
        6.3
      );

      const cylinder5 = new THREE.Mesh(geometry5, material3);
      cylinder5.position.set(0, 140, 0);
      this.scene.add(cylinder5);

      //最上層奶油
      const geometry6 = new THREE.CylinderGeometry(
        200,
        200,
        2,
        3,
        1,
        false,
        0,
        6.3
      );
      const material6 = new THREE.MeshLambertMaterial({
        color: 0xe5ff5b,
        emissive: 0xffffff,
        opacity: 1,
      });
      const cylinder6 = new THREE.Mesh(geometry6, material6);
      cylinder6.position.set(0, 172, 0);
      this.scene.add(cylinder6);
      // 第一顆奶油
      // const butter_el = new THREE.TorusGeometry( 8,4, 30, 200,6.3 );
      // const butter_el2 = new THREE.TorusGeometry( 4, 4, 30, 200,6.3 );
      // const butter_el3 = new THREE.TorusGeometry( 1, 4, 30, 200,6.3 );
      // const butter_material = new THREE.MeshLambertMaterial( {
      // 	color: 0xffff00,
      // 	emissive:0xffffff } );
      // const butter = new THREE.Mesh( butter_el, butter_material );
      // const butter2 = new THREE.Mesh( butter_el2, butter_material );
      // const butter3 = new THREE.Mesh( butter_el3, butter_material );
      // butter.position.set(0,177,0)
      // butter.rotation.x=Math.PI*.5
      // this.scene.add( butter );
      // butter2.position.set(0,182,0)
      // butter2.rotation.x=Math.PI*.5
      // this.scene.add( butter2 );
      // butter3.position.set(0,186,0)
      // butter3.rotation.x=Math.PI*.5
      // this.scene.add( butter3 );
      // 盤子
      const plate = new THREE.CylinderGeometry(
        300,
        300,
        15,
        64,
        1,
        false,
        0,
        6.3
      );
      const plate_material = new THREE.MeshBasicMaterial({ color: 0xfffdf3 });
      const the_plate = new THREE.Mesh(plate, plate_material);
      the_plate.position.set(0, -38, 0);
      // the_plate.receiveShadow = true;
      this.scene.add(the_plate);
      // 盤子凹槽
      const plate_inner_el = new THREE.CylinderGeometry(
        200,
        200,
        5,
        64,
        1,
        false,
        0,
        6.3
      );
      const plat_inner_material = new THREE.MeshBasicMaterial({
        color: 0xe8e8e8,
      });
      const plate_inner = new THREE.Mesh(plate_inner_el, plat_inner_material);
      // plate_inner.rotation.x=Math.PI*.5;
      plate_inner.position.set(0, -30, 0);
      this.scene.add(plate_inner);
    },
    text() {
      
    },
  },
  mounted() {
    this.snowSplite();
    this.cake();
    // this.text();
  },
};
</script>
<style scoped lang="scss">
#container {
  /* height: 400px; */
}
.button{
  display: flex;
  width:50%;
  justify-content: space-around;
  position:absolute;
  top:80%;
  left:50%;
  transform: translate(-50%,-50%);
  button{
    background: rgba(255,245,204,.5);
    font-size:24px;
    font-weight: 900;
    color:#515151;
    cursor: pointer;
    border:none;
    border-radius: 10px;
    width:200px;
    height:50px;
    transition:.2s;
    &:hover{
      background:rgba(255,245,204,1) ;
    }
    a{
      text-decoration: none;
      color:#515151;
      padding:10px 70px;
    }
  }
}
</style>
