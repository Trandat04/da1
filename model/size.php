<?php
function insert_size($name_size)
{
    $sql = "insert into size(name_size) values('$name_size')";
    pdo_execute($sql);
}

function delete_size($id_size)
{
    $sql = "delete from size where id_size=" . $id_size;
    pdo_execute($sql);
}
function loadall_size()
{
    $sql = "select * from size order by id_size desc";
    $dss = pdo_query($sql);
    return $dss; //co ket qua tra ve phai return
}
function loadone_size($id_size)
{
    $sql = "select * from size where id_size=" . $id_size;
    $suas = pdo_query_one($sql);
    return $suas; //co ket qua tra ve phai return
}
function update_size($id_size, $name_size)
{

    $sql = "update size set name_size='" . $name_size . "' where id_size=" . $id_size;
    pdo_execute($sql);
}
