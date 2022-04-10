@extends('admin.layouts.master')


@section('title')
المؤسسة
@endsection


@section('content')


<section class="content clearfix">
    <form method="post" action="{{ route('admin.foundations.update') }}" enctype="multipart/form-data">
     @csrf

 <h4 class="pull-left">المؤسسة
  <small>تحديث المؤسسة</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>تحديث المؤسسة</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.foundations.form')



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
            var url = '{{ route("foundation.imageAjax", ":imageID") }}';
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
            var url = '{{ route("foundation.soundAjax", ":soundID") }}';
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
            var url = '{{ route("foundation.videoAjax", ":videoID") }}';
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
@endsection
