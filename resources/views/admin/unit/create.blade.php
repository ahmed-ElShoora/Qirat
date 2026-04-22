@extends('layout.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">انشاء وحدة جديد</h5>


                    <div class="card mb-4">
                        <div class="card-body">
                        <form method="post" action="{{Route('admin.units.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الصورة الرئيسية ***</label>
                                    <input name="primary_image" required="" id="Name" type="file" accept="image/*" class="form-control">
                                    @error('primary_image')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صور السلايدر ***</label>
                                    <input name="slider_images[]" required="" id="Name" type="file" accept="image/*" class="form-control" multiple>
                                    @error('slider_images')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم بالعربي ***</label>
                                    <input name="title_ar" required="" id="Name" type="text" class="form-control">
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
                                    <label>الاسم بالإنجليزي ***</label>
                                    <input name="title_en" required="" id="Name" type="text" class="form-control">
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
                                    <label>المساحة بالمتر</label>
                                    <input name="sqm" id="Name" type="number" min="0" class="form-control">
                                    @error('sqm')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>العنوان بالعربي</label>
                                    <input name="address_ar" id="Name" type="text" class="form-control">
                                    @error('address_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>العنوان بالإنجليزي</label>
                                    <input name="address_en" id="Name" type="text" class="form-control">
                                    @error('address_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>



                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الطابق بالعربي</label>
                                    <input name="floor_ar" id="Name" type="text" class="form-control">
                                    @error('floor_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الطابق بالإنجليزي</label>
                                    <input name="floor_en" id="Name" type="text" class="form-control">
                                    @error('floor_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>باركنج بالعربي</label>
                                    <input name="parking_ar" id="Name" type="text" class="form-control">
                                    @error('parking_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>باركنج بالإنجليزي</label>
                                    <input name="parking_en" id="Name" type="text" class="form-control">
                                    @error('parking_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الview بالعربي</label>
                                    <input name="view_ar" id="Name" type="text" class="form-control">
                                    @error('view_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الview بالإنجليزي</label>
                                    <input name="view_en" id="Name" type="text" class="form-control">
                                    @error('view_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>استلام عند</label>
                                    <input name="status_ar" id="Name" type="text" class="form-control">
                                    @error('status_ar')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>استلام عند بالإنجليزي</label>
                                    <input name="status_en" id="Name" type="text" class="form-control">
                                    @error('status_en')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>اولوية العرض ***</label>
                                    <select name="priority" required class="form-control form-select"style="width: 50%;">
                                        <option disabled selected>اختر اولوية العرض</option>
                                        <option value="A">عالي</option>
                                        <option value="B">متوسط</option>
                                        <option value="C">منخفض</option>
                                        <option value="D">منخفض جدا</option>
                                    </select>
                                    @error('priority')
                                        <div class="alert alert-danger" role="alert" style="text-align: center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>نوع الوحدة ***</label>
                                    <select name="type_id" required class="form-control form-select"style="width: 50%;">
                                        <option disabled selected>اختر نوع الوحدة</option>
                                        @foreach($data['types'] as $type)
                                            <option value="{{ $type->id }}">{{ $type->name_ar }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="alert alert-danger" role="alert" style="text-align: center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>المطور ***</label>
                                    <select name="developer_id" required class="form-control form-select"style="width: 50%;">
                                        <option disabled selected>اختر مطور الوحدة</option>
                                        @foreach($data['developers'] as $developer)
                                            <option value="{{ $developer->id }}">{{ $developer->name_ar }}</option>
                                        @endforeach
                                    </select>
                                    @error('developer_id')
                                        <div class="alert alert-danger" role="alert" style="text-align: center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>المميزات ***</label>
                                    <select name="signatures[]" required class="form-control form-select"style="width: 50%;" multiple>
                                        <option disabled selected>اختر ميزات الوحدة</option>
                                        @foreach($data['signatures'] as $signature)
                                            <option value="{{ $signature->id }}">{{ $signature->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('signatures')
                                        <div class="alert alert-danger" role="alert" style="text-align: center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>نوع الوحدة ***</label>
                                    <select name="other_type" required class="form-control form-select"style="width: 50%;">
                                        <option disabled selected>اختر النوع</option>
                                        <option value="developer">developer</option>
                                        <option value="resale">resale</option>
                                    </select>
                                    @error('other_type')
                                        <div class="alert alert-danger" role="alert" style="text-align: center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>حالة المشروع ***</label>
                                    <select name="project_state" required class="form-control form-select"style="width: 50%;">
                                        <option disabled selected>اختر حالة المشروع</option>
                                        <option value="unit">unit</option>
                                        <option value="launche">launche</option>
                                    </select>
                                    @error('project_state')
                                        <div class="alert alert-danger" role="alert" style="text-align: center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>


                            

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>سعر المطور ***</label>
                                    <input name="developer_price" required="" id="developer_price" type="text" class="form-control">
                                    @error('developer_price')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>نسبة المقدم ***</label>
                                    <input name="down_payment_percentage" required id="down_payment_percentage" type="number" class="form-control">
                                    @error('down_payment_percentage')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>نسبة القسط ***</label>
                                    <input name="payment_percentage_per_year" required id="payment_percentage_per_year" type="number" class="form-control">
                                    @error('payment_percentage_per_year')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الدفعة كام فالسنة ***</label>
                                    <input name="pay_amount_per_years" required id="pay_amount_per_years" type="number" class="form-control">
                                    @error('pay_amount_per_years')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>عدد السنوات ***</label>
                                    <input name="years_count" required id="years_count" type="number" class="form-control">
                                    @error('years_count')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>سعر إعادة البيع (في حالة ال resale)</label>
                                    <input name="resale_price" id="resale_price" type="text" class="form-control">
                                    @error('resale_price')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>رقم الهاتف ***</label>
                                    <input name="phone_number" required="" id="phone_number" type="text" class="form-control">
                                    @error('phone_number')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>رقم الواتساب ***</label>
                                    <input name="whatsapp" required="" id="Whatsapp" type="text" class="form-control">
                                    @error('whatsapp')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>خط الطول ***</label>
                                    <input name="lng" required="" id="lng" type="text" class="form-control">
                                    @error('lng')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>خط العرض ***</label>
                                    <input name="lat" required="" id="lat" type="text" class="form-control">
                                    @error('lat')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>عدد الغرف</label>
                                    <input name="bed_number" min="0" id="bed_number" type="number" class="form-control">
                                    @error('bed_number')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>عدد الحمامات</label>
                                    <input name="bathroom_number" min="0" id="bathroom_number" type="number" class="form-control">
                                    @error('bathroom_number')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الmaster plan ***</label>
                                    <input name="master_plan" required="" id="master_plan" type="file" accept="application/pdf" class="form-control">
                                    @error('master_plan')
                                    <div class="alert alert-danger" role="alert" style="text-align: center">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>Digital Brochure</label>
                                    <input name="digital_brochure" id="digital_brochure" type="file" accept="application/pdf" class="form-control">
                                    @error('digital_brochure')
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
