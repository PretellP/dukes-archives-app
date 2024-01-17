$(function () {
    var isAuthenticated = '{{ Auth::check() }}';

    if (isAuthenticated) {
        actualizarContador();

        $('.add-to-wishlist').on('click', function (e) {
            e.preventDefault();
            var url = $(this).data('url');

            
            $.ajax({
                method: 'POST',
                url: url,
                dataType: 'json',
                success: function (data) {
                    actualizarContador();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    }

    function actualizarContador() {
        var url = '{{ route("home.wishlist.count") }}';

        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                var wishlistCount = data.count;
                $('.wishlist-count').text(wishlistCount);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});
