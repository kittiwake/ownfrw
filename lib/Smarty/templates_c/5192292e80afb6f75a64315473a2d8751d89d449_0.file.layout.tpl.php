<?php
/* Smarty version 3.1.30-dev/25, created on 2016-02-19 16:57:38
  from "C:\OpenServer\domains\localhost\ownfrw\templates\layout.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/25',
  'unifunc' => 'content_56c71142e7f4b8_93072811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5192292e80afb6f75a64315473a2d8751d89d449' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\ownfrw\\templates\\layout.tpl',
      1 => 1455872886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c71142e7f4b8_93072811 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Моя собственность</title>
    <link type="text/css" href="/<?php echo SITE_DIR;?>
/front/css/style.css" rel="stylesheet" /></head>
</head>

<body>
<div id="shapka">
    <div id="menu">
        <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

    </div>
    <div id="session">
        <?php echo $_smarty_tpl->tpl_vars['session']->value;?>

    </div>
</div>
<div class="content">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div>
</body>
</html><?php }
}
