@extends('admin.layouts.admin')

@section('title', 'Banner')

@section('content')
    <div class='col-lg-10'>

        <h1>Edit Banner</h1>
        <hr>
        @include ('admin.errors.list')

        {{ Form::model($banner, array('route' => array('banner.update', $banner->id), 'method' => 'PUT')) }}
        <div class="form-group">

            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('except', 'Except') }}
                {{ Form::textarea('except', null, array('class' => 'form-control lara-mce')) }}<br>
            </div>

            <div class="form-group">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', null, array('class' => 'form-control lara-mce')) }}<br>
            </div>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

        </div>
    </div>
@endsection