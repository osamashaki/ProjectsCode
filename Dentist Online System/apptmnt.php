<?
session_start();
include("connected.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome..</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {color: #F07166}
.style7 {color: #FF0000}
.style8 {font-weight: bold}
.style10 {color: #FF0000; font-weight: bold; }
-->
</style>
<script type="text/javascript" src="stmenu.js"></script></head>
<body>
<div id="container">
  <div id="banner">
    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>
    <h1 class="style3">&nbsp;</h1>
    </div>
<table width="100%" border="0" align="center" bgcolor="#FCE4D1">
    <tr>
      <td width="20%"><div align="center" class="style8"><a href="index.php">HOME PAGE </a></div></td>
      <td width="20%"><div align="center"><a href="treatments.php">TREATMENTS</a><a href="treatments.php" class="style8"></a></div></td>
      <td width="20%"><div align="center"><a href="register.php">REGISTER</a></div></td>
      <td width="21%"><div align="center" class="style8"><a href="aboutus.php">ABOUT US</a></div></td>
      <td width="19%"><div align="center" class="style8"><a href="contactus.php">CONTACT US</a></div></td>
    </tr>
  </table>

  <div class="intro">
    <h2> We care </h2>
    <div class="scroll">
      <p><img src="img/ser-banner3.jpg" alt="star" /> Make Your Smile Beautiful. </p>
    </div>
  </div>
  <div class="separator"></div>
  <div class="intro2">
    <h2> about </h2>
    <div class="scroll">
      <p><img src="img/star.gif" alt="star" />  <em>Selamat Datang</em>&nbsp;to Our Dental Clinic website!</p>
    </div>
  </div>
  <div class="separator"></div>
  <div class="intro3">
    <h2> your smile </h2>
    <div class="scroll">
      <p><img src="img/rght.jpg" alt="star" />  </p>
    </div>
  </div>
  <div style="clear:both;"></div>
  <div id="sidebar">
    <h1> Links </h1>
    <p>
      <?
		echo "Welcome  "  .$_SESSION ["name"]. "<br/><br/>";
		$pid = $_GET["id"]; 
    ?>
    </p>
    <p><a href="profile.php?id=<? echo $pid; ?>"><strong>My Profile</strong></a></p>
    <p><a href="apptmnt.php?id=<? echo $pid; ?>"><strong>My Appointments</strong></a></p>
    <p><a href="trtment.php?id=<? echo $pid; ?>"><strong>My Treatments</strong></a></p>
    <p><a href="payment.php?id=<? echo $pid; ?>"><strong>My Payments</strong></a></p>
    <p><a href="pmsgs.php?id=<? echo $pid; ?>"><strong>My Messages</strong></a></p>
    <p><strong><a href="logout.php">Log out</a></strong></p>
    <p>&nbsp;</p>
  </div>
  <div id="content">
    <h1><strong>My Appointments</strong></h1>
    
    <table width="483" border="1" cellpadding="0" cellspacing="2" bordercolor="#CCCCCC">
      <tr>
        <td height="30" colspan="4" class="page_heading"><div align="center"></div></td>
      </tr>
     
      <tr>
        <td width="16%" class="style7 form_label_right"><strong>Date:</strong></td>
        <td width="21%"><span class="style10">Time:</span></td>
        <td width="30%"><span class="style10">Treatments:</span></td>
        <td width="33%"><span class="style10">Status:</span></td>
      </tr>
	  <?
	   	$query = "SELECT * FROM appreq WHERE pid = '$pid' order by date_ desc";
		$result = mysql_query($query);
		while($rowApps1 = mysql_fetch_object($result))
		{
			$id    		 	 = $rowApps1->id;
			$date_    	     = $rowApps1->date_;
			$time_    	     = $rowApps1->time_;
			$treatments    	 = $rowApps1->treatments;
			$status    	     = $rowApps1->status;					
	 ?>
      <tr>
        <td><? echo $date_;?></td>
        <td><? echo $time_;?></td>
        <td><? echo $treatments;?></td>
        <td><? if ($status == '1') echo "Accepted" ; else if ($status == '0') echo "Rejected"; else echo $status;?></td>
      </tr>
<?
}
?>
      <tr>
        <td colspan="4"><div align="center">----------------------------------------------</div></td>
      </tr>
	  <tr>
        <td class="style7 form_label_right"><strong>Date:</strong></td>
        <td><span class="style10">Time:</span></td>
        <td><span class="style10">Treatments:</span></td>
        <td class="style10">Details:</td>
      </tr>
	  <?
	  $query = "SELECT * FROM appointment WHERE pid = '$pid' order by date_ desc";
		$result = mysql_query($query);
		while($rowApps1 = mysql_fetch_object($result))
		{
			$id    		 	 = $rowApps1->id;
			$date_    	     = $rowApps1->date_;
			$time_    	     = $rowApps1->time_;
			$treatment    	 = $rowApps1->treatment;
			$details    	 = $rowApps1->details;
							
	 ?>
     
      <tr>
        <td><? echo $date_;?></td>
        <td><? echo $time_;?></td>
		<td><? echo $treatment;?></td>
        <td><? echo $details;?></td>
      </tr>
	  <?
	  }
	  ?>
      <tr>
        <td colspan="4"><p align="center">&nbsp;</p>
          <p align="center">&nbsp;</p>
          <p align="center"><a href="appreq.php?id=<? echo $pid;?>">Reguest an appointment </a></p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="footer"> 
    <div align="center">
      <p>Dental Online System - All Rights Reserved &copy; 2012 DOS SYSTEM      </p>
      </div>
  </div>
</div>
</body>
</html>