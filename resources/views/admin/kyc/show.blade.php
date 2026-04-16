@extends('layout.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">صفحة مراجعة التحقق</h5>


                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="{{Route('admin.kyc.status')}}">
                                @csrf
                                <input type="text" hidden value="{{$data->id}}" name='id'>
                                <div class="select-wrapper">
                                    <select name="status" class="form-control form-select"style="width: 50%;">
                                        <option value="approved" selected>قبول</option>
                                        <option value="rejected">رفض</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">تاكيد</button>
                            </form>
                            <hr>
                            <h3 class="mt-0.5">بيانات المستخدم</h3>
                            <p><strong>الإسم:</strong> {{ $data->user->name }}</p>
                            <p><strong>الإيميل:</strong> {{ $data->user->email }}</p>

                            <hr>

                            <h3>بيانات التحقق KYC</h3>

                            <div style="display: flex; gap: 20px; flex-wrap: wrap;">

                                <div>
                                    <p>وجه البطاقة</p>
                                    <img src="{{ asset('storage/' . $data->front_id) }}" width="200">
                                </div>

                                <div>
                                    <p>ضهر البطاقة</p>
                                    <img src="{{ asset('storage/' . $data->back_id) }}" width="200">
                                </div>

                                <div>
                                    <p>صورة سيلفي</p>
                                    <img src="{{ asset('storage/' . $data->selfie) }}" width="200">
                                </div>

                            </div>

                            <hr>

                            {{-- BROKER ONLY --}}
                            @if($data->type === 'broker')

                                <h3>بيانات البروكر</h3>

                                @if($data->cv)
                                    <p>
                                        <a href="{{ asset('storage/' . $data->cv) }}" target="_blank" class="btn btn-primary">
                                            عرض ال CV
                                        </a>
                                    </p>
                                @endif

                                <hr>

                                <h3>بيانات التواصل الاجتماعي</h3>

                                @if($data->facebook_link)
                                    <p>فيسبوك: <a href="{{ $data->facebook_link }}" target="_blank">{{ $data->facebook_link }}</a></p>
                                @endif

                                @if($data->twitter_link)
                                    <p>تويتر: <a href="{{ $data->twitter_link }}" target="_blank">{{ $data->twitter_link }}</a></p>
                                @endif

                                @if($data->linkedin_link)
                                    <p>لينكدإن: <a href="{{ $data->linkedin_link }}" target="_blank">{{ $data->linkedin_link }}</a></p>
                                @endif

                                @if($data->instagram_link)
                                    <p>انستجرام: <a href="{{ $data->instagram_link }}" target="_blank">{{ $data->instagram_link }}</a></p>
                                @endif

                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
