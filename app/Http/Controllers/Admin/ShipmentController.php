<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $user = auth()->user(); // Ambil pengguna yang sedang login

        // Ambil ID produk yang dimiliki oleh pengguna
        $ownedProductIds = $user->products()->pluck('id');

        // Filter pengiriman berdasarkan produk yang dimiliki pengguna
        $shipments = Shipment::whereHas('order.orderItems', function ($query) use ($ownedProductIds) {
            $query->whereIn('product_id', $ownedProductIds);
        })->latest()->paginate(10);

        return view('admin.shipments.index', compact('shipments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        $provinces = $this->getProvinces();
		$cities = isset($shipment->province_id) ? $this->getCities($shipment->province_id) : [];

		return view('admin.shipments.edit', compact('shipment', 'provinces', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        $request->validate(
			[
				'track_number' => 'required|max:255',
			]
		);

		$order = \DB::transaction(
			function () use ($shipment, $request) {
				$shipment->track_number = $request->input('track_number');
				$shipment->status = Shipment::SHIPPED;
				$shipment->shipped_at = now();
				$shipment->shipped_by = auth()->id();
				
				if ($shipment->save()) {
					$shipment->order->status = Order::DELIVERED;
					$shipment->order->save();
				}

				return $shipment->order;
			}
		);

		return redirect()->route('admin.orders.show', $order->id)->with([
            'message' => 'success updated shipment !',
            'alert-type' => 'info'
        ]);
    }
}
