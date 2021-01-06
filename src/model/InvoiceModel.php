<?php
class InvoiceModel
{
    private $connect = null;
    //model Constructor
    public function __construct(){
    }
    //method for select records from database
    public function select()
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "SELECT * FROM invoices";
            $stmt = $this->connect->prepare($sql);
            $result = $stmt->execute();

            $Invoices = array();
            //fill invoices array with invoice objects filled with data from database records. 
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $Invoice = new Invoice();
                $Invoice->setID($row['id'])
                        ->setBuyerName($row['buyer-name'])
                        ->setBuyerSurname($row['buyer-surname'])
                        ->setSellerName($row['seller-name'])
                        ->setSellerSurname($row['seller-surname'])
                        ->setBuyerNIP($row['buyer-nip'])
                        ->setSellerNIP($row['seller-nip'])
                        ->setDateOfMaking($row['date-of-making'])
                        ->setName($row['name'])
                        ->setUnitPrice(floatval($row['unit-price']))
                        ->setQuantity($row['quantity'])
                        ->setDiscount(floatval($row['discount']))
                        ->setNetValue(floatval($row['net-value']))
                        ->setVatValue(floatval($row['vat-value']))
                        ->setGrossValue(floatval($row['gross-value']))
                        ->setAddDate($row['add-date']);
                array_push($Invoices, $Invoice);
            }
            return $Invoices;
        } catch (PDOException $e) {
            var_dump( $e->getMessage());
        }
    }
    //delete (id) record from database 
    public function delete(int $id)
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "DELETE FROM invoices WHERE id = :id";
            $stmt = $this->connect->prepare($sql);
            $stmt ->bindParam(":id",$id,PDO::PARAM_INT);
            $result = $stmt->execute();

        } catch (PDOException $e) {
            var_dump( $e->getMessage());
        }
    }
    //insert record to database with data from form
      public function insert(Invoice $Invoice)
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "INSERT INTO Invoices VALUES (:id, :BuyerName, :BuyerSurname, :SellerName, :SellerSurname, :BuyerNIP, :SellerNIP, :DateOfMaking, :Name, :UnitPrice, :Quantity, :Discount, :NetValue, :VatValue, :GrossValue, :AddDate)";
            $stmt = $this->connect->prepare($sql);

            $currentDate = new DateTime();
            $result = $stmt->execute(array(
              'id' => "",
              'BuyerName' => $Invoice->getBuyerName(),
              'BuyerSurname' => $Invoice->getBuyerSurname(),
              'SellerName' => $Invoice->getSellerName(),
              'SellerSurname' => $Invoice->getSellerSurname(),
              'BuyerNIP' => $Invoice->getBuyerNIP(),
              'SellerNIP' => $Invoice->getSellerNIP(),
              'DateOfMaking' => $Invoice->getDateOfMaking(),
              'Name' => $Invoice->getName(),
              'UnitPrice' => $Invoice->getUnitPrice(),
              'Quantity' => $Invoice->getQuantity(),
              'Discount' => $Invoice->getDiscount(),
              'NetValue' => $Invoice->getNetValue(),
              'VatValue' => $Invoice->getVatValue(),
              'GrossValue' => $Invoice->getGrossValue(),
              'AddDate' => $currentDate->format('Y-m-d')
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
