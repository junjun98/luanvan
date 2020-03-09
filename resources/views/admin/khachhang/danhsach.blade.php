@extends('admin.layout.index')

@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">Danh Sách Khách Hàng</div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Bulk action</option>
                            <option value="1">Xóa lựa chọn</option>
                            <option value="2">Sửa lựa chọn</option>
                            <option value="3">Xuất</option>
                        </select>
                        <button class="btn btn-sm btn-default">Thực hiện</button>
                    </div>

                    <div class="col-sm-4">
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button">Tìm</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif

                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th style="width:30px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Tên khách hàng</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Tên tổ chức</th>
                                <th>Ghi chú</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khachhang as $kh)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$kh->tenkh}}</td>
                                <td>{{$kh->ngaysinh}}</td>
                                <td>{{$kh->diachi}}</td>
                                <td>{{$kh->sdt}}</td>
                                <td>{{$kh->gioitinh}}</td>
                                <td>{{$kh->email}}</td>
                                <td>{{$kh->tochuc->tentc}}</td>
                                <td>{{$kh->ghichu}}</td>
                                <td>
                                    <a href="admin/khachhang/sua/{{$kh->idkh}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Bạn có muốn xóa?')" href="admin/khachhang/xoa/{{$kh->idkh}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection