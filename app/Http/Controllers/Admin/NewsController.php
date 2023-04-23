<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $news = News::all();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        // try {
        $news = new News();
        $news->admin_id = $request->admin_id;
        $news->title = $request->title;
        $news->date = $request->date;
        $news->description = $request->description;
        $news->filepath;
        // $news->photo = $request->photo;


        $save = $news->save();
        if ($save) {
            session()->flash('success', 'تمت الاضافة بنجاح');
        }
        return redirect(route('admin.news.index'));
        // } catch (\Exception $ex) {

        //     return redirect()->route('admin.news.index')->with(['error' => 'حدث خطأ ما']);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $news = News::find($id);
            if (!$news) {
                return redirect()->route('admin.news.index', $id)->with(['error' => ' هذه المقالة غير موجودة']);
            }
            $news->photo = '';
            $news->title = $request->title;
            $news->description = $request->description;
            $news->date = date('Y-m-d');
            $news->status = $request->status;

            $save = $news->save();
            if ($save) {
                session()->flash('success', 'تم التعديل بنجاح');
            }
            return redirect(route('admin.news.index'));
        } catch (\Exception $ex) {

            return redirect()->route('admin.news.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // echo("hiiii");
        return 'this is deleted id=' . $id;
        dd($id);
        try {
            $news = News::find($id);

            if (!$news) {
                return redirect()->route('admin.news.index', $id)->with(['error' => ' هذه المقالة غير موجودة']);
            }

            $news->delete();

            session()->flash('success', 'تم حذف بنجاح');

            return redirect(route('admin.news.index'));
        } catch (\Exception $ex) {

            return redirect()->route('admin.news.index')->with(['error' => 'حدث خطأ ما']);
        }
    }
}
