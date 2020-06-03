<table>
    <thead>
    <tr>
        <th class=""  colspan="5"  style="font-size: 12px; background-color: #66cbcc;"><b>Статистика замовлень</b></th>
    </tr>
    <tr>
        <th align="right"  colspan="7"  style="font-size: 12px; background-color: #66cbcc;"><b>{{$salary[0]['date']}}</b></th>
    </tr>
    <tr>
        <th style="font-size: 12px;" colspan="3" class="b"><b>ФІО клієнта</b></th>
        <th style="font-size: 12px;" colspan="2" class=""><b>Дата початку</b></th>
        <th style="font-size: 12px;" colspan="3" class="b"><b>Початок заняття</b></th>
        <th style="font-size: 12px;" colspan="2" class=""><b>Тариф</b></th>
    </tr>
    </thead>
    <tbody>
    {{--@php($changeColor=true)--}}

    {{--@foreach($statistics as $statistic)--}}
        {{--@if($statistic->name??'')--}}
            {{--<tr>--}}
                {{--<td align="right" style="background-color: {{$changeColor?'#09DEDA':'#0097DE'}};" colspan="3">{{$statistic->name??''}}</td>--}}
                {{--<td valign="middle" style="background-color: {{$changeColor?'#09E6E2':'#00A4EC'}};" colspan="2">{{ $statistic->total??''}}</td>--}}
            {{--</tr>--}}
            {{--@php($changeColor=!$changeColor)--}}
        {{--@endif--}}
    {{--@endforeach--}}
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th class=""  colspan="5"  style="font-size: 12px; background-color: #66cbcc;"><b>Список тренерів</b></th>
    </tr>
    <tr>
        <th style="font-size: 12px;" colspan="3" class="b"><b>ФІО</b></th>
        <th style="font-size: 12px;" colspan="2" class=""><b>Дата початку</b></th>
        <th style="font-size: 12px;" colspan="3" class="b"><b>Початок заняття</b></th>
        <th style="font-size: 12px;" colspan="2" class=""><b>Тариф</b></th>
    </tr>
    </thead>
    <tbody>
    {{--@php($changeColor=true)--}}

    {{--@foreach($statistics as $statistic)--}}
    {{--@if($statistic->name??'')--}}
    {{--<tr>--}}
    {{--<td align="right" style="background-color: {{$changeColor?'#09DEDA':'#0097DE'}};" colspan="3">{{$statistic->name??''}}</td>--}}
    {{--<td valign="middle" style="background-color: {{$changeColor?'#09E6E2':'#00A4EC'}};" colspan="2">{{ $statistic->total??''}}</td>--}}
    {{--</tr>--}}
    {{--@php($changeColor=!$changeColor)--}}
    {{--@endif--}}
    {{--@endforeach--}}
    </tbody>
</table>
