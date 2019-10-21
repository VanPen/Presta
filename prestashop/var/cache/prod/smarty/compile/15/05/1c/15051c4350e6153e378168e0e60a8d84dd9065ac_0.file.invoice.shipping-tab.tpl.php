<?php
/* Smarty version 3.1.33, created on 2019-10-21 09:39:08
  from 'C:\wamp64\www\prestashop\pdf\invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dad609c2b45d9_14549952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15051c4350e6153e378168e0e60a8d84dd9065ac' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\pdf\\invoice.shipping-tab.tpl',
      1 => 1566837319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dad609c2b45d9_14549952 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
