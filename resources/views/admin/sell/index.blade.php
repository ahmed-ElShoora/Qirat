@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة بيع الوحدات</h1>
                    </div>

                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card" style="overflow: auto">
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">الاسم</th>
                                <th scope="col" class="text-center">رقم الهاتف</th>
                                <th scope="col" class="text-center">نوع الوحدة</th>
                                <th scope="col" class="text-center">العنوان</th>
                                <th scope="col" class="text-center">الموقع</th>
                                <th scope="col" class="text-center">السعر</th>
                                <th scope="col" class="text-center">المساحة</th>
                                <th scope="col" class="text-center">الوصف</th>
                                <th scope="col" class="text-center">اخفاء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sells as $sell)
                                <tr>
                                    <td class="text-center">{{$sell->name}}</td>
                                    <td class="text-center">{{$sell->phone}}</td>
                                    <td class="text-center">{{$sell->type->name_ar}}</td>
                                    <td class="text-center">{{$sell->address}}</td>
                                    <td class="text-center">{{$sell->location}}</td>
                                    <td class="text-center">{{$sell->price}}</td>
                                    <td class="text-center">{{$sell->sqm}}</td>
                                    <td class="text-center">{{$sell->description}}</td>
                                    <td class="text-center">
                                        <a href="{{Route('admin.sells.hide',$sell->id)}}" class="btn btn-sm btn-outline-primary">اخفاء</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </main>
@endsection
