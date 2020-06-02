@extends('admin.layouts.admin')

@section('table')
    <edit-program :program = "{{json_encode($program)}}"></edit-program>
@endsection

<style></style>
