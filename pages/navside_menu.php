<style type="text/css">
.tooltip-inner {
    max-width: 400px;
    /* If max-width does not work, try using width instead */
    width: 500px; 
	background: transparent;
	border: none;
	text-align: left;
}
.tooltip{
	left: 200px!important;
	position: fixed;
	z-index: 100000000000000000!important;
	background: transparent;
	border: none;
}
.img-thumbnail{
	box-shadow: 0px 0px 10px 3px #222;
	max-height: 170px;
}
.tooltip-arrow {
    display: none !important;
}
</style>
<div class="nav-side-menu">
	<div class="brand">C3 Labeller (Huawei)</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
		<div class="menu-list">
  
			<ul id="menu-content" class="menu-content collapse out">

				<!-- <li  data-toggle="collapse" data-target="#label_format" class="collapsed" id="li_format_collapse">
				  <a href="#"><i class="fa fa-plus-square-o fa-lg"></i> C3 Label Formats <span class="arrow"></span></a>
				</li> -->
				<ul class="sub-menu collapse" id="label_format">
					<!-- <li style="" id="li_format28" data-toggle="tooltip" title="<img class='img-thumbnail' src='../img/C3_Label_Format/format6.jpg'/>"><a href="#">Format 28 (Huawei) <span class="badge" title="Tray type" small></span></a></li>				 -->
				</ul>
				<li style="" id="li_format28" data-toggle="tooltip" title="<img class='img-thumbnail' src='../img/C3_Label_Format/format6.jpg'/>"><a href="#"><i class="fa fa-plus-square-o fa-lg"></i> C3 Labeller (Huawei) <span class="badge" title="Tray type" small></span></a></li>				
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
		case "format28.php":
			set_active_sticker_format('#menu-content li#li_format28');
		break;
		case "settings.php":
			set_active('#menu-content li#li_settings');
		break;
		default : 
			set_active('#menu-content li#li_format28');
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

	//---
	$(function () {
	    // $("#label_format li").hover(function () {
	    // 	console.log('y');
	    // });
		// $("#label_format").on("mouseover", function () {
		// });


	 //    	console.log('y');
	    // var $preview = $("#preview");

	    // $("ul#products a").hover(function () {
	    //     $preview.attr("src", $(this).attr("data-thumbnail-src"));
	    // }, function () {
	    //     $preview.attr("src", "");
	    // });
	});

	$(function() {
	  $('[data-toggle="tooltip"]').tooltip({
	    html: true
	  });
	});

	// setTimeout(() => {
		// $('#li_format28 a').trigger('click');
	// }, 500);


});



$('#menu-content li').click(function(){
	var li_id = $(this).attr('id');
	switch (li_id){
		case "li_home": 
			window.location.href = 'index.php?page=home.php'; 
			break;
		case "li_format28":
			window.location.href = 'index.php?page=format28.php';
			break;
		case "li_cn_f13_settings":	 
			window.location.href = 'index.php?page=../format13/pages/format13view.php'; 
			break;
		case "li_settings":	 
			window.location.href = 'index.php?page=settings.php'; 
			break;
	}
});


</script>