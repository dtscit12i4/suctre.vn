<?php 
if($txtMod=="update")
{
 
    $POST=$_POST;
     foreach ($POST as $key => $value) {
        $value = $str->safe($value);
        if($key=='txtMod'){
            continue;
         }  
         $i = substr($key,4);
        $sql = "update $tbl_config set content='".$value."' where code='".$i."'";
        $conn->query($sql);
    }
}
?>

<div class="page-title">
    <div>
        <h1><i class="fa fa-edit"></i> Cấu hình hệ thống</h1>
        <p></p>
    </div>
    <div>
        <ul class="breadcrumb">
            <li><a href="?act=home"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		<form name="frm_edit" id="frm_edit" action="<?$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
            <input type="hidden" name="txtMod" value="update">
			<div class="form-group">
                <input type="submit" class="btn btn-success" value="Lưu"/>
            </div>
            <div role="tabpanel">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="noidung">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tiêu đề website: </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_page_title" value="<?=$get->config("page_title")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Meta description:</label>
                                            <div class="col-md-9">
                                                <textarea name="txt_meta_description" class="form-control" rows="5"><?=$get->config("meta_description")?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Meta keywords:</label>
                                            <div class="col-md-9">
                                                <textarea name="txt_meta_keywords" class="form-control" rows="5"><?=$get->config("meta_keywords")?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email: </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_email" value="<?=$get->config("email")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Phone: </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_phone" value="<?=$get->config("phone")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Skype:</label>
                                            <div class="col-md-9">
                                                <input name="txt_skype" class="form-control" value="<?=$get->config("skype")?>"/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Location: </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_location" value="<?=$get->config("location")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Facebook: </label>
                                            <div class="col-md-9">
                                                <input type="text" name="txt_social_facebook" value="<?=$get->config("social_facebook")?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Instagram:</label>
                                            <div class="col-md-9">
                                                <input name="txt_social_instagram" class="form-control" value="<?=$get->config("social_instagram")?>"/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Google Plus:</label>
                                            <div class="col-md-9">
                                                <input name="txt_social_googleplus" class="form-control" value="<?=$get->config("social_googleplus")?>"/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">YouTube:</label>
                                            <div class="col-md-9">
                                                <input name="txt_social_youtube" class="form-control" value="<?=$get->config("social_youtube")?>"/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
	</div>
</div>