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
        <form action="/validate/1" method="post">
            Ticket ID:<input type="text" name="ticketid" class="ticketid" value="<?php echo $ticket['id']; ?>" />
            <input class="searchid" type="submit" name="search" value="SEARCH" />
        </form>
        <?php if (isset($ticket['isitin']) && !$ticket['isitin'] && $ticket['transaction_id'] !== "") { ?>
            <p class="valid">VALID</p>
            <p class="sex <?php echo $ticket['sexe']; ?>"><?php echo ($ticket['sexe']=="F"?"LADY":"GENTLEMAN"); ?></p>
            <?php if (isset($linkedticket['id'])) { ?>
                <p>
                    <span style="font-size: 26px;">Linked ticket</span><br />
                    #<?php echo $linkedticket['id']; ?>, <?php echo ($ticket['sexe']=="F"?"LADY":"GENTLEMAN"); ?>
                </p>
            <?php } ?>
            <p><?php echo $ticket['name']; ?></p>
            <p><?php echo $ticket['address']; ?></p>
            <form action="/validate/<?php echo $ticket['id'] ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>" />
                <input class="markbutton" type="submit" name="validate" value="MARK AS ENTERED" />
            </form>
        <?php } else if(!isset($ticket['id']) || empty($ticket['transaction_id'])) { ?>
            <p class="invalid">INVALID</p>
        <?php } else { ?>
            <p class="invalid">ENTERED</p>
            <p>Enter time: <?php echo $ticket['scantime']; ?></p>
            <p class="sex <?php echo $ticket['sexe']; ?>"><?php echo ($ticket['sexe']=="F"?"LADY":"GENTLEMAN"); ?></p>
            <p><?php echo $ticket['name']; ?></p>
            <p><?php echo $ticket['address']; ?></p>
            <form action="/validate/<?php echo $ticket['id'] ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>" />
                <input class="markbutton" type="submit" name="unvalidate" value="RELEASE TICKET" />
            </form>
        <?php } ?>
    </div>
</div> <!--! end of #container -->

<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>