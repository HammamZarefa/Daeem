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
                                <h2>{{__('Add Blog')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('blog.index')}}">{{__('All Blog')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Add Blog')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{__('Add Blog')}}</h2>
                        </div>
                        <form action="{{route('blog.store')}}" method="post" class="form-horizontal"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="input__group mb-25">
                                <label>{{__('Title')}} <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}"
                                       class="form-control slugable" onkeyup="slugable()">
                                @if ($errors->has('title'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="input__group mb-25">
                                <label>{{__('Slug')}} <span class="text-danger">*</span></label>
                                <input type="text" name="slug" value="{{old('slug')}}" placeholder="{{__('Slug')}}"
                                       class="form-control slug" onkeyup="getMyself()">
                                @if ($errors->has('slug'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('slug') }}</span>
                                @endif
                            </div>

                            <div class="input__group mb-25">
                                <label for="blog_type"> {{ __('Blog Type') }} </label>
                                <select name="blog_type" id="blog_type">
                                    <option value="">--{{ __('Select Option') }}--</option>
                                    <option value="post" selected>@lang("post")</option>
                                    <option value="news">@lang("news")</option>
                                    <option value="advertisement">@lang("advertisement")</option>
                                    <option value="partnership">@lang("partnership")</option>
                                    <option value="meet">@lang("meet")</option>
                                    <option value="development">@lang("development")</option>
                                    <option value="image">@lang("image")</option>
                                    <option value="video">@lang("video")</option>
                                </select>
                            </div>

                            <div class="input__group mb-25">
                                <label for="blog_category_id"> {{ __('Blog Category') }} </label>
                                <select name="blog_category_id" id="blog_category_id">
                                    <option value="">--{{ __('Select Option') }}--</option>
                                    @foreach($blogCategories as $blogCategory)
                                        <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input__group mb-25">
                                <label for="tag_ids"> {{ __('Tag') }} </label>
                                <select name="tag_ids[]" multiple id="tag_ids"
                                        class="multiple-basic-single form-control">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input__group mb-25">
                                <label>{{__('Details')}} <span class="text-danger">*</span></label>
                                <textarea name="details" id="summernote">{{old('details')}}</textarea>

                                @if ($errors->has('details'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('details') }}</span>
                                @endif

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="upload-img-box mb-25">
                                        <img src="">
                                        <input type="file" name="image" id="image" accept="image/*"
                                               onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="fa fa-camera"></i>
                                            <p class="m-0">{{__('Image')}}</p>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                @endif
                                <p>{{ __('Accepted Files') }}: JPEG, JPG, PNG <br> {{ __('Recommend Size') }}: 870 x 500
                                    (1MB)</p>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    @saveWithAnotherButton
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">

    <!-- Summernote CSS - CDN Link -->
    <link href="{{ asset('common/css/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script src="{{asset('admin/js/custom/slug.js')}}"></script>
    <script src="{{asset('admin/js/custom/form-editor.js')}}"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#summernote").summernote({dialogsInBody: true});
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
@endpush
