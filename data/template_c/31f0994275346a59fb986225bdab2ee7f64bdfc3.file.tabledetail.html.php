<?php /* Smarty version Smarty-3.1.16, created on 2016-05-13 14:36:10
         compiled from "tpl/admin/tabledetail.html" */ ?>
<?php /*%%SmartyHeaderCode:188061515157336f7ba83b39-11844817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31f0994275346a59fb986225bdab2ee7f64bdfc3' => 
    array (
      0 => 'tpl/admin/tabledetail.html',
      1 => 1463121365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188061515157336f7ba83b39-11844817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57336f7bb10a86_32969118',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57336f7bb10a86_32969118')) {function content_57336f7bb10a86_32969118($_smarty_tpl) {?><!doctype html>
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
			<article class="breadcrumbs"><a href="index.php">订单管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">表格详情</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin/leftmenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<section id="main" class="column">
			<article class="module width_full">
				<header><h3>表格列表</h3></header>
				<div class="table_container" >
					<div id="tab3" >
					<table class="tablesorter2" cellspacing="0"> 
							<tr>  
				    				<th>客户</th>
				    				<th>接收时间</th>
				    				<th>工厂</th>
				    				<th>业务员</th>
				    				<th>PO</th>
				    				<th>款号</th>
				    				<th>商店</th>
				    				<th>颜色</th>
				    				<th>数量</th>
				    				<th>单价</th>
				    				<th>金额</th>
				    				<th>离厂时间</th>
				    				<th>IH日期</th>
				    				<th>备注</th>
				    				<th>类型</th>
							</tr> 
			
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
							<tr>
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['client'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['receivetime'];?>
"><div></td> 	
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['factory'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['clerk'];?>
"><div></td> 	
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['po'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['stylenumber'];?>
"><div></td> 	
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['shop'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['color'];?>
"><div></td> 			
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['amount'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['unitprice'];?>
"><div></td> 	
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['totalprice'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['leavetime'];?>
"><div></td>
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['ihtime'];?>
"><div></td>  	
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['remark'];?>
"></div></td> 
				    				<td><div class="tddiv3"><input class="tdinput" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['type'];?>
"><div></td> 			    	
							</tr>
						<?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
							<tr>
								<td  colspan=4>
										暂无表格
								</td>
							</tr>
						<?php } ?>
					</table>
				</div><!-- end of #tab1 -->
				<div id="tab4" >
					<table class="tablesorter2" cellspacing="0"> 
							<tr>  
				    				<th>操作</th>
							</tr> 
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
							<tr>
<!-- 				    				<td>
				    					<div class="tddiv4">
				    					<input type="image" src="img/images/icn_trash.png" title="Trash" onclick="window.location.href='index.php?controller=order&method=del&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
'">
				    				</div></td> -->
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
			<<?php ?>?$tableid=$data[0][tableid]?<?php ?>>
				<footer>
							<div class="submit_div" >
								<div class="submitchose2">
									<input class="choosetable" type="submit" value="未出货定南类别统计表"
									 onclick="window.location.href='index.php?controller=table&method=showTableByClient&tableid=<?php echo $_GET['tableid'];?>
'"/>
								</div>
								<div class="submitchose2">
									<input class="choosetable" type="submit" value="业务员统计" onclick="window.location.href='index.php?controller=table&method=showTableByClerk&tableid=<?php echo $_GET['tableid'];?>
'"/>
								</div>
								<div class="submitchose2">
									<input class="choosetable" type="submit" value="各工厂现有订单统计" onclick="window.location.href='index.php?controller=table&method=showTableByFactory&tableid=<?php echo $_GET['tableid'];?>
'"/>
								</div>
									<input type="submit" name="submit" id="download" value="下载文件" class="alt_btn_2" disabled="true"/>
							</div>
					
				</footer>
			</article>
		<div class="spacer"></div>
	</section>


</body>

</html><?php }} ?>
