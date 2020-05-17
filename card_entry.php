<?php include 'security.php' ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Pay</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/card/1.3.1/js/card.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html, charset=iso-8859-1">
</head>

<body>
<div class="container">

    <form onsubmit="formValidate()" action="https://testsecureacceptance.cybersource.com/silent/pay" id="paymentForm"
          method="post">

        <?php
        foreach ($_REQUEST as $name => $value) {
            $params[$name] = $value;
        }
        ?>
        <?php
        foreach ($params as $name => $value) {
            echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
        }
        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
        ?>

        <div class="container-fluid grid">

            <div class="row pull-center">
                <div class="col-md-4">

                    <div class="well">

                        <div class="row card">
                        </div>

                        <br/>

                        <div class="row-fluid">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Credit Card Number </label>
                                    <input type="text" value="" name="card_number"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Expiration</label>

                                    <input type="text" placeholder="MM-YYYY" value="" name="card_expiry_date"
                                           class="form-control"/>

                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <!--                            <div class="col-md-8">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label>Name</label>-->
                            <!--                                    <input type="text" value="Full name" name="name" class="form-control"/>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <div class="col-md-4">
                                <div class="form-group">

                                    <label>CVV </label>
                                    <input type="text" value="100" name="card_cvn" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-info">Clear</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
<script type="text/javascript">
    var cardHolder = new Card({
        form: 'form',
        container: '.card',
        formSelectors: {
            numberInput: 'input[name=card_number]',
            expiryInput: 'input[name=card_expiry_date]',
            cvcInput: 'input[name=card_cvn]',
            nameInput: 'input[name=name]'
        },
        width: 390, // optional ? default 350px
        formatting: true,
        placeholders: {
            number: '???? ?????? ??????',
            name: '',
            expiry: '??-????',
            cvc: '???'
        }
    })

    function formValidate() {
        document.getElementsByName("card_number")[0].value = document.getElementsByName("card_number")[0].value.split(" ").join("")
        document.getElementsByName("card_expiry_date")[0].value = document.getElementsByName("card_expiry_date")[0].value.split(" ").join("").replace("\/", "-")
        document.getElementById("card_type").value = cardHolder.cardType == "visa" ? "001": "002";
    }
</script>
</html>
