<div class="nav-side-menu">
	<div class="brand">C3 Labeller</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
		<div class="menu-list">
  
			<ul id="menu-content" class="menu-content collapse out">
				<li class="" id="li_home">
				  <a href="#">
				  <i class="fa fa-home fa-lg"></i> Home
				  </a>
				</li>

				<li  data-toggle="collapse" data-target="#label_format" class="collapsed" id="li_format_collapse">
				  <a href="#"><i class="fa fa-plus-square-o fa-lg"></i> C3 Label Formats <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="label_format">
					<li id="li_format1"><a href="#">Format 1</a></li>
					<li id="li_format2"><a href="#">Format 2</a></li>
					<li id="li_format3"><a href="#">Format 3</a></li>
					<li id="li_format4"><a href="#">Format 4</a></li>
					<li id="li_format5"><a href="#">Format 5</a></li>
					<li id="li_format6"><a href="#">Format 6</a></li>
					<li id="li_format7"><a href="#">Format 7</a></li>
					<li id="li_format8"><a href="#">Format 8</a></li>
					<li id="li_format9"><a href="#">Format 9</a></li>
					<li id="li_format10"><a href="#">Format 10</a></li>
					<li id="li_format11"><a href="#">Format 11</a></li>
					<li id="li_format12"><a href="#">Format 12</a></li>
					<li id="li_format13"><a href="#">Format 13</a></li>
					<li id="li_format14"><a href="#">Format 14</a></li>
					<li id="li_format15"><a href="#">Format 15</a></li>
					<li id="li_format16"><a href="#">Format 16</a></li>
					<li id="li_format17"><a href="#">Format 17</a></li>
					<li id="li_format18"><a href="#">UL Label</a></li>
				</ul>
				
				<li class="" id="li_cn_alcatel">
				  <a href="#">
				  <i class="fa fa-edit fa-lg"></i> CN Alcatel Label
				  </a>
				</li>
				<li class="" id="li_settings">
				  <a href="#">
				  <i class="fa fa-gear fa-lg"></i> Settings
				  </a>
				</li>
			</ul>
	 </div>
</div>

<script>
$('document').ready(function(){
	var get_page = "<?php echo $page; ?>";
	switch (get_page){
		case "format1.php":
			set_active_sticker_format('#menu-content li#li_format1');
			break;
		case "format2.php":
			set_active_sticker_format('#menu-content li#li_format2');
			break;
		case "format3.php":
			set_active_sticker_format('#menu-content li#li_format3');
			break;
		case "format4.php":
			set_active_sticker_format('#menu-content li#li_format4');
			break;
		case "format5.php":
			set_active_sticker_format('#menu-content li#li_format5');
			break;
		case "format6.php":
			set_active_sticker_format('#menu-content li#li_format6');
		break;
		case "format7.php":
			set_active_sticker_format('#menu-content li#li_format7');
		break;
		case "format8.php":
			set_active_sticker_format('#menu-content li#li_format8');
		break;
		case "format9.php":
			set_active_sticker_format('#menu-content li#li_format9');
		break;
		case "format10.php":
			set_active_sticker_format('#menu-content li#li_format10');
		break;
		case "format11.php":
			set_active_sticker_format('#menu-content li#li_format11');
		break;
		case "format12.php":
			set_active_sticker_format('#menu-content li#li_format12');
		break;
		case "format13.php":
			set_active_sticker_format('#menu-content li#li_format13');
		break;
		case "format14.php":
			set_active_sticker_format('#menu-content li#li_format14');
		break;
		case "format15.php":
			set_active_sticker_format('#menu-content li#li_format15');
		break;
		case "format16.php":
			set_active_sticker_format('#menu-content li#li_format16');
		break;
		case "format17.php":
			set_active_sticker_format('#menu-content li#li_format17');
		break;
		case "format18.php":
			set_active_sticker_format('#menu-content li#li_format18');
		break;
		case "cn_alcatel.php":
			set_active('#menu-content li#li_cn_alcatel');
		break;
		case "settings.php":
			set_active('#menu-content li#li_settings');
		break;
		default : 
			set_active('#menu-content li#li_home');
	}
	
	function set_active(html){
		var current_class = $(html).attr('class');
		$(html).attr('class', current_class +' active');
	}
	
	function set_active_sticker_format(html){
		set_active('#menu-content li#li_format_collapse');
		set_active(html);
		$('ul.sub-menu').attr('class','sub-menu');
	}
});

$('#menu-content li').click(function(){
	var li_id = $(this).attr('id');
	switch (li_id){
		case "li_home": 
			window.location.href = 'index.php?page=home.php'; 
			break;
		case "li_format1":	 
			window.location.href = 'index.php?page=format1.php'; 
			break;
		case "li_format2":	 
			window.location.href = 'index.php?page=format2.php'; 
			break;
		case "li_format3":	 
			window.location.href = 'index.php?page=format3.php'; 
			break;
		case "li_format4":	 
			window.location.href = 'index.php?page=format4.php'; 
			break;
		case "li_format5":	 
			window.location.href = 'index.php?page=format5.php'; 
			break;
		case "li_format6":	 
			window.location.href = 'index.php?page=format6.php'; 
			break;
		case "li_format7":	 
			window.location.href = 'index.php?page=format7.php'; 
			break;
		case "li_format8":	 
			window.location.href = 'index.php?page=format8.php'; 
			break;
		case "li_format9":	 
			window.location.href = 'index.php?page=format9.php'; 
			break;
		case "li_format10":	 
			window.location.href = 'index.php?page=format10.php'; 
			break;
		case "li_format11":	 
			window.location.href = 'index.php?page=format11.php'; 
			break;
		case "li_format12":	 
			window.location.href = 'index.php?page=format12.php'; 
			break;
		case "li_format13":	 
			window.location.href = 'index.php?page=format13.php'; 
			break;
		case "li_format14":	 
			window.location.href = 'index.php?page=format14.php'; 
			break;
		case "li_format15":	 
			window.location.href = 'index.php?page=format15.php'; 
			break;
		case "li_format16":	 
			window.location.href = 'index.php?page=format16.php'; 
			break;
		case "li_format17":	 
			window.location.href = 'index.php?page=format17.php'; 
			break;
		case "li_format18":	 
			window.location.href = 'index.php?page=format18.php'; 
			break;
		case "li_cn_alcatel":	 
			window.location.href = 'index.php?page=cn_alcatel.php'; 
			break;
		case "li_settings":	 
			window.location.href = 'index.php?page=settings.php'; 
			break;
	}
});
</script>