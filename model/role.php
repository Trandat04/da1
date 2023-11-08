<?php
function loadall_rl()
{
    $sql = "select * from role order by id_role desc";
    $dsrl = pdo_query($sql);
    return $dsrl; //co ket qua tra ve phai return
}
?>