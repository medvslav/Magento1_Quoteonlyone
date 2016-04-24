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
 * News1 module install script
 *
 * @category    Medvslav
 * @package     Medvslav_Quoteonlyone
 * @author      Medved Yaroslav
 */

$installer = new Mage_Sales_Model_Resource_Setup('core_setup');
$installer->startSetup();
$entities = array(
    'quote',
    'quote_address',
    'quote_item',
    'quote_address_item',
    'order',
    'order_item'
);
$options = array(
    'type'     => Varien_Db_Ddl_Table::TYPE_SMALLINT,
    'visible'  => true,
    'required' => false
);
foreach ($entities as $entity) {
    $installer->addAttribute($entity, 'quoteonlyone', $options);
}
$installer->endSetup();