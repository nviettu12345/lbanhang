@extends('admin::layouts.master')

@section('content')
<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @include("admin::category.breadrum")
    </div>
    @include("admin::category.form")

@stop