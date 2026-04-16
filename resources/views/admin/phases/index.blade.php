@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة المراحل</h1>
                        <div class="top-right-button-container">
                                    <a href="{{Route('admin.phases.create',$unit_id)}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء مرحلة</a>
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
                                <th scope="col" class="text-center">اسم المرحلة</th>
                                <th scope="col" class="text-center">تعديل</th>
                                <th scope="col" class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phases as $phase)
                                <tr>
                                    <td class="text-center">{{$phase->title_ar}}</td>
                                    <td class="text-center">
                                        <a href="{{Route('admin.phases.edit',['unit_id' => $unit_id, 'phase' => $phase->id])}}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{Route('admin.phases.destroy',['unit_id' => $unit_id, 'phase' => $phase->id])}}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                        </form>
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
