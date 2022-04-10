@extends('admin.layouts.master')


@section('title')
الصلاحيات
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
    <form action="{{ route('admin.roles.update', $role) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
 <h4 class="pull-left">الصلاحيات
  <small>تحديث الصلاحيات</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>تحديث الصلاحيات</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.roles.form')



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

  $(document).ready(function() {
    $('.select2').select2();
   });
</script>

@endsection
