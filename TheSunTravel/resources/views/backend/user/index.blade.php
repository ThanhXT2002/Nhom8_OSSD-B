@extends('backend.layout.layout')

@section('content')
    @include('backend.layout.component.breadcrumb')
    <div class="wrapper wrapper-content  fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                @include('backend.layout.component.toolbox')

                <div class="ibox-content">
                @include('backend.user.component.filter')
                @include('backend.user.component.table')
                </div>
            </div>
        </div>
    </div>
@endsection

