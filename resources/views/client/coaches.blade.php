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
    <section class="pt-5 pb-4 bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center">
                    <h3 class="subheading">Shape Your Body</h3>
                    <h2 class="mb-1">Our Coaches</h2>
                </div>
            </div>
            <div class="row">
                @php
                    $reverse=false;
                @endphp

                @foreach ($coaches as $coach)
                    <div class="col-lg-3 d-flex">
                        <div class="coach align-items-stretch {{$reverse?'d-md-flex flex-column-reverse':''}}">
                            <div class="img" style="background-image: url(/storage/{{$coach->avatar!=null?$coach->avatar:($coach->sex=='Мужчина'?'avatars/default_male.jpg':'avatars/default_female.jpg')}})"></div>
                            <div class="text bg-white p-4">
                                <span class="subheading">Тренер</span>
                                <h3><a href="#">{{$coach->surname.' '.$coach->name}}</a></h3>
                                <p>{{$coach->description}}</p>
                            </div>
                        </div>
                    </div>
                    @php($reverse=!$reverse)
                @endforeach
            </div>
            <div class="paginate d-flex justify-content-center mx-auto">
                {{$coaches->links()}}
            </div>
        </div>

    </section>

    @endsection
