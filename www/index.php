<?
  $title = "Online diff";
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script type="text/javascript" src="logic.js"></script>
    <script type="text/javascript" src="prototype.js"></script>
    <title><? echo $title; ?></title>
  </head>
<body onload="init_mon()">
  <p class='hdr'><? echo $title; ?></p>
  <br>
  <form id='finp' class='finp' method='#'>
    <table border=0 cellspacing=0 cellpadding=7 align=center>
      <tr>
        <td><textarea cols=50 rows=10 id='st_src1' name='st_src1'></textarea>
        <td><select name='st_form'>
              <option value='0'>Unified
              <option value='1'>Copied
        <td><textarea cols=50 rows=10 id='st_src2' name='st_src2'></textarea>
      <tr>
        <td align=center><img src='cl.png' title='Clear left' class='cl' onclick='clinps("st_src1");'>
        <td align=center><img src='cl.png' title='Clear ALL' class='cl' onclick='clinps("st_src1"); clinps("st_src2");'>
        <td align=center><img src='cl.png' title='Clear right' class='cl' onclick='clinps("st_src2");'>
    </table>
  </form>
  <hr>
  <div id='res'></div>
</body>
</html>
