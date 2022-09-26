<?php
require('./login/include/database.php');
require('./login/include/function.php');


?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css" />
</head>

<body>
  <?php
        include_once('./pages/navbar.php')
    ?>

  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/IndiaFlagwithcutmlogo.jpg'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Teacher</span></p>
          <h1 class="mb-3 bread">Teacher</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Our Teacher</h2>
            </div>
        </div>
        <div class="row">
            
        <?php
            $getTeacher=getAllTeacher($db);          
            foreach($getTeacher as $Teacherdetails){
        ?>
            <div class="col-lg-4 mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="d-flex mb-4">
                        <div class="img"
                            style="background-image:url(./login/teacher/image/<?=$Teacherdetails['profileimage']?>)"></div>
                        <div class="info ml-4">
                            <h3><a href="teacher-single.html"><?=$Teacherdetails['name']?></a></h3>
                            
                        </div>
                    </div>
                    <div class="text">
                        <p><?=$Teacherdetails['bio']?></p>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>




            
        </div>
    </div>
</section>

    <?php
        include_once('./pages/footer.php')
    ?>

  <script src="js/jquery.min.js"></script>
    <script
        src="js/allJS.js">
    </script>
    <script>
        eval(mod_pagespeed_yJcZTFCy07);
    </script>
    <script>
        eval(mod_pagespeed_tRhwxd_GDa);
    </script>
    <script>
        eval(mod_pagespeed_C$EFYKfnsx);
    </script>
    <script>
        eval(mod_pagespeed_j$kXc7ZYep);
    </script>
    <script
        src="js/page.js">
    </script>
    <script>
        eval(mod_pagespeed_0aitHLLxbb);
    </script>
    <script>
        eval(mod_pagespeed_Cfilealf9i);
    </script>
    <script>
        eval(mod_pagespeed_1MdMv5ZwHn);
    </script>
    <script>
        eval(mod_pagespeed_RboFAinz$k);
    </script>
    <script
        src="js/animate.js">
    </script>
    <script>
        eval(mod_pagespeed_4PscXD2pde);
    </script>
    <script>
        eval(mod_pagespeed_S63p4FLTx0);
    </script>
    <script>
        eval(mod_pagespeed_0XU20vWMf_);
    </script>
    <script>
        eval(mod_pagespeed_BLFEO5Bu$e);
    </script>
    <script>
        eval(mod_pagespeed_BswWZZVj6j);
    </script>
    
    </script>
    <script>
        eval(mod_pagespeed_5$wuGPXagN);
    </script>
    <script src="js/main.js"></script>

    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"73f592b3af076c90","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>