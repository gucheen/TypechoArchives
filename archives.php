<?php    
   /**  
    * archives  
    *   
    * @package custom   
    */    
$this->need('header.php');?>
<style>
.tit{margin-top:20px;}
.cate_label{margin:10px;}
.cate_label a{color:#000;font-size:16px;line-height:24px;}
.cate_label a:hover{color:red;}
#archives{padding:0 20px;}
#archives li{list-style:none;}
.al_post_list li{font-size:16px;line-height:25px;}
.al_post_list li a{margin-left:25px;color:#000;}
.al_post_list li a:hover{color:red;}
</style>
  <div id="main">
    <div id="category_list">
    <h2 class="tit">分类列表</h2>
    <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<span class="cate_label"><a href="{permalink}">{name}</a></span>'); ?>
    </div>
    <div id="archives_by_mon">
    <h2 class="tit">按月归档</h2>
    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $mon=0; $i=0; $j=0;   
    $output = '<div id="archives">';   
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y=$year; $m=$mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($mon != $mon_tmp) {
	    $year = $year_tmp; 
            $mon = $mon_tmp;   
            $output .= '<li><h3 class="al_mon">'. $year .' 年 '. $mon .' 月</h3><ul class="al_post_list">'; //输出月份   
        }        
	$output .= '<li>'.date('m-d ',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>'; //输出文章日期和标题   
    endwhile;   
    $output .= '</ul></li></ul></div>';   
    echo $output;   
    ?>
    </div>
  </div>
<?php $this->need('footer.php'); ?>
