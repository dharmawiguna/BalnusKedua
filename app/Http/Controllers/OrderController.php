<?php

namespace App\Http\Controllers;

use App\Charts\OrderChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $order = Http::get('https://api-test.godig1tal.com/order/all_order');
        $total_order= collect($order->json()['data'])->count($order);
        // $region = collect($order->json()['data']);
        // $data_region = $region->groupBy('region');
        // $data_sales = $data_region->selectRaw('count(*) as total, region')->get();
        // $data_sales = $data_region->count('sales');

        // dd($data_sales);
        // $labels_region = $region->pluck('region');
        // $sales = $region->pluck('sales');
        
        // $region_chart = new OrderChart;
        // $region_chart->labels($labels_region);
        // $region_chart->dataset('Data Sales from Region', 'pie', $sales);


        // $product = Http::get('https://api-test.godig1tal.com/product/all_product');
        // $prod = $product->json()['data'];

    	return view('dashboard', [
            'total_order' => $total_order,
            // 'region_chart' => $region_chart,
        ]);
    }

    public function order()
    {
    	$customer = Http::get('https://api-test.godig1tal.com/customer/all_customer');
    	$cust = $customer->json()['data'];
    	
    	$product = Http::get('https://api-test.godig1tal.com/product/all_product');
    	$prod = $product->json()['data'];

    	// dd($cust);
    	return view('order.create', [
    		'cust' => $cust,
    		'prod' => $prod,
    	]);
    	
    }

    public function orderCreate(Request $request)
    {
    	// $order = Order::where('order_id', $request->order_id)->get();
    	$order = Order::all();
        $i = 0;
    	$nubRow = count($order)+ $i++;
    	if ($nubRow<10) {
    		$order_id = $order->currency=$request->currency.'-'.date('Y').'-'."10000".$nubRow;
    	}elseif ($nubRow>=10 && $nubRow<=99) {
    		$order_id = $order->currency=$request->currency.'-'.date('Y').'-'."1000".$nubRow;
    	}elseif ($nubRow<100) {
    		$order_id = $order->currency=$request->currency.'-'.date('Y').'-'."100".$nubRow;
    	}

    	// dd($order_id);

    	$data = new Order;
    	$data->order_id=$order_id;
    	$data->customer_name=$request->cust_id;
        $data->product_name=$request->prod_id;
    	$data->region=$request->region;
    	$data->currency=$request->currency;
    	$data->sales=$request->sales;
    	$data->save();
    	return back()->with('success',"Order Added Successfully");
    	

    }

    public function listOrder()
    {   
        // $data['order']=Order::where('order_id');
        
        $list_order = Order::orderBy('created_at', 'DESC')
                ->get();
        return view('order.listorder', compact('list_order'));
    }

    // public function showOrder(Request $request)
    // {
    //     if (request()->ajax()) {
    //         if (!empty($request->filter_region)) {
    //             $data = Order::select('order_id', 'customer_name', 'product_name', 'region', 'currency', 'sales')
    //                         ->where('region', $request->filter_region)
    //                         ->get();
    //         }else{
    //             $data = Order::select('order_id', 'customer_name', 'product_name', 'region', 'currency', 'sales')
    //                         ->get();
    //         }
    //         return datatables()->of($data)->make(true);
    //     }
    //     $showOrder = Order::select('region')
    //                         ->groupBy('region')
    //                         ->orderBy('order_id', 'DESC')
    //                         ->get();
    //     return view('order.listorder', compact('showOrder'));

    // }



}
