<?php
class order {
    //All order class attributes
    private $order_id;
    private $user_id;
    private $total_price;
    private $status;
    private $order_created;

    //Set functions
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setTotalPrice($total_price) {
        $this->total_price = $total_price;
    }

    public function setStatus($status) {
        $validStatuses = ['pending', 'shipped', 'delivered', 'cancelled'];
        if (in_array($status, $validStatuses)) {
            $this->status = $status;
        } else {
            $this->status = 'pending'; // default fallback
        }
    }

    //Get functions
    public function getUserId() {
        return $this->user_id;
    }

    public function getTotalPrice() {
        return $this->total_price;
    }

    public function getStatus() {
        return $this->status;
    }
}
?>