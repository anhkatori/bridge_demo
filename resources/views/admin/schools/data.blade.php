<div class="table_box">
    <table class="table" id="administrative_table">
        <thead>
            <tr>
                <th class="title"><input type="checkbox" id="checkAll"> </th>
                <th class="title"> STT </th>
                <th class="title">Tháng </th>
                <th class="title">Chi phí văn phòng </th>
                <th class="title">Chi phí hành chính khác</th>
                <th class="title">Chi phí hành chính nhân sự</th>
                <th class="title"> Tổng </th>
                <th class="title"> Số nhân sự (manmonth) </th>
                <th class="title"> Chi phí hành chính TB/MM </th>
                @if (Auth::user()->can('edit-administrative_cost') || Auth::user()->can('delete-administrative_cost'))
                    <th class="title" colspan="2">Hành động</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <?php $page = $administrative->currentPage();
            $index = ($page - 1) * $administrative->perPage(); ?>
            @foreach ($administrative as $adminis)
                <?php $index++; ?>
                <tr class="content">
                    <td><input type="checkbox" id="checkEach" name='checkEach' data-id="{{ $adminis->id }}"> </td>
                    <td>{{ $index }}</td>
                    <td>{{ \Carbon\Carbon::parse($adminis->time)->format('m/Y') }}</td>
                    <td>{{ number_format($adminis->office_cost) }}</td>
                    <td>{{ number_format($adminis->other_cost) }}</td>
                    <td>{{ number_format($adminis->staff_cost) }}</td>
                    <td>{{ number_format($adminis->sum) }}</td>
                    <td>{{ number_format($adminis->staffs) }}</td>
                    <td>{{ number_format($adminis->average) }}</td>
                    @can('edit-administrative_cost')
                        <td>
                            <button class="edit edit_administrative" type="button" data-toggle="modal"
                                data-target="#administrative_edit" data-id="{{ $adminis->id }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                        </td>
                    @endcan
                    @can('delete-administrative_cost')
                        <td>
                            <button class="delete" id="delete_administrative" data-id="{{ $adminis->id }}">
                                <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </button>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    <input id="current_page" value={{ $administrative->currentPage() }} hidden>
    <input id="total" value={{ $administrative->total() }} hidden>
    <div id="pagination_all">
        {{ $administrative->links('pagination::bootstrap-4') }}
    </div>
    <div id="pagination_search" class="hidden">
        {{ $administrative->links('pagination::bootstrap-4') }}
    </div>
</div>
