@extends('layouts.master')
@section('head')
        <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="content-header-left col-md-6 col-12">
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
{{--                {{ Breadcrumbs::render('nk-categories.index') }}--}}
            </div>
        </div>
    </div>
    @if(Session::has('success'))
        <div class="alert bg-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{Session::get('success')}}
        </div>
    @elseif(Session::has('error'))
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{Session::get('error')}}
        </div>
    @endif
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-position">ユーザー登録　〉ユーザー一覧</h5>
                        <h2 class="card-title">ユーザー一覧</h2>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
{{--                                <li><a href="{{route('nk-categories.index')}}"><i class="fa fa-refresh"></i></a>--}}
{{--                                </li>--}}
{{--                            @if(Auth::user()->checkPermissionSuperAdmin(\App\Constants\CmsActionsSetting::SETTING_CATEGORY_NK_PRODUCT_INDEX))--}}
{{--                                <li><a href="{{route('nk-categories.create')}}"><i class="fa fa-plus"></i></a></li>--}}
{{--                            @endif--}}
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-form">
                            <form id="formSearch" class="form-search" action="" method="GET">
                                <div class="row">

                                    <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-search-users">
                                        <fieldset class="form-group info-box-users">
                                            <div class="info-up d-flex">
                                                <div class="info d-flex">
                                                    <label for="school-name">学校名</label>
                                                    <input type="text" class="form-control" id="school-name" placeholder="">
                                                </div>
                                                <div class="info d-flex">
                                                    <label for="year">年度</label>
                                                    <input type="text" class="form-control" id="year" placeholder="">
                                                </div>
                                            </div>
                                            <div class="info-down d-flex position-relative">
                                                <div class="info d-flex">
                                                    <label for="connected">所属</label>
                                                    <input type="text" class="form-control" id="connected" placeholder="">
                                                </div>
                                                <div class="info d-flex">
                                                    <label for="">個人</label>
                                                    <input type="text" class="form-control" id="private" placeholder="">
                                                </div>
                                                <div class="tb-btn-search d-flex position-absolute">
                                                    <a href="javascript:void(0)" id="btnSearch" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i> 検索</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>      
                                </div>
                            </form>
                            <div class="form-add d-flex">
                                <form action="" id="add-multiple" method="post" class="mt-auto">
                                    <a href="javascript:void(0)" id="btnAddMultiple" class="btn btn-add-multiple">一括登録</a>
                                </form>
                                <form action="" id="add-single" method="post" class="mt-auto">
                                    <a href="javascript:void(0)" id="btnAddSingle" class="btn btn-add-single">個別登録</a>
                                </form>
                            </div>
                        </div>
                            <div id="gird">
                                @include('admin.users.grid')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content" id="modal-body">
                <img src="" class="w-100" alt="" title="" />
            </div>
        </div>
    </div>

    @include('components.overlay')
@endsection
@section('scripts')
    <script>
        // $(document).ready(function () {
        //     let page = 1;
        //     $(document).on('click', '.pagination a', function (e) {
        //         e.preventDefault();
        //         page = $(this).attr('href').split('page=')[1];
        //         getGird();
        //     });
        //
        //     $('#btnSearch').on('click', function () {
        //         page = 1;
        //         getGird();
        //     })
        //     // $('#formSearch input').on('keyup', function (e) {
        //     //     if (e.keyCode === 13) {
        //     //         page = 1;
        //     //         getGird();
        //     //     }
        //     // })
        //     // $('#formSearch select').on('change', function (e) {
        //     //     page = 1;
        //     //     getGird();
        //     // })
        //
        //     window.getGird = function () {
        //         let url = '?page=' + page + '&' + $('#formSearch').serialize();
        //         $.ajax({
        //             type: "GET",
        //             url: url,
        //             success: function (res) {
        //                 $('#gird').html(res);
        //                 // goToDivById('gird', 70)
        //             }
        //         });
        //     }
        //
        //     $('.image-category img').click(function(){
        //         $('#exampleModalCenter').modal('show');
        //         var img = $(this).attr('src');
        //         var alt = $(this).attr('alt');
        //         $('#modal-body img').attr('src', img);
        //         $('#modal-body img').attr('alt', alt);
        //     });
        //
        //     $('body').on('click', '.delete', function () {
        //         let id = $(this).data('id');
        //         // ajaxDeleteObject('Chi nhánh', '/admin/branch/'+id, getGird);
        //         swal({
        //             title: "Xóa ",
        //             text: "Bạn Muốn Xóa Danh Mục Này?",
        //             icon: "warning",
        //             buttons: {
        //                 cancel: {
        //                     text: "Không",
        //                     value: null,
        //                     visible: true,
        //                     className: "",
        //                     closeModal: true,
        //                 },
        //                 confirm: {
        //                     text: "Có",
        //                     value: true,
        //                     visible: true,
        //                     className: "bg-danger",
        //                     closeModal: false
        //                 }
        //             }
        //         }).then((isConfirm) => {
        //             if (isConfirm) {
        //                 $.ajax({
        //                     method: 'delete',
        //                     url: 'nk-categories/' + id,
        //                     headers: {
        //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                     },
        //                     success: function (res) {
        //                         if (res == 1) {
        //                             getGird();
        //                             swal({
        //                                 title: "Đã Xóa!",
        //                                 text: "Xóa Thành Công",
        //                                 icon: "success",
        //                                 buttons: {
        //                                     confirm: {
        //                                         text: "OK",
        //                                         className: "btn-primary",
        //                                         closeModal: true
        //                                     }
        //                                 }
        //                             })
        //                             // swal("Đã xóa!", nameObject.charAt(0).toUpperCase() + nameObject.substr(1).toLowerCase()+" đã được xóa", "success");
        //                         } else {
        //                             swal("Lỗi!", "Danh Mục Này Đã Có Sản Phẩm", "error");
        //                         }
        //                     },
        //                     error: function () {
        //                         swal("Lỗi!", "Không Xóa Được", "error");
        //                     }
        //                 })
        //             }
        //         });
        //     })
        // })
    </script>
@endsection
