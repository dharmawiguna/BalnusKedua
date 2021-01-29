@extends('layouts.master')


@section('content')

	 <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form class="" action="/show_order" method="post" >
                 


                  <div class="row">
                      <table id="order_data" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Product</th>
                          <th>Region</th>
                          <th>Payment</th>
                          <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                    		<?php  
                          $i = 1;
                        ?>
                        @foreach($list_order as $list)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$list->order_id}}</td>
                          <td>{{$list->customer_name}}</td>
                          <td style="width: 400px;">{{$list->product_name}}</td>
                          <td>{{$list->region}}</td>
                          <td>{{$list->currency}} {{$list->sales}}</td>
                          <td>{{$list->created_at->format('Y-m-d')}}</td>
                        </tr>
                        @endforeach
                       
                        
                      	
                        </tbody>
                       
                        </table>
                  </div>

                  
                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  


<script type="text/javascript">

</script>
@endsection

