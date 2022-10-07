
@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Siparisler | TechNorm Mühendislik & Danismanlik </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<div class="container">

    <form method="post" action="{{route('user.dosya.gonder',$userorder->id)}}" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="order_id" value="{{$userorder->id}}">
        @csrf
    </form>
    <style>



        .item{

            left: 0;

            top: 0;

            position: relative;

            overflow: hidden;

            margin-top:25px;



        }

        .item img{

            -webkit-transition: 0.6s ease;

            transition: 0.6s ease;



        }

        .item img:hover{

            -webkit-transform: scale(1.2);

            transform: scale(1.2);



        }

        .img-thumbnail{

            border:2px;

            border-radius:2px;

        }

    </style>

    <div style="margin-top: 25px;" class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <div style="display: inline;" class="panel-body">
                        <h4 class="form-section"><i class="ft-mail"></i>Uploaded Files</h4>
                        <div class="container">
                            <div class="row">
                                @forelse($photos as $photo)
                                    <div class="col-md-4">
                                        <div class="item">
                                            <img style="height: 150px;margin: 15px;" src="/frontend/uploads/dosyalar/{{ $photo->imagex}}" class="img-thumbnail"></div>
                                            <div>{{$photo->imagex}}</div>
                                            <a  style="display: inline;"   class="btn  btn-danger " href="{{ route('user.dosya.sil',$photo->id) }}" data-toggle="tooltip" data-placement="top" title="delete" onclick="return confirm('Veriyi Silerseniz geri döndüremezsiniz. Silmek istiyor musunuz ? ')">Delete</a><br><br>
                                    </div>
                                @empty

                                    <div>

                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <a href="{{route('order-step3')}}" class="btn btn-info">Geri Dön</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.iges,.stp,.step,.prt,.sat,.stl,.obj,.3ds,.igs,.stp,.step,.ply,.x_t,.sldprt",

            addRemoveLinks: false,
            timeout: 5000,
            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
                return false;
            }
        };
</script>
@endsection



