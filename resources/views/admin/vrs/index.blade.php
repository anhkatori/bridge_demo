@extends('layouts.master')
@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="content-header-left col-md-6 col-12">
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                {{--                {{ Breadcrumbs::render('nk-categories.index') }} --}}
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <div class="alert bg-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-position">d動画ライブラリー管理　〉３６０°動画</h5>
                        <h2 class="card-title">３６０°動画</h2>
                        {{-- <div class="heading-elements"> --}}
                            {{-- <ul class="list-inline mb-0"> --}}
                                {{--                                <li><a href="{{route('nk-categories.index')}}"><i class="fa fa-refresh"></i></a> --}}
                                {{--                                </li> --}}
                                {{--                            @if (Auth::user()->checkPermissionSuperAdmin(\App\Constants\CmsActionsSetting::SETTING_CATEGORY_NK_PRODUCT_INDEX)) --}}
                                {{--                                <li><a href="{{route('nk-categories.create')}}"><i class="fa fa-plus"></i></a></li> --}}
                                {{--                            @endif --}}
                            {{-- </ul> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="card-content">
                        <div class="registration-date">
                            登録日2022 / 10 / 22
                        </div>
                        <div class="card-body">

                            <div class="card-form">
                                <div class="row">
                                <form id="formvr" class="form-vr" action="" method="GET">
                                    <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-add-vr">
                                        <fieldset class="form-group info-box-vr d-flex">
                                            <div class="add-vr d-flex">
                                                <label for="">動&nbsp;&nbsp;画</label>
                                                <div class="info-file">
                                                    <input type="file" name="vr" id="vr">
                                                    <label for="vr">ファイルを選択</label>
                                                    <div class="file-name" id="file-name"></div>
                                                </div>
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl49bpqTz1cRRmmZQcTG-SCslH-7I_Tigyjg&usqp=CAU" alt="" height="130px" width="200px">
                                            </div>
                                            <div class="mass-registration d-flex">
                                                <div class="info-regist">
                                                    <div class="publishing-settings">
                                                        <label for="">公開設定</label>
                                                        <select name="regime" id="">
                                                            <option value="" class="text-center">非公開</option>
                                                        </select>
                                                    </div>
                                                    <div class="person-in-charge">
                                                        <label for="">担当者名</label>
                                                        <select name="name-person-in-charge" id="">
                                                            <option value="" class="text-center"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="regist d-flex align-items-center"> --}}
                                                    <a href="" class="btn regist">一括登録</a>
                                                {{-- </div> --}}
                                            </div>
                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                            </div>
                            <div id="gird">
                                @include('admin.vrs.grid')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
        $(document).ready(function() {
        let inputFile = document.getElementById('vr');
        let fileNameField = document.getElementById('file-name');
            $(document).on('change', function(event) {
                let uploadFileName = event.target.files[0].name;
                fileNameField.textContent = uploadFileName;
            })
        })
        // let inputFile = document.getElementById('vr');
        // let fileNameField = document.getElementById('file-name');
        // inputFile.addEventListener('change', function(event) {
        //     let uploadFileName = event.target.files[0].name;
        //     fileNameField.textContent = uploadFileName;
        // }) 
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
