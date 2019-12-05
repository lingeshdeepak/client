function deletefn(){
    if(confirm("Are you sure ,do you want to delete the selected details ")){
        alert("Slected detail is deleted");
        return true;
    }
    else{
        return false;
    }
}

function closeFunc() {
	$('.close').parent().css("display", "none");
}

function selectimage() {
	if ($('.selectimage').is(":checked"))
      $("#check").css("visibility", "visible");
    else
      $("#check").css("visibility", "hidden");
}
  
function imgView(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function (e) {
        $('#image1')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
}




var viewclient;
$(document).ready( function () {
   
    viewclient=$('#viewtable').DataTable({
        processing: true,
        serverSide: true,
        order:[], 
        lengthMenu: [[5, 10, 25,100, -1], [5, 10, 25,100, "All"]],
        ajax: {
            url: "get_allclient",
            type: 'POST'
        },
        columnDefs: [{
            targets: [9],
            orderable: false,
            searchable: false
        },
    ],
    });


$("#image").blur(function(){
    var image = $('#image').val().split('.').pop().toLowerCase();
    var format=[];
    format.push('gif', 'jpg', 'png', 'jpeg');
    if(image){
        if ($.inArray(image,format) == -1){ 
            $(".errimage1").css("display", "inline");
            return false;
        }
        else {
            $(".errimage1").css("display", "none");
           return true;
        }
    }
});

    

    var CheckEmail; 
    var CheckCompany;
$('#companyname').focusout(function() {
    var companyname = $('#companyname').val();
    if (companyname != '') {
        $.ajax({
            url: "check_companyname_exists",
            type: "POST",
            data: {
                companyname: companyname
            },
            success: function(response) {
                if (response == false) {
                    CheckCompany = false;
                    $(".errcompany1").css("display", "inline");
                } else {
                    CheckCompany = true;
                    $(".errcompany1").css("display", "none");
                }
            }
        });
    }
});

$('#email').focusout(function() {
    var email = $('#email').val();
    if (email != '') {
        $.ajax({
            url: "check_email_exists",
            type: "POST",
            data: {
                email: email
            },
            success: function(response) {
                if (response == false) {
                    CheckEmail = false;
                    $(".erremail1").css("display", "inline");
                } else {
                    CheckEmail = true;
                    $(".erremail1").css("display", "none");
                }
            }
        });
    }
});


$("#addclient").submit(function(){
    var image = $('#image').val().split('.').pop().toLowerCase();

    //client name
    if ($("#clientname").val() < 1) {
        $(".errname").css("display", "inline");
    } 
    else {
    $(".errname").css("display", "none");
    
    }
    
    //company name
    if ($("#companyname").val() < 1) {
            $(".errcompany").css("display", "inline");
    }
    else {
            $(".errcompany").css("display", "none");
    }

    //phonenumber
    if ($("#phonenumber").val() < 1) {
        $(".errphone").css("display", "inline");
	}
	else if(!$("#phonenumber").val().match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)){
		$(".errphone").css("display", "inline");
        $(".errphone").css("value", "");
        $(".errphone").html("Enter a valid Phone Number!");
	}
    else {
        $(".errphone").css("display", "none");
       
    }

    //email
    if ($("#email").val() < 1) {
            $(".erremail").css("display", "inline");
    }
    else if (!$("#email").val().match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
        $(".erremail").css("display", "inline");
        $(".erremail").css("value", "");
        $(".erremail").html("Enter a valid Email Address!");
      }
    else {
        $(".erremail").css("display", "none");
    }

    //address
    if ($("#address").val() < 1) {
        $(".erraddress").css("display", "inline");
    }
    else {
        $(".erraddress").css("display", "none");
    }

    //country
    if ($("#country").val() < 1) {
        $(".errcountry").css("display", "inline");
    }
    else {
        $(".errcountry").css("display", "none");
    }

    //postalcode
    if ($("#postalcode").val() < 1) {
        $(".errpostal").css("display", "inline");
	}
	else if (!$("#postalcode").val().match(/^\d{6}$/)) {
        $(".errpostal").css("display", "inline");
        $(".errpostal").css("value", "");
        $(".errpostal").html("Postal code is invalid! Maximum 6 digits");
      }
    else {
        $(".errpostal").css("display", "none");
    }

    //state
    if ($("#state").val() < 1) {
        $(".errstate").css("display", "inline");
    }
    else {
        $(".errstate").css("display", "none");
    }

    //city
    if ($("#city").val() < 1) {
        $(".errcity").css("display", "inline");
    }
    else {
        $(".errcity").css("display", "none");
    }
    //image
    if (image == '') {
        $(".errimage2").css("display", "inline");
        return false;
      
    }
	else if ($("#clientname").val() =="" || $("#companyname").val()==""|| 
	$("#email").val() =="" || !$("#email").val().match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)||  
	!$("#phonenumber").val().match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)||$("#phonenumber").val() =="" ||
	$("#country").val() =="" ||$("#state").val() =="" ||$("#city").val() =="" ||
	$("#postalcode").val() =="" ||!$("postalcode").val().match(/^\d{6}$/) ||$("#address").val() ==""||
    $('.errimage1').css('display') =='inline' || $('.errimage2').css('display')== 'inline') {
		
		$(".errimage2").css("display", "none");
        return false;
    }
    else {
        return true;
    }
});


$("#editClient").submit(function(){

    var checked;
    if ($("input[type=checkbox]").is(":checked")) {
            checked = 1;
    }
    else {
            checked = 0;
    }
    var image = $('#image').val().split('.').pop().toLowerCase();

    //client name
    if ($("#clientname").val() < 1) {
        $(".errname").css("display", "inline");
    } 
    else {
    $(".errname").css("display", "none");
    
    }
    
    //company name
    if ($("#companyname").val() < 1) {
            $(".errcompany").css("display", "inline");
    }
    else {
            $(".errcompany").css("display", "none");
    }

    //phonenumber
    if ($("#phonenumber").val() < 1) {
        $(".errphone").css("display", "inline");
	}
	else if(!$("#phonenumber").val().match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)){
		$(".errphone").css("display", "inline");
        $(".errphone").css("value", "");
        $(".errphone").html("Enter a valid Phone Number!");
	}
    else {
        $(".errphone").css("display", "none");
        
    }

    //email
    if ($("#email").val() < 1) {
            $(".erremail").css("display", "inline");
    }
    else if (!$("#email").val().match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
        $(".erremail").css("display", "inline");
        $(".erremail").css("value", "");
        $(".erremail").html("Enter a valid Email Address!");
        }
    else {
        $(".erremail").css("display", "none");
    }

    //address
    if ($("#address").val() < 1) {
        $(".erraddress").css("display", "inline");
    }
    else {
        $(".erraddress").css("display", "none");
    }

    //country
    if ($("#country").val() < 1) {
        $(".errcountry").css("display", "inline");
    }
    else {
        $(".errcountry").css("display", "none");
    }

    //postalcode
    if ($("#postalcode").val() == " ") {
        $(".errpostal").css("display", "inline");
	}
	else if (!$("#postalcode").val().match(/^\d{6}$/)) {
        $(".errpostal").css("display", "inline");
        $(".errpostal").css("value", "");
        $(".errpostal").html("Postal code is invalid! Maximum 6 digits");
        return false;
    }
    else {
        $(".errpostal").css("display", "none");
    }

    //state
    if ($("#state").val() < 1) {
        $(".errstate").css("display", "inline");
    }
    else {
        $(".errstate").css("display", "none");
    }

    //city
    if ($("#city").val() < 1) {
        $(".errcity").css("display", "inline");
    }
    else {
        $(".errcity").css("display", "none");
    }
    
    if (checked==1 && image == '') {
        $(".errimage2").focusout().css("display", "inline");
        return false;
    }
    else if ($('.errimage1').css('display') =='inline' || checked==1 && image == '' ||$("#clientname").val() =="" || $("#companyname").val()==""
    || $("#email").val() =="" || !$("#email").val().match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)|| 
	$("#phonenumber").val() =="" ||!$("#phonenumber").val().match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)||
    $("#postalcode").val() =="" ||!$("postalcode").val().match(/^\d{6}$/) ||
    $("#country").val() =="" ||$("#state").val() =="" ||$("#city").val() =="" || $("#address").val() =="") {
 
        return false;
    }
    else {
      
        return true;
    }
});

$('#changepassword').submit(function(){
        
    if ($("#newpassword").val() < 1) {
        $(".errpassword").css("display", "inline");
    }
    else {
        $(".errpassword").css("display", "none");
    }

    if ($("#confirmpassword").val() < 1) {
        $(".errconfirmpassword").css("display", "inline");
    }
    else {
    $(".errconfirmpassword").css("display", "none");
    }
    
    if ($("#newpassword").val() != $("#confirmpassword").val()) {
        $(".errconfirmpassword1").css("display", "inline");
    } else {
        $(".errconfirmpassword1").css("display", "none");
    }
    
        
    if($("#newpassword").val() < 1 || $("#confirmpassword").val() < 1 || $("#newpassword").val() != $("#confirmpassword").val()){
        return false;
    }
    else{
        return true;
    }
});


});
