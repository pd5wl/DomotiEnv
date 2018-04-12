<?php

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
</body>
</html>