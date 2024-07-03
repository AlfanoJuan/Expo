@extends('Templates/headerStruct')

@section('content')
    
    <!--style>
    .a-box {
        position: relative;
        display: inline-block;
        text-align: center;
        margin: 0 auto;
        width: 500px;
        max-width: 100%;
        min-height: 500px;
    }

    .img-container {
        position: relative;
        height: 200px;
        width: 200px;
        overflow: hidden;
        border-radius: 0px 0px 20px 20px;
        display: inline-block;
    }

    .img-container img {
        transform: skew(0deg, -10deg);
        height: 250px;
        margin: -25px 0px 0px -50px;
    }

    .inner-skew {
        display: inline-block;
        border-radius: 20px;
        overflow: hidden;
        padding: 0px;
        transform: skew(0deg, 13deg);
        font-size: 0px;
        margin: 30px 0px 0px 0px;
        background-color: #000000;
        border-width: 0px 0px 3px 0px;
        border-color: #0de4fe;
        height: 250px;
        width: 200px;
    }

    .text-container {
        border-radius: 20px;
        background-color: #000000;
        border-width: 0px 0px 3px 0px;
        border-color: #0de4fe;
        padding: 120px 20px 20px 20px;
        margin: -120px 0px 0px 0px;
        font-size: 14px;
    }

    .text-container h3 {
        margin: 20px 0px 10px 0px;
        color: snow;
        font-size: 19px;
    }
    </style--->
    
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

<body style="background-image: url('../images/backgroundimg.png');  background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <div class="col-md-0">
                    <a class="m-0 navbar-brand align: center" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <h1 style="font-weight: bold; text-align:center">{{$projectdata[0]->nameProject}}</h1>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 pe-md-10" align="center">
                <div class="a-box col-8 col-md-8 col-lg-4 my-2" align="center">
                    <div class="img-container" align="center">
                        <div class="img-inner" align="center">
                            <div class="inner-skew">
                                <img src="{{ asset('storage/eventImages/'.$projectdata[0]->imagen_url) }}" >
                            </div>
                        </div>
                    </div>
                    <div class="text-container" align="center">
                        <h3>Materia: <b> {{$projectdata[0]->subject}}</b></h3>
                        <div>
                            <p style="font-size: 17px;">{{$projectdata[0]->description}}</p>
                        </div>
                        <h3>Alumno: @for ($i = 0; $i < count($studentsdata); $i++)
                                        <b> {{$studentsdata[$i]->fullName}}</b>
                                    @endfor
                        </h3>
                    </div>
                </div>
            </div>
        
            <div class=" col-6 col-sm-6 col-md-8" align="center">
                <div class="card dashboard-t" style="visibility: visible;" align="center">
                    <div class="container-fluid">
                    <div class="card-body row d-flex center-text-v flex-fill" style="visibility: visible;">
                        <div class="col-12 justify-content-center" align="center">
                            <div class="card-body d-flex center-text-v flex-fill" style="visibility: visible;">
                                @php
                                    $youtube_embed_link = str_replace('watch?v=', 'embed/', $projectdata[0]->video_url);
                                @endphp
                                <iframe width="760" height="426" src="{{$youtube_embed_link}}" frameborder="0" allow="accelerometer; autoplay=true; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay=true>
                                </iframe>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection