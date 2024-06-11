@extends('admin.layouts.master')


@section('title')
الفرع
@endsection

@section('style')
<link rel="stylesheet" href="{{ URL::asset('/admin_style/jstree/src/themes/default/style.css')}}">

<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>
@endsection
@section('content')


<section class="content clearfix">
    <form method="post" action="{{ route('admin.branches.update',$item->id) }}" enctype="multipart/form-data">
     @csrf
        @method("put")
 <h4 class="pull-left">الفرع
  <small>تحديث الفرع</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>تحديث الفرع</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.branches.form')



   </div>
 </div>
</form>
 {{-- {{Form::close()  }} --}}
</section>

@endsection


@section('style')
<link rel="stylesheet" href="{{ URL::asset('/admin_style/jstree/src/themes/default/style.css')}}">
@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('/admin_style/jstree/src/jstree.js') }}"></script>
<script type="text/javascript">

  $(document).ready(function(){

    $('#jstree').jstree({
      "core" : {
        'multiple': false,
        "themes" : {
          "variant" : "large"
        }

      },
      "checkbox" : {
        "keep_selected_style" : true
      },
      "plugins" : [  ]
    });


  });

  $('#jstree').on("changed.jstree", function (e, data) {
    $('#parent_id').val(data.selected);
    console.log(data.selected);
  });

</script>

<script type="text/javascript">
      var count =1;
 $(document).on('click','.add_image',function(){
      $('#append-images').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="image['+ count +']" type="file">'+
'</div>'+
'<div class="remove_image form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count++;

    });

 $(document).on('click','.remove_image',function(){
      $(this.parentElement).remove();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteImage').click(function() {
            var imageID = $(this).val();
            var url = '{{ route("branch.imageAjax", ":imageID") }}';
            url = url.replace(':imageID',imageID);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('deleted');
                    }
                });
        });
    });
</script>

<script type="text/javascript">
      var count =1;
 $(document).on('click','.add_sound',function(){
      $('#append-sounds').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="sound['+ count +']" type="file">'+
'</div>'+
'<div class="remove_sounds form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count++;

    });

 $(document).on('click','.remove_sounds',function(){
      $(this.parentElement).remove();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteSound').click(function() {
            var soundID = $(this).val();
            var url = '{{ route("branch.soundAjax", ":soundID") }}';
            url = url.replace(':soundID',soundID);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('deleted');
                    }
                });
        });
    });
</script>
<script type="text/javascript">
      var count =1;
 $(document).on('click','.add_video',function(){
      $('#append-videos').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="video['+ count +']" type="file">'+
'</div>'+
'<div class="remove_videos form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count++;

    });

 $(document).on('click','.remove_videos',function(){
      $(this.parentElement).remove();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteVideo').click(function() {
            var videoID = $(this).val();
            var url = '{{ route("branch.videoAjax", ":videoID") }}';
            url = url.replace(':videoID',videoID);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('deleted');
                    }
                });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="states"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '{{ url('/admin/branches/ajax') }}' + '/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#city').empty();
                            $('#city').focus;
                            $('#city').append('<option value="">اختر</option>');
                            $.each(data, function(key, value){
                            $('select[name="city"]').append('<option value="'+ value.id +'" >' + value.translations[0].name + '</option>');
                         });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>
@endsection
