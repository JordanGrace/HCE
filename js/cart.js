// JavaScript Document

var newNumber;
var pageNum = 1;
var errorCount = 0;
var phoneRegex = /^(\([2-9]|[2-9])(\d{2}|\d{2}\))(-|.|\s)?\d{3}(-|.|\s)?\d{4}$/

jQuery(document).ready(function(){
    jQuery('.ajaxform').submit( function() {
        $.ajax({
            url     : "process/addCartProcess.php",
            type    : $(this).attr('method'),
            dataType: 'json',
            data    : $(this).serialize(),
			error   : console.log('FAILED'),
            success : function( data ) {
				console.log('Sent');
				newNumber = $('#cartNum').html();
				newNumber ++;
				$('#cartNum').html(newNumber);
            	for(var id in data) {
            		jQuery('#' + id).html( data[id] );
				}
			}
        });
        return false;
    });
$('.next').click(function(){validate();});
$('form').submit(function(){validate();});

function validate(){
	switch(pageNum){
		case 1:
			errorCount = 0;
			if($('#fNameBox').val() == ""){$('#fNameBox').addClass("error");errorCount ++;}else{$("#fNameBox").removeClass("error");}
			if($('#uNumber').val() == ""){$('#uNumber').addClass("error");errorCount ++;}else{$("#uNumber").removeClass("error");}
			if($('#addressBox').val() == ""){$('#addressBox').addClass("error");errorCount ++;}else{$("#addressBox").removeClass("error");}
			if($('#cityBox').val() == ""){$('#cityBox').addClass("error");errorCount ++;}else{$("#cityBox").removeClass("error");}
			if($('#zipBox').val() == ""){$('#zipBox').addClass("error");errorCount ++;}else{$("#zipBox").removeClass("error");}
			if($('#stateBox').val() == ""){$('#stateBox').addClass("error");errorCount ++;}else{$("#stateBox").removeClass("error");}
		break;
		case 2:
			errorCount = 0;
			if($('#fNameBox2').val() == ""){$('#fNameBox2').addClass("error");errorCount ++;}else{$("#fNameBox2").removeClass("error");}
			if($('#uNumber2').val() == ""){$('#uNumber2').addClass("error");errorCount ++;}else{$("#uNumber2").removeClass("error");}
			if($('#addressBox2').val() == ""){$('#addressBox2').addClass("error");errorCount ++;}else{$("#addressBox2").removeClass("error");}
			if($('#cityBox2').val() == ""){$('#cityBox2').addClass("error");errorCount ++;}else{$("#cityBox2").removeClass("error");}
			if($('#zipBox2').val() == ""){$('#zipBox2').addClass("error");errorCount ++;}else{$("#zipBox2").removeClass("error");}
			if($('#stateBox2').val() == ""){$('#stateBox2').addClass("error");errorCount ++;}else{$("#stateBox2").removeClass("error");}
		break;
		case 3:
			errorCount = 0;
			if($('#fNameCard').val() == ""){$('#fNameCard').addClass("error");errorCount ++;}else{$("#fNameCard").removeClass("error");}
			if($('#cardNum').val() == ""){$('#cardNum').addClass("error");errorCount ++;}else{$("#cardNum").removeClass("error");}
		break;
	}
	if(errorCount === 0){checked();}
}

function checked(){
	function complete(num){
		pageNum = num;
		if($('#sameInfo').is(':checked')){
			pageNum = 3;
		}
		switch(pageNum){
			case 2:
				$('#part2').fadeIn(500);
				$(document).scrollTop(0);
				$('#typeCheck').html("Billing");
			break;
			case 3:
				$('#part3').fadeIn(500);
				$(document).scrollTop(0);
				$('#typeCheck').html("Card");
			break;
		}
	}
	switch(pageNum){
		case 1:
			$('#part1').fadeOut(500, "linear", complete(2));
		break;
		case 2:
			$('#part2').fadeOut(500, "linear", complete(3));
		break;
		case 3:
			return true;
		break;
	}
};

$('.card').click(
	function(){
	$("#master").removeClass("selected").addClass("notSelected");
	$("#visa").removeClass("selected").addClass("notSelected");
	$("#american").removeClass("selected").addClass("notSelected");
	$("#discover").removeClass("selected").addClass("notSelected");
	$(this).removeClass("notSelected").addClass("selected");		
	}
);

});

