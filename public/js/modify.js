function modify_book_manager(){
	modify_obj = document.getElementsByClassName("checked_book_manager");
	for (var i = 0 ; i < modify_obj.length; i++){
		if (modify_obj[i].checked == true){
			id_book = parseInt(modify_obj[i].id).toString();
			window.location.href="./process.php?state=modify_book&id="+id_book;
		}
	}
}
function modify_manage_user(){
	modify_obj = document.getElementsByClassName("checked_manage_user");
	for (var i = 0 ; i < modify_obj.length; i++){
		if (modify_obj[i].checked == true){
			id_user = parseInt(modify_obj[i].id).toString();
			window.location.href="./process.php?state=modify_user&id="+id_user;
		}
	}
}
