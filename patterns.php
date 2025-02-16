<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Patterns';
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
                echo "<br><br>";
                echo "<h2>1. STRATEGY</h2>";
                echo "<h4><em>Context</em> class is used to combine classes that have both different and the same methods.</h4><br>";


                interface CreateFiles {
                    function createFile($file_name);
                }

                class ZipFile implements CreateFiles {
                    public mixed $file;

                    function createFile($file_name) : void{
                        $this->file = "http://web.dev/get?file=$file_name.zip";
                    }
                }

                class TarGzFile implements CreateFiles {
                    public $file; 

                    function createFile($file_name){
                        $this->file = "http://web.dev/get?file=$file_name.tar.gz";
                    }
                }

                class ContextFiles{
                    private CreateFiles $context;

                    function __construct()
                    {
                        $this->context = PHP_OS_FAMILY == "Windows" ? new ZipFile() : new TarGzFile();
                    }

                    function create($file){
                        $this->context->createFile($file);
                    }
                    
                    function showFile(){
                        echo $this->context->file;
                    }
                }

                $obj = new ContextFiles();
                $obj->create('newfile');
                $obj->showFile(); 


                echo "<br><br>";
                echo "<h2>2. ADAPTER</h2>";
                echo "<h4>An <em>Adapter</em> class allows similar methods from different classes to be used under the same name.</h4><br>";
                
                class InKgs{
                    public function sumWeightKgs($a, $b){
                        return "Total weight is ".$a + $b." kgs.<br>";
                    }
                }

                class InPounds{
                    public function sumWeightPounds($a, $b){
                        return "Total weight is ".$a + $b." lbs.<br>";
                    }
                }

                echo "Using raw classes with method:<br>";

                $weightKgs = new InKgs();
                echo $weightKgs->sumWeightKgs(11, 22);

                $weightPounds = new InPounds();
                echo $weightPounds->sumWeightPounds(11, 22);

                trait SumWeightAdapter{
                    public function sumWeight($a, $b){
                        $method = $this->method;
                        return $this->$method($a, $b); 
                    }
                }

                class InKgsAdapted extends InKgs{
                    use SumWeightAdapter;
                    private $method = 'sumWeightKgs';
                }

                class InPoundsAdapted extends InPounds{
                    use SumWeightAdapter;
                    private $method = 'sumWeightPounds';
                }

                echo "Using adapted classes with method with the same name:<br>";

                $weightKgs = new InKgsAdapted();
                echo $weightKgs->sumWeight(11, 22);

                $weightPounds = new InPoundsAdapted();
                echo $weightPounds->sumWeight(11, 22);

                echo "<br><br>";
                echo "<h2>3. FACTORY METHOD</h2>";
                echo "<h4>The <em>Factory</em> class allows you to create objects of different classes using the same method.</h4><br>";

                abstract class Button{
                    protected $html;

                    public function getHtml(){
                        return $this->html;
                    }
                }

                class InputButton extends Button{
                    protected $html = "<input type='button' value='input-button'>";
                }

                class DivButton extends Button{
                    protected $html = "<div>div-button</div>";
                } 

                class FlashButton extends Button{
                    protected $html = "<button>flash-button</button>";
                }

                class ButtonFactory{
                    public static function create($type){
                        $base = 'Button';
                        $target = ucfirst($type).$base;
                        
                        if (class_exists($target) && is_subclass_of($target, $base))
                            return new $target; 
                        else throw new Exception('Unable to create an object of the "'.$target.'" class.');
                    }
                }

                $buttons = array('div', 'input', 'flash', 'radio');
                foreach ($buttons as $button){
                    try{
                        echo ButtonFactory::create($button)->getHtml()."<br>";
                    }
                    catch (Exception $e){
                        echo $e->getMessage();
                    }
                }

                echo "<br><br>";
                echo "<h2>4. DECORATOR</h2>";
                echo "<h4>The <em>Decorator</em> class allows you to dynamically modify methods and properties of existing classes.</h4><br>";

                class Link{
                    public $html;

                    public function __construct()
                    {
                        $this->html = "<a href='/'>Main page</a>";
                    }

                    public function setHtml($html){
                        $this->html = $html;
                    }

                    public function getHtml(){
                        return $this->html;
                    }
                }

                class AccentLink{
                    public $link;

                    public function __construct($link)
                    {
                        $this->link = $link;
                        $this->setHtml("<strong>" . $this->link->html. "</strong>");
                    }

                    public function __call($name, array $args){
                        return $this->link->$name($args[0]);
                    }
                }

                $link = new Link();
                echo $link->getHtml().'<br>';


                $link = new AccentLink($link);
                echo $link->getHtml().'<br>';

                echo "<br><br>";
                echo "<h2>5. SINGLETON</h2>";
                echo "<h4>The <em>Singleton</em> class grants one instance only. Very useful when connecting to a database.</h4><br>";

                include './autoload.php';

                $articles = new Articles();
                foreach ($articles->getAll() as $msg)
                    echo $msg['username'] . " - " . $msg['fulltext'] . "<br>"; 

                echo "<br><br>";
                echo "<h2>Product design principles.</h2>";
                echo "<br>";
                echo "<h2>DRY</h2>";
                echo "<h4><em>Don't Repeat Yourself.</em></h4><br>";
                echo "<br>";
                echo "<h2>DIE</h2>";
                echo "<h4><em>Duplication Is Evil.</em></h4><br>";
                echo "<br>";
                echo "<h2>KISS</h2>";
                echo "<h4><em>Keep It Simple, Stupid.</em></h4><br>";
                echo "<h2>YAGNI</h2>";
                echo "<h4><em>You Aren’t Gonna Need It.</em></h4><br>";
                echo "<h2>SOLID</h2>";
                echo "<h4><em>Single responsibility, Open/Closed, Liskov substitution, Interface segregation, and Dependency inversion.</em></h4><br>";
                echo "<br><h4><em>Single responsibility.</em> Using classes <em>EchoLogError</em> and <em>ConsoleLogError</em> in class <em>Db</em> designed by <em>Single responsibility principle</em>.</h4><br>";
                echo "<br><h4><em>Open/Closed.</em> Using interface <em>ILog</em> for extending properties of logging designed by <em>Open/Closed responsibility principle</em>.</h4><br>";
                echo "<br><h4><em>Liskov substitution.</em> Class <em>EchoLogErrorAndAlert</em> in class <em>Db</em> designed by <em>Liskov substitution principle</em> course it gives expected response.</h4><br>";
                echo "<br><h4><em>Interface segregation.</em> Interface <em>ILogAlert</em> for extending properties of logging designed by <em> Interface segregation principle</em>.</h4><br>";
                echo "<br><h4><em>Dependency inversion.</em> Class <em>CommonLogError</em> designed by <em> Dependency inversion principle</em>.</h4><br>";
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