@extends('admin.layouts.admin')

@section('form')
        <edit-tariff :tariff="{{json_encode($tariff)}}"></edit-tariff>
@endsection
<style></style>
