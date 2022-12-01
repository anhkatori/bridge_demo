<div class="row form-row">
    <style>
        .image-category img {
            height: 100px;
            margin: 0 auto;
            object-fit: contain;
            cursor: pointer;
        }
    </style>
    {{-- @php  @endphp --}}
    {{--    @if (@count($data)) --}}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-head">
                <tr>
                    <th class="text-center" style="width: 8%;">
                        氏名
                        <span class="sort" style="float: right;">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </span>
                    </th>

                    <th>ID<span class="sort" style="float: right;"><i class="fa fa-sort-desc"
                                aria-hidden="true"></i></span></th>
                    <th>学校名</th>
                    <th>年度</th>
                    <th>所属 </th>
                    <th>利用時間</th>
                    <th>登録日</th>
                    <th>有効期限</th>
                    <th class="text-center">ステータス</th>
                    <th class="text-center">アクション</th>
                </tr>
            </thead>
            <tbody class="table-body">
                {{--                @foreach ($data as $key => $row) --}}
                {{--                    <tr> --}}
                {{--                        <th class="text-center" scope="row">{{($data->currentPage()-1)*$data->perPage()+$key+1}} --}}
                {{--                        <td>{{$row->name}}</td> --}}
                {{--                        <td class="image-category"> --}}
                {{--                            <img src="{{ asset($row->image) }}" class="w-100" alt="{{ $row->name }}" --}}
                {{--                                 title="{{ $row->name }}"/> --}}
                {{--                        </td> --}}
                {{--                        <td>{{@$row->category->name}}</td> --}}
                {{--                        <td class="text-center"> --}}
                {{--                            @if (Auth::user()->checkPermissionSuperAdmin(\App\Constants\CmsActionsSetting::SETTING_CATEGORY_NK_PRODUCT_DELETE)) --}}
                {{--                                @if ($row->nk_product_clinic_count == 0) --}}
                {{--                                    <a class="danger mr-1 delete" data-id="{{$row->id}}"><i --}}
                {{--                                            class="fa fa-trash-o"></i></a> --}}
                {{--                                @endif --}}
                {{--                            @endif --}}
                {{--                            <a class="warning mr-1" href="{{route('nk-categories.edit', [$row->id])}}"><i --}}
                {{--                                    class="fa fa-pencil"></i></a> --}}
                {{--                        </td> --}}
                {{--                    </tr> --}}
                {{--                @endforeach --}}
            </tbody>
        </table>
    </div>
    {{--    @else --}}
    {{-- <div class="text-center col-12 font-weight-bold">
        Không có dữ liệu
    </div> --}}
    {{--    @endif --}}
</div>
{{-- @section('script') --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        // $(function(){
        var token = "{{csrf_token()}}"
        $.ajax({
            url: "{{ url('api/admin/user/profile') }}",
            method: 'GET',   
            success: function(data) {
                // data = JSON.parse(data);
                // if(typeof(data) === "string"){data = JSON.parse(data)}
                console.log(data);
                $("table tbody").html('');
                data.data.forEach(function(item, index) {
                    if(item.status === 1) {
                        var status = "アクティブ";
                    }
                    $("table tbody").append(`
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td>${item.id}</td>
                        <td>${item.school}</td>
                        <td>${item.school_year}</td>
                        <td>${item.class}</td>
                        <td>${item.usage_time}</td>
                        <td>${item.created_at}</td>
                        <td>${item.expired_at}</td>
                        <td class="text-center">${status}</td>
                        
                        <td class="text-center">
                            <a class="refresh mr-1" href="#" id='refresh' type="button" data-toggle="modal" data-target="#outsource_refresh" style="color: #707070">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </a>
                            <a class="warning mr-1" href="#" id="edit"><i class="fa fa-pencil"></i></a>
                            <a class="danger delete" href="#" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                `);
                })
            },
            error: function(error) {
                console.log(error);
            }
        })
        // })
    </script>
{{-- @endsection --}}
    {{-- <div class="tb-paginate float-md-right"> --}}
    {{--    {{ $data->links() }} --}}
    {{-- </div> --}}
