@extends('admin.layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الأخبار </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة خبر جديد
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة خبر جديد </h4>
                                    {{-- <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active">
                                                    <div class="row">
                                                         <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right"
                                                                    for="admin_id">
                                                                    رقم الآدمن
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="admin_id" id="admin_id"
                                                                        placeholder="" class="form-control" />
                                                                    @error('news.$index.admin_id')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right"
                                                                    for="photo id-input-file-2">
                                                                    الصورة </label>
                                                                <div class="col-sm-9">
                                                                    <!-- #section:custom/file-input -->
                                                                    <label class="ace-file-input">
                                                                        <input type="file" name="photo"
                                                                            id="id-input-file-2 photo">
                                                                        <span class="ace-file-container"
                                                                            data-title="Choose">
                                                                            <span class="ace-file-name"
                                                                                data-title="No File ...">
                                                                                <i
                                                                                    class="ace-icon fa fa-upload"></i></span></span><a
                                                                            class="remove" href="#"><i
                                                                                class=" ace-icon fa fa-times"></i></a>
                                                                    </label>
                                                                    @error('photo')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right"
                                                                    for="title">
                                                                    العنوان
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="title" id="title"
                                                                        placeholder="" class="form-control" />
                                                                    @error('news.$index.title')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right"
                                                                    for="date">
                                                                    التاريخ </label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control fc-datepicker"
                                                                        name="Due_date date" id="date"
                                                                        placeholder="YYYY-MM-DD" type="text" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right"
                                                                    for="description">
                                                                    الوصف </label>
                                                                <div class="col-sm-9">
                                                                    {{-- <textarea type="text" name="description" id="description" placeholder="" class="form-control"></textarea> --}}
                                                                    <input type="text" name="description"
                                                                        id="description" placeholder=""
                                                                        class="form-control" />
                                                                    @error('news.$index.description')
                                                                        <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right"
                                                                    for="status">
                                                                    الحالة
                                                                </label>
                                                                <div class="col-sm-7">
                                                                    <input name="status" id="id-button-borders status"
                                                                        checked="" type="checkbox" value="1"
                                                                        class="ace ace-switch ace-switch-5" />
                                                                    <span class="lbl middle"></span>
                                                                </div>
                                                                @error('news.$index.status')
                                                                    <span>{{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="btns text-center">
                                                        <button class="btn btn-white btn-default btn-round">
                                                            <i class="ace-icon fa fa-floppy-o bigger-120 orange"></i>
                                                            Save
                                                        </button>

                                                        <button class="btn btn-white btn-default btn-round">
                                                            <i class="ace-icon fa fa-times red2"></i>
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
