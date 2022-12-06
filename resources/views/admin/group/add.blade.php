@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-position">学校マスタ管理　〉学校管理</h5>
                    <h2 class="card-title mb-3">団体マスタ登録</h2>
                    <a href="{{ URL::previous() }}" class="back">戻&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;る</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form id="formAdd" action="" method="POST">
                            <div class="col-xl-2 col-lg-6 col-md-12 mb-1 form-regist">
                                <fieldset class="form-group ">
                                    <div class="box">
                                        <label for="" class="">企業（団体名）</label>                                    
                                        <input type="text" name="organization_name" id="organization_name">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">団体ID</label>                                    
                                        <input type="text" name="group_id" id="group_id">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">種別</label>
                                        <select name="type" id="">
                                            <option value="">就労支援事業所</option>
                                        </select>
                                        
                                    </div>
                                    <div class="box">
                                        <label for="" class="">電話番号</label>
                                        <input type="text" name="phone_number" id="phone_number">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">代表者氏名</label>
                                        <input type="text" name="representative_name" id="representative_name">
                                    </div>
                                    <div class="box">
                                        <label for="" class="">担当者氏名</label>
                                        <input type="text" name="person_charge_name" id="person_charge_name">
                                    </div>
                                    <div class=" box">
                                        <label for="" class="">担当者メールアドレス</label>
                                        <input type="text" name="type" id="person_charge_email">
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