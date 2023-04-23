<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    return $request;
        try {

            $users = new User();
            // $users->admin_id = $request->admin_id;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;

            $save = $users->save();
            if ($save) {
                session()->flash('success', 'تمت الاضافة بنجاح');
            }
            return redirect(route('admin.user.index'));
        } catch (\Exception $ex) {

            return redirect()->route('admin.user.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $supadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $user = User::find($id);
            if (!$user) {
                return redirect()->route('admin.user.index', $id)->with(['error' => ' هذه المقالة غير موجودة']);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $save = $user->save();
            if ($save) {
                session()->flash('success', 'تم التعديل بنجاح');
            }
            return redirect(route('admin.user.index'));
        } catch (\Exception $ex) {

            return redirect()->route('admin.user.index')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $supadmin)
    {
        //
    }
}
