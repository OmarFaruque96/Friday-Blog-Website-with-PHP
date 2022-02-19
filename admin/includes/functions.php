<?php 

	include "connection.php";



	// delete functions for files
	function delete_files($table,$key,$del_id,$files,$folder_name){

		global $db;

		$del_user  = "SELECT $files FROM $table WHERE $key='$del_id'";
        $result    = mysqli_query($db,$del_user);
        while($row = mysqli_fetch_assoc($result)){
            $file_name = $row[$files];
        }
        unlink('assets/images/'.$folder_name.'/'.$file_name);
        
	}

	// delete functions for data

	function delete($table,$key,$del_id,$redirect){

		global $db;

		$delete_query = "DELETE FROM $table WHERE $key = '$del_id'";
        $result = mysqli_query($db, $delete_query);

        if($result){
            header('Location: '.$redirect);
        }else{
            die("Category delete error.".mysqli_error($db));
        }
	}

	// find name from id
	function find_name( $p_title,$posts,$p_id,$post_id){

		global $db;

		$author_name_sql = "SELECT $p_title FROM $posts WHERE $p_id='$post_id'";
        $result_u = mysqli_query($db, $author_name_sql);
        $row = mysqli_fetch_array($result_u);

        $name = $row[$p_title];

        echo $name;
	}

	// find img url/name from id
	function find_img($image,$posts,$p_id,$post_id){

		global $db;

		$author_name_sql = "SELECT $image FROM $posts WHERE $p_id='$post_id'";
        $result_u = mysqli_query($db, $author_name_sql);
        $row = mysqli_fetch_array($result_u);

        $name = $row[$image];

        return $name;
	}

?>