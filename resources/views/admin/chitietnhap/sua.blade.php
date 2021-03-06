@extends('admin.layout.index')

@section('content')

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            SỬA CHI TIẾT NHẬP
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
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
		                        
                                <form action="admin/chitietnhap/sua/{{$chitietnhap->idctn}}" method="POST">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group">
	                                    <label>Số lượng</label>
	                                    <input class="form-control" name="soluong" placeholder="Nhập tên người quản lý tổ chức" value="{{$chitietnhap->soluong}}">
	                                </div>
									
									<div class="form-group">
	                                    <label>Giá tiền</label>
	                                    <input class="form-control" name="gia" placeholder="Nhập tên người quản lý tổ chức" value="{{$chitietnhap->gia}}">
	                                </div>

	                                <div class="form-group">
	                                    <label>Đơn vị tính</label>
	                                    <select class="form-control" name="DonViTinh">
                                    	@foreach($donvitinh as $dvt)
                                    	<option value="{{$dvt->iddvt}}">{{$dvt->tendvt}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>

	                                <div class="form-group">
	                                    <label>Mã phiếu nhập</label>
	                                    <select class="form-control" name="NhapKho">
                                    	@foreach($nhapkho as $nk)
                                    	<option value="{{$nk->idnhap}}">{{$nk->idnhap}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>

                                	<button type="submit" class="btn btn-info">Sửa</button>
                            	</form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>

    </div>
    <!-- page end-->
	</section>
</section>

@endsection