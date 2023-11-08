<?php
function insert_slider($file, $name_slider)
{
    $sql = "insert into slider(img_slider,name_slider) values('$file','$name_slider')";
    pdo_execute($sql);
}

function delete_slider($id_slider)
{
    $sql = "delete from slider where id_slider=" . $id_slider;
    pdo_execute($sql);
}
function loadall_slider()
{
    $sql = "select * from slider order by id_slider desc";
    $dssl = pdo_query($sql);
    return $dssl; //co ket qua tra ve phai return
}
function loadone_slider($id_slider)
{
    $sql = "select * from slider where id_slider=" . $id_slider;
    $suasl = pdo_query_one($sql);
    return $suasl; //co ket qua tra ve phai return
}
function update_slider($name_slider, $file, $id_slider)
{
    if ($file != "") {
        $sql = "update slider set name_slider='" . $name_slider . "' ,img_slider='" . $file . "' where id_slider=" . $id_slider;
    } else {
        $sql = "update slider set name_slider='" . $name_slider . "' where id_slider=" . $id_slider;
    }

    pdo_execute($sql);
}

