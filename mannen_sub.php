

<?php

    //紀元元年１月１日から
    //引数で受け取った年の１２月３１日までの
    //日数を計算する。
    //引数；   $iarg int 指定年
    //戻り値； $iret int 日数
    function daycnt1($iarg){
        $iret=0;//戻り値を代入する変数

        // 紀元元年から引数で受け取った年まで
        // 順に365と閏加算分(1)を加えていく
        // 関数uruuは年を与えられ、
        // その年が閏年なら1を
        //         平年なら0を返す
        for ($icnt=1; $icnt <= $iarg; $icnt++ ) {
            $iret = $iret + 365 + uruu($icnt);
        }

        return $iret;
    }



    //引数で受け取った年の１月１日から
    //引数で受け取った月の１日までの
    //日数を計算する。
    //引数；   $iarg1   int 年
    //         $iarg2 int 月
    //戻り値； $iret   int 日数
    function daycnt2($iarg1,$iarg2){
        $iret=0;

        // 前月末までの日数計算
        for($i=1; $i<$iarg2; $i++){
            $iret=$iret+tsukinisuu($iarg1,$i);
        }

        // 指定月の１日を加算
        $iret=$iret + 1;

        return $iret;
    } 

    //引数で受け取った年、月から
    //その月の日数を返す
    //引数；   $iarg1 int 年
    //         $iarg2 int 月
    //戻り値； $iret  int その月の日数
    function tsukinisuu($iarg1,$iarg2){
        $iret=0;

        if ( $iarg2 == 1 ) {
            $iret = 31;
        } else if ( $iarg2 ==  2 ) {
            $iret = 28 + uruu($iarg1);
        } else if ( $iarg2 ==  3 ) {
            $iret = 31;
        } else if ( $iarg2 ==  4 ) {
            $iret = 30;
        } else if ( $iarg2 ==  5 ) {
            $iret = 31;
        } else if ( $iarg2 ==  6 ) {
            $iret = 30;
        } else if ( $iarg2 ==  7 ) {
            $iret = 31;
        } else if ( $iarg2 ==  8 ) {
            $iret = 31;
        } else if ( $iarg2 ==  9 ) {
            $iret = 30;
        } else if ( $iarg2 == 10 ) {
            $iret = 31;
        } else if ( $iarg2 == 11 ) {
            $iret = 30;
        } else if ( $iarg2 == 12 ) {
            $iret = 31;
        }
        return $iret;
    } 



    //引数で受け取った年が閏年なら１を
    //                    平年なら０を返す
    //引数；   $iarg   int 年
    //戻り値； $iret   int 閏年: 1
    //                     平年: 0
    function uruu($iarg){
        $iret=0;
        $x=$iarg;
    
        if(($x%400)==0){
            $iret=1;
        }else if(($x%100)==0){
            $iret=0;
        }else if(($x%4)==0){
            $iret=1;
        }else{
            //処理なし
        }
        return $iret;      
    }

    // 年と月を渡して、その月の１日の曜日を得る。
    //引数；   $iarg1   int 年
    //         $iarg2 int 月
    //戻り値； $iret   int 日数
    function youbikeisan($iarg1,$iarg2){
        $iret=0;
        $x=daycnt1($iarg1-1);      //紀元元年１月１日から
                                   //指定年前年の大晦日までの日数

        $y=daycnt2($iarg1,$iarg2); //指定年元日から指定月１日までの日数

        $z= $x + $y;               //紀元元年１月１日から
                                   //指定年指定月１日までの日数

        $iret=($x+$y)%7;           //日数を７で割ったあまり（曜日）

        return $iret;
    }

    // 年の初期値を返す。
    // $_GETにNENが設定されていたら、その値
    // いなければ、システム当年
    function nenshoki() {
        $iret = 0;
        if ( isset($_GET['NEN']) ) {
            $iret = $_GET['NEN'];
        } else {
            $iret = date('Y'); // date関数下記参照
        }
        return $iret;
    }

    // 月の初期値を返す。
    // $_GETにNENが設定されていたら、その値
    // いなければ、システム当月
    function tsukishoki() {
        $iret = 0;
        if ( isset($_GET['TSUKI']) ) {
            $iret = $_GET['TSUKI'];
        } else {
            $iret = date('n'); // date関数下記参照
        }
        return $iret;
    }


//  date関数のパラメータ
//  Y ： 4桁の年  （例："2010"）
//  y ： 2桁の年  （例："10"）
//  m ： 2桁の月  （"01"から"12"）
//  M ： 月名     （"Jan"から"Dec"）
//  n ： 月       （"1"から"12"）
//  d ： 2桁の日付（"01"から"31"）
//  j ： 日付     （"1"から"31"）

?>


