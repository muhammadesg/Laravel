@extends('admin.layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.CompletedOrders')</h1>
        </div>
        <div class="col-12">
            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        №
                                    </th>
                                    <th>@lang('words.Name')</th>
                                    <th>@lang('words.TotalPrice')</th>
                                    <th>@lang('words.Status')</th>
                                    <th colspan="3">@lang('words.Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($completedOrders as $completedOrder)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $completedOrder->name }}</td>
                                        <td>{{ $completedOrder->total_price}} @lang('words.sum')</td>
                                        <td>{{ $completedOrder->status }}</td>
                                        <td class="d-flex justify-content-center align-items-center" style="gap: 15px">
                                            <a href="{{ route('completedOrders.show', $completedOrder->id) }}"
                                                class="btn btn-primary">@lang('words.Show')</a>
                                            <form action="{{ route('completedOrders.destroy', $completedOrder->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">@lang('words.Delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
