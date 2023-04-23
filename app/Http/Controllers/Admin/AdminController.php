<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();

        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    return $request;
        try {

            $admins = new Admin();
            $admins->admin_id = $request->admin_id;
            $admins->name = $request->name;
            $admins->email = $request->email;
            $admins->password = $request->password;

            $save = $admins->save();
            if ($save) {
                session()->flash('success', 'تمت الاضافة بنجاح');
            }
            return redirect(route('admin.supadmin.index'));
        } catch (\Exception $ex) {

            return redirect()->route('admin.supadmin.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admins = Admin::find($id);
        return view('admin.admin.edit', compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $admins = Admin::find($id);
            if (!$admins) {
                return redirect()->route('admin.admin.index', $id)->with(['error' => ' هذه المقالة غير موجودة']);
            }
            $admins->admin_id = $request->admin_id;
            $admins->name = $request->name;
            $admins->email = $request->email;
            $admins->password = $request->password;

            $save = $admins->save();
            if ($save) {
                session()->flash('success', 'تم التعديل بنجاح');
            }
            return redirect(route('admin.admin.index'));
        } catch (\Exception $ex) {

            return redirect()->route('admin.admin.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $supadmin)
    {
        //
    }
}
