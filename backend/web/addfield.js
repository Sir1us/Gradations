/*
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
    var $counter = 1;
    $(".add-field2", $(this)).click(function(e) {
	    // get total rows for new id in form

        // find and copy new fild
        $('.multi-field2:first-child', $wrapper2).clone(true).appendTo($wrapper2).find('input').val('').focus();
        $('.multi-field2:last-child', $wrapper2).find('input').each(function(){
            var $newname2 = $(this).attr('name').replace(/\[[0-9]+\]/g, '['+$counter+']');
            $(this).attr('name', $newname2);
            $counter++;
        });

    });
    $('.multi-field2 .remove-field2', $wrapper2).click(function() {
        if ($('.multi-field2').length > 1) {
            $(this).parent('.multi-field2').remove();
        }

    });
});


// jquery for sum fields

$('.multi-field-wrapper3').each(function() {
    var $wrapper3 = $('.multi-fields3', this);
    $(".add-field3", $(this)).click(function(e) {
	    // get total rows for new id in form
        var newfieldscount3 = $('.multi-field3').length;

        // find and copy new fields
        $('.multi-field3:first-child', $wrapper3).clone(true).appendTo($wrapper3).find('input, select').val('').focus();


                // change name of new row with input and select fields
            $('.multi-field3:last-child', $wrapper3).find('input, select').each(function () {
                var $newname3 = $(this).attr('name').replace(/\[[0-9]+\]/g, '[' + newfieldscount3 + ']');
                $(this).attr('name', $newname3);
            });


    });
    $('.multi-field3 .remove-field3', $wrapper3).click(function() {
        if ($('.multi-field3').length > 1)
            $(this).parent('.multi-field3').remove();
    });
});


*/
