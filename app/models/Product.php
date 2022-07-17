<?php
namespace App\models;

abstract class Product
{
    public $SKU;
    public $Name;
    public $Price;
    public $productType;
    public $productAttribute;

    public function create()
    {
        $db = new Database("products");
        $db->insert([
            "SKU" => $this->SKU,
            "Name" => $this->Name,
            "Price" => $this->Price,
            "productType" => $this->productType,
            "productAttribute" => $this->productAttribute
        ]);

        return true;
    }

    public function edit($oldSKU)
    {
        $db = new Database("products");
        $db->update('SKU = ' . $oldSKU, [
            "SKU" => $this->SKU,
            "Name" => $this->Name,
            "Price" => $this->Price,
            "productType" => $this->productType,
            "productAttribute" => $this->productAttribute
        ]);

        return true;
    }

    abstract public static function getProducts($where = null, $order = null);

    abstract public static function getProduct($SKU);

    abstract public function createAttribute($data);

    abstract public function remove();

    abstract public function attributeString(): string;
}