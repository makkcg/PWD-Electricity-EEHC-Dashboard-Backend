
<div  class="col-md-12">
   <!-- general form elements -->
   <div class="box box-info">
      <div class="box-header with-border">
         <h3 class="box-title">مشرف</h3>
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
            @if($errors->has('password_confirmation'))
            <span class="help-bloack">
            <strong>{{$errors->first('password_confirmation') }}</strong>
            </span>
            @endif
       </div>

        <div class="form-group col-md-6 {{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="role">صلاحية المشرف</label>
            <select name="role" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{ isset($item) ? (($item->roles->first()->id == $role->id) ? 'selected' : '') : '' }}>{{$role->name}}</option>
                @endforeach
            </select>
            @if($errors->has('role'))
            <span class="help-bloack">
            <strong>{{$errors->first('role') }}</strong>
            </span>
            @endif
       </div>



      </div>
      <!-- /.box-body -->
   </div>

</div>
