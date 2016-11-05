<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Html Template</title>

  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
  <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <!-- Bootstrap -->
    <link href="http://resource.unicorn.me/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://resource.unicorn.me/web/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://resource.unicorn.me/web/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://resource.unicorn.me/web/css/font-awesome.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://resource.unicorn.me/web/js/jquery-1.11.2.min.js"></script>

  </head>
  <body>

    <div class="container" >
        <div class="row">
          <div class="col-md-12">

             <?php 
                $content=file_get_contents("dirs.json");
                $data=json_decode($content);
             ?>

             <ol>
             <?php
                foreach($data as $row)
                {
                   $k=$row[0];
                   $v=$row[1];

                   echo '<li> ';
                   echo '<a href="/'.$v.'">'.$k.'</a>';
                   echo '</li>';
                }
             ?>
             </ol>

          </div>
        </div>
    </div>



  </body>
</html>
