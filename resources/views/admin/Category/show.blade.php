@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.Show')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('categories.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>@lang('words.Id')</th>
                        <td>{{$category->id}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Name')</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.CreatedAt')</th>
                        <td>{{$category->created_at}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.UpdatedAt')</th>
                        <td>{{$category->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection
