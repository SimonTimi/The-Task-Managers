<?php
class product {
    //All product attributes
    private $product_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $image;

    //Make setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    //Make getters
    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getImage() {
        return $this->image;
    }
}
?>
