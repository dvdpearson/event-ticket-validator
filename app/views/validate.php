<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Event Ticket Validator</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link href="/css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="container">
    <div id="main" role="main">
        <div>
        <?php if (isset($ticket['isitin']) && !$ticket['isitin'] && $ticket['sexe'] !== "") { ?>
            <p class="valid">#<?php echo $ticket['id']; ?> VALID</p>
            <p class="sex <?php echo $ticket['sexe']; ?>"><?php
                switch ($ticket['sexe']) {
                    case 'F':
                        echo "LADY";
                        break;
                    case 'M':
                        echo "GENTLEMAN";
                        break;
                    case 'U':
                        echo "UNISEX";
                        break;
                }
                ?></p>
            <?php if (isset($linkedticket['id'])) { ?>
                <p>
                    <span style="font-size: 26px;">Linked ticket</span><br />
                    #<?php echo $linkedticket['id']; ?>, <?php
                    switch ($linkedticket['sexe']) {
                        case 'F':
                            echo "LADY";
                            break;
                        case 'M':
                            echo "GENTLEMAN";
                            break;
                        case 'U':
                            echo "UNISEX";
                            break;
                    }
                    ?>
                </p>
            <?php } ?>
            <p><?php echo $ticket['name']; ?></p>
            <p><?php echo $ticket['address']; ?></p>
            <form action="/validate/<?php echo $ticket['id'] ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>" />
                <input class="markbutton" type="submit" name="validate" value="MARK AS ENTERED" />
            </form>
        <?php } else if(!isset($ticket['id']) || empty($ticket['sexe'])) { ?>
            <p class="invalid">#<?php echo $ticket['id']; ?> INVALID</p>
        <?php } else { ?>
            <p class="invalid">#<?php echo $ticket['id']; ?> ENTERED</p>
            <p>Enter time: <?php echo $ticket['scantime']; ?></p>
            <p class="sex <?php echo $ticket['sexe']; ?>"><?php
                switch ($ticket['sexe']) {
                    case 'F':
                        echo "LADY";
                        break;
                    case 'M':
                        echo "GENTLEMAN";
                        break;
                    case 'U':
                        echo "UNISEX";
                        break;
                }
                ?></p>
            <p><?php echo $ticket['name']; ?></p>
            <p><?php echo $ticket['address']; ?></p>
            <form action="/validate/<?php echo $ticket['id'] ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>" />
                <input class="markbutton" type="submit" name="unvalidate" value="RELEASE TICKET" />
            </form>
        <?php } ?>
        </div>
        <br /><br /><br /><br /><br />
        <div>
            <form action="/validate/1" method="post">
                Ticket ID:<input type="text" name="ticketid" class="ticketid" value="<?php echo $ticket['id']; ?>" />
                <input class="searchid" type="submit" name="search" value="SEARCH" />
            </form>
        </div>
    </div>
</div> <!--! end of #container -->

<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>