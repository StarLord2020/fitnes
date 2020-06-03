@extends('client.layouts.index')

@section('content')
    <section class="pt-5 pb-4">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-4 contact-info bg-light p-4">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h2 class="h4">Contact Information</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Website:</span> <a href="#">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <form method="post" onsubmit="sendData();return false;" id="formNews" class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="{{$user->email}}" name="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text"  name="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function sendData()
    {
        let form = '#formNews';
        let dataForm = $(form).serialize();
        $.ajax({
            url: '{{ route('send')}}',
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
                            theme    : 'mint',

                }).show();
                }
            },
            error: function (response) {
                new Noty({
                    type: 'warning',
                    text: 'Помилка',
                    timeout:2000,
                    theme    : 'mint',

                }).show();
            }
        })
    }
</script>
