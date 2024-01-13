@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.Show')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('banners.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>@lang('words.Id')</th>
                        <td>{{$banner->id}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Title')</th>
                        <td>{{$banner['title_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Text')</th>
                        <td>{{$banner['text_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Image')</th>
                        <td><img width="400px" height="
                            200px" src="{{asset('/storage/'. $banner->image)}}" alt=""></td>
                    </tr>
                    <tr>
                        <th>@lang('words.CreatedAt')</th>
                        <td>{{$banner->created_at}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.UpdatedAt')</th>
                        <td>{{$banner->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection
