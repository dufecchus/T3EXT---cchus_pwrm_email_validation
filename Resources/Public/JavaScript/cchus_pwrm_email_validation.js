window.onload = function() {
    if (window.jQuery) {
        $(function() {
            $('[id$="___cchus_pwrm_email_validation"]').each(function(i,o){
                var pid = $('#'+$(o).attr("id").substring(0, $(o).attr("id").length - '___cchus_pwrm_email_validation'.length)).attr('id');
                $(this).attr('data-parsley-equalto','#'+pid).attr('data-parsley-error-message', $(this).attr('data-parsley-custom200'));
            });
        });
    } else {
        console.error('jQuery isn\'t loaded and is mandatory for frontend validation. Only backend validation will be available.');
    }
}