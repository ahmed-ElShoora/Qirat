@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>صفحة مراجعة طلبات التحصص</h1>
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
                                <th scope="col" class="text-center">النوع</th>
                                <th scope="col" class="text-center">عرض</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $kyc)
                                <tr>
                                    <td class="text-center">{{$kyc->user->name}}</td>
                                    <td class="text-center">{{$kyc->type}}</td>
                                    <td class="text-center">
                                        <a href="{{Route('admin.kyc.show',$kyc->id)}}" class="btn btn-sm btn-outline-primary">عرض</a>
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
