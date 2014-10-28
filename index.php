<!DOCTYPE html>
<!--[if lt IE 7] >
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <! [endif]-->
<!-- [if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!-- [if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8] >
<html class="no-js">
<! [endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta content="stuff, to, help, search, engines, not" name="keywords">
    <meta content="What this page is about." name="description">
    <meta content="An Interesting Title Goes Here" name="title">
    <link rel="stylesheet" href="core-v3/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="core-v3/fonts/open-sans/stylesheet.css"/>
    <link rel="stylesheet" href="core-v3/fonts/fontawesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="adv_kiosks/style.css"/>
    <!-- <link rel="stylesheet" href="fonts/open-sans/stylesheet.css"/> -->
    <script src="modernizr.js"></script>

</head>

<?php
require_once './rfid.php';
$id = new rfid(2);
//echo $_POST['card_number'];
if (isset($_POST['card_number'])):
$id->add_count($_POST['card_number']);
endif;
?>
<body>
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="page">
    <header>
        <div class="container-fluid">
            <!--<div class="atlas pull-left">-->
            <!--<a href="#"><img src="images/csflorida-kiosk.png"></a>-->
            <!--</div>-->

        </div>
    </header>
    <section id="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="vtable">
                        <div class="table-cell">

                            <div id="kiosk-nav" class="row">
                                <div class="col-md-12">
                                    <ul class="kiosk-nav pull-right">
                                        <!-- <li class=""><i class="fa fa-flag"></i>  Español</li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h1 class="panel-title"><i class="fa fa-arrow-circle-o-right"></i> Atlas RFID Attendance Tracker

                                        <a href="http://" class="pull-right">
                                        <!-- <i class="fa fa-question-circle"></i>  -->
                                        </a>
                                        </h1>
                                </div>
                                <div class="panel-body text-center">
                                    <div class="row">
                                        <!--<div class="atlas pull-left">-->
                                        <!--<a href="#"><img src="images/csflorida-kiosk.png"></a>-->
                                        <!--</div>-->
                                        <!--<div class="atlas navbar-right">-->
                                        <!--<img src="images/powered-by-atlas.png" alt="atlas logo"/>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="page-header">
                                        <a href="#">
                                            <!-- <img src="images/csf_reversed.png"> -->
<?php //echo $this->Html->image('theme/adv_kiosks/csf_reversed.png');?>
</a>
                                        <h1>Welcome to the Florida Workforce Summit </h1>
                                        <p>Please place your card on the RFID reader, located on the right.</p>

                                    </div>
                                    <div class="well-off">
                                        <div class="">
                                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="badge">

                                                <div class="form-group col-md-12">
                                                    <label for=""><p></p></label>
                                                    <input type="password" class="form-control" id="card_number" name="card_number" placeholder="Please place your Conference ID on the card-reader (Right) " autofocus>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <input type="hidden" name="kiosk_number" value="<?php echo $id->kiosk_number?>">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <input type="hidden" name="attendee_count" value="<?php echo $id->attendee_count?>"/>

                                                </div>


<!--
                                                <p><button class="btn btn-success btn-lg" type="submit" role="button"><i class="fa fa-unlock-alt"></i> Login Here</button> <a
                                                        href="http://#" class="btn btn-info btn-lg">
                                                    <i class="fa fa-check-circle"></i>  I'd prefer to login with License or ID
                                                </a>
                                                </p>-->

                                            </form>
                                        </div>
                                    </div>

<div class="powered-by">
                                        <p><a href="#" class="btn btn-info"><i class="fa fa-flag"></i>  &copy; 2014 Powered by Atlas</a> </p>

                                    </div>


                                </div>
                                <!--<div class="panel-footer">Powered By Atlas </div>-->
                            </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <nav class="navbar navbar-fixed-bottom">
<?php if (isset($_POST['card_number'])):?>
<div class="alert alert-success" data-dismiss="alert">Welcomeattendee, you have been successfully registered for this seminar.
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>

<?php endif;?>
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--<div class="atlas pull-right">-->
                            <!--Powered by atlas-->
                            <!--&lt;
!&ndash;
<a href="#"><img src="images/powered-by-atlas.png" alt="atlas logo"/></a>&ndash;
&gt;
-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </nav>

    </footer>
</div>
<!-- /container -->
<script src="jquery.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- inject:js -->

<script src="bootstrap.min.js"></script>
<!-- endinject-->

<script>
$(".alert").alert();
window.setTimeout(function() { $(".alert").alert('close'); }, 3000);

</script>

<script>
$(document).ready(function(){



    $('#card_number').keyup(function () {
        ///$('#message').val( this.value.length );
        if (this.value.length == 8) {
            $('#badge').submit();
        }
    });

    $( "#card_number" ).focus();
});
</script>
</body>
</html>
