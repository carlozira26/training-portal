<?php

/**
 * User container to store global function
 */
$container = $app->getContainer();
$container['GUMP'] = function(){
    return new GUMP();
};

$container['isEmail'] = function($string = ''){
    return function($string = ''){
        $GUMP = new GUMP();
        $GUMP->validation_rules(array( "email" => "required|valid_email" ));
        $GUMP->filter_rules(array( "email" => "trim|sanitize_string" ));
        $run = $GUMP->run(array(
           "email" => $string
        ));
        if($run){
           return true;
        }else{
           return false;
        }
    };
};

$container['generateRandomChars'] = function(){
    return function($length = 7){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    };
};

$container['passwordConverter'] = function(){
    return function($password = ''){
        return md5("Fau2fAsgh".$password."g2teaTawraw");
    };
};

$container['splitFirstnameLastname'] = function(){
    return function($name = ''){
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    };
};

$container["fixWrongUTF8Encoding"] = function(){

    return function($inputString) {
        $fix_list = array(
            // 3 char errors first
            'â€š' => '‚', 'â€ž' => '„', 'â€¦' => '…', 'â€¡' => '‡',
            'â€°' => '‰', 'â€¹' => '‹', 'â€˜' => '‘', 'â€™' => '’',
            'â€œ' => '“', 'â€¢' => '•', 'â€“' => '–', 'â€”' => '—',
            'â„¢' => '™', 'â€º' => '›', 'â‚¬' => '€',
            // 2 char errors
            'Ã‚'  => 'Â', 'Æ’'  => 'ƒ', 'Ãƒ'  => 'Ã', 'Ã„'  => 'Ä',
            'Ã…'  => 'Å', 'â€'  => '†', 'Ã†'  => 'Æ', 'Ã‡'  => 'Ç',
            'Ë†'  => 'ˆ', 'Ãˆ'  => 'È', 'Ã‰'  => 'É', 'ÃŠ'  => 'Ê',
            'Ã‹'  => 'Ë', 'Å’'  => 'Œ', 'ÃŒ'  => 'Ì', 'Å½'  => 'Ž',
            'ÃŽ'  => 'Î', 'Ã‘'  => 'Ñ', 'Ã’'  => 'Ò', 'Ã“'  => 'Ó',
            'â€'  => '”', 'Ã”'  => 'Ô', 'Ã•'  => 'Õ', 'Ã–'  => 'Ö',
            'Ã—'  => '×', 'Ëœ'  => '˜', 'Ã˜'  => 'Ø', 'Ã™'  => 'Ù',
            'Å¡'  => 'š', 'Ãš'  => 'Ú', 'Ã›'  => 'Û', 'Å“'  => 'œ',
            'Ãœ'  => 'Ü', 'Å¾'  => 'ž', 'Ãž'  => 'Þ', 'Å¸'  => 'Ÿ',
            'ÃŸ'  => 'ß', 'Â¡'  => '¡', 'Ã¡'  => 'á', 'Â¢'  => '¢',
            'Ã¢'  => 'â', 'Â£'  => '£', 'Ã£'  => 'ã', 'Â¤'  => '¤',
            'Ã¤'  => 'ä', 'Â¥'  => '¥', 'Ã¥'  => 'å', 'Â¦'  => '¦',
            'Ã¦'  => 'æ', 'Â§'  => '§', 'Ã§'  => 'ç', 'Â¨'  => '¨',
            'Ã¨'  => 'è', 'Â©'  => '©', 'Ã©'  => 'é', 'Âª'  => 'ª',
            'Ãª'  => 'ê', 'Â«'  => '«', 'Ã«'  => 'ë', 'Â¬'  => '¬',
            'Ã¬'  => 'ì', 'Â®'  => '®', 'Ã®'  => 'î', 'Â¯'  => '¯',
            'Ã¯'  => 'ï', 'Â°'  => '°', 'Ã°'  => 'ð', 'Â±'  => '±',
            'Ã±'  => 'ñ', 'Â²'  => '²', 'Ã²'  => 'ò', 'Â³'  => '³',
            'Ã³'  => 'ó', 'Â´'  => '´', 'Ã´'  => 'ô', 'Âµ'  => 'µ',
            'Ãµ'  => 'õ', 'Â¶'  => '¶', 'Ã¶'  => 'ö', 'Â·'  => '·',
            'Ã·'  => '÷', 'Â¸'  => '¸', 'Ã¸'  => 'ø', 'Â¹'  => '¹',
            'Ã¹'  => 'ù', 'Âº'  => 'º', 'Ãº'  => 'ú', 'Â»'  => '»',
            'Ã»'  => 'û', 'Â¼'  => '¼', 'Ã¼'  => 'ü', 'Â½'  => '½',
            'Ã½'  => 'ý', 'Â¾'  => '¾', 'Ã¾'  => 'þ', 'Â¿'  => '¿',
            'Ã¿'  => 'ÿ', 'Ã€'  => 'À',
            // 1 char errors last
            'Ã' => 'Á', 'Å' => 'Š', 'Ã' => 'Í', 'Ã' => 'Ï',
            'Ã' => 'Ð', 'Ã' => 'Ý', 'Ã' => 'à', 'Ã­' => 'í'
        );
    
        $error_chars = array_keys($fix_list);
        $real_chars  = array_values($fix_list);     
        return str_replace($error_chars, $real_chars, $inputString);
    };

};

?>
