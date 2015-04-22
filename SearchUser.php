
<html>
    <head>
        <title></title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
      
    </head>
    <body>
        <form>
            <input type="text" name="search" onkeyup="searchq();" placeholder="Search for users" />
            <input type="button" value=">>"/>
        </form>
        <div id="output"></div>
    </body>        
    
        <script>
            function searchq() {
                var searchTxt=$("input[name='search']").val();
                $.post("Search.php",{searchVal:searchTxt},function(output){
                    $("#output").html(output);
                });
           } 
        </script>
</html>
