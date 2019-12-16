<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../PHP/Style.php/LoginAdmin.scss" media="print" />
    <?php
    include_once "Content/_header.html";
    ?>
    <title>Image viewer no print</title>
</head>

<body>
    <img src="../Files/FilesSended/1.png" alt="Image" width="100%" height="100%" style="
            height: 100vh;
            width: 100%;
            object-fit: contain;
        ">
</body>

<?php
include_once "Content/_scripts.html";
?>

<script>
    setInterval('return false;',1); 

    document.oncontextmenu = new Function('return false');

    if ('matchMedia' in window) {
        // Chrome, Firefox, and IE 10 support mediaMatch listeners
        window.matchMedia('print').addListener(function(media) {
            if (media.matches) {
                beforePrint();
            } else {
                // Fires immediately, so wait for the first mouse movement
                $(document).one('mouseover', afterPrint);
            }
        });
    } else {
        // IE and Firefox fire before/after events
        $(window).on('beforeprint', beforePrint);
        $(window).on('afterprint', afterPrint);
    }

    function beforePrint() {
        $("body").hide();
        // $(".PrintMessage").show();
    }

    function afterPrint() {
        // $(".PrintMessage").hide();
        $("body").show();
    }

    $(document).keyup(function(e) {
        return false;
    });

    $('img').on('dragstart', function(event) {
        event.preventDefault();
    });
</script>

</html>