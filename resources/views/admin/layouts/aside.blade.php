<!-- Left side column. contains the logo and sidebar -->
<aside dir="rtl" class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        @can('excel')
        <ul class="sidebar-menu ">
          <li class="header"></li>
          <li class="treeview ">
              <a href="{{ url('/admin/importExportView') }}">
                <i class="fas fa-file-excel"></i>
                <span style="margin: 10px">ادخال اكسيل شيت</span>
              </a>
          </li>
      </ul>
       @endcan

       @can('deafs')
        <ul class="sidebar-menu ">
          <li class="header"></li>
          <li class="treeview ">
              <a href="{{ url('/admin/deafs') }}">
                <i class="fas fa-deaf"></i>
                <span style="margin: 10px">ذوي الاعاقة السمعية</span>
              </a>
          </li>
      </ul>
      @endcan

        @can('admins')
        <ul class="sidebar-menu ">
          <li class="header"></li>
          <li class="treeview ">
              <a href="#">
                <i class="fas fa-user-shield"></i>
                <span style="margin: 10px">المشرفين</span>
              </a>
              <ul class="treeview-menu ">
                  <li><a href="{{ url('/admin/admins') }}"><i class="fa fa-circle-o"></i>
                    عرض المشرفين
                    </a></li>
                  <li><a href="{{ url('/admin/admins/create') }}"><i class="fa fa-circle-o"></i>
                   اضافة مشرف
                  </a></li>
              </ul>
          </li>
      </ul>
      @endcan

        @can('roles')
        <ul class="sidebar-menu ">
          <li class="header"></li>
          <li class="treeview ">
              <a href="#">
                <i class="fas fa-lock"></i>
                <span style="margin: 10px">الصلاحيات</span>
              </a>
              <ul class="treeview-menu ">
                  <li><a href="{{ url('/admin/roles') }}"><i class="fa fa-circle-o"></i>
                    عرض الصلاحيات
                    </a></li>
                  <li><a href="{{ url('/admin/roles/create') }}"><i class="fa fa-circle-o"></i>
                   اضافة صلاحية
                  </a></li>
              </ul>
          </li>
      </ul>
      @endcan

      @can('employees')
        <ul class="sidebar-menu ">
          <li class="header"></li>
          <li class="treeview ">
              <a href="#">
                <i class="fas fa-users"></i>
                  <span style="margin: 10px">الموظفين</span>
              </a>
              <ul class="treeview-menu ">
                  <li><a href="{{ url('/admin/employees') }}"><i class="fa fa-circle-o"></i>
                    عرض الموظفين
                    </a></li>
                  <li><a href="{{ url('/admin/employees/create') }}"><i class="fa fa-circle-o"></i>
                   اضافة موظف
                  </a></li>
              </ul>
          </li>
      </ul>
      @endcan

      @can('foundations')
      <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="{{ url('/admin/foundations') }}">
                <i class="fas fa-building"></i>
                 <span style="margin: 10px">المؤسسة</span>
            </a>
        </li>
    </ul>
    @endcan

    @can('abouts')
      <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="{{ url('/admin/abouts') }}">
                <i class="fas fa-project-diagram"></i>
                <span style="margin: 10px">عن المشروع</span>
            </a>
        </li>
    </ul>
    @endcan

    @can('branches')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="fas fa-code-branch"></i>
                <span style="margin: 10px">الفروع</span>
            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/branches') }}"><i class="fa fa-circle-o"></i>
                  عرض الفروع
                  </a></li>
                <li><a href="{{ url('/admin/branches/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة فرع
                </a></li>
            </ul>
        </li>
    </ul>
    @endcan

    @can('services')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="fab fa-stack-exchange"></i>
                <span style="margin: 10px">الخدمات</span>

            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/services') }}"><i class="fa fa-circle-o"></i>
                  عرض الخدمات
                  </a></li>
                <li><a href="{{ url('/admin/services/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة خدمة
                </a></li>
            </ul>
        </li>
    </ul>
    @endcan

    @can('documents')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="far fa-folder"></i>
                <span style="margin: 10px">المستندات</span>

            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/documents') }}"><i class="fa fa-circle-o"></i>
                  عرض المستندات
                  </a></li>
                <li><a href="{{ url('/admin/documents/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة مستند
                </a></li>
            </ul>
        </li>
    </ul>
    @endcan

    @can('faqs')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="fas fa-question-circle"></i>
                <span style="margin: 10px">الاسئلة الشائعة</span>
            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/faqs') }}"><i class="fa fa-circle-o"></i>
                  عرض الاسئلة الشائعة
                  </a></li>
                <li><a href="{{ url('/admin/faqs/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة سؤال شائع
                </a></li>
            </ul>
        </li>
    </ul>
    @endcan

    @can('procedures')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="far fa-hand-paper"></i>
                <span style="margin: 10px">الاجراءات</span>
            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/procedures') }}"><i class="fa fa-circle-o"></i>
                  عرض الاجراءات
                  </a></li>
                <li><a href="{{ url('/admin/procedures/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة اجراء
                </a></li>
            </ul>
        </li>
    </ul>
    @endcan

    @can('regulations')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="fas fa-calendar-check"></i>
                <span style="margin: 10px">الشروط والاحكام</span>
            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/regulations') }}"><i class="fa fa-circle-o"></i>
                  عرض الشروط والاحكام
                  </a></li>
                <li><a href="{{ url('/admin/regulations/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة شروط واحكام
                </a></li>
            </ul>
        </li>
    </ul>
     @endcan

    @can('dictionaries')
    <ul class="sidebar-menu ">
        <li class="header"></li>
        <li class="treeview ">
            <a href="#">
                <i class="fas fa-book"></i>
                <span style="margin: 10px">القاموس</span>
            </a>
            <ul class="treeview-menu ">
                <li><a href="{{ url('/admin/dictionaries') }}"><i class="fa fa-circle-o"></i>
                  عرض القاموس
                  </a></li>
                <li><a href="{{ url('/admin/dictionaries/create') }}"><i class="fa fa-circle-o"></i>
                 اضافة كلمة للقاموس
                </a></li>
            </ul>
        </li>
    </ul>
     @endcan


  </section>
    <!-- /.sidebar -->
</aside>
