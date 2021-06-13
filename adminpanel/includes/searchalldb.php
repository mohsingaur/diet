<form method="post">
<input type="text" name="search">
<input type="submit" name="click" value="Search">
</form>
<?php

extract($_POST);
if (isset($click)) {
    searchAllDB($search);
}


function searchAllDB($search){
    global $mysqli;

    $out = "";

    $sql = "show tables";
    $rs = $mysqli->query($sql);
    if($rs->num_rows > 0){
        while($r = $rs->fetch_array()){
            $table = $r[0];
            $out .= $table.";";
            $sql_search = "select * from ".$table." where ";
            $sql_search_fields = Array();
            $sql2 = "SHOW COLUMNS FROM ".$table;
            $rs2 = $mysqli->query($sql2);
            if($rs2->num_rows > 0){
                while($r2 = $rs2->fetch_array()){
                    $colum = $r2[0];
                    $sql_search_fields[] = $colum." like('%".$search."%')";
                }
                $rs2->close();
            }
            $sql_search .= implode(" OR ", $sql_search_fields);
            $rs3 = $mysqli->query($sql_search);
            $out .= $rs3->num_rows."\n";
            if($rs3->num_rows > 0){
                $rs3->close();
            }
        }
        $rs->close();
    }

    return $out;
}

?>