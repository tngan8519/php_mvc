function kiemduyet(){
	alert("tôi là nguyễn hứa phùng");
}
function manage_confirm_story(){
	story_obj = document.getElementsByClassName("checked_manage_story");
	story_element = "";
	for (var i = 0 ; i < story_obj.length; i++){
		if (story_obj[i].checked == true){
			story_element = (story_element == "")?parseInt(story_obj[i].id).toString():(story_element + "_" + parseInt(story_obj[i].id).toString());
		}
	}
	window.location.href="./process.php?state=confirm_story&id="+story_element;
}
function manage_confirm_book(){
	book_obj = document.getElementsByClassName("checked_book_manager");
	book_element = "";
	for (var i = 0 ; i < book_obj.length; i++){
		if (book_obj[i].checked == true){
			book_element = (book_element == "")?parseInt(book_obj[i].id).toString():(book_element + "_" + parseInt(book_obj[i].id).toString());
		}
	}
	window.location.href="./process.php?state=confirm_book&id="+book_element;
}