@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.EditBanner')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('banners.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{ route('banners.update', $banner->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="title_uz">@lang('words.TitleUz')</label>
                        <input class="form-control" value="{{ $banner->title_uz }}" type="text" id="title_uz" name="title_uz" placeholder="@lang('words.EnterTitleUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title_ru">@lang('words.TitleRu')</label>
                        <input class="form-control" value="{{ $banner->title_ru }}" type="text" id="title_ru" name="title_ru" placeholder="@lang('words.EnterTitleRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title_en">@lang('words.TitleEn')</label>
                        <input class="form-control" value="{{ $banner->title_en }}" type="text" id="title_en" name="title_en" placeholder="@lang('words.EnterTitleEn')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_uz">@lang('words.TextUz')</label>
                        <input class="form-control" value="{{ $banner->text_uz }}" type="text" id="text_uz" name="text_uz" placeholder="@lang('words.EnterTextUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_ru">@lang('words.TextRu')</label>
                        <input class="form-control" value="{{ $banner->text_ru }}" type="text" id="text_ru" name="text_ru" placeholder="@lang('words.EnterTextRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="text_en">@lang('words.TextEn')</label>
                        <input class="form-control" value="{{ $banner->text_en }}" type="text" id="text_en" name="text_en" placeholder="@lang('words.EnterTextEn')">
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="image">@lang('words.Image')</label>
                      <input class="form-control" type="file" id="image" name="image" placeholder="@lang('words.ChooseImage')">
                      <img src="{{asset('/storage/'. $banner->image) }}" alt="" style="max-width: 200px; margin-top: 10px;">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">@lang('words.Updated')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('components.langInput')
