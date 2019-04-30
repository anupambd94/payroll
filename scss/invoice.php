<?php
require('fpdf17/fpdf.php');
include("../php/dbconnect.php");


global $billsno;
$billsno = $_REQUEST['billsno'];
global $totalBill;
global $company_name,$company_type;
global $company_group;
global $company_id;
global $bill_id,$square_fit,$rate;
global $paid,$totalDue;
global $reduced;
global $remark;
global $found;
$found = false;
$query  = "SELECT * from bill where billsno = '".$billsno."' ";
$q = $conn->query($query);
$row = $q->fetch_assoc();
$company_id = $row["company_id"];
$bill_id = $row["bill_id"];

$totalBill = 0;
$paid = 0;
$reduced = 0;
$totalDue = 0;

$query0  = "SELECT * from company where id = '".$company_id."'";
$q0 = $conn->query($query0);
$row0 = $q0->fetch_assoc();
$company_name = $row0["name"];
$address = $row0["address"];
$mobile = $row0["mobile"];

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Enterprise Resources Planning System',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Tony Tower(5th Floor), 33, Shahid Faruk Road',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Mirpur, Dhaka-1216, Bangladesh',0,0);
$pdf->Cell(25	,5,'Date',0,0);
date_default_timezone_set("Asia/Dhaka");
$pdf->Cell(34	,5,date('d/m/Y'),0,1);//end of line

$pdf->Cell(130	,5,'Phone: +880-1793-501990,+880-1712-464108 ',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$billsno,0,1);//end of line

$pdf->Cell(130	,5,'Email: riabir69@gmail.com',0,0);
$pdf->Cell(25	,5,'Company ID: ',0,0);
$pdf->Cell(34	,5,$company_id,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$company_name,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$address,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$mobile,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line



$sn = 0;
                           $query  = "SELECT * from companybill as cb, bill as b  where b.billsno = '".$billsno."' AND b.company_id = '".$company_id."' AND b.billsno = cb.billsno";
                           $q = $conn->query($query);
                           while($row = $q->fetch_assoc())
                           {
                             $s_id = $row["s_id"];
                             $sn++;

                             $bill_no = $row["bill_no"];

                             $query1  = "SELECT * from company where id = '".$company_id."'";
                             $q1 = $conn->query($query1);
                             $row1 = $q1->fetch_assoc();
                             $company_name = $row1["name"];

                             $company_group_id = $row["company_group_id"];
                             $query2  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."' AND id = '".$company_id."'";
                             $q2 = $conn->query($query2);
                             $row2 = $q2->fetch_assoc();

                             $bill_date = $row["bill_date"];
                             $bill_no = $row["bill_no"];
                             $work_area = $row["work_area"];
                             $work_type = $row["work_type"];
                             $company_group = $row2["g_name"];
                             $bill_date = date('d/m/Y', strtotime($row["bill_date"]));
                             $receive_date= $row["receive_date"];
                             $bill_amount = $row["bill_amount"];
                             $totalBill = $totalBill + $bill_amount;
                             $received_amount = $row["receive_amount"];
                             $paid = $paid + $received_amount;

                             $query3  = "SELECT * from billreceived where billsno = '".$billsno."'";
                             $q3 = $conn->query($query3);
                             $row3 = $q3->fetch_assoc();

                             $reduced = $bill_amount-$received_amount;
                             $totalDue = $totalDue + $reduced;

                             $remark = $row["remark"];
                             $pay_status = $row["pay_status"];
                             $qty = $row["square_fit"];
                             $rate = $row["rate"];



//billing address
$pdf->Cell(100	,5,'Bill Details of: '.$company_group.'/'.$bill_no,0,1);//end of line


//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(159	,5,'Description',1,0);
$pdf->Cell(30	,5,'Value',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(159	,5,'Bill Date',1,0);
$pdf->Cell(30	,5,$bill_date,1,1,'R');//end of line

$pdf->Cell(159	,5,'Bill No',1,0);
$pdf->Cell(30	,5,$bill_no,1,1,'R');//end of line

$pdf->Cell(159	,5,'Area',1,0);
$pdf->Cell(30	,5,$work_area,1,1,'R');//end of line

$pdf->Cell(159	,5,'Group Name',1,0);
$pdf->Cell(30	,5,$company_group,1,1,'R');//end of line

$pdf->Cell(159	,5,'Sft/Qty',1,0);
$pdf->Cell(30	,5,$qty,1,1,'R');//end of line

$pdf->Cell(159	,5,'Rate',1,0);
$pdf->Cell(30	,5,$rate,1,1,'R');//end of line

$pdf->Cell(159	,5,'Bill Amount',1,0);
$pdf->Cell(30	,5,$bill_amount,1,1,'R');//end of line

$pdf->Cell(159	,5,'Received Amount',1,0);
$pdf->Cell(30	,5,$received_amount,1,1,'R');//end of line

$pdf->Cell(159	,5,'Due',1,0);
$pdf->Cell(30	,5,$reduced,1,1,'R');//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
}
//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Bill',0,0);
$pdf->Cell(5	,5,'tk',1,0);
$pdf->Cell(30	,5,$totalBill,1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Paid',0,0);
$pdf->Cell(5	,5,'tk',1,0);
$pdf->Cell(30	,5,$paid,1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Due',0,0);
$pdf->Cell(5	,5,'tk',1,0);
$pdf->Cell(30	,5,$totalDue,1,1,'R');//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Signeture: ',0,0);
$pdf->Cell(34	,5,'---------------',0,1);//end of line

















$pdf->Output();
?>
