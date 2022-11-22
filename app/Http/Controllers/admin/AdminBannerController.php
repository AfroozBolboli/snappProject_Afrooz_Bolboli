<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminBannerController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index')->with('banners', $banners);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(AdminBannerRequest $request)
    {

        $image_path = time() . $request->file('image')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('adminBanner/', $request->file('image'), $image_path);

        $banner = Banner::create([
            'title' => $request->input('title'),
            'image_path' => $image_path
        ]);

        return redirect('admin/banner');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit')->with('banner', $banner);
    }

    public function update(AdminBannerRequest $request, $id)
    {
        $request->validated();

        $image_path = time() . $request->file('image')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('adminBanner/', $request->file('image'), $image_path);
        Storage::disk('public')->delete('adminBanner/' . Banner::find($id)->image_path);

        $banner = Banner::find($id)
            ->update([
                'title' => $request->input('title'),
                'image_path' => $image_path,
            ]);

        return redirect('admin/banner');
    }


    public function destroy($id)
    {
        $banner = Banner::find($id);
        Storage::disk('public')->delete('adminBanner/' . $banner->image_path);
        $banner->delete();
        return redirect('admin/banner');
    }
}
