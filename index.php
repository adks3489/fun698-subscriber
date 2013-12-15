<!DOCTYPE html>
<html>
<head>
    <title>Qvod-Subscriber</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<?php
  if( count( $_POST ) > 0){
    if( $_POST["email"] == "adks3489@gmail.com"){
      $v = fopen("video.list", "a");
      fwrite( $v, $_POST["name"]." ".$_POST["url"]."\n");
      fclose($v);
    }
  }
?>
<body>
  <h1>For <a href="http://www.fun698.com" target="_blank">Fun698</a></h1>
<form><input type=button value="Refresh" onClick="window.location.reload()"></form>
  <form action="" method="POST" class="form-inline">
    <input name="name" type="text" placeholder="Name" class="input-small" required>&nbsp;
    <input name="url" type="text" placeholder="URL" class="input-small" required>&nbsp;
    <input name="email" type="text" placeholder="Email" class="input-small" required>&nbsp;
    <button type="submit" class="btn">Submit</button>
  </form>
  <dl class="dl-horizontal">
	<?php
		$video_file = fopen( "video.list", "r" );
		while(!feof($video_file)){
			$line = fgets($video_file);
			if( $line != ""){
				$v = explode(" ", $line);
				echo "<dt>".$v[0]."</dt>";
				echo '<dd><a target="_blank" href="'.$v[1].'">'.$v[1].'</a></dd>';
			}
		}
		fclose($video_file);
	?>
  </dl>
</body>
</html>
