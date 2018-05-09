<div class="page-title">
    <div>
        <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "tags_new") ? "Thêm mới" : "Chỉnh sửa"?></h1>
        <p></p>
    </div>
    <div>
        <ul class="breadcrumb">
            <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="?act=tags_list">Quản lý Tags</a></li>
            <li><?=($_GET['act'] == "tags_new") ? "Thêm mới" : "Chỉnh sửa"?></li>
        </ul>
    </div>
</div>
      
<?
function	template_edit($url,$func,$id,$txt_ten,$txt_slug,$txt_chu_thich,$txt_hien_thi,$txt_title,$txt_keyword,$txt_description,$error)
{
?>
<div class="row">
    <div class="col-md-12">
        <?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
        <form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
            <input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
            <input type="hidden" name="id" value="<?=$id?>" />
            <input type="hidden" name="func" value="<?=$func?>" />
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
                <input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=tags_list');"/>
            </div>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
                    </li>
                    <li role="presentation">
                        <a href="#seo" aria-controls="home" role="tab" data-toggle="tab">SEO</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="noidung">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tên trang :</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?if($func=='update'){?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Slug (Không nên thay đổi):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_slug" value="<?=$txt_slug?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?}?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Thông tin:</label>
                                            <div class="col-md-8">
                                                <textarea name="txt_chu_thich" class="form-control" rows="5"><?=$txt_chu_thich?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="form-group">
                                            <div class="animated-checkbox">
                                                <label>
                                                    <input type="checkbox" name="txt_hien_thi" <?=(!isset($txt_hien_thi) || $txt_hien_thi==1)?'checked="checked"':''?>/><span class="label-text">Hiển thị</span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seo">
                    <?php
                        include "seo.php";
                    ?>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?
}
?>