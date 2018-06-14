<div class="tab-home" <? if($module == 'product_cat' | $module == 'tin_tuc') echo 'style="padding-top: 0"'; ?>>
      <div class="container-t">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Nhân sự</a></li>
          <li><a data-toggle="tab" href="#menu1">Nội thất</a></li>
          <li><a data-toggle="tab" href="#menu2">Xu hướng</a></li>
          <li><a data-toggle="tab" href="#menu3">Dự án</a></li>
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <figure><a href="#"><img src="<?=$root?>images/banner-1.jpg" alt="" class="img-responsive"></a></figure>
          </div>
          <div id="menu1" class="tab-pane fade">
            <figure><a href="#"><img src="<?=$root?>images/banner-2.jpg" alt="" class="img-responsive"></a></figure>
          </div>
          <div id="menu2" class="tab-pane fade">
            <figure><a href="#"><img src="<?=$root?>images/banner.jpg" alt="" class="img-responsive"></a></figure>
          </div>
          <div id="menu3" class="tab-pane fade">
            <figure><a href="#"><img src="<?=$root?>images/banner-3.jpg" alt="" class="img-responsive"></a></figure>
          </div>
        </div>
      </div>
    </div>