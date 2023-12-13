<script src="{{ asset('/') }}website/assets/js/jquery.js"></script>
<script src="{{ asset('/') }}website/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/tiny-slider.js"></script>
<script src="{{ asset('/') }}website/assets/js/glightbox.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/main.js"></script>
<script src="{{ asset('/') }}website/assets/js/xzoom.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/setup.js"></script>


{{--
<script type="text/javascript">

    $('#searchInput').keyup(function(){
        var searchText = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{route('ajax-search-product')}}",
            data: {searchKey: searchText},
            dataType: "json",
            success: function(response){
                console.log(response);
                // $('#customerEmailError').text(response.message);
                var div = '';

                if(response.length > 0)
                {
                    div += '<section class="trending-product section">';
                        div += '<div class="container">';
                            div += '<div class="row">';
                                $.each(response, function (key, value) {
                                    div += '<div class="col-lg-3 col-md-6 col-12">';
                                        div += '<div class="single-product">';
                                            div += '<div class="product-image">';
                                                div += '<img src="'+value.image+'" alt="#">';
                                                div += '<div class="button">';
                                                    div += '<a href="" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>';
                                                div += '</div>';
                                            div += '</div>';
                                            div += '<div class="product-info">';
                                                div += '<span class="category">{{$product->category->name}}</span>';
                                                div += '<h4 class="title">';
                                                    div += '<a href="{{route('product-detail', ['id'=> $product->id])}}">'+value.name+'</a>';
                                                div += '</h4>';
                                                div += '<div class="price">';
                                                    div += '<span>'+value.selling_price+'</span>';
                                                div += '</div>';
                                            div += '</div>';
                                        div += '</div>';
                                    div += '</div>';
                                })
                            div += '</div>';
                        div += '</div>';
                    div += '</section>';
                }
                else
                {
                    div += '<div class="col-12"><h1>Sorry nothing found</h1></div>';
                }

                $('#ajaxResult').empty();
                $('#ajaxResult').append(div);
            }
        });
    });



</script> --}}

<script type="text/javascript">

    // $('#email').blur(function(){
    //     var email = $(this).val();
    //     console.log(email);
    // });

    function checkCustomerEmail(email) {
        // console.log(email);
        $.ajax({
            type: "GET",
            // url: {{url('/customer-email-check')}},
            url: "{{route('customer-email-check')}}",
            data: {email: email},
            dataType: "json",
            success: function(response){
                // console.log(response);
                $('#customerEmailError').text(response.message);
                if(response.success == false) {
                    $('#confirmBtn').prop('disabled',true);
                }
                else{
                    $('#confirmBtn').prop('disabled',false);
                }
            }
        });
    }



    //========= Hero Slider
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });

    //======== Brand Slider
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1,
            },
            540: {
                items: 3,
            },
            768: {
                items: 5,
            },
            992: {
                items: 6,
            }
        }
    });
</script>
<script>
    const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

    const timer = () => {
        const now = new Date().getTime();
        let diff = finaleDate - now;
        if (diff < 0) {
            document.querySelector('.alert').style.display = 'block';
            document.querySelector('.container').style.display = 'none';
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
        let seconds = Math.floor(diff % (1000 * 60) / 1000);

        days <= 99 ? days = `0${days}` : days;
        days <= 9 ? days = `00${days}` : days;
        hours <= 9 ? hours = `0${hours}` : hours;
        minutes <= 9 ? minutes = `0${minutes}` : minutes;
        seconds <= 9 ? seconds = `0${seconds}` : seconds;

        document.querySelector('#days').textContent = days;
        document.querySelector('#hours').textContent = hours;
        document.querySelector('#minutes').textContent = minutes;
        document.querySelector('#seconds').textContent = seconds;

    }
    timer();
    setInterval(timer, 1000);
</script>
