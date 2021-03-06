<?php

class Aoe_FraudManager_Resource_BlacklistRule_Collection extends Aoe_FraudManager_Resource_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('Aoe_FraudManager/BlacklistRule');
    }

    public function filterValidForOrder(Mage_Sales_Model_Order $order)
    {
        $this->addFieldToFilter('is_active', '1');
        $this->addFieldToFilter('website_ids', array('finset' => $order->getStore()->getWebsiteId()));
        $this->addOrder('sort_order', 'DESC');

        return $this;
    }
}
