@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">الاعدادات</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                                <form method="POST" action="{{Route('admin.setting.store')}}">
                                    @csrf
                                    
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">رقم الهاتف</h5>
                                            <input name="phone" required value="{{$data['phone']}}" class="form-control">
                                            @error('phone')
                                                <div class="alert alert-danger" role="alert" style="text-align: center">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">ايميل</h5>
                                            <input name="email" required value="{{$data['email']}}" class="form-control">
                                            @error('email')
                                                <div class="alert alert-danger" role="alert" style="text-align: center">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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

{{-- @section('script')


    <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
        //   ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#summernote2').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
        //   ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

@endsection --}}
