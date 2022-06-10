<!DOCTYPE html>
<html>
<html lang="en">
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<head>
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">

<input type="radio" class="btn-check" name="btnradio" id="btnradio0" autocomplete="off"  onclick=sort(3) >
<label class="btn btn-outline-primary" for="btnradio0">All</label>


<input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" onclick=sort(0) >
<label class="btn btn-outline-primary" for="btnradio1">Enabled</label>

<input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" onclick=sort(1) >
<label class="btn btn-outline-primary" for="btnradio2">Disabled</label>

</div> 

</head>
<body>
<table  class="table table-striped table-hover table-bordered" id="table">
    <tr>
<th>Full name</th>
<th>NatID</th>
<th>role</th>
<th>date/time</th>
<th>comment</th>
<th>Enable</th>
<th>Disable</th>
<th>promote</th>
    </tr>
</table>

<script>

function sort(sort){
    
   
    $.ajax({
         type: "POST",
         url: 'css.php',
         data: {
          i:sort
         },
         success:function(data)
                  {
                    
                   document.getElementById('table').innerHTML=(data);                     
                  }
 
    });
 
 
 }

</script>

</body>
</html>