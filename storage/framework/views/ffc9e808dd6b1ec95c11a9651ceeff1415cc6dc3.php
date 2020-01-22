<div align="center">
<h1>NEW INVOICE</h1>
<br><br>
<?php if(!empty($errore)): ?>
   <div class="alert alert-danger" style="color: #FF0000;"> <?php echo e($errore); ?></div>
 <?php endif; ?>


<form action = "/create" method = "post">
<?php echo e(csrf_field()); ?>

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
</div><?php /**PATH C:\xampp\htdocs\LARAVEL\fatturaseb\resources\views/newinvoice.blade.php ENDPATH**/ ?>