@extends('admin.layouts.master')

@section('style')
<style>
    .contain {
      position: relative;
      text-align: center;
      color: white;
    }
    .top-left {
      position: absolute;
      top: 8px;
      left: 16px;
    }
    </style>
@endsection

@section('content')




<div style="margin-top: -20px" class="contain">
<img width="100%" src="{{ asset('uploads/splash.png') }}" alt="" >
<div class="top-left">
 <a class="btn btn-success" href="{{ route('jsonFile') }}">تحديث التابلت والديسكتوب</a>
 </div>
	@endsection
</div>

