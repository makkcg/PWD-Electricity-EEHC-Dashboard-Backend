
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">




        <div class="form-group col-md-12 {{ $errors->has('desc_ar') ? ' has-error' : '' }}">
          <label for="desc_ar">وصف الاجراء</label>
          <textarea name="desc_ar" class="form-control">{!! isset($item) ? old('desc_ar', $item->translate('ar')->desc) : '' !!}</textarea>
          @if($errors->has('desc_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('desc_ar') }}</strong>
          </span>
          @endif
       </div>

       <h4 class="form-group col-md-12" for="">اصوات وصف الاجراء</h4>
       <div id="append-desc-sounds">

           @if (isset($item->translation->media))
           @foreach ($item->translation->media as $sound)
           @if (isset($sound->desc_sound))

           <div class="form-group col-md-12">
           <div class="form-group col-md-11">
               <audio controls>
               <source src="{!! url('/uploads/procedures/sounds/desc/'.$sound->desc_sound)!!}" type="audio/mpeg">
               </audio>
               </div>
           <div class="remove_desc_sounds form-group col-md-1">
               <input class="" type="hidden" name="">
               <button value="{{$sound->id}}" class="btn btn-danger deleteDescSound">x</button>
           </div>
           </div>
            @endif
           @endforeach
           @endif

       </div>
       <div class="form-group col-md-12 ">
           <div class="form-group col-md-1">
           <a class="add_desc_sound btn btn-success">+</a>
           </div>
       </div>
       <h4 class="form-group col-md-12" for="">فيديوهات وصف الاجراء</h4>
       <div id="append-desc-videos">
           @if (isset($item->translation->media))
           @foreach ($item->translation->media as $video)
           @if (isset($video->desc_video))
           <div class="form-group col-md-12">
           <div class="form-group col-md-11">
               <video controls>
               <source src="{!! url('/uploads/procedures/videos/desc/'.$video->desc_video)!!}" type="audio/mpeg">
               </video>
               </div>
           <div class="remove_desc_videos form-group col-md-1">
               <input class="" type="hidden" name="">
               <button value="{{$video->id}}" class="btn btn-danger deleteDescVideo">x</button>
           </div>
           </div>
           @endif
           @endforeach
           @endif
       </div>
       <div class="form-group col-md-12">
           <div class="form-group col-md-1">
           <a class="add_desc_video btn btn-success">+</a>
           </div>
       </div>

       <div class="form-group col-md-6 {{ $errors->has('procedures') ? ' has-error' : '' }}">
        <label for="services">الخدمة </label>
        <small>اختر الخدمة التابع لها</small>
        <select name="services" class="form-control">
            <option value="">اختر</option>
           @foreach ($services as $service )
           <option  value="{{ $service->id }}"  {{ (isset($item) ? ($item->service_id == $service->id) ? 'selected' : '' : '') }}>{{ $service->translate('ar')->title }}</option>
           @endforeach
        </select>
        @if($errors->has('services'))
        <span class="help-bloack">
        <strong>{{$errors->first('services') }}</strong>
        </span>
        @endif
     </div>

    <div class="form-group col-md-6 {{ $errors->has('order') ? ' has-error' : '' }}">
        <label for="order">ترتيب الاجراء</label>
        <input name="order" class="form-control" type="number" value="{{isset($item) ? old('order', $item->order) : '' }}">
        @if($errors->has('order'))
        <span class="help-bloack">
            <strong>{{$errors->first('order') }}</strong>
        </span>
        @endif
    </div>

<h4 class="form-group col-md-12" for="">صور الاجراء</h4>
<div id="append-images">
    @if (isset($item->images))
    @foreach ($item->images as $image)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <img width="100px" height="100px" src="{!! url('/uploads/procedures/images/'.$image->image)!!}" />
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


</div>
      <!-- /.box-body -->
   </div>

</div>

