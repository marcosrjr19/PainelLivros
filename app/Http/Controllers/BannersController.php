<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Banner;
use App\Http\Requests\BannersStoreRequest;
use Intervention\Image\ImageManagerStatic as Image;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banners.home')->with('banners' , Banner::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannersStoreRequest $request)
    {
        $request->validated();
        
        if ($request->hasFile('banners')) {

            foreach ($request->file('banners') as $banner) {
                $image = $banner;
                $name = uniqid('img_');
                $folder_resized = public_path('/uploads/images/banners/resized/');
                $filePath_resized = $folder_resized . $name. '.' . $image->getClientOriginalExtension();
                $image_src_resized = 'uploads/images/banners/resized/'.$name. '.' . $image->getClientOriginalExtension();

                $folder_banner = public_path('/uploads/images/banners/');
                $filePath_banner = $folder_banner . $name. '.' . $image->getClientOriginalExtension();
                $image_src_banner = 'uploads/images/banners/'.$name. '.' . $image->getClientOriginalExtension();

                $image_banner = $image_resized = Image::make($image->getRealPath());

                $image_banner->resize(825,320);
                $image_banner->save($filePath_banner);

                $image_resized->resize(450, 300);
                $image_resized->save($filePath_resized);
                
                

                Banner::create(
                    ['image_src' => $image_src_banner,
                    'image_src_resized' => $image_src_resized]);
            }

           
        }

        return redirect()->back()->with('message', 'Banners Incluidos com sucesso');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->delete();

        return redirect()->back()->with('message', 'Banner removido com sucesso');
    }
}
