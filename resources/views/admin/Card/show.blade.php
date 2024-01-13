@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.Show')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('cards.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>@lang('words.Id')</th>
                        <td>{{$card->id}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Title')</th>
                        <td>{{$card['title_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Text')</th>
                        <td>{{$card['text_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Category')</th>
                        <td>{{$card->category['name_' . \App::getLocale()]}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.Image')</th>
                        <td><img width="400px" height="
                            200px" src="{{asset('/storage/'. $card->image)}}" alt=""></td>
                    </tr>
                    <tr>
                        <th>@lang('words.Price')</th>
                        <td>{{$card->price}} @lang('words.sum')</td>
                    </tr>
                    @if ($card->discount)
                        <tr>
                            <th>@lang('words.Discount')</th>
                            <td>{{$card->discount}} @lang('words.sum')</td>
                        </tr>
                    @else
                    {{null}}
                    @endif
                    <tr>
                        <th>@lang('words.CreatedAt')</th>
                        <td>{{$card->created_at}}</td>
                    </tr>
                    <tr>
                        <th>@lang('words.UpdatedAt')</th>
                        <td>{{$card->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
