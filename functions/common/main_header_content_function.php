<?php
function main_header_content(){
?>
 <nav>
     <ul>
     <li>
  		<input type="text" placeholder="Search" onkeyup="mainLiveSearch()" id="search_phrase">
        <div class="clear"></div>
	</li>
	<li><a href="./login/process_functions.php?action=logout">Logout</a></li>
	</ul>
    
	<div class="clear"></div>
	<div class="position_relative width_pcnt_100" id="main_live_search_results"></div>
	<div class="clear"></div>
 </nav>
<?php
}
?>