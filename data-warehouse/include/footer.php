    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-info">
                        <h3>Information</h3>
                    </div>
                    <ul>
                        <li><a href="about.html">About us</a></li>
                        <li><a href="#">Delivery information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Sales</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="footer-info">
                        <h3>Account</h3>
                    </div>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">My orders</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Shipping</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="footer-info">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="address">
                        <p>If you have any question. please contact us <a href="#">demo@example.com</a></p>
                    </div>
                    <div class="address-info">
                        <p><a href="#"><i class="fa fa-map-marker"></i>Your address goes here. 123, Address</a></p>
                        <p><a href="#"><i class="fa fa-phone"></i>+ 0 129 456 789</a> </p>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- footer -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            //document.getElementById("header").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            //document.getElementById("header").style.marginLeft= "0";
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $(".sales .owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: true,
                responsive: {
                    0: {
                        items: 4
                    },
                    1000: {
                        items: 4
                    },

                }
            });
            $(".cart .owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: true,
                responsive: {
                    0: {
                        items: 4
                    },
                    1000: {
                        items: 4
                    },

                }
            });
        });

        $('.mynav-next').click(function() {
                $(".owl-carousel").trigger('next.owl.carousel');
            })
            // Go to the previous item
        $('.mynav-prev').click(function() {
            $(".owl-carousel").trigger('prev.owl.carousel');
        })
    </script>

</body>

</html>