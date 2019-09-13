<?php

namespace App\Http\Controllers\Admin;

use App\Skin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skins = Skin::query()->get();
        return view('admin.shop.skins.index', compact('skins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.skins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Skin::query()->create([
            'skin' => $request->get('skin'),
            'coin' => $request->get('coin')
        ]);
        return redirect()->route('skins.index');

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
        $skin = Skin::query()->findOrFail($id);
        return view('admin.shop.skins.edit', compact('skin'));
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
        $skin = Skin::query()->findOrFail($id);
        $skin->update([
            'skin' => $request->get('skin'),
            'coin' => $request->get('coin')
        ]);
        return redirect()->route('skins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skin = Skin::query()->findOrFail($id);
        $skin->delete();
        return redirect()->back();
    }
}
