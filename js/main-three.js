import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import gsap from "gsap";
//Scene
const scene = new THREE.Scene();

// const geometry = new THREE.SphereGeometry(
//     3,
//     64,
//     64
// );
// const material = new THREE.MeshStandardMaterial(
//     {
//         color: 0x00FF83,
//         roughness: 0.2,
//     })
// const mesh = new THREE.Mesh(geometry, material);
// scene.add(mesh);

//Sizes
const sizes={
    width: window.innerWidth,
    height: window.innerHeight
}

const light = new THREE.PointLight(0xffffff, 300, 35);
light.position.set(0, 10, 10);
scene.add(light);

const camera = new THREE.PerspectiveCamera(
    45,
    sizes.width/sizes.height,
    0.1,
    450
);
camera.position.z = 360;
camera.position.y = 80;
camera.position.x = 0;
scene.add(camera);



const canvas = document.querySelector(".webgl");
const renderer = new THREE.WebGLRenderer({canvas});
renderer.setSize(sizes.width,sizes.height);
const loader = new GLTFLoader();
let model;


loader.load(require('/models/just_a_girl.glb'), (gltf) => {
    model = gltf.scene;
    scene.add(model);
    // model.position.set(0, 1, 50);
    model.position.x = 50;
    // Optional: Animate model scale on load
    const t1 = gsap.timeline({ defaults: { duration: 1 } });
    t1.fromTo(model.scale, { x: 0, y: 0, z: 0 }, { x: 1, y: 1, z: 1 });

    gsap.to(model.position, {
        x: 0, // Target x position
        duration: 2, // Duration of the animation in seconds
        ease: "power1.inOut" // Easing function for smooth movement
    });
});
renderer.render(scene, camera);
// renderer.setClearColor(0xffffff); // White background


// Controls
// const controls = new OrbitControls(camera, canvas);
// controls.enableDamping = true;
// controls.enableDampingControls = false;
// controls.enableZoom = false;
// controls.autoRotate = true;
// controls.autoRotateSpeed = 5;
// Controls End

// Cheeky JS resizer for the 3js
window.addEventListener("resize", ()=> {
    sizes.width = window.innerWidth;
    sizes.height = window.innerHeight;
    // Update Camera for three js renderer
    camera.aspect = sizes.width / sizes.height;
    camera.updateProjectionMatrix();
    renderer.setSize(sizes.width, sizes.height);
})

const loop = () =>{
    // controls.update();

    // Update controls
    // controls.update();

    // Rotate the model continuously around the Y-axis
    if (model) {
        model.rotation.y += 0.0025; // Rotate around Y-axis
        // Optional: Rotate around X-axis
        // model.rotation.x += 0.01; // Rotate around X-axis
    }

    renderer.render(scene, camera);
    window.requestAnimationFrame(loop);
}
loop()


// Mouse Animation Colour
let mouseDown = false;
let rgb = [];
window.addEventListener("mousedown", () => (mouseDown = true));
window.addEventListener("mouseup", () => (mouseDown = false));

window.addEventListener("mousemove", (e) => {
    if (mouseDown) {
        rgb = [
            Math.round((e.pageX / sizes.width) * 255),
            Math.round((e.pageY / sizes.height) * 255),
            150
        ]

        let newColor = new THREE.Color(`rgb(${rgb.join(",")})`);
        gsap.to(mesh.material.color, {r:newColor.r,g:newColor.g,b:newColor.b})
    }
})

console.log("threejs")
document.addEventListener("DOMContentLoaded", function() {
    // Get the referrer (the previous page URL)
    let referrer = document.referrer;

    // Get your site's current hostname
    let currentSiteHost = window.location.hostname;

    // Check if referrer is empty (meaning direct visit or new tab) or external
    if (!referrer || !referrer.includes(currentSiteHost)) {
        // The visitor came from an external source or directly typed in the URL
        console.log("Visitor came from an external site or direct URL.");
        // Gsap (Timeline stuff)
        const t1 = gsap.timeline(
            {
                defaults: {
                    duration: 1
                }
            }
        )
        t1.fromTo(mesh.scale, {z:0,x:0,y:0}, {z:1,x:1,y:1});
        t1.fromTo(".site-header", {y:"-200%"},{y:"0%"});
    } else {
        // The visitor came from another page within your site
        console.log("Visitor came from within the site.");
        // Add any logic you want to execute in this case
    }
});


