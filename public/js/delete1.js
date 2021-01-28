function delete_user_manager(){
	delete_obj = document.getElementsByClassName("checked_manage_user");
	delete_element = "";
	for (var i = 0 ; i < delete_obj.length; i++){
		if (delete_obj[i].checked == true){
			delete_element = (delete_element == "")?parseInt(delete_obj[i].id).toString():(delete_element + "_" + parseInt(delete_obj[i].id).toString());
		}
	}
	window.location.href="./process.php?state=delete_user&id="+delete_element;
}
function delete_story_manager(page_next){
	delete_obj = document.getElementsByClassName("checked_manage_story");
	delete_element = "";
	for (var i = 0 ; i < delete_obj.length; i++){
		if (delete_obj[i].checked == true){
			delete_element = (delete_element == "")?parseInt(delete_obj[i].id).toString():(delete_element + "_" + parseInt(delete_obj[i].id).toString());
		}
	}
	window.location.href="./process.php?state=delete_story&id="+delete_element+"&page="+page_next;
}
