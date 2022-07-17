<?php
namespace App\models;

use PDO;

class DVD extends Product
{
    public static function getProducts($where = "productType = 'DVD'", $order = "'SKU'")
    {
        return (new Database('products'))->select($where, $order)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getProduct($SKU)
    {
        return (new Database("products"))->select("SKU = $SKU")->fetchObject(static::class);
    }

    public function createAttribute($data)
    {
        $this->productAttribute = $data['size'];
    }

    public function remove()
    {
        return (new Database('products'))->delete("SKU = '{$this->SKU}'");
    }

    public function attributeString(): string
    {
        return "Size: $this->productAttribute MB";
    }
}