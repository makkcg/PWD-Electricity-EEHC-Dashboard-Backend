@extends('admin.layouts.master')


@section('title')
ملفات الاكسيل
@endsection


@section('content')


<section class="content clearfix">
     @csrf
     <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
 <h4 class="pull-left">ملفات الاكسيل
  <small>ادخال ملفات الاكسيل</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>ادخال ملفات الاكسيل</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.excels.form')



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

@endsection
