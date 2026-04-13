@extends('layout.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">تعديل بداية </h5>


                    <div class="card mb-4">
                        <div class="card-body">
                        <form method="post" action="{{Route('admin.intros.update',$intro->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم بالعربي</label>
                                    <input name="title_ar" required="" id="Name" value="{{ $intro->title_ar }}" type="text" class="form-control">
                                    @error('title_ar')
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
                                    <input name="title_en" required="" value="{{$intro->title_en}}" id="Name" type="text" class="form-control">
                                    @error('title_en')
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
                                    <input name="description_ar" required="" value="{{ $intro->description_ar }}" id="Description" type="text" class="form-control">
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
                                    <input name="description_en" required="" value="{{$intro->description_en}}" id="Description" type="text" class="form-control">
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
                                    <label>الرابط</label>
                                    <input name="link" id="Name" value="{{$intro->link}}" type="text" class="form-control">
                                    @error('link')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صورة الخلفية</label>
                                    <input name="image_background" id="Name" type="text" accept="image/*" class="form-control">
                                    @error('image_background')
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
                                    <input name="image_icon" id="Name" type="text" accept="image/*" class="form-control">
                                    @error('image_icon')
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
