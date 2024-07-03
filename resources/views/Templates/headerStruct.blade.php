<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
		<!--CSS page-->
        <link rel="stylesheet" href="{{ asset('css/struct_base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/expo_base.css') }}">
		<link rel="stylesheet" href="{{ asset('css/portfolioCustum.css') }}">

		<!--Bootstrap-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
        
        <title>LMAD</title>
        <link rel="icon" href="{{asset('images/ICON.png')}}">

        <!-- icon -->
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-right.css' rel='stylesheet'>

        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="{{ asset('js/staffAttendanceEvent.js') }}"></script>
		<script src="{{ asset('js/showButtonMenu.js') }}"></script>
		<script src="{{ asset('js/staffAttendanceCompany.js') }}"></script>
		<script src="{{ asset('js/MapCI.js') }}"></script>
        <link
            class="jsbin"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css"
            rel="stylesheet"
            type="text/css"
        />
		

        
        <link href="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
        " rel="stylesheet">

		<script src="{{ asset('js/registerindex.js') }}"></script>
		<script src="{{ asset('js/teacherIndex.js') }}"></script>

    </head>
    

    @yield('content')
    <body>
		
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
			/*const vidDelete = document.getElementById("video-header");
			vidDelete.remove();
			
			let videoDiv = document.getElementById('header-index');
			var img = document.createElement("img");
			img.src = "{{asset('images/expolmadimg.png')}}";
			img.className = "header-gif-expo img-fluid";
			videoDiv.appendChild(img);*/
			
			let time= 1500;
		} else {
			time = 6000;
		}
	</script>

	<script>
		const baseURL = "/EXPO/public/";
	</script>

    <script src="/EXPO/public/js/main.js" type="module"></script>
	
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

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    </body>
	

</html>

<!DOCTYPE html>


