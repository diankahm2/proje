function edit_records()
{
 //document.write('heyyyyyyyyyyyyyyyy');
 document.frm.action = "edit.php";
 document.frm.submit();
}
function delete_records()
{
 document.frm.action = "delete.php";
 document.frm.submit();
}
