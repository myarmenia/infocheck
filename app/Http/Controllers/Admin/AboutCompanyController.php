<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AboutCompany;
use App\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AboutCompanyController extends Controller
{
    public $folder_name = 'aboutus';

    public function index()
    {
       $abouts = AboutCompany::with('lang')->get();
       $langs = Lang::all();


       return view('admin.about.index', [
           'page_name' => 'about_us',
           'abouts' => $abouts,
           'langs' => $langs,

       ]);
    }


    public function edit($locale, $id)
    {
        $about = AboutCompany::where('id', $id)->with('lang')->first();
        $langs = Lang::all();

        // second cycle, when after uploading files redirect back //
        $images = Storage::files('public/'.$this->folder_name.'/1'); // this are images //
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        return view('admin.about.edit', [
            'page_name' => 'about_us',
            'about' => $about,
            'langs' => $langs,
            'folder_name' => $this->folder_name,
            'imageurls' =>$imageurls,

        ]);
    }

    public function update(Request $request, $locale, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'id' => 'required|integer',
            'html_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = AboutCompany::find($data['id']);
        $about->html_code = $data['html_code'];
        $about->save();

        return redirect()->back()->with('success', 'About Us in locale-'.$locale.' was successfully updated.');

    }
}

