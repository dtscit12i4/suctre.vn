<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?php

class ve_system
{
	public function title($module,$lang='')
	{
		global $get, $id;

		if($lang<>'') $suffix = '_'.$lang; else $suffix = '';

		switch ($module) {

			case 'gioi_thieu':
				if(!$id){
				if($get->post_cat('15','seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat('15','name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat('15','seo_title'.$suffix));
			}
			else{
				if($get->post($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_title'.$suffix));
			}
				break;

			case 'lien_he':
				if($get->page('lien_he','seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->page('lien_he','name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->page('lien_he','seo_title'.$suffix));
				break;

			case 'search_result':		
				if($suffix <> ''){
					$result = 'Search result';
				}	
				else {
					$result = 'Kết quả tìm kiếm';
				}	
				break;

			case 'support':
				if($get->page('ho_tro','seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->page('ho_tro','name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->page('ho_tro','seo_title'.$suffix));
				break;

			case 'sitemap':
				if($get->page('so_do','seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->page('so_do','name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->page('so_do','seo_title'.$suffix));
				break;

			case 'tin_tuc':
			if(!$id){
				if($get->post_cat('1','seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat('1','name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat('1','seo_title'.$suffix));
			}
			else{
				if($get->post_cat($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat($id,'seo_title'.$suffix));
			}
				break;

			case 'tin_tuc_xem':
				if($get->post($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_title'.$suffix));
				break;

			case 'tuyen_dung':
				if(!$id){
				if($get->post_cat('2','seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat('2','name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat('2','seo_title'.$suffix));
			}
			else{
				if($get->post_cat($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat($id,'seo_title'.$suffix));
			}
				break;

			case 'tuyen_dung_xem':
				if($get->post($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_title'.$suffix));
				break;


			case 'product_categories':
				if($suffix <> ''){
					$result = 'All categories';
				}	
				else {
					$result = 'Dự án - Bảo Khánh Land';
				}	
				break;

			case 'product_cat':
				if($get->product_cat($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->product_cat($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->product_cat($id,'seo_title'.$suffix));
				break;

			case 'product':
				if($get->product($id,'seo_title'.$suffix)=='')
					$result = htmlspecialchars_decode($get->product($id,'name'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->product($id,'seo_title'.$suffix));
				break;
			
			default:
				$result = htmlspecialchars_decode($get->config('page_title'.$suffix));
				break;

		}
		return $result;
	}
	public function meta_description($module,$lang='')
	{
		global $get,$id;

		if($lang<>'') $suffix = '_'.$lang; else $suffix = '';

		switch ($module) {

			case 'gioi_thieu':
				if(!$id){
				if($get->post_cat('15','seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat('15','info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat('15','seo_description'.$suffix));
			}
			else{
				if($get->post($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post($id,'info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_description'.$suffix));
			}
				break;

			case 'support':
				if($get->page('ho_tro','seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->page('ho_tro','info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->page('ho_tro','seo_description'.$suffix));
				break;

			case 'sitemap':
				if($get->page('so_do','seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->page('so_do','info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->page('so_do','seo_description'.$suffix));
				break;

			case 'lien_he':
				if($get->page('lien_he','seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->page('lien_he','info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->page('lien_he','seo_description'.$suffix));
				break;
			case 'tin_tuc':
			if(!$id){
				if($get->post_cat('1','seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat('1','info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat('1','seo_description'.$suffix));
			}
			else{
				if($get->post_cat($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat($id,'info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat($id,'seo_description'.$suffix));
			}
				break;

			case 'tin_tuc_xem':
				if($get->post($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post($id,'info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_description'.$suffix));
				break;

			case 'tuyen_dung':
				if(!$id){
				if($get->post_cat('2','seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat('2','info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat('2','seo_description'.$suffix));
			}
			else{
				if($get->post_cat($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post_cat($id,'info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post_cat($id,'seo_description'.$suffix));
			}
				break;

			case 'tuyen_dung_xem':
				if($get->post($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->post($id,'info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_description'.$suffix));
				break;

			case 'product_categories':
				if($suffix <> ''){
					$result = 'All categories';
				}	
				else {
					$result = 'Tất cả dự án';
				}	
				break;

			case 'product_cat':
				if($get->product_cat($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->product_cat($id,'info'.$suffix));				
				else
					$result =htmlspecialchars_decode($get->product_cat($id,'seo_description'.$suffix));
				break;

			case 'product':
				if($get->product($id,'seo_description'.$suffix)=='')
					$result = htmlspecialchars_decode($get->product($id,'info'.$suffix));				
				else
					$result = htmlspecialchars_decode($get->product($id,'seo_description'.$suffix));
				break;

			default:
				$result = htmlspecialchars_decode($get->config('meta_description'.$suffix));
				break;

		}
		return $result;
	}
	public function meta_keywords($module,$lang='')
	{
		global $get,$id;

		if($lang<>'') $suffix = '_'.$lang; else $suffix = '';

		$result_start = htmlspecialchars_decode($get->config('meta_keywords'.$suffix));

		switch ($module) {			

			case 'gioi_thieu':
				if(!$id){
				if($get->post_cat('15','seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post_cat('15','seo_keywords'.$suffix));
			}
			else{
				if($get->post($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_keywords'.$suffix));
			}
				break;

			case 'support':
				if($get->page('ho_tro','seo_keywords'.$suffix)=='')
					$result = $result_start;				
				else
					$result = htmlspecialchars_decode($get->page('ho_tro','seo_keywords'.$suffix));
				break;

			case 'sitemap':
				if($get->page('so_do','seo_keywords'.$suffix)=='')
					$result = $result_start;				
				else
					$result = htmlspecialchars_decode($get->page('so_do','seo_keywords'.$suffix));
				break;

			case 'lien_he':	
				if($get->page('lien_he','seo_keywords'.$suffix)=='')
					$result = $result_start;				
				else
					$result = htmlspecialchars_decode($get->page('about_us','seo_keywords'.$suffix));
				break;

			
			case 'tin_tuc':
			if(!$id){
				if($get->post_cat('1','seo_keywords'.$suffix)=='')
					$result = $result_start;				
				else
					$result = htmlspecialchars_decode($get->post_cat('1','seo_keywords'.$suffix));
			}
			else{
				if($get->post_cat($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post_cat($id,'seo_keywords'.$suffix));
			}
				break;

			case 'tin_tuc_xem':
				if($get->post($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_keywords'.$suffix));
				break;

			case 'tuyen_dung':
				if(!$id){
				if($get->post_cat('2','seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post_cat('2','seo_keywords'.$suffix));
			}
			else{
				if($get->post_cat($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post_cat($id,'seo_keywords'.$suffix));
			}
				break;

			case 'tuyen_dung_xem':
				if($get->post($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;			
				else
					$result = htmlspecialchars_decode($get->post($id,'seo_keywords'.$suffix));
				break;

			case 'product_cat':
				if($get->product_cat($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;				
				else
					$result = htmlspecialchars_decode($get->product_cat($id,'seo_keywords'.$suffix));
				break;
				break;

			case 'product':
				if($get->product($id,'seo_keywords'.$suffix)=='')
					$result = $result_start;				
				else
					$result = htmlspecialchars_decode($get->product($id,'seo_keywords'.$suffix));
				break;
			
			default:
				$result = $result_start;
				break;
				
		}
		return $result;
	}


	// Facebook Meta Tags
	public function facebook_metatags($module,$lang='')
	{
		global $get, $id, $root;

		if($lang<>'') $suffix = '_'.$lang; else $suffix = '';

		$image = '';

		switch ($module) {

			case 'post':
				$title = $get->post($id,'name'.$suffix);
				$description = $get->post($id,'info'.$suffix);
				if($get->post($id,'thumbnail')<>'no')
					$image = 'http://'.$_SERVER['HTTP_HOST'].$root.'uploads/post/post_'.$get->post($id,'thumbnail');	
				break;

			case 'product_cat':
				$title = $get->product_cat($id,'name'.$suffix);
				$description = $get->product_cat($id,'info'.$suffix);
				if($get->product_cat($id,'thumbnail')<>'no')
					$image = 'http://'.$_SERVER['HTTP_HOST'].$root.'uploads/product_cat/productcat_'.$get->product_cat($id,'thumbnail');			
				break;

			case 'product':
				$title = $get->product($id,'name'.$suffix);
				$description = $get->product($id,'info'.$suffix);
				if($get->product($id,'thumbnail')<>'no')
					$image = 'http://'.$_SERVER['HTTP_HOST'].$root.'uploads/product/product_'.$get->product($id,'thumbnail');
				break;
			
			default:
				$title = $get->config('page_title'.$suffix);
				$description = $get->config('meta_description'.$suffix);
				$image = '';
				break;
				
		}
		$app_id = '';

		$result = '<meta property="og:url" content="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" />
		<meta property="og:title" content="'.$title.'" />
		<meta property="og:description" content="'.$description.'" />
		<meta property="og:image" content="'.$image.'" />
		<meta property="og:app_id" content="'.$app_id.'" />
		';
		return $result;
	}
}
?>