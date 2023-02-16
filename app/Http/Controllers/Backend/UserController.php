<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $users = User::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.user.index', compact('users'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.user.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreUserRequest $request)
   {
      $user = new User([
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'phone' => $request->get('phone'),
         'password' => Hash::make($request->password),
         'role' => $request->get('role'),
      ]);

      $user->save();
      $message = "کاربر جدید اضافه شد";
      return redirect()->route('user.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(User  $user)
   {
      return view('admin.pages.user.edit', compact('user'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateUserRequest $request, User  $user)
   {
      $user->update($request->all());
      $message = "مشخصات کاربر به روز شد";
      return redirect()->route('user.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(User  $user)
   {
      $user->delete();
      $message = "کاربر حذف شد";
      return redirect()->route('user.index')->with('success', $message);
   }
}
