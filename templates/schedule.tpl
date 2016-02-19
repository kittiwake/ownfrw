<table>
    <tr>
        <th>Договор</th>
        <th>плановая дата</th>
        <th>рассрочка/безнал</th>
    </tr>
    {foreach from=$orderList key=myId item=i}
        <tr>
            <td>{$i.contract}</td>
            <td>{$i.plan}</td>
            <td>{$i.rassr}/{$i.beznal}</td>
        </tr>
    {/foreach}
</table>
