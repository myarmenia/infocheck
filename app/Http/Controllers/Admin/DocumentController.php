<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DocumentController extends Controller
{
    public function uploadimage(Request $request, $locale) {
        $folder_name = $request->input('folder_name');
        // return $folder_name;
        $images = $_FILES['images'];
        $post_id = $request->input('unique_id');
        $total = count($_FILES['images']['name']);
        $validImage = ['image/jpg','image/png','image/jpeg','image/pjpeg','image/bmp', 'image/gif', 'image/svg+xml'];
        $imgDebug = [];
        $errors = [];
        for($i = 0; $i < $total; $i++) {
            if($_FILES['images']['tmp_name'][$i] != "") {
                if(in_array($_FILES['images']['type'][$i], $validImage)  ) {
                    $imgDebug['success'][$i]['url'] =  $_FILES['images']['tmp_name'][$i];
                    $imgDebug['success'][$i]['name'] = $_FILES['images']['name'][$i];
                    $path = Storage::disk('public')->putFileAs($folder_name.'/'.$post_id, new File($_FILES['images']['tmp_name'][$i]), $_FILES['images']['name'][$i]);
                    $path2 = Storage::disk('upload')->putFileAs($folder_name.'/'.$post_id, new File($_FILES['images']['tmp_name'][$i]), $_FILES['images']['name'][$i]);
                    $imgDebug['success'][$i]['path'] = Storage::url($path);
                    $imgDebug['success'][$i]['size'] = $_FILES['images']['size'][$i];
                }
                else{
                    $imgDebug['errors'][$i]['message'] =  $_FILES['images']['name'][$i] . ' has not proper type! -> '.$_FILES['images']['type'][$i];
                }
            }
        }

        // return $imgDebug;
        return redirect()->back()->with('imgDebug' , $imgDebug);
    }
}
