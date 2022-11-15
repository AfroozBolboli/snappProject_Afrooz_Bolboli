<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class AdminBannerController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin/banner/index')->with('banners', $banners);
    }

    public function create()
    {
        return view('admin/banner/create');
    }

    public function store(Request $request)
    {
        // $request->validated();

        $image_path = time().$request->file('image')->getClientOriginalName();
        // $request->image->move(public_path('images'), $image_path);
        // @ts-ignore
        $uploadImage = Storage::disk('public')->putFileAs('adminBanner/',$request->file('image'), $image_path);

        $banner = Banner::create([
            'title' => $request->input('title'),
            'image_path' => $image_path
        ]);

        return redirect('admin/banner');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin/banner/edit')->with('banner', $banner);
    }

    public function update(AdminBannerRequest $request, $id)
    {
        $request->validated();

        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $banner = Banner::find($id)
            ->update([
                'title' => $request->input('title'),
                'image_path' => $newImageName,
        ]);

        return redirect('admin/banner');
    }


    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('admin/banner');
    }
}
