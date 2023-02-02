<?php
if ( isset( $_GET[ 'phpFunction' ] ) ) {
  if ( $_GET[ 'phpFunction' ] == 'viewpins' ) {
    viewpins();
  }
}


function viewpins() {

  include "../../src/db.php";
	
   $sql = "SELECT site_posts.*, users.first_name, users.last_name " 
	  	. " FROM `site_posts` "
	    . "  inner join users on site_posts.email=users.email "
	    . "ORDER BY Post_Date DESC";

	$res = mysqli_query( $connection, $sql );

  /* fetch the posts records from the database and for each one found
	 create a card entry to display the contents.
	 
	 Note we only need to find the posts that have been created since
	 the user last logged in.
  */
  
	/* First we set up the empty HTML string that will be returned */
	$html = '';
	

	/* Now loop around all the records found in the database and build a display
		card for each post found */
	while ( $row = mysqli_fetch_assoc($res) ) {

		$html = $html.'      <div class="card" style="margin-right: 5px;">';
		
		/* Set up post title */
		$html = $html.'        <h2>' . $row['Post_Subject'] . '</h2>';
		
		/* Google Map for location of post */
		$html = $html.'			<div id="map"></div>';

		/* Set up post user and posting date */
		$html = $html.'<h5>By '. $row['first_name']." ".$row['last_name'].', '.$row['Post_Date'].', Location:&nbsp'. $row['locationName'] .'</h5>';

		/* set up the post image if any */
		//$html = $html.'        <div class="postimg" style="height: 200px;"></div>';

		/* Set up the post text message */
		$html = $html.'        <p>' . $row['Post_Content'] . '</p>';
		
		
		$html = $html.'<a href="https://www.google.com/maps/search/?api=1&query='.$row['lat'].','.$row['lon'].'">Click here to view location</a>';
		
		if (  $row['Post_Comments'] != "" ) {
			$html = $html.'  <hr />  <p><span style="font-weight:bold; font-size:larger">Comments</span><br/>' . $row['Post_Comments'] . '</p>';			
		}

		$html = $html.'        <div id="divNewComment_' . $row['Post_ID'] . '" style="display:none">';
		$html = $html.'        <textarea name="txtComment_' . $row['Post_ID'] . '" id="txtComment_' . $row['Post_ID'] . '" rows="1" cols="50"></textarea>';
		$html = $html.'        </div>';
		
		/* Now for the buttons */
		$html = $html.'        <div class="btn-group" role="group">';
		$html = $html.'          <button class="btn btn-primary" type="button" name="like" onclick="PostLike('.$row["Post_ID"].')">Like</button>&nbsp;<h3>'.$row["likes"].'</h3>';

		
		$html = $html.'          <button class="btn btn-primary" type="button" name="btnComment_'.$row["Post_ID"].'" '
						. 'id="btnComment_'.$row["Post_ID"].'" style="margin-left: 75%;" '
						. 'onclick="ShowComment(this, ' . $row['Post_ID'] . ')" '
			            . '>Comment</button>';

		
$html = $html.'</div>';
		$html = $html.'</div>';
	}
	echo $html;
}
?>