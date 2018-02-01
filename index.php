<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>GitHub search</title>
    <script src="script.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body id="body">
<script language="JavaScript" type="text/javascript" src="dynamicTable.js"></script>
<?php
$all = $_POST;
?>
<div class="req_body">
        <form method="post" action="index.php">
            <table id="t_equipment_add" width="50%" border="1" cellspacing="0" cellpadding="0">
            <tbody id="dynamic">
            <td style="display: none" value="1">
            </td>
            <td>
            <select name="1" placeholder="Field..." onchange="change(this.value, this.name)">
                <option  value="" disabled selected>Field...</option>
                <option  value="size">size</option>
                <option  value="forks">forks</option>
                <option  value="stars">stars</option>
                <option  value="followers">followers</option>
             </select>
             </td>
           <td>
            <select name="2" disabled placeholder="Operator..." onchange="change(this.value, this.name)">
                <option  value="" disabled selected>Operator...</option>
                <option  value=":>">=></option>
                <option  value=":<" >=<</option>
                <option  value=":">=</option>
            </select>
           </td>
           <td>
            <input type="number" disabled name="3" step="1" size="15" min="0" value="" placeholder="Value..." onchange="change(this.value, this.name)">
             </td>
             <td>
                <input type="button" class="row_add" value="Add Rule"></input>
                <input type="button" class="row_del" value="Delete"></input>
            </td>
            </tbody>
            </table>
             <script>
                new DynamicTable(document.getElementById("dynamic"));
             </script>

             <input type="submit" class="row_del" id="btnGet" name="" value="Apply">
             <input type="button" id="Clear" name="" value="Clear">
             </form>
 </div>
 <!-- Вывод результата поиска -->
 <p id="output"><?php include "search.php"; ?></p>

</body>
</html>