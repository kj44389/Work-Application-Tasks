<?php 
/*
* TO DO
* validation
* join posision to invoice
* join number and date to invoice
*/
require_once __DIR__ . './autoload.php';
        //if submit from miniforms is clicked delete this row from database
        if(isset($_POST['delete'])){
            //get invoice id by explode value of hidden input
            $pieces = explode("-", $_POST['counter']);
            InvoiceController::deleteInvoice(intval($pieces[1]));
        }
        if(isset($_POST['form-submit'])){
            InvoiceController::insertInvoice($_POST);
        }


?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoices</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./styles/style.css">
        <script src='./scripts/script.js'></script>
    </head>
    <body>
        <div class='container'> 
            <form class='add-invoice-form' method="POST">
                <label class='input-group-label'>Imie i nazwisko nabywcy</label>
                <div class='input-group'> 
                    <input type='text' placeholder="Imie Nabywcy" name='buyer-name'>
                    <input type='text' placeholder="Nazwisko Nabywcy" name='buyer-surname'>
                </div>

                <label class='input-group-label'>Imie i nazwisko sprzedawcy</label>
                <div class='input-group'>
                    <input type='text' placeholder="Imie Sprzedawcy" name='seller-name'>
                    <input type='text' placeholder="Nazwisko Sprzedawcy" name='seller-surname'> 
                </div>

                <label class='input-group-label'>NIP nabywcy</label>
                <div class='input-group'>
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="4" min='1' max='9999' placeholder="0000" name='buyer-nip-part1'> -
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="3" min='1' max='999' placeholder="000" name='buyer-nip-part2'> -
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="2" min='1' max='99'placeholder="00" name='buyer-nip-part3'> -
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="2" min='1' max='99'placeholder="00" name='buyer-nip-part4'> 
                </div>

                <label class='input-group-label'>NIP sprzedawcy</label>
                <div class='input-group'>
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="4" min='1' max='9999' placeholder="0000" name='seller-nip-part1'> -
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="3" min='1' max='999' placeholder="000" name='seller-nip-part2'> -
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="2" min='1' max='99' placeholder="00" name='seller-nip-part3'> -
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="2" min='1' max='99' placeholder="00" name='seller-nip-part4'> 
                </div>

                <label class='input-group-label'>data dokonania</label>
                <div class='input-group'>
                    <input type='date' name='date-of-making'>
                </div>

                <label class='input-group-label'>nazwa towaru / usługi</label>
                <div class='input-group'>
                    <input type='text' name='name'>
                </div>

                <label class='input-group-label'>Cena jednostkowa (zł) </label>
                <div class='input-group'>
                    <input type='number' step="0.01" placeholder="10.15" name='unit-price'>
                </div>

                <label class='input-group-label'>Ilość sprzedanych towarów / usług</label>
                <div class='input-group'>
                    <input type='number' placeholder="10" name='quantity'>
                </div>

                <label class='input-group-label'>Rabat (%)</label>
                <div class='input-group'>
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="3" min='1' max='100' step="1" placeholder="10" name='discount'>
                </div>

                <label class='input-group-label'>Wartość Netto (zł)</label>
                <div class='input-group'>
                    <input type='number' step="0.01" placeholder="91.35" name='net-value'>
                </div>

                <label class='input-group-label'>VAT (%)</label>
                <div class='input-group'>
                    <input type='number' oninput="maxLengthCheck(this)" maxlength="3" min='1' max='100' step="1" placeholder="23" name='vat-value'>
                </div>

                <label class='input-group-label'>Wartość Brutto (zł)</label>
                <div class='input-group'>
                    <input type='number' step="0.01" placeholder="112.36" name='gross-value'>
                </div>
                <div class='input-group'>
                    <input type='submit' name='form-submit' value='Dodaj Fakture'>
                </div>
            </form>
            <div class='show-invoices'>
                <?= InvoiceController::renderInvoices(); ?>
            </div>
        </div>
    </body>
</html>