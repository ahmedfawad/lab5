<html>
	<head>

<style type="text/css">
a {font-family:Georgia, "Times New Roman", Times, serif;font-size:large;cursor: auto}
a:link {color:blue;}
a:visited {color: #660066;}
a:hover {text-decoration: none; color: #ff9900; font-weight:bold;}
a:active {color: #ff0000;text-decoration: none}
</style>


	</head>
			



<body bgcolor="#99FFCC">

<h1 align="center">   Interactive Image Gallery  </h1>
<br>
<br>
<br>

<br>

	

<a href=" gallery.php" align='center'> <b>Create a Gallery</b></a>

<br>
<br>

<form action="demo.php" method="POST">

   <b> Enter The name of Gallery to veiw: </b><input type="text" name="name" />
    <br>
    <br>

   
    <input type="submit" />
    </form>
    <br>
<br>
<a href=" demo1.php" align='center'> <b>View Gallery(For Demo)</b></a>
<h1> Summary of Galleries</h1>

<?php

function getDirectory( $path = '.', $level = 0 ){ 

    

    $ignore = array( 'cgi-bin', '.', '..' ); 
    // Directories to ignore when listing output. Many hosts 
    // will deny PHP access to the cgi-bin. 

    $dh = @opendir( $path ); 
    // Open the directory to the handle $dh 
     
    while( false !== ( $file = readdir( $dh ) ) ){ 
    // Loop through the directory 
     
        if( !in_array( $file, $ignore ) ){ 
        // Check that this file is not to be ignored 
             
            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) ); 
            // Just to add spacing to the list, to better 
            // show the directory tree. 
             
            if( is_dir( "$path/$file" ) ){ 
            // Its a directory, so we need to keep reading down... 
             
                echo "<hr>";
                echo " Gallery Name:<strong>$spaces $file</strong><br />"; 
                echo "<hr>";
                getDirectory( "$path/$file", ($level+1) ); 
                // Re-call this same function but on a new directory. 
                // this is what makes function recursive. 
             
            } else { 

                $filetype= filetype("$path/$file");;
                $filesize=filesize("$path/$file");;

               /* echo "$spaces $file<br />"; 
                 echo "$spaces $filetype<br />"; 
                  echo "$spaces $filesize<br />"; 

                  echo"<br>";
                  echo"<br>"*/
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
           

                   echo "$file<br />Type: $ext<br />Size: $filesize kb<br />";
                   echo"<br>";
                                 // Just print out the filename 
                //echo  filetype("$path/$file");
                
                 //echo filesize("$path/$file");
                   
               

            } 
         
        } 
     
    } 
     
    closedir( $dh ); 
    // Close the directory handle 

} 

getDirectory('./uploads');


?>







</body>

</html>