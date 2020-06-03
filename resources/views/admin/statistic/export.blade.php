<table>
    <thead>
    <tr>
        <th class="" style="font-size: 12px;" colspan="17"><b>Статистика замовлень</b></th>
    </tr>
    <tr>
        <th style="font-size: 12px;" colspan="3" class="b"><b>ФІО клієнта</b></th>
        <th style="font-size: 12px;" colspan="3" class=""><b>Дата початку</b></th>
        <th style="font-size: 12px;" colspan="2" class="b"><b>Початок заняття</b></th>
        <th style="font-size: 12px;" colspan="3" class=""><b>Тариф</b></th>
        <th style="font-size: 12px;" colspan="3" class=""><b>email</b></th>
        <th style="font-size: 12px;" colspan="3" class=""><b>Номер телефону</b></th>
    </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            @if($order->user??'')
                <tr>
                    <td colspan="3">{{$order->user??''}}</td>
                    <td  colspan="3">{{ $order->date??''}}</td>
                    <td  colspan="2">{{ $order->time??''}}</td>
                    <td  colspan="3">{{ $order->tariff??''}}</td>
                    <td  colspan="3">{{ $order->email??''}}</td>
                    <td  colspan="3">{{ $order->number??''}}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td colspan="5">Прибуток за місяць: {{$profit->tariff}}</td>
        </tr>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th class=""  colspan="9"  style="font-size: 12px;"><b>Список тренерів</b></th>
    </tr>
    <tr>
        <th style="font-size: 12px;" colspan="3" class="b"><b>ФІО</b></th>
        <th style="font-size: 12px;" colspan="3" class=""><b>email</b></th>
        <th style="font-size: 12px;" colspan="3" class="b"><b>Номер телефону</b></th>
    </tr>
    </thead>
    <tbody>
        @foreach($coaches as $coach)
            @if($coach->name??'')
                <tr>
                    <td align="right" colspan="3">{{$coach->surname.' '.$coach->name.' '.$coach->patronymic}}</td>
                    <td valign="middle" colspan="3">{{ $coach->email??''}}</td>
                    <td valign="middle" colspan="3">{{ $coach->number??''}}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
