<button onclick="location.href='<?php echo e(url('/nuovafattura')); ?>'">« NUOVA FATTURA</button>
<br><br>
<?php

$nfattura = request()->nfattura;
$idcliente = request()->idcliente;


echo"<b>N°FATTURA:</b> <font color=#FF000>",$nfattura."</font>";
echo"</br>";
echo"<b>ID CLIENTE</b> <font color=#FF000>",$idcliente."</font>";

// seleziona righefattura
$results = DB::table('fatturaseb_righe')
->select(DB::raw('idfattura,descrizione,quantita,importo,importoiva,totaleconiva'), 'id')
->where('idfattura',$nfattura)
->orderBy('id', 'ASC')
->get();
?>
<script>
function calcoloiva() {
var calcolodaimporto = document.getElementById('importo').value;
var calcoloivax= eval(calcolodaimporto*22)/100;
var calcoloivax2 = eval(calcolodaimporto)+calcoloivax;
document.getElementById('importoiva').value=(calcoloivax2);
}
</script>

<div align="center">
<form action = "/createrighe" method = "post">
<?php echo e(csrf_field()); ?>


<table>
<tr>
<td></td>
<td><input type='hidden' name='idfattura' value="<?php echo $nfattura; ?>" />
<input type='hidden' name='nfattura' value="<?php echo $nfattura; ?>" />
<input type='hidden' name='idcliente' value="<?php echo $idcliente; ?>" />
</td>
<tr>
<tr>
<td>Quantità</td>
<td><input type='number' name='quantita' /></td>
<tr>
<td>Descrizione</td>
<td><input type="text" name='descrizione'/></td>
</tr>

<tr>
<td>Importo</td>
<td><input type="text" id="importo" name='importo' placeholder="00.00"/></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" id="importoiva" name='importoiva'/>
<input type="hidden" id="totaleconiva" name='totaleconiva'/>

</td>
</tr>
</tr>
<tr>
<td colspan = '2'>
<br>
<div align="center"><input type = 'submit' value = "SALVA RIGA FATTURA" onclick="calcoloiva();"/></div>
</td>
</tr>
</table>
</form>
</div>
<br><br>

<table align="center" width="85%" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr bgcolor="#CCC">
<td align="center">IDfattura</td>
<td align="center">DESCRIZIONE</td>
<td align="center">QUANTITA</td>
<td align="center">IMPORTO</td>
<td align="center">IMPORTO IVA</td>
<td align="center" bgcolor="#EEE">TOTALE+IVA</td>

</tr>
<?php  foreach($results as $row) { ?>
<tr>
<td align="center"> <?php echo $row->idfattura; ?></td>
<td align="center"> <?php echo $row->descrizione; ?></td>
<td align="center"> <?php echo $row->quantita; ?></td>
<td align="center"> <?php echo $row->importo; ?></td>
<td align="center"> <?php echo $row->importoiva; ?></td>
<td align="center"> <b><?php echo $row->totaleconiva; ?></b></td>
</tr>
<?php } ?>


</tbody>
</table>




<?php /**PATH C:\xampp\htdocs\LARAVEL\fatturaseb\resources\views/nuovafatturarighe.blade.php ENDPATH**/ ?>