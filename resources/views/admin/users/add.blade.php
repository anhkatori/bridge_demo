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
                            <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-regist">
                                <fieldset class="form-group ">
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">学校名</label>                                    
                                        <input type="text" name="school_name" id="school_name">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">ユーザー名</label>
                                        <input type="text" name="username" id="username">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">年齢</label>
                                        <input type="text" name="school_year" id="school_year">
                                    </div>
                                    <div class="d-flex box">
                                        <label for="" class="d-flex align-items-center">ユーザーID</label>
                                        <input type="text" name="user_id" id="user_id">
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