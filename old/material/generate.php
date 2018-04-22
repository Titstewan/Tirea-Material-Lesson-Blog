<?php include "res/themetop.php" ?>

<div>
<div class="titlename">Random Na&apos;vi Name: </div><br>
	<br>
<h4>
<?php
error_reporting(E_ALL & ~E_NOTICE);

$a = $_REQUEST["a"]; $b = $_REQUEST["b"]; $c = $_REQUEST["c"];
$hrh = $_REQUEST["hrh"];

if (($a > 4 || $b > 4 || $c > 4) && !isset($hrh)) {
	echo "HRH te HRH HRH'itan";
} else {
		if (isset($hrh) && $hrh !=1 ) {
			echo "HRH te HRH HRH'ite";
		} else if ($_REQUEST["k"] <= 100) {

			function getInitial () {
				$type;
				$result;

				if (rand(0,100) <= 70){
					$type="single";
				}else {
					$type="cluster";
				}

				//single letter initial
				if ($type == "single"){
					$rn = rand(0, 100);
					if ($rn <= 4){
						$result = "px";
					}else if ($rn <= 8){
						$result = "tx";
					}else if ($rn <= 12){
						$result = "kx";
					}else if ($rn <= 17){
						$result = "p";
					}else if ($rn <= (22)){
						$result = "t";
					}else if ($rn <= (27)){
						$result = "k";
					}else if ($rn <= (32)){
						$result = "ts";
					}else if ($rn <= (37)){
						$result = "f";
					}else if ($rn <= (42)){
						$result = "s";
					}else if ($rn <= (47)){
						$result = "h";
					}else if ($rn <= (52)){
						$result = "v";
					}else if ($rn <= (57)){
						$result = "z";
					}else if ($rn <= (62)){
						$result = "m";
					}else if ($rn <= (67)){
						$result = "n";
					}else if ($rn <= (72)){
						$result = "ng";
					}else if ($rn <= (77)){
						$result = "r";
					}else if ($rn <= (82)){
						$result = "l";
					}else if ($rn <= (87)){
						$result = "w";
					}else if ($rn <= (92)){
						$result = "n";
					}else {
						$result = "'";
					}
				}else {
					$ro = rand(1, 3);
					//start with f
					if ($ro == 1){
						$rp = rand(1, 100);
						if ($rp <= 5){
							$result = "fpx";
						}else if ($rp <= 11){
							$result = "fkx";
						}else if ($rp <= 16){
							$result = "ftx";
						}else if ($rp <= 25){
							$result = "ft";
						}else if ($rp <= 33){
							$result = "fp";
						}else if ($rp <= 42){
							$result = "fk";
						}else if ($rp <= 50){
							$result = "fm";
						}else if ($rp <= 57){
							$result = "fn";
						}else if ($rp <= 63){
							$result = "fng";
						}else if ($rp <= 70){
							$result = "fr";
						}else if ($rp <= 78){
							$result = "fl";
						}else if ($rp <= 86){
							$result = "fw";
						}else if ($rp <= 94){
							$result = "fy";
						}else {
							$result = "fr";
						}
					}else if ($ro == 2){ //start with s
						$rp = rand(1, 100);
						if ($rp <= 5){
							$result = "spx";
						}else if ($rp <= 11){
							$result = "skx";
						}else if ($rp <= 16){
							$result = "stx";
						}else if ($rp <= 25){
							$result = "st";
						}else if ($rp <= 33){
							$result = "sp";
						}else if ($rp <= 42){
							$result = "sk";
						}else if ($rp <= 50){
							$result = "sm";
						}else if ($rp <= 57){
							$result = "sn";
						}else if ($rp <= 63){
							$result = "sng";
						}else if ($rp <= 70){
							$result = "sr";
						}else if ($rp <= 78){
							$result = "sl";
						}else if ($rp <= 86){
							$result = "sw";
						}else if ($rp <= 94){
							$result = "sy";
						}else {
							$result = "sr";
						}
					}else if ($ro == 3){ //start with ts
						$rp = rand(1, 100);
						if ($rp <= 5){
							$result = "tspx";
						}else if ($rp <= 11){
							$result = "tskx";
						}else if ($rp <= 16){
							$result = "tstx";
						}else if ($rp <= 25){
							$result = "tst";
						}else if ($rp <= 33){
							$result = "tsp";
						}else if ($rp <= 42){
							$result = "tsk";
						}else if ($rp <= 50){
							$result = "tsm";
						}else if ($rp <= 57){
							$result = "tsn";
						}else if ($rp <= 63){
							$result = "tsng";
						}else if ($rp <= 70){
							$result = "tsr";
						}else if ($rp <= 78){
							$result = "tsl";
						}else if ($rp <= 86){
							$result = "tsw";
						}else if ($rp <= 94){
							$result = "tsy";
						}else {$result = "tsr";}
					}
				}
				return $result;
			}

			function getNucleus () {

				$isDiphthong;
				$result;

				if (rand(0,100) > 20){
					$isDiphthong="kehe";
				}else {
					$isDiphthong="srane";
				}

				if ($isDiphthong == "srane"){ //diphthong
					$rx = rand(0, 100);
					if ($rx <= 25){
						$result = "aw";
					}else if ($rx <= 50){
						$result = "ay";
					}else if ($rx <= 75){
						$result = "ey";
					}else if ($rx <= 100){
						$result = "ew";
					}
				}else {
					$ry = rand(1, 100);
					if ($ry <= 25){
						$result = "a";
					}else if ($ry <= 40){
						$result = "e";
					}else if ($ry <= 55){
						$result = "o";
					}else if ($ry <= 70){
						$result = "u";
					}else if ($ry <= 80){
						$result = "ì";
					}else if ($ry <= 85){
						$result = "ä";
					}else {$result = "a";}
				}
				return $result;
			}

			function getCoda () {

				$result;
				$rz = rand(0, 320);

				if ($rz <= 4){
					$result = "px";
				}else if ($rz <= 8){
					$result = "tx";
				}else if ($rz <= 12){
					$result = "kx";
				}else if ($rz <= 20){
					$result = "p";
				}else if ($rz <= 28){
					$result = "t";
				}else if ($rz <= 44){
					$result = "k";
				}else if ($rz <= 49){
					$result = "k";
				}else if ($rz <= 58){
					$result = "m";
				}else if ($rz <= 70){
					$result = "n";
				}else if ($rz <= 76){
					$result = "ng";
				}else if ($rz <= 80){
					$result = "r";
				}else if ($rz <= 85){
					$result = "l";
				}else{
					$result="";
				}
				return $result;
			}

			$k;
			while ($k <= $_REQUEST["k"] -1){
				$i=0;
				echo ucfirst(getInitial().getNucleus());
				while ($i <= $a - 2){
					echo getInitial().getNucleus();
					$i++;
				}
				echo getCoda();$i=0;
				echo " te ";
				echo ucfirst(getInitial().getNucleus());
				while ($i <= $b - 2){
					echo getInitial().getNucleus();
					$i++;
				}
				echo getCoda();
				$i=0;
				echo " ";
				echo ucfirst(getInitial().getNucleus());
				while ($i <= $c - 2){
					echo getInitial().getNucleus();
					$i++;
				}
				echo getCoda();$i=0;
				echo "'it";
				if (rand(0,1)==0){
					echo "an";
				}else{
					echo "e";
				}
				$k++;
				echo "<br/>";
			}
		} else {
			echo 'Maximum output of generator exceeded.';
		}
}
?>
</h4>
<?php if (($a > 4 || $b > 4 || $c > 4) && (!isset($hrh) || $hrh != 1) ) {
	echo "<span class='cyan-text darken-3'>Nice try. ;D</span>";
}
?>
<br />
<hr>

<style>select{display:block;}</style>

<div class="row">

  <form class="col s12" name="sform">

		<div class="row">
			<div class="input-field col s12 l4">
			  <select name="a">
			    <option value="" disabled selected>First Name # of Syllables</option>
			    <option value="1">1</option>
			    <option value="2">2</option>
			    <option value="3">3</option>
			    <option value="4">4</option>
			  </select>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12 l4">
			  <select name="b">
			    <option value="" disabled selected>Family Name # of Syllables</option>
			    <option value="1">1</option>
			    <option value="2">2</option>
			    <option value="3">3</option>
			    <option value="4">4</option>
			  </select>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12 l4">
			  <select name="c">
			    <option value="" disabled selected>Parent&apos;s Name # of Syllables</option>
			    <option value="1">1</option>
			    <option value="2">2</option>
			    <option value="3">3</option>
			    <option value="4">4</option>
			  </select>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12 l4">
			  <select name="k">
			    <option value="" disabled selected>Number of Names to Generate</option>
			    <option value="1">1</option>
			    <option value="5">5</option>
			    <option value="10">10</option>
			    <option value="50">50</option>
					<option value="100">100</option>
			  </select>
			</div>
		</div>

		<button class="btn waves-effect waves-light amber black-text" type="submit">Submit
    	<i class="material-icons right">send</i>
    </button>

	</form>

</div>

<div style="margin-top: 18px; text-align: center; border-top: 1px solid #eeeeee; padding-top: 5px; ">
	<a href="http://forum.learnnavi.org/projects/web-based-navi-name-generator!/msg566249/#msg566249">
		Web-based Na'vi Name Generator!
	</a> by Uniltìrantokx te Skxawng
</div>

</div>
<?php include "res/themebottom.php" ?>
