@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Application Settings') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('admin.application_settings.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="email-inbox__area bg-style">
                        <div class="item-top mb-30"><h2>{{ __(@$title) }}</h2></div>
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{__('Banner List')}}</h2>
                            <a href="{{ route('settings.banner-section-add') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> {{__('Add Banner')}} </a>
                        </div>
                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                    <tr class="removable-item">
                                        <td>
                                            <a href="#"> <img src="{{getImageFile($banner->banner_image)}}" width="80">
                                            </a>
                                        </td>
                                        <td>
                                            {{$banner->banner_first_line_title}}
                                        </td>

                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('settings.banner-section-edit', [$banner->id])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                                <button class="btn-action ms-2 deleteItem"
                                                        data-formid="delete_row_form_{{$banner->id}}">
                                                    <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                </button>
                                                <form action="{{route('settings.banner-delete', [$banner->id])}}"
                                                      method="get" id="delete_row_form_{{ $banner->id }}">

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                                            {{$banners->links()}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection


@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
