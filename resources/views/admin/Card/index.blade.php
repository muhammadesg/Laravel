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
            <h1>@lang('words.CardsTable')</h1>
        </div>
        <div class="col-12 text-right mb-3">
            <a class="btn btn-success" href="{{route('cards.create')}}">
                @lang('words.Create')
            </a>
        </div>
        <div class="col-12">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>@lang('words.Title')</th>
                        <th>@lang('words.Category')</th>
                        <th>@lang('words.Text')</th>
                        <th>@lang('words.Image')</th>
                        <th>@lang('words.Price')</th>
                        <th>@lang('words.Discount')</th>
                        <th colspan="3">@lang('words.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $card)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$card['title_' . \App::getLocale()]}}</td>
                            <td>{{$card->category['name_' . \App::getLocale()]}}</td>
                            <td class="text-ellipsis">{{$card['text_' . \App::getLocale()]}}</td>
                            <td><img width="100" height="50" src="{{asset('/storage/'. $card->image)}}" alt=""></td>
                            <td>{{ number_format(floatval($card->price), 2, '.', '') }} @lang('words.sum')</td>
                            @if ($card->discount)
                                <td>{{ $card->discount}}%</td>
                            @else
                                <td>0%</td>
                            @endif
                            <td>
                                <a class="btn btn-primary text-ellipsis2" href="{{route('cards.show', $card->id)}}">
                                    @lang('words.Show')
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('cards.edit', $card->id)}}">
                                    @lang('words.Edit')
                                </a>
                            </td>
                            <td>
                                <form action="{{route('cards.destroy', $card->id)}}" method="post">
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
