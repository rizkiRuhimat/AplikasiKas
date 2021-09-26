<? include_once 'config.php';
$id =   $_GET['id'];

$sql = "delete from `data_nasabah` where id ='$id';";
$result = $conn->query($sql);
if ($result){
    
    header("location:nasabah.php");

}else{
    "Data Failed to Delete";
}