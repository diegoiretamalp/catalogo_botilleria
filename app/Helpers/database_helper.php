<?php
function GetResultsByWhere($table, $where)
{
    $db      = \Config\Database::connect();
    $table = $db->table($table);
    $data = $table->getWhere($where)->getResultObject();
    if (!empty($data)) {
        return $data;
    } else {
        return NULL;
    }
}


function GetRowObjectByWhere($table, $where)
{
	$db      = \Config\Database::connect();
	$table = $db->table($table);
	$data = $table->getWhere($where)->getRowObject();
	if (!empty($data)) {
		return $data;
	} else {
		return '';
	}
}