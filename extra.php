<?php




$insert=$pdo->prepare("insert into tbl_product(pname,pcategory,saleprice,pstock,pdescription) values(:pname,:pcategory,:saleprice,:pstock,:pdescription)");
$insert->bindParam(":pname",$productname );
$insert->bindParam(":pcategory",$category );
$insert->bindParam(":saleprice",$purchaseprice );
$insert->bindParam(":pstock",$stock);
$insert->bindParam(":pdescription",$description );

if($insert->execute())



$select=$pdo->prepare("select * from tbl_invoice where invoice_id =$id");
$select->execute();

$row=$select->fetch(PDO::FETCH_ASSOC);
$customer_name=$row["customer_name"];
    $order_date=date('Y-m-d',strtotime($row['order_date']));
    $subtotal=$row["subtotal"];
    $tax=$row["tax"];
    $discount=$row["discount"];
    $total=$row["total"];
    $paid=$row["paid"];
    $due=$row["due"];
    $payment_type=$row["payment_type"];

$select=$pdo->prepare("select * from table_invoice_details where invoice_id =$id");
$select->execute();

$row_invoice_details=$select->fetchAll(PDO::FETCH_ASSOC);


$id=$_POST["pidd"];
$sql="delete from tbl_product where pid=$id";
$delete=$pdo->prepare($sql);

if ($delete->execute()){