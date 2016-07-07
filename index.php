<?php
if (!file_exists('events.doc')){
 function onload(){
     echo '';
}
 } else {   
    function onload(){
        $content = file_get_contents('events.doc');
        $unsArr = unserialize($content);
        foreach($unsArr as $ar){
            echo ' <div class=\'next text-center\'> ';
            foreach($ar as $key=>$val){
                echo '<span>'.$key.': '.$val.'</span><br>';
            }
            echo '</div>';
        }
    } 
}
    function first(){     
if ($_POST) {
    if (file_exists('events.doc')){
        $content = file_get_contents('events.doc');
        $unsArr = unserialize($content);
        array_push($unsArr,$_POST);
        foreach($unsArr as $ar){
            echo ' <div class=\'next text-center\'> ';
            foreach($ar as $key=>$val){
                echo '<span>'.$key.': '.$val.'</span><br>';
            }
            echo '</div>';
        }
        $serArr = serialize($unsArr);
        file_put_contents('events.doc',$serArr);     
    }
    else {   
    $A = [];  
    array_push($A,$_POST);
    $serArr = serialize($A);
    file_put_contents('events.doc',$serArr);
    $content = file_get_contents('events.doc');
    $unsArr = unserialize($content);
        foreach($unsArr as $ar){
            echo ' <div class=\'next text-center\'> ';
                foreach($ar as $key=>$val){
                    echo '<span>'.$key.': '.$val.'</span><br>';
                }
            echo '</div>';
        }
    }
    exit();
}
}
first();
?>  
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="utf-8">
        <title>Календарь</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Предстоящий ивент</h4><span id=''></span>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <input type="text" id='event_name' placeholder="Название">
                            <input type="text" id='discription' placeholder='Описание'>
                            <input type="text" id='town' placeholder="Город">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="dob btn btn-primary">Добавить</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
    function daysinmonth($month,$year) {
            $dim = 0;
            switch ($month){
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                    $dim=31;
                    break;
                case 4:
                case 6:
                case 9:
                case 11:
                    $dim=30;
                    break;
                case 2:
                    if($year%4==0) {
                        if($year%100==0) {
                            if($year%1000==0) { $dim=29; } else { $dim=28; }
                        } else {
                            $dim=29;
                        }
                    } else {$dim=28;}
                    break;
            }
            return($dim); 
        }       
    function dayofweek($a){
        for ($e=1;$e<=$a-1;$e++){
            echo '<div class=\'dayP text-center\'>';
            echo '</div>';
        }
    }
        for ($i=1; $i<13; $i++){
            echo '<div class=\'month text-center\'>';
            $mes = date('F', mktime(0,0,0,$i,1,2016));
            echo $mes;    
            echo '<div class=\'days\'>';
            $a = date('N', mktime(0,0,0,$i,1,2016));
            dayofweek($a);
            for ($j=1; $j<=daysinmonth($i,2016); $j++){
                $den = date('j', mktime(0,0,0,$i,$j,2016));
                $date = $den.' '.$mes;
                    echo '<div class = \'day text-center\' 
                                        data-id= \' '.$date.' 2016 \'
                                        data-target= #myModal
                        >';
                    echo $den;
                    echo '</div>';
            }
                echo '</div>';
            echo '</div>';
        }        
        ?>
        </div>
        <div class="container">
            <div class='evente text-center'>
                <?php
     onload();
     ?>
            </div>
        </div>


        <script src="js/jquery-2.2.4.js" type='text/javascript'></script>
        <script src="js/bootstrap.js" type='text/javascript'></script>
        <script src="js/main.js" type='text/javascript'></script>
    </body>

    </html>