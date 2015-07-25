function photo(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#photo").change(function(){
    photo(this);
});
function sign(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#signature_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#signature").change(function(){
    sign(this);
});


//calculating marks %

$('#dip_percent, #12_percent, #10_percent').focusin(function(){
	var id = $(this).attr('id');
	var par = id.split('_')[0];
	
	var score = $("#"+par+"_marks").val();
	var total = $("#"+par+"_total").val();
	if($.trim(score).length >0 && $.trim(total).length>0){
	 if(total<score){
	 	alert("Oh hello are we idiot here");
	 }else{
		var percent =  (score*100)/total;
		$("#"+id).val(percent.toFixed(2));
		}
	}else{
		alert("First Enter the marks obtained and total marks");
	}
	
});

$('#mobile, #roll, #rank, #dip_marks, #12_marks, #10_marks, #dip_total, #12_total, #10_totalm, #f_mobile, #m_mobile').keyup(function(){
	var value = $(this).val();
	var name = $(this).attr('placeholder');
	if(!$.isNumeric(value) && $.trim(value).length >0){
		alert("Invalid " + name);
	}
});
