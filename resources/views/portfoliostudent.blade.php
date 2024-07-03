<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    
    <title>EXPO LMAD 2023</title>
    <link rel="icon" href="{{asset('images/ICON.png')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    <style>
        /* Estilo para el contenedor de la imagen */
        .image-container {
          position: relative;
          width: 512px; /* Ajusta el tamaño de acuerdo al tamaño de tu imagen */
          height: 512px; /* Ajusta el tamaño de acuerdo al tamaño de tu imagen */
          /*box-shadow: 0 0 20px rgba(255, 255, 255, 0.7);*/
          display: flex;
          align-items: center;
          justify-content: center;
          /*transform: translateX(0%); /* Mueve el texto hacia la izquierda fuera del contenedor */
          transition: box-shadow 0.3s ease, transform 0.3s ease;
          visibility: visible;
        }
        
        .overlay {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5); /* Opacidad inicial para oscurecer la imagen */
          transition: background-color 0.3s ease; /* Transición suave para el efecto hover */
          pointer-events: none; /* Permite que el hover pase a través de la superposición */
        }
        
        /* Estilo para el superposición al hacer hover */
        .image-container:hover .overlay {
          background-color: rgba(0, 0, 0, 0); /* Opacidad 0 para aclarar la imagen al hacer hover */
          /*box-shadow: 0 0 20px rgba(255, 255, 255, 0.7);*/
          display: flex;
          align-items: center;
          justify-content: center;
        }
        
        /* Estilo para la imagen */
        .image {
          width: 100%;
          height: 100%;
          object-fit: cover;
          transform: translateX(0%); /* Mueve el texto hacia la izquierda fuera del contenedor */
          transition: transform 0.3s ease;
        }
        
        /* Estilo para el texto superpuesto */
        .text-overlay {
          position: absolute;
          bottom: 30px; /* Ajusta la distancia desde la parte inferior */
          right: -75px; /* Ajusta la distancia desde la parte derecha */
          /*background-color: rgba(0, 0, 0, 0.7); /* Color de fondo del texto (puedes ajustar la opacidad cambiando el último valor) */
          padding: 10px;
          color: white;
          font-size: 45px;
          font-weight: bold;
          transform: translateX(0%); /* Mueve el texto hacia la izquierda fuera del contenedor */
          transition: transform 0.3s ease;
          text-shadow: white 1px 0 10px;
        }
        
        .image-container:hover .text-overlay{
            transform: translateX(11%);
            font-size: 50px;
            text-shadow: #CCCCCC 1px 0 10px;
        }
        
        .image-container:hover .image{
            transform: translateX(2%);
            width: 105%;
            height: 105%;
        }
        .image-container:hover
        {
             transform: translateX(5%); 
             /*box-shadow: 43px 23px 60px rgba(255, 255, 255, 0.7);*/
        }
        
        .mat-text
        {
            font-size: 25px;
        }
        
        .link-wrap {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          text-decoration: none;
          color: inherit;
          z-index: 1; /* Asegura que el enlace esté por encima de otros elementos dentro del contenedor */
        }
        
    </style>
    
    <!-- JavaScript Bundle with Popper -->
    <script
    class="jsbin"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
  ></script>
  <script
    class="jsbin"
    src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
  ></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/teacherIndex.js') }}"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script>
        if(`{{ session()->get('userStatus') }}` == "Contraseña o clave incorrecta") {
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    iconColor:'#a70202',
                    title: `{{ session()->get('userStatus') }}`,
                    showConfirmButton: false,
                    timer: 1500
                })

            });
        }
    </script>

</head>

<body style="background-image: url({{ asset('images/backgroundimg.png') }});  background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <div class="col-md-0">
                    <a class="m-0 navbar-brand align: center" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
            </div>
        </div>
    </nav>
    
    <h1 style="font-weight: bold; text-align:center"> Proyectos LMAD</h1>
    <div class="container-fluid justify-content-around">
         <div class="row">
            <br>
        @if ($projectdata != null)
            @for ($i = 0; $i < count($projectdata); $i++)
                @if ($i % 2 == 0)
                    <div class="card dashboard-t col-12 col-md-12 col-lg-6 my-3" style="visibility: hidden;">
                        <div class="card-body row d-flex center-text-v flex-fill">
                            <div class="col-12 justify-content-center">
                                <div class="image-container col-12 justify-content-center" id="image-container" style="left: 16%;">
                                     <a href="{{route('Portfolio.show', [$projectdata[$i]->id])}}" class="link-wrap">
                                        <img src="{{ asset('storage/eventImages/'.$projectdata[$i]->imagen_url) }}" height="512" width="512" class="image" id="image">
                                        <div class="overlay col-12 justify-content-center" id="overlay"></div>
                                        <div class="text-overlay col-12 justify-content-center">
                                            <p>{{$projectdata[$i]->nameProject}}</p>
                                            <p class="mat-text">{{$projectdata[$i]->subject}}</p>
                                         </div>
                                     </a>
                                </div>
                             </div>
                        </div>
                      </div>
                      <!--div class="col"> </div------->
                @else
                    <div class="card dashboard-t col-12 col-md-12 col-lg-5 my-3" style="visibility: hidden;">
                        <div class="card-body flex-fill">
                            <div class="col-12 justify-content-center">
                                <div class="image-container col-12 justify-content-center" id="image-container">
                                     <a href="{{route('Portfolio.show', [$projectdata[$i]->id])}}" class="link-wrap">
                                        <img src="{{ asset('storage/eventImages/'.$projectdata[$i]->imagen_url) }}" height="512" width="512" class="image" id="image">
                                        <div class="overlay col-12 justify-content-center" id="overlay"></div>
                                        <div class="text-overlay col-12 justify-content-center">
                                            <p>{{$projectdata[$i]->nameProject}}</p>
                                            <p class="mat-text">{{$projectdata[$i]->subject}}</p>
                                         </div>
                                     </a>
                                    </div>
                            </div>
                        </div>
                      </div>
                @endif
            @endfor
        @endif
            </div>
    </div>
</body>
</html>