<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Invoice-Search</title>
  </head>
  <body>

  
<div class="container" style="max-width: 50%;">
<div class="text-center mt-4">
    <h2>Invoice-Search</h2>
</div>
  <input type="text" class="form-control" id="live_search" placeholder="search" autocomplete="off" >
</div>

<div id="searchresult"></div>

       






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#live_search").keyup(function(){

                var input = $(this).val();

               // alert(input);

               if(input !=""){

                $.ajax({

                    url:"invoicesearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display","block");


                    }
                });

               }else{
                $("searchresult").css("display","none");
               }



            });

        });
        </script>
  
  </body>
</html>