<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function CategoryList()
    {
        $data['category_data'] = Category::all();

        return view('admin.Category.Category_list', $data);
    }

    public function CategoryAddEdit($slug)
    {
        if ($slug == 'add') {
            $data['category_data'] = '';
        } else {
            $data['category_data'] = Category::find($slug);
        }

        return view('admin.Category.Category_store', $data);
    }

    public function CategoryStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title' => 'required',
        ]);

        if ($id == 'add') {

            $data = new Category();
            $data->title = $request->title;
            $data->save();

            return redirect()->route('category-list')
                ->with('success', 'Category Added Successfully');

        } else {

            $data = Category::find($id);
            $data->title = $request->title;
            $data->save();

            return redirect()->route('category-list')
                ->with('success', 'Category Updated Successfully');
        }
    }

    public function CategoryDelete($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('category-list')
            ->with('success', 'Category Deleted Successfully');
    }
}
