@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-position">ユーザー登録　〉ユーザー一覧</h5>
                    <h2 class="card-title mb-3">新規登録</h2>
                    <a href="{{ URL::previous() }}" class="back">戻&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;る</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form id="formAdd" action="" method="POST">
                            <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-regist">
                                <fieldset class="form-group ">
                                    <div class="box">
                                        <label for="" class="">学校・団体名</label>                                    
                                        <input type="text" name="school_name" id="school_name">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">団&nbsp;体&nbsp;I&nbsp;D</label>                                    
                                        <input type="text" name="group_id" id="group_id">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">電話番号</label>
                                        <input type="text" name="phone_number" id="phone_number">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">管理者氏名</label>
                                        <input type="text" name="admin_name" id="admin_name">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">管理者 User ID</label>
                                        <input type="text" name="admin_user_id" id="admin_user_id">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">管理者メールアドレス</label>
                                        <input type="text" name="admin_email" id="admin_email">
                                    </div>
                                    <div class=" box">
                                        <label for="" class="">担当権限</label>
                                        <select name="permission" id="">
                                            <option value="">教師</option>
                                        </select>
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