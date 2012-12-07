<table class="table table-hover">
    <thead>
    <th>Date</th>
    <th>Data</th>
</thead>
<tbody>
    <?php
    $query = 'select * from `Resource`';
    $qq = mysql_query($query);
    while ($push = mysql_fetch_assoc($qq)) {
        ?>
        <tr>
            <td>
                <?php echo $push['dt']; ?>
            </td>
            <td>
                <?php echo $push['data']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
