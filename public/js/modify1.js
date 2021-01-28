function modify_manage_story(){
	modify_obj = document.getElementsByClassName("checked_manage_story");
	for (var i = 0 ; i < modify_obj.length; i++){
		if (modify_obj[i].checked == true){
			id_story = parseInt(modify_obj[i].id).toString();
			window.location.href="./process.php?state=modify_story&id="+id_story;
		}
	}
}
function modify_manage_order(){
	modify_obj = document.getElementsByClassName("checked_manage_story");
	for (var i = 0 ; i < modify_obj.length; i++){
		if (modify_obj[i].checked == true){
			id_order = parseInt(modify_obj[i].id).toString();
			window.location.href="./process.php?state=modify_order&id="+id_order;
		}
	}
}