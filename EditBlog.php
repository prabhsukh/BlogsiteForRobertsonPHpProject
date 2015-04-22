<?php
    include 'config.php';
    require_once 'layout2.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
    
    if (isset($_GET["UserID"]) && $_GET["UserID"] != '') {
        $sql = "SELECT * FROM tbBlog b JOIN tbUser u ON u.UserID = b.UserID WHERE b.UserID = ".$_GET["UserID"];
    }
    else
    {
        $sql = "SELECT * FROM tbBlog b JOIN tbUser u ON u.UserID = b.UserID";
    }
    
    $resultSql = mysql_query($sql);
    
    $nr = mysql_num_rows($resultSql); 
    if ($nr <= 0) {
        echo "There are no blogs for this user!  Please tell them to update!! If it's you, UPDATE!!";
    }
    else
    {
    if (isset($_GET['pn'])) {
        $pn = preg_replace('#[^0-5]#i', '', $_GET['pn']); 
    } else { 
        $pn = 1;
    } 

    $itemsPerPage = 6; 

    $lastPage = ceil($nr / $itemsPerPage);

    if ($pn < 1) { 
        $pn = 1; 
    } else if ($pn > $lastPage) { 
        $pn = $lastPage; 
    } 

    $centerPages = "";
    $sub1 = $pn - 1;
    $sub2 = $pn - 2;
    $add1 = $pn + 1;
    $add2 = $pn + 2;
    if ($pn == 1) {
        $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    } else if ($pn == $lastPage) {
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
        $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    } else if ($pn > 2 && $pn < ($lastPage - 1)) {
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
        $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
    } else if ($pn > 1 && $pn < $lastPage) {
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
        $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
        $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    }

    $limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 

        if (isset($_GET["UserID"]) && $_GET["UserID"] != '') {
            $sql = "SELECT * FROM tbBlog b JOIN tbUser u ON u.UserID = b.UserID WHERE b.UserID = ".$_GET["UserID"]." ORDER BY b.BlogID DESC $limit";
        }
        else
        {
            $sql = "SELECT * FROM tbBlog b JOIN tbUser u ON u.UserID = b.UserID ORDER BY b.BlogID DESC $limit";
        }

    $query = mysql_query($sql);
    $paginationDisplay = ""; 
    if ($lastPage != "1"){

        $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';

        if ($pn != 1) {
            $previous = $pn - 1;
            $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
        } 

        $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';

        if ($pn != $lastPage) {
            $nextPage = $pn + 1;
            $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
        } 
    }

        $outputList = '<table>';
        while($row = mysql_fetch_array($query)){
            $outputList .='<tr style="vertical-align:top;border-top:2px;"><td style="padding-bottom:30px;"><a href="profile.php?userid='.$row['UserID'].'"><img width="100px" height="100px" src="'.$row['ProfileImageUrl'].'" /></a></td>'
                .'<td style="padding-bottom:30px;"><a href="Blog.php?BlogID='.$row['BlogID'].'">'.$row['BlogMessage'].'</a></td></tr>';
        }
        $outputList .='</table>';

         echo $paginationDisplay;
         print "$outputList";
         echo $paginationDisplay;
    }
    
    echo after_content();
    echo use_footer();
    echo end_body();
    echo end_page();
?>