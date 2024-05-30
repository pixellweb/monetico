<?php

namespace PixellWeb\Monetico\Kit\Request;

/**
 * Represents the "contexte_commande" field content.
 * See technical documentation for a full explanation of each field and the format to use
 */
class OrderContext implements \JsonSerializable
{
    /**
     * @var OrderContextBilling
     */
    private $orderContextBilling;

    /**
     * @var ?OrderContextClient
     */
    private $orderContextClient;

    /**
     * @var ?OrderContextShipping
     */
    private $orderContextShipping;

    /**
     * @var ?OrderContextShoppingCart
     */
    private $orderContextShoppingCart;

    /**
     * OrderContext constructor.
     *
     * @param ?OrderContextBilling $billing
     */
    public function __construct($billing)
    {
        $this->setOrderContextBilling($billing);
    }

    public function jsonSerialize()
    {
        return array_filter([
            'billing' => $this->getOrderContextBilling(),
            'client' => $this->getOrderContextClient(),
            'shipping' => $this->getOrderContextShipping(),
            'shoppingCart' => $this->getOrderContextShoppingCart()
        ], function ($value) {
            return !is_null($value);
        });
    }

    /**
     * @return \PixellWeb\Monetico\Kit\Request\OrderContextBilling
     */
    public function getOrderContextBilling(): \PixellWeb\Monetico\Kit\Request\OrderContextBilling
    {
        return $this->orderContextBilling;
    }

    /**
     * @param \PixellWeb\Monetico\Kit\Request\OrderContextBilling $orderContextBilling
     */
    public function setOrderContextBilling(\PixellWeb\Monetico\Kit\Request\OrderContextBilling $orderContextBilling): void
    {
        $this->orderContextBilling = $orderContextBilling;
    }

    /**
     * @return \PixellWeb\Monetico\Kit\Request\OrderContextClient|null
     */
    public function getOrderContextClient(): ?\PixellWeb\Monetico\Kit\Request\OrderContextClient
    {
        return $this->orderContextClient;
    }

    /**
     * @param \PixellWeb\Monetico\Kit\Request\OrderContextClient|null $orderContextClient
     */
    public function setOrderContextClient(?\PixellWeb\Monetico\Kit\Request\OrderContextClient $orderContextClient): void
    {
        $this->orderContextClient = $orderContextClient;
    }

    /**
     * @return \PixellWeb\Monetico\Kit\Request\OrderContextShipping|null
     */
    public function getOrderContextShipping(): ?\PixellWeb\Monetico\Kit\Request\OrderContextShipping
    {
        return $this->orderContextShipping;
    }

    /**
     * @param \PixellWeb\Monetico\Kit\Request\OrderContextShipping|null $orderContextShipping
     */
    public function setOrderContextShipping(?\PixellWeb\Monetico\Kit\Request\OrderContextShipping $orderContextShipping): void
    {
        $this->orderContextShipping = $orderContextShipping;
    }

    /**
     * @return \PixellWeb\Monetico\Kit\Request\OrderContextShoppingCart|null
     */
    public function getOrderContextShoppingCart(): ?\PixellWeb\Monetico\Kit\Request\OrderContextShoppingCart
    {
        return $this->orderContextShoppingCart;
    }

    /**
     * @param \PixellWeb\Monetico\Kit\Request\OrderContextShoppingCart|null $orderContextShoppingCart
     */
    public function setOrderContextShoppingCart(?\PixellWeb\Monetico\Kit\Request\OrderContextShoppingCart $orderContextShoppingCart): void
    {
        $this->orderContextShoppingCart = $orderContextShoppingCart;
    }
}

?>