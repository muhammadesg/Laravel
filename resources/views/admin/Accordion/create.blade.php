@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.CreateLocation')</h1>
            </div>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-success" href="{{route('accordions.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{route('accordions.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="address_uz">@lang('words.AddressUz')</label>
                        <input class="form-control @error('address_uz') is-invalid @enderror" value="{{old('address_uz')}}" type="text" id="address_uz" name="address_uz" placeholder="@lang('words.EnterAddressUz')">
                        @error('address_uz') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="address_ru">@lang('words.AddressRu')</label>
                        <input class="form-control @error('address_ru') is-invalid @enderror" value="{{old('address_ru')}}" type="text" id="address_ru" name="address_ru" placeholder="@lang('words.EnterAddressRu')">
                        @error('address_ru') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="address_en">@lang('words.AddressEn')</label>
                        <input class="form-control @error('address_en') is-invalid @enderror" value="{{old('address_en')}}" type="text" id="address_en" name="address_en" placeholder="@lang('words.EnterAddressEn')">
                        @error('address_en') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tel">@lang('words.Tel')</label>
                        <input class="form-control @error('tel') is-invalid @enderror" value="{{old('tel')}}" type="tel" id="tel" name="tel" placeholder="@lang('words.EnterTel')">
                        @error('tel') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">@lang('words.Email')</label>
                        <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" type="email" id="email" name="email" placeholder="@lang('words.EnterEmail')">
                        @error('email') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="location_uz">@lang('words.LocationUz')</label>
                        <textarea class="form-control @error('location_uz') is-invalid @enderror" value="{{old('location_uz')}}" type="text" id="location_uz" name="location_uz" placeholder="@lang('words.EnterLocationUz')"></textarea>
                        @error('location_uz') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="location_ru">@lang('words.LocationRu')</label>
                        <textarea class="form-control @error('location_ru') is-invalid @enderror" value="{{old('location_ru')}}" type="text" id="location_ru" name="location_ru" placeholder="@lang('words.EnterLocationRu')"></textarea>
                        @error('location_ru') {{$message}} @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="location_en">@lang('words.LocationEn')</label>
                        <textarea class="form-control @error('location_en') is-invalid @enderror" value="{{old('location_en')}}" type="text" id="location_en" name="location_en" placeholder="@lang('words.EnterLocationEn')"></textarea>
                        @error('location_en') {{$message}} @enderror
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
