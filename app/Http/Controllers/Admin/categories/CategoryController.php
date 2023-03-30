<?php

namespace App\Http\Controllers\Admin\categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController  extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin/category/index', compact('category'));
    }

    public function create()
    {
        return view('admin/category/create');
    }
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category;
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        $uploadpath = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $uploadpath . $filename;
        }
        $category->mate_title = $data['mate_title'];
        $category->mate_description = $data['mate_description'];
        $category->mate_keyword = $data['mate_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with('message', 'Category Add Successfully');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin/category/edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();
        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        if ($request->hasFile('image')) {
            // update image
            $uploadpath = 'uploads/category/';
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $uploadpath . $filename;
        }
        $category->mate_title = $data['mate_title'];
        $category->mate_description = $data['mate_description'];
        $category->mate_keyword = $data['mate_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }

    public function destroy($category_id)
    {
        $category = category::find($category_id);
        if ($category) {
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            // $category->post()->delete();
            $category->delete();
            return redirect('admin/category')->with('message', 'Category Deleted With its posts Successfuly');
        } else {
            return redirect('admin/category')->with('message', 'No Category id found');
        }
    }
}
