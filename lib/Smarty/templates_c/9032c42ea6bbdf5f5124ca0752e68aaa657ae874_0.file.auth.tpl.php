<?php
/* Smarty version 3.1.30-dev/25, created on 2016-01-28 16:42:32
  from "C:\OpenServer\domains\localhost\ownfrw\templates\auth.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/25',
  'unifunc' => 'content_56aa0cb8069396_13700333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9032c42ea6bbdf5f5124ca0752e68aaa657ae874' => 
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
function content_56aa0cb8069396_13700333 ($_smarty_tpl) {
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
