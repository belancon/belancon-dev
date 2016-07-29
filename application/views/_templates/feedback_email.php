<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Belancon | Belanja Icon</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: rgb(242, 244, 244);
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #F9F9F9;
		background-color: #0DA79E;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

  p {
    padding: 1px 1px 1px 10px;
  }

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

  footer {
		font-size: 11px;
		background-color: #0DA79E;
		border: 1px solid #D0D0D0;
		color: #fff;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		color: #0DA79E;
		text-align : left;
		background-color: #0DA79E;
		border-bottom: 1px solid #D0D0D0;
		font-size: 11px;
		font-weight: normal;
		margin: 0 0 0px 0;
		padding: 14px 15px 10px 15px;
	}

  #container {
		margin: 10px;
    background-color: rgba(35, 53, 52, 0.29);
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1><center>Belancon.com | Belanja Icon</center></h1>

	<div id="body">
	<p><?php echo $fullname ?></p>
    <p><?php echo $email ?></p>
	<p><?php echo $message ?></p>
	</div>
  <footer>Copyright © 2016 Belancon.com | Belanja Icon. All Rights Reserved.</footer>
</div>

</body>
</html>
