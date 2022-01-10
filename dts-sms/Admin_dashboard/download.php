<?php 

	$conn = new PDO("mysql:host=localhost;dbname=documenttrackingsystem_db", "root", "");

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$stat = $conn->prepare("SELECT * FROM admin_fileupload WHERE id=?");
		$stat->bindParam(1,$id);
		$stat->execute();
		$data = $stat->fetch();

		$file = 'upload/'.$data['attach_file'];

		if(file_exists($file))
		{
			header('Content-Description: '.$data['description']);
			header('Content-Type: '.$data['type']);
			header('Content-Disposition:  '.$data['disposition'].'; attach_file="'.basename($file).'"');
			header('Expires: '.$data['expires']);
			header('Cache-Control:'.$data['cache']);
			header('Pragma: '.$data['pragma']);
			header('Content-Length:'.$filesize($file));
			readfile($file);
			exit;
		}
	}

?>