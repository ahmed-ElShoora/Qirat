@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة الوحدات </h1>
                        <div class="top-right-button-container">
                                    <a href="{{Route('admin.units.create')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء وحدة</a>
                        </div>
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
                                <th scope="col" class="text-center">الاسم بالعربي</th>
                                <th scope="col" class="text-center">اسم المطور</th>
                                <th scope="col" class="text-center">نوع العقار</th>
                                <th scope="col" class="text-center">نوعية العقار</th>
                                <th scope="col" class="text-center"> تواجد المشروع</th>
                                <th scope="col" class="text-center">تحديدة كالعقار المميز</th>
                                <th scope="col" class="text-center">حالة الظهور</th>
                                <th scope="col" class="text-center">المراحل</th>    
                                <th scope="col" class="text-center">تعديل</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units as $unit)
                                <tr>
                                    <td class="text-center">{{$unit->title_ar}}</td>
                                    <td class="text-center">{{$unit->developer->name_ar}}</td>
                                    <td class="text-center">{{$unit->type->name_ar}}</td>
                                    <td class="text-center">{{$unit->other_type}}</td>
                                    <td class="text-center">{{$unit->project_state}}</td>
                                    <td class="text-center">
                                        @if(!$unit->is_promotion)
                                            <a href="{{Route('admin.units.promotion',$unit->id)}}" class="btn btn-sm btn-outline-primary">تمييز</a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{Route('admin.units.hide',$unit->id)}}" class="btn btn-sm 
                                            @if($unit->is_hide)
                                                btn-outline-primary
                                            @else
                                                btn-outline-danger
                                            @endif
                                            ">
                                            @if($unit->is_hide)
                                                اظهار
                                            @else
                                                اخفاء
                                            @endif
                                        </a>
                                    </td>
                                     <td class="text-center">
                                        <a href="{{Route('admin.phases.index',$unit->id)}}" class="btn btn-sm btn-outline-primary">المراحل</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{Route('admin.units.edit',$unit->id)}}" class="btn btn-sm btn-outline-primary">تعديل</a>
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
