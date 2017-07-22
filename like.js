function like_add(article_id){
	$.post('like_add.php',{article_id:article_id},function(data){
		if(data=='success'){
			like_get(article_id);
		}
		else{
			alert(data);
		}
	});
}

function like_get(article_id){
	$.post('like_get.php',{article_id:article_id},function(data){
		$('#article_'+article_id+'_likes').text(data);
	});
}

function users(user_id){
	console.log(user_id);
	$.ajax({
    url: "users.php",
    type: "post",
    cache: "false",
    data: {user_id: user_id},
    success: function(data) {
        console.log(data);
        alert("you have successfully followed");
    },
    error: function(){
        alert("failure");
    }
});
}

