<?php 
// $result = $data["thongtin"];

  if (mysqli_num_rows($data["thongtin"])) {
    // output data of each row
    while($row = mysqli_fetch_array($data["thongtin"])) {?>
      <form method="POST" action="Home/update">
      <div class="mb-3">
        <label class="form-label">Ten</label>
        <input type="text" class="form-control" name="lastName" value=<?php echo $row["lastName"]?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Ho</label>
        <input type="text" class="form-control" name="firstName" value=<?php echo $row["firstName"]?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Gioi tinh</label>
        <input type="text" class="form-control" name="gender" value=<?php echo $row["gender"]?>>
      </div>
      <div class="mb-3">
        <label class="form-label">So dien thoai</label>
        <input type="text" class="form-control" name="phoneNumber" value=<?php echo $row["phoneNumber"]?>>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php
    }
  }else {?>
    <form method="POST" action="Home/insert">
      <div class="mb-3">
        <label class="form-label">Ten</label>
        <input type="text" class="form-control" name="lastName">
      </div>
      <div class="mb-3">
        <label class="form-label">Ho</label>
        <input type="text" class="form-control" name="firstName">
      </div>
      <div class="mb-3">
        <label class="form-label">Gioi tinh</label>
        <input type="text" class="form-control" name="gender">
      </div>
      <div class="mb-3">
        <label class="form-label">So dien thoai</label>
        <input type="text" class="form-control" name="phoneNumber">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php
  }
?>
