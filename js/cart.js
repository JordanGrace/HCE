// JavaScript Document

var newNumber;
var pageNum = 1;

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
	
$('.next').click(function(){
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
	}
});

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

