@extends('Templates/headerStruct')

@section('content')
<body>

    <div class="container-fluid" style="margin-top: auto; margin-bottom: auto;">
            <div class=" col-12 col-sm-12 col-md-12" align="center">

                @php
                    $youtube_embed_link = str_replace('watch?v=', 'embed/', 'https://www.youtube.com/watch?v=5SqDR-xLNIg');
                @endphp
                <iframe width="760" height="426" src="{{$youtube_embed_link}}" frameborder="0" allow="accelerometer; autoplay=true; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay=true>
                </iframe>
                            
            </div>
        </div>

@endsection