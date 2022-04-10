
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">

        <div class="form-group col-md-12 {{ $errors->has('q_and_a_ar') ? ' has-error' : '' }}">
          <label for="q_and_a_ar">السؤال الشائع والاجابة</label>
          <textarea name="q_and_a_ar" class="form-control">{!! isset($item) ? old('q_and_a_ar', $item->translate('ar')->q_and_a) : '' !!}</textarea>
          @if($errors->has('q_and_a_ar'))
          <span class="help-bloack">
          <strong>{{$errors->first('q_and_a_ar') }}</strong>
          </span>
          @endif
       </div>

       <h4 class="form-group col-md-12" for="">اصوات السؤال والاجابة</h4>
       <div id="append-q-and-a-sounds">

           @if (isset($item->translation->media))
           @foreach ($item->translation->media as $sound)
           @if (isset($sound->q_and_a_sound))

           <div class="form-group col-md-12">
           <div class="form-group col-md-11">
               <audio controls>
               <source src="{!! url('/uploads/faqs/sounds/q_and_a/'.$sound->q_and_a_sound)!!}" type="audio/mpeg">
               </audio>
               </div>
           <div class="remove_q_and_a_sounds form-group col-md-1">
               <input class="" type="hidden" name="">
               <button value="{{$sound->id}}" class="btn btn-danger deleteQAndASound">x</button>
           </div>
           </div>
            @endif
           @endforeach
           @endif

       </div>
       <div class="form-group col-md-12 ">
           <div class="form-group col-md-1">
           <a class="add_q_and_a_sound btn btn-success">+</a>
           </div>
       </div>
       <h4 class="form-group col-md-12" for="">فيديوهات السؤال والاجابة</h4>
       <div id="append-q-and-a-videos">
           @if (isset($item->translation->media))
           @foreach ($item->translation->media as $video)
           @if (isset($video->q_and_a_video))
           <div class="form-group col-md-12">
           <div class="form-group col-md-11">
               <video controls>
               <source src="{!! url('/uploads/faqs/videos/q_and_a/'.$video->q_and_a_video)!!}" type="audio/mpeg">
               </video>
               </div>
           <div class="remove_q_and_a_videos form-group col-md-1">
               <input class="" type="hidden" name="">
               <button value="{{$video->id}}" class="btn btn-danger deleteQAndAVideo">x</button>
           </div>
           </div>
           @endif
           @endforeach
           @endif
       </div>
       <div class="form-group col-md-12">
           <div class="form-group col-md-1">
           <a class="add_q_and_a_video btn btn-success">+</a>
           </div>
       </div>

       <div class="form-group col-md-6 {{ $errors->has('faqs') ? ' has-error' : '' }}">
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
        <label for="order">ترتيب السؤال الشائع</label>
        <input name="order" class="form-control" type="number" value="{{isset($item) ? old('order', $item->order) : '' }}">
        @if($errors->has('order'))
        <span class="help-bloack">
            <strong>{{$errors->first('order') }}</strong>
        </span>
        @endif
    </div>

<h4 class="form-group col-md-12" for="">صور السؤال الشائع</h4>
<div id="append-images">
    @if (isset($item->images))
    @foreach ($item->images as $image)
    <div class="form-group col-md-12">
    <div class="form-group col-md-11">
        <img width="100px" height="100px" src="{!! url('/uploads/faqs/images/'.$image->image)!!}" />
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

