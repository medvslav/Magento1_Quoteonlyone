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
 /*
 * @category    Medvslav
 * @package     Medvslav_Quoteonlyone
 * @author      Medved Yaroslav
 */

$attrData = array(
    'quoteonlyone'=> 0,
);
$storeId = 0;
$productIds = Mage::getModel('catalog/product')->getCollection()->getAllIds();
Mage::getModel("catalog/product_action")->updateAttributes(
    $productIds, 
    $attrData, 
    $storeId
);

if(Mage::getModel('cms/block')->load('block_quoteonlyone', 'identifier')){    
    Mage::getModel('cms/block')->load('block_quoteonlyone', 'identifier')->delete();
}

$content = 'Sorry, chosen product (%s) can be purchased alone. Please remove other products ';

$block = Mage::getModel('cms/block');
$block->setTitle('For the error of module "Quote only one"');
$block->setIdentifier('block_quoteonlyone');
$block->setStores(array(0));
$block->setIsActive(1);
$block->setContent($content);
$block->save();