@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.Show')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('accordions.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>@lang('words.Id')</th>
                        <td>{{$accordion->id}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Address')</th>
                        <td>{{$accordion['address_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Tel')</th>
                        <td>{{$accordion->tel}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Email')</th>
                        <td>{{$accordion->email}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Location')</th>
                        <td>{{$accordion['location_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.CreatedAt')</th>
                        <td>{{$accordion->created_at}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.UpdatedAt')</th>
                        <td>{{$accordion->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection
