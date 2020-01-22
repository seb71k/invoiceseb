<div align="center">
<h1>NUOVA FATTURA</h1>
<br><br>
<?php if(!empty($errore)): ?>
   <div class="alert alert-danger" style="color: #FF0000;"> <?php echo e($errore); ?></div>
 <?php endif; ?>


<form action = "/create" method = "post">
<?php echo e(csrf_field()); ?>

<table>
<tr>
<td>Id Cliente</td>
<td><input type='text' name='idcliente' /></td>
<tr>
<td>N° fattura</td>
<td><input type="text" name='nfattura'/></td>
</tr>

<tr>
<td>Data fattura</td>
<td><input type="date" name='datafattura'/></td>
</tr>

<tr>
<td colspan = '2'>
<br>
<div align="center"><input type = 'submit' value = "PROSEGUI »"/></div>
</td>
</tr>
</table>
</form>
</div><?php /**PATH C:\xampp\htdocs\LARAVEL\fatturaseb\resources\views/nuovafattura.blade.php ENDPATH**/ ?>