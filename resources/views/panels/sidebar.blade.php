@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{($configData['theme'] === 'dark') ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
  <span class="brand-logo"> 
    <img src="{{asset('uploads/image/setting/')}}/{{Helper::settings()->logo}}" style="padding: 5px; margin: 10px auto; display: block; max-width: 60%; border-radius: 10px; max-height: 70px;"> 
  </span>
  <div class="navbar-header"> 
    
   
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand" href="{{url('/')}}">
          <h5 class="brand-text" style="padding-bottom: 7px; font-size: 1.2rem; padding-right: .5rem; padding-left: .5rem;">  {{Helper::settings()->name}}</h5> 
         
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    
      {{-- Add Custom Class with nav-item --}}
      @php
      $custom_classes = "";
      if(isset($menu->classlist)) {
      $custom_classes = $menu->classlist;
      }
      @endphp
  
 

  
      <li class="nav-item {{ Route::currentRouteName() === "dashboard-analytics" ? 'active' : '' }}  {{ $custom_classes }}">
        <a href="/" class="d-flex align-items-center" target="_self">
          <i data-feather="home"></i>
          <span class="menu-title text-truncate">الرئيسية</span> 
        </a> 
      </li>
  

      <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="settings"></i>
          <span class="menu-title text-truncate">الاعدادات</span> 
        </a>  
        <ul class="menu-content"> 
          <li class="nav-item {{ Route::currentRouteName() === "app-settings" ? 'active' : '' }} {{ $custom_classes }}">
            <a href="/settings" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate">الاعدادات   </span> 
            </a> 
          </li>    
        </ul> 
      </li>
  
  

      <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="user"></i>
          <span class="menu-title text-truncate">المستخدمين</span> 
        </a>  
        <ul class="menu-content"> 
          <li class="{{ Route::currentRouteName() === "user-list"  ? 'active' : '' }} " >
          {{-- <li class="{{ Route::currentRouteName() === "user-list"  ? 'active' : '' }} disabled" > --}}
            <a href="/user" class="d-flex align-items-center" target="_self"> 
              <i data-feather="circle"></i> 
              <span class="menu-item text-truncate">قائمة المستخدمين</span>
            </a> 
          </li> 
        </ul> 
      </li> 
     
 


      <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="users"></i>
          <span class="menu-title text-truncate">الاقسام</span> 
        </a>  
        <ul class="menu-content"> 
          <li class="{{ Route::currentRouteName() === "category.index"  ? 'active' : '' }} " > 
            <a href="/category" class="d-flex align-items-center" target="_self"> 
              <i data-feather="circle"></i> 
              <span class="menu-item text-truncate">قائمة الاقسام</span>
            </a> 
          </li>   
        </ul> 
      </li> 
     
      <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="users"></i>
          <span class="menu-title text-truncate">المقالات</span> 
        </a>  
        <ul class="menu-content"> 
          <li class="{{ Route::currentRouteName() === "post.index"  ? 'active' : '' }} " > 
            <a href="/post" class="d-flex align-items-center" target="_self"> 
              <i data-feather="circle"></i> 
              <span class="menu-item text-truncate">قائمة المقالات</span>
            </a> 
          </li> 
          <li class="{{ Route::currentRouteName() === "post.create"  ? 'active' : '' }}">
            <a href="/post/create" class="d-flex align-items-center" target="_self"> 
              <i data-feather="circle"></i>  
              <span class="menu-item text-truncate">أضافة مقال  </span>
            </a> 
          </li>  
        </ul> 
      </li> 
      

    </ul>
 

  </div>
</div>
<!-- END: Main Menu-->

