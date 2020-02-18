@extends('admin.layout.index')

@section('content')

<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">NHẬP KHO</div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Xóa lựa chọn</option>
              <option value="2">Sửa lựa chọn</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>
          </div>

          <div class="col-sm-4">
          </div>

          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
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
                <th>ID</th>
                <th>Tên tổ chức</th>
                <th>Tổng giá nhập</th>
                <th>Số tiền giảm</th>
                <th>Tiền trả NCC</th>
                <th>Ngày nhập</th>
                <th>Tên NCC</th>
                <th>Ghi chú</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($nhapkho as $nk)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$nk->idnhap}}</td>
                <td>{{$nk->tochuc->tentc}}</td>
                <td>{{$nk->tonggia}}</td>
                <td>{{$nk->giamgia}}</td>
                <td>{{$nk->tientrancc}}</td>
                <td>{{$nk->ngaynhap}}</td>
                <td>{{$nk->nhacungcap->tenncc}}</td>
                <td>{{$nk->ghichu}}</td>
                <td>
                  <a href="admin/nhapkho/sua/{{$nk->idnhap}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa?')" href="admin/nhapkho/xoa/{{$nk->idnhap}}" class="active styling-edit" ui-toggle-class="">
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
