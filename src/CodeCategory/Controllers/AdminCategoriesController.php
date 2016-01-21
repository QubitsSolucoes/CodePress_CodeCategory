<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

    private $category;
    private $response;

    public function __construct(ResponseFactory $response, Category $category)
    {
        $this->category = $category;
        $this->response = $response;
    }

    public function index()
    {
        $categories = $this->category->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->category->all();
        return view('codecategory::create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->category->create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $categories = $this->category->all();
        return $this->response->view('codecategory::edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        //var_dump($data);die;
        if (!isset($data['active'])) {
            $data['active'] = false;
        } else {
            $data['active'] = true;
        }

        if (!isset($data['parent_id']) || (isset($data['parent_id']) && $data['parent_id'] == '')) {
            $data['parent_id'] = null;
        }

        $category = $this->category->find($id)->update($data);
        var_dump($category);die;
        return redirect()->route('admin.categories.index');
    }

}