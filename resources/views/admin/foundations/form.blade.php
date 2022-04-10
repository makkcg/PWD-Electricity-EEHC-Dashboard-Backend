
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">

        <div class="form-group col-md-12 {{ $errors->has('name_ar') ? ' has-error' : '' }}">
            <label for="name_ar">اسم المؤسسة</label>
            <input name="name_ar" class="form-control" type="text" value="{{ $item->translate('ar')->name }}">
            @if($errors->has('name_ar'))
            <span class="help-bloack">
                <strong>{{$errors->first('name_ar') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group col-md-12 {{ $errors->has('desc_ar') ? ' has-error' : '' }}">
          <label for="desc_ar">عن المؤسسة</label>
          <textarea name="desc_ar" class="form-control">{!! $item->translate('ar')->desc !!}</textarea>
          @if($errors->has('desc_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('desc_ar') }}</strong>
          </span>
          @endif
       </div>

        <div class="form-group col-md-6 {{ $errors->has('website') ? ' has-error' : '' }}">
            <label for="website">الموقع الالكتروني</label>
            <input name="website" class="form-control" type="text" value="{{ $item->website }}">
            @if($errors->has('website'))
            <span class="help-bloack">
            <strong>{{$errors->first('website') }}</strong>
            </span>
            @endif
       </div>

        <div class="form-group col-md-6 {{ $errors->has('map') ? ' has-error' : '' }}">
            <label for="map">الخريطة</label>
            <input name="map" class="form-control" type="text" value="{{ $item->map }}">
            @if($errors->has('map'))
            <span class="help-bloack">
            <strong>{{$errors->first('map') }}</strong>
            </span>
            @endif
       </div>

       <div class="form-group col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone">رقم الهاتف</label>
            <input name="phone" class="form-control" type="text" value="{{ $item->phone }}">
            @if($errors->has('phone'))
            <span class="help-bloack">
            <strong>{{$errors->first('phone') }}</strong>
            </span>
            @endif
       </div>

        <div class="form-group col-md-6 {{ $errors->has('landline') ? ' has-error' : '' }}">
            <label for="landline">الخط الارضي</label>
            <input name="landline" class="form-control" type="text" value="{{ $item->landline }}">
            @if($errors->has('landline'))
            <span class="help-bloack">
            <strong>{{$errors->first('landline') }}</strong>
            </span>
            @endif
       </div>

        <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">البريد الالكتروني</label>
            <input name="email" class="form-control" type="email" value="{{ $item->email }}">
            @if($errors->has('email'))
            <span class="help-bloack">
            <strong>{{$errors->first('email') }}</strong>
            </span>
            @endif
       </div>



<h4 class="form-group col-md-12" for="">صور المؤسسة</h4>
<div id="append-images">
    @if (isset($item->images))
    @foreach ($item->images as $image)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <img width="100px" height="100px" src="{!! url('/uploads/foundations/images/'.$image->image)!!}" />
    </div>
    <div class="remove_image form-group col-md-1">
        <button value="{{$image->id}}" class="btn btn-danger deleteImage">x</button>
    </div>
    </div>
    @endforeach
</div>
<div class="form-group col-md-12">
    @endif
    <div class="form-group col-md-1">
    <a class="add_image btn btn-success">+</a>
    </div>
</div>
<h4 class="form-group col-md-12" for="">اصوات المؤسسة</h4>
<div id="append-sounds">
    @if (isset($item->sounds))
    @foreach ($item->sounds as $sound)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <audio controls>
        <source src="{!! url('/uploads/foundations/sounds/'.$sound->sound)!!}" type="audio/mpeg">
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
<h4 class="form-group col-md-12" for="">فيديوهات المؤسسة</h4>
<div id="append-videos">
    @if (isset($item->videos))
    @foreach ($item->videos as $video)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <video controls>
        <source src="{!! url('/uploads/foundations/videos/'.$video->video)!!}" type="audio/mpeg">
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
