<?php
function insert_bl($noidung, $id_tk, $id_sp, $ngaybl)
{
    $sql = "insert into binhluan(noidung,id_tk,id_sp,ngaybl) values('$noidung','$id_tk','$id_sp','$ngaybl')";
    pdo_execute($sql);
}

function delete_bl($id_bl)
{
    $sql = "delete from binhluan where id_bl=" . $id_bl;
    pdo_execute($sql);
}
function loadall_bluan($id_sp)
{
    $sql = "SELECT bl.noidung,bl.ngaybl,tk.ho_ten as nguoibl,sp.name,bl.id_sp,bl.id_bl
    from sanpham sp INNER join binhluan bl on sp.id_sp=bl.id_sp
    INNER join taikhoan tk on bl.id_tk=tk.id_tk where 1";
    if ($id_sp > 0)
        $sql .= " and bl.id_sp='" . $id_sp . "'";
    // $sql .= " and bl.id_bl=  " . $id_bl;
    $sql .= " order by bl.id_bl desc ";

    $ctbl = pdo_query($sql);
    return $ctbl; //co ket qua tra ve phai return
}
function loadall_bl()
{
    $sql = "SELECT sp.name,COUNT(bl.id_bl) as sobl,bl.id_sp, bl.ngaybl, MAX(bl.ngaybl) as moinhat, min(bl.ngaybl) as cunhat,bl.id_bl
    from sanpham sp INNER join binhluan bl on sp.id_sp=bl.id_sp
    INNER join taikhoan tk on bl.id_tk=tk.id_tk GROUP by bl.id_sp ";

    $dsbl = pdo_query($sql);
    return $dsbl; //co ket qua tra ve phai return
}
function loadall_bll($id_sp)
{
    $sql = "SELECT bl.*,tk.username from binhluan bl join taikhoan tk on bl.id_tk=tk.id_tk where 1";
    if ($id_sp > 0)
        $sql .= " and id_sp='" . $id_sp . "'";
    $sql .= " order by id_bl desc ";

    $ds = pdo_query($sql);
    return $ds; //co ket qua tra ve phai return
}
function loadone_spbl($id_sp)
{
    $sql = "select * from sanpham sp join binhluan bl on sp.id_sp =bl.id_sp where bl.id_sp=" . $id_sp;
    $sp = pdo_query_one($sql);
    return $sp; //co ket qua tra ve phai return
}
// function loadone_dm($id_dm)
// {
//     $sql = "select * from danhmuc where id_dm=" . $id_dm;
//     $suadm = pdo_query_one($sql);
//     return $suadm; //co ket qua tra ve phai return
// }
// function update_dm($nameloai, $id_dm)
// {
//     $sql = "update danhmuc set name='" . $nameloai . "' where id_dm=" . $id_dm;
//     pdo_execute($sql);
// }
