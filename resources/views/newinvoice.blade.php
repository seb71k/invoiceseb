<div align="center">
<h1>NEW INVOICE</h1>
<br><br>
@if(!empty($errore))
   <div class="alert alert-danger" style="color: #FF0000;"> {{ $errore }}</div>
 @endif


<form action = "/create" method = "post">
{{ csrf_field() }}
<table>
<tr>
<td>Id Customer</td>
<td><input type='text' name='idcustomer' /></td>
<tr>
<td>N° invoice</td>
<td><input type="text" name='ninvoice'/></td>
</tr>

<tr>
<td>Date invoice</td>
<td><input type="date" name='dateinvoice'/></td>
</tr>

<tr>
<td colspan = '2'>
<br>
<div align="center"><input type = 'submit' value = "NEXT STEP »"/></div>
</td>
</tr>
</table>
</form>
</div>