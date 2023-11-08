<?php
function insert_pro($name_pro, $file, $des, $dis, $price, $id_size, $id_cat)
{
    $sql = "insert into product(name_pro,img,description,discount,price,id_size,id_cat) 
    values(' $name_pro ','$file','$des','$dis','$price','$id_size','$id_cat')";
    pdo_execute($sql);
}

function delete_pro($id_pro)
{
    $sql = "delete from product where id_pro=" . $id_pro;
    pdo_execute($sql);
}

function loadall_pro_home()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by id_pro desc limit 0,8";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai return
}

function loadall_pro_top8()
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product where 1 order by view desc limit 0,8";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai return
}
// function loadall_sp($kyw = "", $id_dm = 0)
// {
//     //cach noi chuoi sql
//     //phai co cach khoang
//     $sql = "select * from sanpham where 1";
//     if ($kyw != "") {
//         $sql .= " and name like '%" . $kyw . "%' ";
//     }
//     if ($id_dm > 0) {
//         $sql .= " and id_dm = '" . $id_dm . "'";
//     }

//     $sql .= " order by id_sp desc";
//     $dssp = pdo_query($sql);
//     return $dssp; //co ket qua tra ve phai returnss
// }

function loadall_pro($id_cat = 0)
{
    //cach noi chuoi sql
    //phai co cach khoang
    $sql = "select * from product pro join category cat on pro.id_cat = cat.id_cat join size s on pro.id_size=s.id_size where 1";
    if ($id_cat > 0) {
        $sql .= " and pro.id_cat = '" . $id_cat . "'";
    }
    $sql .= " order by pro.id_pro desc";
    $dssp = pdo_query($sql);
    return $dssp; //co ket qua tra ve phai return
}
function loadone_pro($id_pro)
{
    $sql = "select * from product pro join size s on pro.id_size=s.id_size where id_pro=" . $id_pro;
    $suasp = pdo_query_one($sql);
    return $suasp; //co ket qua tra ve phai return
}
function load_ten_dm($id_dm)
{
    if ($id_dm > 0) {
        $sql = "select * from danhmuc where id_dm=" . $id_dm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name; //co ket qua tra ve phai return
    } else {
        return "";
    }
}
function update_pro($id_pro, $name_pro, $file, $description, $discount, $price, $id_size, $id_cat)
{
    if ($file != "") {
        $sql = "update product set name_pro='" . $name_pro . "',img='" . $file . "',
        description='" . $description . "',discount='" . $discount . "',price='" . $price . "',
        id_size='" . $id_size . "',id_cat='" . $id_cat . "' where id_pro=" . $id_pro;
    } else {
        $sql = "update product set name_pro='" . $name_pro . "',
        description='" . $description . "',discount='" . $discount . "',price='" . $price . "',
        id_size='" . $id_size . "',id_cat='" . $id_cat . "' where id_pro=" . $id_pro;
    }

    pdo_execute($sql);
}
function loadone_sp_cungloai($id_pro, $id_cat)
{
    $sql = "select * from product where id_cat=" . $id_cat . " and id_pro <>" . $id_pro;
    $dssp = pdo_query($sql);
    return $dssp;; //co ket qua tra ve phai return
}
function tangluotxem($id_pro)
{
    $onesp = loadone_pro($id_pro);
    $view = $onesp['view'] + 1;
    $sql = "update product set view='" . $view . "' where id_pro =" . $id_pro;
    pdo_execute($sql);
}
