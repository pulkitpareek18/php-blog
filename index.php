<!DOCTYPE html>
<html lang="en">
<!-- main html index home file -->
<?php include "activities/variables.php" ?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/utils.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/mobile.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>css/videos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>iBlog</title>
    <link rel="shortcut icon" href="<?php echo $home_url; ?>img/logo.png" type="image/x-icon">
</head>
<style>
    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none
    }
    
    .pace-inactive {
        display: none
    }
    
    .pace .pace-progress {
        background: #ff000d;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 3px
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>

<body>
    <?php include "includes/header_official.php" ?>
    <div class="max-width-1 m-auto">
        <hr>
    </div>
    <div class="m-auto content max-width-1 my-2">
        <div class="content-left">
            <h2>
                <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />

                <span class="anim-typewriter txt-rotate" data-period="2000" data-rotate='[ "Welcome to iBlog.", "You can explore here", "videos.", "articles etc.", "and increase your knowledge" ]'></span>

            </h2>

            <p>iBlog is a website where you can watch various types of courses for free and also be updated by reading blogs!</p>
            <p>My Halloween decorations are staying in the box this year. To be honest, they didn’t make it out of the box last year either. My Halloween spirit has officially been bludgeoned to death by teenagers who no longer care and a persistent October
                fear of the Northern California wildfires. And speaking of fear, isn’t there more than enough of that going around? Maybe all of us can pretend that Halloween isn’t even happening this year?</p>
        </div>
        <div style="width:100%" class="content-right">
            <img src="img/home.svg" alt="iBlog">
        </div>

    </div>
    <div class=" text-center ">
        <a href="/blog/blog.php" style="color: white;" class="button home-buttons btn-danger">Browse Blog</a>
        <a href="/blog/video.php" style="color: white;" class="button home-buttons btn-success">Browse Video Tutorials</a>
        <a id="contact" href=" /blog/contact.php " style="color: white; " class="button home-buttons btn-primary ">Contact Us</a>
    </div>
    <div class="max-width-1 m-auto ">
        <hr>
    </div>
    <div class="home-articles max-width-1 m-auto font2 ">




        <style>
            .wrap {
                height: min-content;
            }
            
            @keyframes blinkTextCursor {
                from {
                    border-right-color: rgba(0, 0, 0);
                }
                to {
                    border-right-color: transparent;
                }
            }
            
            .wrap {
                animation: blinkTextCursor 250ms infinite normal;
            }
        </style>

        <script>
            var TxtRotate = function(el, toRotate, period) {
                this.toRotate = toRotate;
                this.el = el;
                this.loopNum = 0;
                this.period = parseInt(period, 10) || 2000;
                this.txt = '';
                this.tick();
                this.isDeleting = false;
            };

            TxtRotate.prototype.tick = function() {
                var i = this.loopNum % this.toRotate.length;
                var fullTxt = this.toRotate[i];

                if (this.isDeleting) {
                    this.txt = fullTxt.substring(0, this.txt.length - 1);
                } else {
                    this.txt = fullTxt.substring(0, this.txt.length + 1);
                }

                this.el.innerHTML = '<span class="wrap ">' + this.txt + '</span>';

                var that = this;
                var delta = 300 - Math.random() * 100;

                if (this.isDeleting) {
                    delta /= 2;
                }

                if (!this.isDeleting && this.txt === fullTxt) {
                    delta = this.period;
                    this.isDeleting = true;
                } else if (this.isDeleting && this.txt === '') {
                    this.isDeleting = false;
                    this.loopNum++;
                    delta = 500;
                }

                setTimeout(function() {
                    that.tick();
                }, 108);
            };

            window.onload = function() {
                var elements = document.getElementsByClassName('txt-rotate');
                for (var i = 0; i < elements.length; i++) {
                    var toRotate = elements[i].getAttribute('data-rotate');
                    var period = elements[i].getAttribute('data-period');
                    if (toRotate) {
                        new TxtRotate(elements[i], JSON.parse(toRotate), period);
                    }
                }
                // INJECT CSS
                var css = document.createElement("style");
                css.type = "text/css ";
                css.innerHTML = ".txt-rotate> .wrap { border-right: 0.16em solid #666 }";
                document.body.appendChild(css);
            };
        </script>


        <div class="container">





        </div>

    </div>

    </div>

    <div class="footer-video ">

        <br>
        <p>Copyright &copy; iBlog.com </p>


    </div>
</body>

</html>