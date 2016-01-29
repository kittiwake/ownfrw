<?php
/* Smarty version 3.1.30-dev/25, created on 2016-01-29 15:56:14
  from "C:\OpenServer\domains\localhost\ownfrw\templates\auth.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/25',
  'unifunc' => 'content_56ab535e646243_82885110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f608e79c1123e9a523236bdb286d7fa02814475' => 
    array (
      0 => 'C:\\OpenServer\\domains\\localhost\\ownfrw\\templates\\auth.tpl',
      1 => 1453965221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ab535e646243_82885110 ($_smarty_tpl) {
?>
<form method="post" action="">
    <table>
        <tr>
            <td>Логин</td>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Войти" name="enter"></td>
        </tr>
    </table>
</form><?php }
}
