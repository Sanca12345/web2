<?php
require_once '../model/Products.php';

class ProductsController
{
    private $productsModel;

    public function __construct()
    {
        $this->productsModel = new Products;
        
        

    }

    
    public function displayRequestedData($data = null)
    {
        if (empty($data['filterInput'])) 
        {
           $output =  $this->productsModel->GetAllData();
           
            
        }else
        {
            $output = $this->poductsModel->FindDataWithInput($data['filterInput']);
           
        }
        return $output;
    }





}