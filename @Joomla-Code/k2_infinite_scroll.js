// need to include jscroll.js on the site for this to work

jQuery(function($) {

    $('#k2Container').jscroll({
        loadingHtml: '<h3 class="ivm-k2-loading"><span>Loading Articles</span></h3>',
        padding: 20,
        nextSelector: '.pagination-next > a.pagenav:last',
        contentSelector: '#k2Container'
    });

});
