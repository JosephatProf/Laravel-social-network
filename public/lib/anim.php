<link type="text/css" rel="stylesheet" href="css/anim.css" />
 <script type="text/javascript"src="lib/jquery-2.2.4.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
 $("#toggle1").click(function(event){
 $('#i1').slideToggle('slow');
});
 $("#toggle2").click(function(event){
 $('#i2').slideToggle('slow');
 });
 $("#toggle3").click(function(event){
 $('#h2').slideToggle('slow');
});
});
</script>
 </head>
 <body>
 <h1>Animated showing and hiding of an image and text with jQuery</h1>
 <button id="toggle1">Toggle Image 1</button>
<button id="toggle2">Toggle Image 2</button>
<button id="toggle3">Toggle Text</button><hr/>
 <img src="like.png" id="i1" />
 <img src="images/one.jpg" id="i2" /><hr/>
<h2 id="h2">A ski jump</h2>
 </body>
</html>