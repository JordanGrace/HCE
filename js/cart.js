// JavaScript Document

var newNumber;



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
});