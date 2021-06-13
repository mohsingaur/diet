<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home | ODSP </title>
  <?php
  include 'includes/heads.php'; 
  ?>

</head>
<body>

<?php
include 'includes/config.php';
@include 'includes/credits.php';
include 'includes/nav.php';
include 'includes/loginModal.php';
include 'includes/signupModal.php';
include 'includes/forgetpwdModal.php';
include 'includes/commentModal.php';
?>

<div style="padding-top: 40px;"></div>

<div id="study">
	<div class="content">

	<h1>Welcome to MyDocWorld</h1>

	<div class="sidebar">
      <ul>
      <?php
        $catlist = mysqli_query($link, "SELECT * FROM od_category");
        while ($row=mysqli_fetch_array($catlist, MYSQLI_ASSOC)) {
          echo "<li> <a href='docs.php?recs=$row[catid]'> $row[categoryname] </a> </li> ";
        }
      ?>
      </ul>
    </div> <!-- sidebar class ends here-->

	<div class="posts">
      
      <div class='pan'>

      <?php
        $getCatid = $_GET['recs'];
        $lt = 10;
        $sql = @mysqli_query($link,"SELECT f.uid, f.postdate, f.*, c.*, s.*, u.*, o.* FROM files f LEFT JOIN course c ON f.courseid=c.cid LEFT JOIN subjects s ON f.subjectid=s.sid LEFT JOIN od_category o ON f.ctid=o.catid LEFT JOIN od_users u ON f.uid=u.uid WHERE (f.uid=u.uid AND o.catid=$getCatid) AND (f.status=1 AND f.approve=1) LIMIT $lt");
        $ucount = mysqli_num_rows($sql);
        $ct = mysqli_query($link, "SELECT * FROM od_category WHERE catid=$getCatid");
        $ctn=mysqli_fetch_assoc($ct);
        
        ?>
        
        <div class='pan-header'>
          <h4><?=$ctn['categoryname']." (".$ucount.")" ?></h4>
        </div>

        <?php
        for ($i=0; $i < $ucount ; $i++) { 
          $row = mysqli_fetch_assoc($sql);
          if ($ucount<0) {
        	echo "No Files yet";
        	}
        	else{
        ?>
        <div class='pan-body'>
          
          <!--<div class='side-bar'>
            <img src='images/download.png' >
          </div>-->

          <div class='pan-content'>
          
            <div class='p-profile'>
              <div class='p-pic'>
                <img src='images/<?=$row['udp']?>'>
              </div>
              
              <div class='p-date'>
                <?=$row['title']?> <br>
                <strong>By</strong> <i> <?=$row['username']?> </i>
              </div>
              <div class='clrfix'></div>
            </div>
            
            <hr>
      
            <div class='p-nav'>
              <i title="category"> <?=$row['categoryname']?> </i> &nbsp; | &nbsp;
              <i title="filetype"> <?=$row['filetype']?> (<?=ceil($row['filesize']/1024)?> KB) </i> &nbsp; | &nbsp; 
              <i title="Course"> <?=$row['c_name']?> </i> &nbsp; | &nbsp; 
              <i title="Subject"> <?=$row['sname']?>  </i> &nbsp; | &nbsp; 
              <i title="Semester"> <?=$row['semester']?> Sem</i> &nbsp; | &nbsp; 
              <i title='Year'> <?=$row['year']?> </i>
              <p>
                <b>Description:</b> <br>
                <?=$row['description']?>
              </p>
            </div>
              
            <hr>
              
            <div class='p-footer'>
            <?php
              // Count Likes and dislikes
              $countlikes = mysqli_query($link,"SELECT count FROM upvote WHERE fid=$row[fileid]");
              $cnl = mysqli_num_rows($countlikes);

              $countdlikes = mysqli_query($link,"SELECT dcount FROM downvote WHERE fid=$row[fileid]");
              $cndl = mysqli_num_rows($countdlikes);

              $coms = mysqli_query($link, "SELECT c.comment_text, o.username FROM comments c, od_users o WHERE c.uid=o.uid AND fid=$row[fileid] ORDER BY c.comid DESC ");
              $comcnt = mysqli_num_rows($coms);
              
            ?>

              <div class='p-left flt-lt'>
                <i class='fa fa-thumbs-up' title='Upvote (<?=$cnl?>)' onclick='upVote(<?=$row['fileid']?>,<?=$cnl?>)'></i> (<span id='<?=$cnl?>'> <?=$cnl?> </span>) &nbsp; | &nbsp;

                <i class='fa fa-thumbs-down' title='Down Vote (<?=$cndl?>)' onclick='downVote(<?=$row['fileid']?>,<?=$cndl?>)'> (<span id='cnld'> <?=$cndl?> </span>) </i> &nbsp; | &nbsp; 

                <i class='fa fa-comments' title='No of Comments' onclick="com(<?=$row['fileid']?>)"> </i> <span title="Comments (<?=$comcnt?>)"> (<?=$comcnt?>) </span> &nbsp; | &nbsp; 

                <i class='fa fa-flag' title='Report'> </i> &nbsp;

                <div class="cmnt" id="<?=$row['fileid']?>">
                  <textarea placeholder="Say something?..." id="<?='sms'.$i?>"></textarea>
                  <input type="button" class="btn btn-default" onclick="commentNow(<?=$row['fileid']?>,'<?='div'.$i?>','<?='sms'.$i?>')" value="Post">
                  <span id="<?='div'.$i?>">  </span>
                </div>
              </div>
                
              <div class='p-right flt-rt'>
                <?php if (isset($_SESSION['userId'])) {
                  if ($total_credits<=0 AND $row['credit']==0){
                    echo "
                    <i class='fa fa-certificate' title='Credits' style='color:blue;'></i> $row[credit] Points | &nbsp; 
                    <a class='btn btn-danger' href='view.php?fn=$row[filetmpname]'> Download <i class='fa fa-download' ></i> </a> &nbsp;";
                  }
                  else if ($total_credits >= $row['credit']) {
                    echo "<i class='fa fa-certificate' title='Credits' style='color:blue;'></i> $row[credit] Points | &nbsp; 
                    <a class='btn btn-danger' href='view.php?fn=$row[filetmpname]'> Download <i class='fa fa-download' ></i> </a> &nbsp;";
                  }
                  elseif ($total_credits < $row['credit']) {
                    echo "<i class='fa fa-certificate' title='Credits' style='color:blue;'></i> $row[credit] Points | &nbsp; Short of credit points";
                  }
                }
                else{ ?>
                    <i class='fa fa-certificate' title='Credits' style='color:blue;'></i> <?=$row['credit']?> Points | 
                    <span data-toggle='modal' data-dismiss='modal' data-target='#login'> Login to Download </span>
                <?php }
                ?>
              </div>
              <div class="clrfix"></div>
                <hr>
                <h6> <u>Comments</u> </h6>
                
                <div id="coms">
                <?php
                if ($comcnt>0) {
                  while($comtxt = mysqli_fetch_array($coms)){
                ?>
                  <div class="comtext">
                    <dl>
                      <dt> <i> <?=$comtxt[1]?> </i> said~ </dt> 
                      <dd> <?=$comtxt[0]?> </dd>
                    </dl>
                  </div>
                <?php } }
                else{
                  echo "<div class='comtext'>No Comment yet</div>";
                }

                ?>
                </div>
            
            </div> <!-- p-footer ends here-->

          </div>  <!-- pan content ends here-->

          <div class='clrfix'></div>

        </div> <!-- pan-body ends here-->

        <?php }
         } ?> <!-- for loop ends here -->

    </div> <!-- pan class ends here-->

    <?php
    if($lt<$ucount+1){
      echo "<button class='btn btn-block btn-info' onClick='loadMore($lt+5)'>Load More</button>";
    }
    ?>
    </br>

  </div>  <!-- posts class ends here-->

  </div> <!-- content class ends here-->

</div> <!-- study id ends here-->


</body>
</html>

