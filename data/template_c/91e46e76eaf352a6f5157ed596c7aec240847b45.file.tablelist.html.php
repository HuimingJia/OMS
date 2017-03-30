<?php /* Smarty version Smarty-3.1.16, created on 2016-05-13 15:37:48
         compiled from "tpl/admin/tablelist.html" */ ?>
<?php /*%%SmartyHeaderCode:99120411457332e06917028-56882737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91e46e76eaf352a6f5157ed596c7aec240847b45' => 
    array (
      0 => 'tpl/admin/tablelist.html',
      1 => 1463125051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99120411457332e06917028-56882737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57332e06a2afc9_42238465',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57332e06a2afc9_42238465')) {function content_57332e06a2afc9_42238465($_smarty_tpl) {?><!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理系统</title>
	<link rel="stylesheet" href="img/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="img/css/ie.css" type="text/css" media="screen" />
	<script src="img/js/html5.js"></script>
	<![endif]-->

	<script src="img/js/utility.js" type="text/javascript"></script>
	<script src="img/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="img/js/hideshow.js" type="text/javascript"></script>
	<script src="img/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="img/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">后台管理面板</a></h1>
			<h2 class="section_title"></h2><div class="btn_view_site"><a href="index.php">查看网站</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">订单管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">导入文件</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin/leftmenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<section id="main" class="column">
			<article class="module width_full">
				<header><h3>表格列表</h3></header>
				<div class="table_container" >
					<div id="tab1" >
					<table class="tablesorter" cellspacing="0"> 
							<tr>  
									<th>no</th>
				    				<th>导入时间</th>
							</tr> 
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>				
							<tr>
									<td><div class="tddiv1"><input class="tdinput" type="submit" value="表格<?php echo $_smarty_tpl->tpl_vars['value']->value['no'];?>
" onclick="window.location.href='index.php?controller=table&method=showTable&tableid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'"><div></td> 	
				    			
				    				<td><div class="tddiv1"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['dateline'];?>
" onclick="window.location.href='index.php?controller=table&method=showTable&tableid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'"><div></td> 			    	
							</tr>
						<?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
						<?php } ?>
					</table>
				</div><!-- end of #tab1 -->
				<div id="tab2" >
					<table class="tablesorter" cellspacing="0"> 
							<tr>  
				    				<th style="width:100%">操作</th>
							</tr> 
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
							<tr>
				    				<td>
				    					<div class="tddiv2">
				    					<input type="image" src="img/images/icn_search.png" title="Edit" onclick="window.location.href='index.php?controller=table&method=showTable&tableid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'">
				    					<input type="image" src="img/images/icn_trash.png" title="Trash" onclick="window.location.href='index.php?controller=table&method=delTable&tableid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'">
				    				</div></td>
							</tr>
						<?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
							<tr>
								<td  colspan=4>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div><!-- end of #tab2 -->
			</div>
			<<?php ?>? $tableid=$data[0][tableid]?<?php ?>>
				<footer>
						<form method="post" enctype="multipart/form-data" value="选择文件" 
						action="index.php?controller=table&method=addTable"
							>
						<div class="submit_div" >
							<div class="submitchose">
								<input class="choosefile" type="submit" value="选择文件"/>
								<input class="choosefile" type="file" name="importTable" id="filepath" onchange="showPath()"/>
							</div>
							<div>
								<input type="submit" id="path" value="文件路径........." disabled="true"/>
							</div>
							<input type="submit" name="submit" value="导入文件" disabled="true" style="display:none" id="importbtn"/>
							</div>
						<form>
					
				</footer>
			</article>
		<div class="spacer"></div>
	</section>


</body>

</html><?php }} ?>
