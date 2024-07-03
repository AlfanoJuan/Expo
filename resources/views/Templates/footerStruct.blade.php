<!--Three JS-->
<canvas id="c"></canvas>
    <script type="importmap">
		{
			"imports": {
				"three": "/EXPO/public/modules-three/three/build/three.module.js"
			}
		}
	</script>

	<!--script>
		if (condicion) {
            const nuevoEnlace = document.createElement('link');
            nuevoEnlace.rel = 'stylesheet';
            nuevoEnlace.href = 'ruta-al-archivo.css'; // Reemplaza 'ruta-al-archivo.css' con la URL de tu archivo CSS adicional

            // Agrega el nuevo enlace al head del documento
            document.head.appendChild(nuevoEnlace);
        }
	</script--->

	<script type='text/javascript'>
		let time= 1500;
		if (/Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			const vidDelete = document.getElementById("video-header");
			vidDelete.remove();
			
			let videoDiv = document.getElementById('header-index');
			var img = document.createElement("img");
			img.src = "{{asset('images/expolmadimg.png')}}";
			img.className = "header-gif-expo";
			videoDiv.appendChild(img);
			
			let time= 1500;
		} else {
			time = 6000;
		}
	</script>

    <script src="js/main.js" type="module"></script>
	
	<!--script type='module'>
		//import { scene } from './js/main.js';
		if (/Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
		{
			/*
			function eliminarHijos(objeto) {
			while (objeto.children.length > 0) {
					eliminarHijos(objeto.children[0]); // Llama a la función recursivamente para eliminar los hijos anidados
					objeto.remove(objeto.children[0]); // Elimina el primer hijo
				}
			}
			eliminarHijos(scene);
			*/

			alert("Estás en un dispositivo móvil");
		}
		else
		{
			alert("Estás en una PC");
		}
	</script-->

</body>
</html>