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
                            THÊM TRẢ HÀNG
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
		                        
                                <form action="admin/trahang/them" method="POST">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group">
	                                    <label>ID hóa đơn</label>
	                                    <select class="form-control" name="HoaDon">
                                    	@foreach($hoadon as $hd)
                                    	<option value="{{$hd->idhd}}">{{$hd->idhd}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>
									
									<div class="form-group">
	                                    <label>Tổng tiền</label>
	                                    <input class="form-control" name="tongtien" placeholder="Nhập tên người quản lý tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Số tiền giảm</label>
	                                    <input class="form-control" name="giamgia" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Ngày trả</label>
	                                    <input class="form-control" name="ngaytra" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>ID Nhập</label>
	                                    <select class="form-control" name="NhapKho">
                                    	@foreach($nhapkho as $nk)
                                    	<option value="{{$nk->idnk}}">{{$nk->idnk}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>

	                                <div class="form-group">
	                                    <label>Tên tổ chức</label>
	                                    <select class="form-control" name="ToChuc">
                                    	@foreach($tochuc as $tc)
                                    	<option value="{{$tc->idtc}}">{{$tc->tentc}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>

									 <div class="form-group">
	                                    <label>Ghi chú</label>
	                                    <input class="form-control" name="ghichu" placeholder="Nhập ghi chú tổ chức"/>
	                                </div>

                                	<button type="submit" class="btn btn-info">Thêm</button>
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