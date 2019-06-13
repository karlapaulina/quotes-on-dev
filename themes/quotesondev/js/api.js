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
                console.log(response);
                $('.quotes-container p').addClass('quote-content');

                let x = 0
                for (x = 0; x < response.length; x++) {
                    const quote = response[x].content.rendered
                    const author = response[x].title.rendered
                    $('.quote-content').empty()
                    $('.author-title').empty()
                    $('.quote-content').append(quote)
                    $('.author-title').append(author)
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





});

