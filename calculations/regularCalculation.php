<?php
date_default_timezone_set("Asia/Dhaka");
global $d_date,$d_Cause,$advanceSalary,$advance,$advanceSalary,$due_status,$due,$pay_date,$a_date;
global $newAdvance_status, $paid_in_cash, $newDue_status, $paid_in_bkash,$advance_status,$pay_status;
global $days,$thisMonth,$remark,$ADpay_id,$emp_id;
      $d_amount = 0;
      $advanceSalary = 0;
      $advance = 0;
      $due = 0;
      $paid_in_cash = 0;
      $paid_in_bkash = 0;
      $ADpay_id = 0;

      $emp_id         = $row2['emp_id'];
     $lname           = $row2['lname'];
     $fname           = $row2['fname'];
     $emp_type = $row2['emp_type'];
     $salary_rate = $row2['salary'];
     $bonus        = $row2['bonus'];



    if($emp_type == "Casual"){
      $query1  = "SELECT w_date as rate from works where emp_id = $emp_id";
      $q1 = $conn->query($query1);
      $row1 = $q1->fetch_assoc();
      $days   = $row1['rate'];
      $salary = $salary_rate * $days;
    }else{
      $salary = $salary_rate;
    }

      $query3  = "SELECT * from salary where emp_id = $emp_id";
      $q3 = $conn->query($query3);
      $row3 = $q3->fetch_assoc();
      $bonus = $row2["bonus"];
      $query4  = "SELECT d_amount,d_date,d_method from deductions where emp_id = $emp_id ";
      $q4 = $conn->query($query4);
        while($row4 = $q4->fetch_assoc()) {
          $thisMonth =  date("m-Y");
          $dMonth = date('m-Y', strtotime($row4['d_date']));
          if($thisMonth == $dMonth){
            $d_amount = $d_amount + $row4['d_amount'];
          }
          if($row4['d_method'] == "cash"){
            $paid_in_cash = $paid_in_cash + $row4['d_amount'];
          }
          else if($row4['d_method'] == "bkash"){
            $paid_in_bkash = $paid_in_bkash + $row4['d_amount'];
          }



        }
        date_default_timezone_set("Asia/Dhaka");
        $currentMonth = date('m');
        $currentYear = date('Y');
        $query4  = "SELECT * from payment where emp_id = '".$emp_id."' AND MONTH(pay_date) <> '".$currentMonth."'";
        $q4 = $conn->query($query4);
        while($row4 = $q4->fetch_assoc()){

        $due_status        = $row4['due_status'];
        if($due_status=="1"){
          $due        = $row4['due'];
          $due_date = date('M-Y', strtotime($row4['pay_date']));
          $ADpay_id = $row4['pay_id'];
        }

        $advance_status        = $row4['advance_status'];
        if($advance_status=="1"){
          $advance        = $row4['advance'];
          date_default_timezone_set("Asia/Dhaka");
          $a_date = date('M-Y', strtotime($row4['pay_date']));
          $ADpay_id = $row4['pay_id'];
        }


      }

          $deduction       = $d_amount;
          $income   = $bonus + $salary+$due;
          $salaryPaid = $deduction + $advance;
          $netpay   = $income - $salaryPaid;


          $message3 = "  If not paid this money will remain due on next month.";
          $message3 = "";
          if($due > 0){
            $message4 = "* Had due $due.00 on $due_date";
            $remark = $message4;
          }else{
            $message4 = "";
          }
          if($netpay < 0){
            $advanceSalary = $salaryPaid - $income;
            $netpay = 0;
            $message3 = "";

          }
          else{
            $message3 = "* If not paid this money will remain due on next month.";
          }
          if($d_amount <= 0 ){
            $advanceSalary = "0";
          }

          if($advance > 0){

            $message1 = "* Got advance money $advance.00 on $a_date";
            $remark = $message1;
          }
          else{
            $message1 = "";
          }
          if($advanceSalary>0){
            $message2 = "* $advanceSalary tk Will reduce next month'";
            $advance_status = "1";
            $newAdvance_status = "1";
          }
          else{
            $message2 = "";
            $newAdvance_status = "0";
          }
          if($netpay >0){
            $newDue_status = "1";
          }
          else{
            $newDue_status = "0";
          }
?>
