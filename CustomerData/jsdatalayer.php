<?php


namespace Tealium\Tags\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Tealium\Tags\Model\Cart as GtmCartModel;
use Tealium\Tags\Model\Customer as GtmCustomerModel;

class JsDataLayer implements SectionSourceInterface
{
    /**
     * @var GtmCustomerModel
     */
    protected $gtmCustomer;

    /**
     * @var GtmCartModel
     */
    protected $gtmCart;

    /**
     * @param GtmCustomerModel $gtmCustomer
     * @param GtmCartModel $gtmCart
     */
    public function __construct(
        GtmCustomerModel $gtmCustomer,
        GtmCartModel $gtmCart
    ) {
        $this->gtmCustomer = $gtmCustomer;
        $this->gtmCart = $gtmCart;
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function getSectionData()
    {
        return [
            'customer' => $this->gtmCustomer->getCustomer(),
            'cart' => $this->gtmCart->getCart()
        ];
    }
}
