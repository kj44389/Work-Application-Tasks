<?php
class InvoiceView
{
    //general render
    public static function render(InvoiceModel $model){

        ob_start();
        ?>
        
            <table border="1">
                <?= self::renderTableHead(); ?>
                <?= self::renderInvoices($model);?>
            </table>
        
        <?php
        $html = ob_get_clean();
        return $html;        
    }
    //helper method for creating head row in table
    public static function renderTableHead(){
        ob_start();
        ?>

        <tr>
            <th>#</th>
            <th colspan="2">Imie i nazwisko nabywcy</th>
            <th colspan="2">Imie i nazwisko sprzedawcy</th>
            <th>NIP nabywcy</th>
            <th>NIP sprzedawcy</th>
            <th>Data dokonania</th>
            <th>Nazwa towaru</th>
            <th>Cena Jednostkowa (zł)</th>
            <th>Ilość</th>
            <th>Rabat (%)</th>
            <th>Wartość Netto (zł)</th>
            <th>VAT (%)</th>
            <th>Wartość Brutto (zł)</th>
            <th>Data dodania</th>
            <th>Opcje</th>
        </tr>
      
        <?php
        $html = ob_get_clean();
        return $html;
    }
    //generates view using helper function 
    private static function renderInvoices($model){
        $invoiceModel = $model;
        //get records from database and create array of Invoice obcjects.
        $invoices = $invoiceModel->select();

        ob_start();
        //create html with object data
        $i = 1;
        foreach ($invoices as &$invoice) {
            self::renderHTMLRow($invoice , $i);
            $i++;
        }
        $html = ob_get_clean();
        return $html;
    }
    //creates html filled with invoice data (database record)
    public static function renderHTMLRow(Invoice &$invoice, int $id){
        echo" <tr>
            <th>".$id."</th>
            <td colspan='2'>".$invoice->getBuyerName()." ".$invoice->getBuyerSurname()."</td>
            <td colspan='2'>".$invoice->getSellerName()." ".$invoice->getSellerSurname()."</td>
            <td>".$invoice->getBuyerNIP()."</td>
            <td>".$invoice->getSellerNIP()."</td>
            <td>".$invoice->getDateOfMaking()."</td>
            <td>".$invoice->getName()."</td>
            <td>".$invoice->getUnitPrice()."</td>
            <td>".$invoice->getQuantity()."</td>
            <td>".$invoice->getDiscount()."</td>
            <td>".$invoice->getNetValue()."</td>
            <td>".$invoice->getVatValue()."</td>
            <td>".$invoice->getGrossValue()."</td>
            <td>".$invoice->getAddDate()."</td>
            <td><form method='POST'><input type='submit' value='usun' name='delete'> <input type='hidden' class='hidden' name='counter' value='invoice-".$invoice->getID()."'></form></td></tr>";
            //this line creates mini forms which enables to take each row counter value when submit clicked.
    }
}
