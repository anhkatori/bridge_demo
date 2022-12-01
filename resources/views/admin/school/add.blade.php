@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-position">ユーザー登録　〉ユーザー一覧</h5>
                    <h2 class="card-title mb-3">新規登録</h2>
                    <a href="{{ URL::previous() }}" class="back">戻る</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form id="formAdd" action="" method="POST">
                            <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-regist">
                                <fieldset class="form-group ">
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">学校名</label>                                    
                                        <input type="text" name="school_name" id="school_name">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">電話番号</label>
                                        <input type="text" name="phone_number" id="phone_number">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">代表者氏名</label>
                                        <input type="text" name="representative name" id="representative name">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">担当者氏名</label>
                                        <input type="text" name="pic_name" id="pic_name">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">担当者メールアドレス</label>
                                        <input type="text" name="email_pic_name" id="email_pic_name">
                                        <button class="btn btn-regist">追加登録</button>
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