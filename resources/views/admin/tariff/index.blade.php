@extends('admin.layouts.admin')

@section('table')
        <index-tariff :tariffs="{{json_encode($tariffs)}}"></index-tariff>
@endsection
<style></style>
