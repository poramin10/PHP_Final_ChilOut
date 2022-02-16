<?php
    // หาที่อยู่ที่แน่นอนของ Navbar 
    $uri = $_SERVER['REQUEST_URI'];
    //แยก String เป็น Array โดยพารามิเตอร์แรกคือตัวที่จะตัด ส่วนพารามิเตอร์ 2 คือข้อมูลที่นำมาตัด
    $array = explode('/', $uri);
    $key = array_search("pages", $array);
    $name = $array[$key + 2]; //เพื่อหาที่อยู่ที่แน่นอน

?>

<ul class="list-group sticky-top pt-3">
    <a href="../Profile/Page_Profile.php">
        <li class="list-group-item <?php echo $name == 'Profile' ? 'active' : 'text-blue' ?>"> <i class="fas fa-address-card"></i> ข้อมูลโปรไฟล์</li>
    </a>
    <a href="../Account/Page_Account.php">
        <li class="list-group-item <?php echo $name == 'Account' ? 'active' : 'text-blue ' ?>"><i class="fas fa-user-shield"></i> แก้ไขรหัสผ่าน</li>
    </a>
    <a href="../Favor/Page_Favor.php">
        <li class="list-group-item <?php echo $name == 'Favor' ? 'active' : 'text-blue ' ?> " aria-current="true"><i class="fas fa-heart"></i> สถานที่ท่องเที่ยวที่ชื่นชอบ</li>
    </a>
    <a href="../Recom/select.php">
        <li class="list-group-item <?php echo $name == 'Recommend' ? 'active' : 'text-blue ' ?> "><i class="fas fa-map-marked-alt"></i> แนะนำสถานที่ท่องเที่ยว</li>
    </a>
</ul>