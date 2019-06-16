<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
session_start();
ob_start();
require_once('includes/configpdo.php');
error_reporting(0);
?>

<html>
<style>
body {
  padding: 4px;
  text-align: center;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}


</style>
<?php
// code Student Data
$stid=1001;
$_SESSION['stid']=$stid;
$hk=$_POST['class'];

$qery = "SELECT stname from hsinh where stid=:id  ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':id',$stid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   
    }
    }?>
<p><b>Student Name :</b> <?php echo htmlentities($row->stname);?></p>
<p><b>Student Roll Id :</b> <?php echo $stid;?></p>
<p><b>Results of course:</b> 
    <?
    $qeri = "SELECT * from hocki where mahk=:id  ";
$st = $dbh->prepare($qeri);
$st->bindParam(':id',$hk,PDO::PARAM_STR);
$st->execute();
$res=$st->fetchAll(PDO::FETCH_OBJ);
if($st->rowCount() > 0)
{
foreach($res as $ro)
{   
    echo htmlentities($ro->tenhk);
    }
    }
    ?>
</p>

                                            </div>
                                            <div class="panel-body p-20" style="position: absolute;top: 300px;left: 30px;width:800px;">







                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>    
                                                            <th>Midterm</th>
                                                            <th>Final</th>
                                                            <th>Average</th>
                                                        </tr>
                                               </thead>
  


                                                    
                                                    <tbody>
<?php                                              
// Code for result
 $query ="SELECT diem.stid, diem.mahk,diem.scode, diem.midterm,diem.final, diem.mark, monhoc.sname from diem join monhoc on diem.scode=monhoc.scode  where diem.stid=:stid and diem.mahk=:hkid";
$query= $dbh -> prepare($query);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->bindParam(':hkid',$hk,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){


?>

    <tr>
        <th scope="row"><?php echo htmlentities($cnt);?></th>
        <td><?php echo htmlentities($result->sname);?></td>
        <td><?php echo htmlentities($totalmarks=$result->midterm);?></td>
        <td><?php echo htmlentities($totalmarks=$result->final);?></td>
        <td><?php echo htmlentities($totalmarks=$result->mark);?></td>
    </tr>
<?php 
$cnt++;}}
?>

                            </tbody>
                        </table>
                    </div>
</html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("result.pdf");
?>