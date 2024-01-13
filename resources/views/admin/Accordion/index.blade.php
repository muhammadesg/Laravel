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
            <h1>@lang('words.LocationsTable')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-success" href="{{route('accordions.create')}}">
                @lang('words.Create')
            </a>
        </div>
        <div class="col-12">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>@lang('words.Address')</th>
                        <th>@lang('words.Tel')</th>
                        <th>@lang('words.Email')</th>
                        <th colspan="3">@lang('words.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accordions as $accordion)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$accordion['address_' . \App::getLocale()]}}</td>
                            <td>{{$accordion->tel}}</td>
                            <td>{{$accordion->email}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('accordions.show', $accordion->id)}}">
                                    @lang('words.Show')
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('accordions.edit', $accordion->id)}}">
                                    @lang('words.Edit')
                                </a>
                            </td>
                            <td>
                                <form action="{{route('accordions.destroy', $accordion->id)}}" method="post">
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
