<?php
	//2018_05_10 引数の値を10倍して戻す関数
	function sample1($num){
		return $num * 10;
	}

	//2018_05_10 引数1の値が引数2,3の範囲に入っていればtrue,でなければfalseを返す関数
	function sample2($num1, $num2, $num3){
		if(min($num3, $num2) <= $num1 && $num1 <= max($num2, $num3)){
			return true;
		}
		return false;
	}

	//2018_05_10 引数1の桁数が、引数2と3の範囲に入っていればtrue、でなければfalseを返す関数
	function sample3($str, $num2, $num3){
		return sample2(strlen($str), $num2, $num3);
	}

	//未入力チェックのバリデーション
    function validation($data){
	    //エラーメッセージ
        $error = array();

        // 氏名のバリデーション
        if( empty($data['name']) ) {
            $error[] = "氏名を入力してください。";
        }
        // TELのバリデーション
        if( empty($data['tel']) ) {
            $error[] = "TELを入力してください。";
        }
        // メールのバリデーション
        if( empty($data['mail']) ) {
            $error[] = "メールを入力してください。";
        }

        return $error;
    }
?>