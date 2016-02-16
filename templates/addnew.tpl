    {$message}

<form method="post" action="#">
    <table width="100%" border="0">
        <tr>
            <td width="170" align="right">Договор № </td>
            <td><input type="text" name="con" value=""/></td>
        </tr>
        <tr>
            <td align="right">от</td>
            <td><input type="text" name="con_date" value=""></td>
        </tr>
        <tr>
            <td align="right">Имя заказчика</td>
            <td><input type="text" name="name" value="" size="80"/></td>
        </tr>
        <tr>
            <td align="right">Изделие</td>
            <td><input type="text" name="prod" value="" size="40"/></td>
        </tr>
        <tr>
            <td align="right">Срок по договору</td>
            <td><input type="text" name="term" value=""/>
                открытая дата
                <input type="checkbox" name="otkr" id="otkr" /></td>
        </tr>
        <tr>
            <td align="right" valign="top">Сумма</td>
            <td>
                <input type="text" name="sum" value="" />
                <br>
                <input type="checkbox" name="rassr" id="rassr" />Рассрочка
                <br>
                <input type="checkbox" name="beznal" id="beznal" />Безнал
            </td>
        </tr>
        <tr>
            <td align="right">Предоплата</td>
            <td><input type="text" name="pred" value=""/></td>
        </tr>
        <tr>
            <td align="right">Дизайнер</td>
            <td>
                <select name="dis">
                    <option value="0"> </option>
                    <option value="2">список дизайнеров</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Адрес</td>
            <td><textarea name="adress" cols="70" rows="3"></textarea></td>
        </tr>
        <tr>
            <td align="right" valign="top">Номер телефона</td>
            <td><input name="phone" placeholder="7YYYXXXXXXX" value=""></td>
        </tr>
        <tr>
        <tr>
            <td align="right" valign="top">Примечание</td>
            <td><textarea name="note" cols="70" rows="7"></textarea></td>
        </tr>

        <td></td>
        <td>
            <input type="submit" name="submit" id="ok" value="Добавить">
        </td>
        </tr>

    </table>

</form>
