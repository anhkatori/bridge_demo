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
{{--    @if (@count($data))--}}
       <div class="table-responsive">
           <table class="table table-bordered">
               <thead class="table-head">
               <tr>
                   <th class="text-center" style="width: 8%">
                        No.
                        <span class="sort" style="float: right;">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </span>
                    </th>
                    
                   <th style="width: 20%">団体名</th>
                   <th style="width: 30%">種別</th>
                   <th style="width: 20%">担当</th>
                   <th style="width: 20%">登録人数</th>
                   <th class="text-center" style="width: 8%">編集</th>
                   <th class="text-center" style="width: 8%">削除</th>
               </tr>
               </thead>
{{--                <tbody>--}}
{{--                @foreach ($data as $key=>$row)--}}
{{--                    <tr>--}}
{{--                        <th class="text-center" scope="row">{{($data->currentPage()-1)*$data->perPage()+$key+1}}--}}
{{--                        <td>{{$row->name}}</td>--}}
{{--                        <td class="image-category">--}}
{{--                            <img src="{{ asset($row->image) }}" class="w-100" alt="{{ $row->name }}"--}}
{{--                                 title="{{ $row->name }}"/>--}}
{{--                        </td>--}}
{{--                        <td>{{@$row->category->name}}</td>--}}
{{--                        <td class="text-center">--}}
{{--                            @if(Auth::user()->checkPermissionSuperAdmin(\App\Constants\CmsActionsSetting::SETTING_CATEGORY_NK_PRODUCT_DELETE))--}}
{{--                                @if($row->nk_product_clinic_count == 0)--}}
{{--                                    <a class="danger mr-1 delete" data-id="{{$row->id}}"><i--}}
{{--                                            class="fa fa-trash-o"></i></a>--}}
{{--                                @endif--}}
{{--                            @endif--}}
{{--                            <a class="warning mr-1" href="{{route('nk-categories.edit', [$row->id])}}"><i--}}
{{--                                    class="fa fa-pencil"></i></a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
           </table>
       </div>
{{--    @else--}}
        <div class="text-center col-12 font-weight-bold">
            Không có dữ liệu
        </div>
{{--    @endif--}}
</div>
{{--<div class="tb-paginate float-md-right">--}}
{{--    {{ $data->links() }}--}}
{{--</div>--}}
