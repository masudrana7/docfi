jQuery(document).ready(function ($) {
    $('#custom-search-form').on('submit', function (event) {
        event.preventDefault();
        var category = $('#category-select').val();
        var search_term = $('#search-input').val();
        $.ajax({
            url: customSearch.ajaxurl,
            type: 'POST',
            data: {
                action: 'custom_search_results',
                category: category,
                search_term: search_term
            },
            success: function (response) {
                // Handle the response, update the search results area on the page
            }
        });
    });
});