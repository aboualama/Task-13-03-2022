<?php

namespace App\Http\Controllers\Dashboard; 

use App\Http\Controllers\Controller;
 

class DashboardController extends Controller
{
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {
    $pageConfigs = ['pageHeader' => false]; 
    return view('/app/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  } 
}
