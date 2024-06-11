@extends('admin.layouts.master')


@section('title')
الخدمة
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
    <form method="post" action="{{ route('admin.services.update',$item->id) }}" enctype="multipart/form-data">
     @csrf
        @method("put")
 <h4 class="pull-left">الخدمة
  <small>تحديث الخدمة</small>
</h4>

<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i>تحديث الخدمة</button>

  </div>
</div>


  <div class="row">
    <div class="col-xs-12 row">




     @include('admin.services.form')



   </div>
 </div>
</form>

 {{-- start sub services --}}

 @if (!$item->subServices->isEmpty())
 <h3>الخدمات الفرعية</h3>
 <div class="row">
    <div class="col-xs-12">

        <div class="box">
            <!-- /.box-header -->

            <div class="box-body">

                <table dir="rtl" id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: right"> #</th>
                        <th style="text-align: right">العنوان</th>
                        <th style="text-align: right">الناشئ</th>
                        <th style="text-align: right">التحكم</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($item->subServices as $key=>$sub)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $sub->title}}</td>
                            <td>{{ $sub->admin->name}}</td>
                            <td>
                                <form action="{{route('admin.services.destroy',$sub)}}" method="post">

                                    <a href="{{route('admin.services.edit',$sub)}}"
                                       class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method("delete")
                                    <button type="submit" name="delete" onclick="return confirm('Are You Sure ?');" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>
@endif
 {{-- end sub services --}}
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
          var url = '{{ route("service.imageAjax", ":imageID") }}';
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

{{-- title sound --}}
<script type="text/javascript">
    var count2 =1;
$(document).on('click','.add_title_sound',function(){
    $('#append-title-sounds').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="title_sound['+ count2 +']" type="file">'+
'</div>'+
'<div class="remove_title_sounds form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count2++;

  });

$(document).on('click','.remove_title_sounds',function(){
    $(this.parentElement).remove();
  });
</script>
{{-- end title sound --}}

{{-- desc sound --}}
<script type="text/javascript">
    var count3 =1;
$(document).on('click','.add_desc_sound',function(){
    $('#append-desc-sounds').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="desc_sound['+ count3 +']" type="file">'+
'</div>'+
'<div class="remove_desc_sounds form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count3++;

  });

$(document).on('click','.remove_desc_sounds',function(){
    $(this.parentElement).remove();
  });
</script>
{{--end desc sound --}}

{{-- start title sound ajax --}}
<script type="text/javascript">
  $(document).ready(function() {
      $('.deleteTitleSound').click(function() {
          var soundID = $(this).val();
          var url = '{{ route("service.titleSoundAjax", ":soundID") }}';
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
{{-- end title sound ajax --}}

{{-- start desc sound ajax --}}
<script type="text/javascript">
  $(document).ready(function() {
      $('.deleteDescSound').click(function() {
          var soundID = $(this).val();
          var url = '{{ route("service.descSoundAjax", ":soundID") }}';
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
{{-- end desc sound ajax --}}

{{-- title video --}}
<script type="text/javascript">
    var count4 =1;
$(document).on('click','.add_title_video',function(){
    $('#append-title-videos').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="title_video['+ count4 +']" type="file">'+
'</div>'+
'<div class="remove_title_videos form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count4++;

  });

$(document).on('click','.remove_title_videos',function(){
    $(this.parentElement).remove();
  });
</script>
{{-- end title video --}}

{{-- ajax title video --}}

<script type="text/javascript">
  $(document).ready(function() {
      $('.deleteTitleVideo').click(function() {
          var videoID = $(this).val();
          var url = '{{ route("service.titleVideoAjax", ":videoID") }}';
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
{{--end ajax title video --}}

{{-- desc video --}}
<script type="text/javascript">
  var count5 =1;
$(document).on('click','.add_desc_video',function(){
  $('#append-desc-videos').append(

'<div class="form-group col-md-12">'+
'<div class="form-group col-md-11">'+
'<input name="desc_video['+ count5 +']" type="file">'+
'</div>'+
'<div class="remove_desc_videos form-group col-md-1">'+
'<button class="btn btn-danger">x</button>'+
'</div>'+
'</div>');
count5++;

});

$(document).on('click','.remove_desc_videos',function(){
  $(this.parentElement).remove();
});
</script>
{{-- end desc video --}}

{{-- ajax desc video --}}

<script type="text/javascript">
$(document).ready(function() {
    $('.deleteDescVideo').click(function() {
        var videoID = $(this).val();
        var url = '{{ route("service.descVideoAjax", ":videoID") }}';
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
{{--end ajax desc video --}}
<script>
    $(document).ready(function() {
    $('.select2').select2({
        placeholder: "اختر الفروع",
        minimumResultsForSearch: Infinity
    });
   });

  $("#all").click(function(){
    if($("#all").is(':checked') ){
        $("#branches > option").prop("selected","selected");
        $("#branches").trigger("change");
    }else{
        $("#branches > option").removeAttr("selected");
         $("#branches").trigger("change");
     }
  });
</script>
<script>
    CKEDITOR.replace( 'desc_ar' );
</script>
@endsection
