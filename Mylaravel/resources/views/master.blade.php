<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="source/img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cake - Bakery</title>
    <base href="{{ asset('') }}" >


    <!-- Icon css link -->
    <link href="source/css/font-awesome.min.css" rel="stylesheet">
    <link href="source/vendors/linearicons/style.css" rel="stylesheet">
    <link href="source/vendors/flat-icon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="source/css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="source/vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="source/vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="source/vendors/revolution/css/navigation.css" rel="stylesheet">
    <link href="source/vendors/animate-css/animate.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="source/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="source/vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">

    <link href="source/css/style.css" rel="stylesheet">
    <link href="source/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('header')
<!--================ Slider Area =================-->
<!--================End Slider Area =================-->
@yield('content')

<!--=============footer============-->
@include('footer')







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="source/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="source/js/popper.min.js"></script>
<script src="source/js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="source/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="source/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="source/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="source/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="source/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="source/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="source/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<!-- Extra plugin js -->
<script src="source/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="source/vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
<script src="source/vendors/datetime-picker/js/moment.min.js"></script>
<script src="source/vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
<script src="source/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="source/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="source/vendors/lightbox/simpleLightbox.min.js"></script>

<script src="source/js/theme.js"></script>
</body>

</html>
