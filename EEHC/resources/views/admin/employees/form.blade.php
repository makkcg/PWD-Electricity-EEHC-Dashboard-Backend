
<div  class="col-md-12">
   <!-- general form elements -->
   <div class="box box-info">
      <div class="box-header with-border">
         <h3 class="box-title">موظف</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">


        <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">الاسم</label>
            <input name="name" class="form-control" type="text" value="{{isset($item) ? old('name', $item->name) : '' }}">
            @if($errors->has('name'))
            <span class="help-bloack">
            <strong>{{$errors->first('name') }}</strong>
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

        <div class="form-group col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone">رقم الهاتف</label>
            <input name="phone" class="form-control" type="text" value="{{isset($item) ? old('phone', $item->phone) : '' }}">
            @if($errors->has('phone'))
            <span class="help-bloack">
            <strong>{{$errors->first('phone') }}</strong>
            </span>
            @endif
       </div>


       <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">كلمة السر</label>
        <input name="password" class="form-control" type="password" value="">
        @if($errors->has('password'))
        <span class="help-bloack">
        <strong>{{$errors->first('password') }}</strong>
        </span>
        @endif
   </div>
    <div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password_confirmation">تأكيد كلمة السر</label>
        <input name="password_confirmation" class="form-control" type="password" value="">
        @if($errors->has('name_en'))
        <span class="help-bloack">
        <strong>{{$errors->first('password_confirmation') }}</strong>
        </span>
        @endif
   </div>

       <div class="form-group col-md-6 {{ $errors->has('branch_id') ? ' has-error' : '' }}">
        <label for="branch_id">الفروع</label>
        <select name="branch_id" class="form-control">
            <option value="">اختر الفرع</option>
           @foreach ($branches as $branch )
           <option  value="{{ $branch->id }}"  {{ (isset($item) ? ($item->branch_id == $branch->id) ? 'selected' : '' : '') }}>{{ $branch->translate('ar')->name }}</option>
           @endforeach
        </select>
        @if($errors->has('branch_id'))
        <span class="help-bloack">
        <strong>{{$errors->first('branch_id') }}</strong>
        </span>
        @endif
   </div>
      </div>
      <!-- /.box-body -->
   </div>

</div>
