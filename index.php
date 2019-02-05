<?php

include 'Input.php';

	/*		2016 Day 2		*/

EnterInput1($input1);

	/*		2016 Day 3		*/

EnterInput2($input2);


function EnterInput1($input){

	$input = explode("\n", $input);

	$Input1 = str_split($input[0]);
	$Input2 = str_split($input[1]);
	$Input3 = str_split($input[2]);
	$Input4 = str_split($input[3]);
	$Input5 = str_split($input[4]);


	echo "<br>Keypad code is: ".keyPad($Input1);
	echo keyPad($Input2);
	echo keyPad($Input3);
	echo keyPad($Input4);
	echo keyPad($Input5);


	echo "<br>Star keypad code is: ".StarkeyPad($Input1);
	echo StarkeyPad($Input2);
	echo StarkeyPad($Input3);
	echo StarkeyPad($Input4);
	echo StarkeyPad($Input5);
}

function EnterInput2($input){

	$Triangle = explode("\n", $input);

	echo "<br><br>Number of working triangles rows : ".Trianglelist($Triangle);

	$Thetriangles = Resort($Triangle);

	echo "<br>Number of working triangles columns: ".WorkingTriangles($Thetriangles);

}

	/*		2016 Day 2		*/

function keyPad($Input){

	$Row1 = array(1,2,3);
	$Row2 = array(4,5,6);
	$Row3 = array(7,8,9);

	$Keypad = array($Row3, $Row2, $Row1);

	$X = 1;
	$Y = 1;

	for($C = 0; $C<count($Input); $C++){

		switch ($Input[$C]){

			case "U":
				$Y++;
				if($Y == 3)
					$Y = 2;
				break;
			case "D":
				$Y--;
					if($Y == -1)
						$Y = 0;
					break;
			case "L":
				$X--;
					if($X == -1)
						$X = 0;
					break;
			case "R":
				$X++;
					if($X == 3)
						$X = 2;
					break;
		}
	}
	
	return $Keypad[$Y][$X];
}


function StarkeyPad($Input){

	$Row1 = array(2,3,4);
	$Row2 = array(6,7,8);
	$Row3 = array("A","B","C");

	$Keypad = array($Row3, $Row2, $Row1);

	$X = 1;
	$Y = 1;
	$TheNumb = 0;
	$Yes = 0;

	for($C = 0; $C<count($Input); $C++){

		switch ($Input[$C]){

			case "U":
			if($TheNumb != 1 && $TheNumb != 5 && $TheNumb != 9){	$Y++;
				if($Y == 3){
					$Y = 2;
				
					if($X == 1){
					$TheNumb = 1;
					$Yes = 1;
					}
				}

				if($TheNumb == "D"){
					$TheNumb = "";
					$Y = 0;	
					$Yes = 0;
				}
			}
				break;
			case "D":
				if($TheNumb != "D" && $TheNumb != 5 && $TheNumb != 9){$Y--;
					if($Y == -1){
						$Y = 0;
					
						if($X == 1){
						$TheNumb = "D";
						$Yes = 1;
						}
					}

					if($TheNumb == 1){
						$TheNumb = "";
						$Y = 2;
						$Yes = 0;
					}}
					break;

			case "L":
			if($TheNumb != "D" && $TheNumb != 5 && $TheNumb != 1){
				$X--;
					if($X == -1){
						$X = 0;
					
						if($Y == 1){
						$TheNumb = 5;
						$Yes = 1;
						}
					}

					if($TheNumb == 9){
						$TheNumb = "";
						$X = 2;	
						$Yes = 0;
					}
				}
					break;

			case "R":
			if($TheNumb != "D" && $TheNumb != 1 && $TheNumb != 9){
				$X++;
					if($X == 3){
						$X = 2;
					
						if($Y == 1){
						$TheNumb = 9;
						$Yes = 1;
						}	
					}

					if($TheNumb == 5){
						$TheNumb = "";
						$X = 0;	
						$Yes = 0;
					}
				}
					break;
		}
	}


	if($Yes == 1){
	return $TheNumb;
	}else{
	return $Keypad[$Y][$X];
	}
}


		
		/*		2016 Day 3		*/

function TriangleCheck($A, $B, $C){

	$Check= 0;

		if($A+$B>$C && $B+$C>$A && $C+$A>$B){
			$Check = 1;
		}

		return $Check;
}


function Trianglelist($Triangle){
	
	$sum = 0;

		for($C = 0; $C<count($Triangle); $C++){


			preg_match_all('/\d+/', $Triangle[$C], $matches);

			$Nr1 = $matches[0][0];
			$Nr2 = $matches[0][1];
			$Nr3 = $matches[0][2];


		 	$sum += TriangleCheck($Nr1, $Nr2, $Nr3);

		}
		 	
		 	return $sum;
}


function Resort($array){

	$Triangles = array();
	$Triangle1 = array();
	$Triangle2 = array();
	$Triangle3 = array();
	$count = 0;

	for($C = 0; $C<count($array); $C++){


		preg_match_all('/\d+/', $array[$C], $matches);

			$Nr1 = $matches[0][0];
			$Nr2 = $matches[0][1];
			$Nr3 = $matches[0][2];

			array_push($Triangle1, $Nr1);
			array_push($Triangle2, $Nr2);
			array_push($Triangle3, $Nr3);
		

		if($count%3 == 2){
		
			array_push($Triangles, $Triangle1);
			array_push($Triangles, $Triangle2);
			array_push($Triangles, $Triangle3);

			$Triangle1 = array();
			$Triangle2 = array();
			$Triangle3 = array();
	
			}

			$count++;
		}

			return $Triangles;
}


function WorkingTriangles($array){

	$sum = 0;

		for($C = 0; $C<count($array); $C++){

			$sum += TriangleCheck($array[$C][0], $array[$C][1], $array[$C][2]);

		}

	return $sum;
}

echo "<br>";

		/*		2017		*/
		EnterInput3($input3);

		/*		2016		*/
	EnterInput4($input4);


function EnterInput3($input){

	$Numbers = str_split($input);

	echo "<br> Correct number is: ".getSum1($Numbers);
	echo "<br> Correct number is: ".getSum2($Numbers);

}

function EnterInput4($input){

	$directions = explode(',' , $input);

	$Results = BunnyHQ1($directions);

	echo "<br><br>"."Distance to HQ Part 1: ".$Results[0];
	echo "<br> Distance to HQ Part 2: ".DoubleStep($Results[1], $Results[2]);

}

		/*		2017		*/

		function getSum1($array){

			$test = 0;
			$sum = 0;
			
				for($counter = 0; $counter<count($array); $counter++){
					if($array[$counter]== $test){
						$sum += $test;
				}
				$test = $array[$counter];
					}
					if($array[0]==$array[count($array)-1]){
						$sum +=$array[count($array)-1];
					}
					return $sum;
			}
			
			function getSum2($array){
			
				$sum = 0;
			
					for($counter = 0; $counter<count($array); $counter++){
						if($array[$counter]== $array[($counter+(count($array)/2))%count($array)]){
							$sum += $array[$counter];
					}		
				}
				return $sum;
			}
			
					/*		2016	Day1	*/
					
			function BunnyHQ1($array){
			
			
				$Xaxis = 0;
				$Yaxis = 0;
				$Steps = 0;
				
				$Direction = 1;
				$Xcoordinate = array();
				$Ycoordinate = array();
			
				for($counter = 0; $counter<count($array); $counter++){
						
						if($array[$counter][1] == 'R'){
							$Direction++;
							if($Direction == 4){
								$Direction = 0;
							}
						}else {
							$Direction--;
							if($Direction == -1){
								$Direction = 3;
							}
						}
			
					
						$Walk= (int) filter_var($array[$counter], FILTER_SANITIZE_NUMBER_INT);
			
						for($count = 0; $count<$Walk; $count++){
						
			
						switch ($Direction){
			
						case 0:
							$Xcoordinate[$Steps] = $Xaxis--;
							$Ycoordinate[$Steps] = $Yaxis;
							$Steps++;
							break;
			
						case 1:
							$Ycoordinate[$Steps] = $Yaxis++;
							$Xcoordinate[$Steps] = $Xaxis;
							$Steps++;
							break;
			
						case 2:
							$Xcoordinate[$Steps] = $Xaxis++;
							$Ycoordinate[$Steps] = $Yaxis;
							$Steps++;
							break;
			
						case 3:
							$Ycoordinate[$Steps] = $Yaxis--;
							$Xcoordinate[$Steps] = $Xaxis;
							$Steps++;
							break;
						}
			
					}
					
			
				}
					$Xaxis = Positive($Xaxis);
					$Yaxis = Positive($Yaxis);
			
				$sum = $Xaxis + $Yaxis;
			
				$Results = array($sum, $Xcoordinate, $Ycoordinate);
				
			
				return $Results;
			}
			
			
			function Positive($Value){
			
				if($Value<0){
						$Value= $Value*-1;
					}
					return $Value;
			}
			
			
			function DoubleStep($X,$Y){
			
				$Distance = 0;
			
				for($C = 0; $C<count($X); $C++){
					for($Z = 0; $Z<$C; $Z++){
					if($X[$C]==$X[$Z] && $Y[$C]==$Y[$Z]){
								
						$Distance= Positive($X[$Z])+Positive($Y[$Z]);
						return $Distance;
			
						}
					}
				}
			}
			
			