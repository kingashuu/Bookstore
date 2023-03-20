 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('/assets/public/images/favicon.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">LBS </span>

     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="img-circle elevation-2" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                        alt="{{ Auth::user()->name }}" />
                @else
                    {{ Auth::user()->name }}

                    <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                @endif

             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>
         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href=" {{ route('admin.dashboard') }}"
                         class="nav-link  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             {{ __('Dashboard') }}
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href=" {{ route('admin.books') }}"
                         class="nav-link  {{ Route::currentRouteName() == 'admin.books' ? 'active' : '' }}">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             {{ __('Books') }}
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href=" {{ route('admin.category') }}"
                         class="nav-link {{ Route::currentRouteName() == 'admin.category' ? 'active' : '' }}">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             {{ __('Categories') }}
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href=" {{ route('admin.users') }}"
                         class="nav-link {{ Route::currentRouteName() == 'admin.users' ? 'active' : '' }}">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             {{ __('Users') }}
                         </p>
                     </a>
                 </li>



                 <li class="nav-item">
                     <a href=" {{ route('admin.slider') }}"
                         class="nav-link  {{ Route::currentRouteName() == 'admin.slider' ? 'active' : '' }}">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             {{ __('Sliders') }}
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-envelope"></i>
                         <p>
                             Mailbox
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href=" {{ route('admin.inbox') }}"
                                 class="nav-link  {{ Route::currentRouteName() == 'admin.inbox' ? 'active' : '' }}">
                                 <i class="fa fa-inbox nav-icon"></i>
                                 <p>
                                     {{ __('Inbox') }}
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href=" {{ route('admin.compose') }}"
                                 class="nav-link  {{ Route::currentRouteName() == 'admin.compose' ? 'active' : '' }}">
                                 <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                 <p>
                                     {{ __('Compose') }}
                                 </p>
                             </a>
                         </li>
                     </ul>
                 </li>


             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
