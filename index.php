<?php require_once('Connections/cms.php'); ?>
<?php
$albumID = 119;
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//content
mysqli_select_db($database_cms);
$query_bio = "SELECT * FROM cmsPages WHERE pageID = 83";
$bio = mysqli_query($query_bio) or die(mysqli_error());
$row_bio = mysqli_fetch_assoc($bio);
$totalRows_bio = mysqli_num_rows($bio);

mysqli_select_db($database_cms);
$query_reviews = "SELECT * FROM cmsPages WHERE pageID = 85";
$reviews = mysqli_query($query_reviews) or die(mysqli_error());
$row_reviews = mysqli_fetch_assoc($reviews);
$totalRows_reviews = mysqli_num_rows($reviews);

mysqli_select_db($database_cms);
$query_hire = "SELECT * FROM cmsPages WHERE pageID = 84";
$hire = mysqli_query($query_hire) or die(mysqli_error());
$row_hire = mysqli_fetch_assoc($hire);
$totalRows_hire = mysqli_num_rows($hire);

//photos
mysqli_select_db($database_cms);
$query_Recordset1 = "SELECT * FROM photos WHERE albumID = ".$albumID." ORDER BY photoSequence ASC";
$Recordset1 = mysqli_query($query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bellydancer Yuliya in NYC New York &amp; New Jersey</title>
<meta name="description" content="Yuliya is a Professional Bellydancer in New York & New Jersey" />
<meta name="keywords" content="Bellydance, New York, New Jersey, Professional, Performer, Artist" />
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/masonry.css"/>
<link rel="stylesheet" type="text/css" href="css/lightbox.css"/>
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script>
		var apiEndpoint = 'http://vimeo.com/api/v2/';
		var oEmbedEndpoint = 'http://vimeo.com/api/oembed.json'
		var oEmbedCallback = 'switchVideo';
		var videosCallback = 'setupGallery';
		var vimeoUsername = 'yuliyadancer';
		// Get the user's videos
		$(document).ready(function() {
			$.getScript(apiEndpoint + vimeoUsername + '/videos.json?callback=' + videosCallback);
		});
		function getVideo(url) {
			$.getScript(oEmbedEndpoint + '?url=' + url + '&width=504&height=280&callback=' + oEmbedCallback);
		}
		function setupGallery(videos) {
			// Load the first video
			getVideo(videos[0].url);
			// Add the videos to the gallery
			for (var i = 0; i < videos.length; i++) {
				var html = '<li><a href="' + videos[i].url + '"><img src="' + videos[i].thumbnail_medium + '" class="thumb" />';
				html += '<p>' + videos[i].title + '</p></a></li>';
				$('#thumbs ul').append(html);
			}
			// Switch to the video when a thumbnail is clicked
			$('#thumbs a').click(function(event) {
				event.preventDefault();
				getVideo(this.href);
				return false;
			});
		}
		function switchVideo(video) {
			$('#embed').html(unescape(video.html));
		}
	//show a particular video on page load
	$(window).load(function() {
		getVideo('http://vimeo.com/134911897');
	});
	</script>
</head>
<body>
<div class="container">
  <!-- menu button -->
  <div id="wn_menu">MENU
    <div id="wn_hamburger"><span></span><span></span><span></span></div>
  </div>

  <!-- home -->
  <section id="home">
    <div class="sectionContent">
      <div style="padding:5px"><img src="img/yuliya.png" alt="yuliya - nj professional bellydance artist" width="525" height="349"/></div>
      <h1>professional bellydance artist</h1>
    </div>
  </section>
  <section id="hire">
    <div class="sectionContent">
      <h2>hire</h2>
      <div class="translucentBG"> <?php echo $row_hire['pageContent']; ?> </div>
    </div>
  </section>
  <section id="bio">
    <div class="sectionContent">
      <h2>bio</h2>
      <div class="translucentBG"> <?php echo $row_bio['pageContent']; ?> </div>
    </div>
  </section>
  <section id="reviews">
    <div class="sectionContent">
      <h2>reviews</h2>
      <div class="translucentBG">
        <div class="marquee"><?php echo $row_reviews['pageContent']; ?></div>
      </div>
      <div class="centeredOnTablet" style="padding:20px;"><a class="button" href="https://www.gigmasters.com/clientfeedback.asp?rowid=38069">View More 5 Star Reviews</a></div>
    </div>
  </section>
  <section id="videos">
    <div class="sectionContent">
      <h2 class="text_center">videos</h2>
      <div style="max-width:1000px; margin:auto">
        <div id="wrapper">
          <div id="embed"></div>
          <div id="thumbs">
            <ul>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="photos">
    <h2 class="text_center">photos</h2>
    <!-- grid -->
    <div class="masonry">
      <?php do { ?>
        <a class="image-link" href="http://4siteusa.com/uploads/<?php echo $row_Recordset1['file_name']; ?>">
        <div class="item">
          <div class="overlay-item">
            <div class="item-image"><img src="http://4siteusa.com/uploads/thumb-<?php echo $row_Recordset1['file_name']; ?>"></div>
            <?php if ($row_Recordset1['photoTitle'] != ''){ ?>
            <div class="item-title">
              <h2><?php echo $row_Recordset1['photoTitle']; ?></h2>
            </div>
            <?php
		}
		if ($row_Recordset1['photoDescription'] != ''){
		?>
            <p><?php echo $row_Recordset1['photoDescription']; ?></p>
            <?php
		}
		?>
          </div>
        </div>
        </a>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </div>
    <div class="social"> <a class="icon-mail4" href="mailto:Yuliyadance@optonline.net"></a> <a class="icon-facebook3" href="https://www.facebook.com/Yuliyadance"></a> <a class="icon-twitter" href="https://twitter.com/YuliyaDance"></a> <a class="icon-youtube3" href="https://www.youtube.com/channel/UCzSsCOCX7n92gMJyS9hWWTg"></a> </div>
    <p class="text_center padding20">Copyright &copy; YuliyaDance.com <?php echo date("Y"); ?>, All Rights Reserved&nbsp;&nbsp;|&nbsp;&nbsp;Web Design by <a href="http://www.4siteusa.com">4 Site</a></p>
	  <p class="text_center padding20">To hire Yuliya TEXT OR CALL 973.479.6929!</p>
  </section>
</div>
<!-- menu overlay -->
<div class="overlay overlay-hugeinc">
  <nav>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#hire">Hire</a></li>
      <li><a href="#bio">Bio</a></li>
      <li><a href="#reviews">Reviews</a></li>
      <li><a href="#videos">Videos</a></li>
      <li><a href="#photos">Photos</a></li>
    </ul>
    <div class="social"> <a class="icon-mail4" href="mailto:Yuliyadance@optonline.net"></a> <a class="icon-facebook3" href="https://www.facebook.com/Yuliyadance"></a> <a class="icon-twitter" href="https://twitter.com/YuliyaDance"></a> <a class="icon-youtube3" href="https://www.youtube.com/channel/UCzSsCOCX7n92gMJyS9hWWTg"></a> </div>
  </nav>
</div>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script> <script src="js/jquery.marquee.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php
mysql_free_result($query_Recordset1);
mysql_free_result($bio);
mysql_free_result($hire);
?>
