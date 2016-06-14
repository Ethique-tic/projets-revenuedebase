function hide_all() {
	$(".graph-page").hide(); 
} 

function show_part(id_div_part_hide,id_div_part_show)
{ 
	$("#"+id_div_part_hide).hide(50);
	$("#"+id_div_part_show).show(50);
}