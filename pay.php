<html>
<head>

    <title>Signed Data Fields</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>

<body>
<?php
$refId = uniqid();

$orderAmount = 100;

?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Billing Details - Rs. <?=$orderAmount?></h1>
            <form id="payment_form" class="form" action="card_entry.php" method="post">
                <input type="hidden" name="amount" value="<?php echo $orderAmount ?>" size="25"><br/>
                <input type="hidden" name="access_key" value="38baa9cb5c8e35b2bcd66ad895370010">
                <input type="hidden" name="profile_id" value="5DA31508-F4F1-4263-8C80-B7104923B3C4">
                <input type="hidden" name="transaction_uuid" value="<?php echo $refId ?>">
                <input type="hidden" name="signed_field_names"
                       value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code">
                <input type="hidden" name="unsigned_field_names" value="card_type,card_number,card_expiry_date,card_cvn">
                <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
                <input type="hidden" name="locale" value="en">

                <input type="hidden" name="card_type" value="001">
                <input type="hidden" name="transaction_type" value="authorization" size="25">
                <input type="hidden" name="currency" size="25" value="inr">
                <input type="hidden" value="<?php echo $refId ?>" name="reference_number" size="25">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="firstName" name="bill_to_forename"
                               placeholder="First name">

                    </div>


                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="surname" name="bill_to_surname"
                               placeholder="Last name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" id="email" name="bill_to_email"
                               placeholder="Email">
                    </div>

                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="phone" name="bill_to_phone"
                               placeholder="Phone number">
                    </div>
                </div>

                <div class="form-group">
                    <label for="paymentMethod">Payment Method</label>
                    <select name="payment_method" class="form-control" id="paymentMethod">
                        <option value="card">Card</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="surName">Address</label>
                    <input type="text" class="form-control" id="paymentmethod" name="bill_to_address_line1"
                           placeholder="Address">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" placeholder="City" name="bill_to_address_city" class="form-control"
                               id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" placeholder="City" name="bill_to_address_state" class="form-control"
                               id="bill_to_address_state">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input name="bill_to_address_postal_code" type="text" class="form-control" id="inputZip">
                    </div>
                </div>


                <div class="form-group">
                    <label for="bill_to_address_country">Country</label>
                    <input type="text" class="form-control" id="bill_to_address_country"
                           name="bill_to_address_country"
                           placeholder="Country">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</div>


</body>

</html>
