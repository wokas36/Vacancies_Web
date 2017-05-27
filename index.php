<?php
include("./login/check_reg.php");

$option=$_GET['option'];

if(empty($option)){
	header("location:./?option=dashboard");
}
include("./functions/read_functions.php");
include("./process_functions/read_functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ඇබෑර්තු.lk</title>
<link rel="icon" type="image/png" href="images/icons/favicon.png">
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="./js/navigation.js"></script>
<script type="text/javascript" src="./js/datepicker.js"></script>
<script type="text/javascript" src="./js/spin.js"></script>
<link href="css/image slider/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="js/js-image-slider.js" type="text/javascript"></script>


<script type="text/javascript" src="./js/jquery-ui.js"></script>
<script type="text/javascript">
// <![CDATA[ 

// Utility function - not needed by the datepicker script but used by a few of the demos below   
function pad(value, length) { 
        length = length || 2; 
        return "0000".substr(0,length - Math.min(String(value).length, length)) + value; 
};

// ]]>
</script>

</head>
<body>

<section class="main_container">

	<header class="span16 main_header" id="main_header">
		<?php if(function_exists("main_header_content")){ main_header_content(); } ?>
	</header>
    <div class="clear"></div>
    <section class="span16" id="main_span">
        <div class="span4 side_content_1 box_shadow border_radius_px_3" id="side_content">
            <?php if(function_exists("sidebar_content")){ sidebar_content(); } ?>
        </div>
        
        <div class="span12 main_content_2" id="main_content">
        
        	<div class="data_content border_radius_px_3" id="data_content">
            <?php if(function_exists($option)){ $option(); } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </section>
    <div class="clear"></div>

</section>

<!-- jQuery jGrowl -->
<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>

<script language="javascript" type="text/javascript">

function mainLiveSearch(){
	
	var search_option="customer";
	var search_phrase=$('#search_phrase').val().split(' ').join('#');;
	
	if(document.getElementById('search_employee').checked == true){ search_option='employee';}
	
	if(search_phrase == ""){
		
		$('#main_live_search_results').css("display", "none");
	}
	else{
		$('#main_live_search_results').css("display", "block");
		$('#main_live_search_results').load("./functions/read_ajax_functions.php?option=main_live_search&search_phrase="+search_phrase+"&search_option="+search_option);
	}
}

function inputCustomerLiveSearch(elem, result_area){
	
	var search_phrase=document.getElementById(elem).value.split(' ').join('#');
	
	$('#customer_id').val('');
	
	if(search_phrase != ""){
		
		$('#'+result_area).load("./functions/read_ajax_functions.php?option=input_live_customer_search&search_phrase="+search_phrase+"&elem="+elem+"&result_area="+result_area);
	}
}

function inputEmployeeLiveSearch(elem, result_area){
	
	var search_phrase=document.getElementById(elem).value.split(' ').join('#');
	
	$('#emp_id').val('');
	
	if(search_phrase != ""){
		
		$('#'+result_area).load("./functions/read_ajax_functions.php?option=input_live_employee_search&search_phrase="+search_phrase+"&elem="+elem+"&result_area="+result_area);
	}
}

function selectCustomer(elem, customer_id, customer_name, result_area){
	
	$('#'+result_area).html('');
	$('#'+elem).val(customer_name);
	$('#customer_id').val(customer_id);
	
	jQuery.isFunction(resetCustomerInfo(customer_id));	
}

function selectEmployee(elem, emp_id, employee_name, result_area){
	
	$('#'+result_area).html('');
	$('#'+elem).val(employee_name);
	$('#emp_id').val(emp_id);
}

$(document).ready(function() {	
	
	// Tooltips
	$('[title]').tooltip({
		placement: 'top'
	});			

	$('body').click(function(){
		
		$('#dropdown_btn_list').slideUp(500);		
		$('#main_live_search_results').css("display", "none");
	});

	
	var $windowHeight=$(window).height();
	var $mainHeaderHeight=$('#main_header').height();
	
	var $mainSpanMinHeight=$windowHeight-$mainHeaderHeight;
	
	$('#main_span').css("min-height", $mainSpanMinHeight);
	$('#main_content').css("min-height", $mainSpanMinHeight);
	$('#side_content').css("min-height", $mainSpanMinHeight);
	
	var $mainSpanHeight=$('#main_span').height();
	var $footerMarginTop=$mainSpanHeight;
	
	$('#footer').css("margin-top", $footerMarginTop);
	
<?php
	$notify=$_SESSION['notify'];
	$status=$_SESSION['status'];
	
	if(!empty($notify)){
		
		if($status == "success"){
		?>
			$.jGrowl("<?php echo $notify; ?>", { theme: 'success',	beforeClose: function() { return true;}});
		<?php
		}
		else if($status == "failed"){
		?>
			$.jGrowl("<?php echo $notify; ?>", {theme: 'danger',	beforeClose: function() { return true;}});
		<?php
		}
		else{
		}
		
		unset($_SESSION['notify']);
		unset($_SESSION['status']);
	}
?>
});

$(window).resize(function() {
	
	var $windowHeight=$(window).height();
	var $mainHeaderHeight=$('#main_header').height();
	
	var $mainSpanMinHeight=$windowHeight-$mainHeaderHeight;
	
	$('#main_span').css("min-height", $mainSpanMinHeight);
	$('#main_content').css("min-height", $mainSpanMinHeight);
	$('#side_content').css("min-height", $mainSpanMinHeight);
	
	var $mainSpanHeight=$('#main_span').height();
	var $footerMarginTop=$mainSpanHeight;
	
	$('#footer').css("margin-top", $footerMarginTop);
});

</script>		

<!-- Scripts -->
<script src="js/bootstrap/bootstrap-affix.js"></script>
<script src="js/bootstrap/bootstrap-alert.js"></script>
<script src="js/bootstrap/bootstrap-tooltip.js"></script>
<script src="js/bootstrap/bootstrap-dropdown.js"></script>
<script src="js/bootstrap/bootstrap-tab.js"></script>
<script src="js/bootstrap/bootstrap-collapse.js"></script>
<script src="js/bootstrap/bootstrap-fileupload.js"></script>
<script src="js/bootstrap/bootstrap-inputmask.js"></script>
<!-- Scripts -->

</body>
</html>
