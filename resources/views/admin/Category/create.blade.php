@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.CreateCategory')</h1>
            </div>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-success" href="{{route('categories.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{route('categories.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name_uz">@lang('words.NameUz')</label>
                        <input class="form-control @error('name_uz') is-invalid @enderror" value="{{old('name_uz')}}" type="text" id="name_uz" name="name_uz" placeholder="@lang('words.EnterNameUz')">
                        @error('name_uz') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name_ru">@lang('words.NameRu')</label>
                        <input class="form-control @error('name_ru') is-invalid @enderror" value="{{old('name_ru')}}" type="text" id="name_ru" name="name_ru" placeholder="@lang('words.EnterNameRu')">
                        @error('name_ru') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name_en">@lang('words.NameEn')</label>
                        <input class="form-control @error('name_en') is-invalid @enderror" value="{{old('name_en')}}" type="text" id="name_en" name="name_en" placeholder="@lang('words.EnterNameEn')">
                        @error('name_en') {{$message}} @enderror
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
