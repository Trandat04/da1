<?php
function view_cart($del)
{
    global  $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';

        $xoasp_td2 = '';
    } else {
        $xoasp_th = "";

        $xoasp_td2 = "";
    }

    echo '<tr>
    <th>Hình</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành Tiền</th>
 ' . $xoasp_th . '
</tr>';
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        // $gia = $cart[3];
        $gia =  $cart[3] - (($cart[3] *  $cart[4]) / 100);
        $thanhtien = $gia * $cart[5];
        $tong += $thanhtien;
        if ($del == 1) {

            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '">
            <input onclick="return confirm(\' ban co muon xoa ko? \')" type="button" value="xoa" class="xoa" id="x"></a></td>';
        } else {

            $xoasp_td = "";
        }

        echo ' 
       <tr> 
        <td><img src="' . $hinh . '" alt="" height="80px"></td>
        <td>' . $cart[1] . '</td>
        <td>$' . number_format($gia, 0, ",", ".") . '</td>
        <td>' . $cart[5] . '</td>
        <td>$' . number_format($thanhtien, 0, ",", ".") . '</td>
       ' . $xoasp_td . '
        
       </tr> 
    ';
        $i += 1;
    }
    echo '
<td colspan="4">Tổng đơn hàng</td>

<td>$' . number_format($tong, 0, ",", ".") . '</td>
' . $xoasp_td2 . '
';
}

function show_ctdh($listbill) //bien truyen vao ko lien quan den bien ben ngoai
{
    global  $img_path;
    $tong = 0;
    $i = 0;

    echo '<tr>
    <th>Hình</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành Tiền</th>

</tr>';
    foreach ($listbill as $cart) {
        $hinh = $img_path . $cart['img'];
        // $tong += $cart['thanhtien'];
        echo ' 
       <tr> 
        <td><img src="' . $hinh . '" alt="" height="80px"></td>
        <td>' . $cart['name'] . '</td>
        <td>$' . number_format($cart['price'], 0, ",", ".") . '</td>
        <td>' . $cart['soluong'] . '</td>
        <td>$' . number_format($cart['thanhtien'], 0, ",", ".") . '</td>
        
       </tr> 
    ';
        $i += 1;
    }
    foreach ($_SESSION['mycart'] as $cart) {
        // $gia = $cart[3];
        $gia =  $cart[3] - (($cart[3] *  $cart[4]) / 100);
        $thanhtien = $gia * $cart[5];
        $tong += $thanhtien;
    }
    echo '
        <tr> 
        <td colspan="4">Tổng đơn hàng</td>
        
        <td>$' . number_format($tong, 0, ",", ".") . '</td>
        </tr> 
        ';
}

function tongdh()
{

    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $gia =  $cart[3] - (($cart[3] *  $cart[4]) / 100);
        $thanhtien = $gia * $cart[5];
        $tong += $thanhtien;
    }
    return $tong;
}

function insert_bill($name, $diachi, $email, $tel, $pttt, $tongdh, $ngaydh, $id_tk)
{
    $sql = "insert into bill(name,diachi,email,tel,pttt,total,ngaydh,id_tk) 
    values('$name','$diachi','$email','$tel','$pttt','$tongdh','$ngaydh','$id_tk')";
    return pdo_execute_return_lastInsertId($sql); // insert xong tra ve id vua insert de insert vao table cart
}
function insert_cart($id_tk, $id_sp, $img, $name, $price, $soluong, $thanhtien, $id_bill)
{
    $sql = "insert into cart(id_tk,id_sp,img,name,price,soluong,thanhtien,id_bill) 
    values('$id_tk','$id_sp','$img','$name','$price','$soluong','$thanhtien','$id_bill')";
    pdo_execute($sql);
}
function loadone_bill($id_bill)
{
    $sql = "select * from bill where id_bill=" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill; //co ket qua tra ve phai return
}

function loadall_cart($id_bill)
{
    $sql = "select * from cart where id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return $bill; //co ket qua tra ve phai return
}
function loadall_cart_count($id_bill)
{
    $sql = "select * from cart where id_bill=" . $id_bill;
    $bill = pdo_query($sql);
    return sizeof($bill); //dem so lg mat hang
}
function loadall_bill($kyw = "", $id_tk = 0)
{
    $sql = "select * from bill where 1";
    if ($id_tk > 0) $sql .= "  and id_tk=" . $id_tk;
    if ($kyw != '') $sql .= "  and id_bill like '%" . $kyw . "%'";
    $sql .= " order by id_bill desc";
    $listbill = pdo_query($sql);
    return $listbill; //co ket qua tra ve phai return
}
function loadall_bil($id_tk)
{
    $sql = "select * from bill where 1";
    if ($id_tk > 0) $sql .= "  and id_tk=" . $id_tk;
    $sql .= " order by id_bill desc";
    $listbill = pdo_query($sql);
    return $listbill; //co ket qua tra ve phai return
}
function delete_bill($id_bill)
{
    $sql = "delete from bill where id_bill=" . $id_bill;
    pdo_execute($sql);
}
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "DON HANG MOI";
            break;
        case '1':
            $tt = "DANG XU LY";
            break;
        case '2':
            $tt = "DANG GIAO HANG";
            break;
        case '3':
            $tt = "DA GIAO HANG";
            break;

        default:
            $tt = "DON HANG MOI";
            break;
    }
    return $tt;
}
function  loadall_thongke()
{
    $sql = "select danhmuc.name as tendanhmuc,danhmuc.id_dm as madanhmuc,count(sanpham.id_sp) as countsp, min(sanpham.price) as mingia,max(sanpham.price) as maxgia, avg(sanpham.price) as giatb ";

    $sql .= "  from sanpham join danhmuc on sanpham.id_dm=danhmuc.id_dm ";
    $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc ";
    $listtk = pdo_query($sql);
    return $listtk;
}
