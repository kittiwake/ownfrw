<?php
/* Smarty version 3.1.30-dev/25, created on 2016-01-28 16:42:32
  from "C:\OpenServer\domains\localhost\ownfrw\templates\layout.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/25',
  'unifunc' => 'content_56aa0cb8037bf4_98790107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abdd29bd14a425b4fc3194b464f8a3677f48653e' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\ownfrw\\templates\\layout.tpl',
      1 => 1453984949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:auth.tpl' => 1,
  ),
),false)) {
function content_56aa0cb8037bf4_98790107 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Моя собственность</title>
</head>

<body>
<div id="shapka">
    <div id="menu">

    </div>
    <div id="hello">

    </div>
</div>
<div class="content">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    <?php $_smarty_tpl->_subTemplateRender("file:auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html><?php }
}
