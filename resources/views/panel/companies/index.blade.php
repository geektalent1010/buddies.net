@extends('layouts.app', ['ACTIVE_TITLE' => 'COMPANIES', 'ROUTES' => [
['ROUTE' => 'companies.index', 'ACTIVE' => 'connected', 'ACTIVE_ROUTE' => true],
['ROUTE' => 'companies.search.setting', 'ACTIVE' => 'setting', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'connected'])

@section('title', __('- Companies'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
    <div class="row m-0 px-0 w-100 companies-section">
        <div class="row justify-content-center m-0 p-0 w-100 mb-35px">
            @if (is_null($companies) || !count($companies))
            <div class="col no-members app-page-subtitle">
                No Matched Companies
            </div>
            @else
            <div class="col-md-6 p-0">
                <div class="search-input-section">
                    <input id="searchKey" type="text" class="form-control" name="searchKey"
                        placeholder="Search Company">
                    <div class="search-icon-section">
                        <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                </div>
                @include('_sections.lists.companies')
            </div>
            @endif
        </div>
    </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.heart-icon-btn').click(function () {
        var send_data = {}; var company_id = 0;
        send_data['id'] = company_id = $(this).attr('attr-data');
        $.ajax({
            type: 'PUT',
            url: '{{ route('company.likes') }}',
            data: send_data,
            success: function (data) {
                if (data.like) {
                    $('.company' + company_id).addClass('like');
                } else {
                    $('.company' + company_id).removeClass('like');
                }
            }
        })
    });
</script>
@endsection
