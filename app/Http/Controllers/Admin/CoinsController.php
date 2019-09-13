<?php

namespace App\Http\Controllers\Admin;

use App\Coin;
use App\Http\Requests\Admin\Coins\Store;
use App\Http\Requests\Admin\Coins\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = Coin::all();
        return view('admin.shop.coins.index', compact('coins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.coins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        Coin::query()->create([
            'coin' => $request->get('coins'),
            'price' => $request->get('price')
        ]);
        return redirect()->route('coins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coin = Coin::query()->findOrFail($id);
        return view('admin.shop.coins.edit', compact('coin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $coin = Coin::query()->findOrFail($id);
        $coin->update([
            'coin' => $request->get('coins'),
            'price' => $request->get('price')
        ]);
        return redirect()->route('coins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coin = Coin::query()->findOrFail($id);
        $coin->delete();
        return redirect()->back();
    }
}
