<div style="border: solid 1px black;">
	This is the _foo page

	<strong><?php echo $_POST["name"]; ?></strong> sent a file called <strong><?php echo $_FILES["file"]["name"]; ?></strong> of size <strong><?php echo $_FILES["file"]["size"]; ?></strong>.<br>
	added get var added=<strong><?php echo $_GET["added"]; ?></strong>
	<span class="alert">Alert test (click me)</span>

</div>
