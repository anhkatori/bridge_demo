<div class="modal fade" id="administrative_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa chi phí hành chính</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['id' => 'form-edit-administrative']) }}
                @csrf
                @method('PUT')
                <div class="OT">
                    <input type="hidden" name="id" id="id" value="">
                    <span class="text-danger">
                        <strong id="time_edit_error" class="err"></strong>
                    </span>
                    <div class="box">
                        <label class="title">
                            Tháng
                        </label>
                        <input type="text" class="content time time_edit" name="month" id="only_day2">
                    </div>
                    <span class="text-danger">
                        <strong id="office_cost_edit_error" class="err"></strong>
                    </span>
                    <div class="box">
                        <label class="title">
                            Chi phí văn phòng
                        </label>
                        <input type="text" class="content" name="office_cost" id="office_cost">
                    </div>
                    <span class="text-danger">
                        <strong id="other_cost_edit_error" class="err"></strong>
                    </span>
                    <div class="box">
                        <label class="title">
                            Chi phí hành chính khác
                        </label>
                        <input type="text" class="content" name="other_cost" id="other_cost">
                    </div>
                    <span class="text-danger">
                        <strong id="staff_cost_edit_error" class="err"></strong>
                    </span>
                    <div class="box">
                        <label class="title">
                            Chi phí hành chính nhân sự
                        </label>
                        <input type="text" class="content" name="staff_cost" id="staff_cost">
                    </div>
                    <span class="text-danger">
                        <strong id="staffs_edit_error" class="err"></strong>
                    </span>
                    <div class="box">
                        <label class="title">
                            Số nhân sự (manmonth):
                        </label>
                        <input type="text" class="content" name="staffs" id="staffs">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="update-administrative" class="btn btn-primary">Sửa</button>
                </div>
                {{ Form::close() }}
            </div>

        </div>
    </div>
</div>
