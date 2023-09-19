$(() => {
    'use strict'

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select-location').select2({
        minimumInputLength: 0,
        ajax: {
            url: $(this).data('url') || (window.siteUrl + '/ajax/cities'),
            dataType: 'json',
            delay: 250,
            type: "GET",
            data: function (params) {
                return {
                    k: params.term, // search term
                    page: params.page || 1
                };
            },
            processResults: function (data, params) {
                return {
                    results: $.map(data.data[0], function (item) {
                        return {
                            text: item.name,
                            id: item.id,
                            data: item
                        };
                    }),
                    pagination: {
                        more: (params.page * 10) < data.total
                    }
                };
            }
        }
    });

    $('.job-category').select2({
        minimumInputLength: 0,
        ajax: {
            url: $(this).data('url') || (window.siteUrl + '/ajax/categories'),
            dataType: 'json',
            delay: 250,
            type: 'GET',
            data: function (params) {
                return {
                    k: params.term, // search term
                    page: params.page || 1
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data.data[0], function (item) {
                        return {
                            text: item.name,
                            id: item.id,
                            data: item
                        };
                    }),
                    pagination: {
                        more: (params.page * 10) < data.data.total
                    }
                };
            }
        }
    });
})
