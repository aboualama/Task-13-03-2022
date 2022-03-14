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
          <i data-feather="menu"></i>
          <span class="menu-title text-truncate">البيانات الاساسية</span> 
        </a>  
        <ul class="menu-content">  
          <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
            <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate">بيانات شخصية</span> 
            </a>  
            <ul class="menu-content"> 
              <li class="{{ Route::currentRouteName() === "gender.index"  ? 'active' : '' }} " > 
                <a href="/gender" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">النوع</span>
                </a> 
              </li>  
              <li class="{{ Route::currentRouteName() === "healthStatus.index"  ? 'active' : '' }} " > 
                <a href="/healthStatus" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">الحالة الصحية</span>
                </a> 
              </li> 
              <li class="{{ Route::currentRouteName() === "socialStatus.index"  ? 'active' : '' }} " > 
                <a href="/socialStatus" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">الحالة الاجتماعية </span>
                </a> 
              </li>  
              <li class="{{ Route::currentRouteName() === "militaryTreatment.index"  ? 'active' : '' }} " > 
                <a href="/militaryTreatment" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">المعاملة العسكرية </span>
                </a> 
              </li> 
              <li class="{{ Route::currentRouteName() === "qualification.index"  ? 'active' : '' }} " > 
                <a href="/qualification" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">   المؤهل الدراسي </span>
                </a> 
              </li>   
            </ul> 
          </li>       
          
          <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
            <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate"> بيانات وظيفية</span> 
            </a>  
            <ul class="menu-content"> 
              <li class="{{ Route::currentRouteName() === "functionalGroup.index"  ? 'active' : '' }} " > 
                <a href="/functionalGroup" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate"> المجموعات الوظيفية </span>
                </a> 
              </li>
              <li class="{{ Route::currentRouteName() === "subGroup.index"  ? 'active' : '' }} " > 
                <a href="/subGroup" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">   المجموعات النوعية  </span>
                </a> 
              </li>  
              <li class="{{ Route::currentRouteName() === "cader.index"  ? 'active' : '' }} " > 
                <a href="/cader" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">الكادر</span>
                </a> 
              </li>   
              <li class="{{ Route::currentRouteName() === "financialDegree.index"  ? 'active' : '' }} " > 
                <a href="/financialDegree" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate"> الدرجات الوظيفية </span>
                </a> 
              </li> 
              <li class="{{ Route::currentRouteName() === "jobStatus.index"  ? 'active' : '' }} " > 
                <a href="/jobStatus" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">الحالة الوظيفية</span>
                </a> 
              </li> 
              <li class="{{ Route::currentRouteName() === "nominationType.index"  ? 'active' : '' }} " > 
                <a href="/nominationType" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">    نوع التعيين </span>
                </a> 
              </li>  
              <li class="{{ Route::currentRouteName() === "jobStyle.index"  ? 'active' : '' }} " > 
                <a href="/jobStyle" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">   اسلوب شغل الوظيفة </span>
                </a> 
              </li>   
              <li class="{{ Route::currentRouteName() === "teacherDegree.index"  ? 'active' : '' }} " > 
                <a href="/teacherDegree" class="d-flex align-items-center" target="_self"> 
                  
                  <span class="menu-item text-truncate">   درجات اعضاء هيئة التدريس </span>
                </a> 
              </li>   
            </ul> 
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
          <span class="menu-title text-truncate">الموظفين</span> 
        </a>  
        <ul class="menu-content"> 
          <li class="{{ Route::currentRouteName() === "employee.index"  ? 'active' : '' }} " >
          {{-- <li class="{{ Route::currentRouteName() === "employee.index"  ? 'active' : '' }} disabled" > --}}
            <a href="/employee" class="d-flex align-items-center" target="_self"> 
              <i data-feather="circle"></i> 
              <span class="menu-item text-truncate">قائمة الموظفين</span>
            </a> 
          </li> 
          <li class="{{ Route::currentRouteName() === "employee.show"  ? 'active' : 'disabled' }}">
            <a href="/employee/view" class="d-flex align-items-center" target="_self"> 
              <i data-feather="{{ Route::currentRouteName() === "employees.show"  ? 'eye' : 'eye-off' }}"></i>  
              <span class="menu-item text-truncate">عرض بيانات موظف</span>
            </a> 
          </li>  
        </ul> 
      </li> 
     
 
 
      
      

      <li class="nav-item {{ Route::currentRouteName() === ''  ? 'active' : '' }} {{ $custom_classes }}">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="printer"></i>
          <span class="menu-title text-truncate">المطبوعات</span> 
        </a>  
        <ul class="menu-content"> 
          <li class="nav-item {{ Route::currentRouteName() === "app-reports" ? 'active' : '' }} {{ $custom_classes }}">
            <a href="/reports" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate">المطبوعات   </span> 
            </a> 
          </li>    
        </ul> 
      </li>













       


    </ul>












 
 
    {{-- to show all menu --}}

     @php
    $show = "3"; 
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

