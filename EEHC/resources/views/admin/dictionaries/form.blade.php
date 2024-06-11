
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">




        <div class="form-group col-md-12 {{ $errors->has('word') ? ' has-error' : '' }}">
          <label for="word">الكلمة</label>
          <textarea name="word" class="form-control">{!! isset($item) ? old('word', $item->word) : '' !!}</textarea>
          @if($errors->has('word'))
          <span class="help-bloack">
          <strong>{{$errors->first('word') }}</strong>
          </span>
          @endif
       </div>

       <div class="form-group col-md-12 {{ $errors->has('column') ? ' has-error' : '' }}">
        <label for="column">رقم العمود</label>
        <input name="column" class="form-control" type="number" value="{{isset($item) ? old('column', $item->column) : '' }}">
        @if($errors->has('column'))
        <span class="help-bloack">
            <strong>{{$errors->first('column') }}</strong>
        </span>
        @endif
    </div>

    <h4 class="form-group col-md-12" for="">صور الكلمة</h4>
        <div id="append-images">
            @if (isset($item->media))
            @foreach ($item->media as $image)
            @if (isset($image->image))
            <div class="form-group col-md-12">
            <div class="form-group col-md-11">
                <img width="100px" height="100px" src="{!! url('/uploads/dictionary/images/'.$image->image)!!}" />
            </div>
            <div class="remove_image form-group col-md-1">
                <button value="{{$image->id}}" class="btn btn-danger deleteImage">x</button>
            </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="form-group col-md-12">
            @endif
            <div class="form-group col-md-1">
            <a class="add_image btn btn-success">+</a>
            </div>
        </div>

       <h4 class="form-group col-md-12" for="">فيديوهات الاشارة للكلمة</h4>
       <div id="append-videos">
           @if (isset($item->media))
           @foreach ($item->media as $video)
           @if (isset($video->video))
           <div class="form-group col-md-12">
           <div class="form-group col-md-11">
               <video controls>
               <source src="{!! url('/uploads/dictionary/videos/'.$video->video)!!}" type="audio/mpeg">
               </video>
               </div>
           <div class="remove_videos form-group col-md-1">
               <input class="" type="hidden" name="">
               <button value="{{$video->id}}" class="btn btn-danger deleteVideo">x</button>
           </div>
           </div>
           @endif
           @endforeach
           @endif
       </div>
       <div class="form-group col-md-12">
           <div class="form-group col-md-1">
           <a class="add_video btn btn-success">+</a>
           </div>
       </div>


</div>
      <!-- /.box-body -->
   </div>

</div>

