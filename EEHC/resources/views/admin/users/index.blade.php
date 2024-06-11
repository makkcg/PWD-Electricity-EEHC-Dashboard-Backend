@extends('admin.layouts.master')


@section('title')
ذوي الاعاقة السمعية
@endsection






@section('header-content')

    <section class="content-header">
        <h1>
            ذوي الاعاقة السمعية
            <small>عرض ذوي الاعاقة السمعية
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">عرض ذوي الاعاقة السمعية
            </li>
        </ol>
    </section>

@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->

                    <div class="box-body">

                        <table dir="rtl" id="example1" class="table table-bordered table-striped">
                            <thead >
                            <tr >
                                <th style="text-align: right"> #</th>
                                <th style="text-align: right">الاسم</th>
                                <th style="text-align: right">الايميل</th>
                                <th style="text-align: right">رقم الهاتف</th>
                                <th style="text-align: right">تم الانشاء في</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($items as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>{{ $item->phone}}</td>
                                    <td>{{ $item->created_at->toDateString()}}</td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </section>


@endsection



@section('script')

    <script type="text/javascript">

        $('#checkbtn').vSwitch({theme: 'blue'});
        $('.checkbtnC').vSwitch({theme: 'blue'});
    </script>



@endsection


