@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.CreateBanner')</h1>
            </div>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-success" href="{{route('banners.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{route('banners.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="title_uz">@lang('words.TitleUz')</label>
                        <input class="form-control @error('title_uz') is-invalid @enderror" value="{{old('title_uz')}}" type="text" id="title_uz" name="title_uz" placeholder="@lang('words.EnterTitleUz')">
                        @error('title_uz') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title_ru">@lang('words.TitleRu')</label>
                        <input class="form-control @error('title_ru') is-invalid @enderror" value="{{old('title_ru')}}" type="text" id="title_ru" name="title_ru" placeholder="@lang('words.EnterTitleRu')">
                        @error('title_ru') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title_en">@lang('words.TitleEn')</label>
                        <input class="form-control @error('title_en') is-invalid @enderror" value="{{old('title_en')}}" type="text" id="title_en" name="title_en" placeholder="@lang('words.EnterTitleEn')">
                        @error('title_en') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_uz">@lang('words.TextUz')</label>
                        <textarea class="form-control @error('text_uz') is-invalid @enderror" value="{{old('text_uz')}}" type="text" id="text_uz" cols="50" name="text_uz" placeholder="@lang('words.EnterTextUz')"></textarea>
                        @error('text_uz') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_ru">@lang('words.TextRu')</label>
                        <textarea class="form-control @error('text_ru') is-invalid @enderror" value="{{old('text_ru')}}" type="text" id="text_ru" cols="50" name="text_ru" placeholder="@lang('words.EnterTextRu')"></textarea>
                        @error('text_ru') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_en">@lang('words.TextEn')</label>
                        <textarea class="form-control @error('text_en') is-invalid @enderror" value="{{old('text_en')}}" type="text" id="text_en" cols="50" name="text_en" placeholder="@lang('words.EnterTextEn')"></textarea>
                        @error('text_en') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">@lang('words.Image')</label>
                        <input class="form-control" value="{{old('image')}}" type="file" id="image" name="image" placeholder="@lang('words.ChooseImage')">
                        @error('image') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">@lang('words.Create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('components.langInput')
