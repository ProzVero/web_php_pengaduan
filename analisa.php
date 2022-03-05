<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <form name="redirect">
        <center>
        <img src="asset/img/37.gif" width="250px" height="250px" alt=""> <br>
        <form>
        <input type="text" size="2" name="redirect2"><br />
    </form>

    </center>

    <br />

    <script>

    <!--



    /*

    Original Count down then redirect script

    By JavaScript Kit (http://javascriptkit.com)

    Over 400+ free scripts here! Modifi by Numpang-Ngeblog (http://numpang-ngeblog.blogspot.com) 

    */



    //change below target URL to your own

    var targetURL="hasil.php"

    //change the second to start counting down from

    var countdownfrom=3





    var currentsecond=document.redirect.redirect2.value=countdownfrom+1

    function countredirect(){

    if (currentsecond!=1){

    currentsecond-=1

    document.redirect.redirect2.value=currentsecond

    }

    else{

    window.location=targetURL

    return

    }

    setTimeout("countredirect()",1000)

    }



    countredirect()

    //-->

    </script>

    </body>

</html>