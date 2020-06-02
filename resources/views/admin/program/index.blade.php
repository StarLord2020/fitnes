@extends('admin.layouts.admin')

@section('table')
    <index-program :programs = "{{json_encode($programs)}}"></index-program>
@endsection

<style></style>
