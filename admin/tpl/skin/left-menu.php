
<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"><img src="images/avatar-default.png" alt="User Image" class="img-circle"></div>
      <div class="pull-left info">
        <p class="designation">Cấp độ: ---</p>
        <p><?=$ses_admin_user?></p><!--  -->
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="treeview <?if($act=='home'|strpos($act,"system")=='true'|strpos($act,"orders")=='true'|strpos($act,"register")=='true'|strpos($act,"contact")=='true'){echo 'active';}?>">
        <a href="javascript:void(0)"><i class="fa fa-bars"></i><span>Hệ thống</span><i class="fa fa-angle-right"></i></a>

        <ul class="treeview-menu">
          <li><a href="?act=home"><i class="fa fa-circle-o"></i> Trang chủ quản trị</a></li>
          <!-- <li><a href="?act=register_email_list"><i class="fa fa-circle-o"></i> Email đăng ký nhận tin</a></li> -->
          <li><a href="?act=contact_list"><i class="fa fa-circle-o"></i> Thư khách hàng</a></li>
          <li><a href="?act=system_config"><i class="fa fa-circle-o"></i> Cấu hình hệ thống</a></li>
        </ul>
      </li>

      <li class="treeview <?if(strpos($act,"product")=='true'|strpos($act,"size")=='true'){echo 'active';}?>">
        <a href="javascript:void(0)"><i class="fa fa-bars"></i><span>Dự án</span><i class="fa fa-angle-right"></i></a>

        <ul class="treeview-menu">
          <li><a href="?act=product_cat"><i class="fa fa-circle-o"></i> Danh mục dự án</a></li>
        </ul>
      </li>

      <li class="treeview <?if(strpos($act,"gallery")=='true'|strpos($act,"post")=='true'|strpos($act,"page")=='true'){echo 'active';}?>">
        <a href="javascript:void(0)"><i class="fa fa-bars"></i><span>Hình ảnh/Bài viết</span><i class="fa fa-angle-right"></i></a>

        <ul class="treeview-menu">
          <li><a href="?act=gallery_cat"><i class="fa fa-circle-o"></i> Quản lý hình ảnh</a></li>
          <li><a href="?act=post_cat"><i class="fa fa-circle-o"></i> Danh mục bài viết</a></li>
          <li><a href="?act=page"><i class="fa fa-circle-o"></i> Quản lý trang nội dung</a></li>
          <!-- <li><a href="?act=video"><i class="fa fa-circle-o"></i> Quản lý video</a></li> -->
        </ul>
      </li>

      <li class="treeview <?if(strpos($act,"country")=='true'|strpos($act,"member")=='true'){echo 'active';}?>">
        <a href="javascript:void(0)"><i class="fa fa-bars"></i><span>Tài khoản thành viên</span><i class="fa fa-angle-right"></i></a>

        <ul class="treeview-menu">
          <li><a href="?act=member_list"><i class="fa fa-circle-o"></i> Danh sách quản trị website</a></li>
          <li><a href="?act=member_edit&id=2"><i class="fa fa-circle-o"></i> Trang cá nhân</a></li>
          <li><a href="?logout=OK"><i class="fa fa-circle-o"></i> Thoát</a></li>
        </ul>
      </li>
      
      
    </ul>
  </section>
</aside>