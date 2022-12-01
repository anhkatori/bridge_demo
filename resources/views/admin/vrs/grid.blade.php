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
           <table class="table table-bordered table-striped">
               <thead class="table-head">
               <tr>
                   <th class="text-center" style="width: 4%;">
                        No.
                        <span class="sort" style="float: right;">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </span>
                    </th>
                    
                   <th style="width: 10%;">動画</th>
                   <th style="width: 10%;">公開設定</th>
                   <th style="width: 10%;">担当者</th>
                   <th style="width: 10%;">登録日</th>
                   <th class="text-center" style="width: 5%;">削除</th>
               </tr>
               </thead>
               <tbody class="table-body">
                   <div class="table-body-content">
{{--                @foreach ($data as $key=>$row)--}}
                   <tr>
                       <td class="text-center">1</td>
                       <td>kanjyo_01.mp4</td>
                       <td>非公開</td>
                       <td>山本</td>
                       <td>2022/10/22</td>
                       <td>
                        <a class="warning mr-1" href="#"><i class="fa fa-pencil"></i></a>
                        <a class="danger delete" data-id=""><i class="fa fa-trash-o"></i></a>
                       </td>
                   </tr>
                   <tr>
                    <td class="text-center">1</td>
                    <td>kanjyo_01.mp4</td>
                    <td>非公開</td>
                    <td>山本</td>
                    <td>2022/10/22</td>
                    <td>
                     <a class="warning mr-1" href="#"><i class="fa fa-pencil"></i></a>
                     <a class="danger delete" data-id=""><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>kanjyo_01.mp4</td>
                    <td>非公開</td>
                    <td>山本</td>
                    <td>2022/10/22</td>
                    <td>
                     <a class="warning mr-1" href="#"><i class="fa fa-pencil"></i></a>
                     <a class="danger delete" data-id=""><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Lorem ipsum, dolor sit amet consectetur ur corrupti fugit temporibus repellendus vitae accusamus, minus iusto assumenda voluptates! Saepe, architecto fugit adipisci suscipit nemo nihil quas iure sapiente aliquid ipsam.
                    Labore quod delectus neque quia, id voluptatum facilis expedita, ipsa incidunt nihil illum non. Deserunt nobis consectetur excepturi cumque. Nam cupiditate tempore hic sunt repudiandae, nisi optio earum reiciendis pariatur.
                    Ab deserunt non obcaecati numquam deleniti dolor? Eius, voluptate! Ipsa perspiciatis architecto sit dicta facere quidem numquam eaque aliquam veniam, laboriosam, corrupti suscipit fugit esse nisi minima beatae amet dolores.</td>
                    <td>非公開</td>
                    <td>山本</td>
                    <td>2022/10/22</td>
                    <td>
                     <a class="warning mr-1" href="#"><i class="fa fa-pencil"></i></a>
                     <a class="danger delete" data-id=""><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            </div>
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
                   {{-- </tr> --}}
{{--                @endforeach--}}
               </tbody>
           </table>
       </div>
       
{{--    @else--}}
        {{-- <div class="text-center col-12 font-weight-bold">
            Không có dữ liệu
        </div> --}}
{{--    @endif--}}
</div>
{{--<div class="tb-paginate float-md-right">--}}
{{--    {{ $data->links() }}--}}
{{--</div>--}}
