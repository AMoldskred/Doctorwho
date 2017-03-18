


<?php 
$file = 'data.json';
$handle = @fopen($file, 'r+');


 $postArray = array(
      	 "time" => $_POST['time'],
         "name" => $_POST["name"],
         "num" => $_POST['num'],
         "quote" => $_POST['quote']
    ); //you might need to process any other post fields you have..
// create the file if needed
if ($handle === null)
{
    $handle = fopen($file, 'w+');
}

if ($handle)
{
    // seek to the end
    fseek($handle, 0, SEEK_END);

    // are we at the end of is the file empty
    if (ftell($handle) > 0)
    {
        // move back a byte
        fseek($handle, -1, SEEK_END);

        // add the trailing comma
        fwrite($handle, ',', 1);

        // add the new json string
        fwrite($handle, json_encode($postArray). ']');
    }
    else
    {
        // write the first event inside an array
        fwrite($handle, json_encode(array($postArray)));
    }

        // close the handle on the file
        fclose($handle);
}
?>