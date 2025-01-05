<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <a href="{{ admin_url('/') }}" class="brand-link">
      <img src="{{ asset('uploads/settings/'. settings()->logo) }}" alt="{{ settings()->site_name }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text fw-bold">{{ settings()->site_name }}</span>
      <!-- font-weight-light -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ admin_url('/') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('admin.dashboard')}}
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          {{-- product --}}
          
          {{ config('is_ecommerce') }}

          @if(config('is_ecommerce')) 

          <li class="nav-item {{ request()->is('admin/product*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                {{__('admin.products')}}
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('product') }}" class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.list_products')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{admin_url('product/create')}}" class="nav-link {{ request()->is('admin/product/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.add_product')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('import_product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('import_product')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('print_barcode') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.print_barcode/label')}}</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          {{-- end product --}}
          {{-- Books --}}
          <li class="nav-item {{ request()->is('admin/group_book*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/group_book*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                {{__('admin.books')}}
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('group_book/books') }}" class="nav-link {{ request()->is('admin/group_book/books') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.book_lists')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{admin_url('group_book/books/create')}}" class="nav-link {{ request()->is('admin/group_book/books/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.add_book')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('group_book/import') }}" class="nav-link {{ request()->is('admin/group_book/import') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.import_books')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('group_book/print_barcodes') }}" class="nav-link {{ request()->is('admin/group_book/print_barcodes') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.print_barcode/label')}}</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- end Books --}}
          {{-- book borrowing--}}
          <li class="nav-item {{ request()->is('admin/borrowers*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/borrowers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                {{__('admin.book_borrowing')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('borrowers') }}" class="nav-link {{ request()->is('admin/borrowers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.book_borrowing_list')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{admin_url('borrowers/create')}}" class="nav-link {{ request()->is('admin/borrowers/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('admin.add_book_borrowing') }}</p>
                </a>
              </li>
            </ul>
          </li>
          {{--end book borrowing--}}

        {{-- attendent --}}
        <li class="nav-item {{ request()->is('admin/attendances*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('admin/attendances*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              {{__('admin.attendences')}}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ admin_url('attendances') }}" class="nav-link {{ request()->is('admin/attendances') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('admin.attendance_list')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{admin_url('books/create')}}" class="nav-link {{ request()->is('admin/attendances/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('admin.add_attendance')}}</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- end attendent--}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>POS Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add POS Sale</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Purchase
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Exspenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Exspense</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item {{ request()->is('admin/peoples*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                {{__('admin.peoples')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('peoples/users') }}" class="nav-link {{ request()->is('admin/peoples/users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.user_lists')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('peoples/users/create') }}" class="nav-link {{ request()->is('admin/peoples/users/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.add_user')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('peoples/students') }}" class="nav-link {{ request()->is('admin/peoples/students') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.student_lists')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('peoples/students/create') }}" class="nav-link {{ request()->is('admin/peoples/students/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.add_student')}}</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ admin_url('peoples/borrows') }}" class="nav-link {{ request()->is('admin/borrows') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.borrower_lists')}}</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{ admin_url('peoples/borrows/create') }}" class="nav-link {{ request()->is('admin/borrows/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.add_borrower')}}</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/settings*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                {{__('admin.settings')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>{{__('admin.system_settings')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('settings/categories') }}" class="nav-link {{ request()->is('admin/settings/categories') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.categories')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('settings/category_langauges') }}" class="nav-link {{ request()->is('admin/settings/category_langauges') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.category_languages')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('settings/provinces')}}" class="nav-link {{ request()->is('admin/settings/provinces') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.add_biller')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/reports*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                {{__('admin.report')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('reports/books') }}" class="nav-link {{ request()->is('admin/reports/books') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.books_report')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('reports/users'); }}" class="nav-link {{ request()->is('admin/reports/users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.user_report')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('reports/borrowers') }}" class="nav-link {{ request()->is('admin/reports/borrowers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.borrower_report')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{  admin_url('reports/categories') }}" class="nav-link {{ request()->is('admin/reports/categories') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.category_report')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ admin_url('reports/category_languages') }}" class="nav-link {{ request()->is('admin/reports/category_languages') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.category_lang_report')}}</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <!-- front-end settings -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                {{__('admin.front_end_settings')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ admin_url('shop_settings') }}" class="nav-link {{ request()->is('admin/shop_settings') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.shop_settings')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.sliders')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('admin.banners')}}</p>
                </a>
              </li>
            </ul>
          </li>
           <!-- end front-end settings -->
          <!-- <li class="nav-header"></li> -->
          {{-- <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link btn btn-danger text-white btn-sm">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </button>
          </form>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>