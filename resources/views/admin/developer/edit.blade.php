@extends('layout.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">تعديل مطور </h5>


                    <div class="card mb-4">
                        <div class="card-body">
                        <form method="post" action="{{Route('admin.developers.update',$developer->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم بالعربي</label>
                                    <input name="name_ar" required="" id="Name" value="{{ $developer->name_ar }}" type="text" class="form-control">
                                    @error('name_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم بالإنجليزي</label>
                                    <input name="name_en" required="" value="{{$developer->name_en}}" id="Name" type="text" class="form-control">
                                    @error('name_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الوصف بالعربي</label>
                                    <input name="description_ar" required="" value="{{$developer->description_ar}}" id="Description" type="text" class="form-control">
                                    @error('description_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الوصف بالإنجليزي</label>
                                    <input name="description_en" required="" value="{{$developer->description_en}}" id="Description" type="text" class="form-control">
                                    @error('description_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صورة الايقونة</label>
                                    <input name="logo" id="Name" type="file" accept="image/*" class="form-control">
                                    @error('logo')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
