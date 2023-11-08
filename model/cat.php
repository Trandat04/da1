<?php
function insert_cat($name, $file)
{
    $sql = "insert into category(name_cat,img_cat) values('$name','$file')";
    pdo_execute($sql);
}

function delete_cat($id_cat)
{
    $sql = "delete from category where id_cat=" . $id_cat;
    pdo_execute($sql);
}
function loadall_cat()
{
    $sql = "select * from category order by id_cat desc";
    $dslh = pdo_query($sql);
    return $dslh; //co ket qua tra ve phai return
}
function loadone_cat($id_cat)
{
    $sql = "select * from category where id_cat=" . $id_cat;
    $suadm = pdo_query_one($sql);
    return $suadm; //co ket qua tra ve phai return
}
function update_cat($name_cat, $file, $id_cat)
{
    if ($file != "") {
        $sql = "update category set name_cat='" . $name_cat . "' ,img_cat='" . $file . "' where id_cat=" . $id_cat;
    } else {
        $sql = "update category set name_cat='" . $name_cat . "' where id_cat=" . $id_cat;
    }

    pdo_execute($sql);
}
function loadall_pro_count($id_cat)
{
    $sql = "select * from product where id_cat=" . $id_cat;
    $bill = pdo_query($sql);
    return sizeof($bill); //dem so lg mat hang
}