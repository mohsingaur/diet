<!-- Credit calculation -->

<h2>Status</h2>

<?php

@$uid = $_SESSION['userId'];

$total_credit = 0;
$wcr = 0;

$welcomeCredit = mysqli_query($link,"SELECT fcredits FROM od_users WHERE uid='$uid' ");


$sqlcr = mysqli_query($link,"SELECT uid,fileid,title,credit,status FROM files WHERE uid='$uid' ");
$doccount = mysqli_num_rows($sqlcr);
?>
<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			Upload Status
		</div>
		<div class="panel-body">
			<table class='table'>
				<tr>
					<th>Document No</th> <th>Title</th> <th>Credit</th>
				</tr>
				<?php
					while ($row=mysqli_fetch_array($welcomeCredit, MYSQLI_NUM)) {
						$wcr = $row[0];
						echo "<tr>
							<td>1</td> <td>Welcome Points</td> <td>$row[0]</td> 
						</tr>";
					}
					$total_credit += $wcr;
					while ($row=mysqli_fetch_array($sqlcr)) {
					$st = $row[4];
					$cr = $row[3]; //Credit points for documents

					echo "<tr>
							<td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> 
		  				</tr>";

					if ($st==1) {
						$credit = $cr;
					}
					else{
					$credit = 0;
					} 
					$total_credit += $credit;
				}
				echo "<tr>
					<td colspan='2'> <b>Total</b> </td> <td> $total_credit </td>
	  				</tr>";
				?>

			</table>
		</div>
	</div>
</div>


<?php
$sqldr = mysqli_query($link,"SELECT uid,fid,cid,credit,downloaddate FROM downloadstatus WHERE uid='$uid' ");
$dtotal_credit = 0;
?>
<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			Download Status
		</div>
		<div class="panel-body">
			<table class='table'>
				<tr>
					<th>Document No</th> <th>Download Date</th> <th>Debit</th>
				</tr>
				<?php
					// echo "<tr>
							// <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> 
		  				// </tr>";

					while ($drow=mysqli_fetch_array($sqldr)) {
						$dcr = $drow[3]; //Credit points for documents
						echo "<tr>
							<td>$drow[1]</td> <td>$drow[4]</td> <td>$drow[3]</td>
							</tr>";
							$dtotal_credit += $dcr;
						}
						echo "<tr>
							<td colspan='2'> <b>Total</b> </td> <td> $dtotal_credit </td>
						</tr>";
				?>

			</table>
		</div>
	</div>
</div>

<h3>Remaining Balance: <?=$total_credit-$dtotal_credit?> </h3>
