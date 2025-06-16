@extends('admin.layouts.app')

	@section('content')

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
			<x-admin.header/>
			<!-- /Header -->

			<!-- Sidebar -->
			<x-admin.sidebar/>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Orders</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Orders</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Orders</h4>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover" id="orders">
                                            <thead>
                                                <tr>
                                                    <th>Order No</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Date Updated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr class="table-tr" onclick="orderDetails('{{$order->id}}')">
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->status}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>{{$order->updated_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="loading">
                                            <img id="loading-image" src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831" alt="Loading..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>

<!--start popup order details-->
                    <div class="modal" id="myModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Order: <span id="show_order_no"></span></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                                                        <div class="alert alert-danger">Shipping costs excluded</div>
                                    <table class="table mb-0 table-hover" id="order">
                                        <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Sub Total</th>
                                        </tr>
                                        </thead>
                                        <tbody id="order_details_tr">
                                        </tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Grand Total</b></td>
                                            <td><b>R<span id="order_total"></span></b></td>
                                        </tr>
                                    </table>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end popup order details-->
            


				</div>
			</div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

        <script>
            function orderDetails (id)
            {
                let table_tr = "";
                let order_total = 0;


                $(".loading").show();
                $("#orders").hide();

                $.ajax({
                    type: "POST",
                    url: '{{url('admin/order/details')}}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType:"json",
                    data: {
                        id: id,
                    },
                    success: function(response){
                        $(".loading").hide();
                        $("#orders").show();
                        $('#myModal').modal('show');

                        $.each(response.data, function(index, value) {
                            table_tr += "<tr><td><img src='https://d2uxnwa9lobg48.cloudfront.net/" + value.image +"' height='50px;' width=''50px;></td><td>" + value.name + "</td><td>" + value.new_price + "</td><td>" + value.quantity + "</td><td>" + value.status + "</td><td>" + value.sub_total + "</td></tr>";
                        order_total = order_total + value.sub_total;

                        });
                        $("#show_order_no").html(response.data[0].order_number);
                        $("#order_details_tr").html(table_tr);
                        $("#order_total").html(order_total);
                    }
                });
            }
        </script>

        <style>
            .table-tr {
                cursor: pointer;
            }
            .loading {
                text-align: center;
                display: none;
            }
        </style>

@endsection
