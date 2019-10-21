<?php
/* Smarty version 3.1.33, created on 2019-10-21 09:39:08
  from 'C:\wamp64\www\prestashop\pdf\invoice.total-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dad609c29df45_92273442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93873f03e917baf475e87a5a7e102ba7455c8035' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\pdf\\invoice.total-tab.tpl',
      1 => 1566837319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dad609c29df45_92273442 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="total-tab" width="100%">

	<tr>
		<td class="grey" width="50%">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total Products','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

		</td>
		<td class="white" width="50%">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['products_before_discounts_tax_excl']),$_smarty_tpl ) );?>

		</td>
	</tr>

	<?php if ($_smarty_tpl->tpl_vars['footer']->value['product_discounts_tax_excl'] > 0) {?>

		<tr>
			<td class="grey" width="50%">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total Discounts','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

			</td>
			<td class="white" width="50%">
				- <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['product_discounts_tax_excl']),$_smarty_tpl ) );?>

			</td>
		</tr>

	<?php }?>
	<?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
	<tr>
		<td class="grey" width="50%">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping Costs','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

		</td>
		<td class="white" width="50%">
			<?php if ($_smarty_tpl->tpl_vars['footer']->value['shipping_tax_excl'] > 0) {?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['shipping_tax_excl']),$_smarty_tpl ) );?>

			<?php } else { ?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Free Shipping','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

			<?php }?>
		</td>
	</tr>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['footer']->value['wrapping_tax_excl'] > 0) {?>
		<tr>
			<td class="grey">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wrapping Costs','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

			</td>
			<td class="white"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['wrapping_tax_excl']),$_smarty_tpl ) );?>
</td>
		</tr>
	<?php }?>

	<tr class="bold">
		<td class="grey">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total (Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

		</td>
		<td class="white">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['total_paid_tax_excl']),$_smarty_tpl ) );?>

		</td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['footer']->value['total_taxes'] > 0) {?>
	<tr class="bold">
		<td class="grey">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total Tax','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

		</td>
		<td class="white">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['total_taxes']),$_smarty_tpl ) );?>

		</td>
	</tr>
	<?php }?>
	<tr class="bold big">
		<td class="grey">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

		</td>
		<td class="white">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['footer']->value['total_paid_tax_incl']),$_smarty_tpl ) );?>

		</td>
	</tr>
</table>
<?php }
}
