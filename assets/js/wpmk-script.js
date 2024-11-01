jQuery(document).ready(function($) {
    
    var $btns = $('.wpmk-portfolio-filters').click(function() {
        if (this.id == 'wpmk-show-all-portfolio') {
            $('#wpmk-portfolio-items-container > div').fadeIn(1000);
        }else {
            var $el = $('.' + this.id).fadeIn(1000);
            $('#wpmk-portfolio-items-container > div').not($el).hide();
        }
        $btns.removeClass('wpmk-active-portfolio');
        $(this).addClass('wpmk-active-portfolio');
    })
    
});