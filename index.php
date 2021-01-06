<?php 
require_once __DIR__ . './autoload.php';
?>

<html>
    <head>
        <meta charset='utf-8'>
        <title>Invoices</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='./styles/style.css'>
        <script src='./scripts/script.js'></script>
    </head>
    <body>
        <div class='container'> 
            <form class='add-invoice-form' method='POST'>
                <label class='input-group-label'>Imie i nazwisko nabywcy</label>
                <div class='input-group'> 
                    <input type='text' placeholder='Imie Nabywcy' name='buyer-name'>
                    <input type='text' placeholder='Nazwisko Nabywcy' name='buyer-surname'>
                </div>

                <label class='input-group-label'>Imie i nazwisko sprzedawcy</label>
                <div class='input-group'>
                    <input type='text' placeholder='Imie Sprzedawcy' name='seller-name'>
                    <input type='text' placeholder='Nazwisko Sprzedawcy' name='seller-surname'> 
                </div>

                <label class='input-group-label'>NIP nabywcy</label>
                <div class='input-group'>
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='4' min='1000' max='9999' placeholder='0000' name='buyer-nip-part1'> -
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='3' min='100' max='999' placeholder='000' name='buyer-nip-part2'> -
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='2' min='10' max='99'placeholder='00' name='buyer-nip-part3'> -
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='2' min='10' max='99'placeholder='00' name='buyer-nip-part4'> 
                </div>

                <label class='input-group-label'>NIP sprzedawcy</label>
                <div class='input-group'>
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='4' min='1000' max='9999' placeholder='0000' name='seller-nip-part1'> -
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='3' min='100' max='999' placeholder='000' name='seller-nip-part2'> -
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='2' min='10' max='99' placeholder='00' name='seller-nip-part3'> -
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='2' min='10' max='99' placeholder='00' name='seller-nip-part4'> 
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
                    <input type='number' step='0.01' placeholder='10.15' name='unit-price'>
                </div>

                <label class='input-group-label'>Ilość sprzedanych towarów / usług</label>
                <div class='input-group'>
                    <input type='number' placeholder='10' name='quantity'>
                </div>

                <label class='input-group-label'>Rabat (%)</label>
                <div class='input-group'>
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='3' min='0' max='100' step='1' placeholder='10' name='discount'>
                </div>

                <label class='input-group-label'>Wartość Netto (zł)</label>
                <div class='input-group'>
                    <input type='number' step='0.01' placeholder='91.35' name='net-value'>
                </div>

                <label class='input-group-label'>VAT (%)</label>
                <div class='input-group'>
                    <input type='number' oninput='maxLengthCheck(this)' maxlength='3' min='1' max='100' step='1' placeholder='23' name='vat-value'>
                </div>

                <label class='input-group-label'>Wartość Brutto (zł)</label>
                <div class='input-group'>
                    <input type='number' step='0.01' placeholder='112.36' name='gross-value'>
                </div>
                <div class='input-group'>
                    <input type='submit' name='form-submit' value='Dodaj Fakture'>
                </div>
            </form>
            <?php
                try{
                    //if submit from miniforms is clicked delete this row from database
                    if(isset($_POST['delete'])){
                        //get invoice id by explode value of hidden input
                        $pieces = explode('-', $_POST['counter']);
                        //error when second piece isnt a int
                        if(!Validation::sanitizeInt($pieces[1])){
                            throw new Exception('Wrong invoice id!');
                        }
                        //then delete record from database
                        InvoiceController::deleteInvoice(intval($pieces[1]));
                    }
                    if(isset($_POST['form-submit'])){
                        if(!empty($_POST)){
                            $data = $_POST;
                            // check each data in dataset
                            foreach ($data as $key => $value) {
                                if (empty($value)) {
                                    throw new Exception('All fields must be filled!');
                                }
                                //sanitize and validate data if false was returned throw an exception
                                if(Validation::checkData($key,$value)){
                                    //replace $value with sanitized data
                                    $data[$key] = Validation::checkData($key,$value);
                                }
                                else{
                                    throw new Exception('Given data are invalid!');
                                }
                            }
                            InvoiceController::insertInvoice($data);
                        }
                        else{
                            throw new Exception('Given data are invalid!');
                        }
                    }
                }
                catch(Exception $e){
                    echo "<div class='error-message'>".$e->getMessage()."</div>";
                }
            ?>
            <div class='show-invoices'>
                <?= InvoiceController::renderInvoices(); ?>
               
            </div>
        </div>
        <script>
            //to prevent submit on refresh
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>
