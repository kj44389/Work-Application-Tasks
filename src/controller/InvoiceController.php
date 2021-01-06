<?php

class InvoiceController
{
    //method for delete invoice record from database
    public static function deleteInvoice(int $id){
        $invoice = new InvoiceModel();
        $invoice->delete($id);
    }
    //method for insert invoice record to database
    public static function insertInvoice(array $data){
        $invoice = new Invoice();
        $model = new InvoiceModel();
        //fill invoice with data from form
        $invoice->setBuyerName($data['buyer-name'])
                ->setBuyerSurname($data['buyer-surname'])
                ->setSellerName($data['seller-name'])
                ->setSellerSurname($data['seller-surname'])
                ->setBuyerNIP($data['buyer-nip-part1']."-".$data['buyer-nip-part2']."-".$data['buyer-nip-part3']."-".$data['buyer-nip-part4']) // create string by joining all nip parts. 
                ->setSellerNIP($data['seller-nip-part1']."-".$data['seller-nip-part2']."-".$data['seller-nip-part3']."-".$data['seller-nip-part4'])
                ->setDateOfMaking($data['date-of-making'])
                ->setName($data['name'])
                ->setUnitPrice(floatval($data['unit-price']))
                ->setQuantity($data['quantity'])    
                ->setDiscount(floatval(($data['discount']/100))) // create equivalent in float version 23% = 0.23
                ->setNetValue(floatval($data['net-value']))
                ->setVatValue(floatval(($data['vat-value']/100)))
                ->setGrossValue(floatval($data['gross-value']));
        $model->insert($invoice);
    }
    //method for show records from database
    public static function renderInvoices(){   
        echo InvoiceView::render(new InvoiceModel());
    }

}