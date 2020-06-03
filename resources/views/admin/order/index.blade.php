@extends('admin.layouts.admin')

@section('table')
    <index-order :orders = "{{json_encode($orders)}}"></index-order>
@endsection

<style></style>
