$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $(".add-field", $(this)).click(function(e) {
	    // get total rows for new id in form
        var newfieldscount = $('.multi-field').length;

        // find and copy new fild
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();

        // change name of new row with input fields
        $('.multi-field:last-child', $wrapper).find('input').each(function(){
            var $newname = $(this).attr('name').replace(/\[[0-9]+\]/g, '['+newfieldscount+']');
            $(this).attr('name', $newname);
        });

    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field').length > 1)
            $(this).parent('.multi-field').remove();
    });
});

// jquery for ids fields

$('.multi-field-wrapper2').each(function() {
    var $wrapper2 = $('.multi-fields2', this);
    $(".add-field2", $(this)).click(function(e) {
	    // get total rows for new id in form
        var newfieldscount2 = $('.multi-field2').length;

        // find and copy new fild
        $('.multi-field2:first-child', $wrapper2).clone(true).appendTo($wrapper2).find('input').val('').focus();

        // change name of new row with input fields
        $('.multi-field2:last-child', $wrapper2).find('input').each(function(){
            var $newname2 = $(this).attr('name').replace(/\[[0-9]+\]/g, '['+newfieldscount2+']');
            $(this).attr('name', $newname2);
        });

    });
    $('.multi-field2 .remove-field2', $wrapper2).click(function() {
        if ($('.multi-field2').length > 1)
            $(this).parent('.multi-field2').remove();
    });
});
