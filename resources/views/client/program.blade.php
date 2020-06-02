@extends('client.layouts.index')

<style>
    .paginate {
        max-width: 400px;
    }
    .paginate a{
        width: 40px;
        height:40px;
        border-radius: 50%!important;
        text-align: center;
        color:#fd0054!important;
        margin: 0 2px;
    }
    .paginate .active {
        border-radius: 50%!important;
    }
    .page-item.active .page-link {
        color: #fff;
        border-radius: 50%!important;
        width: 40px;
        height:40px;
        background-color: #fd0054!important;
        border:none;
        text-align: center;
        margin: 0 2px;
    }
    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: auto;
        border-radius: 50%!important;
        background-color: #fff;
        border-color: #dee2e6;
        width: 40px;
        height:40px;
        color:#fd0054!important;
        text-align: center;
        margin: 0 2px;
    }
</style>

@section('content')
    <section class="pt-5 pb-4">
        <div class="container-fluid">
            <div class="row">
                @foreach ($programs as $program)
                    <div class="col-md-6 col-lg-3">
                        <div class="package-program">
                            <div class="img d-flex justify-content-center align-items-center" style="background-image: url(/storage/{{$program->image!=null?$program->image:'images/default.jpg'}})">
                            </div>
                            <div class="text mt-3">
                                <h3>{{$program->name}}</h3>
                                <p>{{$program->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="paginate d-flex justify-content-center mx-auto">
                {{$programs->links()}}
            </div>
        </div>
    </section>
@endsection
