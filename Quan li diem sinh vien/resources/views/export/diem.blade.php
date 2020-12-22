
<h3 style="text-align: center;">Thông tin điểm sinh viên</h3>
<!-- @foreach($TB as $tb)	
<h4>Điểm TB hệ 10 $tb->diemtb</h4>
@endforeach -->
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
@foreach($demhocki as $hkk)
		
<h3>Học kì{{$hkk->hki}}</h3>
		
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
		
		@foreach($diem as $d)

		@if($hkk->hki==$d->hk)
		<tr>
		<td>{{$d->masv}}</td>
		<td>{{$d->tensv}}</td>
		<td>{{$d->mamh}}</td>
		<td>{{$d->hk}}</td>
		<td>{{$d->tinchi}}</td>
		<td>{{$d->phantramtx}}</td>
		<td>{{$d->phantramthi}}</td>
		<td>{{$d->tx}}</td>
		<td>{{$d->thiL1}}</td>
		<td>{{$d->thiL2}}</td>
		<td>{{$d->TB}}</td>
		<td>{{$d->ld}}</td>
		</tr>
		@endif
		@endforeach
	
	</tbody>
	
</table>
	@endforeach