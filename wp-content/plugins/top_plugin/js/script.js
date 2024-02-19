window.onload = function() {
    document.getElementById("project_categories").click();
};

jQuery(document).ready(function($) {
    $('body').on('click', '.category-link', function(e) {
        e.preventDefault();
        $('.category-link').removeClass('active');
        $(this).addClass('active');
        var category = $(this).data('category');
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'load_projects',
                category: category,
            },
            success: function(response) {
                $('#projects-container').html(response);
            },
        });
    });
});
