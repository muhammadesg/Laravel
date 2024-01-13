@extends('admin.layouts.site')
@section('content')

<div class="container mt-3">
    <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        <div class="col-12 text-center">
            <h1>@lang('words.BannersTable')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-success" href="{{route('banners.create')}}">
                @lang('words.Create')
            </a>
        </div>
        <div class="col-12">
           <table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>№</th>
            <th>@lang('words.Title')</th>
            <th>@lang('words.Text')</th>
            <th>@lang('words.Image')</th>
            <th colspan="3">@lang('words.Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($banners as $banner)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$banner['title_' . \App::getLocale()]}}</td>
                <td class="text-ellipsis">{{$banner['text_' . \App::getLocale()]}}</td>
                <td><img width="100" height="50" src="{{ asset('/storage/'. $banner->image) }}" alt=""></td>
                <td>
                    <a class="btn btn-primary" href="{{ route('banners.show', $banner->id) }}">
                        @lang('words.Show')
                    </a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('banners.edit', $banner->id) }}">
                        @lang('words.Edit')
                    </a>
                </td>
                <td>
                    <form action="{{ route('banners.destroy', $banner->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Delete?')">
                            @lang('words.Delete')
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
        </div>
    </div>
</div>

@endsection
