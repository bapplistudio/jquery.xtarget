This is the called _full page

<p>
	<strong><?php echo $_POST["name"]; ?></strong> sent a file called <strong><?php echo $_FILES["file"]["name"]; ?></strong> of size <strong><?php echo $_FILES["file"]["size"]; ?></strong>.
</p>

<p>
	Additional get vars : added = <strong><?php echo $_GET["added"]; ?></strong>
</p>

<p>
	When jquery.build is used, all jquery active content work !
	<a href="_itworks.html" target="#message">Test here</a>... <span id="message"></span>
	<button class="alert">Another test</button>
</p>
