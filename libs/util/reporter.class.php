<?php
class Reporter{
	
	public static function showmessage($info, $url){
		echo "<script>alert('$info');window.location.href='$url'</script>";
		exit;
	}	
}
?>