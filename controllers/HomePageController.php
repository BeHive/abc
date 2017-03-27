<?php

// base class with member properties and methods
class HomePageController {

   function showHomepage(){
        $template = <<<EOT
<!DOCTYPE html>
    <html>
        <head>
        </head>
        <body>
        a mostrar homepage
        </body>
    </html>
EOT;
        echo $template;
   }


} // end of class Vegetable
