<?php

namespace App\Http\Controllers\Dashboard; 
 
use App\Mail\PasswordMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Validator; 
use App\Models\User; 

class UserController extends Controller
{
 
 
  public function user_list()
  {
    $pageConfigs = ['pageHeader' => false];
    return view('/app/user/app-user-list', ['pageConfigs' => $pageConfigs]);
  } 
 
  public function user_edit($id)
  { 
    $record = User::find($id);
    $pageConfigs = ['pageHeader' => false];
    return view('/app/user/user-edit', ['pageConfigs' => $pageConfigs, 'record' => $record]);
  }
 
  public function getusers()
  {
    $data['data'] = User::all(); 
    return $data ;
  }
 
  public function user_store(Request $request)
  {
      $rules = [
        'name' => 'required|string|min:3|max:260',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|unique:users', 
      ];   
      $validator = Validator::make($request->all(), $rules); 
      if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors(), 'status' => 442]);
      }
 
      $pas = Str::random(8); 
      $record = User::create([
            'name'              => $request->get('name'),
            'email'             => $request->get('email'),
            'phone'             => $request->get('phone'),
            'status'            => 'غير مفعل',
            'password'          => bcrypt($pas),
            'email_verified_at' => now(),
        ]);   

      Mail::to('your_receiver_email@gmail.com')->send(new PasswordMail($pas));
  }
  

 
  public function user_update(Request $request, $id)
  {   
      $user = User::find($id);
      if (!$user) {
          return back('501')->with('error', 'هذا الحساب غير موجود');
      } 

      $rules = [
        'name' => 'required|string|min:3|max:260',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'phone' => 'required|string|unique:users,phone,'.$user->id, 
        'password' => 'nullable|confirmed|min:6',
      ];   
      $validator = Validator::make($request->all(), $rules); 
      if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors(), 'status' => 442]);
      }
      $data = [
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password ? bcrypt($request->password): $user->password,
          'phone' => $request->phone,
          'status' => $request->status,
      ];

      $updated = $user->update($data);

      if ($updated) {
          return back()->with('success','تم التعديل بنجاح');
      } else {
          return response(['message' => 'خطأ في الإنشاء'], 501);
      }
  }
  



  public function user_delete($id)
  {
      $record = User::find($id);  
      $record->delete();
  } 


}
