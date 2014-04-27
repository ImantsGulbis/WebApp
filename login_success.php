<?php
session_start();
if(!isset($_SESSION['myusername'])){
header("location:index.php");
} else {
	try{
		$obj = new PDO('mysql:host=localhost;dbname=test;charset=UTF-8','root','');
		
		if(!isset($_SESSION['sort'])){
			$_SESSION['sort']['by'] = 'user';
			$_SESSION['sort']['ad'] = 'DESC';
		}
		$by= $_SESSION['sort']['by'];
		$ad= $_SESSION['sort']['ad'];
		
		if (!isset($_GET['from']) or !is_numeric($_GET['from'])) {
  			$from = 0;
  			$to=25;
		} 
		else 
		{
  			$from = (int)$_GET['from'];
		}
		
		
		
		$sql="select *,if((select `id` 
							from (select `users`.`id` as `id`,`user`,`email`,`message`,`date` 
									from `users`,`messages` where `messages`.`user_id`=`users`.`id`) `tab1` 
							order by `tab1`.`id` desc limit 0,1
							) = `tab2`.`id`,1,0) as latest
				from(select `users`.`id` as `id`,`user`,`email`,`message`,`date` 
					from `users`,`messages` where `messages`.`user_id`=`users`.`id`) `tab2` order by `$by` $ad limit $from ,25";
		
		$qu = $obj -> query($sql);
		$result = $qu -> fetchAll(PDO::FETCH_ASSOC);		
	}catch(PDOException $ex){
		echo $ex -> getMessage();
	}
}
?>

<html>
<head>
	<title>Messages</title>
	<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
	<div id="account">
		<h1 style="color:orange; font-size:x-large">Welcome <?php echo $_SESSION['myusername']?>!!</h1>
		<form action="logout.php">
			<input type="submit" value="Logout">
		</form>
	</div>
	<div id="wrapper">
		<?php if (!empty($result)){?>
			<table cellpadding="0" cellspacing="0" border="0" class="tbl">
				<thead>
					<tr>
						<td style="color:white;width:20px">Id</td>
						<td style="width:70px"><span class="sort <?php echo $by == 'user' ? ''.strtolower($ad):null; ?>" id="user">User</span></td>
						<td style="width:160px"><span class="sort <?php echo $by == 'email' ? ''.strtolower($ad):null; ?>" id="email">E-mail</span></td>
						<td style="width:120px"><span class="sort <?php echo $by == 'date' ? ''.strtolower($ad):null; ?>" id="date">Date</span></td>
						<td style="color:white">Message</td>									
					</tr>			
				</thead>
				<tbody>
					<?php $i=1; foreach($result as $row) { ?>
						<tr class="active">
							<td><?php echo $i ?></td>
							<td><?php echo $row['user'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td ><?php echo $row['date'] ?></td>
							<td style="width:70px"><?php echo $row['message'] ?></td>
						</tr>
					<?php $i=$i+1; } ?>
				</tbody>			
			</table>
		<?php } else {?>
			<p style="color:red; font-size:medium">Vairāk nav neviena ziņojuma!!</p>
		<?php } ?>
	</div>
	<?PHP
		$prev = $from - 25;
		if ($prev >= 0)
    		echo '<a href="'.$_SERVER['PHP_SELF'].'?from='.$prev.'">Previous</a>';
	?>
	<?PHP
	if ($result)
		echo '<a href="'.$_SERVER['PHP_SELF'].'?from='.($from+25).'">Next</a>';
	?>
	<div style="margin-top:20px">
		<form name="form1" method="post" action="insert.php">
			<textarea id="message" name="message" rows="5" cols="70" maxlength="160"></textarea><br>
			<input id="Submit" name="Submit" type="submit" value="Submit">
		</form>	
	</div>
	
	<script type="text/javascript" src="jquery-1.11.0.js"></script>
	<script type="text/javascript" src="core.js"></script>	
</body>
</html>