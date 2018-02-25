<?php
    require_once("mannen_sub.php");
?>

	<HTML>

	<HEAD>
		<META charset="UTF-8">
		<TITLE>万年カレンダー</TITLE>
	</HEAD>

	<BODY>
		<H1>今月のカレンダー</H1>
		<HR>

		<FORM ACTION='<?php print $_SERVER["PHP_SELF"]; ?>' METHOD='GET'>

			<input type="text" name="NEN" value="<?php print nenshoki(); ?>"> :
			<SELECT NAME='TSUKI'>
<?php 

    $islct = 0;
    $islct = tsukishoki();

    $slctset[0] = " ";
    for ($icnt=1;$icnt<=12;$icnt++) {
        $slctset[$icnt] = " ";
    }
    $slctset[tsukishoki()] = " selected ";

    print "<OPTION VALUE='1' ".$slctset[1]." >1";
    print "<OPTION VALUE='2' ".$slctset[2]." >2";
    print "<OPTION VALUE='3' ".$slctset[3]." >3";
    print "<OPTION VALUE='4' ".$slctset[4]." >4";
    print "<OPTION VALUE='5' ".$slctset[5]." >5";
    print "<OPTION VALUE='6' ".$slctset[6]." >6";
    print "<OPTION VALUE='7' ".$slctset[7]." >7";
    print "<OPTION VALUE='8' ".$slctset[8]." >8";
    print "<OPTION VALUE='9' ".$slctset[9]." >9";
    print "<OPTION VALUE='10' ".$slctset[10]." >10";
    print "<OPTION VALUE='11' ".$slctset[11]." >11";
    print "<OPTION VALUE='12' ".$slctset[12]." >12";

?>
<INPUT TYPE=SUBMIT VALUE='実行'>
</FORM>

<HR>

<?php
    //require_once("mannen_sub.php");

    print "表示" ;
    $wd[0] = "";
    $k = 0;    // 曜日が代入される変数
    $iend = 0; // その月が何日までかの数が代入される変数
    if ( isset($_GET['NEN']) ) {

        // 配列 $wd の数の確保と初期化
        for ( $i=0; $i < 42; $i++ ) {
           $wd[$i] = "　";
        }

        // 配列の該当曜日から日付を代入していく
        $iend = tsukinisuu($_GET['NEN'],$_GET['TSUKI']);
        $k = youbikeisan($_GET['NEN'],$_GET['TSUKI']);
        for ( $i=1; $i <= $iend; $i++ ) {
           $wd[$k] = $i;
           $k++;
        }



        print "<table border = '1¥¥'>";
        print "<tr>";        
        print "<td>日</td>";
        print "<td>月</td>";
        print "<td>火</td>";
        print "<td>水</td>";
        print "<td>木</td>";
        print "<td>金</td>";
        print "<td>土</td>";
        print "</tr>";        
        // 配列 $wd の全表示その①
        print "<tr>";        
        for ( $i=0; $i < 42; $i++ ) {
           print "<td>".$wd[$i]."</td>";
           if ($i == 6 ) {
                print "</tr><br><tr>";
           }  else if ($i == 13 ) {
                print "</tr><br><tr>";
           }  else if ($i == 20 ) {
                print "</tr><br><tr>";
           }  else if ($i == 27 ) {
                print "</tr><br><tr>";
           }  else if ($i == 34 ) {
                print "</tr><br><tr>";
           }
        }
        print "</tr>";        


        // 配列 $wd の全表示その②
        print "<table border = '1¥¥'>";
        print "<tr>";        
        print "<td>日</td>";
        print "<td>月</td>";
        print "<td>火</td>";
        print "<td>水</td>";
        print "<td>木</td>";
        print "<td>金</td>";
        print "<td>土</td>";
        print "</tr>";        
        $xx = 6;
        for ( $i=0; $i < 42; $i++ ) {
           print "<td>".$wd[$i]."</td>";
           if ($i == $xx ) {
                print "</tr><br><tr>";
                $xx = $xx + 7;
           }
        }
        print "</tr>";        


    }


?>

</BODY>
</HTML>
