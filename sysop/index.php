<?php 
    include '../header.php';
?>

<!----------------- BODY ----------------->
<div class="body">
    <div class="courseFunctionContainer">
      <!-- Function: Manage Users / Management of User Accounts -->
      <div class="courseFunction">
        <p>Manage Users</p>
        <a href="editUser.html">Edit a User</a>
        <a href="deleteUser.html">Delete a User</a>
        <a href="addUser.html">Add a User</a>
      </div>

      <!-- Function: Import Prof + course / Quick import of profs and courses from a CSV file -->
      <div class="courseFunctionImportAdd">
          <p class="importAddTitle" href="">Import Professors & Courses</p>
      </div>

      <!-- Function: Manual add prof + course / manual way to input professors and courses (instead of CSV file) -->
      <div class="courseFunctionImportAdd">
        <p class="importAddTitle" href="">Add a Professor & Course</p>
      </div>
    </div>
  </div>
</body>

</html>