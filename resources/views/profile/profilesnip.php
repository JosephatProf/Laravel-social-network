<div class="container">
	<div class="row">
		<div class="full-width bg-transparent">
        <h1 class="text-center color">Custom Input file Upload</h1>

    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12">
        <div class="full-width">
        <input type="file" id="base-input" class="form-control form-input form-style-base">
        <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly>
        <span class="glyphicon glyphicon-open input-place"></span>
    </div>

        <!--================== Snippet for custom input type file on button ================-->

        <div class="full-width">
            <h1 class="text-center color">Custom Input file Upload button</h1>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <input type="file" id="main-input" class="form-control form-input form-style-base">
                    <h4 id="fake-btn" class="form-input fake-styled-btn text-center truncate"><span class="margin"> Choose File</span></h4>
                </div>

        </div>

        <!--=========================input type file change on button ends here====================-->


        <div class="full-width">
            <h1 class="text-center color">Edit Profile Snippet</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="custom-form">
                <div class="text-center bg-form">
                    <div class="img-section">
                        <img src="http://lorempixel.com/200/200/nature/" class="imgCircle" alt="Profile picture">
                        <span class="fake-icon-edit" id="PicUpload" style="color: #ffffff;"><span class="glyphicon glyphicon-camera camera"></span></span>
                    <div class="col-lg-12">
                        <h4 class="text-right col-lg-12"><span class="glyphicon glyphicon-edit"></span> Edit Profile</h4>
                        <input type="checkbox" class="form-control" id="checker">
                    </div>
                    </div>
                    <input type="file" id="image-input" onchange="readURL(this);" accept="image/*" disabled class="form-control form-input Profile-input-file" >
                </div>
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control form-input" value="Abhinit Roy" placeholder="Name" disabled id="name">
                    <span class="glyphicon glyphicon-user input-place"></span>
                </div>
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control form-input" value="rgba@gmail.com" placeholder="Email ID" disabled id="email">
                    <span class="glyphicon glyphicon-envelope input-place"></span>
                </div>
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control form-input" value="+91-00000000" placeholder="Phone Number" disabled id="phone">
                    <span class="glyphicon glyphicon-earphone input-place"></span>
                </div>
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control form-input" value="Chandigarh, India" placeholder="Address" disabled id="place">
                    <span class="glyphicon glyphicon-map-marker input-place"></span>
                </div>
                <div class="col-lg-12 col-md-12 text-center">
                    <button class="btn btn-info btn-lg custom-btn" id="submit" disabled><span class="glyphicon glyphicon-save"></span> Save</button>
                </div>
                </div>
            </div>
        </div>

    </div>
    </div>
        
	</div>
</div>


<!--==================================== sorry I am a newbie in bootsnipp so I am unable to link js to html in bootsnipp thats why I have included the script in html ===================-->

<script>

    $('input[id=base-input]').change(function() {
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });

    <!--==================Javascript code for custom input type file on button ================-->

    $('input[id=main-input]').change(function() {
        console.log($(this).val());
        var mainValue = $(this).val();
        if(mainValue == ""){
            document.getElementById("fake-btn").innerHTML = "Choose File";
        }else{
            document.getElementById("fake-btn").innerHTML = mainValue.replace("C:\\fakepath\\", "");
        }
    });

    <!--=========================input type file change on button ends here====================-->

//    ===================== snippet for profile picture change ============================ //

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.imgCircle')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

//    =================================== ends here ============================================ //

    var checkme = document.getElementById('checker');
    var userImage = document.getElementById('image-input');
    var userName = document.getElementById('name');
    var userPhone = document.getElementById('phone');
    var userEmail = document.getElementById('email');
    var userPlace = document.getElementById('place');
    var UserSend = document.getElementById('submit');
    var editPic = document.getElementById('PicUpload');
    checkme.onchange = function() {
        UserSend.disabled = !this.checked;
        userImage.disabled = !this.checked;
        userName.disabled = !this.checked;
        userPhone.disabled = !this.checked;
        userEmail.disabled = !this.checked;
        userPlace.disabled = !this.checked;
        editPic.style.display = this.checked ? 'block' : 'none';
    };
    </script>
    <style type="text/css">
        .full-width{
    float:left;width:100%;margin-top:30px;min-height:100px;position:relative;
}
.form-style-fake{position:absolute;top:0px;}
.form-style-base{position:absolute;top:0px;z-index: 999;opacity: 0;}
.imgCircle{border-radius: 50%;}
.form-control{padding: 10px 50px;}
.form-input{height:50px;border-radius: 0px;margin-top: 20px;}
.Profile-input-file{
    height:180px;width:180px;left:33%;
    position: absolute;
    top: 0px;
    z-index: 999;
    opacity: 0 !important;
}
.mg-auto{
    margin:0 auto;max-width: 200px;overflow: hidden;
}
.fake-styled-btn{
    background: #006cad;
    padding: 10px;
    color: #fff;
}
#main-input{width:250px;}
.input-place{
    position: absolute;top:35px;left: 20px;font-size:23px;color:gray;}
.margin{margin-top:10px;margin-bottom:10px;}
.truncate {
    width: 250px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.bg-form{
    float:left;width:100%;
    position:relative;
    background: url("http://lorempixel.com/200/200/abstract/");
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 0px;
}
.bg-transparent{
    background: rgba(0,0,0,0.5);float: left;
    width: 100%;margin-top: 0px;
}
.container{
    background: url("http://lorempixel.com/800/800/nature/");
    background-repeat: no-repeat;
    background-size: cover;
}
.custom-form{float: left;width:100%;border-radius: 20px;box-shadow: 0 0 16px #fff;overflow: hidden;
background: rgba(255,255,255,0.6);
}
.img-section{
    float: left;width: 100%;padding-top: 15px;padding-bottom: 15px;background: rgba(0,0,0,0.7);position: relative;
}
.img-section h4{color:#fff;}
#PicUpload{
    color: #ffffff;
    width: 180px;
    height: 180px;
    background: rgba(255,255,255,0.4);
    padding: 100px;
    position: absolute;
    left: 30.5%;
    border-radius: 50%;
    display: none;
    top:15px;
}
.camera{
    font-size: 50px;
    color: #333;
}
.custom-btn{
    margin-top: 15px;
    border-radius: 0px;
    padding: 10px 60px;
    margin-bottom: 15px;
}
#checker{
    opacity: 0;
    position: absolute;
    top: 0px;
    cursor: pointer;
}
.color{
    color:#fff;
}

/*====== style for placeholder ========*/

.form-control::-webkit-input-placeholder {
    color:lightgray;
    font-size:18px;
}
.form-control:-moz-placeholder {
    color:lightgray;
    font-size:18px;
}
.form-control::-moz-placeholder {
    color:lightgray;
    font-size:18px;
}
.form-control:-ms-input-placeholder {
    color:lightgray;
    font-size:18px;
}
    </style>