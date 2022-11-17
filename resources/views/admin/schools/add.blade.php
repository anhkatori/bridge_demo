<div class="modal fade" id="administrative-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm chi phí hành chính</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id='form-add-administrative'>
                    @csrf
                    {{-- @method('POST') --}}
                    <div class="OT">
                        <span class="text-danger">
                            <strong id="month_error" class="err"></strong>
                        </span>
                        <div class="box">
                            <label class="title">
                                Tháng
                            </label>
                            <input type="text" class="content time" name="month" id="only_day">
                        </div>
                        <span class="text-danger">
                            <strong id="office_cost_error" class="err"></strong>
                        </span>
                        <div class="box">
                            <label class="title">
                                Chi phí văn phòng
                            </label>
                            <input type="text" class="content field_clear" name="office_cost">
                        </div>
                        <span class="text-danger">
                            <strong id="other_cost_error" class="err"></strong>
                        </span>
                        <div class="box">
                            <label class="title">
                                Chi phí hành chính khác
                            </label>
                            <input type="text" class="content field_clear" name="other_cost">
                        </div>
                        <span class="text-danger">
                            <strong id="staff_cost_error" class="err"></strong>
                        </span>
                        <div class="box">
                            <label class="title">
                                Chi phí hành chính nhân sự
                            </label>
                            <input type="text" class="content field_clear" name="staff_cost">
                        </div>
                        <span class="text-danger">
                            <strong id="staffs_error" class="err"></strong>
                        </span>
                        <div class="box">
                            <label class="title">
                                Số nhân sự (manmonth):
                            </label>
                            <input type="text" class="content field_clear" name="staffs">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button id="save-administrative" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
