@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.EditCategory')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('categories.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{ route('categories.update', $category->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="name_uz">@lang('words.NameUz')</label>
                        <input class="form-control" value="{{ $category->name_uz }}" type="text" id="name_uz" name="name_uz" placeholder="@lang('words.EnterNameUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name_ru">@lang('words.NameRu')</label>
                        <input class="form-control" value="{{ $category->name_ru }}" type="text" id="name_ru" name="name_ru" placeholder="@lang('words.EnterNameRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name_en">@lang('words.NameEn')</label>
                        <input class="form-control" value="{{ $category->name_en }}" type="text" id="name_en" name="name_en" placeholder="@lang('words.EnterNameEn')">
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
