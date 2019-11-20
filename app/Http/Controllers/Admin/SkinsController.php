<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SkinRequest;
use App\Skin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SkinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skins = Skin::type(get_type())->get();
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
     * @param SkinRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkinRequest $request)
    {

        $data = $request->except(['_token']);
        /** @var UploadedFile $image */
        if ($image = $request->file('image')) {
            $fileName = md5(microtime()) . '.' . $image->extension();
            $image->storeAs('skins', $fileName);
            $data['image'] = $fileName;
        }
        ;
        Skin::create($data);
        return redirect(_route('skins.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skin = Skin::findOrFail($id);
        return view('admin.shop.skins.edit', compact('skin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SkinRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkinRequest $request, $id)
    {
        $skin = Skin::findOrFail($id);
        $skin->update($request->except(['_token']));

        return redirect(_route('skins.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skin = Skin::query()->findOrFail($id);
        $skin->delete();
        return redirect()->back();
    }
}
