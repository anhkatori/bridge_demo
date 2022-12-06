@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-position">ユーザー登録　〉ユーザー一覧</h5>
                    <h2 class="card-title">ユーザー一覧</h2>
                    
                </div>
                <div class="card-content mt-4">
                    <div class="card-body">
                        <form id="formAdd" action="" method="POST">
                            <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-add-users form-regist">
                                <fieldset class="form-group ">
                                    <div class="box d-flex justify-content-between">
                                        <div class="d-flex">
                                            <label for="" class="d-flex align-items-center">学校名</label>                                    
                                            <input type="text" name="school_name" id="school_name">
                                        </div>
                                        <div class="d-flex">
                                            <label for="" class="d-flex align-items-center justify-content-center">学校ID</label>                                    
                                            <input type="text" name="school_id" id="school_id">
                                        </div>
                                    </div>
                                    <div class="box d-flex justify-content-between">
                                        <div class="d-flex">
                                            <label for="" class="d-flex align-items-center">学科名</label>                                    
                                            <input type="text" name="department_name" id="department_name">
                                        </div>
                                        <div class="d-flex">
                                            <label for="" class="d-flex align-items-center justify-content-center">学科ID</label>                                    
                                            <input type="text" name="department_id" id="department_id">
                                        </div>
                                    </div>
                                    <div class="box">
                                        <label for="" class="">ユーザー名</label>
                                        <input type="text" name="username" id="username">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">年齢</label>
                                        <input type="text" name="age" id="age">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">ユーザーID</label>
                                        <input type="text" name="user_id" id="user_id">
                                        <button class="float-right btn btn-regist">追&nbsp;&nbsp;&nbsp;&nbsp;加&nbsp;&nbsp;&nbsp;&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;録</button>
                                    </div>
                                    
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script></script>
@endsection