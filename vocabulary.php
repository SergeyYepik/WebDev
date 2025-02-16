<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Usefully';
        require_once './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <div class="lefted-div">
            <?php
                echo "<b>My time mark - </b>".mktime(6, 30, 0, 1, 31, 1971)."<br><br>";
                echo "<b>Default time zone - </b>".date_default_timezone_get()."<br><br>";   
                echo "<b>User agents (OS, Browser, etc.) - </b>".$_SERVER['HTTP_USER_AGENT']."<br><br>";             
                echo "<b>OS Name - </b>".php_uname()."<br><br>";   
                echo "<b>PHP OS Type (PHP build for) - </b>".PHP_OS."<br><br>";             
                echo "<b>OS Family - </b>".PHP_OS_FAMILY."<br><br>";   
                echo "<b>PHP Float max - </b>".PHP_FLOAT_MAX."<br><br>";   
                echo "<b>PHP Float min - </b>".PHP_FLOAT_MIN."<br><br>";   
                echo "<b>PHP Float epsilon - </b>".PHP_FLOAT_EPSILON."<br><br>";   
                echo "<b>PHP Number of digits for rounding to float without loosing precision - </b>".PHP_FLOAT_DIG."<br><br>";   
                echo "<b>PHP Error reporting level - </b>".ini_get('error_reporting')."<br><br>";
                echo "<b>PHP Version - </b>".PHP_VERSION."<br><br>";
                echo "<b>\$_SERVER['DOCUMENT_ROOT'] - </b>" . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";
                echo "<b>Base dir - </b>".__DIR__."<br><br>";
                echo "<b>__LINE__ - </b>".__LINE__."<br><br>";
                echo "<b>__FILE__ - </b>".__FILE__."<br><br>";
                echo "<b>__FUNCTION__ - </b>".__FUNCTION__."<br><br>";
                echo "<b>__CLASS__ - </b>".__CLASS__."<br><br>";
                echo "<b>__METHOD__ - </b>".__METHOD__."<br><br>";
                //echo "<b>\$_SERVER['HTTP_ACCEPT'] - </b>" . $_SERVER['HTTP_ACCEPT'] . "<br><br>";
                echo "<b>\$_SERVER['HTTP_HOST'] - </b>" . $_SERVER['HTTP_HOST'] . "<br><br>";
                echo "<b>\$_SERVER['SERVER_NAME'] - </b>" . $_SERVER['SERVER_NAME'] . "<br><br>";
                echo "<b>\$_SERVER['SERVER_PORT'] - </b>" . $_SERVER['SERVER_PORT'] . "<br><br>";
                echo "<b>\$_SERVER['SERVER_SOFTWARE'] - </b>" . $_SERVER['SERVER_SOFTWARE'] . "<br><br>";
                echo "<b>\$_SERVER['SERVER_PROTOCOL'] - </b>" . $_SERVER['SERVER_PROTOCOL'] . "<br><br>";
                echo "<b>\$_SERVER['PHP_SELF'] - </b>" . $_SERVER['PHP_SELF'] . "<br><br>";
                echo "<b>\$_SERVER['REQUEST_URI'] - </b>" . $_SERVER['REQUEST_URI'] . "<br><br>";

                echo '0' == null;


                echo "<b>strlen('Привет, мир!') = </b>".strlen('Привет, мир!')."<br><br>";
                echo "<b>mb_strlen('Привет, мир!') = </b>".mb_strlen('Привет, мир!')."<br><br>";
                $single_quote = '&#039;';
                $double_quote = '&quot;';
                echo "<b>".htmlspecialchars($single_quote)." - </b>"."&#039;"."<br><br>";
                echo "<b>".htmlspecialchars($double_quote)." - </b>"."&quot;"."<br><br>";

                $new = '<a href="test">&Test&</a>';
                echo $new."<br><br>";
                $new = htmlspecialchars($new, ENT_SUBSTITUTE);
                echo $new."<br><br>";
                $new = htmlentities($new);
                echo $new."<br><br>";

                echo "<b>URL (Full page addr. where user come from) - </b>" . $_SERVER['HTTP_REFERER'] . "<br><br>";
                print_r(parse_url($_SERVER['HTTP_REFERER']));
                echo "<br><br>";

                $url_example = 'https://user:pass@www.site.com:8888/path/index.php?par=value#anch';
                echo "<b>URL - </b>" . $url_example . "<br><br>";
                echo "<b>parse_url() - </b>" . "<br><br>";
                echo "<pre>";
                print_r(parse_url($url_example));
                echo "</pre>";
                echo "<br><br>";

//                echo "<b>variables_order - </b>" . ini_get('variables_order') . "<br><br>";
//                echo ini_set('variables_order',  'E' . ini_get('variables_order'));
//                foreach ($_ENV as $key => $value ) echo "<b>$key - </b>" .$value. "<br><br>";
//
//                echo "<b>variables_order - </b>" . ini_get('variables_order') . "<br><br>";

                echo "<b>getenv('USERNAME') - </b>" . getenv('USERNAME') . "<br><br>";

                echo htmlspecialchars('Teг <р> служит для создания параграфа') . "<br><br>";
                echo strip_tags('<p>Hello, world!</p>') . "<br><br>";
                echo htmlentities('Teг <р> служит для создания параграфа') . "<br><br>";

                $correct = 'justine_bobber@mail.com';
                $wrong = 'justine_bobber@//mail.com';
                echo "<b>$correct is correct = </b>" . filter_var($correct, FILTER_VALIDATE_EMAIL) . "<br><br>";
                echo "<b>$wrong is wrong = </b>" . filter_var($wrong, FILTER_VALIDATE_EMAIL) . "<br><br>";
                echo "<b>$wrong is correct too after sanitizing = </b>" . filter_var($wrong, FILTER_SANITIZE_EMAIL) . "<br><br>";

                echo "<b>filter_var('Teг <р> служит для создания параграфа', FILTER_SANITIZE_STRING) = </b>" . filter_var('Teг <р> служит для создания параграфа', FILTER_SANITIZE_STRING) . "<br><br>";
                echo "<b>filter_var('https://www.api.com/index.php?user=Павел', FILTER_SANITIZE_ENCODED) = </b>" . filter_var('https://www.api.com/index.php?user=Павел', FILTER_SANITIZE_ENCODED) . "<br><br>";

                $str = <<<МАRКЕR
                <h1>Заголовок</h1>
                <p>Первый параграф, посвященный "проверке"</p>
                МАRКЕR;

                echo $str . "<br><br>";
                echo '<pre>';
                echo filter_var($str, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                echo '</pre>' . "<br><br>";

                //echo "<b>Defined constants - </b>".var_dump(get_defined_constants())."<br><br>";
            class Point{
                private mixed $point;
                public function __construct($x = 0, $y = 0){
                    $this->point = [];
                    $this->point['x'] = $x;
                    $this->point['y'] = $y;
                }
                public function __get($key){
                    if(array_key_exists($key, $this->point)){
                        return $this->point[$key];
                    } else {
                        return null;
                    }
                }
                public function __set($key, $value){
                    if(array_key_exists($key, $this->point)){
                        $this->point[$key] = $value;
                    }
                }
                public function __toString ()
                {
                    return "($this->x, $this->y)";
                }
            }

            $point = new Point(0x00a0,200);
            //echo $point->x;
            //echo $point->y;

            echo "Point = $point" . "<br><br>";

//            try {
//                if (mt_rand(0, 1)) {
//                    throw new Exception('Exception happened.');
//                }
//            }
//            catch (Exception $e)
//            {
//                exit($e->getMessage() . " " . $e->getCode() . " " . $e->getFile() . " " . $e->getLine());
//            }
//            echo 'Ok.';
//
//            print_r(new Exception());

            try {
                $str = 'just string';
                $str[] = (array)$str;
                print_r($str);
            }
            catch (Error $err){
                echo $err->getMessage();
            }


            ?>
        </div>
        <div class="centered-div">
            <button class="btn" onclick="location.href = &quot;<?=SITE_ROOT?>&quot;">Back</button>
            <br>
            <br>
        </div>
    </main>
    <?php 
        require_once './blocks/aside.php';
    ?>
    <?php 
        require_once './blocks/footer.php';
    ?>
</body>
</html>