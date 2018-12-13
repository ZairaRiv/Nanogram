<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="stylin.css" />
        <!-- needed for stencil font in nav bar-->
        <link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
        <style>
                /** Since this is only needed for this page, not gonna move to a sep CSS sheet**/
                .outer {
                        display: table;
                        width: 100%;
                        height: 400px;
                        border: 1px solid red;
                        /* to help see the edge */
                }

                .inner {
                        display: table-cell;
                        align-content: center;
                        text-align: center;
                        vertical-align: middle;
                        text-align: center;
                }

                .video-container {
                        position: relative;
                        padding-bottom: 56.25%;
                        padding-top: 30px;
                        height: 0;
                        overflow: hidden;
                        text-align: center;
                }

                .video-container iframe,
                .video-container object,
                .video-container embed {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 55%;
                        height: 55%;
                }
        </style>
</head>

<body>
    <!-- navbar file to include-->
    <?php include 'navbar.php'; ?>


        <div class="outer">
                <div class="inner">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/DjcUW4h7Zxo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
        </div>

</body>

</html>