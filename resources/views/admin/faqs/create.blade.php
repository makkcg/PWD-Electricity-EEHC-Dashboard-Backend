@extends('admin.layouts.master')


@section('title')
سؤال شائع
@endsection
@section('style')
    <style>
     .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #1a5577;
}
    </style>
@endsection
@section('content')


<section class="content clearfix">
    <form method="post" action="{{ route('admin.faqs.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
 <h4 class="pull-left">سؤال شائع
  <small>انشاء سؤال شائع</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>انشاء سؤال شائع</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.faqs.form')



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
                $.ajax({
                    url: '/admin/faqs/image/ajax/'+imageID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('deleted');
                    }
                });
        });
    });
</script>

{{-- q_and_a sound --}}
<script type="text/javascript">
      var count2 =1;
 $(document).on('click','.add_q_and_a_sound',function(){
      $('#append-q-and-a-sounds').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="q_and_a_sound['+ count2 +']" type="file">'+
'</div>'+
'<div class="remove_q_and_a_sounds form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count2++;

    });

 $(document).on('click','.remove_q_and_a_sounds',function(){
      $(this.parentElement).remove();
    });
</script>
{{-- end q_and_a sound --}}


{{-- start q_and_a sound ajax --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteQAndASound').click(function() {
            var soundID = $(this).val();
                $.ajax({
                    url: '/admin/faqs/q_and_a_sound/ajax/'+soundID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('deleted');
                    }
                });
        });
    });
</script>
{{-- end q_and_a sound ajax --}}


{{-- q_and_a video --}}
<script type="text/javascript">
      var count4 =1;
 $(document).on('click','.add_q_and_a_video',function(){
      $('#append-q-and-a-videos').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="q_and_a_video['+ count4 +']" type="file">'+
'</div>'+
'<div class="remove_q_and_a_videos form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count4++;

    });

 $(document).on('click','.remove_q_and_a_videos',function(){
      $(this.parentElement).remove();
    });
</script>
{{-- end q_and_a video --}}

{{-- ajax q_and_a video --}}

<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteQAndAVideo').click(function() {
            var videoID = $(this).val();
                $.ajax({
                    url: '/admin/faqs/q_and_a_video/ajax/'+videoID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('deleted');
                    }
                });
        });
    });
</script>
{{--end ajax q_and_a video --}}


<script>
    CKEDITOR.replace( 'q_and_a_ar' );
</script>
@endsection
