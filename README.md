# Magento1_Quoteonlyone
This is a module for Magento 1.x CMS.<br />
The product can only be one in the shopping cart, if it has the value of the attribute "Only in the cart" equally "true".<br />
Developed module add new attribute "Only in the cart", type boolean.<br />
If product has attribute  "Only in the cart" = true, it means that order can be finished. If and only if cart contains just this product. <br />
If you have in the cart more products, some products have "Only in the cart" = true and other products have "Only in the cart" = false warning message in the cart is shown "Sorry, chosen product (....) can be purchased alone. Please remove other products" and user can NOT finish order  (it means go to checkout page). This error message is taken from new defined static block.<br />
<br />

When you install this extension in the administrative part of the Magento will be created a new static CMS block - "For the error of module 'Quote only one' " . In this block you can change the error message, which will be shown in the shopping cart. The names of the products from the cart, which attribute "Only in the cart" equally "true" will be placed in the variable "% s"  of the error message.<br />
Also new product attribute "Only in the cart" will be created in the attribute set "General". And the default value of this attribute will be set to "false" for each product.
