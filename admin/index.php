<?php 
include_once"../includes/midas.inc.php"; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0032)http://69.61.15.150/~dish/admin/ -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR></HEAD>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD align=left width=73 bgColor=#121D4A height=61><A 
            href="admin_desktop.php?sessionTop=1"><img src="../images/logo.jpg" border="0" height="75" width="150" /></A></TD>
          <TD 
          style="BACKGROUND-IMAGE: url(images/smart_admin_bg.jpg); BACKGROUND-REPEAT: no-repeat" 
          align=left width=970 bgColor=#3A73BA></TD>
        </TR>
        <TR bgColor=#ffffff>
          <TD align=left colSpan=2 height=1></TD></TR>
        <TR>
          <TD colSpan=2 height=1></TD></TR>
        <TR>
          <TD bgColor=#3A73BA colSpan=2 height=3></TD></TR>
        <TR>
          <TD colSpan=2 height=1></TD></TR>
        <TR vAlign=top align=left bgColor=#505a6a>
          <TD bgColor=#b8bdc8 colSpan=2 height=1><IMG height=1 alt="" src="" 
            width=2></TD></TR>
        <TR vAlign=top align=left bgColor=#f1f5fb>
          <TD style="BACKGROUND-IMAGE: url(images/smart_bg_1.jpg)" colSpan=2 
          height=27>&nbsp;</TD></TR>
        <TR vAlign=top align=left bgColor=#000000>
          <TD bgColor=#b8bdc8 colSpan=2 height=1></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD height=50>&nbsp;</TD></TR>
  <TR>
    <TD align=middle height=352>
      <TABLE width="45%" border=0 align="center" cellPadding=0 cellSpacing=0>
        <TBODY>
        <TR>
          <TD align=left><img height=42 alt="Main Administrator Login" 
            src="images/secure_login.gif" width=212></TD>
        </TR>
        <TR>
          <TD vAlign=top>&nbsp;</TD></TR>
        <TR>
          <TD>
            <TABLE cellSpacing=1 cellPadding=15 width="100%" bgColor=#cfcfcf 
            border=0>
              <TBODY>
              <TR>
                <TD bgColor=#f5f5f5>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD align=left width="9%"><IMG height=32 alt="" 
                        src="images/login_icon.gif" width=32></TD>
                      <TD class=blue_txt vAlign=top align=left 
                        width="91%"><FONT class=blue_txt 
                        face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Welcome 
                        to <?php echo SITE_NAME;?> Admin! </STRONG></FONT></TD></TR>
                    <TR>
                      <TD align=left>&nbsp;</TD>
                      <TD class=gray_txt vAlign=top align=center><?php echo display_session_msg();?></TD>
                    </TR>
                    <TR>
                      <TD align=left colSpan=2>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%" 
border=0>
                          <TBODY>
                          <TR>
                            <TD class=gray_txt vAlign=top width="34%">Please 
                              enter a valid username and password to gain access 
                              to the administration console.</TD>
                            <TD vAlign=top align=right width="66%">
                              <TABLE cellSpacing=1 cellPadding=7 width="100%" 
                              bgColor=#cfcfcf border=0>
                                <TBODY>
                                <TR>
                                <TD bgColor=#efefef>
     <FORM name="details" action="valid_admin.php" method="post" onSubmit="return login_check('details');">
                                <TABLE cellSpacing=0 cellPadding=1 width="100%" 
                                border=0>
                                <TBODY>
                                <TR>
                                <TD class=gray_txt 
                                align=left><STRONG>Username</STRONG></TD></TR>
                                <TR>
                                <TD align=left><INPUT class=textbox size=38 
                                name=username_admin> </TD></TR>
                                <TR>
                                <TD class=gray_txt 
                                align=left><STRONG>Password</STRONG></TD></TR>
                                <TR>
                                <TD align=left><INPUT class=textbox 
                                type=password size=38 
                                name=password_admin></TD></TR>
                                <TR>
                                <TD height=4></TD></TR>
                                <TR>
        <TD align=left><INPUT type=hidden value=login 
                                name=login> <INPUT type=image height=22 
                                alt=Submit width=82 
                                src="images/submit.gif" border=0 
                                name=Submit>        </TD></TR></TBODY></TABLE></FORM></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="100%"></TD></TR>
        <TR bgColor=#92b2d6>
          <TD bgColor=#ffffff height=38></TD></TR>
        <TR bgColor=#92b2d6>
          <TD bgColor=#729ACD height=7></TD></TR>
        <TR bgColor=#eaeaea>
          <TD class="padlft15 footer_txt" bgColor=#f1f5fb 
            height=50>&nbsp;Copyright 2009 <?php echo SITE_NAME;?>  Inc. All Rights 
            Reserved.<BR>Reproduction in whole or in part in any form or medium 
            without express written permission is prohibited. </TD></TR>
        <TR bgColor=#eaeaea>
          <TD class=gray_txt 
height=5></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></BODY></HTML>