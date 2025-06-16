<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebook(Product $product)
    {
        Share::page('http://jorenvanhocht.be')->facebook();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function twitter(Product $product)
    {
        Share::page('http://jorenvanhocht.be')->twitter();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reddit(Product $product)
    {
        Share::page('http://jorenvanhocht.be')->reddit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function linkedin(Product $product)
    {
        Share::page('http://jorenvanhocht.be', 'Share title')->linkedin();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function whatsapp(Product $product)
    {
        Share::page('http://jorenvanhocht.be')->whatsapp();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function telegram(Product $product)
    {
        Share::page('http://jorenvanhocht.be')->telegram();
    }
}
