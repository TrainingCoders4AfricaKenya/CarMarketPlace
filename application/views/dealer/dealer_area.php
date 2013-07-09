<div id="member">
	<?php $id = $this->session->userdata('username');
			  //var_dump($this->session->userdata());
			  echo "welcome " . $id;
		?>
</div>
<div>
	<?php
	foreach($query as $row)
		{
		  print $row->DealerID;
		  print $row->username;
		  print "<br>";
		}
?>
</div>
