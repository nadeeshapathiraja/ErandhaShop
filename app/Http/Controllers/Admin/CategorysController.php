<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Category;
use Illuminate\Http\Request;

class CategorysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $categorys = Category::where('name', 'LIKE', "%$keyword%")
                ->orWhere('item_code', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categorys = Category::latest()->paginate($perPage);
        }

        return view('Admin.categorys.index', compact('categorys'));
    }


    public function create()
    {
        return view('Admin.categorys.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Category::create($requestData);

        return redirect('categorys')->with('flash_message', 'Category added!');
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('Admin.categorys.show', compact('category'));
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('Admin.categorys.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $category = Category::findOrFail($id);
        $category->update($requestData);

        return redirect('categorys')->with('flash_message', 'Category updated!');
    }


    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('categorys')->with('flash_message', 'Category deleted!');
    }
}
