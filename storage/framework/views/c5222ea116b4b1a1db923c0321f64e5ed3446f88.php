<button onclick="location.href='<?php echo e(url('/newinvoice')); ?>'">« NEW INVOICE</button>
<br><br>
<?php

$ninvoice = request()->ninvoice;
$idcustomer = request()->idcustomer;


echo"<b>N° INVOICE:</b> <font color=#FF000>",$ninvoice."</font>";
echo"</br>";
echo"<b>ID CUSTOMER</b> <font color=#FF000>",$idcustomer."</font>";

// seleziona righefattura
$results = DB::table('invoiceseb_row')
->select(DB::raw('idinvoice,description,quantity,amount,amountvat,totalwithvat'), 'id')
->where('idinvoice',$ninvoice)
->orderBy('id', 'ASC')
->get();
?>
<script>
function calcoloiva() {
var calcolodaimporto = document.getElementById('amount').value;
var calcoloivax= eval(calcolodaimporto*22)/100;
var calcoloivax2 = eval(calcolodaimporto)+calcoloivax;
document.getElementById('amountvat').value=(calcoloivax2);
}
</script>

<div align="center">
<form action = "/createrow" method = "post">
<?php echo e(csrf_field()); ?>


<table>
<tr>
<td></td>
<td><input type='hidden' name='idinvoice' value="<?php echo $ninvoice; ?>" />
<input type='hidden' name='ninvoice' value="<?php echo $ninvoice; ?>" />
<input type='hidden' name='idcustomer' value="<?php echo $idcustomer; ?>" />
</td>
<tr>
<tr>
<td>Quantity</td>
<td><input type='number' name='quantity' /></td>
<tr>
<td>Description</td>
<td><input type="text" name='description'/></td>
</tr>

<tr>
<td>Amount</td>
<td><input type="text" id="amount" name='amount' placeholder="00.00"/></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" id="amountvat" name='amountvat'/>
<input type="hidden" id="totalwithvat" name='totalwithvat'/>

</td>
</tr>
</tr>
<tr>
<td colspan = '2'>
<br>
<div align="center"><input type = 'submit' value = "SAVE INVOICE ROW" onclick="calcoloiva();"/></div>
</td>
</tr>
</table>
</form>
</div>
<br><br>

<table align="center" width="85%" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr bgcolor="#CCC">
<td align="center">IDinvoice</td>
<td align="center">DESCRIPTION</td>
<td align="center">QUANTITY</td>
<td align="center">AMOUNT</td>
<td align="center">AMOUNT VAT</td>
<td align="center" bgcolor="#EEE">TOTAL+VAT</td>

</tr>
<?php  foreach($results as $row) { ?>
<tr>
<td align="center"> <?php echo $row->idinvoice; ?></td>
<td align="center"> <?php echo $row->description; ?></td>
<td align="center"> <?php echo $row->quantity; ?></td>
<td align="center"> <?php echo $row->amount; ?></td>
<td align="center"> <?php echo $row->amountvat; ?></td>
<td align="center"> <b><?php echo $row->totalwithvat; ?></b></td>
</tr>
<?php } ?>


</tbody>
</table>




<?php /**PATH C:\xampp\htdocs\LARAVEL\fatturaseb\resources\views/newinvoicerow.blade.php ENDPATH**/ ?>