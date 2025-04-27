<?php
class payment {
    //All payment attributes
    private $payment_id;
    private $order_id;
    private $payment_method;
    private $payment_status;
    private $payment_placed;

    //Setters
    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function setPaymentMethod($payment_method) {
        $validMethods = ['credit_card', 'paypal', 'bank_transfer'];
        if (in_array($payment_method, $validMethods)) {
            $this->payment_method = $payment_method;
        } else {
            $this->payment_method = 'credit_card'; // fallback default
        }
    }

    public function setPaymentStatus($payment_status) {
        $validStatuses = ['pending', 'completed', 'failed', 'refunded'];
        if (in_array($payment_status, $validStatuses)) {
            $this->payment_status = $payment_status;
        } else {
            $this->payment_status = 'pending'; // fallback default
        }
    }

    //Getters
    public function getOrderId() {
        return $this->order_id;
    }

    public function getPaymentMethod() {
        return $this->payment_method;
    }

    public function getPaymentStatus() {
        return $this->payment_status;
    }
}
?>