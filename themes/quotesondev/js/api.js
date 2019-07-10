$(document).ready(function () {

    $('#quote-btn').on('click', function (event) {

        event.preventDefault();

        $.ajax({

            'url': 'http://localhost:8888/lessons/quoteDev/wp-json/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
            // all of your POST/GET variables
            'data': {
                // 'dataname': $('input').val(), ...
            },
            // you may change this to GET, if you like...
            'type': 'GET',
            // the kind of response that you want from the server

            'beforeSend': function () {
                // anything you want to have happen before sending the data to the server...
                // useful for "loading" animations
            }
        })
            .done(function (response) {

                $('.quotes-container p:first-of-type').addClass('quote-content');

                let x = 0
                for (x = 0; x < response.length; x++) {
                    const quote = response[x].content.rendered
                    const author = response[x].title.rendered
                    let source = response[x]._qod_quote_source
                    let sourceURL = response[x]._qod_quote_source_url;

                    $('.quote-content').empty()
                    $('.author-title').empty()
                    $('.author-source-link').empty()
                    $('.quote-content').append(quote)
                    $('.author-title').append(author)
                    $('.author-source-link').append('<a href ="' + sourceURL + '">' + source + '</a>')
                }
            })
            .fail(function (code, status) {
                // what you want to happen if the ajax request fails (404 error, timeout, etc.)
                // 'code' is the numeric code, and 'status' is the text explanation for the error
                // I usually just output some fancy error messages
            })
            .always(function (xhr, status) {
                // what you want to have happen no matter if the response is success or error
                // here, you would "stop" your loading animations, and maybe output a footer at the end of your content, reading "done"
            });
    });


    $('input[type = "submit"]').on('click', function (event) {

        event.preventDefault();

        $.ajax({

            'url': 'http://localhost:3000/lessons/quoteDev/wp-json/wp/v2/posts',
            // all of your POST/GET variables
            'data': {
                title: $('input[type = text][name = author]').val(),
                content: $('input[type = text][name = quote]').val(),
                _qod_quote_source: $('input[type = text][name = quote-source]').val(),
                _qod_quote_source_url: $('input[type = url][name = quote-source-url]').val(),
                // 'dataname': $('input').val(), ...
            },
            // you may change this to GET, if you like...
            'type': 'POST',
            // the kind of response that you want from the server

            'beforeSend': function (xhr) {
                // anything you want to have happen before sending the data to the server...
                // useful for "loading" animations
                xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
            }
        })
            .done(function (response) {

            })
            .fail(function (code, status) {
                // what you want to happen if the ajax request fails (404 error, timeout, etc.)
                // 'code' is the numeric code, and 'status' is the text explanation for the error
                // I usually just output some fancy error messages
            })
            .always(function (xhr, status) {
                // what you want to have happen no matter if the response is success or error
                // here, you would "stop" your loading animations, and maybe output a footer at the end of your content, reading "done"
            });
    });




});

