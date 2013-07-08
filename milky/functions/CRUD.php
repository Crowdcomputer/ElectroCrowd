<?php

/* in theory this library should be able to manage different types of manipulations with DB */

function getObjects($object, $parameter = '', $value = '', $format = 'JSON', $order = '', $extention='') {
    $data = array();
    $query = 'select * from  `' . $object . '`';
    if ($parameter != '' and $value != '')
        $query.=' where ' . $parameter . '="' . $value . '" ';
    if ($extention !=''){
        $query.=' '.$extention;
    }
    if ($order !=''){
        $query.=' order by '.$order;
    }
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



function countObjects($object, $parameter = '', $value = '') {

    $query = 'select count(*) amount from  `' . $object . '`';
    if ($parameter != '' and $value != '')
        $query.=' where ' . $parameter . '="' . $value . '" ';
    $qq = mysql_query($query);
    $num_rows = mysql_num_rows($qq);

    if ($num_rows > 0) {
        $amount = mysql_fetch_array($qq);
        return $amount[0];
    }
    else
        return false;
}

function issetLink($object1, $object2, $object_id1, $object_id2) {
    $query = 'select * from  `' . $object1 . '_' . $object2 . '`';

    $query.=' where ' . $object1 . '_id="' . $object_id1 . '" and ' . $object2 . '_id="' . $object_id2 . '"';

    $qq = mysql_query($query);
    $num_rows = mysql_num_rows($qq);
    if ($num_rows > 0)
        return true;
    else
        return false;
}

function insertObject($object, $parameters, $values) {
    $query = 'insert into `' . $object . '` (';
    $i = 0;
    foreach ($parameters as $par) {
        if ($i == 0)
            $query.=' `' . ($par) . '`';
        else
            $query.=' ,`' . scv_esc($par) . '`';
        $i++;
    }
    $query.=' ) values (';
    $i = 0;
    foreach ($values as $val) {
        if ($i == 0)
            $query.=' "' . exitquotes($val) . '"';
        else
            $query.=' ,"' . exitquotes($val) . '"';

        $i++;
    }
    $query.=' )';
    //$query = ($query);
    mysql_query($query);
    $id = mysql_insert_id();
    return $id;
}

function exitquotes($string) {
    return str_replace('"', '\"', $string);
}

?>
