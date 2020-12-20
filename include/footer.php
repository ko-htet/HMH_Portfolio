</div>
            </div>
        </div>
    </section>
    <section id="skill" class="container-fluid bg-secondary mt-5 py-5">
        <div class="container">
            <section class="customer-logos slider">
                <div class="slide">
                    <a href=""><img src="bootstrap/images/1.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/2.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/3.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/4.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/5.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/6.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/7.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/8.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/9.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/10.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/11.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/12.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/13.png" class="img-fluid"></a>
                </div>
                <div class="slide">
                    <a href=""><img src="bootstrap/images/14.png" class="img-fluid"></a>
                </div>
            </section>
        </div>
    </section>
    <section>
        <div class="container-fluid Nav text-center text-info py-3">
            <h5>Design By Han Min Htet.</h5>
        </div>
    </section>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/toastr.min.js"></script>
    <script src="bootstrap/js/axios.min.js"></script>
    <script src="bootstrap/js/slick.js"></script>
    <script src="bootstrap/js/custom.js"></script>
    <script>
        $("#search_pro").keyup(function(){
            var key = $(this).val();
            axios.post(`search.php?key=${key}`)
                .then(function(res){
                    document.getElementById('search_res').innerHTML = res.data;
                })
        })
    </script>
</body>
</html>