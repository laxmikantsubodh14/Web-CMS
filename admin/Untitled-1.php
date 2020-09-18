<?php
ini_set( "max_execution_time", "3600" ); // sets the maximum execution time of this script to 1 hour.
$fileName = $_FILES['file']['name']; // get client side file name


if( $fileName ) { 
    // Check File Type
    $fileNameParts = explode( ".", $fileName ); // seperate the name from the ext
    $fileExtension = end( $fileNameParts ); // part behind last dot
    $fileExtension = strtolower( $fileExtension ); // reduce to lower case

    if( !$fileExtension == "mpg" && !$fileExtension == "avi" && !$fileExtension == "mpeg" && !$fileExtension == "wmv" && !$fileExtension == "rm" && !$fileExtension == "dat" ) {
        die( "Invalid Video Format." );
    }
    // Check File Size
    $fileSize = $_FILES['file']['size']; // size of uploaded file
    if( $fileSize == 0 ) {

        die( "Sorry. The upload of $fileName has failed. The file size is 0." );
    } else if( $fileSize > 10240000 ) { //10 MB
        die( "Sorry. The file $fileName is larger than 10MB. Advice: reduce the file quality and upload again." );

    } else {
        $uploadDir = '../uploaded_files/uploadevideo/'; // Where the temp file will go
        $uploadFile = str_replace( " ", "",  $uploadDir . $_FILES['file']['name'] ); // Get rid of spaces in the filename

        $finalDir = '../uploaded_files/uploadevideo1/'; // Where the final file will go
        $finalFile = str_replace( " ", "",  $finalDir . $fileNameParts[0] . ".flv" ); // Get rid of spaces in the filename

        if ( !move_uploaded_file( $_FILES['file']['tmp_name'], $uploadFile ) ) {
            echo "Possible file upload attack!  Here's some debugging info:\n";
            echo( $_FILES );
        }


        $encode_cmd = "/usr/bin/ffmpeg -i $uploadFile -acodec mp3 -ar 22050 -ab 32 -f flv -author \"Clip Author\" -copyright \"Clip Copyright\" $finalFile";
        exec( $encode_cmd );

        unlink( $uploadFile );
        chmod( $finalFile, 0644 );
    }
}
?>