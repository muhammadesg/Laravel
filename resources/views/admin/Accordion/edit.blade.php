@extends('admin.layouts.site')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>@lang('words.EditLocation')</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success" href="{{route('accordions.index')}}">
                    @lang('words.Back')
                </a>
            </div>
            <div class="col-12">
                <form action="{{ route('accordions.update', $accordion->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="address_uz">@lang('words.AddressUz')</label>
                        <input class="form-control" value="{{ $accordion->address_uz }}" type="text" id="address_uz" name="address_uz" required placeholder="@lang('words.EnterAddressUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="address_ru">@lang('words.AddressRu')</label>
                        <input class="form-control" value="{{ $accordion->address_ru }}" type="text" id="address_ru" name="address_ru" required placeholder="@lang('words.EnterAddressRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="address_en">@lang('words.AddressEn')</label>
                        <input class="form-control" value="{{ $accordion->address_en }}" type="text" id="address_en" name="address_en" required placeholder="@lang('words.EnterAddressEn')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tel">@lang('words.Tel')</label>
                        <input class="form-control" value="{{ $accordion->tel }}" type="tel" id="tel" name="tel" required placeholder="@lang('words.EnterTel')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">@lang('words.Email')</label>
                        <input class="form-control" value="{{ $accordion->email }}" type="email" id="email" required name="email" placeholder="@lang('words.EnterEmail')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="location_uz">@lang('words.LocationUz')</label>
                        <input class="form-control" value="{{ $accordion->location_uz }}" type="text" id="location_uz" required name="location_uz" placeholder="@lang('words.EnterLocationUz')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="location_ru">@lang('words.LocationRu')</label>
                        <input class="form-control" value="{{ $accordion->location_ru }}" type="text" id="location_ru" name="location_ru" required placeholder="@lang('words.EnterLocationRu')">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="location_en">@lang('words.LocationEn')</label>
                        <input class="form-control" value="{{ $accordion->location_en }}" type="text" id="location_en" name="location_en" required placeholder="@lang('words.EnterLocationEn')">
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
