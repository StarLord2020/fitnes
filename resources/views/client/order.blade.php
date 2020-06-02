@extends('client.layouts.index')
@section('content')
    <section class="ftco-appointment">
        <div class="container-wrap">
            <div class="row no-gutters d-md-flex align-items-center">
                <div class="col-md-6 d-flex align-self-stretch img" style="background-image: url(/images/about-3.jpg);">
                </div>
                <div class="col-md-6 appointment ">
                    <h3 class="mb-3">Book a Appointment</h3>
                    <form method="post" onsubmit="sendData();return false;" id="formNews" class="appointment-form">
                        <div class="d-md-flex">
                            <div class="form-group position-relative">
                                <input name="date" type="date" class="form-control"
                                       value="2018-07-22">
                                <svg class="bi bi-calendar3-fill position-absolute" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2H0z"/>
                                    <path fill-rule="evenodd" d="M0 3h16v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm6.5 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm4-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm2 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-8 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm2 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm4-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm2 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-8 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm2 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm4-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </div>
                            <div class="form-group ml-md-4">
                                <div class="input-wrap position-relative">
                                    <input name="time" type="text" class="form-control timepicker" placeholder="Time">
                                    <svg class="bi bi-clock clock position-absolute"width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                                        <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="row">
                                <div class=" col-6 form-group">
                                    <textarea name="message" id="" cols="30" rows="2" class="message " placeholder="Message"></textarea>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ml-md-4">
                                        <select name="tariff_id" class=" tariff" >
                                            <option value="none">Виберіть тариф</option>
                                            @foreach($tariffs as $tariff)
                                                <option value="{{ $tariff->id}}" {{ $tariff->id==$param ? 'selected="selected"' : '' }}>
                                                    {{ $tariff->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group ml-md-4">
                                        <select name="coach_id" class="coaches" >
                                            <option value="none" selected>Виберіть тренера</option>
                                            @foreach($coaches as $coach)
                                                <option value="{{ $coach->id}}">
                                                    {{ $coach->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .clock{
        top: 21px;
        right: 15px;
        fill: #ffffff;
    }
    .bi-calendar3-fill
    {
        top: 21px;
        right: 15px;
        fill: #ffffff;
    }
    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        width:100%;
        left: -25px;
        top:0;
        height: 40px;
        width: 100px;
        color: #1c7430;
        background: #1b4b72;
        fill: #1c7430;
        opacity: 0;
    }
    .message
    {
        border: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
        padding-left: 0;
        padding-right: 0;
        background: transparent !important;
        color: rgba(255, 255, 255, 0.9) !important;
        font-size: 13px;
        border-radius: 0px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        height: 130px;
        background-color: transparent;
        color: #ffffff;
        border: 1px solid #ffff;
    }
    .message::placeholder
    {
        color: #ffffff;
    }
    .tariff,.coaches{
        color:#fd4514;
        background-color: #ffffff;
        width: 190px;
        border: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
        height: 58px !important;
        padding-left: 0;
        padding-right: 0;
        font-size: 13px;
        border-radius: 0px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }
</style>
<script>
    function sendData()
    {
        let form = '#formNews';
        let dataForm = $(form).serialize();
        $.ajax({
            url: '{{ route('admin.order.store')}}',
            type: 'POST',
            dataType: 'json',
            data: dataForm,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){//метод, который выполняется при успешном ответе от сервера
                if(response.result=="ok")
                {
                    new Noty({
                        type: 'success',
                        text: 'Ваше повідомлення успішно надіслано',
                        timeout:5000,
                        theme: 'mint',

                    }).show();
                }
            },
            error: function (response) {
                new Noty({
                    type: 'warning',
                    text: 'Помилка!Будьте уважні при заповнення полів',
                    timeout:2000,
                    theme: 'mint',

                }).show();
            }
        })
    }
</script>
