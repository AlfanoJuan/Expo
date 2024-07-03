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
    <link rel="stylesheet" href="{{ asset('css/struct_base.css') }}">
    
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
    <!---script src="sweetalert2.all.min.js"></script--->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

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
    <!-- <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <div class="col-md-0">
                    <a class="m-0 navbar-brand align: center" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
            </div>
        </div>
    </nav> -->
    
    <div class="col-sm p-3 test" style="min-height: 100%;">
        <div class="container-fluid" style="min-height: 100%;">
            <div class="row" style="min-height: 100%;">
                <div class="container " style="min-height: 100%;">

                    <div class="container row mx-auto justify-content-center" style="min-height: 100%;">

                        <form class="my-4 form-login mx-auto col-md-6" style=" min-height: 100%;" id="login" action="{{route('inicioSesion.store')}}" method="post">
                            @csrf
                            <div class="logo-e col-12 d-flex justify-content-center my-5 mx-auto" style=" width: 60%;">
                                    <img class="logo-img col-10 col-md-4" src="https://expolmad.sistemaregistrofcfm.com/images/LOGO.png" style="filter: grayscale(100%) brightness(0%) invert(100%); width: 100% !important; height: auto !important;" alt="EXPO LMAD">
                                    <span>EXPANDIENDO LA REALIDAD</span>
                            </div>

                            <div class="d-flex justify-content-center col-md-12 mx-auto">

                                <div class="col-md-10 my-4 mx-3">
                                    <div class="border" style="transform-origin: unset;">
                                        <input type="text" class="form-control text-center" name="key" id="key" placeholder="Clave de inicio de sesión" required>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center mx-auto">
                                <div class="col-md-10 my-4 mx-3">
                                        <div class="border" style="transform-origin: unset;">
                                            <input type="password" class="form-control text-center" name="pas" id="pas" placeholder="Contraseña" required>
                                        </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center my-4 col-md-10 mx-auto">
                                <button type="submit" class="btn btn-primary col-md-6">Iniciar sesión</button>
                            </div>
                        </form>

                        <div class="col-md-2"></div>

                        <div class="right-container col-md-4" style="">
                            <img src="{{ asset('images/planet-atom.jpg') }}" alt="Background">
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
		const baseURL = "/EXPO/public/";
	</script>

    <script src="/EXPO/public/js/main.js" type="module"></script>
</body>
</html>
