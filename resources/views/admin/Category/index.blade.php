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
            <h1>@lang('words.CategoryTable')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-success" href="{{route('categories.create')}}">
                @lang('words.Create')
            </a>
        </div>
        <div class="col-12">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>@lang('words.Name')</th>
                        <th colspan="3">@lang('words.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category['name_' . \App::getLocale()]}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('categories.show', $category->id)}}">
                                    @lang('words.Show')
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('categories.edit', $category->id)}}">
                                    @lang('words.Edit')
                                </a>
                            </td>
                            <td>
                                <form action="{{route('categories.destroy', $category->id)}}" method="post">
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
