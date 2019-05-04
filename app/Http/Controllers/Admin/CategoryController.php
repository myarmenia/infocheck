<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Lang;
use App\PostLayout;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang_id = Lang::getLangId(app()->getLocale());
        $categories = Category::where('lang_id', $lang_id)->get();
        $sorted = $categories->sortBy('position');
        return view('admin.category.index')->with([
            'page_name'=>'categories',
            'categories'=>$categories,
            'sorted' =>$sorted,
            'langs' => Lang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // this is Form Creation - get

        $max_item_id = Category::max('item_id');
        $max_position = Category::max('position');
        // return $max_position;

        return view('admin.category.create',[
            'page_name'=>'categories',
            'langs' => Lang::all(),
            'new_item_id' => $max_item_id + 1,
            'new_position' => $max_position + 1,
            'postlayouts' => PostLayout::all(),


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale) {
        // Store the new - POST Request
        $data = $request->all();
        $names = $data['names'];

        $position = $data['position'];
        $layout = $data['layout'];
        $item_id = $data['item_id'];
        // $status = $data['status'];

        for ($i=0; $i < count($names); $i++) {
            if (Category::where('name', $names[$i]['name'])->first()) {
                return response()->json(['data_type'=> gettype($data), 'warning'=>$data]);
            }
            if ($names[$i]['name']) {
                $category = new Category();
                $category->item_id = $item_id;
                $category->name = $names[$i]['name'];
                $category->position = $position;
                $category->layout = $layout;
                $category->status = $names[$i]['status'];
                $category->lang_id = $names[$i]['lang_id'];
                $category->save();
            }

        }


        return response()->json(['data_type'=> gettype($data), 'data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // sa Petq chi ....
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$locale, $id) {
        // return response()->json(['success'=>'Product saved successfully.', 'id'=>$id]);

        $category = Category::find($id);
        $language = $category->lang()->get()->toArray();
        // dd($language[0]['lng_name']);


        return view('admin.category.edit',[
            'page_name'=>'categories',
            'category' => $category,
            'langs' => Lang::all(),
            'lng_name' => $language[0]['lng_name'],
            'postlayouts' => PostLayout::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id) {
        //$request-> name, status are individual
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        // $request->layout is for item-group
        Category::where('item_id', $category->item_id)->update(['layout'=>$request->layout]);
        return redirect()->back()->with('success', 'Category N ' . $id. ' was succesfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id) {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category N ' . $id. ' was not found');
        }
        else{
            $category->delete();
            return redirect()->back()->with('success', 'Category N ' . $id. ' was succesfuly deleted');
        }
    }

    public function positionUpdate(Request $request, $locale) {
        // $categories = Category::latest()->paginate(5);
        $data = $request->all();
        $item_positions = $data['item_positions'];
        for ($i=0; $i < count($item_positions); $i++) {
            Category::where('item_id', $item_positions[$i]['item_id'])->update(['position'=>$item_positions[$i]['position']]);
        }

        return response($data);
        // return response()->json(['data_type'=> gettype($data), 'pp'=>$data->pp]);
    }
}
