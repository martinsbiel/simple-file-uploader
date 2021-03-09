<?php
	require_once 'config.php';

	$extensions = implode(', ', $allowedExtensions);

	$upload = new File();

	$size = $upload->formatBytes($allowedSize);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple File Uploader</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center mt-5">
				<div class="col-8">
					<div class="card">
						<div class="card-header">
							<h2>Simple File Uploader</h2>
						</div>
						<div class="card-body">
							<p>Select your file. Maximum size: <?= $size; ?>. Supported extensions: <?= $extensions; ?>.</p>
							<form id="upload" action="" method="post" enctype="multipart/form-data">
								<input type="file" name="file" class="form-control mb-3">
								<div style="display: none;" class="progress mb-3">
  									<div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"></div>
								</div>
								<input type="submit" name="submit" class="btn btn-lg btn-secondary mb-3" value="Send">
								<div class="return"></div>
							</form>
						</div>
						<div class="card-footer">
							Made with love by <a class="" href="https://github.com/martinsbiel">Gabriel Martins</a>.
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		<script src="/assets/js/jquery.js"></script>
		<script src="/assets/js/jquery.form.min.js"></script>
		<script src="/assets/js/clipboard.min.js"></script>
		<script src="/assets/js/app.js"></script>
	</body>
</html>