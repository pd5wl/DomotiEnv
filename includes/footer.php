<hr />
<?php
$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');

	echo '<br />';
	echo 'Lijst gemaakt op: ';
	echo $tijd;
	echo '<br />';

// Close DB connection
try {
	$pdo = null;
}

catch(PDOException $e)
{
	echo $e->getMessage();
}

?>
</div>
</div>
</div>
</body>
</html>