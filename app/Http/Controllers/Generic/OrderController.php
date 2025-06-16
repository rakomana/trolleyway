<?php

namespace App\Http\Controllers\Generic;

use Illuminate\Database\ConnectionInterface as DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * var $db
     * var $order
     */
    private $db;
    private $order;

    /**
     * Inject Models into the constructor
     *
     * @param DB $db
     * @param Order $order
     */
    public function __construct(DB $db, Order $order)
    {
        $this->db = $db;
        $this->order = $order;
    }

    /**
     * @param $id
     * @return void
     */
    public function getOrderDetails(Request $request)
    {
        $order_details = $this->db->select("CALL getOrderDetails('{$request->id}')");

        return response()
            ->json([
                'success' => true,
                'data' => $order_details
            ]);
    }
}
