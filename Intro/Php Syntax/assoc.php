<?php 

$users = [
    [
        "username" => "PixelWizard",
        "age"      => 28,
        "is_pro"   => true
    ],
    [
        "username" => "CodeMaster",
        "age"      => 34,
        "is_pro"   => false
    ],
    [
        "username" => "ByteSize",
        "age"      => 22,
        "is_pro"   => true
    ],
];

echo $users[2]['username']; // Output: ByteSize
echo "<br>";
echo $users[1]['age'];      // Output: 34   

?>