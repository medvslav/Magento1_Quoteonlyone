<?php
/**
 * Medvslav_Quoteonlyone extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Medvslav
 * @package        Medvslav_Quoteonlyone
 * @copyright      Copyright (c) 2015
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Frontend observer
 *
 * @category    Medvslav
 * @package     Medvslav_Quoteonlyone
 * @author      Medved Yaroslav
 */
class Medvslav_Quoteonlyone_Model_Observer
{

    
    public function checkQuoteonlyone(Varien_Event_Observer $observer)
    {
        $quote = new stdClass();
        $quote = $observer->getEvent()->getQuote();        
        $this->_checkItem($quote);       

    }
    

    
    public function quoteonlyoneToItem(Varien_Event_Observer $observer) 
    {
        $items = $observer->getItems();
        foreach($items as $item){
            $product = $item->getProduct();
            $item->setQuoteonlyone($product->getQuoteonlyone());            
        }       
        
        return $this;
    }
    
    public function checkQuoteonlyoneCheckout(Varien_Event_Observer $observer)
    {
        $quote = new stdClass();
        $quote = Mage::getSingleton('checkout/session')->getQuote();       
        if($this->_checkItem($quote)){ 
            Mage::app()->getResponse()->setRedirect(Mage::getUrl('checkout/cart'))->sendResponse();
        }    
    }
    
    
    protected function _checkItem($quote){
        
        $valueQuoteonlyone = 0;
        $quoteonlyoneTrue = false;
        $strProductsQuoteonlyone = '';
        $numberItems = 0;
        
        foreach ($quote->getAllVisibleItems() as $item) {
            $valueQuoteonlyone = $item->getQuoteonlyone();
            
            if($valueQuoteonlyone == 1){                
                $quoteonlyoneTrue = true;
                $strProductsQuoteonlyone .= ' "'.$item->getName().'",';
            }
            
            $numberItems++;
        }
                
        if(($quoteonlyoneTrue === true) and ($numberItems > 1)){
            $strProductsQuoteonlyone = rtrim($strProductsQuoteonlyone,",");
            
            $textBlock = strip_tags(Mage::app()->getLayout()->createBlock('cms/block')->setBlockId('block_quoteonlyone')->toHtml());
            
            $quote->setHasError(true);
            $quote->addErrorInfo(
                'error',
                'checkout',
                null,
                Mage::helper('checkout')->__($textBlock, $strProductsQuoteonlyone),
                null
            ); 
            
            return true;
        }
        
        return false;
    }
    
}
