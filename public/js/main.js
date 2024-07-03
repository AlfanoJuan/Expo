import * as THREE from 'three';
import {Particles} from "./particles.js";
import {OrbitControls} from '/EXPO/public/modules-three/three/examples/jsm/controls/OrbitControls.js';

//const scene = new THREE.Scene();

//window.scene = scene;

function main()
{
    var width = window.innerWidth;
    var height = window.innerHeight;   
    
    const canvas = document.querySelector('#c');
    const renderer = new THREE.WebGLRenderer({canvas, antialias: true , alpha: true});
    renderer.domElement.style.backgroundColor = "transparent";
    
    const scene = new THREE.Scene();
    
    //const camera = new THREE.OrthographicCamera(width / - 2, width / 2, height / 2, height / - 2, 1, 1000000 );
    const camera = new THREE.PerspectiveCamera(45, 2, 0.1, 4000);
    camera.position.z = -7000;
    //const controls = new OrbitControls( camera, canvas );
    //controls.target.set(0, 5, 0);
    //controls.update();

    //const light = new THREE.AmbientLight( 0x404040 );
    //scene.add( light );

    const loadingManager = new THREE.LoadingManager( () => {
		const loadingScreen = document.getElementById( 'loading-screen' );
        loadingScreen.classList.add( 'fade-out' );
		loadingScreen.addEventListener( 'transitionend', onTransitionEnd );
	} );

    loadingManager.onLoad = function()
    {
        //document.querySelector('#loading-screen').remove();
    }

    /*
    let vScreen = document.getElementById('videoIntro');
    vScreen.addEventListener('ended', function() {
        const loadingScreen = document.getElementById( 'loading-screen' );
        loadingScreen.remove();   
        // Marca el video como reproducido en localStorage
        // ocalStorage.setItem('Active_v', 'true');
    });*/

    let Par = "";

    if (/Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
    {   
        //alert('Estás en un dispositivo móvil');
    }
    else {
        Par = new Particles('/EXPO/public/images/particle_2.png', 5000, 0xb0cce4, 10, 15, loadingManager);
        for (let i = 0; i < Par.GetParticles().length; i++) {
            scene.add( Par.GetParticles()[i] );
        }
    }

    function resizeRendererToDisplaySize(renderer) {
        const canvas = renderer.domElement;
        const width = canvas.clientWidth;
        const height = canvas.clientHeight;
        const needResize = canvas.width !== width || canvas.height !== height;
        if (needResize) {
            renderer.setSize(width, height, false);
        }
        return needResize;
    }

    function render()
    {
        if (resizeRendererToDisplaySize(renderer)) {
            const canvas = renderer.domElement;
            camera.aspect = canvas.clientWidth / canvas.clientHeight;
            camera.updateProjectionMatrix();
        }

        //const time = Date.now() * 0.000002;
        const time = Date.now() * 0.00003;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
        {   
        }
        else
        {
            Par.Render(time);
        }
       

        //controls.update();

        renderer.render(scene, camera);
        requestAnimationFrame(render);
    }
    
    requestAnimationFrame(render);


} 

main();

