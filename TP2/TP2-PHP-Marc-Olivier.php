<html>
	<head>
		<h1>TP2 : Opérateurs, Tableaux et Structures de contrôle</h1>
	<body>
		<hr>
		<h2>Exercice 1</h2>
		<h3>1.</h3>
		<?php
			$age = rand(0,100);
			if($age < 13){
				$cat = "enfant";
			}else if($age >= 13 && $age < 20){
				$cat = "ado";
			}else if($age >= 20 && $age < 51){
				$cat = "adulte";
			}else if($age >= 51 && $age < 71){
				$cat = "sénior";
			}else{
				$cat = "agé";
			}
			echo $cat;
		?>
		<h3>2.</h3>
		<?php
			$age = rand(0,100);
			switch($age){
				case($age < 13):
					$cat = "enfant";
				break;
				case($age >= 13 && $age < 20):
					$cat = "ado";
				break;
				case($age >= 20 && $age < 51):
					$cat = "adulte";
				break;
				case($age >= 51 && $age < 71):
					$cat = "sénior";
				break;
				default:
					$cat = "agé";
				break;
			}
			echo $cat;
		?>
		<hr>
		<h2>Exercice 2</h2>
		<h3>1.</h3>
		<?php
			$fib = array(0,1);
			$a = 2;
			while ($a < 20){
				$fib[$a] = $fib[$a-1] + $fib[$a-2];
				$a++;
			}
		?>
		<table>
			<tr>
				<?php
					for ($i=0; $i < 20 ; $i++) {
						echo "<th style='border: 1px solid black;'>F", $i ,"</th>";
					}
				?>
			</tr>
			<tr>
			<?php
					for ($i=0; $i < 20 ; $i++) {
						echo "<td style='border: 1px solid black;'>", $fib[$i] ,"</td>";
					}
				?>
			</tr>
		</table>
		<h3>2.</h3>
		<?php
			$fib = array(0,1);
			$a = 2;
			while ($a < 30){
				$fib[$a] = $fib[$a-1] + $fib[$a-2];
				$a++;
			}
		?>
		<table>
			<tr>
				<?php
					for ($i=0; $i < 30 ; $i++) {
						echo "<th style='border: 1px solid black;'>F", $i ,"</th>";
					}
				?>
			</tr>
			<tr>
					<td></td>
			<?php
					for ($i=1; $i < 29 ; $i++) {
						echo "<td style='border: 1px solid black;'>", $fib[$i+1]/$fib[$i] ,"</td>";
					}
				?>
				<td></td>
			</tr>
		</table>
		<hr>
		<h2>Exercice 3</h2>
		<h3>1.</h3>
		<?php
			$pi15 = 0;
			$pi150 = 0;
			$pi1500 = 0;
			$pi15000 = 0;
			for ($i=1; $i <= 15 ; $i++) { 
				$pi15+=1/($i*$i);
			}
			for ($i=1; $i <= 150 ; $i++) { 
				$pi150+=1/($i*$i);
			}
			for ($i=1; $i <= 1500 ; $i++) { 
				$pi1500+=1/($i*$i);
			}
			for ($i=1; $i <= 15000 ; $i++) { 
				$pi15000+=1/($i*$i);
			}
			$pi15 = ($pi15*6)**(1/2);
			$pi150 = ($pi150*6)**(1/2);
			$pi1500 = ($pi1500*6)**(1/2);
			$pi15000 = ($pi15000*6)**(1/2);
			echo "PI 15 : " , $pi15 , "<br>";
			echo "PI 150 : " , $pi150 , "<br>";
			echo "PI 1500 : " , $pi1500 , "<br>";
			echo "PI 15000 : " , $pi15000 , "<br>";
		?>
		<hr>
		<h2>Exercice 4</h2>
		<h3>1.</h3>
		<?php
			$tab = array("Juan-Marco" => "Le Livre", "Gwendal" => "Leur Livre", "Quelqu'un" => "Truc");
			echo "<h4>a.</h4>";
			foreach($tab as $val){
				echo "Value : ", $val, "<br>";
			}
			echo "<h4>b.</h4>";
			foreach($tab as $key => $val){
				echo "Key : ", $key, " Value : ", $val, "<br>";
			}
		?>
		<hr>
		<h2>Exercice 5</h2>
		<h3>1.</h3>
		<?php
			function table($val){
				?>
				<table style="border: 1px solid black;">
					<tr>
						<th style="border: 1px solid black;" colspan="2">Table de <?php echo $val; ?></th>
					</tr>
				<?php
					for ($i=1; $i <= 10 ; $i++) { 
						echo "<tr><td style='border: 1px solid black;'>",$i,"x",$val,"</td><td style='border: 1px solid black;'>",$i*$val,"</td></tr>";
					}
			}
			table(5);
		?>
		</table>
		<hr>
		<h2>Exercice 6</h2>
		<h3>1.</h3>
		<?php
			function premier($from, $to){
				if($from < 2){
					$from = 2;
				}
				for ($i=$from; $i <= $to ; $i++) { 
					$val = true;
					for ($j=2; $j < $i ; $j++) { 
						if($i%$j == 0){
							$val = false;
							break;
						}
					}
					if($val === true){
						echo $i, " ";
					}
				}
			}
			premier(2, 97);
		?>
		<hr>
		<h2>Exercice 7</h2>
		<h3>1.</h3>
		<?php
			function translate($val){
				$carac = substr($val, -1);
				$num = (int)substr($val, 0, strlen($val)-2);
				switch($carac){
					case K:
						echo $val, " = ", $num, " x 1024 = ", $num*1024, "o<br>";
						return;
					case M:
						echo $val, " = ", $num, " x 1024 x 1024 = ", $num*(1024**2), "o<br>";
						return;
					case G:
						echo $val, " = ", $num, " x 1024 x 1024 x 1024 = ", $num*(1024**3), "o<br>";
						return;
					case T:
						echo $val, " = ", $num, " x 1024 x 1024 x 1024 x 1024 = ", $num*(1024**4), "o<br>";
				}
			}
			translate("150K");
			translate("400M");
			translate("5G");
			translate("2T");
		?>
	</body>
</html>
