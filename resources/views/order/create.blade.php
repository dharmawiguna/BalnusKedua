@extends('layouts.master')


@section('content')

@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
@endif
	<section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Add Transaction</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
	              <li class="breadcrumb-item active">Add Transaction</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>



  <section class="content-header">
      <div class="container-fluid">
      	<div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-warning">
	              <div class="card-header">
	                <h3 class="card-title">Add Order</h3>
	              </div>
                  		<form action="/createorder" method="POST">
                  			{{csrf_field()}}
                			<div class="card-body">
			                    <div class="col-sm-6">
			                      <!-- select -->
			                      <div class="form-group">
			                        <label>Select Customer</label>
			                        <select class="form-control" name="cust_id">
			                       		<option>--Select Customer--</option>	
			                        	@foreach($cust as $c)
			                         	<option value="{{$c['customer_name']}}">{{$c['customer_name']}}</option>
			                        	@endforeach
			                        </select>
			                      </div>
			                    </div>

			                    <div class="col-sm-6">
			                      <div class="form-group">
			                        <label>Select Product</label>
			                        <select class="form-control" name="prod_id">
			                        	<option>--Select Product--</option>
			                        	@foreach($prod as $p)
			                        	<option value="{{$p['product_name']}}" >{{$p['product_name']}}</option>
			                       		@endforeach
			                        </select>
			                      </div>
			                    </div>

				                    <div class="col-sm-6">
				                      <div class="form-group">
				                        <label>Select Region</label>
				                        <select class="form-control" name="region">
			                        		<option>--Select Region--</option>	
			                          		<option name="East" value="East">East</option>
			                          		<option name="West" value="West">West</option>
			                          		<option name="Centra" value="Central">Central</option>
			                          		<option name="Sout" value="South">South</option>
				                        </select>
				                      </div>
				                    </div>

				                    <div class="col-sm-6">
				                      <div class="form-group">
				                        <label>Select Currency</label>

				                        <select class="form-control" name="currency">
					                        <option>--Select Currency--</option>
				                          	<option name="US" value="US">US</option>
				                          	<option name="CA" value="CA">CA</option>
				                        </select>
				                      </div>
				                    </div>

				                    <div class="form-group col-4">
				                    	<label>Total Sales</label>
				                    	<input type="number" step="any" class="form-control" value="sales" name="sales"placeholder="Sales">
				                  	</div>

				                  	<div class="card-footer">
				                  		<button type="submit"  class="btn btn-primary">Submit</button>
				                	</div>
                  			

		                </form>
              			</div>
          			</div>
      			</div>
  			</div>
              <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection