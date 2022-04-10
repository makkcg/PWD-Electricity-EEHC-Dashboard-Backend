
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">

        <div class="form-group col-md-12 {{ $errors->has('desc_ar') ? ' has-error' : '' }}">
          <label for="desc_ar">عن المشروع</label>
          <textarea name="desc_ar" class="form-control">{!! $item->translate('ar')->desc !!}</textarea>
          @if($errors->has('desc_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('desc_ar') }}</strong>
          </span>
          @endif
       </div>

<h4 class="form-group col-md-12" for="">اصوات عن المشروع</h4>
<div id="append-sounds">
    @if (isset($item->sounds))
    @foreach ($item->sounds as $sound)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <audio controls>
        <source src="{!! url('/uploads/abouts/sounds/'.$sound->sound)!!}" type="audio/mpeg">
        </audio>
        </div>
    <div class="remove_sounds form-group col-md-1">
        <input class="" type="hidden" name="">
        <button value="{{$sound->id}}" class="btn btn-danger deleteSound">x</button>
    </div>
    </div>
    @endforeach
</div>
<div class="form-group col-md-12">
    @endif
    <div class="form-group col-md-1">
    <a class="add_sound btn btn-success">+</a>
    </div>
</div>
<h4 class="form-group col-md-12" for="">فيديوهات عن المشروع</h4>
<div id="append-videos">
    @if (isset($item->videos))
    @foreach ($item->videos as $video)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <video controls>
        <source src="{!! url('/uploads/abouts/videos/'.$video->video)!!}" type="audio/mpeg">
        </video>
        </div>
    <div class="remove_videos form-group col-md-1">
        <input class="" type="hidden" name="">
        <button value="{{$video->id}}" class="btn btn-danger deleteVideo">x</button>
    </div>
    </div>
    @endforeach
</div>
<div class="form-group col-md-12">
    @endif
    <div class="form-group col-md-1">
    <a class="add_video btn btn-success">+</a>
    </div>
</div>
</div>
      <!-- /.box-body -->
   </div>

</div>
@section('scripts')
   <script>
          CKEDITOR.replace( 'desc_ar' );
   </script>
@endsection
