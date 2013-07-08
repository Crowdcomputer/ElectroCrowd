<?php

function getChildren($children, $parent, $parent_id = '', $format = 'JSON') {
    $data = array();
    $query = ' select o1.* from  `' . $children . '` o1 
                    left join `' . $children . '_' . $parent . '` o2 on o1.id=o2.' . $children . '_id
                        where o2.' . $parent . '_id=' . $parent_id;
    if ($format == 'JSON')
        return (queryToJSON($query));
    elseif ($format == 'array') {
        $qq = mysql_query($query);
        $num_rows = mysql_num_rows($qq);
        if ($num_rows > 0) {
            while ($element = mysql_fetch_array($qq)) {
                array_push($data, $element);
            }
            return $data;
        }
        else
            return false;
    } elseif ($format == 'query')
        return $query;
}

?>
