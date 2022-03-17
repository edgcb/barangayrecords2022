<?php
// API From:
// (Generating of Certificates)
// mPDF
// https://mpdf.github.io/

require_once("../../dbconnection.php");

require_once __DIR__ . '/../../vendor/autoload.php';

// Tax Receipt
if (isset($_POST['generate_taxreceipt'])) {
  $Payor = $_POST['payor_taxreceipt'];
  $Agency = $_POST['agency_taxreceipt'];
  $Fund = $_POST['fund_taxreceipt'];

  $Natureofcollection1 = $_POST['natureofcollection_taxreceipt'];
  $Accountcode1 = $_POST['accountcode_taxreceipt'];
  $Amount1 = $_POST['amount1_taxreceipt'];

  $Natureofcollection2 = $_POST['natureofcollection2_taxreceipt'];
  $Accountcode2 = $_POST['accountcode2_taxreceipt'];
  $Amount2 = $_POST['amount2_taxreceipt'];

  $Natureofcollection3 = $_POST['natureofcollection3_taxreceipt'];
  $Accountcode3 = $_POST['accountcode3_taxreceipt'];
  $Amount3 = $_POST['amount3_taxreceipt'];

  $Natureofcollection4 = $_POST['natureofcollection4_taxreceipt'];
  $Accountcode4 =  $_POST['accountcode4_taxreceipt'];
  $Amount4 = $_POST['amount4_taxreceipt'];

  $Totalamount = $Amount1 + $Amount2 + $Amount3 + $Amount4;

  $Draweebank =  $_POST['draweebank_taxreceipt'];
  $Numberdrawee =  $_POST['number_taxreceipt'];
  $Datedrawee =  $_POST['date_taxreceipt'];

  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/Y");
  $FileExtension = 'pdf';
  $FilenameTaxReceipt = $Payor . " " . $Agency . "TaxReceipt." . $FileExtension;

  // SQL
  if (isset($_POST['cash_taxreceipt'])) {
    $query = "INSERT into tax_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', '$Natureofcollection1 $Natureofcollection2 $Natureofcollection3 $Natureofcollection4', '$Accountcode1 $Accountcode2 $Accountcode3 $Accountcode4', 'Cash','$Totalamount', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }

  if (isset($_POST['check_taxreceipt'])) {
    $query = "INSERT into tax_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', '$Natureofcollection1 $Natureofcollection2 $Natureofcollection3 $Natureofcollection4', '$Accountcode1 $Accountcode2 $Accountcode3 $Accountcode4', 'Check','$Totalamount', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }

  if (isset($_POST['moneyorder_taxreceipt'])) {
    $query = "INSERT into tax_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', '$Natureofcollection1 $Natureofcollection2 $Natureofcollection3 $Natureofcollection4', '$Accountcode1 $Accountcode2 $Accountcode3 $Accountcode4', 'Money Order','$Totalamount', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }

  $mpdf = new \Mpdf\Mpdf([              //wide //height
    'default_font_size' => 11, 'format' => [115, 210]
  ]);

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

//   $mpdf->SetDefaultBodyCSS('background', "url('receipt.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  // Date
  $mpdf->WriteFixedPosHTML("" . $date . "", 53, 40, 62, 90, 'auto');

  // Agency
  if (isset($_POST['agency_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Agency . "", 23, 49, 62, 90, 'auto');
  }

  // Payor
  if (isset($_POST['payor_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Payor . "", 19, 57, 89, 90, 'auto');
  }

  // Fund
  if (isset($_POST['fund_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Fund . "", 96, 49, 20, 90, 'auto');
  }

  // Nature of Collection 1
  if (isset($_POST['natureofcollection_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Natureofcollection1 . "", 11, 77, 43, 90, 'auto');
  }
  // Account Code 1
  if (isset($_POST['accountcode_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Accountcode1 . "", 55, 77, 25, 90, 'auto');
  }
  // Amount 1
  if (isset($_POST['amount1_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Amount1 . "", 88, 76, 20, 90, 'auto');
  }

  if (isset($_POST['natureofcollection2_taxreceipt'])) {
    // Nature of Collection 2
    $mpdf->WriteFixedPosHTML("" . $Natureofcollection2 . "", 11, 89, 43, 90, 'auto');
  }

  // Account Code 2
  if (isset($_POST['accountcode2_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Accountcode2 . "", 55, 88, 25, 90, 'auto');
  }
  // Amount 2
  if (isset($_POST['amount2_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Amount2 . "", 88, 88, 20, 90, 'auto');
  }

  if (isset($_POST['natureofcollection3_taxreceipt'])) {
    // Nature of Collection 3
    $mpdf->WriteFixedPosHTML("" . $Natureofcollection3 . "", 11, 100, 43, 90, 'auto');
  }
  // Account Code 3
  if (isset($_POST['accountcode3_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Accountcode3 . "", 55, 100, 25, 90, 'auto');
  }
  // Amount 3
  if (isset($_POST['amount3_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Amount3 . "", 88, 100, 20, 90, 'auto');
  }

  if (isset($_POST['natureofcollection4_taxreceipt'])) {
    // Nature of Collection 4
    $mpdf->WriteFixedPosHTML("" . $Natureofcollection4 . "", 11, 111, 43, 90, 'auto');
  }
  // Account Code 4
  if (isset($_POST['accountcode4_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Accountcode4 . "", 55, 111, 25, 90, 'auto');
  }

  if (isset($_POST['amount4_taxreceipt'])) {
    // Amount 4
    $mpdf->WriteFixedPosHTML("" . $Amount4 . "", 88, 111, 20, 90, 'auto');
  }

  $mpdf->WriteFixedPosHTML("" . $Totalamount . "", 88, 125, 20, 90, 'auto');

  if (isset($_POST['draweebank_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Draweebank . "", 39, 154, 20, 90, 'auto');
  }

  if (isset($_POST['number_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Numberdrawee . "", 65, 154, 20, 90, 'auto');
  }

  if (isset($_POST['date_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Datedrawee . "", 84, 154, 22, 90, 'auto');
  }

  if (isset($_POST['cash_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("<b> / </b>", 11, 146, 20, 90, 'auto');
  }

  if (isset($_POST['check_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("<b> / </b>", 10, 153, 20, 90, 'auto');
  }

  if (isset($_POST['moneyorder_taxreceipt'])) {
    $mpdf->WriteFixedPosHTML("<b> / </b>", 10, 159, 20, 90, 'auto');
  }

  $mpdf->WriteFixedPosHTML("<b> OFFICER NAME </b>", 51, 177, 70, 100, 'auto');

  $mpdf->Output($FilenameTaxReceipt, 'I');
}

// ---------------------------------------------------------------------------------

// Barangay Certificate Payment Receipt
if (isset($_POST['generate_certreceipt'])) {
  $Payor = $_POST['payor_certreceipt'];
  $Agency = $_POST['agency_certreceipt'];
  $Fund = $_POST['fund_certreceipt'];

  // $Accountcode1 = $_POST['accountcode_certreceipt'];
  // $Amount1 = $_POST['amount1_certreceipt'];



  // $Totalamount = $Amount1 + $Amount2 + $Amount3 + $Amount4;

  $Draweebank =  $_POST['draweebank_certreceipt'];
  $Numberdrawee =  $_POST['number_certreceipt'];
  $Datedrawee =  $_POST['date_certreceipt'];

  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/Y");
  $FileExtension = 'pdf';
  $FilenameTaxReceipt = $Payor . " " . $Agency . "TaxReceipt." . $FileExtension;

  // SQL
  // Cash

  if (isset($_POST['cash_certreceipt']) && ($_POST['cert1_certreceipt'] == 'barangaycert_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Brgy Certificate', 'A', 'Cash','1', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt']) && ($_POST['cert1_certreceipt'] == 'barangayclearance_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Brgy Clearance', 'B', 'Cash','2', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt']) && ($_POST['cert1_certreceipt'] == 'indigencycert_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Indigency Certificate', 'C', 'Cash','3', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt']) && ($_POST['cert1_certreceipt'] == 'certresidency_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cert of Residency', 'D', 'Cash','4', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt'])  && ($_POST['cert1_certreceipt'] == 'healthcertificate_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Health Certificate', 'E', 'Cash','5', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt'])  && ($_POST['cert1_certreceipt'] == 'goodmoral_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Certificate of Good Moral', 'F', 'Cash','6', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt'])  && ($_POST['cert1_certreceipt'] == 'cedula_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cedula', 'G', 'Cash','7', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt']) && ($_POST['cert1_certreceipt'] == 'busclearance_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Business Clearance', 'H', 'Cash','8', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['cash_certreceipt']) && ($_POST['cert1_certreceipt'] == 'cessation_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cessation of Business', 'I', 'Cash','9', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }

  // Check
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'barangaycert_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Brgy Certificate', 'A', 'Check','1', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'barangayclearance_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Brgy Clearance', 'B', 'Check','2', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'indigencycert_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Indigency Certificate', 'C', 'Check','3', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'certresidency_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cert of Residency', 'D', 'Check','4', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'healthcertificate_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Health Certificate', 'E', 'Check','5', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'goodmoral_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Certificate of Good Moral', 'F', 'Check','6', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'cedula_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cedula', 'G', 'Check','7', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'busclearance_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Business Clearance', 'H', 'Check','8', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['check_certreceipt']) && ($_POST['cert1_certreceipt'] == 'cessation_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cessation of Business', 'I', 'Check','9', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }

  // Money Order
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'barangaycert_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Brgy Certificate', 'A', 'Money Order','1', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'barangayclearance_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Brgy Clearance', 'B', 'Money Order','2', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'indigencycert_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Indigency Certificate', 'C', 'Money Order','3', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'certresidency_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cert of Residency', 'D', 'Money Order','4', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'healthcertificate_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Health Certificate', 'E', 'Money Order','5', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'goodmoral_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Certificate of Good Moral', 'F', 'Money Order','6', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'cedula_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cedula', 'G', 'Money Order','7', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'busclearance_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Business Clearance', 'H', 'Money Order','8', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }
  if (isset($_POST['moneyorder_certreceipt']) && ($_POST['cert1_certreceipt'] == 'cessation_certreceipt')) {
    $query = "INSERT into cert_receipt (payor, agency, fund, nature_of_collection, account_code, payment_method, total_amount, drawee_bank, number_drawee, drawee_date, date_issued) values ('$Payor', '$Agency', '$Fund', 'Cessation of Business', 'I', 'Money Order','9', '$Draweebank', '$Numberdrawee', '$Datedrawee', '$date')";
    $result = mysqli_query($conn, $query);
  }

  $mpdf = new \Mpdf\Mpdf([              //width //height
    'default_font_size' => 11, 'format' => [115, 210]
  ]);

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('receipt.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  // Date
  $mpdf->WriteFixedPosHTML("" . $date . "", 53, 40, 62, 90, 'auto');

  // Agency
  if (isset($_POST['agency_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Agency . "", 23, 49, 62, 90, 'auto');
  }

  // Payor
  if (isset($_POST['payor_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Payor . "", 19, 57, 89, 90, 'auto');
  }

  // Fund
  if (isset($_POST['fund_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Fund . "", 96, 49, 20, 90, 'auto');
  }

  // Barangay Certificate
  if ($_POST['cert1_certreceipt'] == 'barangaycert_certreceipt') {
    $mpdf->WriteFixedPosHTML("Brgy Certificate", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("A", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("1", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>1</b>", 88, 125, 20, 90, 'auto');
  }

  // Barangay Clearance
  if ($_POST['cert1_certreceipt'] == 'barangayclearance_certreceipt') {
    $mpdf->WriteFixedPosHTML("Brgy Clearance", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("B", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("2", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>2</b>", 88, 125, 20, 90, 'auto');
  }

  // Indigency Certificate
  if ($_POST['cert1_certreceipt'] == 'indigencycert_certreceipt') {
    $mpdf->WriteFixedPosHTML("Indigency Certificate", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("C", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("3", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>3</b>", 88, 125, 20, 90, 'auto');
  }

  // Certificate of Residency
  if ($_POST['cert1_certreceipt'] == 'certresidency_certreceipt') {
    $mpdf->WriteFixedPosHTML("Certificate of Residency", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("D", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("4", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>4</b>", 88, 125, 20, 90, 'auto');
  }

  // Health Certificate
  if ($_POST['cert1_certreceipt'] == 'healthcertificate_certreceipt') {
    $mpdf->WriteFixedPosHTML("Health Certificate", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("E", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("5", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>5</b>", 88, 125, 20, 90, 'auto');
  }


  // Certificate of Good Moral
  if ($_POST['cert1_certreceipt'] == 'goodmoral_certreceipt') {
    $mpdf->WriteFixedPosHTML("Certificate of Good Moral", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("F", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("6", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>6</b>", 88, 125, 20, 90, 'auto');
  }

  // Cedula
  if ($_POST['cert1_certreceipt'] == 'cedula_certreceipt') {
    $mpdf->WriteFixedPosHTML("Cedula", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("G", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("7", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>7</b>", 88, 125, 20, 90, 'auto');
  }

  // Business Clearance
  if ($_POST['cert1_certreceipt'] == 'busclearance_certreceipt') {
    $mpdf->WriteFixedPosHTML("Business Clearance", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("H", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("8", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>8</b>", 88, 125, 20, 90, 'auto');
  }

  // Cessation of Business
  if ($_POST['cert1_certreceipt'] == 'cessation_certreceipt') {
    $mpdf->WriteFixedPosHTML("Cessation of Business", 11, 77, 43, 90, 'auto');
    $mpdf->WriteFixedPosHTML("I", 55, 77, 25, 90, 'auto');
    $mpdf->WriteFixedPosHTML("9", 88, 76, 20, 90, 'auto');
    $mpdf->WriteFixedPosHTML("<b>9</b>", 88, 125, 20, 90, 'auto');
  }

  // $mpdf->WriteFixedPosHTML("" . $Totalamount . "", 88, 125, 20, 90, 'auto');

  if (isset($_POST['draweebank_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Draweebank . "", 39, 154, 20, 90, 'auto');
  }

  if (isset($_POST['number_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Numberdrawee . "", 65, 154, 20, 90, 'auto');
  }

  if (isset($_POST['date_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("" . $Datedrawee . "", 84, 154, 22, 90, 'auto');
  }

  if (isset($_POST['cash_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("<b> / </b>", 11, 146, 20, 90, 'auto');
  }

  if (isset($_POST['check_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("<b> / </b>", 10, 153, 20, 90, 'auto');
  }

  if (isset($_POST['moneyorder_certreceipt'])) {
    $mpdf->WriteFixedPosHTML("<b> / </b>", 10, 159, 20, 90, 'auto');
  }

  $mpdf->WriteFixedPosHTML("<b> OFFICER NAME </b>", 51, 177, 70, 100, 'auto');

  $mpdf->Output($FilenameTaxReceipt, 'I');
}
