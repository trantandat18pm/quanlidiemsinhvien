
<h3 style="text-align: center;">Thông tin điểm sinh viên</h3>
<!-- <?php $__currentLoopData = $TB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
<h4>Điểm TB hệ 10 $tb->diemtb</h4>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
<?php
foreach ($TB as $tb ) {
	echo('<h4>'.'Điểm TB hệ 10 :');  
 echo round($tb->diemtb,2);
 echo ('</h4>');
}
?>
<?php
	$He4=0;
    $tinchi=0;
    $DiemHe4=0;
  

   foreach ($Diem4 as $key ) {
     
      if($key->loaidiem=="A"){
        $He4=$He4+(4*$key->sotc);
        $tinchi=$tinchi+$key->sotc;
      }
       if($key->loaidiem=="B"){
        $He4=$He4+(3*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
        if($key->loaidiem=="C"){
        $He4+=(2*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
       if($key->loaidiem=="D"){
        $He4+=(1*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
        if($key->loaidiem=="F"){
        $He4+=(0*$key->sotc);
         $tinchi=$tinchi+$key->sotc;

      }
 

    }
    
   $DiemHe4=$He4/$tinchi;

 echo('<h4>'.'Điểm TB hệ 4 :');  
 echo round($DiemHe4,2);
 echo ('</h4>');
 ?>
<br>
<?php $__currentLoopData = $demhocki; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hkk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		
<h3>Học kì<?php echo e($hkk->hki); ?></h3>
		
<table  align="center" width="100%" style="border:1px solid #000">

	<thead>
		
		<tr>
		<th>Mã SV</th>
		<th>Họ tên</th>
		<th>Mã MH</th>
		<th>Học kì</th>
		<th>Số tín chỉ</th>
		<th>Phần trăm TX</th>
		<th>Phần trăm thi</th>
		<th>Điểm TX</th>
		<th>Điểm thi L1</th>
		<th>Điểm thi L2</th>
		<th>Điểm TB</th>
		<th>Loại điểm</th>
	</tr>
	</thead>
	<tbody>
		
		<?php $__currentLoopData = $diem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if($hkk->hki==$d->hk): ?>
		<tr>
		<td><?php echo e($d->masv); ?></td>
		<td><?php echo e($d->tensv); ?></td>
		<td><?php echo e($d->mamh); ?></td>
		<td><?php echo e($d->hk); ?></td>
		<td><?php echo e($d->tinchi); ?></td>
		<td><?php echo e($d->phantramtx); ?></td>
		<td><?php echo e($d->phantramthi); ?></td>
		<td><?php echo e($d->tx); ?></td>
		<td><?php echo e($d->thiL1); ?></td>
		<td><?php echo e($d->thiL2); ?></td>
		<td><?php echo e($d->TB); ?></td>
		<td><?php echo e($d->ld); ?></td>
		</tr>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	</tbody>
	
</table>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/export/diem.blade.php ENDPATH**/ ?>