
<div dir="rtl">
   <!-- general form elements -->
   <div dir="rtl" class="box box-info">

      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">

        <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">اسم الصلاحية</label>
            <input name="name" class="form-control" type="text" value="{{ isset($role) ? $role->name : null }}">
            @if($errors->has('name'))
            <span class="help-bloack">
                <strong>{{$errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group col-md-12 {{ $errors->has('permissions') ? ' has-error' : '' }}">
            <label for="permissions">الصلاحية </label>
            <select multiple name="permissions[]" class=" form-control select2 @error("permissions") is-invalid @enderror">
                <option value="">اختر</option>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}"
                        @if(isset($role->permissions))
                        @foreach($role->permissions as $perm){{$perm->id == $permission->id ? 'selected': ''}}@endforeach
                         @endif>{{ $permission->name }}</option>
                @endforeach
            </select>
            @if($errors->has('permissions'))
            <span class="help-bloack">
            <strong>{{$errors->first('permissions') }}</strong>
            </span>
            @endif
         </div>
</div>
      <!-- /.box-body -->
   </div>
</div>

