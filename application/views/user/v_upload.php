<html>

<head>
	<title>malasngoding.com</title>
</head>

<body>
	<center>
		<h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1>
	</center>
	<?php echo $this->session->flashdata('pesan')?>

	<ul>
		<?php

		function countdim($array)
		{
			if (is_array(reset($array))) {
				$return = countdim(reset($array)) + 1;
			} else {
				$return = 1;
			}
			return $return;
		}

		if (countdim($status) > 1) {
			foreach ($status['status'] as $item => $value) {
				echo "<li>" . $item . ": " . $value . "</li>";
			}

			$name=filter_var($status['status']['orig_name'],FILTER_SANITIZE_STRING);
			$name=strtolower($name);
			echo $name;
		} else {
			echo $status['status'];
		}
		?>
	</ul>



	<?php echo form_open_multipart('user/aksi_upload'); ?>

	<input type="file" name="berkas" />

	<br /><br />

	<input type="submit" value="upload" />

	</form>

</body>

</html>