<?php

namespace App\Http\Controllers\Admin;

use App\Boost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boosts = Boost::all();
        return view('admin.shop.boosts.index', compact('boosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.boosts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Boost::query()->create([
            'name' => $request->get('name'),
            'amount' => $request->get('amount'),
            'duration' => $request->get('duration'),
            'coin' => $request->get('coin'),
        ]);
        return redirect()->route('boosts.index');
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
        $boost = Boost::query()->findOrFail($id);
        return view('admin.shop.boosts.edit', compact('boost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $boost = Boost::query()->findOrFail($id);
        $boost->update([
            'name' => $request->get('name'),
            'amount' => $request->get('amount'),
            'duration' => $request->get('duration'),
            'coin' => $request->get('coin'),
        ]);
        return redirect()->route('boosts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boost = Boost::query()->findOrFail($id);
        $boost->delete();
        return redirect()->back();
    }
}
