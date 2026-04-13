@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة صفحات البداية</h1>
                        <div class="top-right-button-container">
                                    <a href="{{Route('admin.intros.create')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء صفحة بداية</a>
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
                                <th scope="col" class="text-center">تعديل</th>
                                <th scope="col" class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($intros as $intro)
                                <tr>
                                    <td class="text-center">{{$intro->title_ar}}</td>
                                    <td class="text-center">
                                        <a href="{{Route('admin.intros.edit',$intro->id)}}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    </td>
                                    <td class="text-center">
                                        <form method="post" action="{{Route('admin.intros.destroy',$intro->id)}}">
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
