
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">

        <div class="form-group col-md-12 {{ $errors->has('name_ar') ? ' has-error' : '' }}">
            <label for="name_ar">اسم الفرع</label>
            <input name="name_ar" class="form-control" type="text" value="{{isset($item) ? old('name_ar', $item->translate('ar')->name) : '' }}">
            @if($errors->has('name_ar'))
            <span class="help-bloack">
                <strong>{{$errors->first('name_ar') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group col-md-12 {{ $errors->has('desc_ar') ? ' has-error' : '' }}">
          <label for="desc_ar">عن الفرع</label>
          <textarea name="desc_ar" class="form-control">{!! isset($item) ? old('desc_ar', $item->translate('ar')->desc) : '' !!}</textarea>
          @if($errors->has('desc_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('desc_ar') }}</strong>
          </span>
          @endif
       </div>

        <div class="form-group col-md-12 {{ $errors->has('note_ar') ? ' has-error' : '' }}">
          <label for="note_ar">ملاحظات</label>
          <textarea name="note_ar" class="form-control">{!! isset($item) ? old('note_ar', $item->translate('ar')->note) : '' !!}</textarea>
          @if($errors->has('note_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('note_ar') }}</strong>
          </span>
          @endif
       </div>

        <div class="form-group col-md-12 {{ $errors->has('address_ar') ? ' has-error' : '' }}">
          <label for="address_ar">العنوان</label>
          <textarea name="address_ar" class="form-control">{!! isset($item) ? old('address_ar', $item->translate('ar')->address) : '' !!}</textarea>
          @if($errors->has('address_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('address_ar') }}</strong>
          </span>
          @endif
       </div>



    <div class="form-group col-md-6 {{ $errors->has('city') ? ' has-error' : '' }}">
        <label for="city">المدينة</label>
        <select id="city" name="city" class="form-control">
            @if (isset($item))
            <option  value="{{ $item->city_id }}" selected>{{ $item->city->translate('ar')->name }} </option>
            @endif

        </select>
        @if($errors->has('city'))
        <span class="help-bloack">
        <strong>{{$errors->first('city') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-6 {{ $errors->has('states') ? ' has-error' : '' }}">
        <label for="states">المحافظة</label>
        <select name="states" class="form-control">
            <option value="">اختر</option>
           @foreach ($states as $state )
           <option  value="{{ $state->id }}"  {{ (isset($item) ? ($item->city->state_id == $state->id) ? 'selected' : '' : '') }}>{{ $state->translate('ar')->name }}</option>
           @endforeach
        </select>
        @if($errors->has('states'))
        <span class="help-bloack">
        <strong>{{$errors->first('states') }}</strong>
        </span>
        @endif
   </div>

   <div class="form-group col-md-6 {{ $errors->has('phone2') ? ' has-error' : '' }}">
    <label for="phone2"> رقم الهاتف 2</label>
    <input name="phone2" class="form-control" type="text" value="{{isset($item) ? old('phone2', $item->phone2) : '' }}">
    @if($errors->has('phone2'))
    <span class="help-bloack">
    <strong>{{$errors->first('phone2') }}</strong>
    </span>
    @endif
</div>
       <div class="form-group col-md-6 {{ $errors->has('phone1') ? ' has-error' : '' }}">
            <label for="phone1"> رقم الهاتف 1</label>
            <input name="phone1" class="form-control" type="text" value="{{isset($item) ? old('phone1', $item->phone1) : '' }}">
            @if($errors->has('phone1'))
            <span class="help-bloack">
            <strong>{{$errors->first('phone1') }}</strong>
            </span>
            @endif
       </div>


       <div class="form-group col-md-6 {{ $errors->has('landline2') ? ' has-error' : '' }}">
        <label for="landline2"> رقم الخط الارضي 2</label>
        <input name="landline2" class="form-control" type="text" value="{{isset($item) ? old('landline2', $item->landline2) : '' }}">
        @if($errors->has('landline2'))
        <span class="help-bloack">
        <strong>{{$errors->first('landline2') }}</strong>
        </span>
        @endif
   </div>

       <div class="form-group col-md-6 {{ $errors->has('landline1') ? ' has-error' : '' }}">
            <label for="landline1"> رقم الخط الارضي 1</label>
            <input name="landline1" class="form-control" type="text" value="{{isset($item) ? old('landline1', $item->landline1) : '' }}">
            @if($errors->has('landline1'))
            <span class="help-bloack">
            <strong>{{$errors->first('landline1') }}</strong>
            </span>
            @endif
       </div>



       <div class="form-group col-md-6 {{ $errors->has('map') ? ' has-error' : '' }}">
        <label for="map">الخريطة</label>
        <input name="map" class="form-control" type="text" value="{{isset($item) ? old('map', $item->map) : '' }}">
        @if($errors->has('map'))
        <span class="help-bloack">
        <strong>{{$errors->first('map') }}</strong>
        </span>
        @endif
   </div>
        <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">البريد الالكتروني</label>
            <input name="email" class="form-control" type="email" value="{{isset($item) ? old('email', $item->email) : '' }}">
            @if($errors->has('email'))
            <span class="help-bloack">
            <strong>{{$errors->first('email') }}</strong>
            </span>
            @endif
       </div>

       <div class="form-group col-md-6 {{ $errors->has('pwd_status') ? ' has-error' : '' }}">
        <label for="pwd_status">يدعم  ذوي  الاعاقة السمعية</label>
        <label class="switch">
            <input name="pwd_status" value="1" type="checkbox" {{isset($item) ? ($item->pwd_status == 1) ? 'checked' : '' : ''  }}>
            <span class="slider round"></span>
         </label>
        @if($errors->has('pwd_status'))
        <span class="help-bloack">
        <strong>{{$errors->first('pwd_status') }}</strong>
        </span>
        @endif
      </div>

<h4 class="form-group col-md-12" for="">صور الفرع</h4>
<div id="append-images">
    @if (isset($item->images))
    @foreach ($item->images as $image)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <img width="100px" height="100px" src="{!! url('/uploads/branches/images/'.$image->image)!!}" />
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
<h4 class="form-group col-md-12" for="">اصوات الفرع</h4>
<div id="append-sounds">
    @if (isset($item->sounds))
    @foreach ($item->sounds as $sound)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <audio controls>
        <source src="{!! url('/uploads/branches/sounds/'.$sound->sound)!!}" type="audio/mpeg">
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
<h4 class="form-group col-md-12" for="">فيديوهات الفرع</h4>
<div id="append-videos">
    @if (isset($item->videos))
    @foreach ($item->videos as $video)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <video controls>
        <source src="{!! url('/uploads/branches/videos/'.$video->video)!!}" type="audio/mpeg">
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
          CKEDITOR.replace( 'note_ar' );
   </script>
@endsection
