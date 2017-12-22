@extends('admin.layouts.admin')

@section('title', 'Banner')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> Page manager</h1>

        {{ Form::open(array('url' => 'administrator/page')) }}
            <input type="text" placeholder="Search..." required="">

            {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Except</th>
                    <th>Date/Time Added</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($pages as $page)
                    <tr>

                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->except }}</td>
                        <td>{{ $page->created_at->format('F d, Y h:ia') }}</td>

                        <td>
                            <a href="{{ route('banner.edit', $page->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['banner.destroy', $page->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>



            </table>
        </div>

        <div>
            {{ $pages->links() }}
        </div>

        <div style="margin-top: 50px">
            <a href="{{ route('banner.create') }}" class="btn btn-success">Add Banner</a>
        </div>

    </div>

@endsection