<?php
require('fpdf17/fpdf.php');
include("../php/dbconnect.php");


global $emp_id ;
$emp_id  = $_REQUEST['emp_id'];
global $fname;
global $lname;
global $emp_type;
global $gender ;
global $division;
global $BS;
global $bonus;
global $mobileNo;
global $pay_amount;
global $paid_in_cash;
global $paid_in_bkash;
global $due;
//$found = false;
$query  = "SELECT * from employee where emp_id = '".$emp_id."' ";
$q = $conn->query($query);
$row = $q->fetch_assoc();
$fname = $row["fname"];
$lname = $row["lname"];
$emp_type = $row["emp_type"];
$gender = $row["gender"];
$division = $row["division"];
$mobileNo = $row["mobileNo"];
$BS = $row["BS"];
$MA = $row["MA"];
$HR = $row["HR"];
$TA = $row["TA"];
$salary = $row["salary"];
$bonus = $row["bonus"];

$query0  = "SELECT * from payment where id = '".$emp_id."'";
$q0 = $conn->query($query0);
//$row0 = $q0->fetch_assoc();
$pay_amount =  0;
$paid_in_cash =  0;
$paid_in_bkash =  0;
$due =  0;

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
//$pdf->Image('img/abir.jpg',20,25);
//$pdf->SetLogo('img/car.jpg');
$pdf->Cell(130	,5,'Enterprise Resources Planning System',0,0);
$pdf->Cell(59	,5,'@@@',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'BUBT(5th Floor), 33,Siyalbari',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Mirpur 2, Dhaka-1216, Bangladesh',0,0);
$pdf->Cell(25	,5,'Date',0,0);
         date_default_timezone_set("Asia/Dhaka");
$pdf->Cell(34	,5,date('d/m/Y'),0,1);//end of line

$pdf->Cell(130	,5,'Phone: +880-1789279806,+880-1679434609 ',0,0);
$pdf->Cell(25	,5,' ***',0,0);
$pdf->Cell(34	,5,$emp_id,0,1);//end of line

$pdf->Cell(130	,5,'Email: riabir69@gmail.com',0,0);
$pdf->Cell(25	,5,'Emp ID :  ',0,0);
$pdf->Cell(34	,5,$emp_id,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Information Of',0,1);//end of line
$pdf->Cell(189	,3,'',0,1);//end of line
//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'ID :',0,0);
$pdf->Cell(90	,5,$emp_id,0,1);



$pdf->Cell(100	,5,'Name : '.$fname.''.$lname,0,1);//end of line
$pdf->Cell(189	,5,'',0,1);//end of line
//$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$mobileNo,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line



//$sn = 0;
                           $query  = "SELECT * from employee where emp_id = '".$emp_id."'";
                           $q = $conn->query($query);
                           while($row = $q->fetch_assoc())
                           {
                             $emp_id = $row["emp_id"];
                             $fname = $row["fname"];
                             $lname = $row["lname"];
                             $emp_type = $row["emp_type"];
                             $gender = $row["gender"];
                             $division = $row["division"];
                             $mobileNo = $row["mobileNo"];
                             $BS = $row["BS"];
                             $MA = $row["MA"];
                             $HR = $row["HR"];
                             $TA = $row["TA"];
                             $salary = $row["salary"];
                             $bonus = $row["bonus"];
                             //$sn++;

                            // $bill_no = $row["bill_no"];

                             $query1  = "SELECT * from payment where emp_id = '".$emp_id."'";
                             $q1 = $conn->query($query1);
                             $row1 = $q1->fetch_assoc();
                             $netpay =  0;
                             $paid_in_cash =  0;
                             $paid_in_bkash =  0;
                             $due =  0;

                            // $company_group_id = $row["company_group_id"];
                          //   $query2  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."' AND id = '".$company_id."'";
                            // $q2 = $conn->query($query2);
                          //   $row2 = $q2->fetch_assoc();

                             //$bill_date = $row["bill_date"];
                            // $bill_no = $row["bill_no"];
                          //   $work_area = $row["work_area"];
                            // $work_type = $row["work_type"];
                          //   $company_group = $row2["g_name"];
                          //   $bill_date = date('d/m/Y', strtotime($row["bill_date"]));
                            // $receive_date= $row["receive_date"];
                          //   $bill_amount = $row["bill_amount"];
                          //   $totalBill = $totalBill + $bill_amount;
                            // $received_amount = $row["receive_amount"];
                          //   $paid = $paid + $received_amount;

                            // $query3  = "SELECT * from billreceived where billsno = '".$billsno."'";
                             //$q3 = $conn->query($query3);
                            // $row3 = $q3->fetch_assoc();

                          //   $reduced = $bill_amount-$received_amount;
                          //   $totalDue = $totalDue + $reduced;

                          //   $remark = $row["remark"];
                          //   $pay_status = $row["pay_status"];
                          //   $qty = $row["square_fit"];
                          //   $rate = $row["rate"];



//billing address
//$pdf->Cell(100	,5,'Bill Details of: '.$emp_id.);//end of line


//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(59	,5,'Details',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter




$pdf->Cell(130		,5,'Id',1,0);
$pdf->Cell(59	   ,5,$emp_id,1,1,'R');//end of line

$pdf->Cell(130	,5,'First_name',1,0);
$pdf->Cell(59		,5,$fname,1,1,'R');//end of line

$pdf->Cell(130	,5,'Last_name',1,0);
$pdf->Cell(59		,5,$lname,1,1,'R');//end of line

$pdf->Cell(130	,5,'Employee Type',1,0);
$pdf->Cell(59		,5,$emp_type,1,1,'R');//end of line

$pdf->Cell(130	,5,'Gender',1,0);
$pdf->Cell(59		,5,$gender,1,1,'R');//end of line

$pdf->Cell(130	,5,'Division',1,0);
$pdf->Cell(59		,5,$division,1,1,'R');//end of line

$pdf->Cell(130	,5,'Mobile_No',1,0);
$pdf->Cell(59		,5,$mobileNo,1,1,'R');//end of line

$pdf->Cell(130	,5,'Basic Salary (BS)',1,0);
$pdf->Cell(59		,5,$BS,1,1,'R');//end of line

$pdf->Cell(130	,5,'Medical Allowance (MA)',1,0);
$pdf->Cell(59		,5,$MA,1,1,'R');//end of line

$pdf->Cell(130	,5,'Home Rent (HR)',1,0);
$pdf->Cell(59		,5,$HR,1,1,'R');//end of line

$pdf->Cell(130	,5,'Transport Allowance (TA)',1,0);
$pdf->Cell(59		,5,$TA,1,1,'R');//end of line

$pdf->Cell(130	,5,'Bonus',1,0);
$pdf->Cell(59		,5,$bonus,1,1,'R');//end of line

$pdf->Cell(130	,5,'Total Salary',1,0);
$pdf->Cell(59		,5,$netpay,1,1,'R');//end of line

$pdf->Cell(130	,5,'Paid_in_Cash',1,0);
$pdf->Cell(59		,5,$paid_in_cash,1,1,'R');//end of line

$pdf->Cell(130	,5,'Paid_in_Bkash',1,0);
$pdf->Cell(59		,5,$paid_in_bkash,1,1,'R');//end of line

$pdf->Cell(130	,5,'Due',1,0);
$pdf->Cell(59		,5,$due,1,1,'R');//end of line


//$pdf->Cell(159	,5,'Due',1,0);
//$pdf->Cell(30	,5,$reduced,1,1,'R');//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
}
//summary
$pdf->Cell(130	,5,'',0,0);
//$pdf->Cell(25	,5,'Total Bill',0,0);
//$pdf->Cell(5	,5,'tk',1,0);
//$pdf->Cell(30	,5,$totalBill,1,1,'R');//end of line

//$pdf->Cell(130	,5,'',0,0);
//$pdf->Cell(25	,5,'Total Paid',0,0);
//$pdf->Cell(5	,5,'tk',1,0);
//$pdf->Cell(30	,5,$paid,1,1,'R');//end of line

//$pdf->Cell(130	,5,'',0,0);
//$pdf->Cell(25	,5,'Due',0,0);
//$pdf->Cell(5	,5,'tk',1,0);
//$pdf->Cell(30	,5,$totalDue,1,1,'R');//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'-------------- ',0,0);
$pdf->Cell(34	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Signeture ',0,0);
$pdf->Cell(34	,5,'',0,1);//end of line

















$pdf->Output();
?>
