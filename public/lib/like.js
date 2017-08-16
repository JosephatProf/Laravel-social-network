$(document).ready(fucntion(){
		$("#linkeBtn").removeAtrr("disabled");
		$("#unlinkeBtn").removeAtrr("disabled");
		$('#likeBtn').click(fucntion(e){
			var val = parseInt($("#linkeBtn").val(),10);
			$.post("index.php",{op:"like"},fucntion(data){
				if(data == 1){
					$("#status").html("Liked Success");
					$val = val + 1;
					$("#linkeBtn").val(val);
					$("#linkeBtn").attr("disabled","disabled");
					$("#linkeBtn".css("background-image","url(like.png)"));
				}else{
					$("#status").html("Already Liked");

				}
			})
		});
		$('#unlikeBtn').click(fucntion(e){
			var val = parseInt($("#unlinkeBtn").val(),10);
			$.post("index.php",{op:"unlike"},fucntion(data){
				if(data == 1){
					
					$val = val + 1;
					$("#unlinkeBtn").val(val);
					$("#unlinkeBtn").attr("disabled","disabled");
					$("#unlinkeBtn".css("background-image","url(like.png)"));
					$("#status").html("Unliked success");
				}else{
					$("#status").html("Already Unliked");

				}
			})
		});


	});
	