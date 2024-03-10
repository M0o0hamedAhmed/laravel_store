<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends BaseController
{


    public function __construct(private string $classView = 'dashboard.categories.')
    {
//        $this->middleware(['can:view categories'])->only('index', 'show');
//        $this->middleware(['can:edit categories'])->only('edit', 'update');
//        $this->middleware(['can:create categories'])->only('create', 'store');
//        $this->middleware(['can:delete categories'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::latest()->get();
            return Datatables::of($categories)
                ->addColumn('action', function ($categories) {
                    $buttons = view('components.forms.buttons.icons.edit', ['item' => $categories])->render();
                    $buttons .= view('components.forms.buttons.icons.delete', ['item' => $categories])->render();
                    return $buttons;
                })
                ->editColumn('created_at', function ($categories) {
                    return $categories->created_at->diffForHumans();
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view($this->classView . 'index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->classView . 'parts.edit');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        try {
            $category = Category::query()->create($data);
            Log::info("Create Category: category created successfully with id {$category->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
            $this->sendResponse($category);
        } catch (\Exception $e) {
            Log::error("Create Category : system can not   create category for this error {$e->getMessage()}");
            return $this->sendError($e->getMessage());
        }
        return response()->json(['status' => 200]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view($this->classView . '.parts.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();

        try {
            Category::query()->whereId($id)->update($data);
            Log::info("Update Category: category updated successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Update Category : system can not   updated category for this error {$e->getMessage()}");
            return response()->json(['status' => 405]);

        }


        return response()->json(['status' => 200]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Category::query()->whereId($id)->delete();
            Log::info("Delete Category: category deleted successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Delete Category : system can not   Delete category for this error {$e->getMessage()}");
            abort(500);
        }

        return redirect()->route('categories.index');

    }

    public function delete(Request $request)
    {
        try {
            Category::find($request->id)->delete();
            return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
        } catch (\Exception $ex) {
            return response(['message' => $ex->getMessage(), 'status' => 400]);
        }

    }
}
