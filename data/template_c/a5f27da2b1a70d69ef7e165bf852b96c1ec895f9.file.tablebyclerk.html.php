<?php /* Smarty version Smarty-3.1.16, created on 2016-05-13 15:22:54
         compiled from "tpl/admin/tablebyclerk.html" */ ?>
<?php /*%%SmartyHeaderCode:8013143955734b51fb35167-38215397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5f27da2b1a70d69ef7e165bf852b96c1ec895f9' => 
    array (
      0 => 'tpl/admin/tablebyclerk.html',
      1 => 1463121623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8013143955734b51fb35167-38215397',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5734b51fc0c4f1_50839602',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5734b51fc0c4f1_50839602')) {function content_5734b51fc0c4f1_50839602($_smarty_tpl) {?><!doctype html>
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
			<article class="breadcrumbs"><a href="index.php">订单管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">业务员统计表</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin/leftmenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<section id="main" class="column">
			<article class="module width_full">
				<header><h3>表格列表</h3></header>
				<div class="table_container" >
					<div id="tab3" style="width:100%">
					<table class="tablesorter" cellspacing="0"> 
							<tr>  
				    				<th>客户</th>
				    				<th>业务员</th>
				    				<th>订单数量</th>
				    				<th>订单金额</th>
							</tr> 
			
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
							<tr>
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['client'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['clerk'];?>
"><div></td> 	
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['sum_amount'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['sum_totalprice'];?>
"><div></td> 				    	
							</tr>
						<?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
						<?php } ?>
					</table>
				</div><!-- end of #tab1 -->
			</div>
				<footer>

							<div class="submit_div" >
								<div class="submitchose2">
									<input class="choosetable" type="submit" value="未出货定南类别统计表" 
									 onclick="window.location.href='index.php?controller=table&method=showTableByClient&tableid=<?php echo $_GET['tableid'];?>
'"/>
								</div>
								<div class="submitchose2">
									<input class="choosetable2" type="submit" value="业务员统计"/>
								</div>
								<div class="submitchose2">
									<input class="choosetable" type="submit" value="各工厂现有订单统计"  onclick="window.location.href='index.php?controller=table&method=showTableByFactory&tableid=<?php echo $_GET['tableid'];?>
'"/>
								</div>
									<input type="submit" name="submit" id="download" value="下载文件" class="alt_btn" class="alt_btn" onclick="window.location.href='index.php?controller=table&method=downloadTableByClerk&tableid=<?php echo $_GET['tableid'];?>
'"/>
							</div>
		
					
				</footer>
			</article>
		<div class="spacer"></div>
	</section>


</body>

</html><?php }} ?>
