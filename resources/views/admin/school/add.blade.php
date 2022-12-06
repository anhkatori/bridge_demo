@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-position">学校マスタ管理　〉学校管理</h5>
                    <h2 class="card-title mb-3">学校マスタ登録</h2>
                    <a href="{{ URL::previous() }}" class="back">戻&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;る</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form id="formAdd" action="" method="POST">
                            <div class="col-xl-2 col-lg-6 col-md-12 mb-1 school form-regist">
                                <fieldset class="form-group ">
                                    <div class="box d-flex justify-content-between">
                                        <div class="d-flex">
                                            <label for="" class="mt-le-1">学校名</label>                                    
                                            <input type="text" name="school_name" id="school_name">
                                        </div>
                                        <div class="d-flex">
                                            <label for="" class="text-center mt-le-1 ">学校ID</label>                                    
                                            <input type="text" name="school_id" id="school_id">
                                        </div>
                                    </div>
                                    <div class="box d-flex justify-content-between">
                                        <div class="d-flex">
                                            <label for="" class="mt-le-1 ">学科名</label>
                                            <ol class="">
                                                <li class="mb-2"><input type="text" name="department_name" id="department_name"></li>
                                                <li class="mb-2"><input type="text" name="department_name" id="department_name"></li>
                                                <li class="mb-2"><input type="text" name="department_name" id="department_name"></li>
                                                <li class="mb-2"><input type="text" name="department_name" id="department_name"></li>
                                                <li><input type="text" name="department_name" id="department_name"></li>
                                            </ol>
                                            
                                        </div>
                                        <div class="d-flex">
                                            <label for="" class="text-center mt-le-1 ">学科ID</label>
                                            <ol class="">
                                                <li class="mb-2"><input type="text" name="department_id" id="department_id"></li>
                                                <li class="mb-2"><input type="text" name="department_id" id="department_id"></li>
                                                <li class="mb-2"><input type="text" name="department_id" id="department_id"></li>
                                                <li class="mb-2"><input type="text" name="department_id" id="department_id"></li>
                                                <li><input type="text" name="department_id" id="department_id"></li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <label for="" class="">電話番号</label>
                                        <input type="text" name="phone_number" id="phone_number">
                                    </div>
                                    <div class="box">
                                        <label for="" class="r">代表者氏名</label>
                                        <input type="text" name="representative name" id="representative name">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">担当者氏名</label>
                                        <input type="text" name="pic_name" id="pic_name">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">担当者メールアドレス</label>
                                        <input type="text" name="email_pic_name" id="email_pic_name">
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