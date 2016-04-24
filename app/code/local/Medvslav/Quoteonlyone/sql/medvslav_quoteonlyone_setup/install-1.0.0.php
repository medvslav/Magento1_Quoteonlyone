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
$this->startSetup();

$this->removeAttribute('catalog_product', 'quoteonlyone');
$this->addAttribute('catalog_product', 'quoteonlyone', array(
        'group'                     => 'General',
        'input'                     => 'select',
        'type'                      => 'int',
        'label'                     => 'Only in the cart',
        'source'                    => 'eav/entity_attribute_source_boolean',
        'global'                    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'                   => true,
        'required'                  => true,
        'visible_on_front'          => true,
        'is_html_allowed_on_front'  => true,
        'is_configurable'           => false,
        'searchable'                => false,
        'filterable'                => false,
        'comparable'                => false,
        'unique'                    => false,
        'user_defined'              => false,
        'default'                   => 0,
        'is_user_defined'           => false,
        'used_in_product_listing'   => true
));




$this->endSetup();


