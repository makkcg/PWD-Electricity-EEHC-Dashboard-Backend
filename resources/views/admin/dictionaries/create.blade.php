@extends('admin.layouts.master')


@section('title')
كلمة
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
    <form method="post" action="{{ route('admin.dictionaries.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
 <h4 class="pull-left">كلمة
  <small>انشاء كلمة</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>انشاء كلمة</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.dictionaries.form')



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


{{-- video --}}
<script type="text/javascript">
      var count4 =1;
 $(document).on('click','.add_video',function(){
      $('#append-videos').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="video['+ count4 +']" type="file">'+
'</div>'+
'<div class="remove_videos form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count4++;

    });

 $(document).on('click','.remove_videos',function(){
      $(this.parentElement).remove();
    });
</script>
{{-- end  video --}}




@endsection
