<?php
namespace cointopay_cc\Merchant;

use cointopay_cc\Cointopay_Cc;
use cointopay_cc\Merchant;

class Order extends Merchant
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public static function createOrFail($params, $options = array(), $authentication = array())
    {
        $order = Cointopay_Cc::request('orders', 'GET', $params, $authentication);
        return new self($order);
    }
	public static function ValidateOrder($params, $options = array(), $authentication = array())
    {
        $order = Cointopay_Cc::request('validation', 'GET', $params, $authentication);
        return new self($order);
    }

    public function toHash()
    {
        return $this->order;
    }

    public function __get($name)
    {
        return $this->order[$name];
    }
}