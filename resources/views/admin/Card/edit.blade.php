@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.EditCard')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('cards.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{ route('cards.update', $card->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="title_uz">@lang('words.TitleUz')</label>
                        <input class="form-control" value="{{ $card->title_uz }}" type="text" id="title_uz" name="title_uz" placeholder="@lang('words.EnterTitleUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title_ru">@lang('words.TitleRu')</label>
                        <input class="form-control" value="{{ $card->title_ru }}" type="text" id="title_ru" name="title_ru" placeholder="@lang('words.EnterTitleRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title_en">@lang('words.TitleEn')</label>
                        <input class="form-control" value="{{ $card->title_en }}" type="text" id="title_en" name="title_en" placeholder="@lang('words.EnterTitleEn')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_uz">@lang('words.TextUz')</label>
                        <input class="form-control" value="{{ $card->text_uz }}" type="text" id="text_uz" name="text_uz" placeholder="@lang('words.EnterTextUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_ru">@lang('words.TextRu')</label>
                        <input class="form-control" value="{{ $card->text_ru }}" type="text" id="text_ru" name="text_ru" placeholder="@lang('words.EnterTextRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_en">@lang('words.TextEn')</label>
                        <input class="form-control" value="{{ $card->text_en }}" type="text" id="text_en" name="text_en" placeholder="@lang('words.EnterTextEn')">
                    </div>


                    <select class="form-select form-select-lg mb-3" name="category_id" aria-label="Large select example">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category['name_' . \App::getLocale()]}}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                        <label class="form-label" for="image">@lang('words.Image')</label>
                        <input class="form-control" type="file" id="image" name="image" placeholder="@lang('words.ChooseImage')">
                        <img src="{{asset('/storage/'. $card->image) }}" alt="" style="max-width: 200px; margin-top: 10px;">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price">@lang('words.Price')</label>
                        <input class="form-control" value="{{ $card->price }}" type="number" id="price" name="price" placeholder="@lang('words.EnterPrice')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="discount">@lang('words.Discount')</label>
                        <input class="form-control" value="{{ $card->discount }}" type="number" id="discount" name="discount" placeholder="@lang('words.EnterDiscount')">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">@lang('words.Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('components.langInput')
