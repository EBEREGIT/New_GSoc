s
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home-Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/custom.css">
  
  <style>

  function check(){
          confirm("Do you want to continue ?");
          if( retVal == true ){
              alert("User wants to continue!");
              return true;
          }else{
              alert("User does not want to continue!");
              return false;
          }
}
</style>

</head>
<body>

<input type="button" onclick="check()" value="Click" />

</body>
</html>
