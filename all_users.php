<!doctype HTML>

<html>
<head>
	<title>User dans ordre alphabétique</title>
	<meta charset="utf-8">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>



	<!-- Connexion à la base de donnée -->
	<?php
        $host = 'localhost';
		$db   = 'my_activities';
		$user = 'root';
		$pass = 'root';
		$charset = 'utf8mb4';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$options = [
  		  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  		  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  		  PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
		     $pdo = new PDO($dsn, $user, $pass, $options);
		} catch (PDOException $e) {
   		  throw new PDOException($e->getMessage(), (int)$e->getCode());
		}
	?>
    
    <!-- SCript pjp pour afficher dans l'ordre alphabétique sur le "username" -->
    <h2>All Users</h2>
    <table>
    	<tr>
    		<th>ID</th>
    		<th>Username</th>
    		<th>Email</th>
    		<th>Status</th>
    	</tr>
    <?php 
        $stmt = $pdo->query('SELECT users.id AS user_id, username, email, name FROM users JOIN status ON users.status_id = status.id WHERE status.id = 2 AND username LIKE \'e%\' ORDER BY username');
        while ($row = $stmt->fetch()) {
        	/* on affiche toutes les lignes */
        	echo "<tr>";
        	echo "<td>".$row['user_id']."</td> <td>".$row['username']."</td> <td>".$row['email']."</td> <td>".$row['name']."</td>";
        	echo "</tr>";
        }
    ?>
    </table>
</body>

</html>