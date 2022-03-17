<?php
// API From:
// (Generating of Certificates)
// mPDF
// https://mpdf.github.io/

require_once("../../dbconnection.php");

require_once __DIR__ . '/../../vendor/autoload.php';

// Barangay Certification
if (isset($_POST['generate_certification'])) {
  $id = $_GET['id'];
  $Firstname = $_POST['firstname_certification'];
  $Middlename = $_POST['middlename_certification'];
  $Lastname = $_POST['lastname_certification'];
  $Age = $_POST['age_certification'];
  $Civilstatus = $_POST['civilstatus_certification'];
  $Cedula = $_POST['cedula_certification'];
  $Monthcedula = $_POST['monthcedula'];
  $Daycedula = $_POST['daycedula'];
  $Yearcedula = $_POST['yearcedula'];
  $Address = $_POST['address_certification'];
  $Purpose = $_POST['purpose_certification'];
  $AmountCertification =  $_POST['amount_certification'];
  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");
  $FileExtension = 'pdf';
  $FilenameCertification = $Firstname . " " . $Lastname . "_BarangayCertification." . $FileExtension;


  // SQL
  $query = "INSERT into certification_records (name, age, civilstatus, cedula, monthcedula, daycedula, yearcedula, address, purpose, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', '$Age', '$Civilstatus', '$Cedula', '$Monthcedula', '$Daycedula','$Yearcedula', '$Address', '$Purpose', '$date', '3', '$id');";
  $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('3', '$id', '$datetransaction')";
  $result = mysqli_multi_query($conn, $query);

  $mpdf = new \Mpdf\Mpdf();
  $mpdf->showImageErrors = false;

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('barangaycertification.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  //Name
  $mpdf->WriteFixedPosHTML("<h4>" . $Firstname . " " . $Middlename . " " . $Lastname . "</h4>", 100, 72, 100, 90, 'auto');

  //Age
  if (isset($_POST['age_certification'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Age . "</h4>", 20, 86, 50, 90, 'visible');
  }

  //Civil Status
  if (isset($_POST['civilstatus_certification'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Civilstatus . "</h4>", 67, 86, 50, 90, 'visible');
  }

  //Cedula No.
  if (isset($_POST['cedula_certification'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Cedula . "</h4>", 100, 94, 50, 90, 'visible');
  }

  //Date Issued (Cedula)
  if (isset($_POST['monthcedula'], $_POST['daycedula'], $_POST['yearcedula'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Monthcedula . "/" . $Daycedula . "/" . $Yearcedula . "</h4>", 152, 94, 50, 90, 'visible');
  }

  //Place of Cert Issue
  $mpdf->WriteFixedPosHTML('<h4>PACOL, NAGA CITY</h4>', 45, 102, 150, 90, 'visible');

  //Address
  if (isset($_POST['address_certification'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Address . "</h4>", 85, 111, 150, 90, 'visible');
  }

  //Photo                 
  if (file_exists($_FILES['webcam']['tmp_name']) ||  is_uploaded_file($_FILES['webcam']['tmp_name'])) {
    $filepath = "individual/saved_images" . $_FILES["webcam"]["name"];
    move_uploaded_file($_FILES["webcam"]["tmp_name"], $filepath);
    //  x  y  width height
    $mpdf->Image($filepath, 135, 210, 50, 50, 'jpg', '', true, true);
  }


  //Purpose
  if (isset($_POST['purpose_certification'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Purpose . "</h4>", 30, 130, 150, 90, 'visible');
  }

  //Certificate Issue Date (Day)
  $mpdf->WriteFixedPosHTML("<h4>" . $day . "</h4>", 55, 140, 150, 90, 'visible');

  //Amount Paid
  if (isset($_POST['amount_certification'])) {
    $mpdf->WriteFixedPosHTML("" . $AmountCertification . "", 55, 850, 150, 68, 'visible');
  }

  // Date
  $mpdf->WriteFixedPosHTML("" . $date . "", 50, 800, 150, 45, 'visible');

  //Certificate Issue Date (Month)
  $mpdf->WriteFixedPosHTML(
    "<h4>" . $month . " " . $year . "</h4>",
    97,
    140,
    170,
    90,
    'visible'
  );



  $mpdf->Output($FilenameCertification, 'I');
}

// Business Clearance
if (isset($_POST['generate_busclearance'])) {
  $id = $_GET['id'];
  $Businessname = $_POST['name_busclearance'];
  $Address = $_POST['address_busclearance'];
  $Typeofbusiness = $_POST['type_busclearance'];
  $Owner = $_POST['owner_busclearance'];
  $Residenceaddress = $_POST['resaddress_busclearance'];
  $Appliedfor = $_POST['purpose_busclearance'];
  $Rescert = $_POST['res_cert_busclearance'];
  $Or = $_POST['or_busclearance'];
  $Amount = $_POST['amount_busclearance'];
  $Controlno = $_POST['controlno_busclearance'];

  $FileExtension = 'pdf';
  $FilenameBusClearance = $Businessname . "_BusinessClearance." . $FileExtension;
  date_default_timezone_set('Asia/Manila');
  $Date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");

  // SQL
  $query = "INSERT into busclearance_records (name, address, typeofbusiness, owner, residenceaddress, appliedfor, rescert, or_number, amount, date, cert_type, citizen_id) values ('$Businessname', '$Address', '$Typeofbusiness', '$Owner', '$Residenceaddress', '$Appliedfor', '$Rescert', '$Or','$Amount', '$datetransaction', '1', '$id');";
  $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('1', '$id', '$datetransaction')";
  $result = mysqli_multi_query($conn, $query);

  $mpdf = new \Mpdf\Mpdf();
  $mpdf->showImageErrors = true;

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");
  $issuedate = date("m/d/Y");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('businessclearance.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  $h = $mpdf->hPt;
  $w = $mpdf->wPt;

  $Businessnameoutput = <<<HTML
    <html>
    <body style="margin: 0; padding: 0;">
    <table style="width: {$w}pt; margin: 0; padding: 0;" cellpadding="0" cellspacing="0">
      <tr>
        <td style="height: 390pt; text-align: center; vertical-align: middle; padding: 0px 0px; margin: 0;">
         <h2 style=color:#800000> $Businessname </h1>
        </td>
      </tr>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($Businessnameoutput);

  $Addressoutput = <<<HTML
    <html>
    <body style="margin: 0; padding: 0;">
    <table style="width: {$w}pt; margin: 0; padding: 0;" cellpadding="0" cellspacing="-433">
      <tr>
        <td style="height: 5pt; text-align: center; vertical-align: middle; padding: 0px 5px; margin: 0;">
         <h2> $Address </h2>
        </td>
      </tr>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($Addressoutput);

  //Type of Business
  $Typeofbusinessoutput = <<<HTML
    <html>
    <body style="margin: 0; padding: 0;">
    <table style="width: {$w}pt; margin: 0; padding: 0;" cellpadding="0" cellspacing="0">
      <tr>
        <td style="height: 400pt; text-align: center; vertical-align: middle; padding: 0px 5px; margin: 0;">
         <h2> $Typeofbusiness </h2>
        </td>
      </tr>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($Typeofbusinessoutput);

  //Owner
  $Owneroutput = <<<HTML
    <html>
    <body style="margin: 0; padding: 0;">
    <table style="width: {$w}pt; margin: 0; padding: 0;" cellpadding="0" cellspacing="-430">
      <tr>
        <td style="height: 0pt; text-align: center; vertical-align: middle; padding: 0px 5px; margin: 0;">
         <h2> $Owner </h2>
        </td>
      </tr>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($Owneroutput);

  //Resident Address
  $Residenceaddressoutput = <<<HTML
    <html>
    <body style="margin: 0; padding: 0;">
    <table style="width: {$w}pt; margin: 0; padding: 0;" cellpadding="0" cellspacing="-350">
      <tr>
        <td style="height: 660pt; text-align: center; vertical-align: middle; padding: 0px 5px; margin: 0;">
         <h2> $Residenceaddress </h2>
        </td>
      </tr>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($Residenceaddressoutput);

  //Applied for
  $mpdf->WriteFixedPosHTML("" . $Appliedfor . "", 69, 133, 150, 90, 'visible');

  if (file_exists($_FILES['uploadfile']['tmp_name']) ||  is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
    $filepath = "image/" . $_FILES["uploadfile"]["name"];
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filepath);
    //Photo                 x    y  width height
    $mpdf->Image($filepath, 146, 225, 40, 40, 'jpg', '', true, true);
  }

  // Issue date (Business Clearance(Day))
  $mpdf->WriteFixedPosHTML("<h4>" . $day . "</h4>", 56, 191, 150, 90, 'visible');

  // Issue date (Business Clearance(Month))
  $mpdf->WriteFixedPosHTML(
    "<h4>" . $month . " " . $year . "</h4>",
    97,
    195,
    170,
    90,
    'visible'
  );

  //Res Cert No.
  $mpdf->WriteFixedPosHTML("" . $Rescert . "", 56, 222, 150, 90, 'visible');

  //Issued at
  $mpdf->WriteFixedPosHTML("PACOL, NAGA", 56, 228, 150, 30, 'visible');

  //Issued on (Date)
  $mpdf->WriteFixedPosHTML("" . $issuedate . "", 56, 233, 150, 90, 'visible');

  // OR No.
  $mpdf->WriteFixedPosHTML("" . $Or . "", 56, 244, 150, 90, 'visible');

  // Amount Paid
  $mpdf->WriteFixedPosHTML(" " . $Amount . " ", 56, 250, 150, 90, 'visible');

  // Date (OR)
  $mpdf->WriteFixedPosHTML("" . $issuedate . "", 56, 260, 150, 90, 'visible');

  // Year (Center)
  $mpdf->WriteFixedPosHTML("<h1 style=color:#800000>" . $year . "</h1>", 100, 238, 150, 90, 'visible');

  // Control Number
  $mpdf->WriteFixedPosHTML("<h3 style=color:#800000>" . $Controlno . "</h3>", 100, 273, 150, 90, 'visible');

  $mpdf->Output($FilenameBusClearance, 'I');
}


// Cessation of Business Certificate
if (isset($_POST['generate_cessationbusiness'])) {
  $id = $_GET['id'];
  $Businessname = $_POST['name_cessationbusiness'];
  $Address = $_POST['address_cessationbusiness'];
  $Owner = $_POST['owner_cessationbusiness'];
  $Owneraddress = $_POST['resaddress_cessationbusiness'];
  $MonthCessation = $_POST['month_cessation'];
  $DayCessation = $_POST['day_cessation'];
  $YearCessation = $_POST['year_cessation'];
  $PurposeCessation = $_POST['purpose_cessationbusiness'];
  $FileExtension = 'pdf';
  $FilenameCessation = $Businessname . "_CessationOfBusiness." . $FileExtension;
  date_default_timezone_set('Asia/Manila');

  $Date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");


  // SQL
  $query = "INSERT into cessationbusiness_records (name, address, owner, owner_address, date_of_cessation, purpose, date_issued, cert_type, citizen_id) values ('$Businessname', '$Address', '$Owner', '$Owneraddress', '$MonthCessation $DayCessation, $YearCessation', '$PurposeCessation', '$datetransaction', '5', '$id');";
  $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('5', '$id', '$datetransaction')";
  $result = mysqli_multi_query($conn, $query);


  $mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 16,
  ]);

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");



  $issuedate = date("m/d/Y");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('cessationbusiness.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  $h = $mpdf->hPt;
  $w = $mpdf->wPt;

  $CessationParagraph = <<<HTML
    <html>
    <body style="margin: 20; padding: 0;">
    <table style="width: {$w}pt; margin: 10; padding: 0;" cellpadding="3" cellspacing="20">
      <tr>
        <td style="height: 1000pt; line-height: 1.8; text-align: left; vertical-align: middle; padding: 0px 0px; margin: 0;">
         
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <u style="color:#00006f;">$Businessname</u> located at $Address owned by <b>$Owner </b> of $Owneraddress have stopped operation last $MonthCessation $DayCessation, $YearCessation. </p>  
    <br>
    
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued upon the request of the interested party for <u>$PurposeCessation</u> and/or any legal purpose it may serve.</p>
    <br>
    
        <p style="color:#8B0000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this $day day of $month $year at Barangay Pacol, Naga City, Philippines. </p>
    </tr>
    </td>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($CessationParagraph);

  $mpdf->Output($FilenameCessation, 'I');
}


// Barangay Clearance
if (isset($_POST['generate_clearance'])) {
  $id = $_GET['id'];
  $Firstname = $_POST['firstname_clearance'];
  $Middlename = $_POST['middlename_clearance'];
  $Lastname = $_POST['lastname_clearance'];
  $Age = $_POST['age_clearance'];
  $Civilstatus = $_POST['civilstatus_clearance'];
  $Cedula = $_POST['cedula_clearance'];
  $CedulaIssuedAt = $_POST['cedulaissued_clearance'];
  $Monthcedula = $_POST['monthcedula'];
  $Daycedula = $_POST['daycedula'];
  $Yearcedula = $_POST['yearcedula'];
  $Address = $_POST['address_clearance'];
  $Purpose = $_POST['purpose_clearance'];
  $AmountClearance = $_POST['amount_clearance'];
  $OR = $_POST['ornumber_clearance'];
  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");

  $FileExtension = 'pdf';
  $FilenameClearance = $Firstname . " " . $Lastname . "_BarangayClearance." . $FileExtension;

  // SQL
  $query = "INSERT into clearance_records (name, age, civil_status, address, purpose, or_number, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', '$Age', '$Civilstatus', '$Address', '$Purpose', '$OR', '$date', '6', '$id');";
  $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('6', '$id', '$datetransaction')";
  $result = mysqli_multi_query($conn, $query);

  $mpdf = new \Mpdf\Mpdf();
  $mpdf->showImageErrors = true;


  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('barangayclearance.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  //Name
  $mpdf->WriteFixedPosHTML("<h4>" . $Firstname . " " . $Middlename . " " . $Lastname . "</h4>", 100, 75, 100, 90, 'auto');

  //Age
  $mpdf->WriteFixedPosHTML("<h4>" . $Age . "</h4>", 27, 88, 50, 90, 'visible');

  //Civil Status
  $mpdf->WriteFixedPosHTML("<h4>" . $Civilstatus . "</h4>", 68, 88, 50, 90, 'visible');

  //Cedula No.
  $mpdf->WriteFixedPosHTML("<h4>" . $Cedula . "</h4>", 100, 94, 50, 90, 'visible');

  //Date
  $mpdf->WriteFixedPosHTML("<h4>" . $Monthcedula . "/" . $Daycedula . "/" . $Yearcedula . "</h4>", 154, 94, 50, 90, 'visible');

  //Place of Cert Issue
  $mpdf->WriteFixedPosHTML("<h4>" . $CedulaIssuedAt . "</h4>", 45, 100, 150, 90, 'visible');

  //Address
  $mpdf->WriteFixedPosHTML("<h4>" . $Address . "</h4>", 85, 107, 150, 90, 'visible');

  //Purpose
  $mpdf->WriteFixedPosHTML("<h4>" . $Purpose . "</h4>", 40, 137, 150, 90, 'visible');

  //Certificate Issue Date (Day)
  $mpdf->WriteFixedPosHTML("<h4>" . $day . "</h4>", 60, 147, 150, 90, 'visible');

  //Certificate Issue Date (Month)
  $mpdf->WriteFixedPosHTML(
    "<h4>" . $month . " " . $year . "</h4>",
    91,
    147,
    170,
    90,
    'visible'
  );

  //Amount Paid
  $mpdf->WriteFixedPosHTML("" . $AmountClearance . "", 55, 860, 150, 63, 'visible');

  if (file_exists($_FILES['uploadfile']['tmp_name']) ||  is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
    $filepath = "image/" . $_FILES["uploadfile"]["name"];
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filepath);
    //Photo                 x    y //width //height
    $mpdf->Image($filepath, 135, 210, 50, 50, 'jpg', '', true, true);
  }

  //OR Number
  $mpdf->WriteFixedPosHTML("" . $OR . "", 55, 900, 150, 48, 'visible');

  //Date
  $mpdf->WriteFixedPosHTML("" . $date . "", 55, 900, 150, 40, 'visible');

  $mpdf->Output($FilenameClearance, 'I');
}

// Indigency Certificate
if (isset($_POST['generate_indigency'])) {
  $id = $_GET['id'];
  $Firstname = $_POST['firstname_indigency'];
  $Middlename = $_POST['middlename_indigency'];
  $Lastname = $_POST['lastname_indigency'];
  $Age = $_POST['age_indigency'];
  $Civilstatus = $_POST['civilstatus_indigency'];
  $Address = $_POST['address_indigency'];
  $Purpose = $_POST['purpose_indigency'];
  $CTC = $_POST['ctcnumber_indigency'];
  date_default_timezone_set('Asia/Manila');
  $datetransaction = date("Y-m-d h:i:sa");
  $date = date("m/d/y");


  $FileExtension = 'pdf';
  $Filenameindigency = $Firstname . " " . $Lastname . "_IndigencyCertificate." . $FileExtension;

  // SQL
  $query = "INSERT into indigency_records (name, age, civil_status, address, purpose, ctc_number, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', '$Age', '$Civilstatus', '$Address', '$Purpose', '$CTC', '$date', '9', '$id');";
  $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('9', '$id', '$datetransaction')";
  $result = mysqli_multi_query($conn, $query);

  $mpdf = new \Mpdf\Mpdf();
  $mpdf->showImageErrors = true;

  $today = date("m/d/Y");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('certindigency.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  //Name
  $mpdf->WriteFixedPosHTML("<h4>" . $Firstname . " " . $Middlename . " " . $Lastname . "</h4>", 100, 86, 100, 90, 'auto');

  //Age
  $mpdf->WriteFixedPosHTML("<h4>" . $Age . "</h4>", 24, 98, 50, 90, 'visible');

  //Civil Status
  $mpdf->WriteFixedPosHTML("<h4>" . $Civilstatus . "</h4>", 86, 97, 50, 90, 'visible');

  //Place of Cert Issue
  $mpdf->WriteFixedPosHTML('<h4>PACOL, NAGA CITY</h4>', 50, 247, 150, 90, 'visible');

  //Address
  $mpdf->WriteFixedPosHTML("<h4>" . $Address . "</h4>", 85, 109, 150, 90, 'visible');

  //Purpose
  if (isset($_POST['purpose_indigency'])) {
    $mpdf->WriteFixedPosHTML("<h4>" . $Purpose . "</h4>", 64, 154, 150, 90, 'visible');
  }

  if (file_exists($_FILES['uploadfile']['tmp_name']) ||  is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
    $filepath = "image/" . $_FILES["uploadfile"]["name"];
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filepath);
    //Photo                 x    y //width //height
    $mpdf->Image($filepath, 133, 217, 50, 50, 'jpg', '', true, true);
  }

  //Certificate Issue Date (Day)
  $mpdf->WriteFixedPosHTML("<h4>" . $day . "</h4>", 69, 165, 150, 90, 'visible');

  //Certificate Issue Date (Month)
  $mpdf->WriteFixedPosHTML(
    "<h4>" . $month . " " . $year . "</h4>",
    112,
    164,
    170,
    90,
    'visible'
  );

  //CTC Number
  if (isset($_POST['ctcnumber_indigency'])) {
    $mpdf->WriteFixedPosHTML("" . $CTC . "", 55, 805, 150, 72, 'visible');
  }

  //Date
  $mpdf->WriteFixedPosHTML("<h4>" . $today . "</h4>", 55, 805, 150, 60, 'visible');

  $mpdf->Output($Filenameindigency, 'I');
}

// Residency Certificate / Certificate of Residency
if (isset($_POST['generate_residency'])) {
  $id = $_GET['id'];
  $Firstname = $_POST['firstname_residency'];
  $Middlename = $_POST['middlename_residency'];
  $Lastname = $_POST['lastname_residency'];
  $Civilstatus = $_POST['civilstatus_residency'];
  $Address = $_POST['address_residency'];
  $YearsResidency = $_POST['years_residency'];
  $PurposeResidency = $_POST['purpose_residency'];
  $FileExtension = 'pdf';
  $FilenameResidency = $Firstname . " " . $Lastname . "_CertificateOfResidency." . $FileExtension;
  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");

  // SQL
  $query = "INSERT into certresidency_records (name, civil_status, address, years_of_residency, purpose, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', '$Civilstatus', '$Address', '$YearsResidency', '$PurposeResidency', '$date', '4', '$id');";
  $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('4', '$id', '$datetransaction')";
  $result = mysqli_multi_query($conn, $query);

  $mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 16,
  ]);

  $mpdf->showImageErrors = true;

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $issuedate = date("m/d/Y");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('certresidency.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  $h = $mpdf->hPt;
  $w = $mpdf->wPt;

  $ResidencyParagraph = <<<HTML
    <html>
    <body style="margin: 20; padding: 0;">
    <table style="width: {$w}pt; margin: 10; padding: 0;" cellpadding="3" cellspacing="20">
      <tr>
        <td style="height: 1000pt; line-height: 1.8; text-align: left; vertical-align: middle; padding: 0px 0px; margin: 0;">
         
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <u style="color:#00006f;">$Firstname $Middlename $Lastname</u> of legal age, $Civilstatus and a resident of <b>$Address </b> for $YearsResidency years and has <b>NO DEROGATORY RECORD/S</b> in this office. </p>  
    <br>
    
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is issued upon the request of the interested party for <u>$PurposeResidency</u> and/or any legal purpose it may serve.</p>
    <br>
    
        <p style="color:#8B0000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this $day day of $month $year at Barangay Pacol, Naga City, Philippines. </p>
    </tr>
    </td>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($ResidencyParagraph);

  if (file_exists($_FILES['uploadfile']['tmp_name']) ||  is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
    $filepath = "image/" . $_FILES["uploadfile"]["name"];
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filepath);
    //Photo                 x    y //width //height
    $mpdf->Image($filepath, 30, 174, 45, 45, 'jpg', '', true, true);
  }

  $mpdf->Output($FilenameResidency, 'I');
}

// Health Certificate (Physically able to work)
if (isset($_POST['generate_healthcertificate'])) {
  $id = $_GET['id'];
  $Firstname = $_POST['firstname_healthcertificate'];
  $Middlename = $_POST['middlename_healthcertificate'];
  $Lastname = $_POST['lastname_healthcertificate'];
  $Gender = $_POST['gender_healthcertificate'];
  $Civilstatus_healthcert = $_POST['civilstatus_healthcertificate'];
  $Address = $_POST['address_healthcertificate'];
  $Purpose = $_POST['purpose_healthcertificate'];
  $FileExtension = 'pdf';
  $Filenamehealthcertificate = $Firstname . " " . $Lastname . "_HealthCertificate." . $FileExtension;


  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");
  // SQL

  if ($_POST['gender_healthcertificate'] == "He") {
    $query = "INSERT into healthcert_records (name, sex, civil_status, address, purpose, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', 'Male', '$Civilstatus_healthcert', '$Address', '$Purpose', '$datetransaction', '8', '$id');";
    $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('8', '$id', '$datetransaction')";
    $result = mysqli_multi_query($conn, $query);
  }

  if ($_POST['gender_healthcertificate'] == "She") {
    $query = "INSERT into healthcert_records (name, sex, civil_status, address, purpose, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', 'Female', '$Civilstatus_healthcert', '$Address', '$Purpose', '$datetransaction', '8', '$id');";
    $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('8', '$id', '$datetransaction')";
    $result = mysqli_multi_query($conn, $query);
  }

  $mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 16,
  ]);

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $issuedate = date("m/d/Y");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('healthcertificate.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  $h = $mpdf->hPt;
  $w = $mpdf->wPt;

  $healthcertificateParagraph = <<<HTML
    <html>
    <body style="margin: 24; padding: 0;">
    <table style="width: {$w}pt; margin: 13; padding: 0;" cellpadding="3" cellspacing="20">
      <tr>
        <td style="height: 1120pt; line-height: 1.8; text-align: left; vertical-align: middle; padding: 0px 0px; margin: 0;">
         
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <u style="color:#00006f;">$Firstname $Middlename $Lastname</u> of legal age, $Civilstatus and residing at <b>$Address </b> is a legitimate and bona fide resident of this barangay. </p>
    <br>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject individuals has no immunodeficiency, comorbidity condition, or other health risks. Furthermore, $Gender have observed home quarantine and is not a person under Person Under Monitoring (PUM) or Person Under Investigation (PUI) in relation to COVID-19. $Gender's also free from that virus as of this date and is <b>PHYSICALLY FIT to work.</b> For verification of City Health Office.</p>
    <br>
    
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is being issued upon the request of the interested party for $Purpose purpose only. </p>
    <br>
        <p style="color:#8B0000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Given this $day day of $month $year at Barangay Pacol, Naga City, Philippines. </p>
      </tr>
    </td>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($healthcertificateParagraph);

  $mpdf->Output($Filenamehealthcertificate, 'I');
}

// Certificate of Good Moral
if (isset($_POST['generate_goodmoral'])) {
  $id = $_GET['id'];
  $Firstname = $_POST['firstname_goodmoral'];
  $Middlename = $_POST['middlename_goodmoral'];
  $Lastname = $_POST['lastname_goodmoral'];
  $Gender = $_POST['gender_goodmoral'];
  $Civilstatus = $_POST['civilstatus_goodmoral'];
  $Address = $_POST['address_goodmoral'];
  $Purpose = $_POST['purpose_goodmoral'];
  $FileExtension = 'pdf';
  $Filenamegoodmoral = $Firstname . " " . $Lastname . "_GoodMoral." . $FileExtension;
  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");

  // SQL
  if ($_POST['gender_goodmoral'] == "him") {
    $query = "INSERT into goodmoral_records (name, gender, civil_status, address, purpose, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', 'Male', '$Civilstatus', '$Address', '$Purpose', '$datetransaction', '7', '$id');";
    $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('7', '$id', '$datetransaction')";
    $result = mysqli_multi_query($conn, $query);
  }

  if ($_POST['gender_goodmoral'] == "her") {
    $query = "INSERT into goodmoral_records (name, gender, civil_status, address, purpose, date, cert_type, citizen_id) values ('$Firstname $Middlename $Lastname', 'Female', '$Civilstatus', '$Address', '$Purpose', '$datetransaction', '7', '$id');";
    $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('7', '$id', '$datetransaction')";
    $result = mysqli_multi_query($conn, $query);
  }

  $mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 18,
  ]);

  $mpdf->showImageErrors = true;

  $today = date("Y-m-d");
  $year = date("Y");
  $day = date("jS");
  $month = date("F");

  $issuedate = date("m/d/Y");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

  $mpdf->SetDefaultBodyCSS('background', "url('goodmoral.jpg')");
  $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  $h = $mpdf->hPt;
  $w = $mpdf->wPt;

  $goodmoralParagraph = <<<HTML
    <html>
    <body style="margin: 24; padding: 0;">
    <table style="width: {$w}pt; margin: 13; padding: 0;" cellpadding="3" cellspacing="20">
      <tr>
        <td style="height: 1120pt; line-height: 1.8; text-align: left; vertical-align: middle; padding: 0px 0px; margin: 0;">
         
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b style="color:#00006f;"><u>$Firstname $Middlename $Lastname</u></b>, whose signature appears below, of legal age, $Civilstatus, Filipino, is a bona fide and legitimate resident of $Address is a person of <b> GOOD MORAL CHARACTER </b> and has <b> NO DEROGATORY RECORD/S </b> nor any complaint filed against $Gender by any person or entity. </p>
    <br> 
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certification is being issued upon the request of the interested party for <u>$Purpose</u> and/or any legal purpose it may serve. </p>
    <br>
        <p style="color:#8B0000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Given this $day day of $month $year at Barangay Pacol, Naga City, Philippines. </p>
      </tr>
    </td>
    </table>
    </html>
    HTML;

  $mpdf->WriteHTML($goodmoralParagraph);

  if (file_exists($_FILES['uploadfile']['tmp_name']) ||  is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
    $filepath = "image/" . $_FILES["uploadfile"]["name"];
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filepath);
    //Photo                 x    y //width //height
    $mpdf->Image($filepath, 35, 192, 35, 35, 'jpg', '', true, true);
  }

  $mpdf->Output($Filenamegoodmoral, 'I');
}


// Cedula
if (isset($_POST['generate_cedula'])) {
  $id = $_GET['id'];
  $Surname = $_POST['surname_cedula'];
  $Firstname = $_POST['firstname_cedula'];
  $Middlename = $_POST['middlename_cedula'];
  $TIN1 = $_POST['tin1_cedula'];
  $TIN2 = $_POST['tin2_cedula'];
  $TIN3 = $_POST['tin3_cedula'];
  $TIN4 = $_POST['tin4_cedula'];
  $TIN5 = $_POST['tin5_cedula'];
  $TIN6 = $_POST['tin6_cedula'];
  $TIN7 = $_POST['tin7_cedula'];
  $TIN8 = $_POST['tin8_cedula'];
  $TIN9 = $_POST['tin9_cedula'];
  $Address = $_POST['address_cedula'];
  $Citizenship = $_POST['citizenship_cedula'];
  $ICR = $_POST['icr_cedula'];
  $Placeofbirth = $_POST['placeofbirth_cedula'];
  $Height1 = $_POST['height1_cedula'];
  $Height2 = $_POST['height2_cedula'];
  $Occupation = $_POST['occupation_cedula'];
  $Birthmonth = $_POST['birthmonthcedula'];
  $Birthday = $_POST['birthdaycedula'];
  $Birthyear = $_POST['birthyearcedula'];
  $Weight = $_POST['weight_cedula'];
  $Grossreceipt_taxable = $_POST['grossreceipt_taxable'];
  $Salary_taxable = $_POST['salary_taxable'];
  $Income_taxable = $_POST['income_taxable'];
  $Grossreceipt_communitytax = ($Grossreceipt_taxable);
  $Salary_communitytax = ($Salary_taxable);
  $Income_communitytax = ($Income_taxable);
  $Interest = $_POST['interest_cedula'];
  $Total = (($Grossreceipt_communitytax + $Salary_communitytax + $Income_communitytax) / 1000) * 1;

  date_default_timezone_set('Asia/Manila');
  $date = date("m/d/y");
  $datetransaction = date("Y-m-d h:i:sa");

  $FileExtension = 'pdf';
  $Filenamecedula = $Firstname . " " . $Surname . "_Cedula." . $FileExtension;



  // SQL
  //Male (Database)
  if (isset($_POST['male_cedula'])) {
    if (isset($_POST['male_cedula'], $_POST['single_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Male', '$Citizenship', '$ICR', 'Single', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }

    if (isset($_POST['male_cedula'], $_POST['married_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Male', '$Citizenship', '$ICR', 'Married', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }

    if (isset($_POST['male_cedula'], $_POST['widowed_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Male', '$Citizenship', '$ICR', 'Widower', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }

    if (isset($_POST['male_cedula'], $_POST['divorced_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Male', '$Citizenship', '$ICR', 'Divorced', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }
  }


  //Female (Database)
  if (isset($_POST['female_cedula'])) {
    if (isset($_POST['female_cedula'], $_POST['single_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Female', '$Citizenship', '$ICR', 'Single', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }

    if (isset($_POST['female_cedula'], $_POST['married_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Female', '$Citizenship', '$ICR', 'Married', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }

    if (isset($_POST['female_cedula'], $_POST['widowed_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Female', '$Citizenship', '$ICR', 'Widowed', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }

    if (isset($_POST['female_cedula'], $_POST['divorced_cedula'])) {
      $query = "INSERT into cedula_records (name, tin, address, sex, citizenship, icr_no, civil_status, occupation, date, cert_type, citizen_id) values ('$Firstname $Middlename $Surname', '$TIN1$TIN2$TIN3 $TIN4$TIN5$TIN6 $TIN7$TIN8$TIN9', '$Address', 'Female', '$Citizenship', '$ICR', 'Divorced', '$Occupation', '$datetransaction', '2', '$id');";
      $query .= "INSERT into transactions (cert_id, citizen_id, date) values ('2', '$id', '$datetransaction')";
      $result = mysqli_multi_query($conn, $query);
    }
  }

  $mpdf = new \Mpdf\Mpdf([              //width //height
    'default_font_size' => 10, 'format' => [152, 110]
  ]);

  date_default_timezone_set('Asia/Manila');
  $today = date("Y-m-d");
  $year = date("y");
  $day = date("jS");
  $month = date("F");
  $monthissued = date("m");
  $dayissued = date("d");

  $issuedate = date("m/d/Y");

  $mpdf->useSubstitutions = false;
  $mpdf->setAutoTopMargin = 'stretch';
  $mpdf->SetDisplayMode('fullpage');

//   $mpdf->SetDefaultBodyCSS('background', "url('cedula.jpg')");
//   $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

  //Year
  $mpdf->WriteFixedPosHTML($year, 6, 16.5, 30, 30, 'auto');

  //Place of Issue
  $mpdf->WriteFixedPosHTML("<b>PACOL, NAGA CITY</b>", 21, 16.5, 40, 30, 'auto');

  //Date issued (Month)
  $mpdf->WriteFixedPosHTML($monthissued, 68, 16.5, 40, 30, 'auto');

  //Date issued (Day)
  $mpdf->WriteFixedPosHTML($dayissued, 78, 16.5, 40, 30, 'auto');

  //Date issued (Year)
  $mpdf->WriteFixedPosHTML($year, 88, 16.5, 40, 30, 'auto');

  //Surname
  if (isset($_POST['surname_cedula'])) {
    $mpdf->WriteFixedPosHTML($Surname, 7, 23, 30, 30, 'auto');
  }

  //First Name
  if (isset($_POST['firstname_cedula'])) {
    $mpdf->WriteFixedPosHTML($Firstname, 36, 23, 30, 30, 'auto');
  }

  //Middle Name
  if (isset($_POST['middlename_cedula'])) {
    $mpdf->WriteFixedPosHTML($Middlename, 70, 23, 30, 30, 'auto');
  }


  // TIN 1
  if (isset($_POST['tin1_cedula'], $_POST['tin2_cedula'], $_POST['tin3_cedula'], $_POST['tin4_cedula'], $_POST['tin5_cedula'], $_POST['tin6_cedula'], $_POST['tin7_cedula'], $_POST['tin8_cedula'], $_POST['tin9_cedula'])) {
    $mpdf->WriteFixedPosHTML($TIN1, 108, 22, 30, 30, 'auto');
    // TIN 2
    $mpdf->WriteFixedPosHTML($TIN2, 112, 22, 30, 30, 'auto');
    // TIN 3
    $mpdf->WriteFixedPosHTML($TIN3, 116, 22, 30, 30, 'auto');

    // TIN 4
    $mpdf->WriteFixedPosHTML($TIN4, 121, 22, 30, 30, 'auto');
    // TIN 5
    $mpdf->WriteFixedPosHTML($TIN5, 125, 22, 30, 30, 'auto');
    // TIN 6
    $mpdf->WriteFixedPosHTML($TIN6, 128, 22, 30, 30, 'auto');

    // TIN 7
    $mpdf->WriteFixedPosHTML($TIN7, 134, 22, 30, 30, 'auto');
    // TIN 8
    $mpdf->WriteFixedPosHTML($TIN8, 137, 22, 30, 30, 'auto');
    // TIN 9
    $mpdf->WriteFixedPosHTML($TIN9, 141, 22, 30, 30, 'auto');
  }

  // Address
  if (isset($_POST['address_cedula'])) {
    $mpdf->WriteFixedPosHTML($Address, 7, 29, 90, 30, 'auto');
  }

  if (isset($_POST['male_cedula'])) {
    // Sex (Male)
    $mpdf->WriteFixedPosHTML("/", 112, 25, 90, 30, 'auto');
  }
  if (isset($_POST['female_cedula'])) {
    // Sex (Female)
    $mpdf->WriteFixedPosHTML("/", 112, 28, 90, 30, 'auto');
  }

  // Citizenship
  $mpdf->WriteFixedPosHTML($Citizenship, 7, 34, 90, 30, 'auto');

  //ICR
  if (isset($_POST['icr_cedula'])) {
    $mpdf->WriteFixedPosHTML($ICR, 35, 34, 90, 30, 'auto');
  }

  //Place of Birth
  if (isset($_POST['placeofbirth_cedula'])) {
    $mpdf->WriteFixedPosHTML($Placeofbirth, 70, 34, 90, 30, 'auto');
  }

  if (isset($_POST['height1_cedula'], $_POST['height2_cedula'])) {
    //Height
    $mpdf->WriteFixedPosHTML($Height1 . "' " . $Height2 . "\"", 130, 34, 90, 30, 'auto');
  }

  // Civil Status
  if (isset($_POST['single_cedula'])) {
    // Single (Civil Status)
    $mpdf->WriteFixedPosHTML("/", 20, 37, 90, 30, 'auto');
  }

  if (isset($_POST['married_cedula'])) {
    // Married (Civil Status)
    $mpdf->WriteFixedPosHTML("/", 20, 41, 90, 30, 'auto');
  }

  if (isset($_POST['widowed_cedula'])) {
    // Widowed (Civil Status)
    $mpdf->WriteFixedPosHTML("/", 42, 37, 90, 30, 'auto');
  }

  if (isset($_POST['divorced_cedula'])) {
    // Divorced (Civil Status)
    $mpdf->WriteFixedPosHTML("/", 42, 41, 90, 30, 'auto');
  }
  if (isset($_POST['birthmonthcedula'], $_POST['birthdaycedula'], $_POST['birthyearcedula'])) {
    // Date of Birth
    $mpdf->WriteFixedPosHTML($Birthmonth . "/" . $Birthday . "/" . $Birthyear, 105, 40, 90, 30, 'auto');
  }

  if (isset($_POST['weight_cedula'])) {
    // Weight
    $mpdf->WriteFixedPosHTML($Weight . "kg", 135, 40, 90, 30, 'auto');
  }
  if (isset($_POST['occupation_cedula'])) {
    // Occupation
    $mpdf->WriteFixedPosHTML($Occupation, 7, 46, 90, 30, 'auto');
  }
  // Basic Community Tax (P 5.00 or P 1.00)
  if (isset($_POST['5_cedula'])) {
    $mpdf->WriteFixedPosHTML("5.00", 135, 51, 90, 30, 'auto');
  }

  if (isset($_POST['1_cedula'])) {
    $mpdf->WriteFixedPosHTML("1.00", 135, 51, 90, 30, 'auto');
  }
  // Gross Receipt (Taxable)
  if (isset($_POST['grossreceipt_taxable'])) {
    $mpdf->WriteFixedPosHTML($Grossreceipt_taxable, 108, 63, 90, 30, 'auto');
  }
  // Salary (Taxable)
  if (isset($_POST['salary_taxable'])) {
    $mpdf->WriteFixedPosHTML($Salary_taxable, 108, 68, 90, 30, 'auto');
  }
  // Income (Taxable)
  if (isset($_POST['income_taxable'])) {
    $mpdf->WriteFixedPosHTML($Income_taxable, 108, 74, 90, 30, 'auto');
  }
  // Gross Receipt (Community Tax)
  if (!empty($Grossreceipt_communitytax)) {
    $mpdf->WriteFixedPosHTML($Grossreceipt_communitytax, 135, 63, 90, 30, 'auto');
  }
  // Salary (Community Tax)
  if (!empty($Salary_communitytax)) {
    $mpdf->WriteFixedPosHTML($Salary_communitytax, 135, 68, 90, 30, 'auto');
  }

  // Income (Community Tax)
  if (!empty($Income_communitytax)) {
    $mpdf->WriteFixedPosHTML($Income_communitytax, 135, 74, 90, 30, 'auto');
  }


  if (isset($_POST['5_cedula'])) {
    $TotalCompute = $Total + 5;
    $Totalamountpaid = $TotalCompute + $Interest;
    $mpdf->WriteFixedPosHTML($TotalCompute, 135, 80, 90, 30, 'auto');
    // Total Amount Paid
    if (!empty($Totalamountpaid)) {
      $mpdf->WriteFixedPosHTML($Totalamountpaid, 135, 94, 90, 30, 'auto');
    }
  }

  if (isset($_POST['1_cedula'])) {
    $TotalCompute = $Total + 1;
    $Totalamountpaid = $TotalCompute + $Interest;
    $mpdf->WriteFixedPosHTML($TotalCompute, 135, 80, 90, 30, 'auto');
    // Total Amount Paid
    if (!empty($Totalamountpaid)) {
      $mpdf->WriteFixedPosHTML($Totalamountpaid, 135, 94, 90, 30, 'auto');
    }
  }



  // Interest
  if (isset($_POST['interest_cedula'])) {
    $mpdf->WriteFixedPosHTML($Interest, 135, 87, 90, 30, 'auto');
  }





  // Treasurer's Name
  $mpdf->WriteFixedPosHTML('<b>TREASURER\'S NAME</b>', 46, 99, 90, 30, 'auto');

  $mpdf->Output($Filenamecedula, 'I');
}
