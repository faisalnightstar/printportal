<?php 
include 'config.php' ;
if(isset($_POST)){
    //print_r($_POST);

    $id = $_POST['id'];
    $file = $_POST['file'];
    $output_file = "panpdf/".$id.".jpg";
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $file );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    $query = "UPDATE `panfind` SET `status`='Generated' WHERE id='$id'";
    $res = mysqli_query($connection,$query);
    echo $res;
    // clean up the file resource
    fclose( $ifp ); 
    echo "Success";

   

}

?>