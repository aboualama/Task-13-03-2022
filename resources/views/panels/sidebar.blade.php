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
          <li class="{{ Route::currentRouteName() === "user-view"  ? 'active' : 'disabled' }}">
            <a href="/user/view" class="d-flex align-items-center" target="_self"> 
              <i data-feather="{{ Route::currentRouteName() === "user-view"  ? 'eye' : 'eye-off' }}"></i>  
              <span class="menu-item text-truncate">عرض بيانات مستخدم</span>
            </a> 
          </li> 
          <li class="{{ Route::currentRouteName() === "user-edit"  ? 'active' : 'disabled' }}">
            <a href="/user/edit" class="d-flex align-items-center" target="_self"> 
              <i data-feather="{{ Route::currentRouteName() === "user-edit"  ? 'eye' : 'eye-off' }}"></i>  
              <span class="menu-item text-truncate">تعديل بيانات مستخدم</span>
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
     
 
 
      
      
 

    </ul>












 
 
    {{-- to show all menu --}}

     @php
    $show = "1"; 
    @endphp 
    
     <ul class="navigation navigation-main" id="main-menu-navigation2" data-menu="menu-navigation" style="display: {{$show === "1" ? 'none' : '' }}" > 
          
           @if(isset($menuData[0]))
          @foreach($menuData[0]->menu as $menu)
          @if(isset($menu->navheader))
          <li class="navigation-header">
            <span>{{ __('locale.'.$menu->navheader) }}</span>
            <i data-feather="more-horizontal"></i>
          </li>
          @else 
           
           @php
          $custom_classes = "";
          if(isset($menu->classlist)) {
          $custom_classes = $menu->classlist;
          }
          @endphp 
           <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }} {{ $custom_classes }}">
            <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{isset($menu->newTab) ? '_blank':'_self'}}">
              <i data-feather="{{ $menu->icon }}"></i>
              <span class="menu-title text-truncate">{{ __('locale.'.$menu->name) }}</span>
              @if (isset($menu->badge))
              @php $badgeClasses = "badge badge-pill badge-light-primary ml-auto mr-1" @endphp 
              @endif
            </a>
            @if(isset($menu->submenu))
            @include('panels/submenu', ['menu' => $menu->submenu])
            @endif
          </li>
          @endif
          @endforeach
          @endif 
       
     
        </ul>









    



  </div>
</div>
<!-- END: Main Menu-->

