@extends('layout.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-4">تعديل وحدة </h5>
                    <div class="card mb-4">
                        <div class="card-body">
                        <form method="post" action="{{Route('admin.units.update', $data['unit']->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الصورة الرئيسية</label>
                                    <input name="primary_image" id="Name" type="file" accept="image/*" class="form-control">
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
                                    <label>صور السلايدر</label>
                                    <input name="slider_images[]" id="Name" type="file" accept="image/*" class="form-control" multiple>
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
                                    <input name="title_ar" value="{{$data['unit']->title_ar}}" required="" id="Name" type="text" class="form-control">
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
                                    <input name="title_en" value="{{$data['unit']->title_en}}" required="" id="Name" type="text" class="form-control">
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
                                    <input name="sqm" value="{{$data['unit']->sqm}}" id="Name" type="number" min="0" class="form-control">
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
                                    <input name="address_ar" value="{{$data['unit']->address_ar}}" id="Name"  type="text" class="form-control">
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
                                    <input name="address_en" value="{{$data['unit']->address_en}}" id="Name"  type="text" class="form-control">
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
                                    <input name="floor_ar" value="{{$data['unit']->floor_ar}}" id="Name" type="text" class="form-control">
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
                                    <input name="floor_en" value="{{$data['unit']->floor_en}}" id="Name" type="text" class="form-control">
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
                                    <input name="parking_ar" value="{{$data['unit']->parking_ar}}" id="Name" type="text" class="form-control">
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
                                    <input name="parking_en" value="{{$data['unit']->parking_en}}" id="Name" type="text" class="form-control">
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
                                    <input name="view_ar" value="{{$data['unit']->view_ar}}" id="Name" type="text" class="form-control">
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
                                    <input name="view_en" value="{{$data['unit']->view_en}}" id="Name" type="text" class="form-control">
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
                                    <label>استلام عند بالعربي</label>
                                    <input name="status_ar" value="{{$data['unit']->status_ar}}" id="Name" type="text" class="form-control">
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
                                    <input name="status_en" value="{{$data['unit']->status_en}}" id="Name" type="text" class="form-control">
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
                                        <option value="A" @if($data['unit']->priority == 'A') selected @endif>عالي</option>
                                        <option value="B" @if($data['unit']->priority == 'B') selected @endif>متوسط</option>
                                        <option value="C" @if($data['unit']->priority == 'C') selected @endif>منخفض</option>
                                        <option value="D" @if($data['unit']->priority == 'D') selected @endif>منخفض جدا</option>
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
                                        @foreach($data['types'] as $type)
                                            <option value="{{ $type->id }}"
                                                @if($type->id == $data['unit']->type_id) selected @endif
                                                >{{ $type->name_ar }}</option>
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
                                        @foreach($data['developers'] as $developer)
                                            <option value="{{ $developer->id }}"
                                                @if($developer->id == $data['unit']->developer_id) selected @endif
                                                >{{ $developer->name_ar }}</option>
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
                                        @foreach($data['signatures'] as $signature)
                                            <option value="{{ $signature->id }}"
                                                @if(in_array($signature->id, $data['unit']->signatures->pluck('id')->toArray())) selected @endif
                                                >{{ $signature->name }}</option>
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
                                        <option value="developer"
                                            @if($data['unit']->other_type == 'developer') selected @endif
                                        >developer</option>
                                        <option value="resale"
                                            @if($data['unit']->other_type == 'resale') selected @endif
                                        >resale</option>
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
                                        <option value="unit"
                                            @if($data['unit']->project_state == 'unit') selected @endif
                                        >unit</option>
                                        <option value="launche"
                                            @if($data['unit']->project_state == 'launche') selected @endif
                                        >launche</option>
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
                                    <input name="developer_price" value="{{ $data['unit']->developer_price }}" required="" id="developer_price" type="text" class="form-control">
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
                                    <input name="down_payment_percentage" value="{{ $data['unit']->down_payment_percentage }}" required id="down_payment_percentage" type="number" class="form-control">
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
                                    <input name="payment_percentage_per_year" value="{{ $data['unit']->payment_percentage_per_year }}" required id="payment_percentage_per_year" type="number" class="form-control">
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
                                    <input name="pay_amount_per_years" value="{{ $data['unit']->pay_amount_per_years }}" required id="pay_amount_per_years" type="number" class="form-control">
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
                                    <input name="years_count" value="{{ $data['unit']->years_count }}" required id="years_count" type="number" class="form-control">
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
                                    <input name="resale_price" value="{{ $data['unit']->resale_price }}" id="resale_price" type="text" class="form-control">
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
                                    <input name="phone_number" value="{{ $data['unit']->phone_number }}" required="" id="phone_number" type="text" class="form-control">
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
                                    <input name="whatsapp" value="{{ $data['unit']->whatsapp }}" required="" id="Whatsapp" type="text" class="form-control">
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
                                    <input name="lng" value="{{ $data['unit']->lng }}" required="" id="lng" type="text" class="form-control">
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
                                    <input name="lat" value="{{ $data['unit']->lat }}" required="" id="lat" type="text" class="form-control">
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
                                    <input name="bed_number" min="0" value="{{ $data['unit']->bed_number }}" id="bed_number" type="number" class="form-control">
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
                                    <input name="bathroom_number" min="0" value="{{ $data['unit']->bathroom_number }}" id="bathroom_number" type="number" class="form-control">
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
                                    <label>الmaster plan</label>
                                    <input name="master_plan" id="master_plan" type="file" accept="application/pdf" class="form-control">
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
