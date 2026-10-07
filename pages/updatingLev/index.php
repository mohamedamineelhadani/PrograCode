<?php
function upditingLevelInfo($connection,$userId){
    $getLevel =mysqli_query($connection,"SELECT * FROM levels WHERE IdUser ='$userId'");
    if($getLevel){
        while ($level = mysqli_fetch_assoc($getLevel)) {
            if ($level["NumLev"] < 4) {
                $title = "Beginner";
                $desc  = "Just started learning. Know the basics.";
            } elseif ($level["NumLev"] <= 7) {
                $title = "Intermediate";
                $desc  = "Can build small projects and solve basic problems.";
            } else {
                $title = "Advanced";
                $desc  = "Build full apps and write clean code.";
            }
            $updateLeveInfo =mysqli_query($connection,"UPDATE levels SET TitleLev = '$title' , DescriptionLev = '$desc' WHERE IdUser ='$userId' AND NameCour = '{$level["NameCour"]}'");
        }
    }
};
?>