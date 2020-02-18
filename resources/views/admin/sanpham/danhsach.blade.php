@extends('admin.layout.index')

@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <div class="panel-heading">Danh sách sản phẩm</div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Thực hiện tất cả</option>
                            <option value="1">Xóa mục đã chọn</option>
                            <option value="2">Sửa tất cả</option>
                            <option value="3">Xuất ra</option>
                        </select>
                        <button class="btn btn-sm btn-default">Thục hiện</button>
                    </div>

                    <div class="col-sm-4">
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Tìm kiếm">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button">Tìm</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th style="width:30px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Tên sản phẩm</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Tên danh mục</th>
                                <th>Đơn vị tính</th>
                                <th>Giá bán</th>
                                <th>Giá nhập</th>
                                <th>Hình</th>
                                <th>Số lượng tồn</th>
                                <th>Ghi chú</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $sp)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$sp->tensp}}</td>
                                <td>{{$sp->idncc}}</td>
                                <td>{{$sp->idnsp}}</td>
                                <td>{{$sp->iddvt}}</td>
                                <td>{{$sp->giaban}}</td>
                                <td>{{$sp->gianhap}}</td>
                                <td>{{$sp->hinh}}</td>
                                <td>{{$sp->soluongton}}</td>
                                <td>{{$sp->ghichu}}</td>
                                <td>
                                    <a href="{{URL::to('admin/sanpham/sua/'.$sp->idsp)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('admin/sanpham/xoa/'.$sp->idsp)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-15 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection