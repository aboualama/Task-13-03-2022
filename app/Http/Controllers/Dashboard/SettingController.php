<?php

namespace App\Http\Controllers\Dashboard; 

use App\Models\Year;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $record = Setting::first();
        $pageConfigs = ['pageHeader' => false];
        return view('/app/settings/app_settings', ['pageConfigs' => $pageConfigs, 'record' => $record]);
    } 
  
   
    public function update(Request $request, Setting $setting)
    { 
        $record = Setting::first(); 
        $record->update($request->all());
        if (request()->hasFile('logo'))
        {
            $image =  $request->file('logo');
            $public_path = 'uploads/image/setting';
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($public_path , $image_name);
        }else
        {
            $image_name = $record->logo;
        }
     
        $record['logo'] = $image_name; 
        $record->save();
    }

 
}
 