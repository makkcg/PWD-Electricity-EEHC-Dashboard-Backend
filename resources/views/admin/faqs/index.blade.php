@extends('admin.layouts.master')


@section('title')
الاسئلة الشائعة
@endsection



@section('header-content')

    <section class="content-header">
        <h1>
            الاسئلة الشائعة
            <small>عرض الاسئلة الشائعة</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i>الرئيسية</a></li>
            <li class="active">عرض الاسئلة الشائعة</li>
        </ol>
    </section>

@endsection


@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->

                    <div class="box-body" >
                        <table dir="rtl" id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: right"> #</th>
                                <th style="text-align: right">الخدمة</th>
                                <th style="text-align: right">السؤال</th>
                                <th style="text-align: right">تم الانشاء في</th>
                                <th style="text-align: right">التحكم</th>
                            </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                            @forelse($items as $key=>$item)
                                <tr>
                                    @php $myArray = explode('؟', $item->q_and_a); @endphp
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->service->title}}</td>
                                    <td>{!! $myArray[0] !!} ؟</td>
                                    <td>{{ $item->created_at->toDateString()}}</td>
                                    <td>
                                        <form action="{{route('admin.faqs.destroy',$item)}}" method="post">

                                            <a href="{{route('admin.faqs.edit',$item)}}"
                                               class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method("delete")
                                            <button type="submit" name="delete" onclick="return confirm('Are You Sure ?');" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
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


